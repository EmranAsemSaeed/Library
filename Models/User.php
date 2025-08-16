<?php
require_once __DIR__."/Traits.php";

class User {
    use LoggingTrait;

    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addUser($name, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO users(name,email) VALUES(:n,:e)");
        $stmt->execute([':n'=>$name, ':e'=>$email]);
        $this->log("Added user: $name");
    }

    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        $this->log("Deleted user ID: $id");
    }

    public function getAll() {
        return $this->pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
    }
}
