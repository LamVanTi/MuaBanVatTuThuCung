<?php
require_once 'BaseModel.php';

class Wishlist extends BaseModel {

    public function getAll() {
    return $this->select("SELECT * FROM wishlist");// Lấy tất cả mục yêu thích
}

    public function getByUser($user_id) {
        $sql = "SELECT * FROM wishlist WHERE user_id=?";// Lấy mục yêu thích theo người dùng
        return $this->select($sql, [$user_id]);
    }

    public function add($user_id, $product_id) {
        $sql = "INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)";// Thêm mục vào yêu thích
        return $this->execute($sql, [$user_id, $product_id]);
    }

    public function remove($user_id, $product_id) {
        $sql = "DELETE FROM wishlist WHERE user_id=? AND product_id=?";// Xóa mục khỏi yêu thích
        return $this->execute($sql, [$user_id, $product_id]);
    }

    public function clearByUser($user_id) {
        $sql = "DELETE FROM wishlist WHERE user_id=?";// Xóa tất cả mục yêu thích của người dùng
        return $this->execute($sql, [$user_id]);
    }
}
?>
