<?php declare(strict_types=1);

//function declaration
function Greeting(){
    echo "Hello! Good Morning";
}
Greeting();
echo "<br><br>";

//call by value
function increment($a){
    $a+=1;
}
$x = 10;
increment($x);
echo $x;
echo "<br><br>";

//call by reference
function decrement(&$b){
    $b+=1;
}
$y = 15;
decrement($y);
echo $y;
echo "<br><br>";

//default function
function add($num1,$num2=10){
    return $num1+$num2;
}
echo add(5);
echo "<br><br>";

//variadic argument
function solution(...$arr){
    echo var_dump($arr);
    foreach($arr as $val){
        echo $val;
    }
}
echo solution(1,2,3,4,9,8,7,6);
echo "<br><br>";

function addNumbers(int $a,int $b) {
    return $a + $b;
}
echo addNumbers(5, 10);
?>