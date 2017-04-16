<?php if(isset($data_index['producthot']) && $data_index['producthot'] != NULL){ ?>
<div class="list_product">
	<div class="title_main title_main_index clearfix"><h2>Hot Product</h2></div>
	<div class="clear" style="height:15px;"></div>
	<div class="productslide cate_productslide" id="producthot">
		<?php foreach ($data_index['producthot'] as $key_producthot => $val_producthot) { 
			$url_producthot = base_url().$val_producthot['alias'].'-p'.$val_producthot['id'].'.html';
			$img_producthot = base_url().'upload/product/thumb/'.$val_producthot['image_thumb'];
		?>
	 	<div class="item">
		 	<a href="<?php echo $url_producthot; ?>">
		 		<div class="info-image">
		        	<img class="lazyOwl" data-src="<?php echo $img_producthot;
		        	?>" alt="<?php echo $val_producthot['title']; ?>" title="<?php echo $val_producthot['title']; ?>" >
		        </div>
		        <div class="info-des">
		            <h3 class="title"><?php echo $val_producthot['name']; ?></h3>
		            <div class="div_price">
			            <?php if($val_producthot['price_sale'] > 0){ ?>
			            <div class="col-md-7 col-sm-7 col-xs-7 clearfix"><div class="row">
			            <div class="price"><?php echo !empty($val_producthot['price_sale'])?number_format($val_producthot['price_sale'], 0, '.', '.').' $':$price; ?></div>
			            </div></div>
			            <?php } ?>
			            <div class="col-md-5 col-sm-5 col-xs-5 clearfix"><div class="row">
			            <div class="price <?php if($val_producthot['price_sale'] > 0){ ?> price_under <?php } ?>"><?php echo !empty($val_producthot['price'])?number_format($val_producthot['price'], 0, '.', '.').' $':$price; ?></div>
			            </div></div>
			            <div class="clear"></div>	            
		            </div>
		        </div>
		    </a>
		    <div class="clear"></div>
	        <div class="btn_hover">
	        	<a href="<?php echo $url_producthot;?>" class="detail">View Details</a>
	        </div>
	 	</div>
	  	<?php } ?>
	</div>
</div>
<?php } ?>