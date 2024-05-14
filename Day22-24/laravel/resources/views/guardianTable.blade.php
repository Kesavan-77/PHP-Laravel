@extends('home')

@section('guardian-table')
<table class="table table-bordered mt-3">
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
                            <button type="submit" class="btn btn-danger delete-user-btn">Delete</button>
                        </form>
                    </td>
                    <td class="text-center"><button type="button" class="btn btn-primary">Show Details</button></td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
@endsection