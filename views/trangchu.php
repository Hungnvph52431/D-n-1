<!-- views/user/trangchu.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ | Nhóm 4</title>
    <link rel="stylesheet" href="public/css/style1.css">
    <script src="public/js/main.js"></script>
</head>
<body>
    <h1>
        <?php
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION['user']['name'])) {
            echo htmlspecialchars($_SESSION['user']['name']) . '!';
        } else {
            echo '';
        }
        ?>
    </h1>
    <!-- Menu -->
    <header>
        <div class="navbar">
            <img src="../../public/images/fahasa-logo.png" alt="Logo" class="logo">
            <nav>
                <ul>
                    <li><a href="index.php?url=dang-nhap-thanh-cong">Trang Chủ</a></li>
                    <li><a href="index.php?url=cua-hang">Cửa Hàng</a></li>
                    <li><a href="index.php?url=bai-viet">Bài Viết</a></li>
                    <li><a href="index.php?url=lien-he">Liên Hệ</a></li>
                    <li>
                        <a href="#">Trang</a>
                        <ul class="submenu">
                            <li><a href="index.php?url=gio-hang">Giỏ Hàng</a></li>
                            <li><a href="index.php?url=thanh-toan">Thanh Toán</a></li>
                            <li><a href="index.php?url=don-hang">Đơn Mua</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="user-options">
                <a href="index.php">Đăng xuất</a>
                <a href="#"><img src="../../public/images/icon_user.jpg" alt="user" class="user-icon"></a>
                <a href="#"><img src="../../public/images/icon_timkiem.png" alt="search" class="search-icon"></a>
                <a href="#"><img src="../../public/images/icon_donhang.png" alt="Cart" class="cart-icon"></a>
            </div>           
        </div>
    </header>

    <!-- Banner -->
    <section class="main-banner">
        <div class="banner-carousel">
            <img src="../../public/images/Halloween Sale Banner.jpg" alt="Halloween Sale Banner" class="banner-img">
            <!-- Add carousel buttons or additional banners if needed -->
        </div>
        <div class="side-banners">
            <img src="../../public/images/Momo Promo.jpg" alt="Momo Promo" class="side-banner">
            <img src="../../public/images/quà.webp" alt="Quà" class="side-banner">
        </div>
    </section>

    <!-- Danh Mục Sản Phẩm -->
    <section class="product-categories">
        <h2>Danh Mục Sản Phẩm</h2>
        <div class="categories">
            <div class="category-item">
                <img src="../../public/images/Tâm lý.jpg" alt="Tâm lý">
                <p>Tâm lý</p>
            </div>
            <div class="category-item">
                <img src="../../public/images/Tiểu thuyết.jpg" alt="Tiểu thuyết">
                <p>Tiểu thuyết</p>
            </div>
            <div class="category-item">
                <img src="../../public/images/Văn học.jpg" alt="Văn học">
                <p>Văn học</p>
            </div>
            <div class="category-item">
                <img src="../../public/images/Xu hướng kinh tế.jpg" alt="Xu hướng kinh tế">
                <p>Xu hướng kinh tế</p>
            </div>
            <div class="category-item">
                <img src="../../public/images/Tâm linh - Tôn Giáo.jpg" alt="Tâm linh - Tôn Giáo">
                <p>Tâm linh - Tôn Giáo</p>
            </div>
            <div class="category-item">
                <img src="../../public/images/Thiếu nhi.webp" alt="Thiếu nhi">
                <p>Thiếu nhi</p>
            </div>
        </div>
    </section>

    <!-- Sản Phẩm Khuyến Mãi -->
    <section class="product-grid">
        <h2>Sản Phẩm Khuyến Mãi</h2>
        <div class="product-container">
            <div class="product-item">
                <div class="discount-badge">-17%</div>
                <img src="../../public/images/kiem-tien-titok.jpg" alt="Kiếm Tiền Từ Tiktok">
                <h3>Kiếm Tiền Từ Tiktok</h3>
                <div class="rating">★★★★★</div>
                <p class="price"><span class="current-price">100,000đ</span> <span class="original-price">120,000đ</span></p>
            </div>
            <div class="product-item">
                <div class="discount-badge">-30%</div>
                <img src="../../public/images/dat-rung-phuong-nam_ban-dien-anh.jpg" alt="Phương Nam">
                <h3>Phương Nam</h3>
                <div class="rating">★★★★★</div>
                <p class="price"><span class="current-price">126,000đ</span> <span class="original-price">180,000đ</span></p>
            </div>
            <div class="product-item">
                <div class="discount-badge">-15%</div>
                <img src="../../public/images/ngan-mat-troi.jpg" alt="Ngàn Mặt Trời Rực Rỡ">
                <h3>Ngàn Mặt Trời Rực Rỡ</h3>
                <div class="rating">★★★★★</div>
                <p class="price"><span class="current-price">102,000đ</span> <span class="original-price">120,000đ</span></p>
            </div>
            <div class="product-item">
                <div class="discount-badge">-38%</div>
                <img src="../../public/images/nha-gia-kim.jpg" alt="Nhà Giả Kim">
                <h3>Nhà Giả Kim</h3>
                <div class="rating">★★★★★</div>
                <p class="price"><span class="current-price">50,000đ</span> <span class="original-price">80,000đ</span></p>
            </div>
            <div class="product-item">
                <div class="discount-badge">-20%</div>
                <img src="../../public/images/cay-cam-ngot.jpg" alt="Cây Cam Ngọt">
                <h3>Cây Cam Ngọt</h3>
                <div class="rating">★★★★★</div>
                <p class="price"><span class="current-price">160,000đ</span> <span class="original-price">200,000đ</span></p>
            </div>
            <!-- Add more product items as needed -->
        </div>
        <button class="view-all">Xem tất cả</button>
    </section>
    
    <!-- Trending -->
    <section class="books-section">
        <div class="category">
            <h2>Xu Hướng</h2>
            <div class="book-list">
                <div class="book">
                    <img src="../../public/images/kiem-tien-titok.jpg" alt="Kiếm Tiền Từ Tiktok">
                    <p>Kiếm Tiền Từ Tiktok</p>
                    <span>100,000đ</span>
                </div>
                <div class="book">
                    <img src="../../public/images/dat-rung-phuong-nam_ban-dien-anh.jpg" alt="Phương Nam">
                    <p>Phương Nam</p>
                    <span>126,000đ</span>
                </div>
                <div class="book">
                    <img src="../../public/images/ngan-mat-troi.jpg" alt="Ngàn Mặt Trời Rực Rỡ">
                    <p>Ngàn Mặt Trời Rực Rỡ</p>
                    <span>102,000đ</span>
                </div>
            </div>
        </div>
        <div class="category">
            <h2>Bán Chạy</h2>
            <div class="book-list">
                <div class="book">
                    <img src="../../public/images/tam-ly-hoc-thanh-cong.jpg" alt="Tâm Lý Học Thành Công">
                    <p>Tâm Lý Học Thành Công</p>
                    <span>159,000đ</span>
                </div>
                <div class="book">
                    <img src="../../public/images/thuat-thao-tung.jpg" alt="Thuật thao túng">
                    <p>Thuật thao túng</p>
                    <span>97,000đ</span>
                </div>
                <div class="book">
                    <img src="../../public/images/tam-ly-hoc-toi-pham.jpg" alt="Tâm Lý Tội Phạm">
                    <p>Tâm Lý Tội Phạm</p>
                    <span>100,000đ</span>
                </div>
            </div>
        </div>
        <div class="category">
            <h2>Hot Sale</h2>
            <div class="book-list">
                <div class="book">
                    <img src="../../public/images/kiem-tien-titok.jpg" alt="Kiếm Tiền Từ Tiktok">
                    <p>Kiếm Tiền Từ Tiktok</p>
                    <span>100,000đ</span>
                </div>
                <div class="book">
                    <img src="../../public/images/dat-rung-phuong-nam_ban-dien-anh.jpg" alt="Phương Nam">
                    <p>Phương Nam</p>
                    <span>126,000đ</span>
                </div>
                <div class="book">
                    <img src="../../public/images/ngan-mat-troi.jpg" alt="Ngàn Mặt Trời Rực Rỡ">
                    <p>Ngàn Mặt Trời Rực Rỡ</p>
                    <span>102,000đ</span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-services">
            <div class="service">
                <p>🚗 Miễn phí vận chuyển</p>
                <span>Cho tất cả các đơn hàng trên 200.000đ</span>
            </div>
            <div class="service">
                <p>💸 Đảm bảo hoàn tiền</p>
                <span>Nếu sản phẩm có vấn đề</span>
            </div>
            <div class="service">
                <p>📞 Hỗ trợ trực tuyến 24/7</p>
                <span>Hỗ trợ chuyên dụng</span>
            </div>
            <div class="service">
                <p>🔒 Thanh toán an toàn</p>
                <span>Thanh toán an toàn 100%</span>
            </div>
        </div>
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
