//screen
console.log(window.screen);
console.log(window.screen.width);
console.log(window.screen.height);

console.log(window.screen.availWidth);
console.log(window.screen.availHeight);

//location
console.log(window.location);
console.log(window.location.port);

setInterval(()=>{
    window.location.href = "https://www.google.com/";
},3000)

setInterval(()=>{
    console.log(window.location.href);
},5000)

//history
console.log(window.history);
history.back();
history.forward();

//navigator
console.log(navigator);
console.log(navigator.appName);
console.log(navigator.cookieEnabled);
console.log(navigator.product);