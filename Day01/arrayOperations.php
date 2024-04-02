<?php
echo "<h1>Array Operations</h1>";

//Array Declarations

//Linear or Indexed array
$arr1 = array('car','bike','bus','truck');
echo var_dump($arr1)."<br><br>";
foreach($arr1 as $product){
    echo $product." ";
}
echo "<br><br>";

//Associative array
$arr2 = array('car'=>3,'bike'=>7,'bus'=>2,'truck'=>6);
echo var_dump($arr2)."<br><br>";
foreach($arr2 as $product => $stock){
    echo $product."-->stocks: ".$stock."--> ";
}
echo "<br><br>";

//multidimensional array
$arr3 = array(
    array(1,2,3),
    array(4,5,6),
    array(7,8,9)
);
echo var_dump($arr3)."<br><br>";
foreach($arr3 as $subarr){
    foreach($subarr as $val){
        echo $val." ";
    }
}
?>