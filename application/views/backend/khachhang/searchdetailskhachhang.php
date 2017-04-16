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