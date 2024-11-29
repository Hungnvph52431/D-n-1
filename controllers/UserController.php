<?php
// controllers/UserController.php

require_once 'models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login($email, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?url=user/trangchu');
                exit;
            } else {
                $error = 'Invalid email or password';
            }
        }
        require_once 'views/user/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->register($name, $email, $password)) {
                header('Location: index.php?url=user/login');
                exit;
            } else {
                $error = 'Registration failed';
            }
        }
        require_once 'views/user/register.php';
    }

    public function trangchu() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?url=user/login');
            exit;
        }
        require_once 'views/user/trangchu.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?url=user/login');
        exit;
    }
}
?>
