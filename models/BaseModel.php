<?php
// ===============================
// 📁 FILE: models/BaseModel.php
// ===============================

require_once __DIR__ . '/../config/database.php';

class BaseModel {
    protected $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;// Kết nối cơ sở dữ liệu từ file cấu hình
    }

    protected function select($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);// Trả về tất cả kết quả dưới dạng mảng kết hợp
    }

    protected function execute($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);// Thực thi câu lệnh SQL với các tham số đã cho
    }
}
?>
