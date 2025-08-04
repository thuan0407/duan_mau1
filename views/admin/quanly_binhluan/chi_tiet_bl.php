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
                           
                           <img src="<?= ANH_IMG . $san_pham->image ?>" alt="ảnh sản phẩm" width="100" height="120">
                        </td>
                        <td><?= $san_pham->name?></td>
                        <td><?= $san_pham->price?></td>
                        <td><?= $san_pham->discount?></td>
                        <td><?= $san_pham->category_id?></td>
                        <td><?= $san_pham->hot?></td>
                        <td><?= $san_pham->quantity?></td>
                        
            </table>
            <span style="color:green;"><?=$thongbao_thanhcong?></span>
            <span style="color:red;">  <?=$thongbao_thatbai?></span>

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