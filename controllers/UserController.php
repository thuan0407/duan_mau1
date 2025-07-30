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
    $thongbao = "";
    $sanpham_hot = $this->productModel->all_hot();
    $sanpham_moi = $this->productModel->all_moi();
    $khuyen_mai  = $this->productModel->all_khuyenmai();
    $list_product = $this->productModel->all();

    // Xử lý tìm kiếm
    if (isset($_GET['search'])) {
        $key_name = trim($_GET['key_name']); // loại bỏ khoảng trắng

        if ($key_name === "") {
            $thongbao = "Bạn chưa nhập thông tin";
        } else {
            $result = [];

            // Tìm kiếm không phân biệt hoa/thường
            foreach ($list_product as $tt) {
                if (stripos($tt->name, $key_name) !== false) {
                    $result[] = $tt;
                }
            }

            if (empty($result)) {
                $thongbao = "Không tìm thấy";
            } else {
                // Gán kết quả tìm được cho list_product
                $list_product = $result;
                // Include view hiển thị kết quả tìm kiếm
                include "views/user/hien_thi_sp_theo_ten.php";
                return; // dừng tại đây, không load trang chủ
            }
        }
    }

    // Nếu không tìm kiếm hoặc không có kết quả → load trang chủ
    include "views/user/trangchu_user.php";
}

        public function trangsp_user(){
            $thongbao="";
            $priceFilter = isset($_GET['price']) ? $_GET['price'] : null; // khai báo biến
                        
           $sql = "SELECT * FROM `product` WHERE 1"; // Mặc định query lấy tất cả sản phẩm

           switch($priceFilter){
                case '1':
                    $sql .= " AND price < 5000000"; // dưới 5 triệu
                    break;
                case '2':
                    $sql .= " AND price BETWEEN 5000000 AND 10000000";
                    break;
                case '3':
                    $sql .= " AND price BETWEEN 10000000 AND 20000000";
                    break;
                case '4':
                    $sql .= " AND price BETWEEN 20000000 AND 30000000";
                    break;
                case '5':
                    $sql .= " AND price > 30000000";
                    break;
            
           }
            $danhsach_sp = $this->productModel->all_product_user($sql);
            if(empty($danhsach_sp)){
                $thongbao="không có sản phẩm nào";
            }

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
            include "views/user/trangchu_user.php";
        }

        public function sanpham_moi(){
            $sanpham_moi =$this->productModel->all_moi();
            include "views/user/trangchu_user.php";
        }

        public function khuyen_mai(){
            $khuyen_mai =$this->productModel->all_khuyenmai();
            include "views/user/trangchu_user.php";
        }

        public function chi_tiet_sp($id){
            session_start();
            $chi_tiet_sp = $this->productModel->find($id);      // dữ liệu chi tiết của sản phẩm
            $loai= $chi_tiet_sp->category_id;                        // loại của sản phẩm trực thuộc
            $sp_lien_quan =$this->productModel->find_lien_quan($loai); // dữ liệu các sản phẩm liên quan
            $comment =$this->commentModel->find_comment_idpro($id);   // nội dung bình luận của sản phẩm
                    $comment1 = new Comment();
                    if(isset($_POST['gui'])){
                        $comment1->content        = $_POST['comment'];
                        $comment1->date           = date("Y-m-d H:i:s");
                        $comment1->product_id     = $id;
                        $comment1->user_id        = $_SESSION['user']['id'];
                        
                        $noidung =$_POST['comment'];
                        if(!empty($noidung)){   //kiểm tra nội dung xem có trống không
                            $ketqua = $this->commentModel->create($comment1);
                            if($ketqua ===1){
                                $comment = $this->commentModel->find_comment_idpro($id);
                            }
                            else{
                            $loi= "không thể create ";
                            }
                        }


                    }
            include "views/user/trang_chi_tiet_sp.php";
        }
    }
    ?>