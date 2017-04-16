<?php /*<div id="bottom">
	<div class="container"><div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="title"><?php echo isset($data_index['_keys']['connect'])?$data_index['_keys']['connect']:'';?></div>
			<div class="clear"></div>
			<?php $this->load->view('frontend/plugin/share'); ?>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<?php $this->load->view('frontend/layout/sentmail'); ?>
		</div>
	</div></div>
</div>*/?>
<div id="footer" class="clearfix">
	<div class="container"><div class="row">
		<div class="col-md-5 col-sm-4 col-xs-12">
			<div class="title">Liên hệ</div>
			<div class="clear"></div>
			<div class="txt_footer">
				<?php echo isset($data_index['keys']['footer'])?$data_index['keys']['footer']:'';?>
			</div>
		</div>
		<?php if($data_index['config']['is_type_footer'] == 1){ ?>
		<div class="col-md-3 col-sm-3 col-xs-12">
		<?php if(isset($data_index['menufooter']) && $data_index['menufooter'] != NULL){ ?>
		<?php foreach ($data_index['menufooter'] as $key_footer => $val_footer) {?>
			<div class="col-md-12 col-sm-12 col-xs-12"><div class="row menu_footer">
				<div class="title"><?php echo $val_footer['name'];?></div>
				
				<?php if(isset($val_footer['child']) && $val_footer['child'] != NULL){ ?>
				<ul>
				<?php foreach ($val_footer['child'] as $key_footer_child => $val_footer_child) {
					if($val_footer_child['link'] != ''){
						$url_footer_child = $val_footer_child['link'];
					}else{
						if($val_footer_child['type'] == 1){
							$url_footer_child = base_url().$val_footer_child['alias'].'-tn'.$val_footer_child['id'].'.html';
						}else if($val_footer_child['type'] == 2){
							$url_footer_child = base_url().$val_footer_child['alias'].'-t'.$val_footer_child['id'].'.html';
						}else{
							$url_footer_child = '';
						}
					}
				?>

				<li><a href="<?php echo $url_footer_child;?>" title="<?php echo $val_footer_child['name'];?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $val_footer_child['name'];?></a></li>
				<?php } ?>
				</ul>
				<?php } ?>
			</div></div>
		<?php } ?>
		<?php } ?>
		</div>
		<?php } ?>
		<?php if($data_index['config']['is_key_footer'] == 1){ ?>
		<div class="col-xs-12"><hr/></div>
		<div class="col-md-12 col-sm-12 col-xs-12 typelike">
			<h4>Danh mục và nhãn hàng được yêu thích</h4>
			<div class="clear"></div>
			<?php echo isset($data_index['keys']['typelike'])?$data_index['keys']['typelike']:'';?>
		</div>
		<div class="col-xs-12"><hr/></div>
		<div class="col-md-2 col-sm-2 col-xs-6 bocongthuong">
			<div class="title"><?php echo isset($data_index['_keys']['certified'])?$data_index['_keys']['certified']:'';?></div>
			<div class="clear"></div>
			<?php echo isset($data_index['keys']['bocongthuong'])?$data_index['keys']['bocongthuong']:'';?>
		</div>
		<?php } ?>
		
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="title">Kết nối facebook</div>
			<div class="clear"></div>
			<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1278056805570815";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
				</script>
				<div class="fb-page" data-href="https://www.facebook.com/tiembanhgateauxdeluxe/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/tiembanhgateauxdeluxe/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/tiembanhgateauxdeluxe/">Bánh kem online</a></blockquote></div>
		</div>
		
	</div></div>
</div>
<?php /* $this->load->view('frontend/layout/sentmail_fix'); */ ?>
<a href="#" class="go-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>