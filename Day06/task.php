<?php
$arr =[1,2,3,4,5];
for($i=1;$i<count($arr);$i++){
    $arr[$i] = $arr[$i] + $arr[$i-1];
}
print_r($arr);
?>