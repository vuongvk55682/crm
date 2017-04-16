<div class="container"><div class="row">
	<div class="list_news">
		<div class="clear"></div>
		<?php if(isset($album) && $album!=NULL){ ?>
			<?php foreach ($album as $key_album => $val_album) { 
				$url_album = $val_album['alias'].'-a'.$val_album['id'].'.html';
			?>
				<div class="col-md-3 clearfix">
					<div class="item_news">
						<a href="<?php echo $url_album;?>" title="<?php echo $val_album['name']; ?>">
							<img src="<?php echo base_url(); ?>upload/album/<?php echo $val_album['image']; ?>" alt="<?php echo $val_album['name']; ?>" title="<?php echo $val_album['name']; ?>">
						<h3><?php echo $val_album['name']; ?></h3></a>
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
