    <?php
    require_once __DIR__ . '/../models/ProductModel.php';
    require_once __DIR__ . '/../models/UserModel.php';
    require_once __DIR__ . '/../models/CommentModel.php';
    require_once __DIR__ . '/../models/CategoryModel.php';
    class UserController {
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

        //trang chủ
        public function trangchu_user(){
            include "views/user/trangchu_user.php";
        }

        public function sanpham_hot(){
            $sanpham_hot =$this->productModel->all_hot();
            include "views/user/sanpham_hot.php";
        }

        public function sanpham_moi(){
            $sanpham_moi =$this->productModel->all_moi();
            include "views/user/sanpham_moi.php";
        }

        public function khuyen_mai(){
            $khuyen_mai =$this->productModel->all_khuyenmai();
            include "views/user/khuyen_mai.php";
        }
    }
    ?>