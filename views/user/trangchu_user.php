<?php require_once "header_user.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            width: 1200px;
            margin: 0 auto;
            /* background-image: url(../mvc-oop-basic-duanmau/public/img/hinh-nen-dien-thoai-mau-xanh-da-troi-nhat-1-18-16-09-30.jpg); */
        }
        main{
        }

        .banner img {
            width: 100%;
            height: 300px;
        }
        .menu {
            background-color: #222;
            padding: 15px;
            display: flex;
            justify-content: center;
            
        }
        .menu a {
            font-size: 20px;
            color: white;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .menu a:hover {
            color: yellow;
        }
        .menu a {
            font-size:25px ;
            color:white;
            text-decoration: none;
            margin-left:20px;
        }
    </style>
</head>
<body>

<main>
        <div class="banner">
        <img src="../mvc-oop-basic-duanmau/public/img/banner1.jpg" alt="">

<div class="menu">
    <a href="?act=sanpham_hot"   target="contentFrame">sản phẩm hot</a>
    <a href="?act=sanpham_moi"   target="contentFrame">Sản phẩm mới</a>
    <a href="?act=khuyen_mai"    target="contentFrame">sản phẩm khuyến mãi</a>
</div>

<!-- Iframe -->
<div class="content">
    <iframe name="contentFrame" src="?act=sanpham_hot" width="100%" height="1000px" style="border: none;"></iframe>


</div>

</main>

</body>
</html>
<?php require_once "footer_user.php" ?>