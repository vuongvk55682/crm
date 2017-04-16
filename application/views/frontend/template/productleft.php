<?php if($product_left!=NULL){ ?>
	<?php foreach ($product_left as $key_product_left => $val_product_left) { 
		$url = base_url().$val_product_left['alias'].'-p'.$val_product_left['id'].'.html';
	?>
	    <div class="col-md-12 col-sm-4 col-xs-6">
	    <div class="row">
		    <div class="item clearfix">
				<div class="info-image">
		        	<a href="<?php echo $url; ?>"><img src="<?php echo base_url(); ?>upload/product/thumb/<?php echo $val_product_left['image_thumb']; ?>" alt="<?php echo $val_product_left['title']; ?>" title="<?php echo $val_product_left['title']; ?>"></a>
		        </div>
		        <div class="info-des">
		            <h3 class="title"><a href="<?php echo $url; ?>"><?php echo $val_product_left['name']; ?></a></h3>
		            <div class="col-md-6 col-sm-6 col-xs-6 clearfix">
		            <div class="price <?php if($val_product_left['price_sale'] > 0){ ?> price_under <?php } ?>"><?php echo !empty($val_product_left['price'])?number_format($val_product_left['price'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
		            </div>
		            <?php if($val_product_left['price_sale'] > 0){ ?>
		            <div class="col-md-6 col-sm-6 col-xs-6 clearfix">
		            <div class="price"><?php echo !empty($val_product_left['price_sale'])?number_format($val_product_left['price_sale'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
		            </div>
		            <?php } ?>
		        </div>
		        <?php if($key_product_left < count($product_left) - 1){ ?> <div class="item_line"></div> <?php } ?>
		    </div>
	    </div>
	    </div>
	<?php } ?>
<?php } ?>