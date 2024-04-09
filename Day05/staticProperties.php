<?php

class Students{
    private $name;
    private $age;

    public static $department = "IT"; 

    public function __construct($name,$age)
        {
            $this->name = $name;
            $this->age = $age;
        }
    public static function details($name){
        echo $name."-----".self::$department;
    }
    }

Students::details("kesav");
echo Students::$department;

?>