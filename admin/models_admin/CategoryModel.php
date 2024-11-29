// Quản lý danh mục
<?php
require_once "BaseModel.php";

class CategoryModel extends BaseModel {
    protected $table = "categories";

    // Ví dụ: Hàm bổ sung để lấy tất cả danh mục có sản phẩm
    public function getCategoriesWithProducts() {
        $stmt = $this->pdo->prepare("
            SELECT categories.*, COUNT(products.id) AS product_count
            FROM categories
            LEFT JOIN products ON categories.id = products.category_id
            GROUP BY categories.id
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
