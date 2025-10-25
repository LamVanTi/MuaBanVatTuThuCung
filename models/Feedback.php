<?php
require_once 'BaseModel.php';

class Feedback extends BaseModel {

    public function getAll() {
    return $this->select("SELECT * FROM feedback");// Lấy tất cả phản hồi
}

    public function getByProduct($product_id) {
        $sql = "SELECT * FROM feedback WHERE product_id=?";// Lấy phản hồi theo sản phẩm
        return $this->select($sql, [$product_id]);
    }

    public function add($user_id, $product_id, $content, $rating) {
        $sql = "INSERT INTO feedback (user_id, product_id, content, rating, created_at) VALUES (?, ?, ?, ?, NOW())";
        return $this->execute($sql, [$user_id, $product_id, $content, $rating]);// Thêm phản hồi mới
    }

    public function delete($id) {
        $sql = "DELETE FROM feedback WHERE id=?";
        return $this->execute($sql, [$id]);// Xóa phản hồi theo id
    }
}
?>
