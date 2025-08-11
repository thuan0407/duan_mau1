<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        margin:0 auto;
        width:1200px;
        }
        .content{
            margin-left:300px;  
        }
        /* Reset và font mặc định */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            color: #333;
        }   

        /* Container chính */
        .content {
            width: 800px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Tiêu đề trang */
        .content h1 {
            color: #2c3e50;
        }

        /* Form tìm kiếm */
        form {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        form input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            flex: 1;
        }

        form button {
            padding: 10px 20px;
            font-size: 16px;
            background-color:rgb(217, 28, 217);
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        form button:hover {
            background-color: rgba(194, 64, 194, 1);
        }

        /* Bảng dữ liệu */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #ecf0f1;
            color: #2c3e50;
            font-weight: bold;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Hành động */
        table td a {
            text-decoration: none;
            color: #2980b9;
            margin-right: 10px;
        }

        table td a:hover {
            text-decoration: underline;
            color: #1c5980;
        }

        /* Thông báo lỗi */
        span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
    <div class="content">
    <h1>Trang quản lý tài khoản</h1>
            <form action=""method="post" enctype ="multipart/form-data">
            <button type="submit" name="search">Tìm</button> <input type="text" name="user" style="border-radius:20px;">
            <span style="color:green;"><?=$success?></span>
            <span style="color:red;"> <?=$err?></span>
        </form>
    <table border="1">
        <tr>
            <th>Tên </th>
            <th>email</th>
            <th>Điện thoại</th>
            <th>Địa chỉ</th>
            <th>Hành động</th>
        </tr>
        <?php
        foreach($user_list as $tt):?>
        <?php if($tt->role==1): ?>
            <tr>
                <td><?=$tt->name?></td>
                <td><?=$tt->email?></td>
                <td>0<?=$tt->number?></td>
                <td><?=$tt->address?></td>
                <td>
                    <a style="color:white;  border:1px solid black; padding:2px 10px; background-color:red; border-radius:5px;" href="?act=delete_account&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn xóa tài khoản này không?')">Xoá</a>
                    <?php
                    if($tt->active === 1){?>
                        <a style="color:white; border:1px solid black; padding:2px 10px; background-color:rgba(221, 7, 213, 1);border-radius:5px;" href="?act=lock_account&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn khóa tài khoản này không?')">Khóa tài khoản</a><br>
                    <?php }
                    else{ ?>
                        <a style="color:white;  border:1px solid black; padding:2px 10px; background-color:green;border-radius:5px;" href="?act=open_account&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn mở tài khoản này không?')">mở tài khoản</a><br>
                    <?php }
                    ?>
                </td>
            </tr>
            <?php endif;?>
            <?php endforeach;?>
    </table>
    </div>
</body>
</html>