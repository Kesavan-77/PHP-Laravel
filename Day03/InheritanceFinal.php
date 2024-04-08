<?php

//create class
final class School{
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

class College extends School{ //provides an error due to final keyword in the class
   function welcome(){
    echo "welcome to the hell<br>";
   }

   function intro(){
    echo "this function will override the above --> you can use final keyword in the above function to avoid overriding";
   }
}

//initialize objects
$student1 = new College("kesavan",71382006023);
$student1->welcome();
$student1->intro();
?>