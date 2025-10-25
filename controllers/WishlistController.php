<?php
require_once 'models/Wishlist.php';

class WishlistController {
    private $model;

    public function __construct() {
        $this->model = new Wishlist();
    }

    public function view($user_id) {
        $items = $this->model->getByUser($user_id);
        include 'views/wishlist/view.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->add($_POST['user_id'], $_POST['product_id']);
            header('Location: ?controller=wishlist&action=view&user_id=' . $_POST['user_id']);
        }
    }

    public function clear($user_id) {
        $this->model->clearByUser($user_id);
        header("Location: ?controller=wishlist&action=view&user_id=$user_id");
    }// Xóa toàn bộ danh sách yêu thích của người dùng

    public function remove($user_id, $product_id) {
        $this->model->remove($user_id, $product_id);
        header("Location: ?controller=wishlist&action=view&user_id=$user_id");
    }
}
?>
