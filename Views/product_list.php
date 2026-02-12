<h2>Tất cả sản phẩm</h2>

    <form method="GET" action="" class="filters">
        <input type="hidden" name="ctrl" value="product">
        <input type="hidden" name="act" value="list">

        <input type="search"  name="keyword" 
                              placeholder="Tìm kiếm sản phẩm..." 
                              value="<?=$keyword?>"/>

        <select name="sort">
            <option value="null">Mặc định</option>
            <option <?= $sort == 'price-asc' ? 'selected': ''?> value="price-asc">Giá thấp đến cao</option>
            <option <?= $sort == 'price-desc' ? 'selected': ''?> value="price-desc">Giá cao đến thấp</option>
            <option <?= $sort == 'name-asc' ? 'selected': ''?> value="name-asc">Tên A-Z</option>
            <option <?= $sort == 'name-desc' ? 'selected': ''?> value="name-desc">Tên Z-A</option>
        </select>

        <select name="category_id">
            <option value="null">Tất cả danh mục</option>
            <?php foreach($categoryList as $cate): ?>
                <option <?= $category_id == $cate['id'] ? 'selected': ''?> value="<?=$cate['id']?>"> <?=$cate['name']?> </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Lọc</button>
    </form>

      <section class="product-list">
          <?php foreach($productList as $product):?>
              <div class="product">
                <a href="?ctrl=product&act=detail&id=<?=$product['id']?>">
                   <img src="./public/img/<?=$product['image']?>" alt="Sản phẩm 1" />
                </a>
                <h3><?=$product['name']?></h3>
                <p>Giá: <?=number_format($product['price'])?> VNĐ</p>
                <button>Mua ngay</button>
              </div>
          <?php endforeach;?>
      </section>



<div class="pagination">
    <?php
        $filterParams = "";
        if (!empty($keyword)) {
            // 1. SỬ DỤNG urlencode() để đảm bảo tính AN TOÀN và CHÍNH XÁC
            $filterParams .= "&keyword=" . urlencode($keyword);
        }
        
        if ($sort != 'null') {
            $filterParams .= "&sort=" . urlencode($sort);
        }
        
        if ($category_id != 'null') {
            $filterParams .= "&category_id=" . urlencode($category_id);
        }
        
        // 2. XÂY DỰNG ĐƯỜNG DẪN GỐC 
        $baseLink = "?ctrl=product&act=list" . $filterParams;
    ?>
    
    <a href="<?=$baseLink?>&page=<?=max(1, $page - 1)?>" class="btn"> Trước </a>
        <span> <?=$page?> / <?=$totalPage?> </span>
    <a href="<?=$baseLink?>&page=<?=min($totalPage, $page + 1)?>" class="btn"> Tiếp </a>

</div>