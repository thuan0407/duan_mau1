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
    </style>
</head>
<body>
    <?php  require_once __DIR__ . '/../header.php';?>
    <div class="content">
        <h1>Trang quản lý bình luận</h1>


            <div class="right">

                <form action="" method="post" enctype="multipart/form-data">
                <button style="" type="submit" name="search">Tìm</button> 
                <input type="text" name="key_words" style="margin:10px 0px; border-radius:20px; height:30px; width:250px;">
                <span style="color:red;"> <?=$err?></span>
                </form>

            </div>
            <table border="1">
                <tr>
                    <th>HÌnh ảnh</th>
                    <th>Tên sản phẩm</th>
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
                        <td><?= $tt->quantity ?></td>
                        <td>
                            <a style="color:rgba(221, 7, 213, 1);" href="?act=comment_destails&id=<?=$tt->id?>">>>Xem chi tiết các bình luận</a>
                        </td>
                        </tr>
                        <?php
                    }
                    ?>
            </table>
    </div>
</body>
</html>