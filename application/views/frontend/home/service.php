<?php if(isset($service) && $service != NULL){ ?>
<div class="container"><div class="row">
	<?php foreach ($service as $key_service => $val_service) { ?>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="s_item clearfix">
				<div class="col-md-3 col-sm-3 col-xs-2">
					<img src="upload/service/thumb/<?php echo $val_service['image_thumb'];?>" alt="<?php echo $val_service['name'];?>"/>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-10">
					<h3><?php echo $val_service['name'];?></h3>
					<?php echo $val_service['description'];?>
				</div>
			</div>
		</div>
	<?php } ?>
</div></div>
<?php } ?>
