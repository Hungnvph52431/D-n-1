<!-- User infor	 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/style.css">
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
    <section style="background-color: #fff; ">
        <?php isset($_SESSION['user']) ?>
            <div class="container my-4">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a href="index.php"><i class="fasaha-home"></i> Trang chủ</a>
                            <span>Thông tin tài khoản</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                <img src="upload/<?= $_SESSION['user']['image'] ?? 'default-avatar.png'?>" alt="avatar" class="rounded-circle img-fluid" style="width: 80px;">

                                    <!-- Cho các dữ liệu người dùng khác -->
                                    
                                
                                    
                                    
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
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Họ tên</p>
                                    </div>
                                    <div class="col-sm-9">                                    
                                        <p class="mb-0"><?= $_SESSION['user']['full_name'] ?? 'Chưa cập nhật' ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-5">
                                    <p class="mb-0"><?= $_SESSION['user']['email'] ?? 'Chưa cập nhật' ?></p>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Số điện thoại</p>
                                    </div>
                                    <div class="col-sm-5">

                                    <p class="mb-0"><?= $_SESSION['user']['phone'] ?? 'Chưa cập nhật' ?></p>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Tên tài khoản</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="mb-0"><?= $_SESSION['user']['username'] ?? 'Chưa cập nhật' ?></p> 
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Mật khẩu</p>
                                    </div>
                                    <div class="col-sm-5">

                                        <p class=" mb-0">*********</p>
                                    </div>

                                    <div class="col-sm-3">
                                        <a href="index.php?page=change-password" class="text-primary mb-0">Thay đổi</a>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Đia chỉ</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class=" mb-0">Hà Nội</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4 d-flex">

                                        <a href="ho-so" class="btn btn-outline-dark btn-rounded mb-4">Sửa hồ sơ</a>
                                        <a href="index.php?url=don-hang" class="btn btn-danger btn-rounded mb-4 ml-2">Đơn mua</a>


                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>

                </div>

            </div>
        


    </section>
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

<style> 
    p{
        color: #111;
        font-size: 16px;
    }
</style>