<link href="public/bootstrap/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<link href="public/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>

<script src="public/bootstrap/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script src="public/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>

<!-- Select2 -->
<link href="public/select2/select2.min.css" rel="stylesheet" type="text/css" />
<script src="public/select2/select2.full.min.js" type="text/javascript"></script>
<style type="text/css" media="screen">
	.hvr-round-corners {
	  display: inline-block;
	  vertical-align: middle;
	  -webkit-transform: perspective(1px) translateZ(0);
	  transform: perspective(1px) translateZ(0);
	  box-shadow: 0 0 1px transparent;
	  -webkit-transition-duration: 0.3s;
	  transition-duration: 0.3s;
	  -webkit-transition-property: border-radius;
	  transition-property: border-radius;
	  border-radius: 100%;
	}
	.hvr-round-corners:hover, .hvr-round-corners:focus, .hvr-round-corners:active {
	  border-radius: 0;
	}
	.box-header h3, .box-header .tool {
		display: inline-block;
		margin-left: 5px;
	}
	.box-header .tool a {
		cursor: pointer;
	}
	.box-header .tool i{
		font-size: 18px;
	}
	.hvr-bubble-top {
	  display: inline-block;
	  vertical-align: middle;
	  -webkit-transform: perspective(1px) translateZ(0);
	  transform: perspective(1px) translateZ(0);
	  box-shadow: 0 0 1px transparent;
	  position: relative;
	}
	.hvr-bubble-top:before {
	  pointer-events: none;
	  position: absolute;
	  z-index: -1;
	  content: '';
	  border-style: solid;
	  -webkit-transition-duration: 0.3s;
	  transition-duration: 0.3s;
	  -webkit-transition-property: transform;
	  transition-property: transform;
	  left: calc(50% - 10px);
	  top: 0;
	  border-width: 0 10px 10px 10px;
	  border-color: transparent transparent #e1e1e1 transparent;
	}
	.hvr-bubble-top:hover:before, .hvr-bubble-top:focus:before, .hvr-bubble-top:active:before {
	  -webkit-transform: translateY(-10px);
	  transform: translateY(-10px);
	}
	#info_kh #moi_quan_he, #info_kh #percent_complete, #info_kh #lien_he, #info_kh #thong_tin_kh {
		border: 1px solid #D0D0D0;
		padding-top: 1em;
	}
	#info_kh #moi_quan_he label, #info_kh #percent_complete label, #info_kh #lien_he label, #info_kh #thong_tin_kh label {
		margin-bottom: 1em;
		font-family: 'Source', 'Sans', 'Pro',sans-serif;
		text-transform: uppercase;
		font-size: 15px;
		font-weight: bold;
	}
	#info_kh #percent_complete, #info_kh #lien_he, #info_kh #thong_tin_kh {
		margin-top: 1em;
	}
	#info_kh #lien_he p {
		font-size: 14px;
		font-weight: bold;
		color: #0b6aaf;
	}
	#info_kh #thong_tin_kh p {
		font-size: 14px;
	}
	#info_kh #thong_tin_kh strong {
		font-size: 14px;
		color: #000;
	}
	#info_kh #content_hide {
		text-align: right;
	}
	#info_kh #collapseContent {
		text-align: left;
	}
	#info_tab .nav-tabs .active {
		font-weight: bold;
		border-top: 2px solid #4C8FBD;
		box-shadow: 0 -3px 7px #E4E4E4;
	}
	#info_tab .nav-tabs>li {
		background-color: #F5F5F5;
		border: 1px solid #D0D0D0;
		border-bottom-width: 0px !important;
		border-left-width: 0px;
	}
	#info_tab .nav-tabs>li:first-child {
		border-left-width: 1px !important;
	}
	#info_tab .nav-tabs>li:hover {
		border-top: 2px solid #4C8FBD;
	}
	#info_tab .nav-tabs>li>a:hover {
		background-color: #FFF !important;
	}
	#info_tab .nav-tabs>li>a {
		color: #333;
		border: 0 !important;
		border-radius: 0 !important;
		margin-right: 0px !important;
	}
	.bold {
		font-weight: bold;
	}
	.blue {
		color: #0B6AAF;
	}
	.gray {
		color: #B3AFAF;
	}
	#info_tab #trade_kh {
		overflow: auto;
		position: relative;
		border: 1px solid #D0D0D0;
		border-top-width: 0px !important;
		padding-top: 1em;
		padding-left: 1em;
		padding-right: 1em;
	}
	#info_tab #trade_kh .box {
		box-shadow: 0 0 7px #E4E4E4;
		border: 1px solid #D0D0D0;
	}
	#info_tab #trade_kh .box_footer {
		background-color: #e7e7e7;
		line-height: 45px;
		height: 45px;
		padding: 0px 1em;
	}
	#info_tab #trade_kh .box_footer .footer_send {
		float: right;
	}
	#info_tab #trade_kh .box_footer .footer_attch {
		display: inline-block;
	}
	#info_tab #trade_kh .box_footer .footer_attch a {
		color: #959595;
		font-size: 20px;
	}
	#info_tab #trade_kh .box_footer .footer_attch a:hover {
		color: #000;
	}
	#info_tab #trade_kh .box_footer .footer_attch a:last-child {
		margin-left: 0.8em;
	}
	#info_tab #trade_kh .info_log {
		padding-top: 1em;
		padding-bottom: 1em;
		border-top: 1px solid #D0D0D0;
	}
	
	#info_tab #trade_kh .info_log .content_log {
		margin-top: 5px;
		font-size: 14px;
	}
	#info_tab #trade_kh .info_log .tool_log {
		text-align: center;
	}
	#info_tab #trade_kh .info_log .tool_log i {
		color: #FFF;
	}
	#info_tab #trade_kh .info_log:hover .tool_log i {
		color: #000;
	}
	
	
</style>

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
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<div class="col-md-6">
					<?php if (isset($khachhang['kh_anh_thumb']) && $khachhang['kh_anh_thumb'] != '') { $_kh_anh_thumb = $khachhang['kh_anh_thumb']; } else { $_kh_anh_thumb = 'noavatar.png'; } ?>
					<img class="hvr-round-corners" src="upload/khachhang/thumb/<?php echo $_kh_anh_thumb; ?>" alt="">
					<h3 ><?php echo isset($khachhang['kh_ten'])? $khachhang['kh_ten']: ''; ?></h3>
					<div class="tool">
						<a href="admin/khachhang/edit/<?php echo $khachhang['_id']?>/details" data-toggle="tooltip" data-placement="bottom" title="Sửa"><i class="fa fa-edit"></i></a>
						<a control="khachhang" data-toggle="tooltip" data-placement="bottom" title="Xóa"><i class="fa fa-trash"></i></a>
					</div>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-2">
					<div class="row">
						<div id="info_kh">
							<div id="moi_quan_he" class="col-md-12">
								<div class="form-group">
								  <label class="control-label">
								    Mối quan hệ
								  </label>
								  <div class="input-group">
								    <div class="input-group-addon">
								      <i class="fa fa-tags" aria-hidden="true"></i>
								    </div>
								    <select class="form-control" name="gt_moiqh" id="gt_moiqh">
								      <option value="0">Chọn mối quan hệ</option>
								      <?php if (isset($moiqh) && $moiqh != NULL) { ?>
								        <?php foreach ($moiqh as $key => $val) { ?>
								          <option value="<?php echo $val['_id'] ?>"
								          <?php if ($val['_id'] == $khachhang['gt_moiqh']) { ?>
								            selected
								          <?php } ?>
								          ><?php echo $val['moiqh_ten'] ?></option>
								        <?php } ?>
								      <?php } ?>
								    </select>
								  </div>
								</div>
							</div>
							<div class="clear"></div>
							<div id="percent_complete" class="col-md-12">
								<label class="control-label">
									Độ hoàn thiện hồ sơ
								</label>
								<a href="admin/khachhang/edit/<?php echo $khachhang['_id']?>">
									<div class="progress">
									  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="5" aria-valuemax="100" style="width:40%">
									    40%
									  </div>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div id="lien_he" class="col-md-12">
								<label class="control-label">
									Liên hệ
								</label>
								<?php $i = 0 ?>
								<?php if (isset($lienhe) && $lienhe != NULL) { ?>
									<?php foreach ($lienhe as $key => $val) { 
										$i++;
										($val['lh_lienhechinh'] == $i)? $lienhechinh = 1:$lienhechinh = 2;
										($val['lh_vitri'] != '')? $lh_vitri = $val['lh_vitri']:$lh_vitri = NULL;
										($val['lh_email'] != '')? $lh_email = $val['lh_email']:$lh_email = NULL;
									?>
										<div>
											<p>
												<i style="color: #737373;" class="fa fa-user" aria-hidden="true"></i>
												<?=$val['lh_ten']?>
												<?php if ($lienhechinh == 1) { ?>
													<i style="color: #f68e42;" class="fa fa-star" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Liên hệ chính"></i>
												<?php } ?>
											</p>
											<?php if ($lh_vitri != NULL) { ?>
												( <?=$lh_vitri?> )
											<?php } ?>
											<p>
												<i style="color: #0b6aaf;" class="fa fa-phone" aria-hidden="true"></i>
												<?=$val['lh_dienthoai']?>
											</p>
											<?php if ($lh_email != NULL) { ?>
												<?=$lh_email?>
											<?php } ?>
										</div>
									<?php } ?>
								<?php } ?>
							</div>
							<div class="clear"></div>
							<div id="thong_tin_kh" class="col-md-12">
								<label class="control-label">
									Thông tin
								</label>
								<?php 
									$no_update = 'Chưa cập nhật'; 
									if (isset($khachhang['kh_sinhnhat']) && $khachhang['kh_sinhnhat'] != '0') {$date1 =  date('d/m/Y', $khachhang['kh_sinhnhat']->sec); } else { $date1 = ''; }
								?>
								<div>
									<p>
										Điện thoại: <strong style="color: #0b6aaf"><?php echo isset($khachhang['kh_dienthoai'])? $khachhang['kh_dienthoai']: $no_update; ?></strong>
									</p>
									<p> Địa chỉ: <strong><?php echo ($khachhang['kh_diachi'] != '')? $khachhang['kh_diachi']: $no_update; ?></strong> </p>
									<p> Email: <strong><?php echo ($khachhang['kh_email'] != '')? $khachhang['kh_email']: $no_update; ?></strong> </p>
									<p>
										Nguồn KH: 
										<strong>
											<?php if (isset($nguonkh) && $nguonkh != NULL) { ?>
											  <?php $nguonkh_str = ''; ?>
											  <?php foreach ($nguonkh as $key1 => $val1) { ?>
											    <?php foreach ($khachhang_nguonkh as $key2 => $val2) { ?>
											      <?php if ($val2['id_nguonkhachhang'] == $val1['_id'] && $val2['id_khachhang'] == $khachhang['_id']) {
											        $nguonkh_str .= $val1['nguonkh_ten'].", ";
											      } ?>
											    <?php } ?>
											  <?php } ?>
											  <?php echo ($nguonkh_str != '')? substr($nguonkh_str,0,-2):$no_update; ?>
											<?php } ?>
										</strong>
									</p>
									<p>
										Sinh nhật: <strong><?php echo ($date1 != '')? $date1: $no_update; ?></strong>
									</p>
									<p>
										Mô tả: <strong><?php echo ($khachhang['kh_mota'] != '')? $khachhang['kh_mota']: $no_update; ?></strong>
									</p>

									<div id="content_hide">
										<a id="show_more" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent">
										  Xem thêm
										</a>
										<div class="collapse" id="collapseContent">
										  <p> Mã KH: <strong><?php echo ($khachhang['kh_ma'] != '')? $khachhang['kh_ma']: $no_update; ?></strong> </p>
										  <p> Mã số thuế: <strong><?php echo ($khachhang['kh_masothue'] != '')? $khachhang['kh_masothue']: $no_update; ?></strong> </p>
										  <p> Fax: <strong><?php echo ($khachhang['kh_fax'] != '')? $khachhang['kh_fax']: $no_update; ?></strong> </p>
										  <p> CMND: <strong><?php echo ($khachhang['kh_cmnd'] != '')? $khachhang['kh_cmnd']: $no_update; ?></strong> </p>
										  <p> Tỉnh/TP: <strong><?php echo (isset($tinhthanhpho['tinhthanhpho_ten']))? $tinhthanhpho['tinhthanhpho_ten']: $no_update; ?></strong> </p>
										  <p> Quận/huyện: <strong><?php echo (isset($quanhuyen['quanhuyen_ten']))? $quanhuyen['quanhuyen_ten']: $no_update; ?></strong> </p>
										  <p>
										  	Ngành học: 
										  	<strong>
										  		<?php if (isset($nganhhoc)&& $nganhhoc != NULL) { ?>
										  		  <?php $nganhhoc_str = ''; ?>
										  		  <?php foreach ($nganhhoc as $key1 => $val1) { ?>
										  		    <?php foreach ($khachhang_nganhhoc as $key2 => $val2) { ?>
										  		      <?php if ($val2['id_nganhhoc'] == $val1['_id'] && $val2['id_khachhang'] == $khachhang['_id']) {
										  		        $nganhhoc_str .= $val1['nganhhoc_ten'].", ";
										  		      } ?>
										  		    <?php } ?>
										  		  <?php } ?>
										  		  <?php echo ($nganhhoc_str != '')? substr($nganhhoc_str,0,-2):$no_update; ?>
										  		<?php } ?>
										  	</strong>
										  </p>
										  <p>
										  	Nhóm KH: 
										  	<strong>
										  		<?php if (isset($nhomkh)&& $nhomkh != NULL) { ?>
										  		  <?php $nhomkh_str = ''; ?>
										  		  <?php foreach ($nhomkh as $key1 => $val1) { ?>
										  		    <?php foreach ($khachhang_nhomkh as $key2 => $val2) { ?>
										  		      <?php if ($val2['id_nhomkhachhang'] == $val1['_id'] && $val2['id_khachhang'] == $khachhang['_id']) {
										  		        $nhomkh_str .= $val1['nhomkh_ten'].", ";
										  		      } ?>
										  		    <?php } ?>
										  		  <?php } ?>
										  		  <?php echo ($nhomkh_str != '')? substr($nhomkh_str,0,-2):$no_update; ?>
										  		<?php } ?>
										  	</strong>
										  </p>
										  <p> Sở thích: <strong><?php echo ($khachhang['kh_sothich'] != '')? $khachhang['kh_sothich']: $no_update; ?></strong> </p>
										  <p> Logo: <strong><?php echo ($khachhang['kh_logo'] != '')? $khachhang['kh_logo']: $no_update; ?></strong> </p>
										  <p> Website: <strong><?php echo ($khachhang['kh_website'] != '')? $khachhang['kh_website']: $no_update; ?></strong> </p>
										</div>
										<a id="hide_more" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent">
										  Thu Gọn
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<div class="col-md-8">
					<div class="row">
						<div id="info_tab" class="col-md-12">
							<ul class="nav nav-tabs">
							    <li class="active"><a data-toggle="tab" href="#trade_kh">Trao đổi</a></li>
							    <li>
							    	<a class="dropdown-toggle" data-toggle="dropdown">Menu 1 <span class="caret"></span></a>
				    	      <ul class="dropdown-menu">
				    	        <li><a data-toggle="tab" href="#menu1_1">Submenu 1-1</a></li>
				    	        <li><a href="#">Submenu 1-2</a></li>
				    	        <li><a href="#">Submenu 1-3</a></li>                        
				    	      </ul>
							    </li>
							    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
							    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
							  </ul>

							  <div class="tab-content">
							    <div id="trade_kh" class="tab-pane fade in active">
							      <div class="box">
							        <div class="box-body pad">
							          <form>
							            <textarea id="binh_luan" name="binh_luan" class="textarea" placeholder="Trả lời" style="width: 100%; height: 120px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							          </form>
							        </div>
							        <div class="box_footer">
							        	<div class="footer_send">
							        		<a onclick="sendAnswer();" class="btn btn-success sendanswer">Gửi</a>
							        	</div>
							        	<div class="footer_attch">
							        		<a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
							        		<a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
							        	</div>
							        </div>
							      </div>
							      <div class="clear"></div>
						      	<div class="col-md-3">
						      		<div class="form-group">
						      			<input type="text" name="search_comment" id="search_comment" class="form-control" value="" placeholder="Tìm kiếm">
						      		</div>
						      	</div>
						      	<div class="col-md-3">
						      		<div class="form-group">
						      		  <select class="form-control select2" data-placeholder="Lựa chọn nhân viên" name="id_nguoipt" id="id_nguoipt" kh_id="<?=$kh_id?>">
						      		    <option value="0">Lựa Chọn nhân viên</option>
						      		      <?php if (isset($nguoipt) && $nguoipt != NULL) { ?>
						      		        <?php foreach ($nguoipt as $key => $val) { ?>
						      		          <option value="<?php echo $val['_id'] ?>"><?php echo $val['nguoipt_ten']; ?></option>
						      		        <?php } ?>
						      		      <?php } ?>
						      		  </select>
						      		</div>
						      	</div>
						      	<div class="col-md-3">
						      		<div class="form-group">
						      		  <select class="form-control" data-placeholder="Chọn trạng thái" name="situation" id="situation">
						      		    <option value="0">Chọn trạng thái</option>
						      		    <option value="1">Đã đọc</option>
						      		    <option value="2">Chưa đọc</option>
						      		  </select>
						      		</div>
						      	</div>
						      	<div class="col-md-3">
						      		<div class="row">
						      			<div class="col-md-6">
							      			<div class="form-group">
							      				<label class="control-label">
															<input type="checkbox" name="kh_ma" id="kh_ma" value="1" checked placeholder="">
															Trao đổi
														</label>
							      			</div>
							      		</div>
							      		<div class="col-md-6">
							      			<div class="form-group">
							      				<label class="control-label">
															<input type="checkbox" name="kh_ma" id="kh_ma" value="1" placeholder="">
															logs
														</label>
							      			</div>
							      		</div>
						      		</div>
						      	</div>
						      	<div class="clear"></div>
						      	<div id="load_comment">
							      	<?php if (isset($khachhang_history) && $khachhang_history != NULL) { ?>
							      		<?php foreach ($khachhang_history as $key => $val) { 
							      			$time_history = $val['created']->sec;
							      			$time_now 		= strtotime(gmdate('Y-m-d H:i:s', time()+7*3600));
							      			$time_minus 	= $time_now - $time_history;
							      			if ($time_minus <= 1) {
							      				$time_show = "Vừa xong";
							      			} elseif($time_minus < 60 && $time_minus > 1){
							      				$time_show = $time_minus." giây trước";
							      			} elseif($time_minus >= 60 && $time_minus < 3600) {
							      				$time_int = (int)($time_minus / 60);
							      				$time_show = $time_int." phút trước";
							      			} elseif ($time_minus >= 3600 && $time_minus < 86400) {
							      				$time_int = (int)($time_minus / 3600);
							      				$time_show = $time_int." giờ trước";
							      			} elseif ($time_minus >= 86400 && $time_minus < 259200) {
							      				$time_int = (int)($time_minus / 86400);
							      				$time_show = $time_int." ngày trước";
							      			} else {
							      				$time_show = date('d-m-Y H:i', $val['created']->sec);
							      			}

							      			($val['kh_gioitinh_history'] == 2)? $gioitinh_history = "Nữ": $gioitinh_history = "Nam";
							      			($val['kh_gioitinh_new'] == 2)? $gioitinh_new = "Nữ": $gioitinh_new = "Nam";

							      			(isset($val['kh_sinhnhat_history']) && $val['kh_sinhnhat_history'] != '0')?  $date_history = date('d/m/Y', $val['kh_sinhnhat_history']->sec):$date_history = '';
							      			(isset($val['kh_sinhnhat_new']) && $val['kh_sinhnhat_new'] != '0')?  $date_new = date('d/m/Y', $val['kh_sinhnhat_new']->sec):$date_new = '';
							      		?>
							      			<div class="col-md-12 info_log">
							      				<div class="row">
							      					<div class="col-md-10">
							      						<a href="#" class="bold blue" style="font-size: 15px;">
							      							<?php if (isset($user) && $user != NULL) { ?>
							      								<?php $fullname = ''; ?>
							      							  <?php foreach ($user as $key_user => $val_user) { ?>
							      							      <?php if (isset($val['id_user_change']) && $val['id_user_change'] == $val_user['_id']) {
							      							        $fullname = $val_user['fullname'];
							      							      }elseif (isset($val['id_user_created']) && $val['id_user_created'] == $val_user['_id']) {
							      							      	$fullname = $val_user['fullname'];
							      							      } ?>
							      							  <?php } ?>
							      							  <?php echo $fullname; ?>
							      							<?php } ?>
							      						</a>
							      						<span class="gray" style="margin-left: 5px;">
							      							<i class="fa fa-clock-o" aria-hidden="true"></i>
							      							<?php echo $time_show;?>
							      						</span>
							      						<div class="content_log">
							      							<?php if (isset($val['id_user_created']) && $val['id_user_created'] != NULL) { ?>
							      								Tạo mới khách hàng
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_ten_history'] != $val['kh_ten_new']) { ?>
							      								<i>Tên khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_ten_history']?>" sang "<?=$val['kh_ten_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_dienthoai_history'] != $val['kh_dienthoai_new']) { ?>
							      								<i>Điện thoại khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_dienthoai_history']?>" sang "<?=$val['kh_dienthoai_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_diachi_history'] != $val['kh_diachi_new']) { ?>
							      								<i>Địa chỉ khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_diachi_history']?>" sang "<?=$val['kh_diachi_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_ma_history'] != $val['kh_ma_new']) { ?>
							      								<i>Mã khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_ma_history']?>" sang "<?=$val['kh_ma_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_masothue_history'] != $val['kh_masothue_new']) { ?>
							      								<i>Mã số thuế khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_masothue_history']?>" sang "<?=$val['kh_masothue_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_email_history'] != $val['kh_email_new']) { ?>
							      								<i>Email khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_email_history']?>" sang "<?=$val['kh_email_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_fax_history'] != $val['kh_fax_new']) { ?>
							      								<i>Fax khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_fax_history']?>" sang "<?=$val['kh_fax_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_logo_history'] != $val['kh_logo_new']) { ?>
							      								<i>Logo khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_logo_history']?>" sang "<?=$val['kh_logo_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_sothich_history'] != $val['kh_sothich_new']) { ?>
							      								<i>Sở thích khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_sothich_history']?>" sang "<?=$val['kh_sothich_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_cmnd_history'] != $val['kh_cmnd_new']) { ?>
							      								<i>Chứng minh thư</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_cmnd_history']?>" sang "<?=$val['kh_cmnd_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_sinhnhat_history'] != $val['kh_sinhnhat_new']) { ?>
							      								<i>Sinh nhật khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$date_history?>" sang "<?=$date_new?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_gioitinh_history'] != $val['kh_gioitinh_new']) { ?>
							      								<i>Giới tính khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$gioitinh_history?>" sang "<?=$gioitinh_new?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_tinhthanhpho_history'] != $val['kh_tinhthanhpho_new']) { ?>
							      								<?php if (isset($tinhthanhpho) && $tinhthanhpho != NULL) { ?>
							      									<?php $thanhpho_history = ''; $thanhpho_new = ''; ?>
							      									<?php foreach ($tinhthanhpho as $key_tinhthanhpho => $val_tinhthanhpho) {
							      										if ($val['kh_tinhthanhpho_history'] == $val_tinhthanhpho['_id']) { $thanhpho_history = $val_tinhthanhpho['tinhthanhpho_ten']; }
							      										if ($val['kh_tinhthanhpho_new'] == $val_tinhthanhpho['_id']) { $thanhpho_new = $val_tinhthanhpho['tinhthanhpho_ten']; }
							      									} ?>
							      								<?php } ?>
							      								<i>Tỉnh/Thành Phố</i>&nbsp;&nbsp;thay đổi từ "<?=$thanhpho_history?>" sang "<?=$thanhpho_new?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_quanhuyen_history'] != $val['kh_quanhuyen_new']) { ?>
							      								<?php if (isset($quanhuyen) && $quanhuyen != NULL) { ?>
							      									<?php $quanhuyen_history = ''; $quanhuyen_new = ''; ?>
							      									<?php foreach ($quanhuyen as $key_quanhuyen => $val_quanhuyen) {
							      										if ($val['kh_quanhuyen_history'] == $val_quanhuyen['_id']) { $quanhuyen_history = $val_quanhuyen['quanhuyen_ten']; }
							      										if ($val['kh_quanhuyen_new'] == $val_quanhuyen['_id']) { $quanhuyen_new = $val_quanhuyen['quanhuyen_ten']; }
							      									} ?>
							      								<?php } ?>
							      								<i>Quận/Huyện</i>&nbsp;&nbsp;thay đổi từ "<?=$quanhuyen_history?>" sang "<?=$quanhuyen_new?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_nganhhoc_history'] != $val['kh_nganhhoc_new']) { ?>
							      							  <?php
							      							  	$nganhhoc_history_substr 	= ''; $nganhhoc_history_str = '';
							      							  	$nganhhoc_new_substr 			= '';	$nganhhoc_new_str 		= '';
							      							  	$count_history 	= count($val['kh_nganhhoc_history']);
							      							  	$count_new 			= count($val['kh_nganhhoc_new']);
							      							  ?>
							      							  <?php foreach ($nganhhoc as $key_nganhhoc => $val_nganhhoc) {
							      							  	if ($val['kh_nganhhoc_history'] != NULL) {
							      							  		for ($u=0; $u < $count_history; $u++) { 
							      							  			if ($val_nganhhoc['_id'] == $val['kh_nganhhoc_history'][$u]) {
							      							  				$nganhhoc_history_str .= $val_nganhhoc['nganhhoc_ten'].", ";
							      							  			}
							      							  		}
							      							  		$nganhhoc_history_substr = substr($nganhhoc_history_str,0,-2);
							      							  	}
							      							  	if ($val['kh_nganhhoc_new'] != NULL) {
							      							  		for ($p=0; $p < $count_new; $p++) { 
							      							  			if ($val_nganhhoc['_id'] == $val['kh_nganhhoc_new'][$p]) {
							      							  				$nganhhoc_new_str .= $val_nganhhoc['nganhhoc_ten'].", ";
							      							  			}
							      							  		}
							      							  		$nganhhoc_new_substr = substr($nganhhoc_new_str,0,-2);
							      							  	}
							      							  } ?>
							      							  <i>Ngành học</i>&nbsp;&nbsp;thay đổi từ "<?=$nganhhoc_history_substr?>" sang "<?=$nganhhoc_new_substr?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_website_history'] != $val['kh_website_new']) { ?>
							      								<i>Website</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_website_history']?>" sang "<?=$val['kh_website_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['kh_mota_history'] != $val['kh_mota_new']) { ?>
							      								<i>Mô tả khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$val['kh_mota_history']?>" sang "<?=$val['kh_mota_new']?>"
							      								<br/>
							      							<?php } ?>

							      							<?php if ($val['gt_ten_history'] != $val['gt_ten_new']) { ?>
							      								<i>Tên người giới thiệu</i>&nbsp;&nbsp;thay đổi từ "<?=$val['gt_ten_history']?>" sang "<?=$val['gt_ten_new']?>"
							      								<br/>
							      							<?php } ?>
							      							<?php if ($val['gt_nguoipt_history'] != $val['gt_nguoipt_new']) { ?>
							      								<?php if (isset($nguoipt) && $nguoipt != NULL) { ?>
							      									<?php $nguoipt_history = ''; $nguoipt_new = ''; ?>
							      									<?php foreach ($nguoipt as $key_nguoipt => $val_nguoipt) {
							      										if ($val['gt_nguoipt_history'] == $val_nguoipt['_id']) { $nguoipt_history = $val_nguoipt['nguoipt_ten']; }
							      										if ($val['gt_nguoipt_new'] == $val_nguoipt['_id']) { $nguoipt_new = $val_nguoipt['nguoipt_ten']; }
							      									} ?>
							      								<?php } ?>
							      								<i>Người phụ trách</i>&nbsp;&nbsp;thay đổi từ "<?=$nguoipt_history?>" sang "<?=$nguoipt_new?>"
							      								<br/>
							      							<?php } ?>

							      							<?php if ($val['gt_nhomkh_history'] != $val['gt_nhomkh_new']) { ?>
							      							  <?php
							      							  	$nhomkh_history_substr 	= ''; $nhomkh_history_str = '';
							      							  	$nhomkh_new_substr 			= '';	$nhomkh_new_str 		= '';
							      							  	$count_history 	= count($val['gt_nhomkh_history']);
							      							  	$count_new 			= count($val['gt_nhomkh_new']);
							      							  ?>
							      							  <?php foreach ($nhomkh as $key_nhomkh => $val_nhomkh) {
							      							  	if ($val['gt_nhomkh_history'] != NULL) {
							      							  		for ($u=0; $u < $count_history; $u++) { 
							      							  			if ($val_nhomkh['_id'] == $val['gt_nhomkh_history'][$u]) {
							      							  				$nhomkh_history_str .= $val_nhomkh['nhomkh_ten'].", ";
							      							  			}
							      							  		}
							      							  		$nhomkh_history_substr = substr($nhomkh_history_str,0,-2);
							      							  	}
							      							  	if ($val['gt_nhomkh_new'] != NULL) {
							      							  		for ($p=0; $p < $count_new; $p++) { 
							      							  			if ($val_nhomkh['_id'] == $val['gt_nhomkh_new'][$p]) {
							      							  				$nhomkh_new_str .= $val_nhomkh['nhomkh_ten'].", ";
							      							  			}
							      							  		}
							      							  		$nhomkh_new_substr = substr($nhomkh_new_str,0,-2);
							      							  	}
							      							  } ?>
							      							  <i>Nhóm khách hàng</i>&nbsp;&nbsp;thay đổi từ "<?=$nhomkh_history_substr?>" sang "<?=$nhomkh_new_substr?>"
							      								<br/>
							      							<?php } ?>

							      							<?php if ($val['gt_nguonkh_history'] != $val['gt_nguonkh_new']) { ?>
							      							  <?php
							      							  	$nguonkh_history_substr 	= ''; $nguonkh_history_str = '';
							      							  	$nguonkh_new_substr 			= '';	$nguonkh_new_str 		= '';
							      							  	$count_history 	= count($val['gt_nguonkh_history']);
							      							  	$count_new 			= count($val['gt_nguonkh_new']);
							      							  ?>
							      							  <?php foreach ($nguonkh as $key_nguonkh => $val_nguonkh) {
							      							  	if ($val['gt_nguonkh_history'] != NULL) {
							      							  		for ($u=0; $u < $count_history; $u++) { 
							      							  			if ($val_nguonkh['_id'] == $val['gt_nguonkh_history'][$u]) {
							      							  				$nguonkh_history_str .= $val_nguonkh['nguonkh_ten'].", ";
							      							  			}
							      							  		}
							      							  		$nguonkh_history_substr = substr($nguonkh_history_str,0,-2);
							      							  	}
							      							  	if ($val['gt_nguonkh_new'] != NULL) {
							      							  		for ($p=0; $p < $count_new; $p++) { 
							      							  			if ($val_nguonkh['_id'] == $val['gt_nguonkh_new'][$p]) {
							      							  				$nguonkh_new_str .= $val_nguonkh['nguonkh_ten'].", ";
							      							  			}
							      							  		}
							      							  		$nguonkh_new_substr = substr($nguonkh_new_str,0,-2);
							      							  	}
							      							  } ?>
							      							  <i>Ngành học</i>&nbsp;&nbsp;thay đổi từ "<?=$nguonkh_history_substr?>" sang "<?=$nguonkh_new_substr?>"
							      								<br/>
							      							<?php } ?>

							      							<?php if ($val['gt_moiqh_history'] != $val['gt_moiqh_new']) { ?>
							      								<?php if (isset($moiqh) && $moiqh != NULL) { ?>
							      									<?php $moiqh_history = ''; $moiqh_new = ''; ?>
							      									<?php foreach ($moiqh as $key_moiqh => $val_moiqh) {
							      										if ($val['gt_moiqh_history'] == $val_moiqh['_id']) { $moiqh_history = $val_moiqh['moiqh_ten']; }
							      										if ($val['gt_moiqh_new'] == $val_moiqh['_id']) { $moiqh_new = $val_moiqh['moiqh_ten']; }
							      									} ?>
							      								<?php } ?>
							      								<i>Mối quan hệ</i>&nbsp;&nbsp;thay đổi từ "<?=$moiqh_history?>" sang "<?=$moiqh_new?>"
							      								<br/>
							      							<?php } ?>
							      						</div>
							      					</div>
							      					<div class="col-md-2 tool_log">
							      						<span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span>
							      					</div>
							      					<div class="clear"></div>
							      					<div></div>
							      				</div>
							      			</div>
							      		<?php } ?>
							      	<?php } ?>
							      </div>
							    </div>
							    <div id="menu1_1" class="tab-pane fade">
							      <h3>Menu 1</h3>
							      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							    </div>
							    <div id="menu2" class="tab-pane fade">
							      <h3>Menu 2</h3>
							      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
							    </div>
							    <div id="menu3" class="tab-pane fade">
							      <h3>Menu 3</h3>
							      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							    </div>
							  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#floatingCirclesG').hide();
		$(".select2").select2();

		$('#hide_more').hide();
		$('#show_more').click(function(){
			$('#show_more').hide();
			$('#hide_more').show();
		});
		$('#hide_more').click(function(){
			$('#show_more').show();
			$('#hide_more').hide();
		});

	  $(".textarea").wysihtml5();

	  $('#search_comment').keypress(function(e){
	    if(e.which == 13){//Enter key pressed
	     return searchDetailsKhachhang();
	    }
	  });

	  $('#id_nguoipt').change(function(){
      return searchDetailsKhachhang();
    });
	});

	function sendAnswer(){
		var binh_luan = $('#binh_luan').val();
		if (binh_luan != '') {

		} else {
			return lobiboxError();
		}
	}

	function searchDetailsKhachhang(){
		$('#floatingCirclesG').show();
		$("#floatingCirclesG").delay(30000);
		var kh_id = $('#id_nguoipt').attr('kh_id');
		var id_nguoipt = $('#id_nguoipt').val();
		var search_comment = $('#search_comment').val();
		$.post('admin/khachhang/searchdetailskhachhang', { id_nguoipt:id_nguoipt, search_comment:search_comment, kh_id:kh_id }, function(data) {
		  $('#load_comment').html(data);
		  $('#floatingCirclesG').hide();
		});
	}

	function lobiboxError(){
	  Lobibox.notify('error', {
	      msg: 'Dữ liệu trống!',
	      size: 'mini',
	      position: 'right bottom',
	      sound: false, 
	      delay: 2000,  //In milliseconds
	  });
	  return false;
	}
</script>
