function checkpay()
{
    if(document.getElementById("fullname").value=='')
    {
        document.getElementById("error_fullname").style.display = "block";
        document.getElementById("fullname").focus();
        return false;
    }
    else if(document.getElementById("phone").value=="")
    {
        document.getElementById("error_phone").style.display = "block";
        document.getElementById("phone").focus();
        return false;
    }
    else if(document.getElementById("email").value=='')
    {
        document.getElementById("error_email").style.display = "block";
        document.getElementById("email").focus();
        return false;
    }
    else{
        return true;
    }
}
function checkorder()
{
    if(document.getElementById("code").value=='')
    {
        document.getElementById("div_error").style.display = "block";
        document.getElementById("div_error").innerHTML = "Mã đơn hàng hoặc số điện không được để trống.Quý khách vui lòng kiểm tra lại!";
        document.getElementById("code").focus();
        return false;
    }
    else if(document.getElementById("phone").value=="")
    {
        document.getElementById("div_error").style.display = "block";
        document.getElementById("div_error").innerHTML = "Mã đơn hàng hoặc số điện không được để trống.Quý khách vui lòng kiểm tra lại!";
        document.getElementById("phone").focus();
        return false;
    }
    else{
        return true;
    }
}
function checksentmail_f()
{
    if(document.getElementById("mail").value=='')
    {
        alert('Vui lòng nhập mail của bạn!');
        document.getElementById("mail").focus();
        return false;
    }
    else{
        var email = document.getElementById("mail").value;
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(filter.test(email)){
            $('#clkmyMail').click();
        }else{
            alert('Email không đúng định dạng. Vui lòng kiểm tra lại!');
        }
    }
}
function checkregister()
{
    if(document.getElementById("regis_email").value=='')
    {
        document.getElementById("div_error").style.display = "block";
        document.getElementById("div_error").innerHTML = "Vui lòng nhập email của bạn!";
        document.getElementById("regis_email").focus();
        return false;
    }
    else if(document.getElementById("regis_password").value=="")
    {
        document.getElementById("div_error").style.display = "block";
        document.getElementById("div_error").innerHTML = "Vui lòng nhập mật khẩu!";
        document.getElementById("regis_password").focus();
        return false;
    }
    else if(document.getElementById("fullname").value=="")
    {
        document.getElementById("div_error").style.display = "block";
        document.getElementById("div_error").innerHTML = "Vui lòng nhập họ và tên đầy đủ!";
        document.getElementById("fullname").focus();
        return false;
    }
    else if(document.getElementById("birthday").value=="")
    {
        document.getElementById("div_error").style.display = "block";
        document.getElementById("div_error").innerHTML = "Vui lòng nhập ngày sinh!";
        document.getElementById("birthday").focus();
        return false;
    }
    else{
        var email = document.getElementById("regis_email").value;
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(filter.test(email)){
            return true;
        }else{
            document.getElementById("div_error").style.display = "block";
            document.getElementById("div_error").innerHTML = "Email không đúng định dạng. Vui lòng kiểm tra lại!";
            document.getElementById("regis_email").focus();
            return false;
        }    
    }
}
function checkAddAddress()
{
    if(document.getElementById("add_fullname").value=="")
    {
        document.getElementById("div_error_addaddress").style.display = "block";
        document.getElementById("div_error_addaddress").innerHTML = "Vui lòng nhập họ và tên đầy đủ!";
        document.getElementById("add_fullname").focus();
        return false;
    }
    
    else if(document.getElementById("add_cityid").value=="")
    {
        document.getElementById("div_error_addaddress").style.display = "block";
        document.getElementById("div_error_addaddress").innerHTML = "Vui lòng chọn tỉnh/thành!";
        document.getElementById("add_cityid").focus();
        return false;
    }
    else if(document.getElementById("add_districtid").value=="")
    {
        document.getElementById("div_error_addaddress").style.display = "block";
        document.getElementById("div_error_addaddress").innerHTML = "Vui lòng chọn quận/huyện!";
        document.getElementById("add_districtid").focus();
        return false;
    }else if(document.getElementById("add_wardid").value=="")
    {
        document.getElementById("div_error_addaddress").style.display = "block";
        document.getElementById("div_error_addaddress").innerHTML = "Vui lòng chọn phường xã!";
        document.getElementById("add_wardid").focus();
        return false;
    }
    else{
        return true;  
    }
}
function checkemail(email){
    var email = email.value;
    var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(filter.test(email)){
        document.getElementById("error_chkemail").style.display = "none";

    }else{
        document.getElementById("error_chkemail").style.display = "block";
        document.getElementById("email").focus();
    }

    
    if(email != '')  
    {
        $.ajax
        ({
            method: "POST",
            url: "auth/checkemail",
            data: { email:email},
            dataType: "json",
            success: function (res) { 
                if(res)
                {
                    if(res.date_result == 0){
                        $('#error_email1').css('display','block');
                        $('#error_email1').html('(Email đã tồn tại.Vui lòng nhập email khác!!)');
                    }else{
                        $('#error_email1').css('display','none');
                    }
                }
            }
        });
    }
}
function chkChangePass(){
    $('#password').prop('disabled', false);
    $('#repassword').prop('disabled', false);
}
function checkinfouser()
{
    if(document.getElementById("email").value=='')
    {
        document.getElementById("error_email").style.display = "block";
        document.getElementById("email").focus();
        return false;
    }
    else if($('#chk_changepass').attr('checked')) {
        if(document.getElementById("password").value=="")
        {
            document.getElementById("error_pass").style.display = "block";
            document.getElementById("password").focus();
            return false;
        }
        if(document.getElementById("repassword").value=="")
        {
            document.getElementById("error_repass").style.display = "block";
            document.getElementById("repassword").focus();
            return false;
        }
        if(document.getElementById("password").value!=document.getElementById("repassword").value)
        {
            document.getElementById("error_chkpass").style.display = "block";
            document.getElementById("repassword").focus();
            return false;
        }
    }
    else{
        return true;
    }
}
function checklogin()
{
    if(document.getElementById("lg_email").value=='')
    {
        document.getElementById("div_error_login").style.display = "block";
        document.getElementById("div_error_login").innerHTML = "Vui lòng nhập mail của bạn!";
        document.getElementById("lg_email").focus();
        return false;
    }
    else if(document.getElementById("lg_password").value=="")
    {
        document.getElementById("div_error_login").style.display = "block";
        document.getElementById("div_error_login").innerHTML = "Vui lòng nhập mật khẩu của bạn!";
        document.getElementById("lg_password").focus();
        return false;
    }
    else{
        var email = document.getElementById("lg_email").value;
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(filter.test(email)){
            return true;
        }else{
            document.getElementById("div_error_login").style.display = "block";
            document.getElementById("div_error_login").innerHTML = "Email không đúng định dạng. Vui lòng kiểm tra lại!";
            document.getElementById("lg_email").focus();
            return false;
        }       
    }
}
function check_Login()
{
    if(document.getElementById("login_email").value=='')
    {
        document.getElementById("div_error_login").style.display = "block";
        document.getElementById("div_error_login").innerHTML = "Vui lòng nhập mail của bạn!";
        document.getElementById("login_email").focus();
        return false;
    }
    else if(document.getElementById("login_password").value=="")
    {
        document.getElementById("div_error_login").style.display = "block";
        document.getElementById("div_error_login").innerHTML = "Vui lòng nhập mật khẩu của bạn!";
        document.getElementById("login_password").focus();
        return false;
    }
    else{
        var email = document.getElementById("login_email").value;
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(filter.test(email)){
            return true;
        }else{
            document.getElementById("div_error_login").style.display = "block";
            document.getElementById("div_error_login").innerHTML = "Email không đúng định dạng. Vui lòng kiểm tra lại!";
            document.getElementById("lg_email").focus();
            return false;
        }       
    }
}
function checkcomment()
{
    if(document.getElementById("review_title").value=='')
    {
        document.getElementById("div_error_cmmt").style.display = "block";
        document.getElementById("div_error_cmmt").innerHTML = "Vui lòng nhập tiêu đề của bạn!";
        document.getElementById("review_title").focus();
        return false;
    }
    else if(document.getElementById("review_detail").value=="")
    {
        document.getElementById("div_error_cmmt").style.display = "block";
        document.getElementById("div_error_cmmt").innerHTML = "Vui lòng nhập nội dung của bạn!";
        document.getElementById("review_detail").focus();
        return false;
    }
    else{
        return true;     
    }
}
function checkaddress()
{
    if(document.getElementById("phone").value=='')
    {
        document.getElementById("div_error_address").style.display = "block";
        document.getElementById("div_error_address").innerHTML = "Vui lòng nhập số điện thoại của bạn!";
        document.getElementById("phone").focus();
        return false;
    }
    else if(document.getElementById("cityid").value=="")
    {
        document.getElementById("div_error_address").style.display = "block";
        document.getElementById("div_error_address").innerHTML = "Vui lòng chọn tỉnh/thành!";
        document.getElementById("cityid").focus();
        return false;
    }
    else if(document.getElementById("districtid").value=="")
    {
        document.getElementById("div_error_address").style.display = "block";
        document.getElementById("div_error_address").innerHTML = "Vui lòng chọn quận/huyện!";
        document.getElementById("districtid").focus();
        return false;
    }
    else if(document.getElementById("wardid").value=="")
    {
        document.getElementById("div_error_address").style.display = "block";
        document.getElementById("div_error_address").innerHTML = "Vui lòng chọn phường/xã!";
        document.getElementById("wardid").focus();
        return false;
    }
    else if(document.getElementById("address").value=="")
    {
        document.getElementById("div_error_address").style.display = "block";
        document.getElementById("div_error_address").innerHTML = "Vui lòng nhập địa chỉ!";
        document.getElementById("address").focus();
        return false;
    }
    else{
        return true; 
    }
}
function checksentmail()
{
    if(document.getElementById("mce_email").value=='')
    {
        document.getElementById("div_error_sentmail").style.display = "block";
        document.getElementById("div_error_sentmail").innerHTML = "Vui lòng nhập email của bạn!";
        document.getElementById("mce_email").focus();
        return false;
    }
    else{
        var email = document.getElementById("mce_email").value;
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(filter.test(email)){
            return true;
        }else{
            document.getElementById("div_error_sentmail").style.display = "block";
            document.getElementById("div_error_sentmail").innerHTML = "Email không đúng định dạng. Vui lòng kiểm tra lại!";
            document.getElementById("mce_email").focus();
            return false;
        }
        
    }
}
function checkCheckOrder(){
    if(document.getElementById("order_email").value=='')
    {
        document.getElementById("div_error_order").style.display = "block";
        document.getElementById("div_error_order").innerHTML = "Vui lòng nhập email của bạn!";
        document.getElementById("order_email").focus();
        return false;
    }
    else if(document.getElementById("order_code").value=="")
    {
        document.getElementById("div_error_order").style.display = "block";
        document.getElementById("div_error_order").innerHTML = "Vui lòng nhập mã đơn hàng!";
        document.getElementById("order_code").focus();
        return false;
    }
    else{
        return true; 
    }
}
function checkcontact()
{
    if(document.getElementById("c_fullname").value=='')
    {
        document.getElementById("div_error_contact").style.display = "block";
        document.getElementById("div_error_contact").innerHTML = "You did not enter fullname!";
        document.getElementById("c_fullname").focus();
        return false;
    }
    else if(document.getElementById("c_phone").value=="")
    {
        document.getElementById("div_error_contact").style.display = "block";
        document.getElementById("div_error_contact").innerHTML = "You did not enter phone number!";
        document.getElementById("c_phone").focus();
        return false;
    }
    else if(document.getElementById("c_email").value=='')
    {
        document.getElementById("div_error_contact").style.display = "block";
        document.getElementById("div_error_contact").innerHTML = "You did not enter email!";
        document.getElementById("c_email").focus();
        return false;
    }
    else{
        alert('Submitted successfully. Thank you!');
        return true;
    }
}

function checkreorder()
{
    if(document.getElementById("username").value=='')
    {
        document.getElementById("div_error_reorder").style.display = "block";
        document.getElementById("div_error_reorder").innerHTML = "You did not enter username!";
        document.getElementById("username").focus();
        return false;
    }
    else if(document.getElementById("phone").value=="")
    {
        document.getElementById("div_error_reorder").style.display = "block";
        document.getElementById("div_error_reorder").innerHTML = "You did not enter phone!";
        document.getElementById("phone").focus();
        return false;
    }
    else if(document.getElementById("email").value=="")
    {
        document.getElementById("div_error_reorder").style.display = "block";
        document.getElementById("div_error_reorder").innerHTML = "You did not enter email!";
        document.getElementById("email").focus();
        return false;
    }
    else if(document.getElementById("date").value=='')
    {
        document.getElementById("div_error_reorder").style.display = "block";
        document.getElementById("div_error_reorder").innerHTML = "You did not enter date!";
        document.getElementById("date").focus();
        return false;
    }
    else if(document.getElementById("time").value=='')
    {
        document.getElementById("div_error_reorder").style.display = "block";
        document.getElementById("div_error_reorder").innerHTML = "You did not enter time!";
        document.getElementById("time").focus();
        return false;
    }
    else if(document.getElementById("content").value=='')
    {
        document.getElementById("div_error_reorder").style.display = "block";
        document.getElementById("div_error_reorder").innerHTML = "You did not enter content!";
        document.getElementById("content").focus();
        return false;
    }
    else{
        alert('Submitted successfully. Thank you!');
        return true;
    }
}
function checkdatphong()
{
    if(document.getElementById("ngaynhan").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa chọn ngày nhận phòng',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("ngaynhan").focus();
        return false;
    }
    else if(document.getElementById("ngaytra").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa chọn ngày trả phòng',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("ngaytra").focus();
        return false;
    }
    else if(document.getElementById("nguoilon").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa chọn số người lớn',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("nguoilon").focus();
        return false;
    }
    else{
        return true; 
    }
}
function checkbooking()
{
    if(document.getElementById("ngaynhan").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa chọn ngày nhận phòng',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("ngaynhan").focus();
        return false;
    }
    else if(document.getElementById("ngaytra").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa chọn ngày trả phòng',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("ngaytra").focus();
        return false;
    }
    else if(document.getElementById("nguoilon").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa chọn số người lớn',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("nguoilon").focus();
        return false;
    }
    else if(document.getElementById("fullname").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập họ & tên',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("fullname").focus();
        return false;
    }
    else if(document.getElementById("phone").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập số điện thoại',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("phone").focus();
        return false;
    }
    else if(document.getElementById("e-mail").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập email',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("e-mail").focus();
        return false;
    }
    else if(document.getElementById("address").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập địa chỉ',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("address").focus();
        return false;
    }
    else if(document.getElementById("request").value=='')
    {
        Lobibox.notify('warning', {
            msg: 'Bạn chưa nhập yêu cầu',
            size: 'mini',
            position: 'right top',
            sound: true, 
            delay: 5000,  //In milliseconds
        });
        document.getElementById("request").focus();
        return false;
    }
    else{
        return true; 
    }
}
