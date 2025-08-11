<?php  require_once __DIR__ . '/../header.php';?>
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
            margin:10px 0px; 
            border-radius:20px; height:35px; 
            background-color: rgba(203, 63, 203, 1); 
            color:white; 
            width:60px; 
            border: none;
        }
        button:hover{
        background-color: rgba(169, 57, 169, 1);
        }
        .a_center {
            white-space: nowrap; /* không cho xuống dòng */
        }
    </style>
</head>
<body>
        <div class="content">
            <h1>Sản phẩm</h1>
            <div class="right">
                <a style="border:1px solid black; padding:2px 5px; color:white; background-color: #992fe4; border-radius: 10px; border: none;" href="?act=create_product">Thêm sản phẩm</a><br>

                <form action="" method="post" enctype="multipart/form-data">
                <button style="" type="submit" name="tim">Tìm</button> 
                <input type="text" name="key_words" style="margin:10px 0px; border-radius:20px; height:30px; width:250px;">
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
                    <th>loại</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
                    <?php
                    foreach($product_list as $tt){
                        ?>
                        <tr>
                        <td>
                           
                           <img src="<?= ANH_IMG . $tt->image ?>" alt="ảnh sản phẩm" width="100" height="120">
                        </td>
                        <td><?= $tt->name?></td>
                        <td><?= $tt->price?></td>
                        <td><?= $tt->discount?></td>
                        <td><?= $tt->category_id?></td>
                        <td>
                            <?php
                            if($tt->hot ===1){
                                $tt->hot="sản phẩm hot";
                            }
                            elseif($tt->hot ===2){
                                $tt->hot ="sản phẩm mới";
                            }
                            else{
                                $tt->hot="sản phẩm khuyến mãi";
                            }
                            ?>
                            <?=$tt->hot?>
                        </td>
                        <td><?= $tt->quantity?></td>
                        <td class="a_center">
                            <a style="color:white; margin:10px; border:1px solid black; padding:2px 10px; background-color:rgba(221, 7, 213, 1);border-radius:5px;" href="?act=update_product&id=<?=$tt->id?>">Sửa </a>
                            <a style="color:white; margin:10px; border:1px solid black; padding:2px 10px; background-color:red;border-radius:5px;" href="?act=delete_product&id=<?=$tt->id?>" onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')">Xoá</a>
                        </td>
                        </tr>
                        <?php
                    }
                    ?>
            </table>
            </div>
</body>
</html>