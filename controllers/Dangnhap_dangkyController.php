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
        include "views/dangnhap_dangky/dangnhap.php";
    }

    public function trangchu_user(){
        include "views/user/trangchu_user.php";
    }

    public function dangky(){
        include "views/dangnhap_dangky/dangky.php";
    }


}
?>