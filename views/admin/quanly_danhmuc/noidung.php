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
    background-color:blue;
    color:white;
    border-radius:20px;
    width:70px;
    height:35px;
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
                    <td><input type="text" name="name_danhmuc" style="height:30px; width:200px;border-radius:20px;">
                    <button style="border: none;" tpye="submit" name="create_danhmuc">Tạo</button>
                    <span style="color:green;"><?=$thanhcong?></span>
                    <span style="color:red;"><?=$loi?></span>
                    </td></tr>
            </table>
        </form>

    <table>
        <span><?=$thongbao?></span>
        <tr>
            <th>Tên danh mục</th>
            <th>Số lượng</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>

        </tr>
        <?php
        foreach($danhsach as $tt){
            ?>
            <tr>
                <td><?=$tt->name?></td>
                <td><?=$tt->sum?></td>
                <td><?=$tt->date?></td>
                <td>
                <a style="color:black;" href="?act=update_danhmuc&id=<?=$tt->id?>">Sửa / </a>
                <a style="color:black;" href="?act=delete_danhmuc&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn xóa không?')">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</body>
</html>