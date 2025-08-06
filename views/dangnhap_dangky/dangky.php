<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title><link rel="stylesheet" href="public/dangnhap_dangky/dangky.css"> -->
     <style>
        body{
        margin:0 auto;
        width: 1200px;
        }
        form{
            border:1px solid black;
            padding:50px;
            width:400px;
            margin:70px 400px;
            box-shadow: 2px 2px 2px 2px rgba(205, 45, 205, 1);
            border-radius: 20px;
        }
        .top img{
            width:200px;
        }
        h2{
            text-align: center;
        }
        a{
            margin-left:155px;
        }
        input{
            width:250px;
            border-radius: 20px;
            height:20px;
        }
        table td {
            padding: 10px 5px; /* Tăng khoảng cách trên dưới */
        }
        button {
        margin-left:150px;
        background: rgba(205, 45, 205, 1);
        border: none;
        color: white;
        padding: 8px 18px;
        border-radius: 20px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        text-align: center;
        }

        button:hover {
            background: rgba(154, 25, 154, 1);
        }


     </style>
</head>
<body>
     <form method="POST">
    <table>
        <h2>Đăng ký</h2>
        <tr>
            <td>Tên:</td>
            <td><input type="text" name="name" required placeholder="Nhập tên người dùng"></td>
        </tr>

        <tr>
            <td>email:</td>
            <td><input type="email" name="email" required placeholder="Nhập email"></td>
        </tr>

        <tr>
            <td>Mật khẩu:</td>
            <td><input type="password" name="password" required placeholder="Nhập mật khẩu"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="address" required placeholder="Nhập địa chỉ"></td>
        </tr>
        <tr>
            <td>SDT:</td>
            <td><input type="number" min="10" name="number" required placeholder="Nhập số điện thoại"></td>
        </tr>
        
    </table><br>

        <button type="submit" name="dangky">Đăng ký</button>
           <span style="color:red;"> <?= $loi?></span>
           <span style="color:green;"> <?= $thanhcong?></span>
           <br><br> <a href="?act=dangnhap">Đăng nhập</a>
    </form>
     </div>   
</body>
</html>


