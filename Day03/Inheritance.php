<?php

//create class
class School{
    private $name;
    private $roll_no;
    private $class = "CS";
    //constructor
    function __construct($name,$roll_no){
        $this->name = $name;
        $this->roll_no = $roll_no;
    }
    function intro(){
        echo "The student name: $this->name, roll_no: $this->roll_no and class: $this->class";
    }
}

class College extends School{
   function welcome(){
    echo "welcome to the hell<br>";
   }
}

//initialize objects
$student1 = new College("kesavan",71382006023);
$student1->welcome();
$student1->intro();
?>