
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
        body{
            width:1200px;
            margin:0 auto;
        }
        main{
            margin-left:500px;
        }
        h1{
            margin:0px;
        }
        form{
            margin-top:50px;
        }
    </style>
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
    <main>
<h1>Trang update danh mục</h1>
<form action="" method="post" enctype="multipart/form-data">
 <label for="">Tên danh mục</label> <br>
 <input type="text" name="name_danhmuc" value="<?= $ten_danhmuc_cu->name?>">
 <button type="submit" name="update_danhmuc">sửa</button>
 <a href="?act=quanly_danhmuc">Quay lại</a>
 <span> <?=$thanhcong?></span>
 <span> <?=$loi?></span>
</form>
</main>
</body>
</html>