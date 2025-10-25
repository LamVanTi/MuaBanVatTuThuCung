<?php
require_once 'BaseModel.php';

class Category extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM categories ORDER BY id DESC");// Lấy tất cả danh mục sắp xếp theo id giảm dần
    }

    public function getById($id) {
    $sql = "SELECT * FROM categories WHERE id = ?";
    return $this->select($sql, [$id]);
}

    public function create($name) {
        $sql = "INSERT INTO categories (name) VALUES (?)";// Thêm danh mục mới
        return $this->execute($sql, [$name]);
    }

    public function update($id, $name) {
        $sql = "UPDATE categories SET name=? WHERE id=?";// Cập nhật tên danh mục theo id
        return $this->execute($sql, [$name, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM categories WHERE id=?";
        return $this->execute($sql, [$id]);// Xóa danh mục theo id
    }
}
?>
