<?php
    include_once "./Admin_Views/header.php";

    $ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'home';
    $act = isset($_GET['act']) ? $_GET['act'] : '';
    $id = isset($_GET['id']) ? $_GET['id'] : '';

// 1. thêm - sửa - xóa : danh mục
    $category_name = isset($_POST['category_name']) ? $_POST['category_name'] : '';

// 2. thêm - sửa - xóa : sản phẩm
    $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';
    $product_category = isset($_POST['product_category']) ? $_POST['product_category'] : '';
    $product_img = isset($_FILES['product_img']) ? $_FILES['product_img'] : '';
    $old_image = isset($_POST['old_image']) ? $_POST['old_image'] : ''; 

switch ($ctrl) {
    case 'home':
        include_once "./Admin_Views/home.php";
        break;

    case 'product':
        include_once "./Admin_Controllers/product_C.php";
        $product = new product_C();
        $product->main($act, $id, $product_name, $product_price, $product_category, $product_img, $old_image);
        break;

    case 'updateProduct': 
        include_once "./Admin_Views/updateProduct.php";
        break;

    case 'category':
        include_once "./Admin_Controllers/category_C.php";
        $category = new category_C();
        $category->main($act, $id, $category_name);
        break;

    case 'updateCategory':
        include_once "./Admin_Views/updateCategory.php";
        break;

    case 'users':
        include_once "./Admin_Views/users.php";
        break;

    default:
        include_once "./Admin_Views/home.php";
        break;
}

    include_once "./Admin_Views/footer.php";
?>
