<?php
    include_once "./Admin_Models/category_M.php";
    class category_C{
        public function main($act,$id,$category_name){
            switch ($act) {
                case 'add':
                    include_once "./Admin_Models/category_M.php";
                    $categoryModel = new category_M();
                    
                    $sql = "INSERT INTO categories(`name`) VALUES (:category_name)";
                    $categoryModel->add($sql,$category_name);

                    $this->load_category();
                    break;
                case 'remove':
                    include_once "./Admin_Models/category_M.php";
                    $categoryModel = new category_M();
                    $sql = "DELETE FROM categories WHERE id = :id";
                    $categoryModel->remove($sql,$id);

                    $this->load_category();
                    break;
                case 'edit':
                    include_once "./Admin_Models/category_M.php";
                    $categoryModel = new category_M();

                    $sql = "SELECT * FROM categories WHERE id = :id";
                    $category = $categoryModel->edit($sql,$id);

                    include_once "./Admin_Views/updateCategory.php";
                    break;
                case 'update':
                    include_once "./Admin_Models/category_M.php";
                    $categoryModel = new category_M();
                    $sql = "UPDATE categories SET name = :category_name WHERE id = :id";
                    $categoryModel->update($sql,$id,$category_name);
                    
                    $this->load_category();
                    break;
                default:
                    $this->load_category();
                    break;
            }
        }

        public function load_category(){
            include_once "./Admin_Models/category_M.php";
            $categoryModel = new category_M();

            $sql = "SELECT * FROM categories ORDER BY id DESC";
            $categoryList = $categoryModel->selectall($sql);
            
            include_once "./Admin_Views/category.php"; 
        }
    }
?>