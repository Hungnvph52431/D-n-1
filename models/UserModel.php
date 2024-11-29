<?php
// models/UserModel.php

require_once 'BaseModel.php';

class UserModel extends BaseModel {
    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->execute([
            ':email' => $email,
            ':password' => md5($password),
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>