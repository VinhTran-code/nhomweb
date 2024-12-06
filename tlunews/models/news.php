<?php
class NewsModel {
    private $conn;

    public function __construct() {
        require './config/database.php';
        $this->conn = $conn;
    }

    public function getAllNews() {
        $stmt = $this->conn->query("SELECT * FROM news");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNews($title, $content, $image, $created_at, $category_id) {
        $stmt = $this->conn->prepare("INSERT INTO news (title, content, image, created_at, category_id) VALUES (:title, :content, :image, :created_at, :category_id)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }

    public function getNewsById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM news WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateNews($id, $title, $content, $image, $created_at, $category_id) {
        $stmt = $this->conn->prepare("UPDATE news SET title = :title, content = :content, image = :image, created_at = :created_at, category_id = :category_id WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }
    
    public function deleteNews($id) {
        $stmt = $this->conn->prepare("DELETE FROM news WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }    
}