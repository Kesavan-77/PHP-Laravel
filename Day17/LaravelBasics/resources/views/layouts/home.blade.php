<!-- layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="css/text" href="../../css/app.css">
    <title>CRUD operations</title>
</head>
<style>
.container{
    display:flex;
    gap:2rem;
}
</style>
<body>
    <div class="container">
        <div class="form-container">
            <div>
                <form class='add-form' action='/add' method="POST">
                    @csrf
                    <h1>Add form</h1>
                    <label>Enter your id: </label>
                    <input type="text" name="user-id" placeholder="Enter your id"><br><br>
                    <label>Enter your name: </label>
                    <input type="text" name="user-name" placeholder="Enter your name"><br><br>
                    <label>Enter your email: </label>
                    <input type="text" name="user-email" placeholder="Enter your email"><br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div>
                <form class='update-form' action='/update' method="POST">
                    @csrf
                    <h1>Update form</h1>
                    <label>Enter your id: </label>
                    <input type="text" name="user-id" placeholder="Enter your id"><br><br>
                    <label>Enter your name: </label>
                    <input type="text" name="user-name" placeholder="Enter your name"><br><br>
                    <label>Enter your email: </label>
                    <input type="text" name="user-email" placeholder="Enter your email"><br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div>
                <form class='delete-form' action='/delete' method="POST">
                    @csrf
                    <h1>Delete form</h1>
                    <label>Enter your id: </label>
                    <input type="text" name="user-id" placeholder="Enter your id"><br><br>
                    <label>Enter your email: </label>
                    <input type="text" name="user-email" placeholder="Enter your email"><br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class='display-form'>
            @if (!empty($userDetails))
                @foreach ($userDetails as $user)
                    <p>User ID: {{ $user->id }}</p>
                    <p>User Name: {{ $user->name }}</p>
                    <p>User Email: {{ $user->email }}</p>
                @endforeach
            @endif
        </div>
    </div>
</body>

</html>
