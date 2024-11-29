<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../config/database.php';
require_once '../controllers/AdminController.php';

session_start();

// Nếu đã đăng nhập, chuyển hướng đến trang home
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index?url=home.php');
    exit;
}

$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../config/database.php';

    // Kết nối cơ sở dữ liệu
    $db = new Database();
    $pdo = $db->pdo;

    // Khởi tạo AdminController
    $adminController = new AdminController($pdo);

    // Lấy dữ liệu từ form
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = $_POST['password'];

    // Xử lý đăng nhập
    $result = $adminController->login($username, $password);

    if ($result['success']) {
        header('Location: home.php');
        exit;
    } else {
        $loginError = $result['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            width: 100%;
            max-width: 300px;
            padding: 30px;
            background: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input {
            width: 80%;
            padding: 18px;
            margin: 0px ;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn-login {
            width: 90%;
            padding: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập Admin</h2>
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <button type="submit" class="btn-login">Đăng nhập</button>
        </form>
        <?php if ($loginError): ?>
            <div class="error"><?= htmlspecialchars($loginError) ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
