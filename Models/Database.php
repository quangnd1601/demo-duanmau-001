<?php
    class Database{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "final_asm_php_1";
        public $conn;
    public function __construct(){
        try{    
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",
                        $this->username,
                        $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo "Kết nối thành công!";
        }catch(PDOException $e){
            echo "Kết nối thất bại! " . $e->getMessage();
        }
    }
        public function query($sql,...$args){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($args);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function queryOne($sql,...$args){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($args);
                return $stmt->fetch();
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function insert($sql,...$args){
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($args);
                
                return $this->conn->lastInsertId();
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }







    public function __destruct(){
        $this->conn = null;
    }
}
?>