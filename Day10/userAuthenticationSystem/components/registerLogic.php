<?php
$firstNameErr = '';
$lastNameErr= '';
$emailErr = '';
$passwordErr = '';
$confirmPasswordErr = '';

function FnameValidate($val,&$result){
    if(strlen(trim($val))<=2){
        $GLOBALS['firstNameErr'] = "must contain atleast 3 characters";
        $result = false;
    }
}

function LnameValidate($val,&$result){
    if(strlen(trim($val))<1){
        $GLOBALS['lastNameErr'] = "must contain atleast 1 characters";
        $result = false;
    }
}

function EmailValidate($val,&$result){
    if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $GLOBALS['emailErr'] = "Enter a valid email address";
        $result = false;
    }
}

function PasswordValidate($val,&$result){
    if(strlen(trim($val))<=7){
        $GLOBALS['passwordErr'] = "must contain atleast 8 characters";
        $result = false;
    }
}

function ConfirmPasswordValidate($val1,$val2,&$result){
    if($val1!=$val2){
        $GLOBALS['confirmPasswordErr'] = "not same as the password";
        $result = false;
    }
}

if(isset($_POST['register'])){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $validateResult = true;

    FnameValidate($firstName,$validateResult);
    LnameValidate($lastName,$validateResult);
    EmailValidate($email,$validateResult);
    PasswordValidate($password,$validateResult);
    ConfirmPasswordValidate($password,$confirmPassword,$validateResult);

    if($validateResult){
        $myfile = fopen("../envs/$email.txt", "w") or die("Unable to open file!");
        $user = array("fname"=>$firstName,"lname"=>$lastName,"email"=>$email,"password"=>$password);
        fwrite($myfile, json_encode($user));
        fclose($myfile);
        header("Location: login.php");
        exit();
    }
}

?>