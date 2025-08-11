<?php session_start();
?>
<?php  require_once "header.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/admin/trangchu.css">
    <style>
        .content{
            width:1000px;
            margin-left:260px;
            height:693px;
            background:;
            background-size: cover; 
        }
        .so_lieu{
            text-align: center;
        }
        .tong_doanh_thu{
            border:1px solid black;
            margin:50px;
            border-radius: 5px;
            color: #e42fccff;
        }
        .thongtin{
            display:flex;
            justify-content: center;
            align-items: center;
        }
        .item_2{
            width:200px;
            margin: 15px;
            border:1px solid black;
            border-radius:5px;

        }
        h3{
            color: #e42fccff;
        }
    </style>
</head>
<body>
    <div class="content">
    <h1> Chào mừng bạn đến với trang quản trị</h1>
    Xin chào, <?=$user?>! Hôm nay là ngày <?=$today?> chúc bạn mộn ngày làm việc vui vẻ!

    <div class="so_lieu">
    <div class="tong_doanh_thu">
        <h2> Tổng doanh thu</h3>
        <h2 style="color:red;">200.000.000 đ</h2>
    </div>

    <div class="thongtin">
        <div class="item_2">
            <h3>Tổng sản phẩm</h3>
            <h3 style="color:red;">150</h3>
        </div>

        <div class="item_2">
            <h3>Bình luận mới</h3>
            <h3 style="color:red;">2.000</h3>
        </div>


        <div class="item_2">
            <h3>Đơn hàng hôm nay</h3>
            <h3 style="color:red;">200</h3>
        </div>

        <div class="item_2">
            <h3>Người dùng</h3>
            <h3 style="color:red;">5</h3>
        </div>
    </div>
    </div>

    </div>

</body>
</html>