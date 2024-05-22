<!DOCTYPE html>
<html>

<head>
    <title>welcome</title>
</head>

<body>
    <h1>Welcome {{ $name }}</h1>
    <form action='/success' method='post'>
        @csrf
        <input type="hidden" name="name" value='{{ $name }}'>
        <input type="text" name="role" placeholder="Enter your role" required><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>
