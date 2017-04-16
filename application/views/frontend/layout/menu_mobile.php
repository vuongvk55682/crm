<a class="clk_menu_mobile"><span></span></a>
<div class="head_type_mobile_fix">
<?php /*<link rel="stylesheet" href="public/tinyscrollbar/tinyscrollbar.css" type="text/css" media="screen"/>
<script type="text/javascript" src="public/tinyscrollbar/jquery.tinyscrollbar.js"></script>
<script type="text/javascript">
	$(document).ready(function()
    {
        var $scrollbar = $("#scrollbar1");
        $scrollbar.tinyscrollbar();
    });
</script>*/?>

	<div class="title">
		<?php if($this->CI_auth->check_logged_user() == ''){ ?>
			<a data-toggle="modal" data-target="#myLogin"></a>
		<?php }else{ ?>
			<a><?php echo $data_index['info_user']['fullname'];?></a>
			<a href="thoat.html" title="thoát"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
			<a href="thong-tin-chung.html" title="Thông tin tài khoản"><i class="fa fa-user" aria-hidden="true"></i></a>
		<?php } ?>
		<a class="close"><i class="fa fa-close" aria-hidden="true"></i></a>
	</div>
	<?php if(isset($data_index['menumain']) && $data_index['menumain']!=NULL){ ?>
		<?php foreach ($data_index['menumain'] as $key_menubanner => $val_menubanner) { 
					
					if($val_menubanner['link'] != ''){
						$url_menubanner = $val_menubanner['link'];
					}else{
						if($val_menubanner['type'] > 0){
							$url_menubanner = base_url().$val_menubanner['alias'].'.html';
						}else{
							$url_menubanner = '';
						}
					}
				?>
			<ul>
				<li><a href="<?php echo $url_menubanner;?>" title="<?php echo $val_menubanner['name'];?>"><?php echo $val_menubanner['name'];?></a>
					
					
					<?php if(isset($val_menubanner['child']) && $val_menubanner['child'] != NULL){ ?>
						<span class="arrow load_child2"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
						<ul class="ul_type_mobile_child2">
						<?php foreach ($val_menubanner['child'] as $key_menubanner_child2 => $val_menubanner_child2) {
							$url_menubanner_child2 = base_url().$val_menubanner_child2['alias'].'.html'; 
						?>
							
								<li><a href="<?php echo $url_menubanner_child2;?>" title="<?php echo $val_menubanner_child2['name'];?>"><i class="fa fa-minus" aria-hidden="true"></i> <?php echo $val_menubanner_child2['name'];?></a>
								<span class="arrow load_child3"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
									<?php if(isset($val_menubanner_child2['child_3']) && $val_menubanner_child2['child_3'] != NULL){ ?>
										<ul class="ul_type_mobile_child3">
											<?php foreach ($val_menubanner_child2['child_3'] as $key_menubanner_child3 => $val_menubanner_child3) { 
												$url_menubanner_child3 = base_url().$val_menubanner_child3['alias'].'-t'.$val_menubanner_child3['id'].'.html'; 
											?>
												<li><a href="<?php echo $url_menubanner_child3;?>" title="<?php echo $val_menubanner_child3['name'];?>"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo $val_menubanner_child3['name'];?></a>
												</li>
											<?php } ?>
										</ul>
									<?php } ?>
								</li>
							
						<?php } ?>
						</ul>
					<?php } ?>
				</li>
			</ul>
		<?php } ?>
	<?php } ?>
	<div class="clear"></div>
	
</div>