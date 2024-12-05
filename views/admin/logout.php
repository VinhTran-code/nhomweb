<?php
// Bắt đầu session và hủy session khi người dùng đăng xuất
session_start();
session_unset();
session_destroy();

header('Location: index.php');
exit();
?>
