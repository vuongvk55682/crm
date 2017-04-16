<div class="col-lg-3 col-md-3">
	<div class="category-saidebar ">
	<?php if(isset($data_index['menubanner']) && $data_index['menubanner']!=NULL){ ?>
		<ul>
		<?php foreach ($data_index['menubanner'] as $key_menubanner => $val_menubanner) { 
			
			if($val_menubanner['link'] != ''){
				$url_menubanner = $val_menubanner['link'];
			}else{
				if($val_menubanner['type'] == 1){
					$url_menubanner = base_url().$val_menubanner['alias'].'-tn'.$val_menubanner['id'].'.html';
				}else if($val_menubanner['type'] == 2){
					$url_menubanner = base_url().$val_menubanner['alias'].'-c'.$val_menubanner['id'].'.html';
				}else{
					$url_menubanner = '';
				}
			}
		?>
			<li><a href="<?php echo $url_menubanner;?>" title="<?php echo $val_menubanner['name'];?>"><i class="<?php echo $val_menubanner['icon'];?>"></i> <?php echo $val_menubanner['name'];?>
				<?php if(isset($val_menubanner['child']) && $val_menubanner['child'] != NULL){ ?>
					<i class="fa fa-angle-right arrow" aria-hidden="true"></i>
				<?php } ?>
				</a>
				<div class="menu_child2">
					<?php if(isset($val_menubanner['child']) && $val_menubanner['child'] != NULL){ ?>
						<div class="col-md-9 col-sm-9 col-xs-9">
						<?php foreach ($val_menubanner['child'] as $key_menubanner_child2 => $val_menubanner_child2) {
							$url_menubanner_child2 = base_url().$val_menubanner_child2['alias'].'-t'.$val_menubanner_child2['id'].'.html'; 
						?>
							<ul class="col-md-4 col-sm-4 col-xs-4">
							
								<li><a href="<?php echo $url_menubanner_child2;?>" title="<?php echo $val_menubanner_child2['name'];?>"><?php echo $val_menubanner_child2['name'];?></a>
									<?php if(isset($val_menubanner_child2['child_3']) && $val_menubanner_child2['child_3'] != NULL){ ?>
										<ul>
											<?php foreach ($val_menubanner_child2['child_3'] as $key_menubanner_child3 => $val_menubanner_child3) { 
												$url_menubanner_child3 = base_url().$val_menubanner_child3['alias'].'-t'.$val_menubanner_child3['id'].'.html'; 
											?>
												<li><a href="<?php echo $url_menubanner_child3;?>" title="<?php echo $val_menubanner_child3['name'];?>"><i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $val_menubanner_child3['name'];?></a></li>
											<?php } ?>
										</ul>
									<?php } ?>
								</li>
							</ul>
						<?php } ?>
						</div>
					<?php } ?>
					<?php if($val_menubanner['image'] != ''){ ?>
						<div class="col-md-3 col-sm-3 col-xs-3 menu_image"><div class="row">
							<a href="<?php echo $val_menubanner['image_link'];?>" title="<?php echo $val_menubanner['name'];?>">
								<img src="upload/menu/<?php echo $val_menubanner['image'];?>" alt="<?php echo $val_menubanner['name'];?>"/>
							</a>
						</div></div>
					<?php } ?>
				</div>
			</li>
			
		<?php } ?>
		</ul>
	<?php } ?>
	</div>
</div>