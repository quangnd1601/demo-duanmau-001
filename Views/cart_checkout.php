 <div class="checkout-container">
        <div class="cart-summary">
          <h3>Sản phẩm trong giỏ hàng</h3>
          <table>
            <thead>
              <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Sản Phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
              </tr>
            </thead>
            <tbody>    
            <?php if (empty($cart)): ?>
                <p style="text-align: center; padding: 20px;">Giỏ hàng của bạn hiện đang trống.</p>
            <?php else: ?>
                <?php foreach ($cart as $key => $it): ?>
                  <tr>
                      <th><?=$key + 1?></th>
                      <th><img src="./public/img/<?=$it['image']?>" width="50px"></th>
                      <th><?=$it['name']?></th>
                      <td><?=$it['quantity']?></td>
                      <td><?=number_format(isset($it['sale_price']) ? $it['sale_price'] : $it['price'])?> VND</td>
                      <td><?=number_format($it['total'])?> VNĐ</td>
                  </tr>
                    <?php endforeach; ?>    
            <?php endif; ?>
                  <tr>
                      <td colspan="4"></td>
                      <td><strong>Tổng Tiền:</strong></td>
                      <td><?=number_format($totalMoney)?> VNĐ</td>
                  </tr>
            </tbody>
          </table>
        </div>

        <div class="payment-info">
            <h3>Thông tin thanh toán</h3>
            <form action="?ctrl=cart&act=payment" method="POST">
                <label for="user_name">Họ và tên:</label>
                <input type="text"  name="user_name" 
                                    value="<?=isset($_SESSION['user']) ? $_SESSION['user']['name'] : '' ?>" required />

                <label for="user_address">Địa chỉ giao hàng:</label>
                <input type="text" name="user_address" 
                                    value="<?=isset($_SESSION['user']) ? $_SESSION['user']['address'] : '' ?>"required />

                <label for="user_phone">Số điện thoại:</label>
                <input type="text" name="user_phone" 
                                    value="<?=isset($_SESSION['user']) ? $_SESSION['user']['phone'] : '' ?>"required />

                <label for="payment_method">Phương thức thanh toán:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="COD">Thanh toán khi nhận hàng (COD)</option>
                    <option value="Online">Thanh toán trực tuyến (Thẻ / QR)</option>
                </select>

                <label for="note">Ghi chú đơn hàng:</label>
                <textarea name="note" id="note"></textarea> <br>

                <button type="submit">Thanh toán</button>
            </form>
        </div>
      </div>