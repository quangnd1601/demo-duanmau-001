<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới Danh Mục</h2> <br>

            <form action="?ctrl=category&act=add" method="POST">
                <input type="text" name="category_name" placeholder="Tên Danh Mục">
                <input type="submit" value="Thêm">
            </form>
        </div>
        <div class="col9">
            <h2>Danh Sách Danh Mục</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Danh Mục</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categoryList as $key => $cate):?>
                        <tr>
                            <td> <?= $cate['id'] ?> </td>
                            <td><?= $cate['name'] ?></td>
                            <td class="action-icons">
                                <a href="?ctrl=category&act=edit&id=<?=$cate['id']?>"><i class="fas fa-edit"></i></a>
                                <a href="?ctrl=category&act=remove&id=<?=$cate['id']?>"><i class="fas fa-trash-alt"></i></a>
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

