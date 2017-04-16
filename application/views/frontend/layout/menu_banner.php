<div class="menu_right clearfix">
	<ul class="menu_top">
		<?php foreach ($data_index['menumain'] as $key_menumain => $val_menumain) { 
			if($val_menumain['link'] != ''){
				$url = $val_menumain['link'];
			}else{
				if($val_menumain['type'] == 1){
					$url = base_url().$val_menumain['alias'].'-tn'.$val_menumain['id'].'.html';
				}else if($val_menumain['type'] == 2){
					$url = base_url().$val_menumain['alias'].'-t'.$val_menumain['id'].'.html';
				}else if($val_menumain['type'] == 3){
					$url = base_url().$val_menumain['alias'].'-ta'.$val_menumain['id'].'.html';
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
			<li <?php if($key_menumain == 0){ ?> class="active" <?php } ?>><a href="<?php echo $url;?>" title="<?php echo $val_menumain['name'];?>"> 
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
							if($val_menumain_child['type'] == 1){
								$url_menumain_child = base_url().$val_menumain_child['alias'].'-tn'.$val_menumain_child['id'].'.html';
							}else if($val_menumain_child['type'] == 2){
								$url_menumain_child = base_url().$val_menumain_child['alias'].'-t'.$val_menumain_child['id'].'.html';
							}else if($val_menumain_child['type'] == 3){
								$url_menumain_child = base_url().$val_menumain_child['alias'].'-ta'.$val_menumain_child['id'].'.html';
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
											if($val_menumain_child3['type'] == 1){
												$url_menumain_child3 = base_url().$val_menumain_child3['alias'].'-tn'.$val_menumain_child3['id'].'.html';
											}else if($val_menumain_child3['type'] == 2){
												$url_menumain_child3 = base_url().$val_menumain_child3['alias'].'-t'.$val_menumain_child3['id'].'.html';
											}else if($val_menumain_child3['type'] == 4){
												$url_menumain_child3 = base_url().'bai-trac-nghiem-'.$val_menumain_child3['alias'].'-tiq'.$val_menumain_child3['id'].'.html';
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