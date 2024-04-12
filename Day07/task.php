<?php

$num1 = 13;
$num2 = 14;

//method1
$result = (string) $num1 + $num2;
echo "ans = ".strrev($result)."<br>";

//method2
$sum = $num1 + $num2;
$res = 0;
while($sum!=0){
    $temp = $sum%10;
    $res = $res * 10 + $temp;
    $sum = (int) ($sum/10);
}
echo "ans = ".$res;

?>