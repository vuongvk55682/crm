<div class="list_register div__login clearfix">
	<form onsubmit="return check_Login();" name="myForm" id="frm" method="post" action="" enctype="multipart/form-data">
	<div class="col-md-12">
          <div class="box-body">
          	<?php echo isset($data_index['login']['content'])?$data_index['login']['content']:'';?>
          	<div class="clear" style="height:10px;"></div>
          	<div class="col-md-6">
          	<div class="row">
            <div class="form-group">
                <label class="control-label">Email (*)</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                    <input control="auth" onchange="return checkemail(this);" class="form-control" name="lg_email" id="login_email" placeholder="Nhập email của bạn">
                </div>
                <span id="error_email">(Email không được trống)</span>
                <span id="error_chkemail"> (Email không đúng định dạng)</span>
            </div>
            <div class="form-group">
                <label class="control-label">Mật khẩu (*)</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                    <input type="password" class="form-control" name="lg_password" id="login_password" placeholder="Nhập mật khẩu của bạn">
                </div>
                <span id="error_pass"> Mật khẩu không được trống</span>
            </div>
            </div>
            </div>
            <div class="col-md-1 border_or_where">
              <span>Or</span>
            </div>
            <div class="col-md-5">
                <a href="" class="btn btn-block btn-social btn-facebook">
                  <i class="fa fa-facebook"></i> Sign in with Facebook
                </a>
                <a href="<?php echo $authUrl;?>" class="btn btn-block btn-social btn-google-plus">
                  <i class="fa fa-google-plus"></i> Sign in with Google
                </a>
            </div>

          </div><!-- /.box-body -->

          <div class="box-footer">
          <div class="col-md-5">
          <div class="row">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Đăng nhập</a>
            <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
          </div>
          </div>
          <div class="col-md-6">
              <a href="quen-mat-khau.html">Quên mật khẩu</a>
          </div>
        </div>
    </div>
    </form>
</div>