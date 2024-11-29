<?php

class AdminController
{
    private $pdo;

    // Constructor để nhận kết nối PDO
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Phương thức xử lý đăng nhập
    public function login($username, $password)
    {
        try {
            // Tìm user theo username
            $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE username = :username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Kiểm tra nếu user tồn tại và mật khẩu đúng
            if ($user && $password === $user['password']) {
                session_start();
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $user['username'];

                return [
                    'success' => true,
                    'message' => 'Đăng nhập thành công!'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Tên đăng nhập hoặc mật khẩu không đúng!'
                ];
            }
        } catch (PDOException $e) {
            // Xử lý lỗi kết nối hoặc câu lệnh SQL
            return [
                'success' => false,
                'message' => 'Lỗi hệ thống: ' . $e->getMessage()
            ];
        }
    }

    // Phương thức xử lý đăng xuất
    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        return [
            'success' => true,
            'message' => 'Đăng xuất thành công!'
        ];
    }
}
?>
