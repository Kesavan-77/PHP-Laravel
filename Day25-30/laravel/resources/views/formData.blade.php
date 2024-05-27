<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Student Information Form</h2>
    <form action='{{route('form.store')}}' method='POST'>
        @csrf
        <div class="form-group">
            <label for="rollNo">Roll Number</label>
            <input type="text" class="form-control" id="rollNo" name='roll_no' placeholder="Enter roll number" value='{{old('roll_no')}}' autofocus>
            <p class="text-danger">@error('roll_no')
            {{$message}}
            @enderror</p>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value='{{old('name')}}'>
            <p class="text-danger">@error('name')
            {{$message}}
            @enderror</p>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value='{{old('email')}}'>
            <p class="text-danger">@error('email')
            {{$message}}
            @enderror</p>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" value='{{old('gender')}}'>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
            <p class="text-danger">@error('gender')
            {{$message}}
            @enderror</p>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" value='{{old('age')}}'>
            <p class="text-danger">@error('age')
            {{$message}}
            @enderror</p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
