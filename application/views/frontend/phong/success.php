<div class="container"><div class="row">
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="wp_phong">
	<h1 style="display:none;" class="col-md-12 title_main"><span><?php echo $title; ?></span></h1>
	<div class="clear"></div>
		<div class="contents">
		<div class="info_success">
			<i class="fa fa-check"></i>
	        <div class="clear"></div>
	        <?php echo isset($data_index['keys']['datphongthanhcong'])?$data_index['keys']['datphongthanhcong']:'';?> 
		</div>
		<?php if(isset($phong) && $phong!=NULL){ ?>
			<div class="title"><?php echo isset($data_index['_keys']['chonphong'])?$data_index['_keys']['chonphong']:''; ?></div>
			<div class="col-md-3"><div class="row"><div class="th b_right"><?php echo isset($data_index['_keys']['loaiphong'])?$data_index['_keys']['loaiphong']:''; ?></div></div></div>
			<div class="col-md-2 hidden-xs"><div class="row"><div class="th b_right"><?php echo isset($data_index['_keys']['gia'])?$data_index['_keys']['gia']:''; ?></div></div></div>
			<div class="col-md-1 hidden-xs"><div class="row"><div class="th b_right"><?php echo isset($data_index['_keys']['toida'])?$data_index['_keys']['toida']:''; ?></div></div></div>

			<div class="col-md-4 hidden-xs"><div class="row"><div class="th b_right"><?php echo isset($data_index['_keys']['tiennghi'])?$data_index['_keys']['tiennghi']:''; ?></div></div></div>
			<div class="col-md-2 hidden-xs"><div class="row"><div class="th"><?php echo isset($data_index['_keys']['soluong'])?$data_index['_keys']['soluong']:''; ?></div></div></div>
			<div class="clear"></div>
			<div class="contents">
			<?php foreach ($phong as $key => $val) { ?>
				<div class="col-md-3"><div class="row"><div class="td b_right">
				<h3><?php echo $val['name'];?></h3>
				<div class="clear"></div>
				<div class="txt_center">
					<img src="upload/phong/<?php echo $val['image'];?>" alt="<?php echo $val['name'];?>" class="img" /></div></div>
				</div>
				</div>
				<div class="col-md-2 col-xs-3"><div class="row"><div class="td b_right line_130 txt_center">
					<?php echo number_format($val['gia']);?> <sup>đ</sup>
				</div></div></div>
				<div class="col-md-1 col-xs-2"><div class="row"><div class="td b_right line_130 txt_center">
					<?php for ($i=0; $i < $val['songuoi']; $i++) { ?>
						<i class="fa fa-user" aria-hidden="true"></i>
					<?php } ?>
				</div></div></div>
				<div class="col-md-4 col-xs-7"><div class="row"><div class="td b_right line_130 txt_center">
				<?php if(isset($val['tiennghi']) && $val['tiennghi'] != NULL){ ?>
	              <?php foreach ($val['tiennghi'] as $key_tiennghi => $val_tiennghi) { ?>
	                  <img src="upload/tiennghi/<?php echo $val_tiennghi;?>" alt="<?php echo $val['name'];?>"/>
	              <?php } ?>
	          	<?php } ?>
	          	</div></div></div>
	          	<div class="mobile_clear"></div>
				<div class="col-md-2"><div class="row"><div class="td line_130 txt_center">
					<?php echo $val['soluong'];?>
				</div></div></div>
				<div class="clear"></div>
			<?php } ?>
			</div>
		<?php } ?>
		</div>
</div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12"><div class="row">
	<div class="wp_datphong_info">
		<div class="title"><?php echo isset($data_index['_keys']['thongtindatphong'])?$data_index['_keys']['thongtindatphong']:''; ?></div>
		<div class="contents_success">
			<ul>
				<li><span><?php echo isset($data_index['_keys']['ngaynhanphong'])?$data_index['_keys']['ngaynhanphong']:''; ?>:</span><?php echo $booking['ngaynhan'];?></li>
				<li><span><?php echo isset($data_index['_keys']['ngaytraphong'])?$data_index['_keys']['ngaytraphong']:''; ?>:</span><?php echo $booking['ngaytra'];?></li>
				<li><span><?php echo isset($data_index['_keys']['nguoilon'])?$data_index['_keys']['nguoilon']:''; ?>:</span><?php echo $booking['nguoilon'];?></li>
				<li><span><?php echo isset($data_index['_keys']['treem'])?$data_index['_keys']['treem']:''; ?>:</span><?php echo $booking['treem'];?></li>
				<li><span><?php echo isset($data_index['_keys']['dem'])?$data_index['_keys']['dem']:''; ?>:</span><?php echo $booking['dem'];?></li>
			</ul>
		</div>
		<div class="title"><?php echo isset($data_index['_keys']['thongtinnguoidat'])?$data_index['_keys']['thongtinnguoidat']:''; ?></div>
		<div class="contents_success">
			<ul>
				<li><span><?php echo isset($data_index['_keys']['fullname'])?$data_index['_keys']['fullname']:''; ?>:</span><?php echo $booking['fullname'];?></li>
				<li><span><?php echo isset($data_index['_keys']['phone'])?$data_index['_keys']['phone']:''; ?>:</span><?php echo $booking['phone'];?></li>
				<li><span>Email:</span><?php echo $booking['email'];?></li>
				<li><span><?php echo isset($data_index['_keys']['address'])?$data_index['_keys']['address']:''; ?>:</span><?php echo $booking['address'];?></li>
				<li><span><?php echo isset($data_index['_keys']['yeucau'])?$data_index['_keys']['yeucau']:''; ?>:</span><?php echo $booking['request'];?></li>
			</ul>
		</div>
	</div>
</div></div>
</div></div>
<div class="clear" style="height:20px;"></div>

