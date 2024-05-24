<!DOCTYPE html>
<html>

<head>
    <title>welcome</title>
</head>
<body>
    <h1>Session Welcome</h1>
    <form action={{ route('session.store') }} method='POST'>
        @csrf
        <input type="email" name="email" placeholder="Enter your mail" required><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>
