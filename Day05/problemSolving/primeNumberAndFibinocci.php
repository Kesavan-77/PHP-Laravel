<?php

//prime number
function isPrime($n){
    if($n==1 || $n==2 || $n==3){
        return true;
    }
    for($i=2;$i<$n;$i++){
        if($n % $i == 0){
            return false;
        }
    }
    return true;
}

$num = 13;
if(isPrime(($num))){
    echo "$num is a prime number <br>";
}else{
    echo "$num is a not prime number <br>";
}

//fibinocci series

$n = 10;
$n1 = 0;
$n2 = 1;
echo "$n1 $n2 ";
for($i=2;$i<$n;$i++){
    $n3 = $n1+$n2;
    $n1 = $n2;
    $n2 = $n3;
    echo "$n3 ";
}



?>