<?php

require "db.php";
require "functions.php";

$id = $_GET["id"];
$book = getBook($sql, $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $book["title"] ?></title>
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
    <div class="detail">
        <img src="uploads/<?= $book["cover_image"] ?>">

        <h1><?= $book["title"] ?></h1>

        <p>Author: <?= $book["author"] ?></p>
        <p>Description: <?= $book["description"] ?></p>
        <p>Publication year: <?= $book["publication_year"] ?></p>

        <p>
            Genre:
            <a href="genre.php?id=<?= $book["genre_id"] ?>">
                <?= $book["genre"] ?>
            </a>
        </p>

        <p>Added by: <?= $book["user_name"] ?></p>
        <p>Contact: <?= $book["contact"] ?></p>

        <a class="btn" href="index.php">Back</a>

        <?php if (isOwner($book)): ?>
            <a class="btn" href="edit.php?id=<?= $book["id"] ?>">Edit</a>
            <a class="btn danger" href="delete.php?id=<?= $book["id"] ?>">Delete</a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
