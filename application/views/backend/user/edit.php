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
        <form ng-app="myApp" id="frm-admin" onsubmit="return checkRegisterUserUpdate();" method="post" action="" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
                <label class="control-label">Thuộc nhóm</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                    <select class="form-control select2" name="id_role" id="id_role">
                      <option value="0">Chọn nhóm</option>
                      <?php if(isset($role) && !is_null($role)){ ?>
                      <?php foreach ($role as $key_role => $val_role) { ?>
                            <option value="<?php echo $val_role['_id'];?>" <?php if($val_role['_id'] == $user['id_role']){ ?> selected <?php } ?>><?php echo $val_role['name'];?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Tài khoản</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
                    <input type="text" class="form-control" name="username" id="username" value="<?php if(isset($user['username']) && $user['username']!=''){ echo $user['username']; }?>" disabled="">
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                      <input type="checkbox" id="change_password" name="change_password">
                      Đổi mật khẩu
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Mật khẩu</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                    <input type="password" class="form-control" name="password" id="password" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Nhập lại mật khẩu</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                    <input type="password" class="form-control" name="repassword" id="repassword" disabled>
                </div>
            </div>
            </div>
            <div class="form-group">
                <?php if($user['sex'] == 0){ ?>
                    <label class="radio-inline">
                      <input checked="" type="radio" name="sex" id="sex" value="0"> Nam
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="sex" id="sex" value="2"> Nữ
                    </label>
                <?php }else{ ?>
                    <label class="radio-inline">
                      <input type="radio" name="sex" id="sex" value="1"> Nam
                    </label>
                    <label class="radio-inline">
                      <input checked="" type="radio" name="sex" id="sex" value="1"> Nữ
                    </label>
                <?php } ?>
            </div>
            <div class="form-group">
                <label class="control-label">Họ & tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php if(isset($user['fullname']) && $user['fullname']!=''){ echo $user['fullname']; }?>">
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
                <label class="control-label">Email</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                    <input type="text" class="form-control" name="email" id="email" value="<?php if(isset($user['email']) && $user['email']!=''){ echo $user['email']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Ngày sinh</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-birthday-cake"></i></div>
                    <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="birthday" id="birthday_user" value="<?php if (isset($user['birthday']) && $user['birthday'] != '0') {$date1 = date('d/m/Y', $user['birthday']->sec); echo $date1; } else {echo ""; } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Số điện thoại</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php if(isset($user['phone']) && $user['phone']!=''){ echo $user['phone']; }?>">
                </div>
            </div>
            <div class="form-group">
                <?php if($user['active'] == 0){ ?>
                    <label class="radio-inline">
                      <input checked="" type="radio" name="active" id="active" value="0"> Kích hoạt
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="active" id="active" value="1"> Không kích hoạt
                    </label>
                <?php }else{ ?>
                    <label class="radio-inline">
                      <input type="radio" name="active" id="active" value="0"> Kích hoạt
                    </label>
                    <label class="radio-inline">
                      <input checked="" type="radio" name="active" id="active" value="1"> Không kích hoạt
                    </label>
                <?php } ?> 
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/user/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
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
    $('#change_password').click(function(){
      if ($('#change_password').is(":checked")) {
        $('#password').removeAttr('disabled');
        $('#repassword').removeAttr('disabled');
      }else{

        $('#password').attr('disabled', '');
        $('#password').val('');
        $('#repassword').attr('disabled', '');
        $('#repassword').val('');
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