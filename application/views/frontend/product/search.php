<div class="list_product">
	<h1 class="title_main"><span><i class="fa fa-heartbeat"></i> <?php echo $title; ?></span></h1>
	<div class="col-md-12"> 
	<?php echo isset($content)?$content:''; ?>
	</div>
	<div class="clear"></div>
	<?php if(isset($product) && $product!=NULL){ ?>
	<?php foreach ($product as $key_product => $val_product) { 
		$url = base_url().$val_product['alias'].'-p'.$val_product['id'].'.html';
		$img_product = base_url().'upload/product/thumb/'.$val_product['image_thumb'];
	?>
		<div class="<?php if(isset($show) && $show == 2){ ?> col-md-12 col-sm-12 col-xs-12 <?php }else{ ?> col-md-3 col-sm-4 col-xs-6 <?php } ?>clearfix">
		<div class="row">
			<div class="<?php if(isset($show) && $show == 2){ ?> item_list <?php }else{?> item <?php } ?>clearfix">
				<a href="<?php echo $url; ?>">
			 		<div class="info-image">
			        	<img class="lazyclick" data-original="<?php echo $img_product;
			        	?>" alt="<?php echo $val_product['title']; ?>" title="<?php echo $val_product['title']; ?>" >
			        </div>
			        <div class="info-des">
			            <h3 class="title"><?php echo $val_product['name']; ?></h3>
			            <div class="div_price">
				            <div class="col-md-5 col-sm-5 col-xs-5 clearfix"><div class="row">
				            <div class="price <?php if($val_product['price_sale'] > 0){ ?> price_under <?php } ?>"><?php echo !empty($val_product['price'])?number_format($val_product['price'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
				            </div></div>
				            <?php if($val_product['price_sale'] > 0){ ?>
				            <div class="col-md-7 col-sm-7 col-xs-7 clearfix"><div class="row">
				            <div class="price"><?php echo !empty($val_product['price_sale'])?number_format($val_product['price_sale'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
				            </div></div>
				            <?php } ?>
			            </div>
			        </div>
			        <?php if($val_product['percent'] > 0){ ?>
			        <div class="percent">
			            -<?php echo $val_product['percent'];?>%
			        </div>
			        <?php } ?>
			    </a>
			    <div class="clear"></div>
		        <div class="btn_hover">
		        	<a href="dat-hang.html?id=<?php echo $val_product['id']; ?>" class="btn btn-large btn-block btn-default" title="Mua nhanh"><img src="public/images/icon/ico10.png" height="14" width="18" alt="">Thêm vào giỏ hàng</a>
		        </div>
		    </div>
	    </div>
	    </div>
	<?php } ?>
	<div class="clear"></div>
	<div id="pagination">
    <?php echo isset($list_pagination)?$list_pagination:''; ?>
    </div>
    <?php }else{ ?>
    	<div class="col-md-12">Đang được cập nhật...</div>
    <?php } ?>
</div>
<div class="full_load_view"></div>
