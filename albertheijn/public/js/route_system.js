const outcomeLocations = [
    "/assets/images (1).jpg",
    "/assets/767e0f42-6729-4b1c-8f38-9e0a4352beb2.jpg",
    "/assets/1785166762844.jpg",
];

function routeSystem(statistics) {
    const outcome = document.getElementById('outcome');

    if (!outcome || !statistics) {
        return;
    }

    const eensPercentage = Number(statistics.eens ?? 0);
    const oneensPercentage = Number(statistics.oneens ?? 0);

    let selected;

    if (eensPercentage !== oneensPercentage) {
        selected = eensPercentage > oneensPercentage
            ? outcomeLocations[0]
            : outcomeLocations[1];
    } else {
        selected = outcomeLocations[Math.floor(Math.random() * outcomeLocations.length)];
    }

    outcome.src = selected;
}

routeSystem(window.statistics);