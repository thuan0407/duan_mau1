<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/admin/quanly_sp_noidung.css">
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
        <div class="content">
            <h1>Sản phẩm</h1>
            <div class="right">
                <a href="?action=create_sanpham">Thêm sản phẩm</a><br>

                <form action="" method="post" enctype="multipart/form-data">
                <button type="submit" name="tim">Search</button> <input type="text" name="tukhoa">
                <span style="color:red;"> <?=$err?></span>
                </form>

            </div>
            <table>
                <tr>
                    <th>HÌnh ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Khuyến mãi</th>
                    <th>Danh mục </th>
                    <th>Hot</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
                    <?php
                    foreach($danhsach as $tt){
                        ?>
                        <tr>
                        <td>
                            <img src="<?= BASE_ASSETS_UPLOADS .$tt->image?>" alt="" width=100>
                        </td>
                        <td><?= $tt->name?></td>
                        <td><?= $tt->price?></td>
                        <td><?= $tt->discount?></td>
                        <td><?= $tt->idcategory?></td>
                        <td><?= $tt->hot?></td>
                        <td><?= $tt->quantity?></td>
                        <td>
                            <a href="?action=updeta_sanpham&id=<?=$tt->id?>">Sửa /</a>
                            <a href="?action=delete_sanpham&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')">Xoá</a>
                        </td>
                        </tr>
                        <?php
                    }
                    ?>
            </table>
            </div>
</body>
</html>