<?php
require_once 'BaseModel.php';

class Promotion extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM promotions ORDER BY id DESC");
    }

    public function create($code, $discount, $expiry_date) {
        $sql = "INSERT INTO promotions (code, discount, expiry_date) VALUES (?, ?, ?)";
        return $this->execute($sql, [$code, $discount, $expiry_date]);
    }

    public function delete($id) {
        $sql = "DELETE FROM promotions WHERE id=?";
        return $this->execute($sql, [$id]);
    }
}
?>
