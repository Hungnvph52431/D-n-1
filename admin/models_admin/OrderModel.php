// Quản lý đơn hàng.
<?php
require_once "BaseModel.php";

class OrderModel extends BaseModel {
    protected $table = "orders";

    // Ví dụ: Lấy đơn hàng theo khách hàng
    public function getOrdersByCustomer($customerId) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE customer_id = :customer_id");
        $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
