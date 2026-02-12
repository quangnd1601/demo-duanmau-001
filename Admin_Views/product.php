<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới Sản Phẩm</h2> <br>
            <form action="?ctrl=product&act=add" method="POST" enctype="multipart/form-data">
                <input type="text" name="product_name" placeholder="Tên sản phẩm">
                <input type="text" name="product_price" placeholder="Giá">

                <label for="">Loại Sản Phẩm: 
                    <select name="product_category" style="width:150px; height:35px; text-align: center;border-radius: 5px; border: none; box-shadow: 0 0 3px gray;">
                        <?php foreach($categoryList as $cate): ?>
                            <option value="<?=$cate['id']?>"> <?=$cate['name']?> </option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <input type="file" name="product_img"> 
                <input type="submit" value="Thêm">
            </form>
        </div>
        <div class="col9">
            <h2>Danh Sách Sản Phẩm</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Loại</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productList as $product): ?>
                        <tr>
                            <td> <?=$product['id']?> </td>
                            <td> <img src="./public/img/<?=$product['image']?>" width="50px"> </td>
                            <td> <?=$product['name']?> </td>
                            <td> <?=$product['cate_name']?> </td>
                            <td class="action-icons">
                                <a href="?ctrl=product&act=edit&id=<?=$product['id']?>"><i class="fas fa-edit"></i></a>
                                <a href="?ctrl=product&act=remove&id=<?=$product['id']?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

</body>
</html>
