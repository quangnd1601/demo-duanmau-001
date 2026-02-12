<?php
    class category_M{
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
                $stmt = $this->conn->prepare($sql,$id);
                $stmt->bindParam(":id",$id);

                $stmt->execute();

                $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $kq;
            } catch (PDOException $e) {
                echo "Lỗi rồi! " . $e->getMessage();
            }
        }
        public function add($sql,$category_name){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":category_name",$category_name);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Lỗi rồi! " . $e->getMessage();
            }
        }
        public function remove($sql,$id){

            $check_remove = $this->check_product($sql,$id);
            try{
                if(count($check_remove) > 0){
                    echo "<p style='color:red; text-align:center; font-size: 22px; margin-top:15px;'>" .  
                                "Bạn không thể xóa danh mục này! Vì danh mục này đang có các sản phẩm liên quan!" .
                        "<p>" ;
                }else{
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(":id",$id);
                    $stmt->execute();
                }
            } catch (PDOException $e) {
                echo "Lỗi rồi! " . $e->getMessage();
            }
        }
        public function check_product($sql,$id){
            $sql = "SELECT * FROM products WHERE category_id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id",$id);
            
            $stmt->execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $kq;
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

        public function update($sql,$id,$category_name){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id",$id);
                $stmt->bindParam(":category_name",$category_name);

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