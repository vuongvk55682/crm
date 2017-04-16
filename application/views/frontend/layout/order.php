<div id="order_top">
	<ul class="clearfix">
		<li><a data-toggle="modal" data-target="#myCheckorder"> Tra cứu đơn hàng <i class="fa fa-search" aria-hidden="true"></i></a></li>
		<?php if(isset($data_index['menubanner']) && $data_index['menubanner'] != NULL){ ?>
			<?php foreach ($data_index['menubanner'] as $key_menubanner => $val_menubanner) { ?>
				<li><?php echo $val_menubanner['name'];?> <i class="fa fa-caret-down" aria-hidden="true"></i>
				<?php if(isset($val_menubanner['child']) && $val_menubanner['child']!=NULL){ ?>
					<ul>
						<?php if($key_menubanner == 0){ ?>
						<div class="hotline">
							<div class="col-md-2"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
							<div class="col-md-9">
								Hotline <div class="clear"></div>
								<span><?php echo isset($data_index['hotline']['content'])?$data_index['hotline']['content']:'';?></span>
							</div>
						</div>
						<?php }else{ ?>
							<?php echo isset($data_index['card']['content'])?$data_index['card']['content']:'';?>
						<?php } ?>
						<?php foreach ($val_menubanner['child'] as $key_menubanner_child => $val_menubanner_child) { 
							if($val_menubanner_child['link'] != ''){
								$url = $val_menubanner_child['link'];
							}else{
								if($val_menubanner_child['type'] == 1){
									$url = base_url().$val_menubanner_child['alias'].'-tn'.$val_menubanner_child['id'].'.html';
								}else if($val_menubanner_child['type'] == 2){
									$url = base_url().$val_menubanner_child['alias'].'-t'.$val_menubanner_child['id'].'.html';
								}else{
									$url = '';
								}
							}
						?>
							<li><a href="<?php echo $url;?>"><?php echo $val_menubanner_child['name'];?></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
				</li>
			<?php } ?>
		<?php } ?>
	</ul>
</div>
<div class="modal fade" id="myCheckorder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<form onsubmit="return checkorder();" action="don-hang.html" method="post" id="frm_checkorder">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-clipboard" aria-hidden="true"></i> Kiểm tra đơn hàng</h5>
	      </div>
	      <div class="modal-body">
	       		<div class="form-group">
	                <label for="name">Mã đơn hàng</label>
	                <div class="input-group">
	                    <div class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></div>
	                    <input type="text" class="form-control" id="code" name="code">
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="name">Số điện thoại</label>
	                <div class="input-group">
	                    <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
	                    <input type="text" class="form-control" id="phone" name="phone">
	                </div>
	            </div>
	      </div>
	      <div class="modal-footer">
	      <div class="col-md-12">
	      <div class="row">
	      	<div id="div_error"></div>
	      	<div class="clear"></div>
	      	<a data-dismiss="modal" class="btn btn-success btn-flat"><i class="fa fa-times"></i> Đóng</a>
	        <button type="button" class="btn btn-success btn-flat checkorder"><i class="fa fa-unlock-alt"></i> Kiểm tra</button>
	      </div>
	      </div>
	      </div>
	    </div>
	</form>
	</div>
</div>