<?php
require_once 'models/Supplier.php';

class SupplierController {
    private $model;

    public function __construct() {
        $this->model = new Supplier();
    }

    public function index() {
        $suppliers = $this->model->getAll();
        include 'views/suppliers/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->add($_POST['name'], $_POST['phone'], $_POST['address']);
            header('Location: ?controller=supplier&action=index');
        }
        include 'views/suppliers/add.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: ?controller=supplier&action=index');
    }
}
?>
