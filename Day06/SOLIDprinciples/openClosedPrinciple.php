<?php

/* The Open-Closed Principle states that a class should be open for extension but closed for modification.
 In PHP, this can be achieved by designing classes that have clear, well-defined interfaces and
that use inheritance and abstraction to allow for flexibility and extensibility. */

interface UserInfo {
    public function getUserName();
    public function getUserID();
}

class User implements UserInfo {
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