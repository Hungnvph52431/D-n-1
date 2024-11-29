<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <!-- Menu -->
    <header>
        <div class="navbar">
            <a href="index.html"><img src="../../public/images/fahasa-logo.png" alt="Logo Fahasa" class="logo"></a>
            <nav>
                <ul>
                    <li><a href="index.php?url=trang-chu">Trang Chủ</a></li>
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

    <!-- Form quên mật khẩu -->
    <div class="forgot_password-container">
        <form action="index.php?url=khoi-phuc-mat-khau" method="">
            <h2>Lấy lại mật khẩu</h2>
            <input type="email" name="Email" id="" placeholder="Email" required>
            <button type="submit">Lấy lại mật khẩu</button>
        </form>
        <hr>
        <form action="register.php" method="get">
            <button class="register-btn" type="submit">Tạo tài khoản</button>
        </form>
    </div>

    <!-- Footer -->
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

require_once '../../config/database.php'; // Đảm bảo đã có file kết nối PDO

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["forgot_password"])) {
    $email = trim($_POST["email_forgot"]);

    if (empty($email)) {
        $error = 'Email không được để trống';
    } else {
        try {
            // Kiểm tra email trong cơ sở dữ liệu
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                $error = 'Email không tồn tại';
            } else {
                $token = bin2hex(random_bytes(50));

                $title = 'Khôi phục mật khẩu FAHASA';

                // Tạo đường dẫn khôi phục mật khẩu
                $recoveryLink = URL_RECOVERY . 'khoi-phuc-mat-khau&email=' . urlencode($email) . '&token=' . $token;

                $result = sendEmail($email, $title, $html_forgot_password);

                if ($result) {
                    $success = 'Chúng tôi vừa gửi 1 email khôi phục mật khẩu cho bạn. Vui lòng kiểm tra email';

                    // Lưu token vào bảng khôi phục mật khẩu (password_recoveries)
                    $stmt = $pdo->prepare("INSERT INTO password_recoveries (email, token, created_at) VALUES (:email, :token, NOW())");
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
                    $stmt->execute();

                    setcookie('token', $token, time() + 1800, '/'); // Token tồn tại trong 30 phút
                } else {
                    $error = 'Không thể gửi email. Vui lòng thử lại sau.';
                }
            }
        } catch (PDOException $e) {
            $error = 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }
}

$html_alert = isset($BaseModel) ? $BaseModel->alert_error_success('', $success) : '';
?>