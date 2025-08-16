<?php
require_once __DIR__."/Traits.php";

class Book {
    use LoggingTrait, SearchableTrait;

    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addBook($title, $author) {
        $stmt = $this->pdo->prepare("INSERT INTO books(title,author) VALUES(:t,:a)");
        $stmt->execute([':t'=>$title, ':a'=>$author]);
        $this->log("Added book: $title");
    }

    public function deleteBook($id) {
        $stmt = $this->pdo->prepare("DELETE FROM books WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        $this->log("Deleted book ID: $id");
    }

    public function getAll() {
        return $this->pdo->query("SELECT * FROM books")->fetchAll(PDO::FETCH_ASSOC);
    }

        public function searchByTitle($keyword) {
        return $this->search($this->pdo, 'books', 'title', $keyword);
    }

    public function searchByAuthor($keyword) {
        return $this->search($this->pdo, 'books', 'author', $keyword);
    }

}
