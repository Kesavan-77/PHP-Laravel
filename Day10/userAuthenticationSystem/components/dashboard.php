<!DOCTYPE html>
<?php
session_start();
if(isset($_POST['logout'])){
    $userName = $_SESSION['user_name'];
    $filePath = "../envs/".$userName."Timings.txt";
    $lastLine = trim(`tail -n 1 $filePath`);
    $data = json_decode($lastLine, true);
    $data['end'] = date("h:i:s A");
    $updatedJson = json_encode($data);
    file_put_contents($filePath, $updatedJson . "\n", FILE_APPEND);
    header("Location: /main.php");
    exit();
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styles/main.css">
    <title>User Authentication System</title>
</head>
<body>
<nav class="container navbar navbar-light justify-content-between">
  <a class="navbar-brand">Welcome <?php echo $_SESSION['user_name'] ?></a>
  <form class="form-inline" method="POST" action="">
    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="logout">Logout</button>
  </form>
</nav>
    <div class="dashboard">
    <div class="row main-content">
        <div class="col">
            <div class="timings">
            <h1 class="text-primary">User login details</h1>
                <hr>
                <?php 
                $userName = $_SESSION['user_name'];
                $myfile = fopen("../envs/".$userName."Timings.txt","r");
                while(!feof($myfile)) {
                    $timing = json_decode(fgets($myfile),true);
                    if($timing["end"]){
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
                  fclose($myfile);
                ?>
            </div>
        </div>
        <div class="col">
            <div class="user-info">
                <h1 class="text-primary">User Details</h1>
                <hr>
                 <p>User Name : <?php echo $_SESSION['user_name'] ?></p>
                <p>Email Address :  <?php echo $_SESSION['email_id'] ?> </p>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

