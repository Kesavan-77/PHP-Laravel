<!DOCTYPE html>
<?php 
    include './logic.php'
?>
<html>
    <head>
        <title>
            FromValidation
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body class="container bg-dark">
        <br><br>
        <h1 class="text-center text-light">Form validation</h1>
        <form class=" bg-dark text-light p-5" method="POST" action='' enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputName1">Enter name</label>
            <input type="name" name="name" class="form-control mt-2" id="exampleInputName1" placeholder="Enter name" value="<?php if(isset($name)) echo $name; ?>">
            <?php echo "<p class='text-danger'> $nameErr</p>"; ?>
        </div><br>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php if(isset($email)) echo $email; ?>">
            <?php echo "<p class='text-danger'> $emailErr</p>"; ?>
        </div><br>
        <div class="form-group">
            <label for="exampleInputURL1">Enter Website URL</label>
            <input type="url" name="url" class="form-control mt-2" id="exampleInputURL1" placeholder="Enter name" value="<?php if(isset($url)) echo $url; ?>">
            <?php echo "<p class='text-danger'> $urlErr</p>"; ?>
        </div><br>
        <div class="form-group">
            <label for="exampleInputadult">Are you an adult? (enter true or false)</label>
            <input type="name" name="adult" class="form-control mt-2" id="exampleInputadult" placeholder="Enter name" value="<?php if(isset($adult)) echo $adult; ?>">
            <?php echo "<p class='text-danger'> $adultErr</p>"; ?>
        </div><br>
        <div class="form-group">
            <label for="exampleInputnumber">Enter Phone number</label>
            <input type="name" name="number" class="form-control mt-2" id="exampleInputnumber" placeholder="Enter name" value="<?php if(isset($ph_no)) echo $ph_no; ?>">
            <?php echo "<p class='text-danger'> $phErr</p>"; ?>
        </div><br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Enter Message</label>
            <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" rows="3"><?php if(isset($message)) echo $message; ?></textarea>
            <?php echo "<p class='text-danger'> $msgErr</p>"; ?>
        </div><br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>
    
</html>
