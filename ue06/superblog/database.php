<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=medw4_superblog;charset=utf8',
    'root',
    ''
);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>
