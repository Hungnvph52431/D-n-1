// Quản lý khách hàng.
<?php
require_once "BaseModel.php";

class CustomerModel extends BaseModel {
    protected $table = "customers";

    // Ví dụ: Lấy khách hàng theo email
    public function getCustomerByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>
