<?php
require_once __DIR__."/../Models/Book.php";

class BookController {
    private $model;
    public $errorMessage = ''; // store error messages

    public function __construct($pdo) {
        $this->model = new Book($pdo);
    }

    public function add($title, $author) {
        $title = trim($title);
        $author = trim($author);

        if ($title === '' || $author === '') {
            $this->errorMessage = "⚠️ All fields are required!";
        } else {
            $this->model->addBook($title, $author);
            header('Location: index.php?controller=book&action=index');
            exit;
        }
    }
    

    public function delete($id) {
        $this->model->deleteBook($id);
    }

    public function index() {
        return $this->model->getAll();
    }



}
