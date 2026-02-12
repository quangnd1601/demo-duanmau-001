<!-- 1. Thanh điều hướng - sản phẩm - breadcrumb -->
  <div class="breadcrumb">
      <a href="index.php">Trang chủ</a> /
      <a href="?ctrl=product&act=list">Tất cả sản phẩm</a> /
      <a href="?ctrl=product&act=detail&id=<?=$product['id']?>" class="active"><?=$product['name']?></a>
  </div>

<!-- 2. Chi tiết sản phẩm -->
<section class="product-detail">
    <div class="images">
      <div class="thumbnails">
        <img src="./public/img/product.png" alt="thumb" />
        <img src="./public/img/product.png" alt="thumb" />
        <img src="./public/img/product.png" alt="thumb" />
        <img src="./public/img/product.png" alt="thumb" />
      </div>
      <div class="main-image">
        <img src="./public/img/<?=$product['image']?>" alt="main product" />
      </div>
    </div>

  <!-- 2.1. Thông tin sản phẩm -->
    <div class="info">
      <h1><?=$product['name']?></h1>
      Mô tả: <?=$product['description']?> <br> <br>
      <p class="status">Còn hàng</p>
      <p class="price"><?= number_format($product['price']) ?> VND</p>

      <div class="promo">
        <p><strong>Khuyến mãi:</strong></p>
        <ul>
          <li>Nhập mã <b>SEP9</b> giảm 9k đơn từ 0đ</li>
          <li>Nhập mã <b>SEP30</b> giảm 30k đơn từ 299k</li>
          <li>Nhập mã <b>SEP50</b> giảm 50k đơn từ 599k</li>
          <li>Nhập mã <b>SEP100</b> giảm 100k đơn từ 999k</li>
          <li>Freeship mọi đơn hàng</li>
        </ul>
      </div>

      <div class="options">
        <div class="colors">
          <p>Màu sắc:</p>
          <button>Be</button>
          <button>Đen</button>
          <button>Xanh rêu</button>
        </div>

        <div class="sizes">
          <p>Kích thước:</p>
          <button>29</button>
          <button>30</button>
          <button>31</button>
          <button>32</button>
          <button>34</button>
          <button>36</button>
        </div>
      </div>


    <?php 
      // Hiển thị thông báo thêm giỏ hàng thành công (nếu có)
      if (isset($_SESSION['info'])) {
          echo '<p style="color: green; padding-bottom:10px;">' . $_SESSION['info'] . '</p>';
          unset($_SESSION['info']); 
      }
    ?>

    <!-- 1. Thêm sản phẩm - addToCart -->
      <input type="hidden" name="id" value="<?=$product['id']?>"> 
      <div class="quantity"> Số Lượng: 
          <input type="number" 
                name="quantity" 
                min="1" 
                value="1" 
                style="padding: 5px;border-radius:5px; width: 60px;">
      </div>
      <div class="actions">
        
            <form action="?ctrl=cart&act=add&id=<?=$product['id']?>" method="POST">
                <button type="submit" class="add" >
                    Thêm vào giỏ hàng
                </button>
            </form>
            <a href="?ctrl=cart&act=list">              
                <button class="buy">
                      Mua ngay
                </button>
              </a>
      </div>        

    </div>
</section>

<br>
<!-- 3. Sản phẩm liên quan -->
<h2>Sản Phẩm Liên Quan</h2>
  <section class="new-products"> 
    <?php if (!empty($relatedProducts)): 
            foreach($relatedProducts as $product){   ?>
              <div class="product">
                  <a href="?ctrl=product&act=detail&id=<?=$product['id']?>">
                      <img src="./public/img/<?=$product['image']?>" alt="<?=$product['name']?>" />
                  </a>
                  
                  <h3><?=$product['name']?></h3>
                  
                  <?php if(isset($product['sale_price']) && $product['sale_price'] < $product['price'] && $product['sale_price'] > 0): ?>
                      Giá gốc: <del><?= number_format($product['price'])?> </del> VND
                      <p>
                          Giảm còn: <span style="color: red; font-weight: bold;"><?= number_format($product['sale_price'])?></span> VND
                      </p>
                  <?php else: ?>
                      <p>Giá: <?= number_format($product['price'])?> VND</p> 
                  <?php endif; ?>
                  
                  <a href="#" class="button">Mua ngay</a> 
              </div>
      <?php } else: ?>

</section> 
          <p class="center">Không tìm thấy sản phẩm liên quan nào!</p>
      <?php endif; // Kết thúc if check empty ?>

 <br><br><br><br><br>