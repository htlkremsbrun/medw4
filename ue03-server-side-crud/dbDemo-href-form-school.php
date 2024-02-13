<?php
require "db.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Database CRUD Server Side</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="container">

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'delete' && isset($_POST['id'])) {
        $idToDelete = $_POST['id'];
        // Löschen
        $currentStmt = $conn->prepare("DELETE FROM students WHERE id = :id");
        $currentStmt->bindParam('id', $idToDelete, PDO::PARAM_INT);
        $queryResult = $currentStmt->execute();

        if ($queryResult) {
            echo '<p class="alert alert-success">Löschen erfolgreich!</p>';
        } else {
            echo '<p class="alert alert-danger">Löschen nicht erfolgreich!</p>';
        }
    } elseif ($_POST['action'] == 'create') {
        // Prepared Statement erstellen
        $currentStmt = $conn->prepare("INSERT INTO students (firstname, lastname, dob) VALUES (:firstname, :lastname, :dob)");

        // Parameter binden
        $currentStmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $currentStmt->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $currentStmt->bindParam(':dob', $_POST['dob'], PDO::PARAM_STR);

        // Statement ausführen
        $currentStmt->execute();
    } elseif ($_POST['action'] == 'edit') {
        // Prepared Statement erstellen
        $currentStmt = $conn->prepare("UPDATE students SET firstname = :firstname, lastname = :lastname, dob = :dob WHERE id = :id");

        // Parameter binden
        $currentStmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
        $currentStmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $currentStmt->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $currentStmt->bindParam(':dob', $_POST['dob'], PDO::PARAM_STR);

        // Statement ausführen
        $currentStmt->execute();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    // Abfrage für Vor- und Nachnamen
    $nameQuery = $conn->prepare("SELECT firstname, lastname FROM students WHERE id = :id");
    $nameQuery->bindParam('id', $idToDelete, PDO::PARAM_INT);
    $nameQuery->execute();
    $nameResult = $nameQuery->fetch(PDO::FETCH_ASSOC);
    $firstname = $nameResult['firstname'];
    $lastname = $nameResult['lastname'];

    // Formular für die Bestätigung des Löschvorgangs ausgeben
    echo "
        <h1>Student:in löschen</h1>
        <form method='post' action='dbDemo-href-form-school.php'>
            <input type='hidden' name='action' value='delete'>
            <input type='hidden' name='id' value='$idToDelete'>
            <p>Möchten Sie <b>$firstname $lastname </b>wirklich löschen?</p>
            <button type='submit' class='btn btn-danger'>Löschen</button>
            <a href='dbDemo-href-form-school.php' class='btn btn-secondary'>Abbrechen</a>
        </form>";
    // Die HTML-Tabelle wird hier nicht ausgegeben!
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == "create") { ?>
    <h1>Student:in erstellen</h1>
    <?php
    $action = "create";
    include "./inc/student-form.php";
    ?>
<?php } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == "edit") { ?>
    <h1>Student:in bearbeiten</h1>
    <?php
    $action = "edit";
    $query = $conn->prepare("SELECT * FROM students WHERE id = :id");
    $query->bindParam('id', $_GET['id'], PDO::PARAM_INT);
    $query->execute();
    $student = $query->fetch(PDO::FETCH_ASSOC);
    $formData = [$student['id'], $student['firstname'], $student['lastname'], $student['dob']];
    include "./inc/student-form.php";
} else {
    ?>
    <h1>Studenten:innenübersicht</h1>
    <a href="dbDemo-href-form-school.php?action=create">
        <button type="button" class="btn btn-primary">Student:in anlegen</button>
    </a>
    <?php
    include "./inc/students-table.inc.php";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>


