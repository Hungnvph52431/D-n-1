// Quản lý bài đăng.
<?php
require_once "BaseModel.php";

class PostModel extends BaseModel {
    protected $table = "posts";

    // Ví dụ: Lấy bài đăng theo tiêu đề
    public function getPostsByTitle($title) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE title LIKE :title");
        $title = "%" . $title . "%";
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
