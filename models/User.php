<?php
require_once 'BaseModel.php';

class User extends BaseModel {
    public function getAll() {
    return $this->select("SELECT * FROM users");// Lấy tất cả người dùng
}

    public function register($username, $password, $email) {
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        return $this->execute($sql, [$username, $hashed, $email]);// Thêm người dùng mới
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $result = $this->select($sql, [$username]);
        if ($result && password_verify($password, $result[0]['password'])) {
            return $result[0];
        }
        return null;// Xác thực người dùng
    }

    public function getById($id) {
        $sql = "SELECT * FROM users WHERE id=?";
        $res = $this->select($sql, [$id]);
        return $res[0] ?? null;// Lấy người dùng theo id
    }

    public function update($id, $username, $email) {
        $sql = "UPDATE users SET username=?, email=? WHERE id=?";
        return $this->execute($sql, [$username, $email, $id]);// Cập nhật người dùng theo id
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id=?";
        return $this->execute($sql, [$id]);// Xóa người dùng theo id
    }
}
?>
