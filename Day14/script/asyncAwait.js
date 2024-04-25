function makePayment(id){
    return new Promise((resolve,reject)=>{
        setTimeout(()=>{
            if(id>=3000){
                reject("Payment will be made after 5 days");
            }
            else{
                console.log("Payment Successfull")
                resolve(true);
            }
        },3000)
    })
}

function processList(status){
    return new Promise((resolve,reject)=>{
        if(status){
            resolve("payment slip will be generated");
        }
        else{
            reject("payment slip will not be generated");
        }
    })
}

makePayment(1000).then((message)=>{
    return processList(message);
}).then((message)=>{
    console.log(message);
}).catch((message)=>{
    console.log(message);
})

async function payEmp(){
    try {
        const response = await makePayment(2000);
        const list = await processList(response);
        console.log(list);
    }
    catch(err){
        console.log("Error: " + err);
    }
}

payEmp()

console.log("start");