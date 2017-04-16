<?php if(isset($newshome) && $newshome != NULL){ ?>
<div class="news_home">
	<div class="container"><div class="row">
		<div class="col-md-12">
		<div class="title"><?php echo isset($data_index['_keys']['news'])?$data_index['_keys']['news']:'';?></div></div>
		<div class="clear"></div>
		<?php foreach ($newshome as $key_newshome => $val_newshome) {
			$img_newshome = base_url().'upload/news/'.$val_newshome['image'];
			$url_newshome = base_url().$val_newshome['alias'].'-n'.$val_newshome['id'].'.html';
		?>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="item">
					<a href="<?php echo $url_newshome;?>" title="<?php echo $val_newshome['title'];?>">
						<img src="<?php echo $img_newshome;?>" alt="<?php echo $val_newshome['title'];?>" />
						<h4><?php echo $val_newshome['name'];?></h4>
					</a>
				</div>
			</div>
		<?php } ?>
	</div></div>
</div>
<?php } ?> 