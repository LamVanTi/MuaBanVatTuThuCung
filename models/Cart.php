<?php
require_once 'BaseModel.php';

class Cart extends BaseModel {

    public function getByUser($user_id) {
        $sql = "SELECT * FROM cart WHERE user_id=?";
        return $this->select($sql, [$user_id]);  // Lấy tất cả mục trong giỏ hàng của người dùng
    }

    public function addItem($user_id, $product_id, $quantity) {
        $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
        return $this->execute($sql, [$user_id, $product_id, $quantity]); // Thêm mục vào giỏ hàng
    }

    public function updateItem($cart_id, $quantity) {
        $sql = "UPDATE cart SET quantity=? WHERE id=?";
        return $this->execute($sql, [$quantity, $cart_id]);// Cập nhật số lượng mục trong giỏ hàng
    }

    public function removeItem($cart_id) {
        $sql = "DELETE FROM cart WHERE id=?";
        return $this->execute($sql, [$cart_id]);// Xóa mục khỏi giỏ hàng
    }
}
?>
