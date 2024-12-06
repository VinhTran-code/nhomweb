<?php
// Kiểm tra session đã được khởi tạo chưa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'models/user.php';
require_once 'config/database.php';

class AdminController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User(new Database());
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->userModel->authenticate($username, $password)) {
                $_SESSION['username'] = $username;
                header('Location: dashboard2.php');
                exit();
            } else {
                $error = "Invalid username or password.";
                include('views/admin/login.php');
            }
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>