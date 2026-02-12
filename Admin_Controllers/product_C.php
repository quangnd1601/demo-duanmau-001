<?php
    class product_C{
        public function main($act,$id,$product_name,$product_price,$product_category,$product_img){
            switch($act) {
                case 'add':
                    include_once "./Admin_Models/product_M.php";
                    $productModel = new product_M();
                    $sql = "INSERT INTO products(`name`,`price`,`category_id`,`image`)
                            VALUES (:product_name, :product_price, :product_category, :product_img)";
                    
                    $file_img = './public/img/' . $product_img['name'];
                    move_uploaded_file($product_img['tmp_name'],$file_img);

                    $productModel->add($sql,$product_name,$product_price,$product_category,$product_img['name']);

                    $this->load_product();
                    break;
                    
                    case 'remove':
                        include_once "./Admin_Models/product_M.php";
                        $productModel = new product_M();

                        // 1. Lấy info ảnh
                        $sql_info = "SELECT image FROM products WHERE id = :id";
                        $product = $productModel->selectone($sql_info, $id);

                        if ($product && file_exists('./public/img/' . $product[0]['image'])) {
                            @unlink('./public/img/' . $product[0]['image']);
                        }
                        // 2. Xóa
                        $sql = "DELETE FROM products WHERE id = :id";
                        $productModel->remove($sql, $id);

                        $this->load_product();
                        break;

                case 'edit':
                    include_once "./Admin_Models/product_M.php";
                    $productModel = new product_M();
                    $sql = "SELECT * FROM products WHERE id = :id";
                    $productList = $productModel->edit($sql,$id);
                    include_once "./Admin_Views/updateProduct.php";
                    break;

                case 'update':
                    include_once "./Admin_Models/product_M.php";
                    $productModel = new product_M();

                    $id = $_POST['id'];
                    $product_name = $_POST['product_name'];
                    $product_price = $_POST['product_price'];
                    $old_image = $_POST['old_image'];
                    $product_img = $_FILES['product_img'];

                    if ($product_img['name'] != '') {
                        $new_image = $product_img['name'];
                        $tmp_path = $product_img['tmp_name'];
                        $upload_path = './public/img/' . $new_image;

                        $old_path = './public/img/' . $old_image;
                        if (file_exists($old_path)) {
                            @unlink($old_path); 
                        }
                        move_uploaded_file($tmp_path, $upload_path);
                    } else {
                        $new_image = $old_image;
                    }

                    $sql = "UPDATE products 
                            SET `name` = :product_name, 
                                `price` = :product_price, 
                                `image` = :product_img 
                            WHERE id = :id";

                    $productModel->update($sql, $id, $product_name, $product_price, $new_image);

                    $this->load_product();
                    break;
                default:
                    $this->load_product();
                    break;
            }
        }

        public function load_product(){
            include_once "./Admin_Models/product_M.php";
            $productModel = new product_M();
            $sql = "SELECT pro.*, cate.id AS cate_id, cate.name AS cate_name 
                    FROM products pro 
                    INNER JOIN categories cate ON pro.category_id = cate.id
                    ORDER BY pro.id DESC 
                    LIMIT 20";

            $productList = $productModel->selectall($sql);

            // hiển thị danh mục - trong sản phẩm
            include_once "./Admin_Models/category_M.php";
            $categoryModel = new category_M();
            $sql = "SELECT * FROM categories";
            $categoryList = $categoryModel->selectall($sql);

            include_once "./Admin_Views/product.php";
        }

    }

?>