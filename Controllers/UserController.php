<?php
require_once __DIR__."/../Models/User.php";

class UserController {
    private $model;
    public function __construct($pdo) {
        $this->model = new User($pdo);
    }

    public function add($name,$email) {
        $this->model->addUser($name,$email);
    }

    public function delete($id) {
        $this->model->deleteUser($id);
    }

    public function index() {
        return $this->model->getAll();
    }
}
