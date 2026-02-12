<?php
    include_once "./Models/Database.php";
    class Product{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getNew(){
            return $this->db->query("SELECT * FROM products 
                                          ORDER BY id DESC LIMIT 10");
        }
        public function getById($id){
            return $this->db->queryOne("SELECT * FROM products
                                            WHERE id = ?",$id);
        }
        // 4. Sản phẩm liên quan 
                public function getRelatedProducts($currentProductId,
                                                    $categoryId, 
                                                    $limit = 5) {
                    
                    // Đảm bảo các giá trị là số nguyên để hạn chế rủi ro
                    $currentProductId_int = (int)$currentProductId;
                    $categoryId_int = (int)$categoryId;
                    $limit_int = (int)$limit;
                    
                    $sql = "SELECT * FROM products 
                            WHERE category_id = $categoryId_int
                            AND id != $currentProductId_int
                            ORDER BY RAND() 
                            LIMIT $limit_int";
                                        
                    return $this->db->query($sql );
                }
        //  WHERE - AND - ORDER BY ...
        public function getAll($keyword, $sort, $category_id, $page = 1, $limit = 5){
                // $page = 1 => $start = 0
                // $page = 2 => $start = 5
                // $page = 3 => $start = 10

                // $page = n => $start = ($page - 1) * $limit;
            $start = ($page - 1) * $limit;

            $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%' ";

            if($category_id != 'null'){
                $sql .= " AND category_id = $category_id";
            }

            if($sort != 'null' ){
                $column = explode('-', $sort)[0];
                $type = explode('-', $sort)[1];

                $sql .= " ORDER BY $column $type";
            }

                $sql .= " LIMIT $start, $limit ";

            return $this->db->query($sql);
        }
        
        public function getTotalProduct(){
            return count($this->db->query("SELECT * FROM products"));
        }

    }
?>