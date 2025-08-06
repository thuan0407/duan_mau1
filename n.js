let name = document.getElementById('name').value;
let email = document.getElementById('password').value;
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



