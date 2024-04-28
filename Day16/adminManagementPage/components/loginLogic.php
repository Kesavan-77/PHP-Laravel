<?php

session_start();

$emailErr = '';
$passwordErr = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validateResult = true;

    if ($validateResult) {
        require './myDB.php';
        $sql = "SELECT email FROM admin_details where email='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $sql = "SELECT email, firstname FROM admin_details where email='$email' and password='$password'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $_SESSION['admin_mail'] = $email;
                $_SESSION['name'] = $row['firstname'];
                header("location: dashboard.php");
            } else {
                $passwordErr = 'Password is not valid';
            }
        } else {
            $emailErr = 'Email address is not valid';
        }
    }
}
