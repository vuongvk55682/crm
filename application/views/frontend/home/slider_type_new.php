<?php if(isset($type_news_home) && $type_news_home != NULL){ ?>
<div class="container"><div class="row">
	<div class="col-md-12"><div class="type_news_home">
		<div class="typeslide" id="typenews">
			<?php foreach ($type_news_home as $key_type_news_home => $val_type_news_home) {
				$url_news_home = base_url().$val_type_news_home['alias'].'-lv'.$val_type_news_home['id'].'.html';
			?>
		 	<div class="item">
			 	<a href="<?php echo $url_news_home;?>" title="<?php echo $val_type_news_home['name'];?>">
			 		<img src="upload/menu/<?php echo $val_type_news_home['image'];?>" alt="<?php echo $val_type_news_home['name'];?>"><?php echo $val_type_news_home['name'];?>
			 	</a>
		 	</div>
		  	<?php } ?>
		</div>
	</div></div>
</div></div>
<?php } ?>
