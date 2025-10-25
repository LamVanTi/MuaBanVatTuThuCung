<?php
require_once 'BaseModel.php';

class Wishlist extends BaseModel {

    public function getByUser($user_id) {
        $sql = "SELECT * FROM wishlist WHERE user_id=?";
        return $this->select($sql, [$user_id]);
    }

    public function add($user_id, $product_id) {
        $sql = "INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)";
        return $this->execute($sql, [$user_id, $product_id]);
    }

    public function remove($user_id, $product_id) {
        $sql = "DELETE FROM wishlist WHERE user_id=? AND product_id=?";
        return $this->execute($sql, [$user_id, $product_id]);
    }
}
?>
