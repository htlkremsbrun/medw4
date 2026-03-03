<?php
function requireLogin(): void {
    if (!isset($_SESSION['player_id'])) {
        header('Location: login.php');
        exit;
    }
}