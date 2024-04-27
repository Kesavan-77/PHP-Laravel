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
<body class="d-flex p-5 bg-primary">
    <div class="container p-5 rounded" style="width: 400px;">
        <div class="main-content">
            <h1>User Authentication System</h1>
            <hr>
            <p>Maintain your details and password</p>
            <a href="./components/login.php">
            <button type="button" class="btn btn-primary btn-lg">Create your own account</button></a>
        </div>
    </div>
</body>
</html>