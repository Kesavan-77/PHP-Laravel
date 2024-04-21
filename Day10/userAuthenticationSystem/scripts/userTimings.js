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

function displayDeleteAccount(){
    document.getElementById('deleteContainer').classList.toggle('hidden');
}

function displayAddAccount(){
    document.getElementById('addContainer').classList.toggle('hidden');
}

function displayPrivacyContent(){
    document.getElementById('user-content').classList.add('hidden');
    document.getElementById('privacy-content').classList.remove('hidden');
}

function displayUserContent(){
    document.getElementById('privacy-content').classList.add('hidden');
    document.getElementById('user-content').classList.remove('hidden');
}