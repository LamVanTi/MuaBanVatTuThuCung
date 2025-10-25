<?php
require_once 'BaseModel.php';

class Order extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM orders ORDER BY id DESC");// Lấy tất cả đơn hàng sắp xếp theo id giảm dần
    }

    public function getByUser($user_id) {
        $sql = "SELECT * FROM orders WHERE user_id=?";
        return $this->select($sql, [$user_id]);// Lấy đơn hàng theo người dùng
    }

    public function create($user_id, $total_price, $status = 'Pending') {
        $sql = "INSERT INTO orders (user_id, total_price, status, created_at) VALUES (?, ?, ?, NOW())";// Tạo đơn hàng mới
        return $this->execute($sql, [$user_id, $total_price, $status]);
    }

    public function updateStatus($order_id, $status) {
        $sql = "UPDATE orders SET status=? WHERE id=?";
        return $this->execute($sql, [$status, $order_id]);// Cập nhật trạng thái đơn hàng
    }
    public function delete($id) {
        $sql = "DELETE FROM orders WHERE id=?";
        return $this->execute($sql, [$id]);// Xóa đơn hàng theo id
    }
}
?>
