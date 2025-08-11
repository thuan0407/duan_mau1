<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminController.php';
require_once './controllers/UserController.php';
require_once './controllers/Dangnhap_dangkyController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';

// Route
$act = $_GET['act'] ?? '/';
$id = $_GET['id'] ?? '';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    //phẩn của đăng nhập đăng xuất đăng ký
    '/'               =>(new Dangnhap_dangkyController())->navigation(),
    'dangxuat'        =>(new Dangnhap_dangkyController())->dangxuat(),
    'login'           =>(new Dangnhap_dangkyController())->login(),
    'register'        =>(new Dangnhap_dangkyController())->register(),


    //phần user
    // Trang chủ
    'danhsach_sanpham'        =>(new UserController())->trangsp_user(),
    'trangchu_user'           =>(new UserController())->trangchu_user(),
    'trangsp_user'            =>(new UserController())->trangsp_user(),
    'lien_he'                 =>(new UserController())->lien_he(),
    'gioi_thieu'              =>(new UserController())->gioi_thieu(),
    'sanpham_hot'             =>(new UserController())->sanpham_hot(),
    'sanpham_moi'             =>(new UserController())->sanpham_moi(),
    'khuyen_mai'              =>(new UserController())->khuyen_mai(),
    'chi_tiet_sp'             =>(new UserController())->chi_tiet_sp($id),
    


    
    //phần của admin
    'trangchu_admin'         => (new AdminController())->trangchu_admin(),

    'quanly_danhmuc'         => (new AdminController())->quanly_danhmuc(),
    'quanly_taikhoan'        => (new AdminController())->quanly_taikhoan(),
    'delete_danhmuc'         => (new AdminController())->delete_danhmuc($id),
    'update_danhmuc'         => (new AdminController())->update_danhmuc($id),

    'quanly_sanpham'         => (new AdminController())->quanly_sanpham(),
    'delete_sanpham'         => (new AdminController())->delete_sanpham($id),
    'update_sanpham'         => (new AdminController())->update_sanpham($id),
    'create_sanpham'         => (new AdminController())->create_sanpham(),
    
    'quanly_binhluan'        => (new AdminController())->quanly_binhluan(),
    'chi_tiet_bl'            => (new AdminController())->chi_tiet_bl($id),

    'delete_tk'              => (new AdminController())->delete_tk($id),
    

};