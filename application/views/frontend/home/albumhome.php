<div class="container"><div class="row">
	<?php if(isset($type_news_istop) && $type_news_istop != NULL){ ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="type_homes">
			<a href="<?php echo $type_news_istop['alias'];?>-tn<?php echo $type_news_istop['id'];?>.html" title="">
				<div class="title"><?php echo $type_news_istop['name'];?></div>
				<div class="clear"></div>
				<img src="upload/menu/<?php echo $type_news_istop['image'];?>" alt="<?php echo $type_news_istop['name'];?>" class="news_img" />
			</a>
			<div class="clear"></div>
			<div class="content">
				<?php echo $type_news_istop['content'];?>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if(isset($type_news_ishome) && $type_news_ishome != NULL){ ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="type_homes">
			<div class="title"><?php echo $type_news_ishome['name'];?></div>
			<div class="clear"></div>
			<img src="upload/menu/<?php echo $type_news_ishome['image'];?>" alt="<?php echo $type_news_ishome['name'];?>" class="news_img" />
			<div class="clear"></div>
			<?php if(isset($type_news_ishome['news'])){ ?>
			<ul>
				<?php foreach ($type_news_ishome['news'] as $key_news_homes => $val_news_homes) {
					$url_type_news_ishome = base_url().$val_news_homes['alias'].'-n'.$val_news_homes['id'].'.html';
				?>
					<li><a href="<?php echo $url_type_news_ishome;?>" title="<?php echo $val_news_homes['name'];?>">
					<img src="upload/news/icon/<?php echo $val_news_homes['icon'];?>" alt="<?php echo $val_news_homes['name'];?>"/>
					<?php echo $val_news_homes['name'];?></a></li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<?php if(isset($type_news_isbanner) && $type_news_isbanner != NULL){ ?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="type_homes">
			<a href="<?php echo $type_news_isbanner['alias'];?>-tn<?php echo $type_news_isbanner['id'];?>.html" title="">
				<div class="title"><?php echo $type_news_isbanner['name'];?></div>
				<div class="clear"></div>
				<img src="upload/menu/<?php echo $type_news_isbanner['image'];?>" alt="<?php echo $type_news_isbanner['name'];?>" class="news_img" />
			</a>
			<div class="clear"></div>
			<div class="content">
				<?php echo $type_news_isbanner['content'];?>
			</div>
			<div class="clear"></div>
			<?php if(isset($type_news_isbanner['child']) && $type_news_isbanner['child'] != NULL){ ?>
			<ul>
				<?php foreach($type_news_isbanner['child'] as $key_type_news_isbanner_child => $val_type_news_isbanner_child) { ?>
					<li><a href="<?php echo $val_type_news_isbanner_child['link'];?>" title="<?php echo $val_type_news_isbanner_child['name'];?>" >
					<img src="upload/menu/<?php echo $val_type_news_isbanner_child['image'];?>" alt="<?php echo $val_type_news_isbanner_child['name'];?>"/>
					<?php echo $val_type_news_isbanner_child['name'];?></a></li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
</div></div>