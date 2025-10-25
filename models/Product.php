<?php
require_once 'BaseModel.php';

class Product extends BaseModel {

    public function getAll() {
        return $this->select("SELECT * FROM products ORDER BY id DESC");// Lấy tất cả sản phẩm sắp xếp theo id giảm dần
    }

    public function getById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $result = $this->select($sql, [$id]);
        return $result[0] ?? null;// Lấy sản phẩm theo id
    }

    public function create($name, $price, $image, $category_id, $description) {
        $sql = "INSERT INTO products (name, price, image, category_id, description) VALUES (?, ?, ?, ?, ?)";
        return $this->execute($sql, [$name, $price, $image, $category_id, $description]);// Thêm sản phẩm mới
    }

    public function update($id, $name, $price, $image, $category_id, $description) {
        $sql = "UPDATE products SET name=?, price=?, image=?, category_id=?, description=? WHERE id=?";
        return $this->execute($sql, [$name, $price, $image, $category_id, $description, $id]);// Cập nhật sản phẩm theo id
    }

    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->execute($sql, [$id]);// Xóa sản phẩm theo id
    }

    public function getByCategory($category_id) {
        $sql = "SELECT * FROM products WHERE category_id = ? ORDER BY id DESC";
        return $this->select($sql, [$category_id]);// Lấy sản phẩm theo danh mục
    }

    public function search($keyword) {
        $sql = "SELECT * FROM products WHERE name LIKE ? ORDER BY id DESC";
        return $this->select($sql, ['%' . $keyword . '%']);// Tìm kiếm sản phẩm theo từ khóa
    }
}
?>
