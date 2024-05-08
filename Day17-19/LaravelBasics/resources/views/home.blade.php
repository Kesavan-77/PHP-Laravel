<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand fw-bold text-secondary">My Collections</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="addUser hidden">
        <x-add-user />
    </div>
    <div class="updateUser hidden">
        <x-update-user />
    </div>
    <main class="container mt-5">
        <div class="bg-primary p-2 d-flex justify-content-between">
            <h2 class="text-light fw-bold">User Table</h2>
            <button type="button" class="btn btn-light px-5" id="add-user-btn">Add user</button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">CLASS</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">ADULT</th>
                    <th colspan="2" class="text-center">OPERATIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr class="user-info">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->class }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->isAdult }}</td>
                        <td class="text-center"><button type="button"
                                class="btn btn-warning edit-user-btn">Edit</button></td>
                        <td>
                            <form action="{{ route('form.destroy', ['form' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-user-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
<script>
    $(document).ready(function() {

        //toggle operation for add and update
        var addUser = $('.addUser');
        var editUser = $('.updateUser');
        $('#add-user-btn').on('click', function() {
            $(addUser).toggleClass('hidden');
            $(editUser).addClass('hidden');
        });

        $('.delete-user-btn').on('click', function(e) {
            var confirm = prompt("Are you sure about deleting the user y/n");
            if (confirm === 'y' || confirm === 'Y') {
                alert('Deleted Successfully');
            } else if (confirm === 'n' || confirm === 'N'){
                e.preventDefault();
                alert('done');
                }
            else {
                while (!(confirm == 'y' || confirm == 'Y' || confirm == 'n' || confirm == 'N')) {
                    alert('Enter y or n only');
                    confirm = prompt("Are you sure about deleting the user y/n");
                }
            }
        })

        $('.edit-user-btn').on('click', function() {
            $(editUser).toggleClass('hidden');
            $(addUser).addClass('hidden');
            var id = $(this).closest('tr').children().eq(0).text();
            var firstSiblingText = $(this).closest('tr').children().eq(1).text();
            updateId = parseInt(firstSiblingText);
            $('#update-name').val(firstSiblingText);

            $('#update-id').val(id);

            var secondSiblingText = $(this).closest('tr').children().eq(2).text();
            $('#update-class').val(secondSiblingText);

            var thirdSiblingText = $(this).closest('tr').children().eq(3).text();
            $('#update-address').val(thirdSiblingText);

            var fourthSiblingText = $(this).closest('tr').children().eq(4).text();
            $('#update-age').val(fourthSiblingText);

        });


        //validate data for updateUser
        $('#update-user').on('click', function(e) {
            let updateName = $('#update-name').val();
            let updateClass = $('#update-class').val();
            let updateAddress = $('#update-address').val();
            let updateAge = $('#update-age').val();

            let validation = true;

            if (updateName.trim().length <= 0 || updateName.match(/[1-9]/g)) {
                validation = false;
                $('#update-name-err').removeClass('hidden');
            } else $('#update-name-err').addClass('hidden');

            if (updateClass.trim().length <= 0 || updateClass.match(/[1-9]/g)) {
                validation = false;
                $('#update-class-err').removeClass('hidden');
            } else $('#update-class-err').addClass('hidden');

            if (updateAddress.trim().length <= 0 || !updateAddress.match(/[1-9a-zA-z]/g)) {
                validation = false;
                $('#update-address-err').removeClass('hidden');
            } else $('#update-address-err').addClass('hidden');

            if (updateAge.trim().length <= 0 || parseInt(updateAge) < 0 || parseInt(updateAge) > 150) {
                validation = false;
                $('#update-age-err').removeClass('hidden');
            } else $('#update-age-err').addClass('hidden');

            if (validation) {
                $('#updateUserForm').attr('method', 'POST');
                $('#updateUserForm').attr('action', '{{ route('form.update', ['form' => '23']) }}');

            } else {
                e.preventDefault();
            }


        })

        //validate data for addUser
        $('#add-user').on('click', function(e) {
            let addName = $('#add-name').val();
            let addClass = $('#add-class').val();
            let addAddress = $('#add-address').val();
            let addAge = $('#add-age').val();

            let validation = true;

            if (addName.trim().length <= 0 || addName.match(/[1-9]/g)) {
                validation = false;
                $('#add-name-err').removeClass('hidden');
            } else $('#add-name-err').addClass('hidden');

            if (addClass.trim().length <= 0 || addClass.match(/[1-9]/g)) {
                validation = false;
                $('#add-class-err').removeClass('hidden');
            } else $('#add-class-err').addClass('hidden');

            if (addAddress.trim().length <= 0 || !addAddress.match(/[1-9a-zA-z]/g)) {
                validation = false;
                $('#add-address-err').removeClass('hidden');
            } else $('#add-address-err').addClass('hidden');

            if (addAge.trim().length <= 0 || parseInt(addAge) < 0 || parseInt(addAge) > 150) {
                validation = false;
                $('#add-age-err').removeClass('hidden');
            } else $('#add-age-err').addClass('hidden');

            if (validation) {
                $('#addUserForm').attr('method', 'POST');
                $('#addUserForm').attr('action', '{{ route('form.store') }}');
            } else {
                e.preventDefault();
            }
        })
    });
</script>

</html>
