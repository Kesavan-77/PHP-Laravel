<!DOCTYPE html>
<html>
<head>
    <title>Result Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container bg-dark">
    <br><br>
    <form action='./form.php'>
    <h1 class="text-center text-light">Your details have been submitted</h1>
    <div class="text-light">
        <?php
        $name = $_GET['name'];
        $email = $_GET['email'];
        $url = $_GET['url'];
        $adult = $_GET['adult'];
        $ph_no = $_GET['ph_no'];
        $message = $_GET['msg'];
        $cookieMessage = "name: $name|| email: $email || url: $url || adult: $adult || ph_no: $ph_no || message: $message";
        setcookie($email, $cookieMessage, time() + (86400 * 30), "/");
        echo "<p>Name: " . htmlspecialchars($name) . "</p>";
        echo "<p>email: " . htmlspecialchars($email) . "</p>";
        echo "<p>website url: " . htmlspecialchars($url) . "</p>";
        echo "<p>adult: " . htmlspecialchars($adult) . "</p>";
        echo "<p>ph_no: " . htmlspecialchars($ph_no) . "</p>";
        echo "<p>message: " . htmlspecialchars($message) . "</p>";
        echo "<br>";
        ?>
        <button type="submit" name="submit" class="btn btn-primary">Submit another response</button>
    </div>
    </form>
</body>
</html>
