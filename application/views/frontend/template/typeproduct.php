<?php if(isset($data_index['typeleft']) && $data_index['typeleft'] != NULL){ ?>
	<ul class="clearfix">
		<?php foreach ($data_index['typeleft'] as $key_menu => $val_menu) { 
			$stt = $key_menu + 1;
			$url = base_url().$val_menu['alias'].'-t'.$val_menu['id'].'.html';
			if($val_menu['image'] != ''){
				$img_typeleft = base_url().'upload/menu/'.$val_menu['image'];
			}else{
				$img_typeleft = '';
			}
			if($val_menu['image_qc'] != ''){
				$imgqc_typeleft = base_url().'upload/menu/'.$val_menu['image_qc'];
			}else{
				$imgqc_typeleft = '';
			}

		?>
			<li><a href="<?php echo $url;?>" title="<?php echo $val_menu['name'];?>">
			<i class="fa fa-angle-right" aria-hidden="true"></i>
			<!-- <?php if($img_typeleft != ''){ ?>
			<img src="<?php echo $img_typeleft;?>" alt="<?php echo $val_menu['name'];?>">
			<?php } ?> -->
			<?php echo $val_menu['name'];?>
			</a>
				<div class="div_type_child">
				<?php if(isset($val_menu['child']) && $val_menu['child'] != NULL){ ?>
					<ul class="child_2 child_2_<?php echo $stt;?>">
					<?php foreach ($val_menu['child'] as $key_child => $val_child) { 
						$url_menu_child = base_url().$val_child['alias'].'-t'.$val_child['id'].'.html';
					?>
						<li><a href="<?php echo $url_menu_child;?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $val_child['name'];?></a></li>
					<?php } ?>
					</ul>
				<?php } ?>
					<div class="div_menu_image">
						<!-- <img src="<?php echo $imgqc_typeleft;?>" alt="<?php echo $val_menu['name'];?>" class="image_qc"> -->
						<div class="clear"></div>
						<?php if(isset($val_menu['product']) && $val_menu['product'] != NULL){ ?>
						<?php foreach ($val_menu['product'] as $key_menu_pro => $val_menu_pro) { 
							$img_menu_pro = base_url().'upload/product/thumb/'.$val_menu_pro['image_thumb'];
							$url_menu_pro = base_url().$val_menu_pro['alias'].'-p'.$val_menu_pro['id'].'.html';
						?> 
						<div class="col-md-4"><div class="row">
							<div class="item">
								<div class="title_s"><?php echo $val_menu_pro['name'];?></div>
								<!-- <img src="<?php echo $img_menu_pro;?>" alt="<?php echo $val_menu_pro['name'];?>"> -->
								<a href="<?php echo $url_menu_pro;?>" title="<?php echo $val_menu_pro['name'];?>">Mua ngay <i class="fa fa-angle-right" aria-hidden="true"></i></a>
							</div>
						</div></div>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
			</li>
		<?php } ?>
	</ul>
<?php } ?>