<?php
class User {
    private $db;

    // Constructor yêu cầu một đối tượng Database
    public function __construct($db) {
        $this->db = $db;
    }

    // Hàm authenticate để kiểm tra đăng nhập
    public function authenticate($username, $password) {
        $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return true;
        }
        return false;
    }
}
?>