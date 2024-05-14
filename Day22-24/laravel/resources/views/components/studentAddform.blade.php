<form class="addStudentForm form mt-3" id="addStudentForm">
    @csrf
    <h2 style="color: #fff;">Add Student data</h2>

    <div class="form-group row">
        <label for="add-student-name" class="col-sm-3 col-form-label" style="color: #fff;">Enter student name:</label>
        <div class="col-sm-9">
            <input type="text" name="name" class="form-control" id="add-student-name" placeholder="Enter student name" required style="background-color: #333; color: #fff; border-color: #555;">
            <span id="stud-name-err" class="form-text text-danger hidden">Enter a valid name</span>
        </div>
    </div>

    <div class="form-group row">
        <label for="add-student-age" class="col-sm-3 col-form-label" style="color: #fff;">Enter student age:</label>
        <div class="col-sm-9">
            <input type="text" name="age" class="form-control" id="add-student-age" placeholder="Enter student age" required style="background-color: #333; color: #fff; border-color: #555;">
            <span id="stud-age-err" class="form-text text-danger hidden">Enter a valid age</span>
        </div>
    </div>

    <div class="form-group row">
        <label for="add-student-grade" class="col-sm-3 col-form-label" style="color: #fff;">Enter student grade:</label>
        <div class="col-sm-9">
            <input type="text" name="grade" class="form-control" id="add-student-grade" placeholder="Enter student grade" required style="background-color: #333; color: #fff; border-color: #555;">
            <span id="stud-grade-err" class="form-text text-danger hidden">Enter a valid grade</span>
        </div>
    </div>

    <div class="form-group row">
        <label for="add-guardian-id" class="col-sm-3 col-form-label" style="color: #fff;">Select guardian id:</label>
        <div class="col-sm-9" required>
            <select name="guardianId" class="form-control" id="add-guardian-id" style="background-color: #333; color: #fff; border-color: #555;">
                @foreach ($data as $item)
                    <option value="{{ $item->id }}">Guardian ID : {{ $item->id }}</option>
                @endforeach
            </select>
            <span id="guardian-id-err" class="form-text text-danger hidden">Enter a valid guardian id</span>
        </div>
    </div>

    <div class="form-group row">
        <label for="add-student-relation" class="col-sm-3 col-form-label" style="color: #fff;">Enter guardian relation:</label>
        <div class="col-sm-9">
            <input type="text" name="relationship" class="form-control" id="add-student-relation" placeholder="Enter guardian relation" required style="background-color: #333; color: #fff; border-color: #555;">
            <span id="stud-relation-err" class="form-text text-danger hidden">Enter a valid relation</span>
        </div>
    </div>

    <div class="form-group row">
        <label for="add-student-status" class="col-sm-3 col-form-label" style="color: #fff;">Enter student status:</label>
        <div class="col-sm-9">
            <input type="text" name="status" class="form-control" id="add-student-status" placeholder="Enter student status" required style="background-color: #333; color: #fff; border-color: #555;">
            <span id="stud-status-err" class="form-text text-danger hidden">Enter a valid status</span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <button type="submit" class="btn btn-success mt-2" id="add-student" style="background-color: #28a745; border-color: #28a745;">Add Student</button>
            <a href="/student"><button type="button" class="btn btn-danger mt-2" style="background-color: #dc3545; border-color: #dc3545;">Cancel</button></a>
        </div>
    </div>
</form>
