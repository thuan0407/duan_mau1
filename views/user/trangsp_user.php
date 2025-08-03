<?php require_once "header_user.php" 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
        .chia{
            display:flex;
            justify-content: space-between;
            align-items: center;
        }
        select{
            margin-right:50px;
            height:30px;
            background-color: color:rgb(222, 56, 216);
        }
        h1{
            margin-left:50px;
            color:red;
        }
        
        main{
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
            border-radius:5px;
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
<body>
    <div class="chia">
        <h1>Các sản phẩm </h1>  <h1> <?=$thongbao?></h1>
            <form method="get" action="index.php">
                <select name="price" onchange="this.form.submit()">
                    <option value="" disabled selected>Lọc theo mức giá</option>
                    <option value="1">Dưới 5 Triệu</option>
                    <option value="2">Từ 5 -> 10 Triệu</option>
                    <option value="3">Từ 10 -> 20 Triệu</option>
                    <option value="4">Từ 20 -> 30 Triệu</option>
                    <option value="5">Trên 30 Triệu</option>
                </select>
                <!-- giữ act để không mất route -->
                <input type="hidden" name="act" value="danhsach_sanpham">
            </form>
    </div>
    
        <main>

        <?php
        foreach($danhsach_sp as $tt){?>
         <div class="item">
            <img src="<?= ANH_IMG. $tt->image?>" alt=""> <br>
            <span class="ten_sp" style="font-size:20px;"><?=$tt->name?></span> <br>
            <span class="gia_sp" style="color:red;"><?= number_format($tt->price, 0, ',', '.') ?>đ  </span> <br>
            <a href="?act=chi_tiet_sp&id=<?=$tt->id?>" style="color:black;">>>Xem chi tiết</a>
            <div class="chiadoi">
                <a href="#" class="mua">Mua</a>
                <p class="thêm">Thêm vào giỏi hàng</p> <br>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </main>
</body>
</html>
<?php require_once "footer_user.php" ?>