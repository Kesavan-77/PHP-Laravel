<?php  
echo "<h1>My First PHP program</h1>";

//Loops 
$input_str = "  Kesavan Vel  ";
echo "<h2>Input srting is : $input_str</h2>";

//finding vowels in the string
echo "<h3>Vowels present in the string:</h3>";
$vowels = "aeiouAEIOU";
for($i=0;$i<strlen($input_str);$i++){
    if(strpos($vowels,$input_str[$i])!== false){
        echo "<span>$input_str[$i]</span> ";
    }
}

//finding wheather the given string is anagram
if($input_str===strrev($input_str)){
    echo "<h3>Is the string is anagaram : Yes </h3>";
}else{
    echo "<h3>Is the string is anagaram : No </h3>";
}

//string operations
echo "<h3>Some of the important string methods: </h3>";
echo strlen($input_str)." ----> length of the string <br><br>";
echo strtolower($input_str)." ----> to lower case <br><br>";
echo strtoupper($input_str)." ----> to upper case <br><br>";
echo str_replace("Vel","",$input_str)." ----> Replace operation <br><br>";
echo substr($input_str,5,7)." ----> substring <br><br>";
echo strpos($input_str,"sav")." ----> finding position<br><br>";
echo trim($input_str)." ----> remove extra space <br><br>";
echo explode(" ",$input_str)." ----> splitting operation <br><br>";
echo implode("-",explode(" ",$input_str))." ----> join operation <br><br>";
echo strrev($input_str)." ----> reverse a string <br><br>";
?>