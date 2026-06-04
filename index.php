<?php

require "db.php";
require "functions.php";

$genres = getGenres($sql);

if (isset($_GET["search"]) || isset($_GET["genre_id"])) {
    $books = searchBooks($sql, $_GET["search"] ?? "", $_GET["genre_id"] ?? "");
} else {
    $books = getBooks($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library</title>
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
    <img class="banner" src="img/banner.jpg">

    <h1>Library</h1>

    <h2>Have anything specific in mind? Try our search!</h2>

    <form method="get" class="search">
        <input type="text" name="search" placeholder="Title or author">

        <select name="genre_id">
            <option value="">All genres</option>

            <?php foreach ($genres as $genre): ?>
                <option value="<?= $genre["id"] ?>">
                    <?= $genre["name"] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Search</button>
    </form>

    <h2>Latest 20 books</h2>

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

                <p>
                    Genre:
                    <a href="genre.php?id=<?= $book["genre_id"] ?>">
                        <?= $book["genre"] ?>
                    </a>
                </p>

                <p>Added by: <?= $book["user_name"] ?></p>

                <a class="btn" href="detail.php?id=<?= $book["id"] ?>">Detail</a>

                <?php if (isOwner($book)): ?>
                    <a class="btn" href="edit.php?id=<?= $book["id"] ?>">Edit</a>
                    <a class="btn danger" href="delete.php?id=<?= $book["id"] ?>">Delete</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
