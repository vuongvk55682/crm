<div class="list_news">
	<h1 class="col-md-12 title_main"><span><?php echo $name; ?></span></h1>
	<div class="clear"></div>
	<?php if(isset($news) && $news!=NULL){ ?>
	<?php if(count($news)>1) { ?>
		<?php foreach ($news as $key_news => $val_news) { 
			$url = base_url().$val_news['alias'].'-n'.$val_news['id'].'.html';
		?>
			<?php if($_type['shows'] == 1){ ?>
				<div class="col-md-3 clearfix">
					<div class="box-news-grid">
						<a href="<?php echo $url;?>">
							<img src="<?php echo base_url(); ?>upload/news/<?php echo $val_news['image']; ?>" alt="<?php echo $val_news['name']; ?>" title="<?php echo $val_news['name']; ?>">
							<h3><?php echo $val_news['name']; ?></h3>
						</a>
					</div>
				</div>
			<?php }else{ ?>
				<div class="col-md-6 box-news clearfix">
					<a href="<?php echo $url;?>">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<img src="<?php echo base_url(); ?>upload/news/<?php echo $val_news['image']; ?>" alt="<?php echo $val_news['name']; ?>" title="<?php echo $val_news['name']; ?>">
					</div>
					<div class="col-md-8 col-sm-8 col-xs-12">
						<h3><?php echo $val_news['name']; ?></h3></a>
						<?php echo $val_news['description']; ?>
					</div>
				</div>
				<?php if(($key_news + 1) % 2 == 0){ ?> <div class="clear"></div> <?php } ?>
			<?php } ?>
		<?php } ?>
		<div class="clear"></div>
        <?php echo isset($list_pagination)?$list_pagination:''; ?>
	<?php }else{ ?>
		<h2 class="name"><?php echo $news[0]['name']; ?></h2>
		<h3 class="description"><?php echo $news[0]['description']; ?></h3>
		<div class="content"><?php echo $news[0]['content']; ?></div>
	<?php } ?>
	<?php }else{ ?>
		<div class="col-md-12">Nội dung đang được cập nhật!</div>
	<?php } ?>
</div>
