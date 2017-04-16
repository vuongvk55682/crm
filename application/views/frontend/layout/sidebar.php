<div id="sidebar">
	
	<?php if(isset($data_index['sidebar']) && $data_index['sidebar'] != NULL){ ?>
		<?php foreach ($data_index['sidebar'] as $key_sidebar => $val_sidebar) { ?>
			<?php if($val_sidebar['is_title'] == 1){ ?>
			<div class="sidebar sidebar_content clearfix">
				<?php $this->load->view('frontend/'.$val_sidebar['template'].''); ?>
			</div>
			<?php }else{ ?>
				<div class="sidebar clearfix">
				<div class="title_sidebar"><?php echo $val_sidebar['name'];?></div>
				<div class="clear"></div>
				<?php $this->load->view('frontend/'.$val_sidebar['template'].''); ?>
				</div>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	<div class="clear"></div>
	<div class="ads_image">
		<?php echo isset($data_index['keys']['ads_image'])?$data_index['keys']['ads_image']:'';?>
	</div>
	<div class="clear"></div>
	<div class="sidebar clearfix">
		<div class="title_sidebar">Lượng truy cập</div>
		<div class="clear"></div>
		<div class="wp_thongke"><div class="contents">
			<!-- Histats.com  START  (standard)-->
		   <script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
		   <a href="http://www.histats.com" target="_blank" title="web site hit counter">
		       <script type="text/javascript">
		           try {
		               Histats.start(1, 2684480, 4, 403, 118, 80, "00011111");
		               Histats.track_hits();
		           } catch (err) { };
		       </script>
		   </a>
		   <noscript><a href="http://www.histats.com" target="_blank"><img src="http://sstatic1.histats.com/0.gif?2684480&101" alt="web site hit counter" border="0"></a></noscript>
		   <!-- Histats.com  END  -->
		</div></div>
	</div>
</div>





