<div class="item_result_search clearfix">
	<?php if(isset($result_type) && $result_type != NULL){ ?>
	<ul class="result_type">
		<?php foreach ($result_type as $key_result_type => $val_result_type) {
			$url_result_type = base_url().$val_result_type['alias'].'-t'.$val_result_type['id'].'.html'; 
		?>
			<li class="clearfix"><div class="col-md-12 col-sm-12 col-xs-12"><a href="<?php echo $url_result_type;?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $val_result_type['name'];?></a></div></li>
		<?php } ?>
	</ul>
	<?php } ?>
	<div class="clear"></div>
	<?php if(isset($result_product) && $result_product != NULL){ ?>
	<ul class="result_pro">
	<?php foreach ($result_product as $key_result_product => $val_result_product) {
		$url_result = base_url().$val_result_product['alias'].'-p'.$val_result_product['id'].'.html'; 
		$img_result = base_url().'upload/product/thumb/'.$val_result_product['image_thumb'];
	?>
		<li class="clearfix"><a href="<?php echo $url_result;?>"><div class="col-md-9 col-sm-9 col-xs-8">
		<img src="<?php echo $img_result;?>" alt="<?php echo $val_result_product['name'];?>"><?php echo $val_result_product['name'];?>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-4 price"><div class="row"><?php echo number_format($val_result_product['price']);?> VNĐ</div></div>
		</a></li>
	<?php } ?>
	</ul>
	<?php } ?>
</div>
