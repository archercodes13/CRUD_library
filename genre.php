<?php

require "db.php";
require "functions.php";

$id = $_GET["id"];
$genre = getGenre($sql, $id);
$books = getBooksByGenre($sql, $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $genre["name"] ?></title>
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
    <div class="card">
        <h1><?= $genre["name"] ?></h1>
        <p><?= $genre["description"] ?></p>
    </div>

    <h2>Books in this genre</h2>

    <div class="book-list">
        <?php foreach ($books as $book): ?>
            <div class="book">
                <img src="uploads/<?= $book["cover_image"] ?>">

                <h3>
                    <a href="detail.php?id=<?= $book["id"] ?>">
                        <?= $book["title"] ?>
                    </a>
                </h3>

                <p>Author: <?= $book["author"] ?></p>
                <p>Publication year: <?= $book["publication_year"] ?></p>
                <p>Added by: <?= $book["user_name"] ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <a class="btn" href="index.php">Back</a>
</div>

</body>
</html>
