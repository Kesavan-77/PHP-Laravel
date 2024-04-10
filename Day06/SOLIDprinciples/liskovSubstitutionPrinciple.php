<?php
/*  The Liskov Substitution Principle states that derived classes should be substitutable for their base classes. 
In PHP, this can be achieved by ensuring that subclasses conform to the same contracts and 
behave in the same way as their base classes. */

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

function displayUserInfo(UserInfo $user) {
    echo "UserName is: " . $user->getUserName() . "<br>";
    echo "UserId is: " . $user->getUserID() . "<br>";
    // Check if the object is an instance of Employee
    if ($user instanceof Employee) {
        echo "Department: " . $user->getDepartment() . "<br>";
    }
}


$user = new User("Arul", 71382006023);
$employee = new Employee("John", 123456, "IT");

echo "Displaying user information:<br>";
displayUserInfo($user);

echo "<br>Displaying employee information:<br>";
displayUserInfo($employee);

?>