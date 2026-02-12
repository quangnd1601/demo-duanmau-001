
<section>
    <div class="container2">
        <section>
            <form action="?ctrl=category&act=update&id=<?=$category[0]['id']?>" method="POST">
                <label for="category_name" >Tên Danh Mục:</label><br>
                <input type="text" id="category_name" name="category_name" value="<?=$category[0]['name']?>"><br>                
                <input type="submit" value="Cập nhật">
            </form>
        </section>
    </div>
</section>

</body>
</html>
