<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="public/dangnhap_dangky/dangnhap.css"> -->
     <style>
        body{
            margin:0 auto;
            width: 1200px;
        }
        form{
            border:1px solid transparent;
            padding:50px;
            width:400px;
            margin:100px 400px;
            border-radius: 20px;
            box-shadow: 2px 2px 2px 2px rgba(189, 35, 189, 1);
        }
        .top img{
            width:200px;
        }
        h2{
            text-align: center;
        }
        a{
            margin-left:140px;
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
        background:  rgba(201, 72, 201, 1);
        border: none;
        color: white;
        padding: 8px 18px;
        border-radius: 20px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        }

        button:hover {
            background: rgba(161, 36, 161, 1);
        }

     </style>
</head>
<body>
        <form method="POST">
    <table>
        <h2>Đăng nhập</h2>
        <tr>
            <td>Tên đăng nhâp:</td>
            <td><input type="email" name="email" required placeholder="Nhập email"></td>
        </tr>

        <tr>
            <td>Mật khẩu:</td>
            <td><input type="password" name="password" required placeholder="Nhập mật khẩu"></td>
        </tr>

        <tr>
            <td>Vai trò:</td>
            <td>
                <select name="role" id="">
                    <option value="1">Khách hàng</option>
                    <option value="0">Người quản trị</option>
                </select>
            </td>
        </tr>
        
    </table><br>

        <button type="submit" name="login">Đăng nhập</button>
        <br>
        <span><?=$loi?></span>
        <br> <a href="?act=register">Đăng ký tài khoản</a>
    </form>
</body>
</html>