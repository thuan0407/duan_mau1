<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title><link rel="stylesheet" href="public/dangnhap_dangky/dangky.css"> -->
     <style>
        body{
        margin:0 auto;
        width: 1200px;
        }
        form{
            border:1px solid black;
            padding:50px;
            width:400px;
            margin:70px 400px;
            box-shadow: 2px 2px 2px 2px rgba(205, 45, 205, 1);
            border-radius: 20px;
        }
        .top img{
            width:200px;
        }
        h2{
            text-align: center;
        }
        a{
            margin-left:155px;
        }
        input{
            width:250px;
            border-radius: 20px;
            height:20px;
        }
        table td {
            padding: 10px 5px; /* Tăng khoảng cách trên dưới */
        }
        button {
        margin-left:150px;
        background: rgba(205, 45, 205, 1);
        border: none;
        color: white;
        padding: 8px 18px;
        border-radius: 20px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        text-align: center;
        }

        button:hover {
            background: rgba(154, 25, 154, 1);
        }


     </style>
</head>
<body>
    <form action="" onsubmit="return kiemtra()" method="POST">
    <table>
        <h2>Đăng ký</h2>
<tr>
    <td>Tên:</td>
    <td>
        <input id="name" type="text" name="name"  placeholder="Nhập tên người dùng"><br>
        <span id="err-name" style="color:red;font-size:12px"></span>
    </td>
</tr>

<tr>
    <td>Email:</td>
    <td>
        <input id="email" type="text" name="email"  placeholder="Nhập email"><br>
        <span id="err-email" style="color:red;font-size:12px"></span>
    </td>
</tr>

<tr>
    <td>Mật khẩu:</td>
    <td>
        <input id="password" type="text" name="password"  placeholder="Nhập mật khẩu"><br>
        <span id="err-password" style="color:red;font-size:12px"></span>
    </td>
</tr>

<tr>
    <td>Địa chỉ</td>
    <td>
        <input id="adress" type="text" name="address"  placeholder="Nhập địa chỉ"><br>
        <span id="err-adress" style="color:red;font-size:12px"></span>
    </td>
</tr>

<tr>
    <td>SDT:</td>
    <td>
        <input id="number" type="text" name="number"  placeholder="Nhập số điện thoại">
        <span id="err-number" style="color:red;font-size:12px"></span>
    </td>
</tr>
        
    </table><br>

        <button type="submit" name="dangky">Đăng ký</button>
           <span style="color:red;"> <?= $loi?></span>
           <span style="color:green;"> <?= $thanhcong?></span>
           <br><br> <a href="?act=dangnhap">Đăng nhập</a>
    </form>
     </div>   

<script>
    function kiemtra(){
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let adress = document.getElementById('adress').value;
    let number = document.getElementById('number').value;

    //xóa lỗi 
    document.querySelectorAll('span').forEach(span=>span.textContent='');

    //kiểm tra
    let check = true;
    if(name.trim()===''){
        document.getElementById('err-name').textContent='không được bỏ trống';
        check =false;
    }
    if(email.trim()===''){
        document.getElementById('err-email').textContent='không được bỏ trống';
        check =false;
    }
    if(password.trim()===''){
        document.getElementById('err-password').textContent='không được bỏ trống';
        check =false;
    }
    if(adress.trim()===''){
        document.getElementById('err-adress').textContent='không được bỏ trống';
        check =false;
    }
    if(number.trim()===''){
        document.getElementById('err-number').textContent='không được bỏ trống';
        check =false;
    }
        // Kiểm tra định dạng email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email !== '' && !emailPattern.test(email)) {
            document.getElementById('err-email').textContent = 'Email không hợp lệ';
            check = false;
        }

        // Kiểm tra định dạng số điện thoại VN (0 hoặc +84, 10 số)
        const phonePattern = /^(0|\+84)[0-9]{9}$/;
        if (number !== '' && !phonePattern.test(number)) {
            document.getElementById('err-number').textContent = 'Số điện thoại không hợp lệ (VD: 0912345678)';
            check = false;
        }

        // **Kiểm tra độ mạnh mật khẩu**
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,10}$/;
        if (password !== '' && !passwordPattern.test(password)) {
            document.getElementById('err-password').textContent =
                'Mật khẩu phải 6-10 ký tự, có chữ hoa, chữ thường và số';
            check = false;
        }

        return check; // trả về true/false cho onsubmit
}

</script>
</body>
</html>


