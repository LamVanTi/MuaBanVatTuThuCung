<?php
require_once 'BaseModel.php';

class Order extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM orders ORDER BY id DESC");
    }

    public function getByUser($user_id) {
        $sql = "SELECT * FROM orders WHERE user_id=?";
        return $this->select($sql, [$user_id]);
    }

    public function create($user_id, $total_price, $status = 'Pending') {
        $sql = "INSERT INTO orders (user_id, total_price, status, created_at) VALUES (?, ?, ?, NOW())";
        return $this->execute($sql, [$user_id, $total_price, $status]);
    }

    public function updateStatus($order_id, $status) {
        $sql = "UPDATE orders SET status=? WHERE id=?";
        return $this->execute($sql, [$status, $order_id]);
    }
}
?>
