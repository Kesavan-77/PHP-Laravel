<script>
    $(document).ready(function() {

        // Toggle Guardian Form
        $('.register-guardian-btn').on('click', function() {
            $('.addGuardianForm').toggleClass('hidden');
            $('.addStudentForm').addClass('hidden');
            $('.updateGuardianForm').addClass('hidden');
        })

        // Toggle Student Form
        $('.register-student-btn').on('click', function() {
            $('.addStudentForm').toggleClass('hidden');
            $('.addGuardianForm').addClass('hidden');
            $('.updateGuardianForm').addClass('hidden');
        })

        // Validate and Submit Guardian Form
        $('#add-guardian').on('click', function(e) {
            let guardianName = $('#add-guardian-name').val().trim();
            let guardianNumber = $('#add-guardian-number').val().trim();
            let guardianEmail = $('#add-guardian-email').val().trim();
            let guardianStatus = $('#add-guardian-status').val();

            let validation = true;

            if (guardianName.length === 0 || guardianName.match(/[0-9]/g)) {
                validation = false;
                $('#guard-name-err').removeClass('hidden');
            } else $('#guard-name-err').addClass('hidden');

            if (guardianNumber.length !== 10 || isNaN(guardianNumber)) {
                validation = false;
                $('#guard-number-err').removeClass('hidden');
            } else $('#guard-number-err').addClass('hidden');

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(guardianEmail)) {
                validation = false;
                $('#guard-email-err').removeClass('hidden');
            } else $('#guard-email-err').addClass('hidden');

            if (guardianStatus !== 'active' && guardianStatus !== 'inactive') {
                validation = false;
                $('#guard-status-err').removeClass('hidden');
            } else $('#guard-status-err').addClass('hidden');

            if (validation) {
                $('#addGuardianForm').attr('method', 'POST');
                $('#addGuardianForm').attr('action', '/');
            } else {
                e.preventDefault();
            }
        })

        // Validate and Submit Student Form
        $('#add-student').on('click', function(e) {
            let studentName = $('#add-student-name').val().trim();
            let studentAge = $('#add-student-age').val().trim();
            let studentGrade = $('#add-student-grade').val().trim();
            let studentRelation = $('#add-student-relation').val().trim();
            let studentStatus = $('#add-student-status').val();

            let validation = true;

            if (studentName.length === 0 || studentName.match(/[0-9]/g)) {
                validation = false;
                $('#stud-name-err').removeClass('hidden');
            } else $('#stud-name-err').addClass('hidden');

            if (studentAge.length<=0 || parseInt(studentAge) <= 0) {
                validation = false;
                $('#stud-age-err').removeClass('hidden');
            } else $('#stud-age-err').addClass('hidden');

            if (studentGrade.length<=0 || parseInt(studentGrade) <= 0) {
                validation = false;
                $('#stud-grade-err').removeClass('hidden');
            } else $('#stud-grade-err').addClass('hidden');

            if (studentRelation.length === 0 || studentRelation.match(/[0-9]/g)) {
                validation = false;
                $('#stud-relation-err').removeClass('hidden');
            } else $('#stud-relation-err').addClass('hidden');

            if (studentStatus !== 'active' && studentStatus !== 'inactive') {
                validation = false;
                $('#stud-status-err').removeClass('hidden');
            } else $('#stud-status-err').addClass('hidden');

            if (validation) {
                $('#addStudentForm').attr('method', 'POST');
                $('#addStudentForm').attr('action', '/student');
            } else {
                e.preventDefault();
            }
        })

        // Edit User
        $('.edit-user-btn').on('click', function() {
            var id = $(this).closest('tr').children().eq(0).text();
            console.log(id);

            $('.updateGuardianForm').removeClass('hidden');
        })

    })
</script>