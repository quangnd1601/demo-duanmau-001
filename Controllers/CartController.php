<?php
    class CartController{
        // public function list(){
        //     if(!isset($_SESSION['cart'])){
        //         $_SESSION['cart'] = [];
        //     }

        //     $cart = $_SESSION['cart'];
        //     $totalMoney = 0;

        //     include_once "./Models/Product.php";
        //     $productModel = new Product();

        //     foreach ($cart as &$item) {
        //         $info = $productModel->getById($item['id']);

        //         $item['name'] = $info['name'];
        //         $item['image'] = $info['image'];
        //         $item['price'] = $info['price'];
        //         $item['sale_price'] = $info['sale_price'];
        //         $item['image'] = $info['image'];
                
        //         $item['total'] = $item['quantity'] * (isset($item['sale_price']) ? $item['sale_price'] : $item['price']);
        //         $totalMoney += $item['total'];
        //     }
        //     $_SESSION['total_money'] = $totalMoney;
        //     include_once "./Views/cart_list.php";
        // }

      
        public function list(){
            // Khởi tạo giỏ hàng nếu chưa tồn tại
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = [];
            }

            $cart = $_SESSION['cart'];
            $totalMoney = 0;

            include_once "./Models/Product.php";
            $productModel = new Product();

            foreach ($cart as $key => &$item) {
                // 1. KIỂM TRA MỤC GIỎ HÀNG BỊ LỖI
                if (!is_array($item) || !isset($item['id'])) {
                    unset($cart[$key]); // Xóa khỏi mảng $cart đang lặp
                    unset($_SESSION['cart'][$key]); // Xóa khỏi Session
                    continue; 
                }

                // Lấy thông tin sản phẩm từ Model
                $info = $productModel->getById($item['id']);
                
                // 2. KIỂM TRA DỮ LIỆU SẢN PHẨM
                if (!is_array($info) || empty($info)) {
                    unset($cart[$key]);
                    unset($_SESSION['cart'][$key]);
                    continue; 
                }

                // 3. GÁN DỮ LIỆU VÀ TÍNH TOÁN
                $item['name'] = $info['name'];
                $item['image'] = $info['image'];
                $item['price'] = $info['price'];
                $item['sale_price'] = $info['sale_price'];
                
                $price = isset($item['sale_price']) ? $item['sale_price'] : $item['price'];

                $item['total'] = $item['quantity'] * $price;
                $totalMoney += $item['total'];
            }
            
            // Cập nhật lại giỏ hàng 
            $_SESSION['cart'] = $cart; 
            $_SESSION['total_money'] = $totalMoney;

            include_once "./Views/cart_list.php";
        }
      
        // public function checkout(){
        //     $cart = $_SESSION['cart'];
        //     $totalMoney = $_SESSION['total_money'];
        //     include_once "./Views/cart_checkout.php";
        // }


        public function checkout(){
            if (!isset($_SESSION['user'])) {
                echo "<script>
                        alert('Vui lòng đăng nhập để tiếp tục thanh toán!');
                        window.location.href='?ctrl=user&act=login';
                    </script>";
                exit();
            }
            $cart = $_SESSION['cart'];
            $totalMoney = $_SESSION['total_money'] ?? 0;

            include_once "./Views/cart_checkout.php";
        }


        public  function payment(){
            $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : 'null';
            $user_name = $_POST['user_name'];
            $user_address = $_POST['user_address'];
            $user_phone = $_POST['user_phone'];
            $note = $_POST['note'];

            $payment_method = $_POST['payment_method'];

            $total_money = $_SESSION['total_money'];

            include_once "./Models/Order.php";
            $orderModel = new Order();
            $order_id = $orderModel->create($user_id,$user_name,$user_address,
                                $user_phone,$total_money,$payment_method, $note);


            $cart = $_SESSION['cart'];
            foreach($cart as $item){
                $orderModel->insertItem($order_id, 
                                        $item['id'],
                                        $item['quantity'],
                                        min($item['price'],$item['sale_price']));
            }
            $_SESSION['info'] = "Đơn hàng của bạn có mã là #" . $order_id;
            unset($_SESSION['cart']);
            header("location: ?ctrl=cart&act=done");
            }
            public function done(){
                include_once "./Views/cart_done.php";
            }
    
    

        public function add($id){
            // 1. kiểm tra có giỏ hàng chưa -> chưa có thì tạo
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = [];
            }
            // 2.
                // 2.1 nếu CÓ sản phẩm trong giỏ -> tăng số lượng sản phẩm
                $inCart = false;
                foreach($_SESSION['cart'] as &$item) {
                    if($item['id'] == $id){
                        $item['quantity']++;
                        $inCart = true;
                        break;
                    }
                }
                // 2.2 nếu CHƯA có sản phẩm trong giỏ -> tăng số lượng = 1
                if(!$inCart){
                    array_push($_SESSION['cart'],[    
                        'id'       => $id,
                        'quantity' => 1 ]);
                }


                $_SESSION['info'] = "Đã thêm sản phẩm vào giỏ hàng!";
                header("location: ?ctrl=product&act=detail&id=$id");
            }


        // 4. tăng - giảm - xóa - xóa hết:  giỏ hàng
        public function decrease($id){
            foreach($_SESSION['cart'] as &$item){
                if($item['id'] == $id){
                    $item['quantity']--;
                    $item['quantity'] = max(1,$item['quantity']);
                    break;
                }
            }
            header("location: ?ctrl=cart&act=list");
        }
        public function increase($id){
            foreach($_SESSION['cart'] as &$item){
                if($item['id'] == $id){
                    $item['quantity']++;
                    break;
                }
            }
            header("location: ?ctrl=cart&act=list");
        }
        public function remove($id){
            foreach($_SESSION['cart'] as $index => &$item){
                if($item['id'] == $id){
                    array_splice($_SESSION['cart'],$index , 1);
                    break;
                }
            }
            header("location: ?ctrl=cart&act=list");
        }
        public function removeAll(){
            unset($_SESSION['cart']); 
            header("location: ?ctrl=cart&act=list");
        }

    }
?>