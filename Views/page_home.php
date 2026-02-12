<!-- new-products --> <br><br>
    <h2>Sản Phẩm Mới Nhất</h2>
    <section class="new-products">
        <?php
            foreach($productList as $product){
        ?>
        <div class="product">
            <a href="?ctrl=product&act=detail&id=<?=$product['id']?>">
                <img src="./public/img/<?=$product['image']?>" alt="Sản phẩm mới" />
            </a>
            <h3><?=$product['name']?></h3>
            <?php if(isset($product['sale_price'])): ?>
                    Giá gốc: <del><?= number_format($product['price'])?> </del> VND
                <p>
                    Giảm còn: <?= number_format($product['sale_price'])?> VND
                </p>
            <?php else: ?>
                <p>Giá: <?= number_format($product['price'])?> VND</p>  
            <?php endif; ?>
                <a href="?ctrl=cart&act=list" class="buy-now">Mua ngay</a>
        </div>
        <?php
            }
        ?>
    </section>
            <br><br><br><br>
            

<!-- 2. tin thời trang -->
<section class="news-section">
    <h2 class="section-title">Tin Thời Trang</h2>
    
    <div class="news-list">
        <a href="#" class="news-item">
            <div class="news-item-thumbnail">
                <img src="public/img/tinthoitrang1.jpg" alt="Thời Trang Mùa Thu">
            </div>
            <div class="news-item-info">
                <h4 class="title">Thời Trang Mùa Thu 2025: Bí Quyết Phối Đồ Thu Nữ</h4>
                <div class="date">30/09/2025</div>
                <p>Mùa thu 2025 đang gõ cửa, mang theo những cơn gió se lạnh cùng bảng màu dịu dàng đặc trưng. Đây...</p>
            </div>
        </a>
        <a href="#" class="news-item">
            <div class="news-item-thumbnail">
                <img src="public/img/tinthoitrang2.jpg" alt="Phong cách Retro">
            </div>
            <div class="news-item-info">
                <h4 class="title">Retro Outfit - Cách Phối Đồ Phong Cách Retro Đẹp Cho Nam Nữ</h4>
                <div class="date">26/09/2025</div>
                <p>Trong bối cảnh ngành thời trang không ngừng thay đổi, phong cách retro vẫn giữ một vị trí đặc biệt, trở...</p>
            </div>
        </a>
        <a href="#" class="news-item">
            <div class="news-item-thumbnail">
                <img src="public/img/tinthoitrang3.jpg" alt="Phong cách Retro là gì">
            </div>
            <div class="news-item-info">
                <h4 class="title">Phong cách Retro Là Gì? Style Cổ Điển Say Đắm Giới Thời Trang 2025</h4>
                <div class="date">17/09/2025</div>
                <p>Phong cách retro đang trở thành nguồn cảm hứng bất tận cho giới mộ điệu thời trang, nơi quá khứ và...</p>
            </div>
        </a>
        </div>
</section>
<br><br><br><br>

<!-- <h2>Sản phẩm mới</h2>
    <section class="new-products"></section> 
       <div class="product">
            <img src="./public/img/product.png" alt="Sản phẩm mới" />
            <h3>Sản phẩm mới 1</h3>
            <p>Giá: 400,000 VNĐ</p>
            <button>Mua ngay</button>
        </div> 
</section> -->