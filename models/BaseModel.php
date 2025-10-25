<?php
// ===============================
// 📁 FILE: models/BaseModel.php
// ===============================

require_once __DIR__ . '/../config/database.php';

class BaseModel {
    protected $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    protected function select($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function execute($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }
}
?>
