<div class="login">
    <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
    <div class="login-box">
        <div class="tabs">
          <a href="?ctrl=user&act=login">ĐĂNG NHẬP</a>
          <a href="?ctrl=user&act=register" class="active">ĐĂNG KÝ</a>
        </div>
        <form action="?ctrl=user&act=submitRegister" method="post">
            <input type="text" name="name" placeholder="Họ và tên" required>
            <!-- <input type="text" name="phone" placeholder="Số điện thoại" required> -->
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <input type="password" name="rePassword" placeholder="Xác nhận mật khẩu" required>
            <button type="submit">ĐĂNG KÝ</button>
        </form>

    <!-- 1. Login_Failed - Đăng nhập thất bại-->
        <?php if(isset($_SESSION['info'])): ?>
            <div style="text-align: center;
                        color: red;
                        margin-top: 10px">
                <?=$_SESSION['info']?>
            </div>
        <?php unset($_SESSION['info']); endif; ?>
        
    </div>
</div>
