<div class="login">
  <h2>ĐĂNG NHẬP TÀI KHOẢN</h2>
  <div class="login-box">
    <div class="tabs">
      <a href="?ctrl=user&act=login" class="active">ĐĂNG NHẬP</a>
      <a href="?ctrl=user&act=register">ĐĂNG KÝ</a>
    </div>

    <form action="?ctrl=user&act=submitLogin" method="post">
        <input type="email" name="email" placeholder="Nhập Email của ban" required>
        <div class="password-field">
          <input type="password" name="password" placeholder="Mật khẩu" required>
          <span class="toggle-pass">&#128065;</span>
        </div>
        <button type="submit">ĐĂNG NHẬP</button>
        <a href="?ctrl=user&act=forgotPassword" class="forgot">Quên mật khẩu?</a>
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
