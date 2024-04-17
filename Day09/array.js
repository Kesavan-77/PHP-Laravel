let arr1 = [1,2,3,4,5,6];
let arr2 = new Array(1,2,3,4,5);

console.log(typeof(arr1),typeof(arr2));
console.log(arr1[1],arr2[2]);

let input = ["zero","one","two","three","four","five"];

console.log(input.length);
console.log(input[0][1]);
console.log(input.indexOf("two"));
console.log(input.push("six"));
console.log(input.pop());
console.log(input.shift());
console.log(input.unshift("minus"));
console.log(input.toString());