<?php
    include_once "./Models/Database.php";
    class Order{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }

        public function create($user_id, $user_name, $user_address, $user_phone, $total_money, $payment_method = 'pending', $note = null){
            $payment_status = 'pending';
            if($payment_method == 'Online'){
                $payment_status = 'paid';
            }
            return $this->db->insert("INSERT INTO orders(`user_id`,`user_name`,`user_address`,`user_phone`,`total_money`,`payment_method`,`payment_status`,`note`)
                                           VALUES (?,?,?,?,?,?,?,?)",$user_id,
                                                            $user_name, $user_address,
                                                            $user_phone, $total_money,
                                                            $payment_method, $payment_status, $note);
        }
        public function insertItem($order_id, $product_id, $quantity, $price){
            return $this->db->insert("INSERT INTO order_details(`order_id`, `product_id`, `quantity`,`price`)
                                             VALUES (?,?,?,?)", $order_id,
                                                            $product_id,
                                                            $quantity,
                                                            $price);
        }

    }
?>