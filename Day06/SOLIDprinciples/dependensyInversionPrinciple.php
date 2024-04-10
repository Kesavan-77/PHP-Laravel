<?php

/* The Dependency Inversion Principle states that high-level modules should not depend on low-level modules, 
but rather both should depend on abstractions. In PHP, this can be achieved by using dependency injection to provide an object with its dependencies, 
rather than creating the dependencies directly within the object. */


interface UserInfoProvider {
    public function getUserInfo();
}

interface ActionHandler {
    public function performAction($userId, $action);
}

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

class EmployeeInfoProvider implements UserInfoProvider {
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getUserInfo() {
        return ['name' => $this->user->getUserName(), 'id' => $this->user->getUserID()];
    }
}

class HRDepartment implements ActionHandler {
    public function performAction($userId, $action) {
        switch ($action) {
            case 'salary':
                echo "Salary has been credited to employee id $userId <br>";
                break;
            case 'leave':
                echo "Your leave has been approved by the HR <br>";
                break;
            default:
                echo "Invalid action <br>";
        }
    }
}

$user = new User("Arul", 71382006023);
$userInfoProvider = new EmployeeInfoProvider($user);
$actionHandler = new HRDepartment();

$userInfo = $userInfoProvider->getUserInfo();
echo "UserName is: " . $userInfo['name'] . "<br>";
echo "UserId is: " . $userInfo['id'] . "<br>";

$actionHandler->performAction($user->getUserID(), 'salary');
$actionHandler->performAction($user->getUserID(), 'leave');


?>