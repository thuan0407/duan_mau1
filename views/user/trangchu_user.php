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

        .content{
            display:grid;
            grid:30px;
            grid-template-columns: repeat(4,1fr);
            text-align: center;
            padding:50px;
        }
        .item{
            width:70%;
            border:1px solid black;
            margin:0 auto;
            text-align: center;
            padding:20px;
            margin:10px;
            height:320px;
            border-radius:20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.4);

        }
        .item img{
            width:70%;
            height:200px;;
        }
        .chiadoi{
        display:flex;
        justify-content: center;
        align-items: center;
        
        }
        .mua{
            color:white;
            border:1px solid black;
            background-color:red;
            width:100px;
            height:30px;
            display:flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            margin:0;
            font-weight: bold;
        }
        .ten_sp, .gia_sp, .a, .thêm{
            font-weight: bold;
        }
        .active{
            color:red;
        }
        .menu a:hover{
            color:red;
        }
        .chiadoi a{
            text-decoration: none;
        }
    </style>
</head>
<body onload="start()">

<main>
        <div class="banner">
        <img id="anh_banner" src="../mvc-oop-basic-duanmau/public/img/banner0.jpg" alt="">

<div class="menu">
    <a href="?act=sanpham_hot">Sản phẩm hot</a>
    <a href="?act=sanpham_moi">Sản phẩm mới</a>
    <a href="?act=khuyen_mai" >Sản phẩm khuyến mãi</a>
</div>

<!-- Iframe -->
<div class="content">
    <?php
    $act = $_GET['act'] ?? 'sanpham_hot';
    switch($act){
        case 'sanpham_hot': 
        foreach($sanpham_hot as $tt){
            ?>
                <div class="item">
                        <img src="<?=ANH_IMG .$tt->image?>" alt=""><br>
                        <span class="ten_sp" style="font-size:20px;"><?=$tt->name?></span> <br>
                        <span class="gia_sp"><?=$tt->price?>đ</span> <br>
                        <a href="?act=chi_tiet_sp&id=<?=$tt->id?>" style="color:red;">>>Xem chi tiết</a>
                        <div class="chiadoi">
                            <a href="#" class="mua">Mua</a>
                            <p class="thêm">Thêm vào giỏi hàng</p> <br>
                        </div>
                </div>
                            <?php
                    }
            break;
        case 'sanpham_moi':
        foreach($sanpham_moi as $tt){
            ?>
                <div class="item">
                        <img src="<?=ANH_IMG .$tt->image?>" alt=""><br>
                        <span class="ten_sp" style="font-size:20px;"><?=$tt->name?></span> <br>
                        <span class="gia_sp"><?=$tt->price?>đ</span> <br>
                        <a href="?act=chi_tiet_sp&id=<?=$tt->id?>" style="color:red;">>>Xem chi tiết</a>
                        <div class="chiadoi">
                            <a href="#" class="mua">Mua</a>
                            <p class="thêm">Thêm vào giỏi hàng</p> <br>
                        </div>
                </div>
                            <?php
                    }
            break;
        case 'khuyen_mai':
        foreach($khuyen_mai as $tt){
            ?>
                <div class="item">
                        <img src="<?=ANH_IMG .$tt->image?>" alt=""><br>
                        <span class="ten_sp" style="font-size:20px;"><?=$tt->name?></span> <br>
                        <span class="gia_sp"><?=$tt->price?>đ</span> <br>
                        <a href="?act=chi_tiet_sp&id=<?=$tt->id?>" style="color:red;">>>Xem chi tiết</a>
                        <div class="chiadoi">
                            <a href="#" class="mua">Mua</a>
                            <p class="thêm">Thêm vào giỏi hàng</p> <br>
                        </div>
                </div>
                            <?php
                    }
            break;
         default: 
        foreach($sanpham_hot as $tt){
            ?>
                <div class="item">
                        <img src="<?=ANH_IMG .$tt->image?>" alt=""><br>
                        <span class="ten_sp" style="font-size:20px;"><?=$tt->name?></span> <br>
                        <span class="gia_sp"><?=$tt->price?>đ</span> <br>
                        <a href="?act=chi_tiet_sp&id=<?=$tt->id?>" style="color:red;">>>Xem chi tiết</a>
                        <div class="chiadoi">
                            <a href="#" class="mua">Mua</a>
                            <p class="thêm">Thêm vào giỏi hàng</p> <br>
                        </div>
                </div>
                            <?php  
                    }
            break;  
    }
    ?>


</div>

</main>
    <script>
     
        let anh_banner = document.getElementById('anh_banner');
        let index=0;
        let t;
        let arr=[];
        //mảng
        for(i=0 ;i<5;i++){
            arr[i]= new Image();
            arr[i].src ='../mvc-oop-basic-duanmau/public/img/banner' + i + '.jpg';
        }

        function start(){
            anh_banner.src = arr[index].src;
            index++;
            if(index == 5){
                index=0;
            } 
            t=setTimeout(start,2000);
        }
    
    </script>
</body>
</html>
<?php require_once "footer_user.php" ?>