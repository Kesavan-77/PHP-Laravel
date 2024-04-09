<?php

//abstract class
abstract class Language{
    abstract function greet();
}

class Tamil extends Language{
    function greet(){
        echo "Vanakam nanbar";
    }
}

class English extends Language{
    function greet(){
        echo "hello dude";
    }
}

class Hindi extends Language{
    function greet(){
        echo "Namaste bhai";
    }
}

$tamil = new Tamil();
$english = new English();
$hindi = new Hindi();

$tamil->greet();
$english->greet();
$hindi->greet();
?>