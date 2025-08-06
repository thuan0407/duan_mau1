<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer FPT Shop</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            width: 1200px;
            margin: auto;
        }
        footer {
            background: linear-gradient(to right, #d63384,  #8e44ad);
            color: #fff;
            padding: 40px 20px 20px;
            border-radius: 8px 8px 0 0;
        }
        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: auto;
            gap: 30px;
        }
        .footer-section {
            flex: 1;
            min-width: 250px;
        }
        .footer-section h3 {
            font-size: 18px;
            margin-bottom: 15px;
            border-bottom: 2px solid #fff;
            display: inline-block;
            padding-bottom: 5px;
        }
        .footer-section ul {
            list-style: none;
            padding: 0;
        }
        .footer-section ul li {
            margin: 8px 0;
        }
        .footer-section ul li a {
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }
        .footer-section ul li a:hover {
            text-decoration: underline;
            color: #ffd700;
        }
        .subscribe-form {
            display: flex;
            margin-top: 10px;
        }
        .subscribe-form input[type="email"] {
            padding: 8px;
            border: none;
            border-radius: 4px 0 0 4px;
            outline: none;
            flex: 1;
        }
        .subscribe-form button {
            padding: 8px 16px;
            border: none;
            background: #ffd700;
            color: #000;
            cursor: pointer;
            border-radius: 0 4px 4px 0;
            transition: 0.3s;
        }
        .subscribe-form button:hover {
            background: #f1c40f;
        }
        .social-icons {
            margin-top: 15px;
        }
        .social-icons a {
            display: inline-block;
            margin-right: 10px;
            color: #fff;
            font-size: 20px;
            text-decoration: none;
            transition: 0.3s;
        }
        .social-icons a:hover {
            color: #ffd700;
        }
        .footer-bottom {
            text-align: center;
            padding: 15px 0 0;
            font-size: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            margin-top: 20px;
        }
    </style>
    <!-- Thêm FontAwesome để có icon đẹp -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<footer>
    <div class="footer-container">
        <!-- Thông tin cửa hàng -->
        <div class="footer-section">
            <h3>MobeShop</h3>
            <p>Địa chỉ: 174 Phương Canh, Nam Từ Liêm, Hà Nội<br>
            Quận 7, TP.HCM | Đà Nẵng<br>
            Hotline: <b>1900 0102 4</b><br>
            Email: <a href="mailto:sptshop@gmail.com" style="color:#ffd700;">mobeshop@gmail.com</a></p>
        </div>

        <!-- Liên kết nhanh -->
        <div class="footer-section">
            <h3>Liên kết nhanh</h3>
            <ul>
                <li><a href="?act=trangchu_user">Trang chủ</a></li>
                <li><a href="?act=sanpham">Sản phẩm</a></li>
                <li><a href="?act=lienhe">Liên hệ</a></li>
                <li><a href="?act=dangnhap">Đăng nhập</a> / <a href="?act=dangky">Đăng ký</a></li>
            </ul>
        </div>

        <!-- Đăng ký nhận tin -->
        <div class="footer-section">
            <h3>Đăng ký nhận tin</h3>
            <p>Nhận thông báo khuyến mãi mới nhất</p>
            <form class="subscribe-form">
                <input type="email" placeholder="Nhập email của bạn" required>
                <button type="submit">Đăng ký</button>
            </form>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        © 2025 FPT Shop. Tất cả các quyền được bảo lưu.
    </div>
</footer>

</body>
</html>
