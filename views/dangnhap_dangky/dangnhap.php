<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/dangnhap_dangky/css/dangnhap.css">
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

        <button type="submit" name="dangnhap">Đăng nhập</button>
        <br>
        <span><?=$loi?></span>
        <br> <a href="?act=dangky">Đăng ký tài khoản</a>
    </form>
</body>
</html>