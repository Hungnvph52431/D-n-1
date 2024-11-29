<?php
// controllers/ContactController.php

require_once 'models/ContactModel.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new ContactModel();
    }

    public function form() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            if ($this->contactModel->submitContactForm($name, $email, $message)) {
                $success = 'Your message has been sent successfully.';
            } else {
                $error = 'Failed to send your message. Please try again.';
            }
        }
        require_once 'views/contact/form.php';
    }
}
?>