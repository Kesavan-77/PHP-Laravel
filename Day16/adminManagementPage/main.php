<!DOCTYPE html>
<html lang="en">
    <?php require './components/myDB.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./styles/main.css">
    
    <title>ShopZone</title>
</head>
<style>
    body{
        background-color: hsl(26, 100%, 55%);
    }
    .btn{
        background-color: hsl(26, 100%, 55%);
        color: #fff;
    }
    .btn:hover{
        background-color: hsl(26, 100%, 55%);
        color: #fff;
    }
</style>
<body class="d-flex p-5">
    <div class="container p-5 rounded" style="width: 400px;">
        <div class="main-content">
            <h1>ShopZone</h1>
            <hr>
            <p>Admin portal for shopzone</p>
            <a href="./components/login.php">
            <button type="button" class="btn btn-lg">Admin login</button></a>
        </div>
    </div>
</body>
</html>