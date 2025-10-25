<?php
require_once 'models/Promotion.php';

class PromotionController {
    private $model;

    public function __construct() {
        $this->model = new Promotion();
    }

    public function index() {
        $promotions = $this->model->getAll();
        include 'views/promotions/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->add($_POST['code'], $_POST['discount'], $_POST['expiry_date']);
            header('Location: ?controller=promotion&action=index');
        }
        include 'views/promotions/add.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: ?controller=promotion&action=index');
    }
}
?>
