function angryEmoji(){
    document.getElementById('emoji').classList.toggle('hidden');
}
function reaction(){
    document.getElementById('cal-form').classList.toggle('hidden');
}
function thought(){
    document.getElementById('thought').classList.toggle('hidden');
}
function solve(){
    let ans = eval(document.getElementById('cal').value);
    let tag = `<img src='https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgZLa71HIqwp6SGFimE8Oxmr825U2hfeIbev_G8ojLiQmkkhiwIY7WIT555c8Ms1parwGvUEaeqZkB3wx5Ix0okcoQ_goww4wrKe0NllbTyKZQvhQ1RCiaPOkVnnKsn91zfalb8PUug87g/s1600/smiley-taking-a-bow.png' alt='ans' height='150px' weight='150px'><h1>${ans}</h1><a href="./index.html"><button id="back">Back</button></a>`
    document.getElementById('cal-form').innerHTML = tag;
}