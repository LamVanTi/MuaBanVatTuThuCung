<?php
require_once 'models/Order.php';

class OrderController {
    private $model;

    public function __construct() {// Khởi tạo mô hình Order
        $this->model = new Order();// Khởi tạo mô hình Order
    }

    public function index() {// Hiển thị danh sách đơn hàng
        $orders = $this->model->getAll();
        include 'views/orders/list.php';
    }

    public function create() {// Thêm đơn hàng mới
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST['user_id'], $_POST['total_price'], $_POST['status']);
            header('Location: ?controller=order&action=index');
        }
        include 'views/orders/add.php';
    }

    public function delete($id) {// Xóa đơn hàng theo id
        $this->model->delete($id);
        header('Location: ?controller=order&action=index');
    }
}
?>
