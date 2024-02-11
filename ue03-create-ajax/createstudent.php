<?php

$user = "";
$pwd = "";

try {
    $conn = new PDO('mysql:host=localhost;dbname=supercode', $user, $pwd);
} catch (Exception $e) {
    exit();
}

if (isset($_POST['ajax'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];

    $sql = "INSERT INTO students (firstname, lastname, dob) VALUES (:firstname, :lastname, :dob)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':dob', $dob);

    $stmt->execute();

    if ($stmt->rowCount()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

} else { ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Students Database Demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <style>
            i {
                color: red;
            }
        </style>
    </head>
    <body class="container">
    <h1>Studentenübersicht</h1>
    <button id="create-student-btn" type="button" class="btn btn-primary">Student anlegen</button>
    <div id="student-table"></div>

    <div class="modal fade" id="create-student-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Student:in erstellen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="firstname" class="col-form-label">Vorname</label>
                            <input type="text" class="form-control" id="firstname">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="col-form-label">Vorname</label>
                            <input type="text" class="form-control" id="lastname">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="col-form-label">DOB</label>
                            <input type="date" class="form-control" id="dob">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="save-student-btn" type="button" class="btn btn-primary">Speichern</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="createstudent.js"></script>
    </body>
    </html>
<?php } ?>