<div class="container"><div class="row">
<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="news_left">
	<?php if($parentid == 0){ ?>
		<?php if(isset($newsleft) && $newsleft != NULL){ ?>
		<ul class="type">
			<?php foreach ($newsleft as $key_newsleft => $val_newsleft) {
				$url_newsleft = base_url().$val_newsleft['alias'].'-n'.$val_newsleft['id'].'.html'; 
			?>
				<li <?php if($detail['id'] == $val_newsleft['id']){ ?> class="active" <?php } ?>><a href="<?php echo $url_newsleft;?>" title="<?php echo $val_newsleft['name'];?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $val_newsleft['name'];?></a></li>
			<?php } ?>
		</ul>
		<?php } ?>
	<?php }else{ ?>
		<div class="title"><?php echo $type_name;?></div>
		<div class="clear"></div>
		<?php if(isset($type) && $type != NULL){ ?>
		<ul class="type">
			<?php foreach ($type as $key_type => $val_type) {
				$url_type = base_url().$val_type['alias'].'-tn'.$val_type['id'].'html'; 
			?>
				<li <?php if($detail['typeid'] == $val_type['id']){ ?> class="active" <?php } ?>><a href="<?php echo $url_type;?>" title="<?php echo $val_type['name'];?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $val_type['name'];?></a></li>
			<?php } ?>
		</ul>
		<?php } ?>
	<?php } ?>
	</div>
</div>
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="list_news">
	<h1 class="title_main"><span><?php echo $name; ?></h1>
	<div class="clear"></div>
	<?php if($detail!=NULL){ ?>
		<h2 class="name"><?php echo $detail['name']; ?></h2>
		<h3 class="description"><?php echo $detail['description']; ?></h3>
		<div class="date"><i class="fa fa-calendar"></i> <?php echo $detail['created']; ?> <i class="fa fa-user"></i> <?php echo $detail['username']; ?></div>
		<div class="content"><?php echo $detail['content']; ?></div>
		<div class="clear" style="height:10px;"></div>
		<div class="col-md-6 col-xs-9">
			<div class="row">
			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style ">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
			<a class="addthis_button_tweet"></a>
			<a class="addthis_button_pinterest_pinit"></a>
			<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-513375c7395449c1"></script>
			<!-- AddThis Button END -->
			</div>
		</div>
		<div class="col-md-6 col-xs-3">
			<div class="row">
				<div class="col-md-1 text_right hidden-xs">
				</div>
				<div class="col-md-2 text_right hidden-xs">
				</div>
				<div class="col-md-2 text_right hidden-xs">
				</div>
				<div class="col-md-2 text_right hidden-xs">
				</div>
				<div class="col-md-2 col-xs-1 text_right">
				<div class="row">
					<a href=""><i class="fa fa-print"></i></a>
				</div>
				</div>
				<div class="col-md-2 col-xs-2 text_right">
				<div class="row">
					<i class="fa fa-eye"></i> <?php echo $detail['is_view']; ?>
				</div>
				</div>
			</div>
		</div>
	<?php }else{ ?>
		<div class="content">Nội dung đang được cập nhật</div>
	<?php } ?>
	<div class="clear"></div>
	<?php if(isset($news) && $news != NULL) { ?>
	<div class="title_main"><i class="fa fa-heartbeat"></i> Bài viết khác</div>
		<?php foreach ($news as $key_news => $val_news) { 
			$url = base_url().$val_news['alias'].'-n'.$val_news['id'].'.html';
		?>
			<div class="col-md-12 box-news">
				<a href="<?php echo $url;?>">
				<div class="col-md-4">
					<img src="<?php echo base_url(); ?>upload/news/<?php echo $val_news['image']; ?>" alt="<?php echo $val_news['name']; ?>" title="<?php echo $val_news['name']; ?>">
				</div>
				<div class="col-md-8">
					<h3><?php echo $val_news['name']; ?></h3></a>
					<?php echo $val_news['description']; ?>
				</div>
			</div>
			<div class="clear"></div>
		<?php } ?>
	<?php } ?>
</div>
</div>
</div></div>
