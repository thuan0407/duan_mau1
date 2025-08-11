<?php
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/CommentModel.php';
require_once __DIR__ . '/../models/CategoryModel.php';
class Dangnhap_dangkyController {
    public $productModel;
    public $userModel;
    public $commentModel;
    public $categoryModel;

    public function __construct(){
        $this->productModel  = new ProductModel();
        $this->userModel     = new UserModel();
        $this->commentModel  = new CommentModel();
        $this->categoryModel = new CategoryModel();
    }

    public function navigation(){
        include "views/Login_Register/navigation.php";
    }

    public function login(){
        session_start();
        $loi="";
        $account_data = $this->userModel->all();

        if(isset($_POST['dangnhap'])){
            $email    = trim($_POST['email']);
            $password = trim($_POST['password']);
            $role     = (int)$_POST['role'];
            $kiemtra = false;

            foreach($account_data as $tt){
                if($email === $tt->email && $role === (int)$tt->role){

                    if(password_verify($password, $tt->password)){
                        $kiemtra = true;
                        $_SESSION['user'] = [  //lấyy thông tin người dùng tạo session
                        'id'   => $tt->id,
                        'name' => $tt->name,
                ];

                    if($role ===0){
                        header("Location: ?act=trangchu_admin");
                        exit;
                    }
                    elseif($role ===1){
                        header("Location: ?act=trangchu_user");
                        exit;
                    }
                } 
            }

            }
            if(!$kiemtra){
                    $loi ="kiểm tra lại các dữ liệu của bạn!";
                }
        }
            include "views/Login_Register/login.php";
    }


    public function register(){
        $loi="";
        $thanhcong="";
        $user = new User();
        $usered = $this->userModel->all();
        if(isset($_POST['register'])){
            $user->name=$_POST['name'];
            $user->email=$_POST['email'];
            $user->address=$_POST['address'];
            $user->number=$_POST['number'];
            $user->password=$_POST['password'];
            $user->role=(int)1;

            $email_trung=false;
            foreach($usered as $tt){              // kiểm tra xem email đã tồn tại trước đó hay chưa
                if($user->email===$tt->email){
                    $email_trung =true; 
                    break;                        //dừng vòng lặp ngay lật tức
                }
            }
            
            if($email_trung){
                $loi="email đã được đăng ký ";
            }
            else if($email_trung === false){
                if(empty($user->name)||empty($user->address)||empty($user->number)||empty($user->password) ||empty($user->email)){
                    $loi="kiểm tra lại các trường giữ liệu";
            }
            else{
                $password = $_POST['password']; // Lấy mật khẩu gốc
                $user->password = password_hash($password, PASSWORD_DEFAULT);
                $ketqua = $this->userModel->create($user);
            if($ketqua ===1){
                $thanhcong="Đăng ký thành công";
            }
            else{
                $loi="Đăng ký thất bại";
            }
        }
    }
    
        
        }
        
       include "views/Login_Register/register.php";
    }

    public function dangxuat(){
        session_start();
        session_destroy();
        header("Location: ?act=/"); // chuyển về trang điều hướng
        exit;
    }
}
    
?>