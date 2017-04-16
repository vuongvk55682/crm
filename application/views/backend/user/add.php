<!-- InputMask -->
<script src="public/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<div id="floatingCirclesG">
  <div class="f_circleG" id="frotateG_01"></div>
  <div class="f_circleG" id="frotateG_02"></div>
  <div class="f_circleG" id="frotateG_03"></div>
  <div class="f_circleG" id="frotateG_04"></div>
  <div class="f_circleG" id="frotateG_05"></div>
  <div class="f_circleG" id="frotateG_06"></div>
  <div class="f_circleG" id="frotateG_07"></div>
  <div class="f_circleG" id="frotateG_08"></div>
</div>
<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
				</div>
				<form onsubmit="return checkRegisterUser();" ng-app="myApp" name="myForm" id="frm-admin" method="post" action="" enctype="multipart/form-data">
					<div class="box-body">
						<div class="col-md-12">
								<?php
										$message_flashdata = $this->session->flashdata('message_flashdata');
										if(isset($message_flashdata) && count($message_flashdata)){
											if($message_flashdata['type'] == 'error'){
											?>
												<div class="success"><i class="fa fa-close"></i> <?php echo $message_flashdata['message']; ?></div> 
											<?php
											}
										}
								?>
						</div>
						<div class="form-group">
								<label class="control-label">Thuộc nhóm (*)</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-users"></i></div>
										<select class="form-control select2" name="id_role" id="id_role">
											<option value="0">Chọn nhóm</option>
											<?php if(isset($role) && !is_null($role)){ ?>
											<?php foreach ($role as $key_role => $val_role) { ?>
														<option value="<?php echo $val_role['_id'];?>"><?php echo $val_role['name'];?></option>
											<?php } ?>
											<?php } ?>
										</select>
								</div>
								<span id="error_form"><i class="fa fa-times"></i> Bạn chưa chọn nhóm người dùng</span>
						</div>
						<div class="form-group">
								<label class="control-label">Tài khoản (*)</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
										<input type="text" class="form-control" name="username" id="username">
								</div>
								<!-- <span id="error_username"><i class="fa fa-times"></i> Tài khoản không được trống</span> -->
						</div>
						<div class="form-group">
								<label class="control-label">Mật khẩu (*)</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-key"></i></div>
										<input type="password" class="form-control" name="password" id="password">
								</div>
								<!-- <span id="error_pass"><i class="fa fa-times"></i> Mật khẩu không được trống</span> -->
						</div>
						<div class="form-group">
								<label class="control-label">Nhập lại mật khẩu (*)</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-key"></i></div>
										<input type="password" class="form-control" name="repassword" id="repassword">
								</div>
								<!-- <span id="error_repass"><i class="fa fa-times"></i> Mật khẩu không được trống</span> -->
								<!-- <span id="error_chkpass"><i class="fa fa-times"></i> Mật khẩu không khớp</span> -->
						</div>
						<div class="form-group">
								<label class="radio-inline">
									<input checked="" type="radio" name="sex" id="sex" value="1"> Nam
								</label>
								<label class="radio-inline">
									<input type="radio" name="sex" id="sex" value="2"> Nữ
								</label>
						</div>
						<div class="form-group">
								<label class="control-label">Họ & tên</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-user"></i></div>
										<input type="text" class="form-control" name="fullname" id="fullname">
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
										<div id="box_img" class="div_avatar"></div>
								</div>
						</div>
						</div>
						<div class="form-group">
								<label class="control-label">Email</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
										<input type="email" class="form-control" name="email" id="email" ng-model="text">
								</div>
								<!-- <span id="error_email"><i class="fa fa-times"></i> Email không được trống</span> -->
								<!-- <span style="color:red" ng-show="myForm.email.$error.email"><i class="fa fa-times"></i> Email sai định dạng</span> -->
						</div>
						<div class="form-group">
								<label class="control-label">Ngày sinh</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-birthday-cake"></i></div>
										<input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="birthday" id="birthday_user">
								</div>
						</div>
						<div class="form-group">
								<label class="control-label">Số điện thoại</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-phone"></i></div>
										<input type="number" type="text" class="form-control" name="phone" id="phone">
								</div>
						</div>
						<div class="form-group">
								<label class="radio-inline">
									<input checked="" type="radio" name="active" id="active" value="0"> Kích hoạt
								</label>
								<label class="radio-inline">
									<input type="radio" name="active" id="active" value="1"> Không kích hoạt
								</label>
						</div>
					 
					</div><!-- /.box-body -->

					<div class="box-footer">
						<a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Lưu</a>
						<a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
						<a href="admin/user/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
					</div>
				</form>
			</div>
		</div>
</div>

<div id="check_duplicate">
</div>

<script type="text/javascript">
	$(document).ready(function() {
    $('#floatingCirclesG').hide();

    $("#birthday_user").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

		$('#username').blur(function(){
			var username 	= $('#username').val();
			var MyReg = /^[\w]+$/ ; 
			var lowerCase = new RegExp('[A-Z]');
			if (username != '') {
				if(!MyReg.test(username)) {
					return lobiboxError('Tên tài khoản phải viết liền nhau và không dấu !', 'username')
				} else {
					if (username == username.toLowerCase()) {
						if (username.length <= 30) {
							return checkDuplicateUsername();
						} else {
							return lobiboxError('Tên tài khoản không được quá 30 ký tự !', 'username')
						}
						
					} else {
						return lobiboxError('Tên tài khoản phải là chữ viết thường !', 'username')
					}
				}
			}
		});

		$('#repassword').blur(function(){
			var password = $('#password').val();
			var repassword = $('#repassword').val();

			if (repassword != '') {
				if (password != repassword) {
					return lobiboxError('Mật khẩu không khớp !', 'repassword')
				}
			}
		});

		$('#fullname').change(function(){
			return checkDuplicateFullname();
		});

		$('#email').change(function(){
			return checkDuplicateEmail();
		});

	});
  function checkDuplicateUsername(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var checkdup  = $('#username').val();
    var fieldsdup = 'username';
    var setname   = 'TÀI KHOẢN';
    $.post('admin/user/checkduplicate', { checkdup:checkdup, fieldsdup:fieldsdup, setname:setname }, function(data) {
    		$('#check_duplicate').html(data);
    		$('#launch_modal').click();
    		$('#floatingCirclesG').hide();
    });
  }
  function checkDuplicateFullname(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var checkdup  = $('#fullname').val();
    var fieldsdup = 'fullname';
    var setname   = 'Họ & Tên';
    $.post('admin/user/checkduplicate', { checkdup:checkdup, fieldsdup:fieldsdup, setname:setname }, function(data) {
      $('#check_duplicate').html(data);
      $('#launch_modal').click();
      $('#floatingCirclesG').hide();
    });
  }
  function checkDuplicateEmail(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var checkdup  = $('#email').val();
    var fieldsdup = 'email';
    var setname   = 'Email';
    $.post('admin/user/checkduplicate', { checkdup:checkdup, fieldsdup:fieldsdup, setname:setname }, function(data) {
      $('#check_duplicate').html(data);
      $('#launch_modal').click();
      $('#floatingCirclesG').hide();
    });
  }

  function lobiboxError($msg,$name_focus){
    Lobibox.notify('error', {
        msg: $msg,
        size: 'mini',
        position: 'right bottom',
        sound: false, 
        delay: 5000,
    });
    $("#"+$name_focus).focus();
    return false;
  }
</script>