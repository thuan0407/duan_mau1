<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/admin/quanly_danhmuc.css">
    <style>
        body{
            width:1200px;
            margin:0 auto;
        }
        .content{
            margin-left:300px;
        }
        .right{
            text-align: right;
        }
        table {
            border-collapse: separate;
            border-spacing: 0 12px; /* tạo khoảng cách dọc giữa các <tr> */
            width: 100%;
        }

        th, td {
            padding: 10px 15px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
        button{
            background-color: rgba(201, 43, 201, 1);
            color:white;
            border-radius:20px;
            width:70px;
            height:35px;
        }
        button:hover{
            background-color: rgba(180, 59, 180, 1);
        }
    </style>
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
    <div class="content">
        <?php $thongbao=""; ?>
        <!-- khởi tạo biến thông báo tránh lỗi vì đang làm hai câu lệnh trên cùng một file -->
        
    <h1>Trang quản lý danh mục</h1>
        <form action=""method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Tên danh mục</th>
                    <td><input type="text" name="name_category" style="height:30px; width:200px;border-radius:20px;">
                    <button style="border: none;" tpye="submit" name="create_category">Tạo</button>
                    <span style="color:green;"><?=$success?></span>
                    <span style="color:red;"><?=$err?></span>
                    </td></tr>
            </table>
        </form>

    <table>
        <span><?=$success?></span>
        <tr>
            <th>Tên danh mục</th>
            <th>Tổng lượng sản phẩm </th>
            <th>Ngày tạo</th>
            <th>Hành động</th>

        </tr>
        <?php
        foreach($category_list as $tt){
            ?>
            <tr>
                <td><?=$tt->name?></td>
                <td><?=$tt->sum?></td>
                <td><?=$tt->date?></td>
                <td>
                <a style=" margin:0px;color:white; margin:10px; border:1px solid black; padding:2px 10px; background-color:rgba(221, 7, 213, 1); border-radius:5px;" href="?act=update_category&id=<?=$tt->id?>">Sửa  </a>
                <a style="color:white; margin:10px; border:1px solid black; padding:2px 10px; background-color:red; border-radius:5px;" href="?act=delete_category&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn xóa không?')">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</body>
</html>