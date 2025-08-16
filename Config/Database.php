<?php
class Database {
    private $host = "localhost";
    private $db   = "library_db";
    private $user = "root";
    private $pass = "";
    private $charset = "utf8mb4";

    public function connect() {
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->db;charset=$this->charset",
                           $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
        } catch (PDOException $e) {
            die("DB Error: " . $e->getMessage());
        }
    }
}
