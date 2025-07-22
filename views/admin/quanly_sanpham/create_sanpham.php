<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="./public/admin/quanly_sanpham_create.css">
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
    <main>
<h1>Trang Create sản phẩm</h1>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Tên sản phẩm</th>
            <td><input type="text" name="name" ></td>
        </tr>
        <tr>
            <th>ảnh</th>
            <td><input type="file" name="anh_sp" ><br>
        </td>
        </tr>
        <tr>
            <th>loại</th>
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
            <th>hot</th>
            <td><input type="number" name="hot"></td>
        </tr>
        <tr>
            <th>giá</th>
            <td><input type="number" name="price" ></td>
        </tr>
        <tr>
            <th>giảm giá</th>
            <td><input type="number" name="discount"></td>
        </tr>
        <tr>
            <th>Miêu tả</th>
            <td><input type="text" name="description" ></td>
        </tr>
        <tr>
            <th>Số lượng</th>
            <td><input type="number" name="quantity"></td>
        </tr>

    </table>
    <button type="submit" name="create_sanpham">Create</button>
    <a href="?act=<?='quanly_sanpham'?>">quay lại</a>
    <span><?= $loi?></span>
    <span><?= $thanhcong?></span>
    </main>
    
</form>
</body>
</html>