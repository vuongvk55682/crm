<div class="container"><div class="row">
	<div class="col-md-12">
		<ul class="filter_news clearfix">
			<li class="float_left">
				<?php if($image){ ?>
					<img src="upload/menu/<?php echo $image;?>" alt="<?php echo isset($name)?$name:'';?>" />
				<?php } ?>
				<?php echo isset($name)?$name:'';?>
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
			<li class="float_left"><?php if(isset($cityid) && $cityid > 0){ ?> <?php echo $city_name;?> <?php }else{ ?> Thành phố <?php } ?><i class="fa fa-caret-down" aria-hidden="true"></i>
				<?php if(isset($city) && $city != NULL){ ?>
					<ul>
						<?php foreach ($city as $key_city => $val_city) { ?>
							<li><a href="<?php echo $url;?>?city=<?php echo $val_city['id'];?>" title="<?php echo $val_city['name'];?>"><?php echo $val_city['name'];?></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</li>
		</ul>
	</div>
	<div class="list_news">
		<h1 class="col-md-12 title_main"><span><?php echo $name; ?></span></h1>
		<div class="clear"></div>
		<?php if(isset($news) && $news!=NULL){ ?>
			<?php foreach ($news as $key_news => $val_news) { 
				$url = base_url().$val_news['alias'].'-l'.$val_news['id'].'.html';
			?>
				<div class="col-md-3 clearfix">
					<div class="item_news">
						<a href="<?php echo $url;?>">
							<img src="<?php echo base_url(); ?>upload/news/<?php echo $val_news['image']; ?>" alt="<?php echo $val_news['name']; ?>" title="<?php echo $val_news['name']; ?>">
						<h3><?php echo $val_news['name']; ?></h3></a>
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