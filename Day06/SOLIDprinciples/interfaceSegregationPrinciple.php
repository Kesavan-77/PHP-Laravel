<?php

/* The Interface Segregation Principle states that clients should not be forced to depend on methods that they do not use. 
In PHP, this can be achieved by defining separate interfaces for different groups of related methods, and
having classes implement only the interfaces that are relevant to their functionality. */

interface UserInfo {
    public function getUserName();
    public function getUserID();
}

interface SalaryPayer {
    public function makeSalary($userId, $salary);
}

interface LeaveManager {
    public function leaveConfirmation($userId, $isDone);
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

class HRDepartment implements SalaryPayer, LeaveManager {
    public function makeSalary($userId, $salary) {
        echo "$salary has been credited to employee id $userId <br>";
    }

    public function leaveConfirmation($userId, $isDone) {
        if ($isDone) {
            echo "Your leave has been approved by the HR <br>";
        } else {
            echo "Your leave has been denied by the HR <br>";
        }
    }
}

// Usage
$user = new User("Arul", 71382006023);
echo "UserName is: " . $user->getUserName() . "<br>";
echo "UserId is: " . $user->getUserID() . "<br>";

$hrDepartment = new HRDepartment();
$hrDepartment->makeSalary($user->getUserID(), 15000);
$hrDepartment->leaveConfirmation($user->getUserID(), true);

?>
