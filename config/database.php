<?php
// ===============================
// 📁 FILE: config/database.php
// ===============================

// Cấu hình thông tin kết nối MySQL
$host = "localhost";      // Máy chủ MySQL (thường là localhost)
$db_name = "petshop";  // Tên database bạn tạo trong phpMyAdmin
$username = "root";       // Tài khoản MySQL mặc định của XAMPP
$password = "";           // Mật khẩu (mặc định XAMPP để trống)

try {
    // Tạo đối tượng PDO để kết nối CSDL
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);

    // Thiết lập chế độ báo lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ✅ Kết nối thành công
    // echo "✅ Kết nối CSDL thành công!";
} catch (PDOException $e) {
    // ❌ Kết nối thất bại
    die("❌ Lỗi kết nối CSDL: " . $e->getMessage());
}
?>
