<?php
require_once 'models/Cart.php';

class CartController {
    private $model;

    public function __construct() {
        $this->model = new Cart();
    }

    // Hiển thị giỏ hàng người dùng
    public function view($user_id) {
        $items = $this->model->getByUser($user_id);
        include 'views/cart/view.php';
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->addItem($_POST['user_id'], $_POST['product_id'], $_POST['quantity']); // ✅ dùng addItem()
            header('Location: ?controller=cart&action=view&user_id=' . $_POST['user_id']);
        }
    }

    // Cập nhật số lượng sản phẩm
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->updateItem($_POST['cart_id'], $_POST['quantity']); // ✅ dùng updateItem()
            header('Location: ?controller=cart&action=view&user_id=' . $_POST['user_id']);
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($cart_id, $user_id) {
        $this->model->removeItem($cart_id); // ✅ dùng removeItem()
        header("Location: ?controller=cart&action=view&user_id=$user_id");
    }
}
?>
