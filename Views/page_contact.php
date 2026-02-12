<div class="contact-container">
        <h2>Liên hệ với chúng tôi</h2>
        <p>Vui lòng điền thông tin bên dưới để gửi tin nhắn:</p>

        <form action="contact-form.php" method="POST">
          <label for="name">Họ và tên:</label>
          <input type="text" id="name" name="name" required />

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required />

          <label for="message">Tin nhắn:</label>
          <textarea id="message" name="message" rows="5" required></textarea>

          <button type="submit">Gửi tin nhắn</button>
        </form>
      </div>