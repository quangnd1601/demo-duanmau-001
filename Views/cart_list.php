
<div class="cart-layout">
    <section class="cart-box">
        <h2>Giỏ hàng</h2>


        <div class="cart-head">
            <span>STT</span>
            <span>Sản phẩm</span>
            <span>Giá</span>
            <span>Số lượng</span>
            <span>Tổng</span>
            <span>Xoá</span>
        </div>

    <?php if (empty($cart)): ?>
        <p style="text-align: center; padding: 20px;">Giỏ hàng của bạn hiện đang trống.</p>
    <?php else: ?>
        <?php foreach ($cart as $key => $it): ?>
            <div class="cart-item">
                <span><?= $key + 1 ?></span>
                <div class="item-info">
                        <img src="public/img/<?= $it['image'] ?>" alt="<?= $it['name']?>"><div>
                        <p class="item-name"><?= $it['name']?></p>
                        <p class="item-note"></p>
                    </div>
                </div>

                <span>
                    <?= number_format(isset($it['sale_price']) ? $it['sale_price'] : $it['price'], 0, ',', '.') ?> VND
                </span>
                <!-- <input type="number" value="" min="1"> -->
                 <span>
                    <a href="?ctrl=cart&act=decrease&id=<?=$it['id']?>">-</a>
                        <?=$it['quantity']?>
                    <a href="?ctrl=cart&act=increase&id=<?=$it['id']?>">+</a>
                 </span>
                <span>₫
                    <?= number_format($it['total'], 0, ',', '.') ?> VND
                </span>
                
                <a href="?ctrl=cart&act=remove&id=<?= $it['id'] ?>" class="btn-del">X</a>
            </div>
        <?php endforeach; ?>

        <div class="cart-footer">
            <a href="?ctrl=cart&act=removeAll">
                <button class="btn-clear">Xoá hết giỏ hàng</button>
            </a>
        </div>

    <?php endif; ?>
</section>

    <aside class="pay-box">
        <h2>Thanh toán</h2>
        <div class="pay-row">
            <span>Tạm tính:</span>
            <strong><?= number_format(isset($totalMoney) == 0 ? 0 : $totalMoney, 0, ',', '.') ?> VND</strong>
        </div>
        <div class="pay-row">
            <span>Phí ship:</span>
            <strong><?= number_format(30000, 0, ',', '.') ?> VND</strong>
        </div>
        <div class="pay-row total">
            <span>Tổng cộng:</span>
            <strong><?= number_format($totalMoney + 30000, 0, ',', '.') ?> VND</strong>
        </div>

        <a href="?ctrl=product&act=list" 
                  class="btn-buy" 
                  style="background: #28a745; 
                          text-decoration: none; 
                          width: 100%;          
                          display: block;        
                          text-align: center;  
                          padding: 10px 0;
                          font-size: 17px;">     
              Tiếp Tục Mua Hàng
        </a>

        <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <a href="?ctrl=cart&act=checkout">        
                <button class="btn-buy" style="font-size: 17px;">
                    Thanh toán
                </button>
            </a>
        <?php endif; ?>
        
    </aside>
</div>