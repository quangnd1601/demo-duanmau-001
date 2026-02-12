<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang quản trị Admin</title>
  <link rel="stylesheet" href="./public/css/admin_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="admin-container">

    <!-- Sidebar -->
    <aside class="sidebar">
      <a href="?ctrl=home"><h2 style="font-size:30px">Admin Panel</h2></a>
      <ul>
        <li><a href="?ctrl=home"><i class="fa-solid fa-house"></i>  Trang chủ</a></li>
        <li><a href="?ctrl=category"><i class="fa-solid fa-list"></i>  Danh mục</a></li>
        <li><a href="?ctrl=product"><i class="fa-solid fa-cookie-bite"></i>  Sản phẩm</a></li>
        <li><a href="?ctrl=users"><i class="fa-solid fa-user"></i>  Người dùng</a></li>
        <li><a href="#"><i class="fa-solid fa-cart-shopping"></i>  Đơn hàng</a></li>
        <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i>  Đăng xuất</a></li>
      </ul>
    </aside>

    <!-- Main content -->
    <main class="main-content">
      <header class="header">
        <h1>Bảng điều khiển Admin</h1> <a href="index.php" style="text-decoration: none; color:black"><h1> Quay Lại Trang Web</h1></a>
        <div class="admin-info">
          <span>Xin chào, <b>Admin</b></span>
        </div>
      </header>
