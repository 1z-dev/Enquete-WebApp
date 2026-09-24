const outcome_locations = [
    "/assets/images (1).jpg",
    "/assets/767e0f42-6729-4b1c-8f38-9e0a4352beb2.jpg",
    "/assets/1785166762844.jpg",
    "/assets/images (1).jpg"
];

const shuffled = outcome_locations.sort(() => Math.random() - 0.5);
let outcome

function routeSystem(statistics) {
    const eensPercentage = statistics.eens;
    const oneensPercentage = statistics.oneens;

    if (eensPercentage !== oneensPercentage) {
        if (eensPercentage >= oneensPercentage) {
            outcome = shuffled[0];
        } else {
            outcome = shuffled[1];
        }
    } else {
        outcome = shuffled[Math.floor(Math.random() * shuffled.length)];
    }

    document.getElementById('outcome').src = outcome;
}


routeSystem(window.statistics);