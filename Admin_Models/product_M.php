<?php
    class product_M{
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "final_asm_php_1";
        public $conn;
        
        public function __construct(){
            try {
                $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8",
                      $this->username, $this->password);

                $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                // echo "Ket noi thanh cong!";
            } catch (PDOException $e) {
                echo "Ket noi that bai! " . $e->getMessage();
            }
        }
        public function selectall($sql){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $kq;
            } catch (PDOException $e) {
                echo "Lỗi rồi! " . $e->getMessage();
            }

        }
        public function selectone($sql,$id){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id",$id);

                $stmt->execute();

                $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $kq;
            } catch (PDOException $e) {
                echo "Lỗi rồi! " . $e->getMessage();
            }
        }
        public function add($sql,$product_name,$product_price,$product_category,$product_img){
            try {
                $stmt = $this->conn->prepare($sql);

                $stmt->bindParam(":product_name",$product_name);
                $stmt->bindParam(":product_price",$product_price);
                $stmt->bindParam(":product_category",$product_category);
                $stmt->bindParam(":product_img",$product_img);

                $stmt->execute();
            } catch (PDOException $e) {
                echo "Lỗi rồi! " . $e->getMessage();
            }
        }
        public function remove($sql,$id){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id",$id);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Lỗi rồi! " . $e->getMessage();
            }
        }

        public function edit($sql,$id){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id",$id);
                $stmt->execute();
                $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $kq;
            } catch (PDOException $e) {
                echo "Lỗi rồi! " . $e->getMessage();
            }
        }

        public function update($sql,$id,$product_name,$product_price,$product_img){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id",$id);
                
                $stmt->bindParam(":product_name",$product_name);
                $stmt->bindParam(":product_price",$product_price);
                $stmt->bindParam(":product_img",$product_img);

                $stmt->execute();
            } catch (PDOException $e) {
                echo "Lỗi rồi! " . $e->getMessage();
            }
        }
    
        public function __destruct(){
            $this->conn = null;
        }
    }
?>