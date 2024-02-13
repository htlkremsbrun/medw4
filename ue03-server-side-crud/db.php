<?php

$user = "";
$pwd = "";

try {
    $conn = new PDO('mysql:host=localhost;dbname=supercode', $user, $pwd);
} catch (Exception $e) {
    exit("<p>Das System ist gegenwärtig nicht verfügbar! Fragen bitte an admin@salzamt.at</p>");
}

