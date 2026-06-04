# PHP Library CRUD App

This project is a small library web application made with PHP and MySQL. It lets users create an account, log in, add books, search through books, filter them by genre, open a detail page for each book, and edit or delete only the books they added themselves.

The project is built as a classic CRUD application. CRUD means create, read, update, and delete. In this app, those actions are used for managing books in a library database.

## What the project does

The app works like a small online library. A visitor can see books on the homepage, search by title or author, filter books by genre, and open a detail page for more information.

A registered user can add a new book. When a user adds a book, the app saves the book together with the user who created it. Because of that, the app can later check who owns the book. Only the owner can edit or delete their own book.

The app also includes user registration and login. Passwords are not stored as plain text. They are saved using PHP password hashing.

## Main features

Users can register and log in.

Logged-in users can add new books.

Books can be searched by title or author.

Books can be filtered by genre.

Each book has a detail page.

Only the user who added a book can edit or delete it.

The layout is styled with CSS and works on smaller screens too.

## Technologies used

PHP is used for the backend logic.

MySQL is used for storing users, books, and genres.

PDO is used for the database connection.

HTML and CSS are used for the page structure and styling.

The project was tested locally with MAMP.

## Project structure

db.php
functions.php
index.php
detail.php
genre.php
add.php
edit.php
delete.php
register.php
login.php
logout.php
style.css
uploads/
database.sql
README.md

## What each file is for

`db.php` starts the session and connects the project to the MySQL database.

`functions.php` contains the main reusable functions. This includes loading books, adding books, editing books, deleting books, searching, filtering by genre, registering users, logging users in, and checking ownership.

`index.php` is the homepage. It shows the list of books, the search form, the genre filter, and the main navigation.

`detail.php` shows one selected book with full information.

`genre.php` shows books from one selected genre.

`add.php` contains the form for adding a new book. Only logged-in users can use this page.

`edit.php` contains the form for editing an existing book. The app checks that the logged-in user owns the book before allowing changes.

`delete.php` deletes a book from the database. It also checks that the logged-in user is the owner.

`register.php` creates a new user account.

`login.php` logs the user into the app.

`logout.php` ends the current user session.

`style.css` contains the styling for the whole project.

`uploads/no-cover.svg` is used as a default image when a book does not have its own cover image.

`database.sql` contains the database structure and data that need to be imported into MySQL.

## Database information

The project expects a MySQL database named:

CRUD_library


The local database connection in `db.php` is:


$sql = new PDO("mysql:host=localhost;dbname=CRUD_library;charset=utf8", "root", "root");


For MAMP, the default local settings are usually:

Host: localhost
Database name: CRUD_library
Username: root
Password: root


If your MySQL username or password is different, you need to update the values in `db.php`.

## How to run the project locally

First, download or clone this repository.

Move the project folder into your MAMP `htdocs` folder. On macOS, that is usually:


/Applications/MAMP/htdocs/


Start MAMP and make sure Apache and MySQL are running.

Open phpMyAdmin. You can usually access it from the MAMP start page.

Create a new database named:

CRUD_library

After creating the database, open it in phpMyAdmin and import the file:

database.sql


This will create the tables needed for the project.

Now open the project in your browser. If your folder is named `CRUD_library`, the local URL will usually be:

http://localhost:8888/CRUD_library/


If your folder has a different name, replace `CRUD_library` in the URL with your actual folder name.

## How to use the app

Open the homepage in your browser.

You can browse the books without being logged in.

To add a book, create an account through the register page.

After registration, log in with your email and password.

Once logged in, you can add a new book using the add book page.

After adding a book, it will appear on the homepage.

You can open the detail page to see more information about the book.

If you are the user who added the book, you will also see options to edit or delete it.

Use the search box to find books by title or author.

Use the genre filter to show only books from a specific category.

## Notes

The database must be imported before the project can work correctly.

The project is made for local development with MAMP, not for a live production server.

The database login uses local MAMP credentials. For a real server, the database username and password should be changed.

The app uses sessions, so login status is remembered while the browser session is active.

## Project purpose

I made this project to practice PHP, MySQL, PDO, sessions, forms, user authentication, and CRUD logic in one complete web application.

The main goal was to understand how a PHP project connects to a database, how data is displayed and managed, and how user permissions can be added so that users can only edit or delete their own content.
