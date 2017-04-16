<?php if($data_index['config']['choose_width_menu'] == 1){ ?>
	<?php if(isset($data_index['menumain']) && $data_index['menumain'] != NULL){ ?>
	<div id="menu">
		<div class="container menu clearfix"><div class="row">
			<?php if($data_index['config']['is_menu_thuongmai'] == 1){ ?>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="catemenu-toggler">
					<i class="fa fa-bars"></i>
					<span>Danh mục sản phẩm</span>
				</div>
			</div>
			<?php } ?>
			<div class="<?php if($data_index['config']['is_menu_thuongmai'] == 1){ ?> col-md-9 col-sm-9 col-xs-12 <?php }else{ ?> col-md-12 col-sm-12 col-xs-12 <?php } ?>">
			<a id="btn_menu"><i class="fa fa-th-list" aria-hidden="true"></i></a>
			<ul class="menu_top">
				<?php foreach ($data_index['menumain'] as $key_menumain => $val_menumain) { 
					if($val_menumain['link'] != ''){
						$url = $val_menumain['link'];
					}else{
						if($val_menumain['type'] > 0){
							$url = base_url().$val_menumain['alias'].'.html';
						}else{
							$url = '';
						}
					}
					if($val_menumain['image'] != ''){
						$img_menumain = base_url().'upload/menu/'.$val_menumain['image'];
					}else{
						$img_menumain = '';
					}
					if($key_menumain == 0){
						$i = '<i class="fa fa-paint-brush" aria-hidden="true"></i>';
					}
					if($key_menumain == 1){
						$i = '<i class="fa fa-laptop" aria-hidden="true"></i>';
					}
					if($key_menumain == 2){
						$i = '<i class="fa fa-newspaper-o" aria-hidden="true"></i>';
					}
					if($key_menumain == 3){
						$i = '<i class="fa fa-tags" aria-hidden="true"></i>';
					}
					if($key_menumain == 4){
						$i = '<i class="fa fa-phone" aria-hidden="true"></i>';
					}
					if($key_menumain == 5){
						$i = '<i class="fa fa-paint-brush" aria-hidden="true"></i>';
					}

				?>
					<li><a href="<?php echo $url;?>" title="<?php echo $val_menumain['name'];?>"> 
						<?php if($val_menumain['image'] != ''){ ?> 
							<img src="<?php echo $img_menumain; ?>" alt="<?php echo $val_menumain['name'];?>"/>
						<?php } ?>
						<?php echo $val_menumain['name'];?>
					<?php if(isset($val_menumain['child']) && $val_menumain['child']!=NULL){ ?>
					<i class="fa fa-angle-down"></i>
					<?php } ?>
					</a>
						<?php if(isset($val_menumain['child']) && $val_menumain['child']!=NULL){ ?>
							<ul>
							<?php foreach ($val_menumain['child'] as $key_menumain_child => $val_menumain_child) { 
								if($val_menumain_child['link'] != ''){
									$url_menumain_child = $val_menumain_child['link'];
								}else{
									if($val_menumain_child['type'] > 0){
										$url_menumain_child = base_url().$val_menumain_child['alias'].'.html';
									}else{
										$url_menumain_child = '';
									}
								}
							?>
									<li><a href="<?php echo $url_menumain_child;?>">
										<?php echo $val_menumain_child['name'];?>
									</a>
										<?php if(isset($val_menumain_child['child_3']) && $val_menumain_child['child_3']!=NULL){ ?>
											<ul>
											<?php foreach ($val_menumain_child['child_3'] as $key_menumain_child3 => $val_menumain_child3) { 
												if($val_menumain_child3['link'] != ''){
													$url_menumain_child = $val_menumain_child3['link'];
												}else{
													if($val_menumain_child3['type'] > 0){
														$url_menumain_child3 = base_url().$val_menumain_child3['alias'].'.html';
													}else{
														$url_menumain_child3 = '';
													}
												}
											?>
													<li><a href="<?php echo $url_menumain_child3;?>"><?php echo $val_menumain_child3['name'];?></a></li>
											<?php } ?>
											</ul>
										<?php } ?>
									</li>
							<?php } ?>
							</ul>
						<?php } ?>
					</li>
				<?php } ?>
			</ul>
			</div>
		</div></div>
	</div>
	<?php } ?>
<?php } ?>