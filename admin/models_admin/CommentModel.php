// Quản lý bình luận.
<?php
require_once "BaseModel.php";

class CommentModel extends BaseModel {
    protected $table = "comments";

    // Ví dụ: Lấy bình luận theo bài viết
    public function getCommentsByPost($postId) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE post_id = :post_id");
        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
