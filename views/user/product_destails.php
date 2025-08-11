<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "header_user.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            background-color: #f9f9f9;
            color: #333;
        }
        h1, h3 {
            text-align: center;
            margin: 20px 0;
        }

        .body {
            width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Layout trên */
        .content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        /* Khối sản phẩm */
        .sanpham {
            flex: 1;
            max-width: 600px;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            background: #fff;
        }
        .sanpham img {
            width: 100%;
            border-radius: 10px;
            object-fit: contain;
        }
        .mota h4 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #d433caff;
        }
        .mota ul {
            list-style: disc;
            margin-left: 20px;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 10px;
        }
        .mota p {
            font-size: 14px;
            line-height: 1.5;
        }

        /* Khối thông tin */
        .thong_tin {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            background: #fff;
        }
        .price {
            display: block;
            text-align: center;
            color: red;
            font-size: 28px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 15px;
        }
        .GB {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .GB button {
            width:100px;
            padding: 8px 15px;
            border-radius: 8px;
            border: 1px solid #ae34b3ff;
            background: #f8f0fbff;
            cursor: pointer;
            transition: 0.3s;
         
        }
        .GB button:hover {
            background: #fb00ffff;
            color: #fff;
        }
        .nut {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 15px;
        }
        .nut button {
            width: 180px;
            height: 40px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }
        .nut button:first-child {
            border: 1px solid #e53ee5ff;
            background: #fff;
            color: #d43de8ff;
        }
        .nut button:first-child:hover {
            background: #c33fd7ff;
            color: #fff;
        }
        .nut button:last-child {
            background: red;
            color: #fff;
        }
        .nut button:last-child:hover {
            opacity: 0.8;
        }
        .tra-gop {
            width: 100%;
            height: 40px;
            border-radius: 8px;
            background: #d72acfff;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
        }

        /* Ưu đãi */
        .uu-dai {
            margin-top: 20px;
            border-top: 1px dashed #ccc;
            padding-top: 15px;
        }
        .uu-dai h4 {
            color: #cf34e1ff;
            font-size: 18px;
            margin-bottom: 8px;
        }
        .uu-dai ul {
            list-style: circle;
            margin-left: 20px;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Phần bình luận + sản phẩm liên quan giữ nguyên */
        .binh_luan {
            width: 1200px;
            background-color: #f5f0fa;
            text-align: center;
            margin: 30px auto;
            border-radius: 10px;
            padding: 20px;
        }
        .binh_luan input {
            width: 80%;
            height: 50px;
            margin: 20px 0;
            border-radius: 30px;
            text-align: center;
        }
        .binhluan_truoc {
            text-align: left;
            margin: 20px;
            height: 300px;
            overflow-y: auto;
        }
        .sp_lien_quan {
            width: 1000px;
            display: grid;
            grid-template-columns: repeat(4,1fr);
            text-align: center;
            gap: 20px;
            margin: 50px auto;
        }
        .item {
            max-width: 100%;
            padding: 20px;
            border: 1px solid black;
            border-radius: 10px;
            background: #fff;
        }
        .item:hover{
            border:1px solid #d51bb9;
            background-color: #f9f4f8ff;
        }
        .item img {
            width: 80%;
            height: 230px;
        }
        .chiadoi {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .mua {
            color: white;
            border: 1px solid black;
            background-color: red;
            width: 100px;
            height: 30px;
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            font-weight: bold;
        }
        .ten_sp, .gia_sp, .a, .thêm {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="body">

    <h1>Trang chi tiết</h1><br>

    <div class="content">

        <!-- Khối sản phẩm -->
        <div class="sanpham">
            <div class="left">
                <img src="<?= ANH_IMG.$product_destails->image?>" alt="">
                <h3><?=$product_destails->name?></h3>
            </div>
            <div class="mota">
                <h4>Đặc điểm nổi bật</h4>
                <ul>
                    <li><?=$product_destails->description?></li>
                </ul>
                
            </div>
            
        </div>
        

        <!-- Khối thông tin mua -->
        <div class="thong_tin"> 
            <?php
            if ($product_destails->discount > 0) {
                // Có giảm giá
                $price_after_discount = $product_destails->price - $product_destails->discount;
                ?>
                <span class="price" style="color:red; font-size:20px; font-weight:bold;">
                    <?= number_format($price_after_discount, 0, ',', '.') ?>đ
                </span>
                <del class="price" style="font-size:16px; color:black; text-decoration: line-through; margin-left:8px;">
                    <?= number_format($product_destails->price, 0, ',', '.') ?>đ
                </del>
            <?php
            } else {
                // Không giảm giá
                ?>
                <span class="price" style="color:red; font-size:20px; font-weight:bold;">
                    <?= number_format($product_destails->price, 0, ',', '.') ?>đ
                </span>
            <?php
            }
            ?>
            <div class="GB">
                <button>64GB</button>
                <button>128GB</button>
                <button>256GB</button>
                <button>512GB</button>
            </div>

            <div class="nut">
                <button>Thêm vào giỏ hàng</button>
                <button>Mua hàng</button>
            </div>

            <button class="tra-gop">Mua trả góp 0% lãi suất</button>

            <div class="uu-dai">
                <h4>Ưu đãi thêm</h4>
                <ul>
                    <li>Giảm ngay 500k khi thanh toán qua ví điện tử</li>
                    <li>Tặng ốp lưng + dán cường lực miễn phí</li>
                    <li>Miễn phí vận chuyển toàn quốc</li>
                </ul>
            </div>
        </div>

    </div>

    <!-- BÌNH LUẬN -->
    <h1>Bình luận</h1>
    <div class="binh_luan">
        <?php if(!empty($_SESSION['user']['id'])): ?>
            <form action="" method="post">
                <input type="text" name="comment" placeholder="bạn đang nghĩ gì ?">
                <button type="submit" name="gui" style="background-color:red; color:white; border-radius:10px;">Gửi</button>
            </form>
        <?php else: ?>
            <a href="?act=dangnhap">Đăng nhập</a>
        <?php endif; ?>

        <div class="binhluan_truoc">
            <?php foreach($comment as $cmt): ?>
                <?=$cmt->name_User?>  -->   : <?= $cmt->date?> :  <?=$cmt->content?><br> <br>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- SẢN PHẨM LIÊN QUAN -->
    <h1>Sản phẩm liên quan</h1>
    <div class="sp_lien_quan">
        <?php
        foreach($sp_lien_quan as $tt):?>
        <?php
        $quantity_khuyen_mai = $tt->price - $tt-> discount;     //// giá khi Giảm
        $phan_tram_giam =round( ($tt-> discount /$tt->price )*100,1);
        if($tt->discount===0):?>
                <div class="item">
            <img src="<?= ANH_IMG .$tt->image?>" alt=""><br>
            <span class="ten_sp" style="font-size:20px;"><?=$tt->name?></span> <br>
            <span style="color:red;" class="gia_sp"><?= number_format($tt->price, 0, ',', '.') ?>đ</span> <br>
            <a href="?act=product_destails&id=<?=$tt->id?>" style="color:black;">>>Xem chi tiết</a>
            <div class="chiadoi">
                <a href="#" class="mua">Mua</a>
                <p class="thêm">Thêm vào giỏ hàng</p> <br>
            </div>
        </div>
        <?php else :?>
            <div class="item">
            <span style="color:red; margin-right:100px;">Giảm <?=$phan_tram_giam?>%</span>
            <img src="<?=ANH_IMG .$tt->image?>" alt=""><br>
            <span class="ten_sp" style="font-size:20px;"><?=$tt->name?></span> <br>
            <span class="gia_sp" style="color:red; display:block;"><?= number_format($quantity_khuyen_mai, 0, ',', '.') ?>đ</span>
            <del class="gia_sp" style="color:black;"><?= number_format($tt->price, 0, ',', '.') ?>đ</del> <br> 
            <a href="?act=product_destails&id=<?=$tt->id?>" style="color:black;">>>Xem chi tiết</a>
            <div class="chiadoi">
                <a href="#" class="mua">Mua</a>
                <p class="thêm">Thêm vào giỏi hàng</p> <br>
            </div>
        </div>
               <?php endif; ?>
            <?php endforeach; ?>
    </div>

</div>

</body>
</html>
<?php require_once "footer_user.php" ?>
