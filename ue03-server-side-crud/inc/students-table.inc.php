<?php

require "db.php";

$sql = "SELECT * FROM students";

$result = $conn->query($sql);
$students = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
if (count($students) > 0) {
    ?>
    <table class="table">
        <thead>
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Geburtsdatum</th>
            <th>Operationen</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . $student['firstname'] . "</td>";
            echo "<td>" . $student['lastname'] . "</td>";
            echo "<td>" . $student['dob'] . "</td>";
            echo "<td>
<a href='dbDemo-href-form-school.php?action=delete&id=" . $student['id'] . "'><i class='bi bi-trash fs-4'></i></a>
<a href='dbDemo-href-form-school.php?action=edit&id=" . $student['id'] . "'><i class='bi bi-pencil fs-4 ms-2'></i></a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <?php
} else
    echo '<p class="alert alert-primary">Keine Datensätze verfügbar!</p>';
?>
