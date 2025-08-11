<?php
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/CommentModel.php';
require_once __DIR__ . '/../models/CategoryModel.php';

class AdminController {
    public $productModel;
    public $userModel;
    public $commentModel;
    public $categoryModel;

    public function __construct() {
        $this->productModel  = new ProductModel();
        $this->userModel     = new UserModel();
        $this->commentModel  = new CommentModel();
        $this->categoryModel = new CategoryModel();
    }

    public function admin_home() {
        $today = date("y-m-d");
        include "views/admin/admin_home.php";
    }

    public function quanly_danhmuc() {
        $danhsach = $this->categoryModel->all();
        $thanhcong = "";
        $loi = "";
        $danhmuc = new Category();

        if (isset($_POST['create_danhmuc'])) {
            $danhmuc->name  = $_POST['name_danhmuc'];
            $danhmuc->date  = date("Y-m-d H:i:s");

            if (empty($danhmuc->name)) {
                $loi = "kiểm tra lại dữ liệu";
            } else {
                $ketqua = $this->categoryModel->create_danhmuc($danhmuc);
                if ($ketqua === 1) {
                    $thanhcong = "tạo danh mục thành công";
                    $danhsach = $this->categoryModel->all();
                } else {
                    $loi = "tạo danh mục thất bại";
                }
            }
        }

        include "views/admin/quanly_danhmuc/noidung.php";
    }

    public function delete_danhmuc($id) {
        $danhmuc = $this->categoryModel->find($id);
        $thongbao = "";
        $loi = "";
        $thanhcong = "";

        if (!$danhmuc) {
            $thongbao = "Danh mục không tồn tại!";
        } else if ($danhmuc->sum > 0) {
            $thongbao = "Không thể xóa khi danh mục vẫn còn sản phẩm.";
        } else {
            $ketqua = $this->categoryModel->delete_danhmuc($id);
            if ($ketqua === 1) {
                header("Location: ?act=quanly_danhmuc");
                exit;
            } else {
                $thongbao = "Xóa danh mục thất bại.";
            }
        }

        $danhsach = $this->categoryModel->all();
        include "views/admin/quanly_danhmuc/noidung.php";
    }

    public function update_danhmuc($id) {
        $ten_danhmuc_cu = $this->categoryModel->find($id);
        $thanhcong = "";
        $loi = "";
        $danhmuc = new Category();

        if (isset($_POST['update_danhmuc'])) {
            $danhmuc->id = $id;
            $danhmuc->name = $_POST['name_danhmuc'];

            if (empty($danhmuc->name)) {
                $loi = "kiểm tra lại dữ liệu";
            } else {
                $ketqua = $this->categoryModel->update_danhmuc($danhmuc);
                if ($ketqua > 0) {
                    $thanhcong = "sửa thành công tên thư mục";
                }
            }
        }

        include "views/admin/quanly_danhmuc/update_danhmuc.php";
    }

    public function quanly_taikhoan() {
        $err = "";
        $danhsach = $this->userModel->all();

        if (isset($_POST['tim'])) {
            $user = $_POST['user'];
            if (empty($user)) {
                $err = "bạn chưa nhập tên người dùng";
            }

            foreach ($danhsach as $tt) {
                if (stripos($tt->email, $user) !== false || stripos($tt->name, $user) !== false) {
                    $ketqua[] = $tt;
                }
            }

            if (empty($ketqua)) {
                $err = "không tìm thấy";
            } else {
                $danhsach = $ketqua;
            }
        }

        include "views/admin/quanly_taikhoan/noidung.php";
    }

    public function product_management() {
        $err = "";
        $product_list = $this->productModel->all();

        if (isset($_POST['tim'])) {
            $key_words = $_POST['key_words'];

            if (empty($key_words)) {
                $err = "bạn chưa nhập nội dung";
            }

            foreach ($product_list as $tt) {
                if (stripos($tt->name, $key_words) !== false) {
                    $result[] = $tt;
                }
            }

            if (empty($result)) {
                $err = "không tìm thấy";
                $product_list = [];
            } else {
                $product_list= $result;
            }
        }

        include "views/admin/product_management/content.php";
    }

    public function create_product() {
        $err = "";
        $success = "";
        $product = new Product();
        $category_list = $this->categoryModel->all();

        if (isset($_POST['create_product'])) {
            $product->name = $_POST['name'];

            if ($_FILES['anh_sp']['size'] > 0) {
                $uploadPath = uploadFile($_FILES['anh_sp'], 'public/uploads/');
                if ($uploadPath) {
                    $product->image = str_replace('public/uploads/', '', $uploadPath);
                }
            }

            $product->price = $_POST['price'];
            $product->category_id = $_POST['category_id'];
            $product->description = $_POST['description'];
            $product->hot = $_POST['hot'];
            $product->discount = $_POST['discount'];
            $product->quantity = $_POST['quantity'];

            if ($product->name === "") {
                $err = "kiểm tra lại các trường giữ liệu";
            } else {
                $result_update = $this->productModel->create($product);
                if ($result_update === 1) {
                    $success = "create sản phẩm thành công";
                } else {
                    $err = "create sản phẩm thất bại";
                }
            }
        }

        include "views/admin/product_management/create_product.php";
    }

    public function delete_product($id) {                            /////xóa sản phẩm
        $result = $this->productModel->delete_product($id);
        if ($result === 1) {
            header("Location: ?act=product_management");
            exit;
        } else {
            $err = "không thể xóa";
            $product_list = $this->productModel->all();
            include "views/admin/product_management/content.php";
        }
    }


public function update_product($id) {
    // Lấy sản phẩm theo ID để hiển thị lên form
    $err    ="";
    $success="";
    $product          = $this->productModel->find($id);
    $category_list    =$this->categoryModel->all();
    if (isset($_POST['update_product'])) {
        // Cập nhật dữ liệu mới từ form

        $product->id          =$id;
        $product->name        = $_POST['name'];
        
        if ($_FILES['anh_sp']['size'] > 0) {
            $uploadPath = uploadFile($_FILES['anh_sp'], 'public/uploads/');
            if ($uploadPath) {
                $product->image = str_replace('public/uploads/', '', $uploadPath);
            }
        }
        $product->price       = $_POST['price'];
        $product->category_id = $_POST['category_id'];
        $product->description = $_POST['description'];
        $product->hot         = $_POST['hot'];
        $product->discount    = $_POST['discount'];
        $product->quantity    = $_POST['quantity'];

        if($product->name ===""){
            $err = "kiểm tra lại các trường giữ liệu";
        }
        else{
            $result_update = $this->productModel->update($product);
                if($result_update >0){
                    $success="sửa sản phẩm thành công";
                }
                else{
                    $err ='sửa sản phẩm thất bại';
                }
            }
        }
    

    // Hiển thị giao diện sửa
    include "views/admin/product_management/update_product.php";
}


    public function delete_tk($id) {                            /////xóa tài khoản
        $ketqua = $this->userModel->delete_tk($id);
        if ($ketqua === 1) {
            header("Location: ?act=quanly_taikhoan");
            exit;
        } else {
            $loi = "không thể xóa";
            $danhsach = $this->userModel->all();
            include "views/admin/quanly_taikhoan/noidung.php";
        }

    }


public function quanly_binhluan() {
    $err = "";
    $danhsach = $this->productModel->all();

    // Tạo mảng số lượng bình luận ban đầu
    $so_luong_bl = [];
    foreach ($danhsach as $sp) {
        $so_luong_bl[$sp->id] = $this->commentModel->find_comment_idpro($sp->id);
    }

    // Xử lý tìm kiếm
        if (isset($_POST['tim'])) {
            $tukhoa = $_POST['tukhoa'];

            if (empty($tukhoa)) {
                $err = "bạn chưa nhập nội dung";
            }

            foreach ($danhsach as $tt) {
                if (stripos($tt->name, $tukhoa) !== false) {
                    $ketqua[] = $tt;
                }
            }

            if (empty($ketqua)) {
                $err = "không tìm thấy";
                $danhsach = [];
            } else {
                $danhsach = $ketqua;
            }
        }


    include "views/admin/quanly_binhluan/noidung.php";
}


    public function chi_tiet_bl($id) {
        $thongbao_thanhcong = "";
        $thongbao_thatbai   = "";
        $san_pham = $this->productModel->find($id);
        $comment =$this->commentModel->find_comment_idpro($id);   // nội dung bình luận của sản phẩm

        if (isset($_POST['delete_comment'])) {
            $id_cmt = $_POST['comment_id']; // ID bình luận
            $ketqua = $this->commentModel->delete_comment($id_cmt);

            if ($ketqua === 1) {
                $thongbao_thanhcong = "Xóa bình luận thành công";
                $comment = $this->commentModel->find_comment_idpro($id);
            } else {
                $thongbao_thatbai = "Không thể xóa";
            }
        }
        include "views/admin/quanly_binhluan/chi_tiet_bl.php";
    }
}



?>
