<?php
// Kết nối PDO
require_once '../../config/database.php';

class CustomerModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function update_user($full_name, $address, $phone, $image, $user_id) {
        $sql = "UPDATE users SET full_name = :full_name, address = :address, phone = :phone, image = :image WHERE id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':user_id', $user_id);

        return $stmt->execute();
    }
}

$CustomerModel = new CustomerModel($pdo);
$success = '';
$error = array(
    'full_name' => '',
    'address' => '',
    'phone' => '',
    'image' => '',
);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_profile"])) {
    $user_id = $_SESSION['user']['id'];
    $full_name = trim($_POST["full_name"]);
    $address = trim($_POST["address"]);
    $phone = trim($_POST["phone"]);
    $image = $_FILES["image"]['name'];

    if (empty($full_name)) {
        $error['full_name'] = 'Họ tên không được để trống';
    }

    if (strlen($full_name) > 255) {
        $error['full_name'] = 'Họ tên tối đa 255 ký tự';
    }

    if (empty($address)) {
        $error['address'] = 'Địa chỉ không được để trống';
    }

    if (strlen($address) > 255) {
        $error['address'] = 'Địa chỉ tối đa 255 ký tự';
    }

    if (empty($phone)) {
        $error['phone'] = 'Số điện thoại không được để trống';
    } else {
        if (!preg_match('/^(03|05|07|08|09)\d{8}$/', $phone)) {
            $error['phone'] = 'Số điện thoại không đúng định dạng.';
        }
    }

    if (!empty($image)) {
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $error['image'] = 'File ảnh không hợp lệ chỉ được tải ảnh định dạng JPG, PNG';
        }
    }

    if (empty(array_filter($error))) {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (!empty($image) && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Lưu ảnh thành công
        }

        try {
            $result = $CustomerModel->update_user($full_name, $address, $phone, $image, $user_id);

            if ($result) {
                $_SESSION['user']['full_name'] = $full_name;
                $_SESSION['user']['phone'] = $phone;
                $_SESSION['user']['address'] = $address;
                if (!empty($image)) {
                    $_SESSION['user']['image'] = $image;
                }

                setcookie('success_update', 'Cập nhật hồ sơ thành công', time() + 5, '/');
                header("Location: index.php?url=ho-so");
                exit;
            } else {
                throw new Exception('Không thể cập nhật dữ liệu.');
            }
        } catch (Exception $e) {
            $error_message = $e->getMessage();
            echo 'Cập nhật hồ sơ thất bại: ' . $error_message;
            setcookie('success_update', 'Cập nhật hồ sơ thất bại', time() + 5, '/');
        }
    }
}

if (isset($_COOKIE['success_update']) && !empty($_COOKIE['success_update'])) {
    $success = $_COOKIE['success_update'];
}

$html_alert = !empty($success) ? "<div class='alert alert-success'>{$success}</div>" : '';

    if(isset($_SESSION['user'])) { 
        $user_id = $_SESSION['user']['id'];
        
    ?>
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="index.php"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="ho-so">Tai khoản</a>
                        <span>Đổi mật khẩu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            
            <form action="" method="post" class="checkout__form" enctype="multipart/form-data">
                
                <div class="row">
                    <!-- Slider bar profile -->
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="upload/<?=$_SESSION['user']['image']?>" alt="avatar" class="rounded-circle img-fluid" style="width: 80px;">
                                    <div class="ml-2">
                                        <h6 class="my-2 font-weight-bold"></h6>
                                        <a href="ho-so" style="opacity: 0.6;" class="text-dark font-weight-bold">Sửa hồ sơ</a>
                                    </div>
                                </div>

                                <div class="row mt-2">

                                    <div class="list-group col-12 p-0" style="border: none;">
                                        <a href="index.php?url=thong-tin-tai-khoan" class="list-group-item list-group-item-action">

                                            Hồ sơ
                                        </a>
                                        <a href="index.php?url=don-hang" class="list-group-item list-group-item-action">Đơn mua</a>
                                        <a href="index.php?url=doi-mat-khau" class="list-group-item list-group-item-action">Đổi mật khẩu</a>
                                        <a href="index.php?url=dang-xuat" class="list-group-item list-group-item-action">Đăng xuất</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sliderbar profile end -->
                    <div class="col-lg-8">
                        <h5>Đổi mật khẩu</h5>
                        <?=$html_alert?>
                        <div class="row">
                            
                            <div class="col-lg-12">

                                <div class="checkout__form__input">
                                    <p>Tên đăng nhập</p>
                                    <input disabled type="text" name="address" value="<?= $_SESSION['user']['username'] ?>" class="text-dark">
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Mật khẩu cũ <span>*</span></p>
                                    <input class="mb-0" type="text" value="<?=$temp['password_old']?>" name="password_old">
                                    <span class="text-danger error"><?=$error['password_old']?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Mật khẩu mới<span>*</span></p>
                                    <input class="mb-0" type="text" value="<?=$temp['new_password']?>" name="new_password" >
                                    <span class="text-danger error"><?=$error['new_password']?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Nhập lại mật khẩu mới<span>*</span></p>
                                    <input class="mb-0" type="text" value="<?=$temp['confirm_password']?>" name="confirm_new_password">
                                    <span class="text-danger error"><?=$error['confirm_new_password']?></span>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <span class="text-primary" style="font-size: 20px;">*</span> 
                                <span class="text-dark">Các trường không được để trống</span>
                            </div>
                            <div class="col-lg-12">
                                <div class="cart__btn">
                                    <input type="submit" name="change_password" value="Thay đổi">
                                    <a class="ml-2" href="index.php?url=thanh-toan">Đến trang thanh toán</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->
<?php } else { ?>
    <div class="row" style="margin-bottom: 400px;">
        <div class="col-lg-12 col-md-12">
            <div class="container-fluid mt-5">
                <div class="row rounded justify-content-center mx-0 pt-5">
                    <div class="col-md-6 text-center">
                        <h4 class="mb-4">Vui lòng đăng nhập để có thể sử dụng chức năng</h4>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="index.php?url=dang-nhap">Đăng nhập</a>
                        <a class="btn btn-secondary rounded-pill py-3 px-5" href="index.php">Trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<style>
    .cart__btn input[type="submit"] {
        font-size: 14px;
        color: #111111;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
        padding: 14px 30px 12px;
        background: #f5f5f5;
    }

    .cart__btn input:hover {
        background-color: #0A68FF;
        color: #fff;
        transition: 0.2s;
    }

    .cart__btn a:hover {
        background-color: #0A68FF;
        color: #fff;
        transition: 0.2s;
    }

    .error {
        display: inline-block;
        height: 20px;
    }
</style>