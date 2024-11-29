<?php
// models/BaseModel.php

// Bao gồm file chứa lớp Database
require_once 'config/database.php';  // Đảm bảo đường dẫn đúng

class BaseModel {
    protected $db;

    public function __construct() {
        $this->db = (new Database())->pdo;  // Khởi tạo đối tượng Database và kết nối PDO
    }
}

?>