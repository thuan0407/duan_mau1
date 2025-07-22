<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        main{
            display:flex;
            text-align: center;
        }
        .item{
            width:23%;
            border:1px solid black;
            margin:0 auto;
            text-align: center;
            padding:20px;
            margin:10px;
            height:350px;
            border-radius:20px;
            box-shadow:5px 5px 5px 5px  rgb(176, 176, 170) ;

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
    <h1>sản phẩm mới</h1>
    <main>

        <?php
        foreach($sanpham_moi as $tt){?>
         <div class="item">
            <img src="<?= ANH_IMG. $tt->image?>" alt=""> <br>
            <span class="ten_sp" style="font-size:20px;"><?=$tt->name?></span> <br>
            <span class="gia_sp"><?=$tt->price?>đ</span> <br>
            <a href="?action=chi_tiet_sp&id=<?=$tt->id?>" style="color:red;">>>Xem chi tiết</a>
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