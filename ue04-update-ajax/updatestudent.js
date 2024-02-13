$(document).ready(function () {
    function getStudentData(){
        $.ajax({
            url: 'http://127.0.0.1/.../updatestudent.php',
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

    $(document).on('click', '.edit-student-btn', function () {
        // Vorname, Nachname und Datum aus den Daten-Attributen des Icons bzw. a-Tag auslesen
        // closest('tr') selektiert das erste übergeordnete 'tr'
        // find('td:eq(0)') sucht innerhalb der gefunden Zeile nach der 0., 1. oder 2. 'td'-Element (Zelle)
        let firstname = $(this).closest('tr').find('td:eq(0)').text();
        let lastname = $(this).closest('tr').find('td:eq(1)').text();
        let dob = $(this).closest('tr').find('td:eq(2)').text();
        let sId = $(this).data('student-id');

        // Daten in das Formular kopieren
        $('#firstname').val(firstname);
        $('#lastname').val(lastname);
        $('#dob').val(dob);
        $('#student-id').val(sId);
        // Modal (Dialog) öffnen
        $('#update-student-modal').modal('show');
    });

    // Click-Event an den Speichern-Button binden
    $('#update-student-btn').click(function () {
        // Formulardaten auslesen
        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();
        let dob = $('#dob').val();
        let studentId = $('#student-id').val()

        $.ajax({
            url: 'http://127.0.0.1/.../updatestudent.php',
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
                console.log(response);
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