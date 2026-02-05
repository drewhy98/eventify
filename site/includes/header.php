<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify - Events in Wales</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <h1>Eventify</h1>

    <div class="auth-links">
        <?php if (isset($_SESSION['user_name'])): ?>
            <span>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?></span>

            <form method="post" action="logout.php" style="display:inline;">
                <button type="submit" class="logout-btn">Logout</button>
                <a href="add_events.php">Add Events</a>
            </form>
        <?php else: ?>
            <a href="login.php">Admin Log In</a>
        <?php endif; ?>
    </div>
</header>

<nav>
    <a href="view_events.php">View List of Events</a>
    <a href="about_us.php">About us</a>
</nav>
