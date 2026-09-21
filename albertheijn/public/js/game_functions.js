const statements = window.questionnaire.statements;
const answerUrl = window.questionnaire.answerUrl;
const finishedUrl = window.questionnaire.finishedUrl;

let currentStatement = 0;


function showStatement() {
    if (currentStatement >= statements.length) {
        window.location.href = finishedUrl;
        return;
    }

    const statement = statements[currentStatement];

    document.getElementById('statement').textContent = statement.stelling;
    document.getElementById('context').textContent = statement.context;
    document.getElementById('uitleg').value = '';
}


async function answerQuestion(answer) {
    const statement = statements[currentStatement];
    const uitleg = document.getElementById('uitleg').value;

    try {
        const response = await fetch(answerUrl, {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute('content'),

                'Accept': 'application/json'
            },

            body: JSON.stringify({
                statement_id: statement.id,
                answer: answer,
                uitleg: uitleg
            })
        });

        const data = await response.json();

        if (!response.ok) {
            console.error('Server error:', response.status, data);
            alert('Opslaan mislukt. Kijk in de console voor de fout.');
            return;
        }

        if (data.success) {
            currentStatement++;

            if (currentStatement >= statements.length) {
                window.location.href = finishedUrl;
                return;
            }

            showStatement();
        }

    } catch (error) {
        console.error('Could not save answer:', error);
    }
}


document.getElementById('answer-form').addEventListener('submit', function (event) {
    event.preventDefault();
    const answer = event.submitter.value;
    answerQuestion(answer);
});


showStatement();