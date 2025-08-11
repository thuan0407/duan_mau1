<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminController.php';
require_once './controllers/UserController.php';
require_once './controllers/Login_Register_Controller.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';

// Route
$act = $_GET['act'] ?? '/';
$id = $_GET['id'] ?? '';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    //phẩn của đăng nhập đăng xuất đăng ký
    '/'               =>(new Login_Register_Controller())->navigation(),
    'logout'          =>(new Login_Register_Controller())->logout(),
    'login'           =>(new Login_Register_Controller())->login(),
    'register'        =>(new Login_Register_Controller())->register(),


    //phần user
    // Trang chủ
    'danhsach_sanpham'        =>(new UserController())->user_producs(),
    'user_home'               =>(new UserController())->user_home(),
    'user_producs'            =>(new UserController())->user_producs(),
    'contact'                 =>(new UserController())->contact(),
    'introduce'               =>(new UserController())->introduce(),
    'sanpham_hot'             =>(new UserController())->sanpham_hot(),
    'sanpham_moi'             =>(new UserController())->sanpham_moi(),
    'khuyen_mai'              =>(new UserController())->khuyen_mai(),
    'product_destails'        =>(new UserController())->product_destails($id),
    


    
    //phần của admin
    'admin_home'             => (new AdminController())->admin_home(),

    'category_management'    => (new AdminController())->category_management(),
    'delete_category'         => (new AdminController())->delete_category($id),
    'update_category'         => (new AdminController())->update_category($id),

    'product_management'     => (new AdminController())->product_management(),
    'delete_product'         => (new AdminController())->delete_product($id),
    'update_product'         => (new AdminController())->update_product($id),
    'create_product'         => (new AdminController())->create_product(),

    'account_management'     => (new AdminController())->account_management(),
    'delete_account'         => (new AdminController())->delete_account($id),
    
    'quanly_binhluan'        => (new AdminController())->quanly_binhluan(),
    'chi_tiet_bl'            => (new AdminController())->chi_tiet_bl($id),

    

};