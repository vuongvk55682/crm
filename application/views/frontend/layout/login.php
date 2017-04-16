<?php
	//Login Google
	if($data_index['act'] != 'login'){
		require APPPATH .'third_party/Google/Google_Client.php';
		require APPPATH .'third_party/Google/contrib/Google_Oauth2Service.php';
		######### edit details ##########
		$clientId = '951324346783-mdd8oha6c6ad70hffgfgos9dfiou4vn1.apps.googleusercontent.com';
		$clientSecret = 'a6G6qTiU6yy8iOGLLPOcPCmP';
		$redirectUrl = 'http://giay3v.com/auth/logingoogle';
		$homeUrl = 'http://giay3v.com/';
		##################################

		$gClient = new Google_Client();
		$gClient->setApplicationName('Login to codexworld.com');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectUrl);

		$google_oauthV2 = new Google_Oauth2Service($gClient);
		$authUrl = $gClient->createAuthUrl();
	}
?>
<div class="login">
<?php if($this->CI_auth->check_logged_user() == ''){ ?>

	<a class="a_login"><i class="fa fa-unlock-alt" aria-hidden="true"></i><strong> Đăng nhập</strong>
	<br/><p>Tài khoản & đơn hàng</p>
	</a>
	<i class="fa fa-caret-down" aria-hidden="true"></i>
	<div class="user-name-box user-ajax-box">
		<ul class="user-ajax-guest">
			<li id="login_link"><a data-toggle="modal" data-target="#myLogin" title="Đăng Nhập" class="user-name-login"><i class="fa fa-sign-in"></i>Đăng nhập</a></li>
			
			<li class="user-name-register"><a data-toggle="modal" data-target="#myRegis" title="Tạo tài khoản mới"><i class="fa fa-user"></i><span>Tạo tài khoản</span></a></li>
			
		</ul>
	</div>
<?php }else{ ?>
	<a class="a_login"><i class="fa fa-unlock-alt" aria-hidden="true"></i><strong> <?php echo $data_index['info_user']['fullname'];?></strong>
	<br/><p>Tài khoản & đơn hàng</p>
	</a>
	<i class="fa fa-caret-down" aria-hidden="true"></i>
	<div class="user-name-box user-ajax-box">
		<ul class="user-ajax-guest">
			<li><a href="thong-tin-don-hang.html" title="Thoát">Đơn hàng của tôi</a></li>
			<li><a href="don-hang.html" title="Thoát">Thông báo của tôi</a></li>
			<li><a href="thong-tin-chung.html" title="Thoát">Tài khoản của tôi</a></li>
			<li><a href="de-danh-mua-sau.html" title="Thoát">Để dành mua sau</a></li>
			<li><a href="danh-sach-san-pham-yeu-thich.html" title="Thoát">Danh sách yêu thích</a></li>
			<li><a href="san-pham-danh-gia.html" title="Thoát">Đánh giá của tôi</a></li>
			<li><a href="danh-sach-danh-gia.html" title="Thoát">Thông tin Tiki xu</a></li>
			<li><a href="thoat.html" title="Thoát">Thoát</a></li>
		</ul>
	</div>
<?php } ?>
</div>

<div class="modal fade" id="myRegis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<form onsubmit="return checkregister();" action="dang-ky.html" method="post" id="frm_regis">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h5 class="modal-title" id="myModalLabel">Đăng ký tài khoản</h5>
		        Bạn đã có tài khoản? <a data-toggle="modal" data-target="#myLogin" data-dismiss="modal">Đăng nhập</a>
		        <div id="div_error"></div>
		      	</div>

		      	<div class="modal-body clearfix">
			      	<div class="col-md-12 col-sm-12 col-xs-12">
			        	<div class="form-group">
			                <div class="input-group">
			                    <div class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
			                    <input onchange="checkMail(this,'ci_user','#regis_email','#div_error','.btn_regis');" type="text" class="form-control" name="regis_email" id="regis_email" placeholder="Nhập email..">
			                </div>
			            </div>
			            <div class="form-group">
			                <div class="input-group">
			                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
			                    <input type="password" class="form-control" name="regis_password" id="regis_password" placeholder="Nhập mật khẩu..">
			                </div>
			            </div>
			            <div class="form-group">
			                
			                <div class="input-group">
			                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
			                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:'';?>" placeholder="Nhập họ và tên">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="radio-inline">
			                  <input checked="" type="radio" name="sex" id="sex" value="0"> Nam
			                </label>
			                <label class="radio-inline">
			                  <input type="radio" name="sex" id="sex" value="1"> Nữ
			                </label>
			            </div>
			            <div class="form-group">
			                
			                <div class="input-group">
			                    <div class="input-group-addon"><i class="fa fa-birthday-cake"></i></div>
			                    <input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo isset($_POST['birthday'])?$_POST['birthday']:'';?>" placeholder="Nhập ngày sinh">
			                </div>
			            </div>
			            <?php /*<div class="g-recaptcha" data-sitekey="6LcrjyETAAAAAG3jm8w7Cy_bdyOcG7G2b259kX6M"></div> */?>
			            <div class="clear" style="height:10px;"></div>
			            <?php echo isset($data_index['register']['content'])?$data_index['register']['content']:'';?>
			      	</div>
		      	</div>
		      	<div class="modal-footer">
		      		<div class="col-md-4">
		      			
		      		</div>
		      		<div class="col-md-8">
		      			<div class="row">
		      				<button data-dismiss="modal" class="btn btn-info"><i class="fa fa-times"></i> Đóng</button>
		        			<button type="button" class="btn btn-info btn_regis"><i class="fa fa-unlock-alt"></i> Đăng ký</button>
		      			</div>
		      		</div>
		      </div>
	    </div>
	</form>
	</div>
</div>

<div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<form onsubmit="return checklogin();" action="dang-nhap.html" method="post" id="frm_login">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h5 class="modal-title" id="myModalLabel">Đăng nhập tài khoản</h5>
		        Bạn chưa có tài khoản? <a data-toggle="modal" data-target="#myRegis" data-dismiss="modal">Đăng ký</a>
		        <div id="div_error_login"></div>
		      	</div>
		      	<div class="modal-body clearfix">
		        	<div class="form-group">
		                <div class="input-group">
		                    <div class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
		                    <input type="text" class="form-control" name="lg_email" id="lg_email" placeholder="Nhập email..">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="input-group">
		                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
		                    <input type="text" class="form-control" name="lg_password" id="lg_password" placeholder="Nhập mật khẩu..">
		                </div>
		            </div>
		            <div class="clear"></div>
		            <div class="forgetpass">Quên mật khẩu? Nhấn vào <a href="">đây</a></div>
		            
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-info btn-block btn_login"><i class="fa fa-unlock-alt"></i> Đăng nhập</button>
		        	<div class="clear" style="height:10px;"></div>
		      </div>
	    </div>
	</form>
	</div>
</div>