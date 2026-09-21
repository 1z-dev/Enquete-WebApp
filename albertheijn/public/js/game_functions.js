const statements = window.questionnaire.statements;
const answerUrl = window.questionnaire.answerUrl;
const finishedUrl = window.questionnaire.finishedUrl;

let currentStatement = 0;


function showStatement() {
    const statement = statements[currentStatement];

    document.getElementById('statement').textContent = statement.stelling;
    document.getElementById('context').textContent = statement.context;
}


async function answerQuestion(answer) {
    const statement = statements[currentStatement];
    try {
        const response = await fetch(answerUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },

            body: JSON.stringify({
                statement_id: statement.id,
                answer: answer
            })
        });

        const data = await response.json();

        if (!response.ok) {
            console.error(data);
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
    } 
    catch (error) {
        console.error(
            'Could not save answer:',
            error
        );
    }
}


document.getElementById('answer-1').addEventListener('click', function () {
        answerQuestion(1);
});

document.getElementById('answer-2').addEventListener('click', function () {
    answerQuestion(2);
});

showStatement();