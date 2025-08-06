<?php  
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nameUser = $_SESSION['user']['name'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
        body {
            width: 1200px;
            margin: 0 auto;
        }
        .header{
            display:flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo{
            font-size:30px;
            background: linear-gradient(to right, #af48b3ff, #e94795ff);
            padding:5px;
            border-radius: 10px;
        }
        .vien_tren {
            display:flex;
            max-width: 100%;
            height: 50px;
            background: linear-gradient(to right, #d63384,  #8e44ad);
            background-size: cover;
            justify-content: space-between;
            align-items: center;
            padding:0px 20px;
        }
        nav {
            max-width: 100%;
            padding: 10px 50px;
        }
        .menu_tren ul {
            display: flex;
        }
        ul li {
            list-style: none;
            margin-left: 30px;
        }
        ul li a{
            text-decoration: none;
        }
        ul li a:hover{
            color:red;
        }
        .right{
            display:flex;
            align-items: center;
            list-style: none;
            justify-content: space-between;
            align-items: center;
        }
        form{
            margin-right:20px;   
        }
        input{
            width:300px;
            height:30px;
            border-radius: 20px;
            background-color: transparent;
        }
        button{
            border-radius: 20px;
            height:35px;
            width:50px;
            background-color: transparent;
        }
        .gio_hang{
        }

    </style>
</head>
<body>

        <div class="vien_tren">
            <p style="color:white;">lot line: 1900 0102 4</p>
         <form action="" method="post">
        <?php if(!empty($_SESSION['user']['name'])): ?>
            <a style="text-decoration: none;color:white;" href="?act=dangxuat">Đăng xuất</a>
            <?php else :?>
            <a style="text-decoration: none;color:white;" href="?act=dangnhap">Đăng nhập</a>
                <?php endif;
            ?>
      </form>
        </div>
    <nav>
        <div class="header">
            <a style="text-decoration: none;" href="?act=trangchu_user"><div class="logo">Mobishop</div></a>
    
            <div class="menu_tren">
                <ul>
                    <li><a href="?act=trangchu_user">Trang chủ</a></li>
                    <li><a href="?act=trangsp_user">Sản phẩm</a></li>
                    <li><a href="?act=gioi_thieu">Giới thiệu</a></li>
                    <li><a href="?act=lien_he">liên hệ</a></li>
                </ul>
            </div>

            <div class="right">
                <form action="index.php" method="get">
                    <!-- Gửi thêm act để router nhận đúng hàm controller -->
                    <input type="hidden" name="act" value="trangchu_user">
                    <input type="text" name="key_name" placeholder="Nhập tên sản phẩm..." value="<?= $thongbao ?? '' ?>">
                    <button type="submit" name="search">Tìm</button> <br>
                </form>

                <div class="gioi_hang">
                    <button style="border:none; outline:none;font-size: 30px; margin-bottom:15px;" >🛒</button>
                </div>
            </div>

        </div>
    </div>
    </nav>
</body>
</html>