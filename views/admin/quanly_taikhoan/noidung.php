<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/admin/taikhoan_noidung..css">
    <style>
    </style>
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
    <div class="content">
    <h1>Trang quản lý tài khoản</h1>
            <form action=""method="post" enctype ="multipart/form-data">
            <button type="submit" name="tim">Tìm</button> <input type="text" name="user" style="border-radius:20px;">
            <span style="color:red;"> <?=$err?></span>
        </form>
    <table border="1">
        <tr>
            <th>Tên </th>
            <th>email</th>
            <th>Điện thoại</th>
            <th>role</th>
            <th>Hành động</th>
        </tr>
        <?php
        foreach($danhsach as $tt){
            ?>
            <tr>
                <td><?=$tt->name?></td>
                <td><?=$tt->email?></td>
                <td><?=$tt->number?></td>
                <td><?=$tt->role?></td>
                <td>
                    <a style="color:black;" href="">Xem chi tiết / </a>
                    <a style="color:black;" href="">Khóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</body>
</html>