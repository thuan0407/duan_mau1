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

    public function category_management() {
        $category_list = $this->categoryModel->all();
        $success       = "";
        $err           = "";
        $category = new Category();

        if (isset($_POST['create_category'])) {
            $category->name  = $_POST['name_category'];
            $category->date  = date("Y-m-d H:i:s");

            if (empty($category->name)) {
                $err = "kiểm tra lại dữ liệu";
            } else {
                $result = $this->categoryModel->create_category($category);
                if ($result === 1) {
                    $success       = "tạo danh mục thành công";
                    $category_list = $this->categoryModel->all();
                } else {
                    $err = "tạo danh mục thất bại";
                }
            }
        }

        include "views/admin/category_management/content.php";
    }

    public function delete_category($id) {
        $category = $this->categoryModel->find($id);
        $err = "";
        $success = "";

        if (!$category) {
            $err = "Danh mục không tồn tại!";
        } else if ($category->sum > 0) {
            $err = "Không thể xóa khi danh mục vẫn còn sản phẩm.";
        } else {
            $result = $this->categoryModel->delete_category($id);
            if ($result === 1) {
                header("Location: ?act=category_management");
                exit;
            } else {
                $err = "Xóa danh mục thất bại.";
            }
        }

        $category = $this->categoryModel->all();
        include "views/admin/category_management/content.php";
    }

    public function update_category($id) {
        $name_category_old = $this->categoryModel->find($id);
        $success = "";
        $err     = "";
        $category = new Category();

        if (isset($_POST['update_category'])) {
            $category->id = $id;
            $category->name = $_POST['name_category'];

            if (empty($category->name)) {
                $err = "kiểm tra lại dữ liệu";
            } else {
                $result = $this->categoryModel->update_category($category);
                if ($result > 0) {
                    $success = "sửa thành công tên thư mục";
                }
            }
        }

        include "views/admin/category_management/update_category.php";
    }

    public function account_management() {
        $err = "";
        $user_list= $this->userModel->all();

        if (isset($_POST['search'])) {
            $user = $_POST['user'];
            if (empty($user)) {
                $err = "bạn chưa nhập tên người dùng";
            }

            foreach ($user_list as $tt) {
                if (stripos($tt->email, $user) !== false || stripos($tt->name, $user) !== false) {
                    $result[] = $tt;
                }
            }

            if (empty($result)) {
                $err = "không tìm thấy";
            } else {
                $user_list = $result;
            }
        }

        include "views/admin/account_management/content.php";
    }

    public function product_management() {
        $err = "";
        $product_list = $this->productModel->all();

        if (isset($_POST['search'])) {
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


    public function delete_account($id) {                            /////xóa tài khoản
        $result = $this->userModel->delete_account($id);
        if ($result === 1) {
            header("Location: ?act=account_management");
            exit;
        } else {
            $err = "không thể xóa";
            $user_list = $this->userModel->all();
            include "views/admin/account_management/content.php";
        }

    }


public function comment_management() {
    $err = "";
    $product_list = $this->productModel->all();

    // Tạo mảng số lượng bình luận ban đầu
    $comment_quantity = [];
    foreach ($product_list as $sp) {
        $comment_quantity[$sp->id] = $this->commentModel->find_comment_idpro($sp->id);
    }

    // Xử lý tìm kiếm
        if (isset($_POST['search'])) {
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
                $product_list = $result;
            }
        }


    include "views/admin/comment_management/content.php";
}


    public function comment_destails($id) {
        $success = "";
        $err     = "";
        $product = $this->productModel->find($id);
        $comment =$this->commentModel->find_comment_idpro($id);   // nội dung bình luận của sản phẩm

        if (isset($_POST['delete_comment'])) {
            $id_cmt = $_POST['comment_id']; // ID bình luận
            $result = $this->commentModel->delete_comment($id_cmt);

            if ($result === 1) {
                $success = "Xóa bình luận thành công";
                $comment = $this->commentModel->find_comment_idpro($id);
            } else {
                $err = "Không thể xóa";
            }
        }
        include "views/admin/comment_management/comment_destails.php";
    }
}



?>
