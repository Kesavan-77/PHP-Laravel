<!DOCTYPE html>
<html>

<head>
    <title>welcome</title>
</head>

<body>
    <h1>Welcome</h1>
    <form action='/role' method='post'>
        @csrf
        <input type="text" name="name" placeholder="Enter your name" required><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>