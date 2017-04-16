<h1 class="title_hidden"><?php echo $name; ?></h1>

<div class="col-md-12 list_brand">
	<?php if(isset($brand) && $brand != NULL){ ?>
		<?php foreach ($brand as $key_brand => $val_brand) { 
			$url_brand = base_url().$val_brand['alias'].'-b'.$val_brand['id'].'.html';
		?>
			<div class="col-md-2 col-sm-3 col-xs-6 clearfix"><div class="row">
				<div class="item">
				<a href="<?php echo $url_brand;?>" title="<?php echo $val_brand['name'];?>">
					<img src="upload/brand/<?php echo $val_brand['image'];?>" alt="<?php echo $val_brand['name'];?>" />
					<h3><?php echo $val_brand['name'];?></h3>
				</a>
				</div>
			</div></div>
		<?php } ?>
	<?php } ?>
</div>