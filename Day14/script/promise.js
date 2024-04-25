let userName = true;
let mailId = true;

function ValidMessage(){
    return new Promise((resolve,reject)=>{
        if(!userName){
            reject("UserName not available");
        }
        else if(!mailId){
            reject("MailId is not available");
        }
        else{
            resolve("User is logged in");
        }
    })
}

ValidMessage().then((message)=>{
    console.log("Success1: " + message);
    return new Promise((resolve,reject)=>{
        resolve("Done");
    })
}).then((message)=>{
    console.log("Success2: " + message);
}).catch((error)=>{
    console.log("Error: "+ error);
})

const user1 = new Promise((resolve,reject)=>{
    resolve("user 1 on");
})

const user2 = new Promise((resolve,reject)=>{
    resolve("user 2 on");
})

const user3 = new Promise((resolve,reject)=>{
    resolve("user 3 boom");
})

//takes in all promises
Promise.all([
    user1,
    user2,
    user3
]).then((message)=>{
    console.log(message);
}).catch((message)=>{
    console.log(message);
})

//takes only first promise and returns
Promise.race([
    user1,
    user2,
    user3
]).then((message)=>{
    console.log(message);
}).catch((message)=>{
    console.log(message);
})