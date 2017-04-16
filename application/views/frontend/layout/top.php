<div id="wap_top">
	<div class="container"><div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12 slogan">
		<?php echo $data_index['keys']['slogan'];?>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12 quicklink">
			<a href="/vi-vn/home/search.aspx" class="l3"><i></i><span><?php echo isset($data_index['_keys']['search'])?$data_index['_keys']['search']:'';?></span></a>
			<div class="langbox">
				<?php if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){ ?>
					<a class="vietnamese" href="session/index?lang=vn"><i></i><?php echo isset($data_index['_keys']['vietnames'])?$data_index['_keys']['vietnames']:'';?></a>
				<?php }else{ ?>
					<a class="english" href="session/index?lang=en">English</a>
				<?php } ?>
	        </div>
	        <a href="site-map.html" class="l1"><i></i><span>Sitemap</span></a>
	    </div>
	</div></div>
</div>