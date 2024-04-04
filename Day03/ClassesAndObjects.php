<?php
//create class
class School{
    private $name;
    private $roll_no;
    private $class = "CS";


    function set_name($name,$roll_no){
        $this->name = $name;
        $this->roll_no = $roll_no;
    }

    function get_name(){
        echo "The student name: $this->name, roll_no: $this->roll_no and class: $this->class";
    }
}

// initialize object
$student1 = new School();
$student1->set_name("kesavan",71382006023);
$student1->get_name();

$student2 = new School();
$student2->set_name("Arish",71382006024);
$student2->get_name();

$student3 = new School();
$student3->set_name("Abdul",71382006025);
$student3->get_name();
?>