<?php
require_once "config/Database.php";
require_once "Controllers/BookController.php";
require_once "Controllers/UserController.php";

$db = new Database();
$pdo = $db->connect();

$controller = new BookController($pdo);

if(isset($_POST['addBook'])) {
    $controller->add($_POST['title'], $_POST['author']);
}

if(isset($_GET['deleteBook'])) {
    $controller->delete($_GET['deleteBook']);
}

$books = $controller->index();
//---------------------------------
// Users controller
$userController = new UserController($pdo);

// Error message for users
$userError = '';

// Handle add user
if(isset($_POST['addUser'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if($name === '' || $email === '') {
        $userError = "⚠️ All fields are required!";
    } else {
        $userController->add($name, $email);
        header('Location: index.php'); // reload page to show updated table
        exit;
    }
}

// Handle delete user
if(isset($_GET['deleteUser'])) {
    $userController->delete($_GET['deleteUser']);
}

// Get all users
$users = $userController->index();

// Include users &Book views
include "Views/books.php";
include "views/users.php";