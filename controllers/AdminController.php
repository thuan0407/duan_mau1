<?php
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/CommentModel.php';
require_once __DIR__ . '/../models/CategoryModel.php';
class AdminController{
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

    public function trangchu_admin(){
        
    include "views/admin/trangchu_admin.php";
    }

    public function quanly_danhmuc(){
        $danhsach = $this->categoryModel->all();
        $thanhcong="";
        $loi="";
        $danhmuc = new Category();
        if(isset($_POST['create'])){
            $danhmuc->name  = $_POST['name_danhmuc'];
            $danhmuc->date  = date("Y-m-d H:i:s");
            if(empty($danhmuc->name)){
                $loi="kiểm tra lại dữ liệu";
            }
            else{
                $ketqua = $this->categoryQuery->create($danhmuc);
                if($ketqua ===1){
                    $thanhcong="tạo danh mục thành công";
                }
                else{
                    $loi="tọa danh mục thất bại";
                }
            }
        }
    include "views/admin/quanly_danhmuc/noidung.php";
    }

    public function quanly_taikhoan(){
        $err="";
        $danhsach = $this->userModel->all();
        if(isset($_POST['tim'])){
            $user =$_POST['user'];
            if(empty($user)){
             $err="bạn chưa nhập tên người dùng";
            }
            
            foreach($danhsach as $tt){
                if(stripos($tt->email,$user)!==false || stripos($tt->name,$user)!==false){
                    $ketqua[]=$tt;
                }
            }
            if(empty($ketqua)){
                $err="không tìm thấy";
            }
            else{
                $danhsach=$ketqua;
            }
        }
    include "views/admin/quanly_taikhoan/noidung.php";
    }

    public function quanly_sanpham(){
        $err="";
        $danhsach = $this->productModel->all();
        if(isset($_POST['tim'])){
            $tukhoa =$_POST['tukhoa'];
           
                if(empty($tukhoa)){
                    $err= "bạn chưa nhập nội dung";
                }

                foreach($danhsach as $tt){
                    if(stripos($tt->name,$tukhoa) !==false ){
                        $ketqua[]=$tt;
                    }
                }

                
                if(empty($ketqua)){
                    $err="không tìm thấy";
                    $danhsach=[];
                }
                else{
                    $danhsach=$ketqua;
                }

            
        }
    include "views/admin/quanly_sanpham/noidung.php";
    }

    public function quanly_binhluan(){
    include "views/admin/quanly_binhluan/noidung.php";
    }

    public function quanly_donhang(){
    include "views/admin/quanly_donhang/noidung.php";
    }

}
?>