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
    include "views/admin/quanly_danhmuc/noidung.php";
    }

    public function quanly_taikhoan(){
    include "views/admin/quanly_taikhoan/noidung.php";
    }

    public function quanly_sanpham(){
    include "views/admin/quanly_taikhoan/noidung.php";
    }

    public function quanly_binhluan(){
    include "views/admin/quanly_binhluan/noidung.php";
    }

    public function quanly_donhang(){
    include "views/admin/quanly_donhang/noidung.php";
    }

}
?>