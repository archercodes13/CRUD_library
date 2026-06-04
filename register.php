<?php

require "db.php";
require "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    registerUser($sql, $_POST["name"], $_POST["email"], $_POST["password"]);

    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>

    <?php if (isLoggedIn()): ?>
        <a href="add.php">Add Book</a>
        <span>Logged in: <?= $_SESSION["name"] ?></span>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    <?php endif; ?>
</nav>

<div class="page">
    <h1>Register</h1>

    <form method="post">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
