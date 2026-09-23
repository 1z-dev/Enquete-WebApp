const outcome_locations = ["Cookies Isle", "Pasta Isle", "Beans Isle", "Pizza Isle"]
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

    document.getElementById('outcome').textContent = outcome;
}


routeSystem(window.statistics);