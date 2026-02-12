<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Icon Denim</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style1.css">
</head>
<body>
    <div class="container">
<!-- 1. header -->
        <header>
            <nav>
                <a href="?ctrl=page&act=home">
                    <img src="public/img/logo.png" alt="">
                </a>
                <ul>
                    <li class="dropdown">
                        <a href="?ctrl=product&act=list">Sản Phẩm <i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <div class="column">
                                <h4>ÁO</h4>
                                    <a href="#">Áo Thun</a>
                                    <a href="#">Áo Polo</a>
                                    <a href="#">Áo Sơmi</a>
                                    <a href="#">Áo Khoác</a>
                                    <a href="#">Tank Top - Áo Ba Lỗ</a>
                                    <a href="#">Áo Nỉ Và Len</a>
                                    <a href="#">Hoodie</a>
                                    <a href="#">Set Đồ</a>
                            </div>
                            <div class="column">
                                <h4>QUẦN</h4>
                                    <a href="#">Quần Jeans</a>
                                    <a href="#">Quần Tây</a>
                                    <a href="#">Quần Short</a>
                                    <a href="#">Jogger</a>
                            </div>
                            <div class="column">
                                <h4>PHỤ KIỆN</h4>
                                    <a href="#">Giày & Dép</a>
                                    <a href="#">Balo, Túi & Ví</a>
                                    <a href="#">Nón</a>
                                    <a href="#">Vớ</a>
                            </div>
                        </div>
                    </li>

                    <li><a href="">Hàng Mới</a>
                        <span class="label-new">NEW</span>
                    </li>
                    <li class="dropdown">
                        <a href="#">Áo Nam <i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <div class="column">
                                <a href="#">Áo Thun</a>
                                <a href="#">Áo Polo</a>
                                <a href="#">Áo Sơmi</a>
                                <a href="#">Áo Khoác</a>
                                <a href="#">Tank Top - Áo Ba Lỗ</a>
                                <a href="#">Áo Nỉ Và Len</a>
                                <a href="#">Hoodie</a>
                                <a href="#">Set Đồ</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Quần Nam <i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <div class="column">
                                <a href="#">Quần Jeans</a>
                                <a href="#">Quần Tây</a>
                                <a href="#">Quần Short</a>
                                <a href="#">Jogger</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">DENIM <i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <div class="column">
                                <h4>JEANS</h4>
                                <a href="#">Quần Jeans</a>
                                <a href="#">Quần Short Jeans</a>
                                <a href="#">Áo Khoác Jeans</a>    
                            </div>
                            <div class="column">
                                <h4>SIGNATURE</h4>
                                <a href="#">ProCOOL++™</a>
                                <a href="#">SMART JEANS™</a>
                                <a href="#">ICON105 Lightweight™</a>
                            </div>
                            <div class="column">
                                <h4>FROM DÁNG</h4>
                                <a href="#">Smart-Fit</a>
                                <a href="#">Straight</a>
                                <a href="#">Slim-Fit</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="">OUTLET</a>
                        <span class="label-new">-50%</span>
                    </li>
                </ul>
<!-- 2. nav_menu  -->
                <div class="user-menu">
                        <a href="admin.php">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span>Tìm Kiếm</span>
                        </a>
                        <!-- 2.1 xử lý đăng nhập -> tên -->
                        <?php if(!isset($_SESSION['user'])): ?>
                            <a href="?ctrl=user&act=login">
                                <i class="fa-solid fa-user"></i>
                                <span>Đăng Nhập</span>
                            </a>
                        <?php else: ?>
                            <a href="?ctrl=user&act=login">
                                <i class="fa-solid fa-user"></i>
                                <span color="black">Xin Chào, <?= $_SESSION['user']['name']?></span>
                            </a>
                            <a href="?ctrl=user&act=logout">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Đăng Xuất</span>
                            </a>
                        <?php endif; ?>

                        <a href="#">
                            <i class="fa-solid fa-map-location"></i>
                            <span>Cửa Hàng</span>
                        </a>
                        <!-- 2.2 hiển thị số lượng sản phẩm -> giỏ hàng -->
                        <a href="?ctrl=cart&act=list" class="cart-link">
                            <i class="fa-solid fa-cart-plus cart-icon-with-count">
                                <span class="cart-count-label">
                                    <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
                                </span>
                            </i>
                            <span>Giỏ Hàng</span>
                        </a> 
                </div>
            </nav>


<!-- 4. banner -->
    <?php
        if (!isset($_GET['act']) || $_GET['act'] == 'home'):
    ?>
        <div class="banner home-banner">
            <div class="slides">
                <img src="public/img/banner1.jpg" alt="Banner Trang chủ 1">
                <img src="public/img/banner2.jpg" alt="Banner Trang chủ 2">
                <img src="public/img/banner3.jpg" alt="Banner Trang chủ 3">
            </div>
        </div>
    <!-- 5. thông tin dịch vụ-->
        <section class="service-icons">
            <div class="service-item">
                <a href="#">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div class="info">
                        <h4>Miễn phí vận chuyển</h4>
                        <p>đơn từ 399K</p>
                    </div>
                </a>
            </div>
            <div class="service-item">
                <a href="#">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div class="info">
                        <h4>Đổi hàng tận nhà</h4>
                        <p>Trong vòng 15 ngày</p>
                    </div>
                </a>
            </div>
            <div class="service-item">
                <a href="#">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-comment-dollar"></i> 
                    </div>
                    <div class="info">
                        <h4>Thanh toán COD</h4>
                        <p>Yên tâm mua sắm</p>
                    </div>
                </a>
            </div>
            <div class="service-item">
                <a href="tel:02873066060">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <div class="info">
                        <h4>Hotline: 028.73066.060</h4>
                        <p>Hỗ trợ bạn từ 8h30-24h00</p>
                    </div>
                </a>
            </div>
        </section>
    <!-- 6. banner 2 - page home -->
        <section class="simple-banner-image">
            <img src="public/img/banner_2_page_home.jpg" alt="Banner Icon Denim">
        </section>



        <?php elseif (isset($_GET['ctrl']) && $_GET['ctrl'] == 'product' && $_GET['act'] == 'list'): ?>
            <div class="banner product-banner">
                <img src="public/img/banner_product_list.jpg" alt="Banner Trang Sản Phẩm">
            </div>
        <?php endif; ?>

    </header>


<!-- 7. main -->
    <main>

