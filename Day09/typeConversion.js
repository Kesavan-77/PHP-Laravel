let num = 10;
let str = String(num); // "10"

let strNum = "123";
let numFromString = Number(strNum); // 123

let floatStr = "3.14";
let floatNum = parseFloat(floatStr); // 3.14

let intStr = "42";
let intNum = parseInt(intStr); // 42

let truthyValue = "Hello";
let isTruthy = Boolean(truthyValue); // true

let falseyValue = 0;
let isFalsey = Boolean(falseyValue); // false

let result = "Hello" / 5; // result will be NaN
console.log(isNaN(result)); // true

let obj = { key: "value" };
let jsonString = JSON.stringify(obj); // '{"key":"value"}'
let parsedObj = JSON.parse(jsonString); // { key: "value" }

