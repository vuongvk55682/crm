<script src="public/scrollbar/includes/prettify/prettify.js"></script>
<script src="public/scrollbar/jquery.scrollbar.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.scrollbar-inner').scrollbar();
	});
	
	function NumberPhong(num,id){
		num = num.value;
		var data = num + '_' + id;
		var loaiphongid = $('#loaiphongid').val();
		if(loaiphongid != ''){
			data = loaiphongid + ',' + data;
			$('#loaiphongid').val(data);
		}else{
			$('#loaiphongid').val(data);
		}
	}
</script>
<div class="container"><div class="row">
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="demo"><div class="scrollbar-inner">
<div class="wp_phong">
	<h1 style="display:none;" class="col-md-12 title_main"><span><?php echo $title; ?></span></h1>
	<div class="clear"></div>
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
				<select name="sophong" id="sophong" onchange="NumberPhong(this,<?php echo $val['id'];?>);">
					<option value="0">0</option>
					<?php for ($i=1; $i < 11; $i++) { ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php } ?>
				</select>
			</div></div></div>
			<div class="clear"></div>
		<?php } ?>
		</div>
	<?php } ?>
</div>
</div></div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12"><div class="row">
	
	<div class="wp_datphong_info">
		<div class="title"><?php echo isset($data_index['_keys']['thongtindatphong'])?$data_index['_keys']['thongtindatphong']:''; ?></div>
		<div class="contents">
			<form onsubmit="return checkbooking();" method="post" action="phong/booking">
				<div class="_item">
					<label><?php echo isset($data_index['_keys']['ngaynhanphong'])?$data_index['_keys']['ngaynhanphong']:''; ?></label>
					<div class="clear"></div>
					<input type="text" name="ngaynhan" id="ngaynhan" value="<?php echo isset($ngaynhan)?$ngaynhan:$daynow;?>">
					<img src="public/images/icon_date.jpg" alt="Ngày nhận phòng"/>
				</div>
				<div class="_item">
					<label><?php echo isset($data_index['_keys']['ngaytraphong'])?$data_index['_keys']['ngaytraphong']:''; ?></label>
					<div class="clear"></div>
					<input type="text" name="ngaytra" id="ngaytra" value="<?php echo isset($ngaytra)?$ngaytra:$daynext;?>">
					<img src="public/images/icon_date.jpg" alt="Ngày nhận phòng"/>
				</div>
				<div class="_item w_30">
					<label><?php echo isset($data_index['_keys']['nguoilon'])?$data_index['_keys']['nguoilon']:''; ?></label>
					<div class="clear"></div>
					<select name="nguoilon" id="nguoilon">
						<option value="0">0</option>
						<?php for ($i=1; $i < 11; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php if(isset($nguoilon) && $i == $nguoilon){ ?> selected <?php } ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="_item w_30">
					<label><?php echo isset($data_index['_keys']['treem'])?$data_index['_keys']['treem']:''; ?></label>
					<div class="clear"></div>
					<select name="treem" id="treem">
						<option value="0">0</option>
						<?php for ($i=1; $i < 11; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php if(isset($treem) && $i == $treem){ ?> selected <?php } ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="_item w_30">
					<label><?php echo isset($data_index['_keys']['dem'])?$data_index['_keys']['dem']:''; ?></label>
					<div class="clear"></div>
					<input type="text" name="dem" id="dem" value="<?php echo isset($dem)?$dem:1;?>">
				</div>
				<div class="clear height_10"></div>
				<div class="form-group">
	                <div class="input-group">
	                    <div class="input-group-addon"><?php echo isset($data_index['_keys']['fullname'])?$data_index['_keys']['fullname']:''; ?></div>
	                    <input type="text" class="form-control" name="fullname" id="fullname" control="phong">
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="input-group">
	                    <div class="input-group-addon"><?php echo isset($data_index['_keys']['phone'])?$data_index['_keys']['phone']:''; ?></div>
	                    <input type="text" class="form-control" name="phone" id="phone" control="phong">
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="input-group">
	                    <div class="input-group-addon">Email</div>
	                    <input type="text" class="form-control" name="email" id="email" control="phong">
	                </div>
	            </div>

	            <div class="form-group">
	                <div class="input-group">
	                    <div class="input-group-addon"><?php echo isset($data_index['_keys']['address'])?$data_index['_keys']['address']:''; ?></div>
	                    <input type="text" class="form-control" name="address" id="address" control="phong">
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="input-group">
	                    <textarea class="form-control" rows="4" name="request" id="request" placeholder="<?php echo isset($data_index['_keys']['yeucau'])?$data_index['_keys']['yeucau']:''; ?>"></textarea>
	                </div>
	            </div>
	            <input type="hidden" name="loaiphongid" id="loaiphongid" value="">
				<div class="_item w_100">
					<button> <?php echo isset($data_index['_keys']['datphong'])?$data_index['_keys']['datphong']:''; ?></button>
				</div>
			</form>
		</div>
	</div>
</div></div>
</div></div>
