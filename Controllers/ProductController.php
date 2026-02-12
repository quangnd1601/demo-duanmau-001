<?php
    include_once "./Models/Product.php";
    class ProductController{
        public function list($keyword = '', $sort = 'null', $category_id = 'null', $page = 1){
            include_once "./Models/Product.php";
            $productModel = new Product();

            $limit = 10;
            $productList = $productModel->getAll($keyword, $sort, $category_id,$page , $limit);

            $totalPage = ceil($productModel->getTotalProduct() / $limit );

            include_once "./Models/Category.php";
            $categoryModel = new Category();
            $categoryList = $categoryModel->getAll();

            include_once "./Views/product_list.php";
        }
        public function detail($id){
            include_once "./Models/Product.php";
            $productModel = new Product();
            $product = $productModel->getById($id);
            
            // 2. sản phẩm liên quan
            $relatedProducts = [];
            if ($product && isset($product['category_id'])) {
                $categoryId = $product['category_id'];
                
                $relatedProducts = $productModel->getRelatedProducts(
                                                $id,
                                                $categoryId,
                                                5); 
            }

            include_once "./Views/product_detail.php";
        }
        public function search(){}
    }

                    
    
?>