<div class="container"><div class="row">
	<div class="list_news">
		<div class="clear"></div>
		<?php if(isset($video) && $video!=NULL){ ?>
			<?php foreach ($video as $key_video => $val_video) { ?>
				<div class="col-md-3 clearfix">
					<div class="item_news">
						<a onclick="loadVideo(<?php echo $val_video['id']; ?>);">
							<img src="https://img.youtube.com/vi/<?php echo $val_video['url']; ?>/0.jpg" alt="<?php echo $val_video['name']; ?>" title="<?php echo $val_video['name']; ?>">
						<h3><?php echo $val_video['name']; ?></h3></a>
					</div>
				</div>
			<?php } ?>
			<div class="clear"></div>
	        <?php echo isset($list_pagination)?$list_pagination:''; ?>
		<?php }else{ ?>
			<div class="col-md-12">Nội dung đang được cập nhật!</div>
		<?php } ?>
	</div>
</div></div>
<div id="loadalbum"></div>