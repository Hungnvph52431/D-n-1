<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$adminUsername = $_SESSION['admin_username'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #f7f9fc;
        }
        .container {
            padding: 50px;
        }
        .logout {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chào mừng, <?= htmlspecialchars($adminUsername) ?>!</h1>
        <p>Đây là trang quản trị.</p>
        <a href="index.php?url=dang-xuat" class="logout">Đăng xuất</a>
    </div>
</body>
</html>
