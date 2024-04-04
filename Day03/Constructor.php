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

    function get_name(){
        echo "The student name: $this->name, roll_no: $this->roll_no and class: $this->class";
    }
}

//initialize objectss
$student1 = new School("kesavan",71382006023);
$student1->get_name();

?>