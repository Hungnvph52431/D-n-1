<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <!-- Menu -->
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

    <!-- Login Form -->
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <form action="index.php?url=dang-nhap-thanh-cong    " method="post">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng nhập</button>
        </form>
        <a href="index.php?url=quen-mat-khau">Quên mật khẩu?</a>
        <hr>
        <form action="index.php?url=dang-ky" method="get">
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
// Import kết nối cơ sở dữ liệu
require_once 'config/database.php';

// Kiểm tra nếu người dùng gửi biểu mẫu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Kiểm tra dữ liệu đầu vào
    if (empty($username) || empty($password)) {
        die("Vui lòng nhập đầy đủ thông tin!");
    }

    try {
        // Tạo câu truy vấn chuẩn bị
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($query);
        
        // Gắn giá trị cho tham số
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Kiểm tra kết quả
        if ($stmt->rowCount() > 0) {
            // Lấy dữ liệu người dùng
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Xác thực mật khẩu
            if (password_verify($password, $user['password'])) {
                // Bắt đầu session và lưu thông tin người dùng
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                echo "Đăng nhập thành công! <a href='trangchu.php'>Về trang chủ</a>";
            } else {
                echo "Mật khẩu không đúng!";
            }
        } else {
            echo "Tên đăng nhập không tồn tại!";
        }
    } catch (PDOException $e) {
        // Xử lý lỗi
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
