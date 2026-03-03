<?php
$dbname = '';
$user   = '';
$pass   = '';

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=$dbname;charset=utf8",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    // Wir geben keine Details nach außen!
    die('Verbindung fehlgeschlagen.');
}
