console.log("hello world");

console.log(Number.isFinite(0 / 0)); //false

let set = new Set([1, 2, 3, 4, 4,[1,2,2,2],[1,2,2,2],[1,2,3,2]]);

console.log([1,2,2,2] == [1,2,2,2]); // false

console.log(JSON.stringify([1, 2, 2, 2]) === JSON.stringify([1, 2, 2, 2])); // true

console.log(3+3+Number('3')); //explicit typecasting

console.log(3+3+'3'); //implicit typecasting

let map = new Map();
map.set("key1","value1");
let obj = {id:1};
map.set(obj,"value1");
map.set('task', 'value2');
console.log(map);

// let myWeakMap = new WeakMap();
// let key = { id: 1 };
// myWeakMap.set(key, 'value1');
// myWeakMap.set('task', 'value2');
// console.log(myWeakMap.get(key));

console.log("hello")

function solve(n){
    if(n>200) return n;
    console.log("steps: "+n);
    return solve(n*n);
}

console.log(solve(2));