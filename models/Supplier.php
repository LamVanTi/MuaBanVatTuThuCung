<?php
require_once 'BaseModel.php';

class Supplier extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM suppliers");// Lấy tất cả nhà cung cấp
    }

    public function getById($id) {
        $sql = "SELECT * FROM suppliers WHERE id = ?";
        $result = $this->select($sql, [$id]);
        return $result[0] ?? null;// Lấy nhà cung cấp theo id
    }

    public function create($name, $phone, $address) {
        $sql = "INSERT INTO suppliers (name, phone, address) VALUES (?, ?, ?)";// Thêm nhà cung cấp mới
        return $this->execute($sql, [$name, $phone, $address]);
    }

    public function update($id, $name, $phone, $address) {
        $sql = "UPDATE suppliers SET name=?, phone=?, address=? WHERE id=?";
        return $this->execute($sql, [$name, $phone, $address, $id]);// Cập nhật nhà cung cấp theo id
    }

    public function delete($id) {
        $sql = "DELETE FROM suppliers WHERE id=?";
        return $this->execute($sql, [$id]);// Xóa nhà cung cấp theo id
    }
}
?>
