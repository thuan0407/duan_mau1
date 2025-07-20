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


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    //phẩn của đăng nhập đăng xuất đăng ký
    '/'               =>(new Dangnhap_dangkyController())->dieu_huong(),
    'trangchu_user'   =>(new Dangnhap_dangkyController())->trangchu_user(),
    'dangnhap'        =>(new Dangnhap_dangkyController())->dangnhap(),
    'dangky'          =>(new Dangnhap_dangkyController())->dangky(),



    //phần user
    // Trang chủ
    


    
    //phần của admin

};