<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="./public/admin/quanly_sanpham_update.css">
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
    <main>
    <h1>Trang update sản phẩm</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <td><input type="text" name="name" value="<?=$sanpham->name?>"></td>
            </tr>
            <tr>
                <th>Ảnh</th>
                <td><input type="file" name="anh_sp"></td>
                <img src="<?= ANH_IMG . $sanpham->image ?>" alt="ảnh sản phẩm" width="100" height="120">
            </tr>
            <tr>
                <th>Loại</th>
                <td>
                    <select name="category_id" id="">
                    <option value="">chọn danh mục</option>
                    <?php
                    foreach($danhsach as $tt){
                        ?>
                    <option value="<?=$tt->id?>"><?=$tt->name?></option>
                        <?php
                    }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <th>Hot</th>
                <td><input type="number" name="hot" value="<?=$sanpham->hot?>"> </td>
            </tr>
            <tr>
                <th>Giá</th>
                <td><input type="number" name="price" value="<?=$sanpham->price?>"></td>
            </tr>
            <tr>
                <th>Giảm giá</th>
                <td><input type="number" name="discount" value="<?=$sanpham->discount?>"></td>
            </tr>
            <tr>
                <th>Miêu tả</th>
                <td><input type="text" name="description" value="<?=$sanpham->description?>"></td>
            </tr>
            <tr>
                <th>Số lượng</th>
                <td><input type="number" name="quantity" value="<?=$sanpham->quantity?>"></td>
            </tr>
            <tr>
                <td><a href="?act=<?='quanly_sanpham'?>">quay lại</a></td>
                <td><button type="submit" name="update_sanpham">update</button></td>
            </tr>
        </table>
            <span><?= $loi?></span>
            <span><?= $thanhcong?></span>
    </form>
    </main>

</body>
</html>