<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$currentPage = $_GET['act'] ?? 'trangchu_admin';
$page = $_GET['page'] ?? 'dashboard'; // Mặc định trang dashboard

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="./public/admin/header..css">
     <style>
        h1{
            margin:0px;
        }
     </style>
</head>
<body>
    
    <div class="menu">
 <!-- <h2>Chào mừng admin: <?= $_SESSION['admin']?> -->
  <div class="anh">
    <a href="">
    <a href="?act=thongtin_admin"><img src="/duan_mau/BaseExam/BaseExam/img/anh11.jpg" alt="avatar"></a>
</a>
    
  </div>
        <li><a href="?act=<?='trangchu_admin'?>"  class="<?=$currentPage == 'trangchu_admin' ?'active':''?>">Trang chủ</a></li>
        <li><a href="?act=<?='quanly_danhmuc'?>"  class="<?=$currentPage == 'quanly_danhmuc' ?'active':''?>">Quản lý danh mục</a></li>
        <li><a href="?act=<?='quanly_sanpham'?>"  class="<?=$currentPage == 'quanly_sanpham' ?'active':''?>">Quản lý sản phẩm</a></li>
        <li><a href="?act=<?='quanly_taikhoan'?>" class="<?=$currentPage == 'quanly_taikhoan' ?'active':''?>">Quản lý tài khoản</a></li>
        <li><a href="?act=<?='quanly_binhluan'?>" class="<?=$currentPage == 'quanly_binhluan' ?'active':''?>">Quản lý bình luận</a></li>
        <li><a href="?act=<?='quanly_donhang'?>"  class="<?=$currentPage == 'quanly_donhang' ?'active':''?>">Quản lý đơn hàng</a></li>
        <li><a href="?act=<?='dangxuat'?>" name="dangxuat" onclick="return confirm('Bạn có chắc là muốn đăng xuất không?')" class="<?=$currentPage == 'dangxuat' ?'active':''?>">Đăng xuất</a></li>
        
    </div>

</body>
</html>