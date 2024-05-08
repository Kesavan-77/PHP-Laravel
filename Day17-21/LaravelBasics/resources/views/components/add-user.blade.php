<form class="addUserForm form" id='addUserForm'>
    @csrf
    <h2>Add user data</h2>
    <label>Enter user name: </label><br>
    <input type="text" name="name" id="add-name" placeholder="Enter user name">
    <span id="add-name-err" class="form-text text-danger hidden"><br>Enter a valid name</span><br>

    <label>Enter user class: </label><br>
    <input type="text" name="class" id="add-class" placeholder="Enter user class">
    <span id="add-class-err" class="form-text text-danger hidden"><br>Enter a valid class</span><br>

    <label>Enter user address: </label><br>
    <input type="text" name="address" id="add-address" placeholder="Enter user address">
    <span id="add-address-err" class="form-text text-danger hidden"><br>Enter a valid address</span><br>

    <label>Enter user age: </label><br>
    <input type="number" name="age" id="add-age" placeholder="Enter user age">
    <span id="add-age-err" class="form-text text-danger hidden"><br>Enter a valid age</span><br><br>

    <button type="submit" class="btn btn-success" id="add-user">Add user</button>
</form>