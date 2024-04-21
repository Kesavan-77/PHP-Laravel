<!DOCTYPE html>
<?php
session_start();

// Process logout
if(isset($_POST['logout'])){
    $email = $_SESSION['email_id'];
    if($email){
    $filePath = "../envs/".$email."Timings.txt";
    $lastLine = trim(`tail -n 1 $filePath`);
    $data = json_decode($lastLine, true);
    $data['end'] = date("h:i:s A");
    $updatedJson = json_encode($data);
    file_put_contents($filePath, $updatedJson . "\n", FILE_APPEND);
    session_destroy();
    header("Location: /main.php");
    exit();
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styles/main.css">
</head>
<body>
<nav class="container-fluid navbar navbar-light justify-content-between w-100">
  <a class="navbar-brand fs-3 fw-semibold ms-5">Welcome <?php echo $_SESSION['user_name'] ?></a>
  <div class="d-flex gap-2 mx-5">
  <form class="form-inline" method="POST" action="">
    <button class="btn btn-primary my-2 my-sm-0" type="submit" name="timings" id="diplayTiming">Login Details</button>
  </form>
  <form class="form-inline" method="POST" action="">
    <button class="btn btn-danger my-2 my-sm-0" type="submit" name="logout">Logout</button>
  </form>
  </div>
</nav>

<div class="dashboard">
    <div class="row main-content">
        <div class="col-3 timing-container">
            <div class="timings">
                <p id="close-icon">X</p>
                <h4 class="text-primary">User login details</h4>
                <hr>
                <div class="timing-details">
                    <?php 
                    $email = $_SESSION['email_id'];
                    $myfile = fopen("../envs/".$email."Timings.txt","r");
                    $temp = false;
                    while(!feof($myfile)){
                        $timing = json_decode(fgets($myfile),true);
                        if($timing["end"] && $timing["start"]){
                            $temp = true;
                            echo "<hr>";
                            echo "<br> Date: ";
                            print_r($timing['date']);
                            echo "<br> Started: ";
                            print_r($timing["start"]);
                            if($timing["end"]){
                                echo "<br> Ended: ";
                                print_r($timing["end"]);
                            }
                        }
                    }
                    if(!$temp){
                        echo "<h5> No records found </h5>";
                    }
                    fclose($myfile);
                    ?>
                </div>
            </div>
        </div>
        <div class="col px-5">
            <div class="row user-info d-flex gap-5 mt-5">
                <div class="getPrivacyDetails d-flex gap-2 justify-content-center" onclick="displayPrivacyContent()">
                    <div>
                        <img src="../assets/file-invoice-solid.svg" alt="docs" height="70px" width="70px">
                    </div>
                    <div>
                        <h3>Privacy Details</h3>
                        <img src="../assets/circle-right-solid.svg" alt="docs" height="30px" width="30px">
                    </div>
                </div>
                <div class="getUserDetails d-flex gap-2 justify-content-center" onclick="displayUserContent()">
                    <div>
                        <img src="../assets/user-solid.svg" alt="docs" height="70px" width="70px">
                    </div>
                    <div>
                        <h3>User Details</h3>
                        <img src="../assets/circle-right-solid.svg" alt="docs" height="30px" width="30px">
                    </div>
                </div>
            </div>
            <div class="row mt-5 user-records hidden" id="privacy-content">
                <?php
                 require './addUserRecords.php';
                 require './deleteUserRecord.php';
                
                ?>
                <h5>privacy details</h5>
                <hr><br><br>
                <div class="col">
                    <table>
                        <tr>
                            <th>Account name</th>
                            <th>Password</th>
                        </tr>
                        <?php
                        $myFile = fopen("../envs/".$email."Records.txt","r");
                        $check = false;
                        while(!feof($myFile)) {
                            $userRecordDecode = json_decode(fgets($myFile),true);
                            if($userRecordDecode["acc_name"] && $userRecordDecode["password"]){
                                $check = true;
                                echo "<tr>";
                                echo "<td>";
                                print_r($userRecordDecode["acc_name"]);
                                echo "</td>";
                                echo "<td>";
                                print_r($userRecordDecode["password"]);
                                echo "</td>";
                                echo "</tr>";
                            }
                          }
                          if(!$check){
                            echo "<h5> No records found </h5>";
                          }
                        fclose($myFile);
                        ?>
                    </table><br>
                    <button class="btn btn-primary my-2 my-sm-0" type="submit" name="add_account" onclick="displayAddAccount()" >Add/Update</button>
                    <button class="btn btn-danger my-2 my-sm-0" type="submit" name="delete_account" onclick="displayDeleteAccount()">Delete account</button>
                </div>
                <div class="col hidden" id="addContainer">
                    <h5>Add or Update records</h5>
                    <form method="POST" action="" class="form-add">
                        <label>Enter your account name </label>
                        <input type="text" name="account_name_add" placeholder="Enter account name">
                        <?php echo $addNameErr ?>
                        <label>Enter your password </label>
                        <input type="password" name="password_add" placeholder="Enter your passord">
                        <?php echo $addPassErr ?>
                        <input type="submit" class="btn-add" name="addField" value="Add account">
                    </form>
                </div>
                <div class="col hidden" id="deleteContainer">
                    <h5>Delete record</h5>
                    <form method="POST" action="" class="form-delete">
                        <label>Enter your account name </label>
                        <input type="text" name="account_name_delete" placeholder="Enter account name">
                        <input type="submit" class="btn-delete" name="deleteField" value="Delete account">
                    </form>
                </div>
            </div>
            <div class="row mt-5 hidden" id="user-content" >
            <h5>User details</h5>
            <hr><br><br>
            <h2>Welcome <?php echo $_SESSION['user_name'] ?></h2>
            </div>
        </div>
    </div>
</div>
<script src='../scripts//userTimings.js'></script>
</body>
</html>
