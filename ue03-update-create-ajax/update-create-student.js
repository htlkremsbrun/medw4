$(document).ready(function () {
    function getStudentData(){
        $.ajax({
            url: 'http://127.0.0.1/medt4/UE03/AjaxSolutions/update-create-student.php',
            method: 'GET',
            data: "ajax",
            dataType: 'json',
            success: function (data) {
                if (data.length > 0) {
                    let table = '<table class="table"><thead><tr><th>Vorname</th><th>Nachname</th><th>Geburtsdatum</th><th>Operationen</th></tr></thead><tbody>';
                    $.each(data, function (index, student) {
                        table += '<tr>';
                        table += '<td>' + student.firstname + '</td>';
                        table += '<td>' + student.lastname + '</td>';
                        table += '<td>' + student.dob + '</td>';
                        table += '<td><a class="edit-student-btn" data-student-id="' + student.id + '"><i class="bi bi-pencil"></i></a></td>';
                        table += '</tr>';
                    });
                    table += '</tbody></table>';
                    $('#student-table').html(table);
                } else {
                    $('#student-table').html('<p class="alert alert-primary">Keine Datensätze verfügbar!</p>');
                }
            }
        });
    }
    getStudentData();

    $('#create-student-btn').click(function () {
        $('#create-student-modal').modal('show');
    });

    $('#save-student-btn').click(function() {
        $('#create-student-modal').modal('hide');
        let firstname = $('#create-student-modal #firstname').val();
        let lastname = $('#create-student-modal #lastname').val();
        let dob = $('#create-student-modal #dob').val();

        $.ajax({
            url: 'http://127.0.0.1/medt4/UE03/AjaxSolutions/createstudent.php',
            method: 'POST',
            data: {
                firstname: firstname,
                lastname: lastname,
                dob: dob,
                ajax: true
            },
            dataType: 'json',
            success: function(response) {
                // Hier Antwort verarbeiten, z. B. eine Erfolgsmeldung anzeigen
                if(response.success) {
                    getStudentData();
                    console.log('Student erfolgreich gespeichert:', response.success);
                }
                else
                    console.log('Student nicht erfolgreich gespeichert!');
            }
        });
    });

    $(document).on('click', '.edit-student-btn', function () {
        // Vorname, Nachname und Datum aus den Daten-Attributen des Icons bzw. a-Tag auslesen
        // closest('tr') selektiert das erste übergeordnete 'tr'
        // find('td:eq(0)') sucht innerhalb der gefunden Zeile nach der 0., 1. oder 2. 'td'-Element (Zelle)
        let firstname = $(this).closest('tr').find('td:eq(0)').text();
        let lastname = $(this).closest('tr').find('td:eq(1)').text();
        let dob = $(this).closest('tr').find('td:eq(2)').text();
        let sId = $(this).data('student-id');

        // Daten in das Formular kopieren
        $('#update-student-modal #firstname').val(firstname);
        $('#update-student-modal #lastname').val(lastname);
        $('#update-student-modal #dob').val(dob);
        $('#update-student-modal #student-id').val(sId);
        // Modal (Dialog) öffnen
        $('#update-student-modal').modal('show');
    });

    // Click-Event an den Speichern-Button binden
    $('#update-student-btn').click(function () {
        // Formulardaten auslesen
        let firstname = $('#update-student-modal #firstname').val();
        let lastname = $('#update-student-modal #lastname').val();
        let dob = $('#update-student-modal #dob').val();
        let studentId = $('#update-student-modal #student-id').val()

        $.ajax({
            url: 'http://127.0.0.1/medt4/UE03/AjaxSolutions/updatestudent.php',
            method: 'POST',
            data: {
                firstname: firstname,
                lastname: lastname,
                dob: dob,
                studentId: studentId,
                ajax: true,
                update: true
            },
            dataType: 'json',
            success: function (response) {
                // Antwort verarbeiten
                if (response.success) {
                    // Tabelle aktualisieren nicht vergessen!
                    getStudentData();
                    console.log('Daten erfolgreich gespeichert!');
                }else {
                    console.log('Daten nicht erfolgreich gespeichert!');
                }
            }
        });
        // Modal schließen
        $('#update-student-modal').modal('hide');
    });
});