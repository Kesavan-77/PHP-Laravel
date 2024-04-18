<!DOCTYPE html>
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
        $myfile = fopen("../env/$email.txt", "w") or die("Unable to open file!");
        $user = array("fname"=>$firstName,"lname"=>$lname,"email"=>$email,"password"=>$password);
        fwrite($myfile, json_encode($user));
        fclose($myfile);
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styles/main.css" href="">
    <title>User Authentication System</title>
</head>
<body class="d-flex p-5 bg-primary">
    <div class="container p-5 rounded" style="width: 500px;">
        <form method="POST" action="" enctype="multipart/form-data" id="register-form">
            <h1 class="text-center fw-bold">Register</h1>
            <hr>
            <div class="form-group mt-4">
                <label class="fs-5 fw-medium">First name</label>
                <input type="text" class="form-control" id="firstname" name="fname" placeholder="Enter your first name" value="<?php if(isset($firstName)) echo $firstName; ?>">
                <?php echo $firstNameErr; ?>
            </div>
            <div class="form-group mt-4">
                <label class="fs-5 fw-medium">Last name</label>
                <input type="text" class="form-control" id="lastname" name="lname" placeholder="Enter your last name" value="<?php if(isset($lastName)) echo $lastName; ?>">
                <?php echo $lastNameErr; ?>
            </div>
            <div class="form-group mt-4">
                <label class="fs-5 fw-medium">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php if(isset($email)) echo $email; ?>">
                <?php echo $emailErr; ?>
            </div>
            <div class="form-group mt-4">
                <label class="fs-5 fw-medium">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php if(isset($password)) echo $password; ?>">
                <?php echo $passwordErr; ?>
            </div>
            <div class="form-group mt-4">
                <label class="fs-5 fw-medium">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" value="<?php if(isset($confirmPassword)) echo $confirmPassword; ?>">
                <?php echo $confirmPasswordErr ?>
            </div>
            <button type="submit" class="btn btn-primary mt-4" name="register">Register</button><br><br>
            <a href="../components/login.php" class="text-danger">Already have an account?</a>
        </form>
    </div>
</body>
</html>