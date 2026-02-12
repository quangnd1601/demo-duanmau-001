<section>
    <div class="container2">
        <section>
            <form action="?ctrl=product&act=update" method="POST" enctype="multipart/form-data">
                <!-- id - old_img -->
                <input type="hidden" name="id" value="<?=$productList[0]['id']?>">
                <input type="hidden" name="old_image" value="<?=$productList[0]['image']?>">

                <label for="product_name">Tên Sản Phẩm:</label><br>
                <input type="text" id="product_name" name="product_name" 
                       value="<?=$productList[0]['name']?>" required><br>

                <label for="product_price">Giá:</label><br>
                <input type="text" id="product_price" name="product_price" 
                       value="<?=$productList[0]['price']?>" required><br>

                <label for="product_img">Hình Ảnh hiện tại:</label><br>
                <img src="./public/img/<?=$productList[0]['image']?>"><br>

                <label for="product_img">Chọn ảnh mới (nếu muốn thay):</label><br>
                <input type="file" id="product_img" name="product_img"><br>



                <input type="submit" value="Cập Nhật">
            </form>
        </section>
    </div>
</section>
</body>
</html>
