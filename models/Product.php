<?php
require_once 'BaseModel.php';

class Product extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM products ORDER BY id DESC");
    }

    public function getById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $result = $this->select($sql, [$id]);
        return $result[0] ?? null;
    }

    public function create($name, $price, $image, $category_id, $description) {
        $sql = "INSERT INTO products (name, price, image, category_id, description) VALUES (?, ?, ?, ?, ?)";
        return $this->execute($sql, [$name, $price, $image, $category_id, $description]);
    }

    public function update($id, $name, $price, $image, $category_id, $description) {
        $sql = "UPDATE products SET name=?, price=?, image=?, category_id=?, description=? WHERE id=?";
        return $this->execute($sql, [$name, $price, $image, $category_id, $description, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->execute($sql, [$id]);
    }
}
?>
