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
        .vien_tren {
            max-width: 100%;
            height: 50px;
            background-color: black;
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

    </style>
</head>
<body>
        <div class="vien_tren"></div>
    <nav>
        <div class="header">
            <div class="logo">logo</div>
            <div class="menu_tren">
                <ul>
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="">liên hệ</a></li>
                    <li><a href="">Sản phẩm</a></li>
                </ul>
            </div>

            <div class="right">
                <form action="" method="get">
                    <input type="text"> <button>tìm</button>
                </form>
                <div class="gioi_hang">giỏi hàng</div>
            </div>

        </div>
    </div>
    </nav>
</body>
</html>