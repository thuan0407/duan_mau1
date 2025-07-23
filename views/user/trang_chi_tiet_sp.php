<?php require_once "header_user.php" ?>
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
            width: 50%;
            display:flex;
        }
        .sanpham{
            border:1px solid black;
            padding:50px;
            display:flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        .sanpham img{
            width:50%;
        }
        span{
            text-align: center;
        }
        h1{
            margin-top:50px;
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


    <div class="thong_tin"></div>

    </div>


    <h1>Bình luận</h1> <!-- phần bình luận-->
    <div class="binh_luan">
        <?php
        if(!empty($_SESSION['user'])): ?>
        <form action="" method="post">
            <input type="text" name="comment" placeholder="bạn đang nghĩ gì ?">
            <button type="submit" name="gui" style="background-color:red; color:white; border-radius:10px;">Gửi</button>
            </form>
        <?php else:?>
            <a href="?action=dangnhap">Đăng nhập</a>
            <?php endif;
        ?>


 <div class="binhluan_truoc"> <!-- các bình luận trước đó-->
        <!-- <?php
        foreach($comment as $cmt){
            ?>
            <?=$cmt->nameUser?>:  <?=$cmt->content?> <br>
            <?php
        }  ?> -->
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