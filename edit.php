<?php

require "db.php";
require "functions.php";

if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];
$book = getBook($sql, $id);
$genres = getGenres($sql);

if (!isOwner($book)) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["cover_image"]) && $_FILES["cover_image"]["error"] == 0) {
        $image = uploadImage("cover_image");

        editBookWithImage(
            $sql,
            $id,
            $_POST["title"],
            $_POST["author"],
            $_POST["description"],
            $_POST["publication_year"],
            $image,
            $_POST["genre_id"]
        );
    } else {
        editBook(
            $sql,
            $id,
            $_POST["title"],
            $_POST["author"],
            $_POST["description"],
            $_POST["publication_year"],
            $_POST["genre_id"]
        );
    }

    header("Location: detail.php?id=" . $id);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
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
    <h1>Edit Book</h1>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="<?= $book["title"] ?>" required><br>
        <input type="text" name="author" value="<?= $book["author"] ?>" required><br>
        <textarea name="description" required><?= $book["description"] ?></textarea><br>
        <input type="number" name="publication_year" value="<?= $book["publication_year"] ?>" required><br>

        <select name="genre_id" required>
            <?php foreach ($genres as $genre): ?>
                <option value="<?= $genre["id"] ?>" <?php if ($genre["id"] == $book["genre_id"]) echo "selected"; ?>>
                    <?= $genre["name"] ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="file" name="cover_image"><br>

        <button type="submit">Save</button>
    </form>
</div>

</body>
</html>
