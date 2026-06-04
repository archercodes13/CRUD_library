<?php

function getBooks($sql) {
    return $sql->query("
        SELECT books.*, genres.name AS genre, users.name AS user_name, users.email AS contact
        FROM books
        JOIN genres ON books.genre_id = genres.id
        JOIN users ON books.user_id = users.id
        ORDER BY books.id DESC
        LIMIT 20
    ")->fetchAll();
}

function getBook($sql, $id) {
    $stmt = $sql->prepare("
        SELECT books.*, genres.name AS genre, users.name AS user_name, users.email AS contact
        FROM books
        JOIN genres ON books.genre_id = genres.id
        JOIN users ON books.user_id = users.id
        WHERE books.id = ?
    ");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addBook($sql, $title, $author, $description, $publication_year, $cover_image, $genre_id, $user_id) {
    $stmt = $sql->prepare("
        INSERT INTO books (title, author, description, publication_year, cover_image, genre_id, user_id)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([$title, $author, $description, $publication_year, $cover_image, $genre_id, $user_id]);
}


function editBook($sql, $id, $title, $author, $description, $publication_year, $cover_image, $genre_id) {
    $stmt = $sql->prepare("
        UPDATE books
        SET title = ?, author = ?, description = ?, publication_year = ?, cover_image = ?, genre_id = ?
        WHERE id = ?
    ");
    $stmt->execute([$title, $author, $description, $publication_year, $cover_image, $genre_id, $id]);
}

function deleteBook($sql, $id) {
    $stmt = $sql->prepare("DELETE FROM books WHERE id = ?");
    $stmt->execute([$id]);
}

function getGenres($sql) {
    return $sql->query("SELECT * FROM genres ORDER BY name")->fetchAll();
}

function getGenre($sql, $id) {
    $stmt = $sql->prepare("SELECT * FROM genres WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getBooksByGenre($sql, $id) {
    $stmt = $sql->prepare("
        SELECT books.*, users.name AS user_name
        FROM books
        JOIN users ON books.user_id = users.id
        WHERE books.genre_id = ?
        ORDER BY books.id DESC
    ");
    $stmt->execute([$id]);
    return $stmt->fetchAll();
}

function searchBooks($sql, $search, $genre_id) {
    $stmt = $sql->prepare("
        SELECT books.*, genres.name AS genre, users.name AS user_name, users.email AS contact
        FROM books
        JOIN genres ON books.genre_id = genres.id
        JOIN users ON books.user_id = users.id
        WHERE (books.title LIKE ? OR books.author LIKE ?)
        AND (? = '' OR books.genre_id = ?)
        ORDER BY books.id DESC
    ");
    $stmt->execute([
        "%" . $search . "%",
        "%" . $search . "%",
        $genre_id,
        $genre_id
    ]);
    return $stmt->fetchAll();
}

function registerUser($sql, $name, $email, $password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $sql->prepare("
        INSERT INTO users (name, email, password)
        VALUES (?, ?, ?)
    ");
    $stmt->execute([$name, $email, $hash]);
}

function loginUser($sql, $email, $password) {
    $stmt = $sql->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["name"] = $user["name"];
        return true;
    }

    return false;
}

function isLoggedIn() {
    return isset($_SESSION["user_id"]);
}

function isOwner($book) {
    return isLoggedIn() && $_SESSION["user_id"] == $book["user_id"];
}


