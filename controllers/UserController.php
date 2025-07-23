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

        public function trangsp_user(){
            $danhsach_sp =$this->productModel->all();
            include "views/user/trangsp_user.php";
        }

        public function lien_he(){
            include "views/user/lien_he.php";
        }

        public function gioi_thieu(){
        include "views/user/gioi_thieu.php";
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

        public function chi_tiet_sp($id){
            $chi_tiet_sp = $this->productModel->find($id);      // dữ liệu chi tiết của sản phẩm
            $loai= $chi_tiet_sp->category_id;                        // loại của sản phẩm trực thuộc
            $sp_lien_quan =$this->productModel->find_lien_quan($loai); // dữ liệu các sản phẩm liên quan
            // $comment =$this->productModel->find_comment($id);   // nội dung bình luận của sản phẩm
            include "views/user/trang_chi_tiet_sp.php";
        }
    }
    ?>