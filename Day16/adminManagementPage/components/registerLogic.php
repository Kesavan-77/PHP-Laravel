<?php
$firstNameErr = '';
$lastNameErr = '';
$emailErr = '';
$passwordErr = '';
$confirmPasswordErr = '';

function FnameValidate($val, &$result)
{
    if (strlen(trim($val)) <= 2) {
        $GLOBALS['firstNameErr'] = "must contain at least 3 characters";
        $result = false;
    }
}

function LnameValidate($val, &$result)
{
    if (strlen(trim($val)) < 1) {
        $GLOBALS['lastNameErr'] = "must contain at least 1 character";
        $result = false;
    }
}

function EmailValidate($val, &$result)
{
    if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $GLOBALS['emailErr'] = "Enter a valid email address";
        $result = false;
    }
}

function PasswordValidate($val, &$result)
{
    if (strlen(trim($val)) <= 7) {
        $GLOBALS['passwordErr'] = "must contain at least 8 characters";
        $result = false;
    }
}

function ConfirmPasswordValidate($val1, $val2, &$result)
{
    if ($val1 != $val2) {
        $GLOBALS['confirmPasswordErr'] = "not same as the password";
        $result = false;
    }
}

if (isset($_POST['register'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $validateResult = true;

    FnameValidate($firstName, $validateResult);
    LnameValidate($lastName, $validateResult);
    EmailValidate($email, $validateResult);
    PasswordValidate($password, $validateResult);
    ConfirmPasswordValidate($password, $confirmPassword, $validateResult);

    if ($validateResult) {
        require './myDB.php';
        $sql = "SELECT email FROM admin_details where email='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $emailErr = "This email is already registered";
        } else {
            $insert = "INSERT INTO admin_details(firstname, lastname, email, password) values('$firstName', '$lastName', '$email', '$password')";
            $insert_value = mysqli_query($conn, $insert);
            if ($insert_value) {
                header("location: login.php");
            }
        }
    }
}
