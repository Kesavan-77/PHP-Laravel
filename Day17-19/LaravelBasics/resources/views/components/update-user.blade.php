<form class="updateUserForm form" id="updateUserForm">
    @csrf
    @method('put')
    <h2>Update user data</h2>
    <input type="hidden" name="id" id="update-id">
    <label>Enter user name: </label><br>
    <input type="text" name="name" id="update-name" placeholder="Enter user name">
    <span id="update-name-err" class="form-text text-danger hidden"><br>Enter a valid name</span><br>
    <label>Enter user class: </label><br>
    <input type="text" name="class" id="update-class" placeholder="Enter user class">
    <span id="update-class-err" class="form-text text-danger hidden"><br>Enter a valid name</span><br>
    <label>Enter user address: </label><br>
    <input type="text" name="address" id="update-address" placeholder="Enter user address">
    <span id="update-address-err" class="form-text text-danger hidden"><br>Enter a valid name</span><br>
    <label>Enter user age: </label><br>
    <input type="number" name="age" id="update-age" placeholder="Enter user age">
    <span id="update-age-err" class="form-text text-danger hidden"><br>Enter a valid name</span><br><br>
    <button type="submit" class="btn btn-success" id="update-user">Update user</button>
</form>
