<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Database</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="sidebar">
        <h5>My Database</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/">Guardian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/student">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/course">Courses</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="tab-content">
            <div class="tab-pane fade" id="option1">
                
            </div>
            <div class="tab-pane fade show active" id="option2">
                <x-studentAddform :data='$guardianData' />
            </div>
            <div class="tab-pane fade" id="option3">
                <h5>Option 3 Content</h5>
                <p>This is the content for Option 3.</p>
            </div>
        </div>
    </div>
    <x-script />
</body>

</html>
