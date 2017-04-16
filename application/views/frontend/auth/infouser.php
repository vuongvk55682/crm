<div class="list_register">
	<h1 class="title_main"><span><i class="fa fa-heartbeat"></i> <?php echo $title; ?></span></h1>
	<div class="clear"></div>
	<form onsubmit="return checkinfouser();" name="myForm" id="frm" method="post" action="" enctype="multipart/form-data">
	<div class="col-md-12">
          <div class="box-body">
          	<?php echo isset($data_index['register']['content'])?$data_index['register']['content']:'';?>
          	<div class="clear"></div>
          	<div class="col-md-12">
          	<div class="row">
                <?php
                    $message_flashdata = $this->session->flashdata('message_flashdata');
                    if(isset($message_flashdata) && count($message_flashdata)){
                      if($message_flashdata['type'] == 'sucess'){
                      ?>
                        <div class="success"><i class="fa fa-close"></i> <?php echo $message_flashdata['message']; ?></div> 
                      <?php
                      }
                    }
                ?>
            </div>
            </div>
          	<div class="col-md-6">
          	<div class="row">
            <div class="form-group">
                <label class="control-label">Email (*)</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                    <input control="auth" onchange="return checkemail(this);" class="form-control" name="email" id="email" value="<?php echo isset($user['email'])?$user['email']:'';?>" disabled="">
                </div>
                <span id="error_email1"></span>
                <span id="error_email">(Email không được trống)</span>
                <span id="error_chkemail"> (Email không đúng định dạng)</span>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                      <input type="checkbox" id="chk_changepass" onClick="chkChangePass();">
                      Đổi mật khẩu
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Mật khẩu (*)</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                    <input type="password" class="form-control" name="password" id="password" disabled="">
                </div>
                <span id="error_pass"> Mật khẩu không được trống</span>
            </div>
            <div class="form-group">
                <label class="control-label">Nhập lại mật khẩu (*)</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                    <input type="password" class="form-control" name="repassword" id="repassword" disabled="">
                </div>
                <span id="error_repass"> Mật khẩu không được trống</span>
                <span id="error_chkpass"> Mật khẩu không khớp</span>
            </div>
            <div class="form-group">
                <label class="radio-inline">
                  <input <?php if($user['sex'] == 0){ ?> checked="" <?php } ?> type="radio" name="sex" id="sex" value="0"> Nam
                </label>
                <label class="radio-inline">
                  <input <?php if($user['sex'] == 1){ ?> checked="" <?php } ?> type="radio" name="sex" id="sex" value="1"> Nữ
                </label>
            </div>
            <div class="form-group">
                <label class="control-label">Họ & tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo isset($user['fullname'])?$user['fullname']:'';?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Hình ảnh đại diện</label>
                <span class="btn btn-primary btn-file btn-sm">
                    Browse <input type="file" name="avatar" id="image">
                </span>
            </div>
            <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                    <div id="box_img" class="div_avatar">
                        <?php if($user['avatar_thumb']!=''){ ?>
                            <img src="upload/user/thumb/<?php echo $user['avatar_thumb'];?>" alt="" class="image_admin">
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label class="control-label">Ngày sinh</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-birthday-cake"></i></div>
                    <input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo isset($user['birthday'])?$user['birthday']:'';?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Số điện thoại</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                    <input type="number" type="text" class="form-control" name="phone" id="phone" value="<?php echo isset($user['phone'])?$user['phone']:'';?>">
                </div>
            </div>
            <div class="g-recaptcha" data-sitekey="6LcrjyETAAAAAG3jm8w7Cy_bdyOcG7G2b259kX6M"></div>
            </div>
            </div>

          </div><!-- /.box-body -->

          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
        </div>
    </div>
    </form>
</div>