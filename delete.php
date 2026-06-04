<?php

require "db.php";
require "functions.php";

if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];
$book = getBook($sql, $id);

if (!isOwner($book)) {
    header("Location: index.php");
    exit;
}

deleteBook($sql, $id);

header("Location: index.php");
exit;

?>
