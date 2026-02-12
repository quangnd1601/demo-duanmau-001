<?php
    class PageController{
        public function home(){
                include_once "./Models/Product.php";

                $productModel = new Product();
                $productList = $productModel->getNew();

            include_once "./Views/page_home.php";
        }
        public function about(){}
        public function contact(){
            include_once "./Views/page_contact.php";
        }


    }
?>

