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
                <a class="nav-link active" data-toggle="tab" href="/">Guardian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/student">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="/course">Courses</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="option1">
                <x-guardianAddform />
            </div><br>
            <div class="tab-pane fade show active" id="option1">
                <x-guardianUpdateForm />
            </div><br>
            <div class="tab-pane fade show active" id="option1">
                <table class="table table-bordered mt-3 text-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">GUARDIAN_NAME</th>
                            <th scope="col">STUDENT_NAME</th>
                            <th scope="col">RELATIONSHIP</th>
                            <th scope="col">CONTACT_NUMBER</th>
                            <th scope="col">STATUS</th>
                            <th colspan="3" class="text-center">OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody class='display-section'>
                        @foreach ($GuardianData as $user)
                            @if (!empty($user->students->name))
                                <tr class="user-info">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->students->name }}</td>
                                    <td>{{ $user->relationship }}</td>
                                    <td>{{ $user->contact_number }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning edit-user-btn">Edit</button>
                                    </td>
                                    <td>
                                        <form action="/" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger delete-user-btn">Delete</button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                    <button type="button" class="btn btn-primary">Show details</button></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="option2">
                <h5>Option 2 Content</h5>
                <p>This is the content for Option 2.</p>
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
