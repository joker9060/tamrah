<?php
require_once "app/core/Database.php";

class Post {
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllPosts() {
        $stmt = $this->conn->prepare("SELECT * FROM posts ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPost($data) {
        $stmt = $this->conn->prepare("INSERT INTO posts (author_id, title, body, tags, created_at)
                                      VALUES (:author_id, :title, :body, :tags, NOW())");
        $stmt->bindParam(':author_id', $data['author_id']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':body', $data['body']);
        $stmt->bindParam(':tags', json_encode($data['tags']));
        $stmt->execute();
        return ['status' => 'success'];
    }
}
?>
