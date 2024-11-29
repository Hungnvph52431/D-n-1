
<?php
// models/ContactModel.php

require_once 'BaseModel.php';

class ContactModel extends BaseModel {
    public function submitContactForm($name, $email, $message) {
        $stmt = $this->db->prepare("INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :message)");
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':message' => $message
        ]);
    }
}
?>
