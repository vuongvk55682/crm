<?php if($product_same!=NULL){ ?>
	<?php foreach ($product_same as $key_product => $val_product) { 
		$url = base_url().$val_product['alias'].'-p'.$val_product['id'].'.html';
	?>
	    <div class="col-md-12 col-sm-4 col-xs-6">
	    <div class="row">
		    <div class="item clearfix">
				<div class="info-image">
		        	<a href="<?php echo $url; ?>"><img src="<?php echo base_url(); ?>upload/product/thumb/<?php echo $val_product['image_thumb']; ?>" alt="<?php echo $val_product['title']; ?>" title="<?php echo $val_product['title']; ?>"></a> 
		        </div>
		        <div class="info-des">
		            <h3 class="title"><a href="<?php echo $url; ?>"><?php echo $val_product['name']; ?></a></h3>
		            <div class="col-md-6 col-sm-6 col-xs-6 clearfix">
		            <div class="price <?php if($val_product['price_sale'] > 0){ ?> price_under <?php } ?>"><?php echo !empty($val_product['price'])?number_format($val_product['price'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
		            </div>
		            <?php if($val_product['price_sale'] > 0){ ?>
		            <div class="col-md-6 col-sm-6 col-xs-6 clearfix">
		            <div class="price"><?php echo !empty($val_product['price_sale'])?number_format($val_product['price_sale'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
		            </div>
		            <?php } ?>
		        </div>
		        <?php if($key_product < count($product_same) - 1){ ?> <div class="item_line"></div> <?php } ?>
		    </div>
	    </div>
	    </div>
	<?php } ?>
<?php } ?>