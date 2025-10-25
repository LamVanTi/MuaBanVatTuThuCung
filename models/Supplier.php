<?php
require_once 'BaseModel.php';

class Supplier extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM suppliers");
    }

    public function create($name, $phone, $address) {
        $sql = "INSERT INTO suppliers (name, phone, address) VALUES (?, ?, ?)";
        return $this->execute($sql, [$name, $phone, $address]);
    }

    public function update($id, $name, $phone, $address) {
        $sql = "UPDATE suppliers SET name=?, phone=?, address=? WHERE id=?";
        return $this->execute($sql, [$name, $phone, $address, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM suppliers WHERE id=?";
        return $this->execute($sql, [$id]);
    }
}
?>
