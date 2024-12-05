<?php
// Bao gồm các controller và cấu hình cần thiết
require_once 'controllers/admincontroller.php';

$controller = new AdminController();

// Xử lý đăng nhập nếu người dùng gửi form
if (isset($_GET['action']) && $_GET['action'] == 'login') {
    $controller->login();
} else {
    include('views/admin/login.php');  // Hiển thị giao diện đăng nhập
}
?>
