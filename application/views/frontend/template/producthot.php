<?php if(isset($data_index['producthot']) && $data_index['producthot'] != NULL){ ?>
<div id="product_hot" class="clearfix">
<div class="titles"><span>Sản phẩm nổi bật</span></div>
<div class="clear" style="height:40px;"></div>
<div id="producthot" class="productslide cate_productslide">
	<?php foreach ($data_index['producthot'] as $key_producthot => $val_producthot) { 
		$url = base_url().$val_producthot['alias'].'-p'.$val_producthot['id'].'.html';
	?>
    	<div class="item">
			<div class="info-image">
	        	<a href="<?php echo $url; ?>"><img class="lazy" src="<?php echo base_url(); ?>upload/product/thumb/<?php echo $val_producthot['image_thumb']; ?>" alt="<?php echo $val_producthot['title']; ?>" data-src="<?php echo base_url(); ?>upload/product/thumb/<?php echo $val_producthot['image_thumb']; ?>" title="<?php echo $val_producthot['title']; ?>" ></a>
	        </div>
	        <div class="info-des">
	            <h3 class="title"><a href="<?php echo $url; ?>"><?php echo $val_producthot['name']; ?></a></h3>
	            <div class="div_price">
	            	<div class="price"><?php echo !empty($val_producthot['price'])?number_format($val_producthot['price'], 0, '.', '.').' <sup>đ</sup>':''; ?></div>
	            </div>
	        </div>
	        <div class="btn_hover">
	        	<a href="dat-hang.html?id=<?php echo $val_producthot['id']; ?>" class="btn bg-orange" title="Mua nhanh"><i class="fa fa-shopping-cart"></i></a>
	        	<a href="<?php echo $url; ?>" class="btn bg-maroon" title="Xem chi tiết"><i class="fa fa-search"></i></a>
	        </div>
    	</div>
    <?php } ?>
</div>
</div>
<?php } ?>
<div class="clear" style="height: 40px;"></div>