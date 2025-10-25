<?php
require_once 'BaseModel.php';

class Category extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM categories ORDER BY id DESC");
    }

    public function create($name) {
        $sql = "INSERT INTO categories (name) VALUES (?)";
        return $this->execute($sql, [$name]);
    }

    public function update($id, $name) {
        $sql = "UPDATE categories SET name=? WHERE id=?";
        return $this->execute($sql, [$name, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM categories WHERE id=?";
        return $this->execute($sql, [$id]);
    }
}
?>
