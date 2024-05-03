<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="css/text" href="../../css/app.css">
    <title>CRUD operations</title>
</head>
<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 2rem;
    }

    .form-container {
        display: flex;
        gap: 2rem;
    }

    .add-form,
    .update-form,
    .delete-form {
        background-color: orange;
        padding: 2rem;
        border-radius: 10px;
        height: 350px;
    }

    h1 {
        color: #fff;
    }

    label {
        color: #fff;
        font-size: 18px;
        font-weight: 600;
    }

    input {
        padding: 8px 15px 8px 15px;
        border-style: none;
        border: 1px solid grey;
        border-radius: 5px;
        margin-top: 10px;

    }

    button {
        padding: 5px 12px 5px 12px;
        background-color: green;
        color: #fff;
        font-weight: 600;
        padding: 0.7rem;
        font-size: 18px;
        border-style: none;
        border-radius: 7px;
        cursor: pointer;
    }
    th,td{
        font-size:18px;
        padding-left:5rem;
        padding-top:1rem;
    }
</style>

<body>
    <div class="container">
        <div class="form-container">
            <div>
                <form class='add-form' action='/add' method="POST">
                    @csrf
                    <h1>Add form</h1>
                    <label>Enter your id: </label><br>
                    <input type="text" name="user-id" placeholder="Enter your id" required><br><br>
                    <label>Enter your name: </label><br>
                    <input type="text" name="user-name" placeholder="Enter your name" required><br><br>
                    <label>Enter your email: </label><br>
                    <input type="email" name="user-email" placeholder="Enter your email" required><br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div>
                <form class='update-form' action='/update' method="POST">
                    @csrf
                    <h1>Update form</h1>
                    <label>Enter your id: </label><br>
                    <input type="text" name="user-id" placeholder="Enter your id" required><br><br>
                    <label>Enter your name: </label><br>
                    <input type="text" name="user-name" placeholder="Enter your name" required><br><br>
                    <label>Enter your email: </label><br>
                    <input type="text" name="user-email" placeholder="Enter your email" required><br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div>
                <form class='delete-form' action='/delete' method="POST">
                    @csrf
                    <h1>Delete form</h1>
                    <label>Enter your id: </label><br>
                    <input type="text" name="user-id" placeholder="Enter your id" required><br><br>
                    <label>Enter your email: </label><br>
                    <input type="text" name="user-email" placeholder="Enter your email" required><br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class='display-form'>
            <table>
                <tr>
                    <th>USER_ID</th>
                    <th>USER_NAME</th>
                    <th>USER_EMAIL</th>
                </tr>
                @if (!empty($userDetails))
                    @foreach ($userDetails as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                        <tr>
                    @endforeach
                @endif
                </table>
        </div>
    </div>
</body>

</html>
