<?php
$hotText = '';
if ((int)$sanpham->hot === 1) {
    $hotText = 'Sản phẩm hot';
} elseif ((int)$sanpham->hot === 2) {
    $hotText = 'Sản phẩm mới';
} else {
    $hotText = 'Sản phẩm khuyến mãi';
}
?>
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
        main{
            margin-left:260px;
            background-color:	#f5f5f5; /* hồng pastel */
            color: #333;
            font-family: 'Segoe UI', sans-serif;    
            padding-bottom:100px;
        }

        input {
            margin-top:20px;
            width:400px;
            height:30px;
            border-radius: 10px;
        }

        button{
            margin-right:150px;
            background-color: rgb(217, 28, 217);
            border-radius: 10px;
            height:30px;
            width:90px;
            color:white;
            margin-top:20px;
        }
        button:hover{
            background-color: rgba(179, 51, 179, 1);
        }
        td a{
            color:black;
            padding: 3px;
            margin: 20px 15px;
        }

    </style>
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
                <th>Danh mục</th>
                <td>
                    <select name="category_id" id="">   
                        <option value="<?=$sanpham->category_id?>"><?=$sanpham->name_category?></option>
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
                <th>loại</th>
                <td> <select name="hot" id="">
                <option value="<?=$sanpham->hot?>"> <?=$hotText?></option>   
                <option value="1">hot</option>
                <option value="2">sản phẩm mới</option>
                <option value="3">sản phẩm khuyến mãi</option>
            </select></td>
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
                <td><a style="border: none;"  href="?act=<?='quanly_sanpham'?>">quay lại</a></td>
                <td><button style="border: none;"  type="submit" name="update_sanpham">update</button></td>
            </tr>
        </table>
            <span style="color:red;"><?= $loi?></span>
            <span style="color:green;"><?= $thanhcong?></span>
    </form>
    </main>

</body>
</html>