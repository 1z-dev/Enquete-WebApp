const statements = window.questionnaire.statements;
const answerUrl = window.questionnaire.answerUrl;
const finishedUrl = window.questionnaire.finishedUrl;

const pathVideo = document.getElementById('path-video');
const answerForm = document.getElementById('answer-form');
const answerButtons = answerForm.querySelectorAll('button[type="submit"]');

let currentStatement = 0;
let isSaving = false;

function showStatement() {
    // Een lege lijst betekent dat er nog geen stellingen in de database staan.
    // Dit is geen afgeronde quiz: stuur de gebruiker dus niet direct naar resultaat.
    if (statements.length === 0) {
        document.getElementById('statement').textContent = 'Er zijn nog geen stellingen beschikbaar.';
        document.getElementById('context').textContent = 'Voeg eerst stellingen toe via het adminpaneel.';
        document.getElementById('uitleg').value = '';
        setAnswerButtonsDisabled(true);
        return;
    }

    if (currentStatement >= statements.length) {
        window.location.href = finishedUrl;
        return;
    }

    const statement = statements[currentStatement];

    document.getElementById('statement').textContent = statement.stelling;
    document.getElementById('context').textContent = statement.context ?? '';
    document.getElementById('uitleg').value = '';
}

function setAnswerButtonsDisabled(disabled) {
    answerButtons.forEach((button) => {
        button.disabled = disabled;
        button.classList.toggle('opacity-50', disabled);
        button.classList.toggle('cursor-not-allowed', disabled);
    });
}

async function answerQuestion(answer) {
    if (isSaving || currentStatement >= statements.length) {
        return;
    }

    isSaving = true;
    setAnswerButtonsDisabled(true);

    const statement = statements[currentStatement];
    const uitleg = document.getElementById('uitleg').value;

    try {
        const response = await fetch(answerUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                statement_id: statement.id,
                answer,
                uitleg,
            }),
        });

        const data = await response.json();

        if (!response.ok || !data.success) {
            console.error('Server error:', response.status, data);
            alert('Opslaan mislukt. Probeer het opnieuw.');
            return;
        }

        currentStatement++;

        pathVideo.currentTime = 0;
        pathVideo.style.transform = answer === '1'
            ? 'translateX(-50%) scaleX(-1)'
            : 'translateX(-50%) scaleX(1)';

        const continueToNextStatement = () => {
            pathVideo.removeEventListener('ended', continueToNextStatement);

            if (currentStatement >= statements.length) {
                window.location.href = finishedUrl;
                return;
            }

            isSaving = false;
            setAnswerButtonsDisabled(false);
            showStatement();
        };

        pathVideo.addEventListener('ended', continueToNextStatement, { once: true });

        try {
            await pathVideo.play();
        } catch (error) {
            // If autoplay/playback is unavailable, do not leave the questionnaire stuck.
            console.warn('Video playback unavailable; continuing without animation.', error);
            continueToNextStatement();
        }
    } catch (error) {
        console.error('Could not save answer:', error);
        alert('Er ging iets mis bij het opslaan. Probeer het opnieuw.');
    } finally {
        if (isSaving && currentStatement < statements.length) {
            isSaving = false;
            setAnswerButtonsDisabled(false);
        }
    }
}

answerForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const answer = event.submitter?.value;

    if (answer !== undefined) {
        answerQuestion(answer);
    }
});

showStatement();
