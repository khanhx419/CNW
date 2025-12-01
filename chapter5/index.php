<?php
// File: index.php

// TODO 6: Import Model
require_once 'models/SinhVienModel.php';

// === THIẾT LẬP KẾT NỐI PDO (Copy từ chapter4.php sang) ===
$host = '127.0.0.1';
$dbname = 'cse485_web';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// === LOGIC CỦA CONTROLLER ===

// TODO 8: Kiểm tra hành động POST (Thêm sinh viên)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ten_sinh_vien'])) {
    // TODO 9: Lấy dữ liệu
    $ten = $_POST['ten_sinh_vien'];
    $email = $_POST['email'];

    // TODO 10: Gọi hàm từ Model để thêm vào DB
    // Đây chính là lúc Controller "ra lệnh" cho Model
    addSinhVien($pdo, $ten, $email);

    // TODO 11: Chuyển hướng để làm mới trang
    header('Location: index.php');
    exit;
}

// TODO 12: Gọi hàm lấy danh sách sinh viên từ Model
// Dữ liệu lấy được gán vào biến $danh_sach_sv
$danh_sach_sv = getAllSinhVien($pdo);

// TODO 13: Import View để hiển thị
// View sẽ tự động dùng được biến $danh_sach_sv ở trên
include 'views/sinhvien_view.php';
?>