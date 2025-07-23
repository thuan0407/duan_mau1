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

    public function dieu_huong(){
        include "views/dangnhap_dangky/dieu_huong.php";
    }

    public function dangnhap(){
        $loi="";
        $dulieu_taikhoan = $this->userModel->all();

        if(isset($_POST['dangnhap'])){
            $email    = trim($_POST['email']);
            $password = trim($_POST['password']);
            $role     = (int)$_POST['role'];
            $kiemtra = false;

            foreach($dulieu_taikhoan as $tt){
                if($email === $tt->email && $password === $tt->password && $role === (int)$tt->role){
                    $kiemtra = true;
                    
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
            if(!$kiemtra){
                    $loi ="kiểm tra lại các dữ liệu của bạn!";
                }
        }
        include "views/dangnhap_dangky/dangnhap.php";
    }


    public function dangky(){
        $loi="";
        $thanhcong="";
        $user = new User();
        if(isset($_POST['dangky'])){
            $user->name=$_POST['name'];
            $user->email=$_POST['email'];
            $user->address=$_POST['address'];
            $user->number=$_POST['number'];
            $user->password=$_POST['password'];
            $user->role=(int)1;


            if(empty($user->name)===""||empty($user->address)===""||empty($user->number)===""||empty($user->password)==="" ||empty($user->email)===""){
                $loi="kiểm tra lại các trường giữ liệu";
            }
            else{
                $ketqua = $this->userModel->create($user);
                if($ketqua ===1){
                    $thanhcong="Đăng ký thành công";
                }
                else{
                    $loi="Đăng ký thất bại";
                }
            }
        }
        
       include "views/dangnhap_dangky/dangky.php";
    }

    public function dangxuat(){
        session_start();
        session_destroy();
        header("Location: ?act=/"); // chuyển về trang điều hướng
        exit;
    }
}
?>