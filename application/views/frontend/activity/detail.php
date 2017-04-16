<div class="container"><div class="row">
<div class="col-md-12">
	<ul class="filter_news clearfix">
		<li class="float_left">
			<?php if($detail['type_image']){ ?>
				<img src="upload/menu/<?php echo $detail['type_image'];?>" alt="<?php echo isset($detail['type_name'])?$detail['type_name']:'';?>" />
			<?php } ?>
			<?php echo isset($detail['type_name'])?$detail['type_name']:'';?>
			<i class="fa fa-caret-down" aria-hidden="true"></i>
			<?php if(isset($type_activity) && $type_activity != NULL){ ?>
				<ul>
					<?php foreach ($type_activity as $key_type_activity => $val_type_activity) { 
						$url_activity = base_url().$val_type_activity['alias'].'-lv'.$val_type_activity['id'].'.html';
					?>
						<li><a href="<?php echo $url_activity;?>" title="<?php echo $val_type_activity['name'];?>">
						<?php if($val_type_activity['image']){ ?>
							<img src="upload/menu/<?php echo $val_type_activity['image'];?>" alt="<?php echo isset($val_type_activity['name'])?$val_type_activity['name']:'';?>" />
						<?php } ?>
						<?php echo $val_type_activity['name'];?></a></li>
					<?php } ?>
				</ul>
			<?php } ?>
		</li>
		<li class="float_left"><?php echo isset($detail['city_name'])?$detail['city_name']:'';?><i class="fa fa-caret-down" aria-hidden="true"></i>
			<?php if(isset($city) && $city != NULL){ ?>
				<ul>
					<?php foreach ($city as $key_city => $val_city) { 
						$url_activity_city = base_url().$detail['type_alias'].'-lv'.$detail['type_id'].'.html';
						?>
					<li><a href="<?php echo $url_activity_city;?>?city=<?php echo $val_city['id'];?>" title="<?php echo $val_city['name'];?>"><?php echo $val_city['name'];?></a></li>
					<?php } ?>
				</ul>
			<?php } ?>
		</li>
		<li class="float_right">
			<?php if($detail['link_prev'] != ''){ ?>
				<a href="<?php echo $detail['link_prev'];?>" title="Trước"><i class="fa fa-angle-double-left" aria-hidden="true"></i> <?php echo isset($data_index['_keys']['prev'])?$data_index['_keys']['prev']:'';?></a>
			<?php } ?>
			<?php if($detail['link_next'] != ''){ ?>
				<a href="<?php echo $detail['link_next'];?>" title="Tiếp"><?php echo isset($data_index['_keys']['next'])?$data_index['_keys']['next']:'';?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			<?php } ?>
		</li>
	</ul>
</div>
<div class="col-md-12">
	<?php if(isset($image_detail) && $image_detail != NULL){ ?>
		<div class="menuslide" id="newsdetailslide">
			<?php foreach ($image_detail as $key_img_detail => $val_img_detail) { ?>
		 	<div class="item">
	 			<?php if($key_img_detail == 0){ ?>
	 				<img class="lazy" data-original="upload/news/detail/<?php echo $val_img_detail['image'];?>" alt="<?php echo $name; ?>"/>
	 			<?php }else{ ?>
	 				<img src="upload/news/detail/<?php echo $val_img_detail['image'];?>" alt="<?php echo $name; ?>"/>
	 			<?php } ?>
		 	</div>
		  	<?php } ?>
		</div>
	<?php } ?>
</div>
<div class="clear height20" ></div>
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
		<div class="col-md-6">
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
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-1 text_right">
				</div>
				<div class="col-md-2 text_right">
				</div>
				<div class="col-md-2 text_right">
				</div>
				<div class="col-md-2 text_right">
				</div>
				<div class="col-md-2 text_right">
				<div class="row">
					<a href=""><i class="fa fa-print"></i></a>
				</div>
				</div>
				<div class="col-md-2 text_right">
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
<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="news_right">
		<div class="title"><?php echo isset($data_index['_keys']['info'])?$data_index['_keys']['info']:'';?></div>
		<div class="clear"></div>
		<ul>
			<?php if(isset($detail['type_name']) && $detail['type_name'] != ''){ ?>
			<li class="clearfix">
				<div class="col-md-3 col-sm-4 col-xs-4"><div class="row"><?php echo isset($data_index['_keys']['field'])?$data_index['_keys']['field']:'';?>:</div></div>
				<div class="col-md-9 col-sm-8 col-xs-8"><?php echo $detail['type_name'];?></div>
			</li>
			<?php } ?>
			<?php if($detail['address'] != ''){ ?>
			<li class="clearfix">
				<div class="col-md-3 col-sm-4 col-xs-4"><div class="row"><?php echo isset($data_index['_keys']['pos'])?$data_index['_keys']['pos']:'';?>:</div></div>
				<div class="col-md-9 col-sm-8 col-xs-8"><?php echo $detail['address'];?></div>
			</li>
			<?php } ?>
			<?php if($detail['website'] != ''){ ?>
			<li class="clearfix">
				<div class="col-md-3 col-sm-4 col-xs-4"><div class="row">Website:</div></div>
				<div class="col-md-9 col-sm-8 col-xs-8"><a href="<?php echo $detail['website'];?>" title="<?php echo $detail['website'];?>"><?php echo $detail['website'];?></a></div>
			</li>
			<?php } ?>
			<?php if($detail['hotline'] != ''){ ?>
			<li class="clearfix">
				<div class="col-md-3 col-sm-4 col-xs-4"><div class="row">Hotline:</div></div>
				<div class="col-md-9 col-sm-8 col-xs-8"><?php echo $detail['hotline'];?></div>
			</li>
			<?php } ?>
			<?php if($detail['fax'] != ''){ ?>
			<li class="clearfix">
				<div class="col-md-3 col-sm-4 col-xs-4"><div class="row">Fax:</div></div>
				<div class="col-md-9 col-sm-8 col-xs-8"><?php echo $detail['fax'];?></div>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
</div></div>
