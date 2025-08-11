<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Xử lý đăng xuất
if (isset($_GET['act']) && $_GET['act'] === 'dangxuat') {
    session_destroy();
    header("Location: ?act=dangxuat");
    exit;
}
$user = $_SESSION['user']['name'] ?? 'Khách';
$currentPage = $_GET['act'] ?? 'admin_home';
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
        .menu{
            background-color:rgba(121, 46, 121, 1);
        }
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
        <li><a href="?act=<?='admin_home'?>"           class="<?=$currentPage == 'admin_home' ?'active':''?>">Trang chủ</a></li>
        <li><a href="?act=<?='category_management'?>"  class="<?=$currentPage == 'category_management' ?'active':''?>">Quản lý danh mục</a></li>
        <li><a href="?act=<?='product_management'?>"   class="<?=$currentPage == 'product_management' ?'active':''?>">Quản lý sản phẩm</a></li>
        <li><a href="?act=<?='account_management'?>"   class="<?=$currentPage == 'account_management' ?'active':''?>">Quản lý tài khoản</a></li>
        <li><a href="?act=<?='comment_management'?>"   class="<?=$currentPage == 'comment_management' ?'active':''?>">Quản lý bình luận</a></li>
        <li><a href="?act=<?='logout'?>" name="logout" onclick="return confirm('Bạn có chắc là muốn đăng xuất không?')" class="<?=$currentPage == 'dangxuat' ?'active':''?>">Đăng xuất</a></li>
        
    </div>

</body>
</html>