const closeTiming = document.getElementById("close-icon");
const displayTiming = document.getElementById("diplayTiming");


closeTiming.addEventListener("click", () => {
    const timingContainers = document.getElementsByClassName('timing-container');
    for (let i = 0; i < timingContainers.length; i++) {
        timingContainers[i].classList.add('hidden');
    }
});

displayTiming.addEventListener("click", () => {
    const timingContainers = document.getElementsByClassName('timing-container');
    for (let i = 0; i < timingContainers.length; i++) {
        timingContainers[i].classList.remove('hidden');
    }
});
