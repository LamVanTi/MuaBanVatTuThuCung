<?php
require_once 'models/User.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function index() {
        $users = $this->model->getAll();
        include 'views/users/list.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->register($_POST['username'], $_POST['password'], $_POST['email']);
            header('Location: ?controller=user&action=index');
        }
        include 'views/users/register.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: ?controller=user&action=index');
    }
}
?>
