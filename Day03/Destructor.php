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

    //destructor
    function __destruct(){
        echo "The student name: $this->name, roll_no: $this->roll_no and class: $this->class";
    }
}

//initialize objects
$student1 = new School("kesavan",71382006023);

?>