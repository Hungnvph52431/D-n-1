<?php
session_start();

// Include models
require_once "models/BaseModel.php";
require_once "models/ProductModel.php";
require_once "models/PostModel.php";

// Xử lý URL
$url = isset($_GET['url']) ? $_GET['url'] : 'trang-chu';  // Nếu không có URL, mặc định là 'trang-chu'
$urlParts = explode('/', $url);  // Tách URL thành các phần

// Lấy tên Controller và Action từ URL
$controllerName = ucfirst($urlParts[0]) . 'Controller';  // Đổi tên controller thành kiểu CamelCase
$actionName = isset($urlParts[1]) ? $urlParts[1] : 'index';  // Nếu không có action, mặc định là 'index'

// Kiểm tra và xử lý điều hướng động bằng Controller
if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
    // Khởi tạo PDO (nếu cần) trước khi truyền vào controller
    // $pdo = new PDO("mysql:host=localhost;dbname=mydb", "user", "password"); // Bạn có thể khởi tạo PDO ở đây nếu cần

    // Tạo đối tượng controller và gọi action
    $controller = new $controllerName();  // Nếu không cần PDO, bạn có thể loại bỏ đối số $pdo
    $controller->$actionName(isset($urlParts[2]) ? $urlParts[2] : null);  // Nếu có tham số thứ 3, truyền vào action
} else {
    // Nếu controller hoặc action không tồn tại, hiển thị lỗi "page not found"
    echo "";
}

// Kiểm tra nếu URL không có tham số
if (!isset($_GET['url'])) {
    require_once "views/home.php";
    exit();
} else {
    switch ($_GET['url']) {
        case 'trang-chu':
            require_once "views/home.php";
            break;
        case 'cua-hang':                        
            require_once "views/shop.php";
            break;
        case 'chitietsanpham':            
            require_once "views/productdetail.php";
            break;
        case 'danh-muc-san-pham':                    
            require_once "views/shop-by-category.php";
            break;    
        case 'lien-he':    
            require_once "views/contact.php";
            break;
        case 'gio-hang':    
            require_once "views/cart.php";
            break;
        case 'thanh-toan':    
            require_once "views/checkout.php";
            break;  
        case 'thanh-toan-2':    
            require_once "views/checkout-address.php";
            break; 
        case 'thanh-toan-momo':    
            require_once "views/checkout/checkout_momo.php";
            break;
        case 'cam-on':    
            require_once "views/thanks.php";
            break; 
        case 'don-hang':    
            require_once "views/my-order.php";
            break;       
        case 'chi-tiet-don-hang':    
            require_once "views/my-orderdetails.php";
            break;
        // User
        case 'dang-nhap':
            require_once "views/user/login.php";
            break;
        case 'dang-ky':
            require_once "views/user/register.php";
            break;
        case 'dang-xuat':
            unset($_SESSION['user']);
            header("Location: index.php");
            break;
        case 'dang-nhap-thanh-cong' :
            require_once "views/trangchu.php";
            break;
        case 'thong-tin-tai-khoan':
            require_once "views/user/user-infor.php";
            break;
        case 'ho-so':
            require_once "views/user/edit-profile.php";
            break;
        case 'doi-mat-khau':
            require_once "views/user/change-password.php";
            break;
        case 'quen-mat-khau':
            require_once "views/user/forgot-password.php";
            break;
        case 'khoi-phuc-mat-khau':
            require_once "views/user/password-recovery.php";
            break;
        // Bài viết
        case 'bai-viet':    
            require_once "views/blog/blogs.php";
            break;    
        case 'chi-tiet-bai-viet':    
            require_once "views/blog/blog-details.php";
            break;    
        case 'danh-muc-bai-viet':    
            require_once "views/blog/blog-by-category.php";
            break;
        case 'tim-kiem':
            require_once "views/search.php";
            break;
        default:
            // Trang không tồn tại
            require_once "views/not-page.php";
            break;
    }
}
?>
