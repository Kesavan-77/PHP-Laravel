
let str1 = "Hello World!"; //primitive type
let str2 = new String("Hello Javascript!"); //non-primitive type
let str3 = `Hello World!`; 

console.log(typeof(str1),typeof(str2),typeof(str3)); // string object

console.log(str1,str2,str3); //Hello World! [String: 'Hello Javascript!']

console.log(str1,str2.valueOf(),str3); // converts the object to string

// useful string methods

const input = "There are no regrets in life, just lessons   ";

console.log(input.length);
console.log(input.trim());
console.log(input.toUpperCase());
console.log(input.toLocaleLowerCase());
console.log(input.toLocaleUpperCase());
console.log(input.indexOf("life"));
console.log(input.replace("just","only"));
console.log(input.slice(24));
console.log(input.startsWith("There"));
console.log(input.endsWith("Lessons"));
console.log(input.includes("are"));
console.log(input.split(" "));

console.log(input);