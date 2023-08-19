var percentageElement = document.getElementById("percentage");
var percentage = 0;

function process() {
    percentage += parseInt(1);
    if (percentage > 99) {
        percentage = 99;
    }
    percentageElement.innerText = percentage;
    processInterval();
}

function processInterval() {
    setTimeout(process, 120/100 * 1000)
}
processInterval();