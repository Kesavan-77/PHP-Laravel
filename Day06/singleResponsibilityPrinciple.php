<?php
/* The Single Responsibility Principle states that a class should have only one reason to change. 
In PHP, this can be achieved by ensuring that each class has a clear and well-defined purpose, 
and that it only contains code that is directly related to that purpose. */

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

class SalaryManager {
    public function creditSalary($userId, $salary) {
        // Logic to credit salary to the user with $userId
        echo "$salary has been credited to employee id $userId <br>";
    }
}

class LeaveManager {
    public function confirmLeave($userId, $isDone) {
        // Logic to handle leave confirmation for the user with $userId
        if ($isDone) {
            echo "Your leave has been approved by the HR <br>";
        } else {
            echo "Your leave has been denied by the HR <br>";
        }
    }
}

$user = new User("Arul", 71382006023);
echo "UserName is: " . $user->getUserName() . "<br>";
echo "UserId is: " . $user->getUserID() . "<br>";

$salaryManager = new SalaryManager();
$salaryManager->creditSalary($user->getUserID(), 15000);

$leaveManager = new LeaveManager();
$leaveManager->confirmLeave($user->getUserID(), true);

?>