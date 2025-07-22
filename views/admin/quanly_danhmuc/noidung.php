<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/admin/quanly_danhmuc.css">
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
                    <td><input type="text" name="name_danhmuc">
                    <button tpye="submit" name="create_danhmuc">Tạo</button>
                    <span><?=$thanhcong?></span>
                    <span><?=$loi?></span>
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
                <a href="?act=update_danhmuc&id=<?=$tt->id?>">Sửa / </a>
                <a href="?act=delete_danhmuc&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn xóa không?')">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</body>
</html>