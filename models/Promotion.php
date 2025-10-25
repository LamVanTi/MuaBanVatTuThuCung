<?php
require_once 'BaseModel.php';

class Promotion extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM promotions ORDER BY id DESC");// Lấy tất cả khuyến mãi sắp xếp theo id giảm dần
    }

    public function getById($id) {
        $sql = "SELECT * FROM promotions WHERE id = ?";
        $result = $this->select($sql, [$id]);
        return $result[0] ?? null;// Lấy khuyến mãi theo id
    }

    public function create($code, $discount, $expiry_date) {
        $sql = "INSERT INTO promotions (code, discount, expiry_date) VALUES (?, ?, ?)";// Thêm khuyến mãi mới
        return $this->execute($sql, [$code, $discount, $expiry_date]);
    }

    public function update($id, $code, $discount, $expiry_date) {
        $sql = "UPDATE promotions SET code=?, discount=?, expiry_date=? WHERE id=?";// Cập nhật khuyến mãi theo id
        return $this->execute($sql, [$code, $discount, $expiry_date, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM promotions WHERE id=?";// Xóa khuyến mãi theo id
        return $this->execute($sql, [$id]);
    }


}
?>
