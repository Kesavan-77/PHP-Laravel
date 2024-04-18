<?php

session_start();

$emailErr = '';
$passwordErr = '';

function EmailValidate($val,&$result){
    if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $GLOBALS['emailErr'] = "Enter a valid email address";
        $result = false;
    }
    if (!file_exists("../envs/$val.txt")){
        $GLOBALS['emailErr'] = "Email address does not exist";
        $result = false;
    }

}

function PasswordValidate($email,$pass,&$result){
    if (file_exists("../envs/$email.txt")){
        $myfile = fopen("../envs/$email.txt","r");
        $jsonString = fread($myfile,filesize("../envs/$email.txt"));
        $credentials = json_decode($jsonString,true);
        $_SESSION['user_name'] = $credentials["fname"];
        $_SESSION['email_id'] = $email;
        if($pass!=$credentials["password"]){
            $GLOBALS['passwordErr'] = "Incorrect password";
            $result = false;
        }
        fclose($myfile);
    }
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validateResult = true;

    EmailValidate($email,$validateResult);
    PasswordValidate($email,$password,$validateResult);

    if($validateResult){
        header("Location: dashboard.php");
        exit();
    }
}

?>