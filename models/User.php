<?php
require_once 'BaseModel.php';

class User extends BaseModel {

    public function register($username, $password, $email) {
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        return $this->execute($sql, [$username, $hashed, $email]);
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $result = $this->select($sql, [$username]);
        if ($result && password_verify($password, $result[0]['password'])) {
            return $result[0];
        }
        return null;
    }

    public function getById($id) {
        $sql = "SELECT * FROM users WHERE id=?";
        $res = $this->select($sql, [$id]);
        return $res[0] ?? null;
    }
}
?>
