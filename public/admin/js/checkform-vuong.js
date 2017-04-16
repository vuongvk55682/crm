function checkregister()
{
    if(document.getElementById("id_role").value=="")
    {
        document.getElementById("error_form").style.display = "block";
        document.getElementById("id_role").focus();
        return false;
    } 
    else if(document.getElementById("username").value=="")
    {
        document.getElementById("error_username").style.display = "block";
        document.getElementById("username").focus();
        return false;
    }
    else if(document.getElementById("password").value=="")
    {
        document.getElementById("error_pass").style.display = "block";
        document.getElementById("password").focus();
        return false;
    }
    else if(document.getElementById("repassword").value=="")
    {
        document.getElementById("error_repass").style.display = "block";
        document.getElementById("repassword").focus();
        return false;
    }
    else if(document.getElementById("password").value!=document.getElementById("repassword").value)
    {
        document.getElementById("error_chkpass").style.display = "block";
        document.getElementById("repassword").focus();
        return false;
    }
    else if(document.getElementById("email").value=='')
    {
        document.getElementById("error_email").style.display = "block";
        document.getElementById("email").focus();
        return false;
    }
    else{
        var str=document.getElementById("email").value;
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(filter.test(str)){
            return true;
        }else{
            document.getElementById("error_chkemail1").style.display = "block";
            document.getElementById("email").focus();
            return false;
        }
    }
}
function checkRegisterUser()
{
    if(document.getElementById("id_role").value=='0')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa chọn nhóm cho thành viên !',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: false, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("id_role").focus();
        return false;
    }
    if(document.getElementById("username").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập tên tài khoản',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: false, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("username").focus();
        return false;
    }
    if(document.getElementById("password").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập mật khẩu',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: false, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("password").focus();
        return false;
    }
    if(document.getElementById("repassword").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập lại mật khẩu',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: false, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("repassword").focus();
        return false;
    }
    if(document.getElementById("fullname").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập họ tên',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: false, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("fullname").focus();
        return false;
    }
    if(document.getElementById("email").value=='')
    {
        return true;
    }
    else
    {
        var email = document.getElementById("email").value;
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(filter.test(email)){
            return true;
        }else{
            Lobibox.notify('warning', {
                msg: 'Email không đúng định dạng. Vui lòng kiểm tra lại!',
                rounded: true,
                size: 'mini',
                position: 'right bottom',
                sound: true, 
                delay: 5000,  //In milliseconds
            });
            document.getElementById("email").focus();
            return false;
        }
    }
}
function checkRegisterUserUpdate(){
    if(document.getElementById("id_role").value=='0')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa chọn nhóm cho thành viên !',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: false, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("id_role").focus();
        return false;
    }
    if ($('#change_password').is(":checked")) {
        if(document.getElementById("password").value=='')
        {
            Lobibox.notify('warning', {
                msg: 'Bạn chưa nhập mật khẩu',
                rounded: true,
                size: 'mini',
                position: 'right bottom',
                sound: false, 
                delay: 5000,  //In milliseconds
            });
            document.getElementById("password").focus();
            return false;
        }
        if(document.getElementById("repassword").value=='')
        {
            Lobibox.notify('warning', {
                msg: 'Bạn chưa nhập lại mật khẩu',
                rounded: true,
                size: 'mini',
                position: 'right bottom',
                sound: false, 
                delay: 5000,  //In milliseconds
            });
            document.getElementById("repassword").focus();
            return false;
        }
    }
    if(document.getElementById("fullname").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập họ tên',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: false, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("fullname").focus();
        return false;
    }
    if(document.getElementById("email").value=='')
    {
        return true;
    }
    else
    {
        var email = document.getElementById("email").value;
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(filter.test(email)){
            return true;
        }else{
            Lobibox.notify('warning', {
                msg: 'Email không đúng định dạng. Vui lòng kiểm tra lại!',
                rounded: true,
                size: 'mini',
                position: 'right bottom',
                sound: true, 
                delay: 5000,  //In milliseconds
            });
            document.getElementById("email").focus();
            return false;
        }
    }
    
}
function checkKhachhang(){
    if(document.getElementById("kh_ten").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập tên khách hàng',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("kh_ten").focus();
        return false;
    }
    if(document.getElementById("kh_dienthoai").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập số điện thoại',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("kh_dienthoai").focus();
        return false;
    }
    if(document.getElementById("kh_diachi").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập địa chỉ',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("kh_diachi").focus();
        return false;
    }
    if(document.getElementById("kh_ma").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Mã khách hàng không được để trống',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("kh_ma").focus();
        return false;
    }
    if(document.getElementById("kh_email").value=='')
    {
        return true;
    }
    else
    {
        var email = document.getElementById("kh_email").value;
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(filter.test(email)){
            return true;
        }else{
            Lobibox.notify('warning', {
                msg: 'Email khách hàng không đúng định dạng. Vui lòng kiểm tra lại!',
                rounded: true,
                size: 'mini',
                position: 'right bottom',
                sound: true, 
                delay: 5000,  //In milliseconds
            });
            document.getElementById("kh_email").focus();
            return false;
        }
    }
}
function checkNganhhoc(){
    if(document.getElementById("nganhhoc_ten").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập tên ngành học',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("nganhhoc_ten").focus();
        return false;
    }
}
function checkMoiquanhe(){
    if(document.getElementById("moiqh_ten").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập tên mối quan hệ',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("moiqh_ten").focus();
        return false;
    }
}
function checkNguoiphutrach(){
    if(document.getElementById("nguoipt_ten").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập tên người phụ trách',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("nguoipt_ten").focus();
        return false;
    }
}
function checkNguonkhachhang(){
    if(document.getElementById("nguonkh_ten").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập tên nguồn khách hàng',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("nguonkh_ten").focus();
        return false;
    }
}
function checkNhomkhachhang(){
    if(document.getElementById("nhomkh_ten").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập tên nhóm khách hàng',
            rounded: true,
            size: 'mini',
            position: 'right bottom',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("nhomkh_ten").focus();
        return false;
    }
}