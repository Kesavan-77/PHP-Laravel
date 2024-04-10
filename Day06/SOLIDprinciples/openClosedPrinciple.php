<?php

class User {
    private $userName;
    private $userId;

    public function __construct($name, $id) {
        $this->userName = $name;
        $this->userId = $id;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getUserID() {
        return $this->userId;
    }
}

// New class extending User for additional functionality
class Employee extends User {
    private $department;

    public function __construct($name, $id, $department) {
        parent::__construct($name, $id);
        $this->department = $department;
    }

    public function getDepartment() {
        return $this->department;
    }
}


$user = new User("Arul", 71382006023);
echo "UserName is: " . $user->getUserName() . "<br>";
echo "UserId is: " . $user->getUserID() . "<br>";

$employee = new Employee("John", 123456, "IT");
echo "Employee Name: " . $employee->getUserName() . "<br>";
echo "Employee ID: " . $employee->getUserID() . "<br>";
echo "Department: " . $employee->getDepartment() . "<br>";

?>