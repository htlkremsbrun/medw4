<?php
// ToDo Schüler
?>

<!DOCTYPE html>
<html lang="de" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameBoard — Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .rank-gold   { background-color: rgba(255, 215,   0, 0.15); }
        .rank-silver { background-color: rgba(192, 192, 192, 0.10); }
        .rank-bronze { background-color: rgba(205, 127,  50, 0.10); }
        .rank-me     { background-color: rgba( 13, 110, 253, 0.20); font-weight: bold; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">GameBoard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Leaderboard</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        👾 <?= htmlspecialchars($_SESSION['username']) ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="profile.php">👤 Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php">🚪 Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <h2 class="mb-4 text-center">🏆 Highscore Leaderboard</h2>
            <?php
            $stmt    = $pdo->query('SELECT id, username, score FROM players WHERE active = true ORDER BY score DESC');
            $players = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // @ToDo: Check whether players are available. If not, we should display the message "No players available."
            ?>
            <table class="table table-dark table-hover rounded overflow-hidden">
                <thead>
                <tr>
                    <th style="width:60px;">#</th>
                    <th>Spieler</th>
                    <th class="text-end">Score</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    // ToDo Schüler
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
