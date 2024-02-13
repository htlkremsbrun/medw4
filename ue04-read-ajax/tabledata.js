$(document).ready(function(){
    $.ajax({
        url: 'http://127.0.0.1/.../tabledata.php',
        method: 'GET',
        data: "ajax",
        dataType: 'json',
        success: function(data){
            if(data.length > 0){
                let table = '<table class="table"><thead><tr><th>Vorname</th><th>Nachname</th><th>Geburtsdatum</th><th>Operationen</th></tr></thead><tbody>';
                $.each(data, function(index, student){
                    table += '<tr>';
                    table += '<td>' + student.firstname + '</td>';
                    table += '<td>' + student.lastname + '</td>';
                    table += '<td>' + student.dob + '</td>';
                    table += '<td><a href="?action=delete&id=' + student.id + '"><i class="bi bi-trash"></i></a></td>';
                    table += '</tr>';
                });
                table += '</tbody></table>';
                $('#student-table').html(table);
            } else {
                $('#student-table').html('<p class="alert alert-primary">Keine Datensätze verfügbar!</p>');
            }
        }
    });
});
