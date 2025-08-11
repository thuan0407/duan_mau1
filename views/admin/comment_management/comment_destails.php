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

    </style>
</head>
<body>
        <div class="content">
            <h1>Chi tiết bình luận</h1>
            <table>
                <tr>
                    <th>HÌnh ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Khuyến mãi</th>
                    <th>Danh mục </th>
                    <th>Hot</th>
                    <th>Số lượng</th>
                </tr>
                        <tr>
                        <td>
                           
                           <img src="<?= ANH_IMG . $product->image ?>" alt="ảnh sản phẩm" width="100" height="120">
                        </td>
                        <td><?= $product->name?></td>
                        <td><?= $product->price?></td>
                        <td><?= $product->discount?></td>
                        <td><?= $product->category_id?></td>
                        <td><?= $product->hot?></td>
                        <td><?= $product->quantity?></td>
                        
            </table>
            <span style="color:green;"><?=$success?></span>
            <span style="color:red;">  <?=$err?></span>

            <form action="" method="post">
                <?php foreach($comment as $cmt): ?>
                    <form action="" method="post" style="margin-bottom: 15px;">
                        <?= $cmt->name_User ?>  -->  <?= $cmt->date ?> : <?= $cmt->content ?> <br><br>
                        <input type="hidden" name="comment_id" value="<?= $cmt->id ?>">
                        <button type="submit" name="delete_comment" style="background-color:red;color:white;"
                                onclick="return confirm('Bạn có chắc là muốn xóa không?')">
                            Xóa bình luận
                        </button>
                        <hr>
                    </form>
                <?php endforeach; ?>
            </div>
            </form>
</body>
</html>