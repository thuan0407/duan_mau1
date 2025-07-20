<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><link rel="stylesheet" href="public/dangnhap_dangky/dangky.css">
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
            <td><input type="text" name="address" required placeholder="Nhập địa chỉ" min = "10" max="10"></td>
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


