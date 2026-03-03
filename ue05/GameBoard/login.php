<?php
 // ToDo Schüler
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameBoard - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
        }

        .card {
            border: 1px solid rgba(255, 255, 255, .1);
            background: rgba(255, 255, 255, .05);
            backdrop-filter: blur(10px);
        }

        .card-title, .form-label {
            color: #fff;
        }

        .form-check-label {
            color: #aaa;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100">
<div class="card shadow-lg p-4" style="width:100%;max-width:420px;">
    <div class="text-center mb-4">
        <span style="font-size:2.5rem;">&#127918;</span>
        <h3 class="card-title mt-2">GameBoard</h3>
        <p class="text-secondary small">Melde dich an, um das Leaderboard zu sehen</p>
    </div>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <div class="mb-3">
            <label for="email" class="form-label">E-Mail</label>
            <input type="email" class="form-control bg-dark text-light border-secondary"
                   id="email" name="email" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Passwort</label>
            <input type="password" class="form-control bg-dark text-light border-secondary"
                   id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 fw-bold">Einloggen</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>