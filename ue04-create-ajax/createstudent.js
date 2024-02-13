$(document).ready(function() {
    $('#create-student-btn').click(function () {
        $('#create-student-modal').modal('show');
    });

    $('#save-student-btn').click(function() {
        $('#create-student-modal').modal('hide');
        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();
        let dob = $('#dob').val();

        $.ajax({
            url: 'http://127.0.0.1/.../createstudent.php',
            method: 'POST',
            data: {
                firstname: firstname,
                lastname: lastname,
                dob: dob,
                ajax: true
            },
            success: function(response) {
                // Hier Antwort verarbeiten, z. B. eine Erfolgsmeldung anzeigen
                if(response.success)
                    console.log('Daten erfolgreich gespeichert:', response.success);
                else
                    console.log('Daten nicht erfolgreich gespeichert!');
            }
        });
    });
});