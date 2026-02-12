<?php
    class UserController{
        public function register(){
            include_once "./Views/user_register.php";
        }
        public function submitRegister(){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $rePassword = $_POST['rePassword'];
            // 1. kiểm tra XÁC NHẬN mật khẩu trùng
                if($password != $rePassword){
                    $_SESSION['info'] = "Mật khẩu xác nhận chưa đúng!";
                    header("Location: ?ctrl=user&act=register");
                    return;
                } 
            // 2. kiểm tra XÁC NHẬN email trùng
                    include_once "./Models/User.php";
                    $userModel = new User();
                    $user = $userModel->checkEmail($email);
                    if($user){
                        $_SESSION['info'] = "Email đã tồn tại, Không thể đăng ký!";
                        header("Location: ?ctrl=user&act=register");
                        return;
                    }
            // 3. Đăng kí tài khoản
                    if($userModel->register($name,$email,$password)){
                        $_SESSION['info'] = "Đăng ký thành công!";
                        header("Location: ?ctrl=user&act=login");
                        return;
                    }else{
                        $_SESSION['info'] = "Có lỗi trong quá trình đăng ký. Vui lòng thử lại!";
                        header("Location: ?ctrl=user&act=register");
                        return;
                    }
            }

        public function login(){
            include_once "./Views/user_login.php";
        }

        public function submitLogin(){
            $email = $_POST['email'];
            $password = $_POST['password'];

            include_once "./Models/User.php";
            $userModel = new User();
            $user = $userModel->login($email,$password);
            
            // print_r($user);
            if($user){
                    $_SESSION['user'] = $user;
                    header("Location: ?ctrl=page&act=home");
                    exit;
                } else {
                    $_SESSION['info'] = "Email hoặc mật khẩu không đúng!";
                    header("Location: ?ctrl=user&act=login");
                    exit;
                }
            }
        
        public function logout(){
            unset($_SESSION['user']);
            header("Location: ?ctrl=user&act=login");
            exit;
        }

        public function forgotPassword(){
            include_once "./Views/user_forgot_password.php";
        }

        public function resetPassword(){}
    }

?>