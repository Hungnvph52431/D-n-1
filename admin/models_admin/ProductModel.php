// Quản lý sản phẩm.
<?php
require_once "BaseModel.php";

class ProductModel extends BaseModel {
    protected $table = "products";

    // Ví dụ: Lấy tất cả sản phẩm theo danh mục
    public function getProductsByCategory($categoryId) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE category_id = :category_id");
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
