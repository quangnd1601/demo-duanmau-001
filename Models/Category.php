<?php
    include_once "./Models/Database.php";
    class Category{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAll(){
            return $this->db->query("SELECT * FROM categories");
        }

    }
?>