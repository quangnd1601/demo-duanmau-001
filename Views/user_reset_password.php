     <div class="reset-password-container">
        <h2>Đặt lại mật khẩu</h2>
        <form action="verify-otp.php" method="POST">
          <label for="otp">Nhập mã OTP:</label>
          <input type="text" id="otp" name="otp" required />

          <label for="new-password">Mật khẩu mới:</label>
          <input type="password"
            id="new-password"
            name="new-password"
            required
          />

          <label for="confirm-password">Xác nhận mật khẩu:</label>
          <input
            type="password"
            id="confirm-password"
            name="confirm-password"
            required
          />

          <button type="submit">Xác nhận</button>
        </form>
        <p>Quay lại <a href="login.html">Đăng nhập</a></p>
      </div>