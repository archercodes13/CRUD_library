<?php

require "db.php";
require "functions.php";

if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

$genres = getGenres($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = uploadImage("cover_image");

    addBook(
        $sql,
        $_POST["title"],
        $_POST["author"],
        $_POST["description"],
        $_POST["publication_year"],
        $image,
        $_POST["genre_id"],
        $_SESSION["user_id"]
    );

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
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
    <h1>Add Book</h1>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="text" name="author" placeholder="Author" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="number" name="publication_year" placeholder="Publication year" required><br>

        <select name="genre_id" required>
            <option value="">Choose genre</option>

            <?php foreach ($genres as $genre): ?>
                <option value="<?= $genre["id"] ?>">
                    <?= $genre["name"] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="file" name="cover_image"><br>

        <button type="submit">Add</button>
    </form>
</div>

</body>
</html>
