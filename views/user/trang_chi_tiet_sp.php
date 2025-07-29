<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 require_once "header_user.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .body{
            width:1200px;
            margin:0 auto;
        }
        .content{ 
            width:100%;
            display:flex;
            justify-content: space-between;
            height:350px;

        }
        .sanpham{
            max-width:600px;
            border:1px solid black;
            padding:50px;
            display:grid;
            grid-template-columns: repeat(2,1fr);
            width: 100%;
            justify-content: center;
            align-items: center;
            margin:20px;
            border-radius:20px;
        }
        .sanpham img{
            max-width:100%;
            height:100%;
        }
        span{
            text-align: center;
        }
        h1{
            margin-top:50px;
        }
        .thong_tin{
            width:100%;
            border:1px solid black;
            margin:20px;
            border-radius:20px;
        }
        .GB{
            display:flex;
            justify-content: center;
            padding:20px;
        }
        .GB button{
            width:70px;
            border-radius:10px;
            margin:0 20px;
        }
        .nut{
            display:flex;
            justify-content: center;
            padding:20px;
        }
        .nut button{
            width:200px;
            border-radius:10px;
            margin:0 30px;
            height:40px;
        }

        .binh_luan{      /* css phần bình luận */
            width: 1200px;
            background-color:rgba(239, 236, 231, 1);
            text-align: center;v
        }
        .binh_luan input{
            text-align: center;
            width:80%;
            height:50px;
            margin:20px 0;
            border-radius:30px;
        }
        .binhluan_truoc{
            text-align: left;
            margin:20px;
            height:300px;
            text-overflow: ellipsis;
            overflow-x: auto;
        }

        .sp_lien_quan{  /* css phần sản phẩm liên quan */
            width:1000px;
            display: grid;
            grid-template-columns: repeat(4,1fr);
            text-align: center;
            gap:20px;
            margin:50px;
        }
        .item{
            max-width:100%;
            padding:50px 30px;
            border:1px solid black;
            padding-bottom:0;
        }
        .item:hover{
            background-color:antiquewhite;
        }
        .item img{
            width:80%;
            height:230px;
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
            border-radius: 10px;
            margin:0;
            font-weight: bold;
        }
        .ten_sp, .gia_sp, .a, .thêm{
            font-weight: bold;
        }
        button:hover{
            background-color:aqua;

        }
        

    </style>
</head>
<body>
    <h1>Trang chi tiết</h1>
    <h3><?=$chi_tiet_sp->name?></h3>

    <div class="content">

     <div class="sanpham">
        <img src="<?= ANH_IMG.$chi_tiet_sp->image?>" alt="">

        <div class="mota"><p><?=$chi_tiet_sp->description?></span></div>
    </div>


    <div class="thong_tin">
        <div class="GB">
        <button>64GB</button>
        <button>128GB</button>
        <button>256GB</button>
        <button>512GB</button>
        </div>
        <div class="nut">
            <button style="border:1px solid #0099FF; color:#0099FF;">Thêm vào giỏ hàng</button>
            <button style="background-color:red; color:white;">Mua hàng</button>
        </div>
        <button style="margin-left:90px; width:400px; height:40px; border-radius:10px; color:white; background-color:#0099FF">Trả góp</button> <br><br>
        <span style="margin:210px; width:400px; height:40px; border-radius:10px; color:red; font-size:32px; text-decoration: underline;">
            <?= number_format($chi_tiet_sp->price, 0, ',', '.') ?>đ
        </span>
    </div>

    </div>


    <h1>Bình luận</h1> <!-- phần bình luận-->
    <div class="binh_luan">
        <?php
        if(!empty($_SESSION['user']['id'])): ?>
        <form action="" method="post">
            <input type="text" name="comment" placeholder="bạn đang nghĩ gì ?">
            <button type="submit" name="gui" style="background-color:red; color:white; border-radius:10px;">Gửi</button>
            </form>
        <?php else:?>
            <a href="?act=dangnhap">Đăng nhập</a>
            <?php endif;
        ?>


 <div class="binhluan_truoc"> <!-- các bình luận trước đó-->
        <?php
        foreach($comment as $cmt){
            ?>
            <?=$cmt->name_User?>:  <?=$cmt->content?> :   <?= $cmt->date?><br>
            <hr>
            <?php
        }  ?>
        </div>

    </div>


    <h1>Sản phẩm liên quan</h1> <!--các sản phẩm liên quan -->
    <div class="sp_lien_quan">
            <?php
        foreach($sp_lien_quan as $tt){
            ?>
    <div class="item">
            
            <img src="<?= ANH_IMG .$tt->image?>" alt=""><br>
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
        ?>
    </div>

</body>
</html>
<?php require_once "footer_user.php" ?>