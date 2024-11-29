<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <div class="navbar">
            <a href="index.html"><img src="../../public/images/fahasa-logo.png" alt="Logo Fahasa" class="logo"></a>
            <nav>
                <ul>
                    <li><a href="index.html">Trang Chủ</a></li>
                    <li><a href="#">Cửa Hàng</a></li>
                    <li><a href="#">Bài Viết</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                    <li><a href="#">Trang</a></li>
                </ul>
            </nav>
            <div class="user-options">
                <a href="index.php?url=dang-nhap">Đăng Nhập</a>
                <a href="index.php?url=dang-ky">Đăng Ký</a>
                <a href="#"><img src="../../public/images/icon_timkiem.png" alt="Tìm kiếm" class="search-icon"></a>
                <a href="#"><img src="../../public/images/icon_donhang.png" alt="Giỏ hàng" class="cart-icon"></a>
            </div>
        </div>
    </header>

    <div class="register-container">
        <h2>Đăng ký tài khoản</h2>
        <form action="index.php?url=dang-nhap">
            <input type="email" name="Email" id="" placeholder="Email" required>
            <input type="text" name="name" id="" placeholder="Họ và Tên" required>
            <input type="text" name="username" id="" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" id="" placeholder="Mật khẩu" required>
            <input type="password" name="confirm-password" id="" placeholder="Xác nhận mật khẩu" required>
            <input type="tel" name="phone-number" id="" placeholder="Số điện thoại" required>
            <input type="text" name="Address" id="" placeholder="Địa chỉ" required>
            <button>Đăng ký tài khoản</button>
        </form>
        <a href="index.php?url=quen-mat-khau">Quên mật khẩu</a>
        <hr>
        <form action="index.php?url=dang-nhap" method="post">
            <button class="login-btn" type="submit">Đăng nhập</button>
        </form>
    </div>

    <footer class="footer">
        <hr>
        <div class="footer-main">
            <div class="footer-logo">
                <h2>FASAHA.COM</h2>
                <p>Chào mừng bạn đến với FAHASA nơi cung cấp những loại sách chất lượng</p>
            </div>
            <div class="footer-links">
                <h3>Đường Dẫn</h3>
                <ul>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-account">
                <h3>Tài Khoản</h3>
                <ul>
                    <li><a href="#">Tài khoản của tôi</a></li>
                    <li><a href="#">Theo dõi đơn hàng</a></li>
                    <li><a href="#">Thủ tục thanh toán</a></li>
                    <li><a href="#">Danh sách yêu thích</a></li>
                </ul>
            </div>
            <div class="footer-newsletter">
                <h3>Bản Tin</h3>
                <div class="newsletter">
                    <input type="email" placeholder="Email">
                    <button>Theo Dõi</button>
                </div>
                <div class="store-address">
                    <p>Bằng cách cung cấp địa chỉ email của mình,</p>
                    <p>bạn đồng ý với Chính sách quyền riêng tư và</p>
                    <p>Điều khoản dịch vụ của chúng tôi.</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Dự Án 1 | Nhóm 4</p>
        </div>
    </footer>
</body>

</html>
<?php
// Import kết nối cơ sở dữ liệu
require_once 'config/database.php';

// Kiểm tra nếu người dùng gửi biểu mẫu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Kiểm tra dữ liệu đầu vào
    if (empty($username) || empty($email) || empty($password)) {
        die("Vui lòng điền đầy đủ thông tin!");
    }

    try {
        // Kiểm tra tên người dùng hoặc email đã tồn tại
        $checkUserQuery = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stmt = $conn->prepare($checkUserQuery);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            die("Tên đăng nhập hoặc email đã tồn tại!");
        }

        // Mã hóa mật khẩu trước khi lưu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Lưu người dùng vào cơ sở dữ liệu
        $insertQuery = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Đăng ký thành công! <a href='login.html'>Đăng nhập</a>";
        } else {
            echo "Đăng ký thất bại. Vui lòng thử lại.";
        }
    } catch (PDOException $e) {
        // Xử lý lỗi
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
