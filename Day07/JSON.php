<?php

$arr = array("name"=>"alan","age"=>20);
print_r($arr);
echo "<br>";

$encode = json_encode($arr);
print_r($encode);
echo "<br>";

$decode = json_decode($encode,true);
print_r($decode);
echo "<br>"
?>