<?php if($product!=NULL){ 
	$img_product_detail = base_url().'upload/product/'.$product['image'];
	$img_product_detail_thumb = base_url().'upload/product/thumb/'.$product['image_thumb'];
	$url_brand_detail = base_url().$product['brand']['alias'].'-b'.$product['brand']['id'].'.html';
?>
	<link rel="stylesheet" href="public/elevatezoom/jquery.fancybox.css" /> 

	<script src="public/elevatezoom/jquery.elevatezoom.min.js" type="text/javascript"></script>

	<script type="text/javascript"> 
		$(document).ready(function(){
			$("#zoom_03").elevateZoom({
				zoomType: "inner",
				cursor: "crosshair",
				zoomWindowFadeIn: 500,
				zoomWindowFadeOut: 750,
				gallery:'gallery_01', 
				cursor: 'pointer', 
				galleryActiveClass: 'active', 
				imageCrossfade: true, 
				loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
			}); 

			//pass the images to Fancybox
			$("#zoom_03").bind("click", function(e) {  
			  var ez =   $('#zoom_03').data('elevateZoom');	
				$.fancybox(ez.getGalleryList());
			  return false;
			});
		});
	</script>
	<div class="list_product">
		<h1 class="title_main"><span><?php echo $name; ?></span></h1>
		<div class="clear"></div>
		<div class="<?php if(isset($image_detail) && $image_detail != NULL){ ?> col-md-5 col-sm-12 col-xs-12 <?php }else{ ?> col-md-5 col-sm-12 col-xs-12 <?php } ?> zoom_detail">
			<div class="box_img_product_detail">
				<?php if(isset($image_detail) && $image_detail!=NULL){ ?>
				<div class="col-md-4 col-sm-4 col-xs-4">
					<div id="gallery_01">
						<div class="item_img">
							<a href="#" data-image="<?php echo $img_product_detail_thumb; ?>" data-zoom-image="<?php echo $img_product_detail; ?>"> 
								<img src="<?php echo $img_product_detail_thumb; ?>" alt="<?php echo $product['title']; ?>" title="<?php echo $product['title']; ?>" /></a>
						</div>
						<?php foreach ($image_detail as $key_image_detail => $val_image_detail) { ?>
						<div class="item_img">
							<a href="#" data-image="<?php echo base_url(); ?>upload/product/detail/thumb/<?php echo $val_image_detail['image_thumb']; ?>" data-zoom-image="<?php echo base_url(); ?>upload/product/detail/<?php echo $val_image_detail['image']; ?>"> 
								<img src="<?php echo base_url(); ?>upload/product/detail/thumb/<?php echo $val_image_detail['image_thumb']; ?>" alt="<?php echo $product['title']; ?>" title="<?php echo $product['title']; ?>" /> 
							</a>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
				<div class="<?php if(isset($image_detail) && $image_detail!=NULL){ ?> col-md-12 col-sm-12 col-xs-12 <?php }else{ ?> col-md-9 col-sm-9 col-xs-9 <?php } ?>">
					<img id="zoom_03" width="300" src="<?php echo $img_product_detail; ?>" data-zoom-image="<?php echo $img_product_detail; ?>" alt="<?php echo $product['title']; ?>"/>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="<?php if(isset($image_detail) && $image_detail!=NULL){ ?> col-md-6 col-sm-12 col-xs-12 <?php }else{ ?> col-md-7 col-sm-12 col-xs-12 <?php } ?>">
			<div class="box_info_product_detail">
				<h1 class="name"><?php echo $product['name']; ?></h1>
				<div class="clear"></div>
				<div class="slide_detail">
					<?php if(isset($image_detail) && $image_detail!=NULL){ ?>
					<div id="product_detail" class="owl-theme">
						<img class="lazyOwl" data-src="<?php echo $img_product_detail; ?>" alt="<?php echo $product['name']; ?>">
						<?php foreach ($image_detail as $key_image_detail => $val_image_detail) { ?>
					 	<img class="lazyOwl" data-src="<?php echo base_url(); ?>upload/product/detail/thumb/<?php echo $val_image_detail['image_thumb']; ?>" alt="<?php echo $product['name']; ?>">
					  	<?php } ?>
					</div>
					<?php }else{ ?>
						<img src="<?php echo $img_product_detail; ?>" alt="<?php echo $product['name']; ?>">
					<?php } ?>
				</div>
				<div class="clear"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="left">
							<div class="price <?php if($product['price_sale'] > 0){ ?> price_unline <?php } ?>">Price <span><?php if($product['price'] > 0){ echo number_format($product['price']).' ₫';}else{ echo $price; }?></span> </div>
							<?php if($product['price_sale'] > 0){ ?>
							<div class="price">In company <span><?php echo number_format($product['price_sale']).' ₫';?></span><span class="VAT">(Include VAT)</span> </div>
							<?php } ?>
							<?php if($product['profit'] > 0){ ?>
								<div class="profit">Sale 
									<span>
										<?php echo number_format($product['profit']);?> ₫
										<?php if($product['percent'] > 0){ ?>
											(<?php echo $product['percent'];?> %)
										<?php } ?>
									</span>
								</div>
							<?php } ?>
							<?php if($product['des'] != ''){ ?>
								<div class="des"><?php echo $product['des'];?></div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php if($product['service'] != ''){ ?>
				<div class="clear"></div>
				<div class="item-shipping">
				    <div class="item-promotion-title">
				        <h2>Dịch vụ & khuyến mãi</h2>
				    </div>
				    <div class="service">
				    	<?php echo $product['service'];?>
				    </div>
				</div>
				<?php } ?>
				<div class="clear"></div>
				<div class="quantity-box clearfix">
	                <p class="quantity-label">Number:</p>
	                <div class="quantity-col1">
	                    <p class="tiki-number-input">
	                        <div class="input-group bootstrap-touchspin">
		                        <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
		                        <input id="qty" type="tel" name="qty" value="1" min="1" max="100" class="form-control" style="display: block;">
		                        <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
		                        <span class="input-group-btn-vertical">
		                        <button onclick="upQty();" class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button>
		                        <button onclick="downQty();" class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button>
		                        </span>
	                        </div>
	                    </p>
	                </div>
	                <input id="product_id_for_wishlist" name="id" type="hidden" value="95677">
	                <div class="quantity-col2">
						<button onClick="addcart(<?php echo $product['id'];?>);" class="add-to-cart js-add-to-cart is-css" type="button" data-original-title="">
	                        <span class="icon">
	                            <i class="fa fa-shopping-cart"></i>
	                        </span>
	                        <span class="text">
	                            Add to cart
	                        </span>
	                    </button>
	                    
	                </div>
	            </div>
	            <div class="clear"></div>
				
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo $product['content'];?>
	</div>
	<div class="clear"></div>
	<?php if(isset($product_same) && $product_same != NULL){ ?>
	<div class="list_product">
		<div class="title_main title_main_index clearfix"><h2><a>Sản phẩm cùng loại</a></h2>
		</div>
		<div class="clear" style="height:15px;"></div>
		<div class="productslide cate_productslide" id="productsame">
			<?php foreach ($product_same as $key_product_same => $val_product_same) { 
				$url_product_same = base_url().$val_product_same['alias'].'-p'.$val_product_same['id'].'.html';
				$img_product_same = base_url().'upload/product/thumb/'.$val_product_same['image_thumb'];
			?>
		 	<div class="item">
			 	<a href="<?php echo $url_product_same; ?>">
			 		<div class="info-image">
			        	<img class="lazyOwl" data-src="<?php echo $img_product_same;
			        	?>" alt="<?php echo $val_product_same['title']; ?>" title="<?php echo $val_product_same['title']; ?>" >
			        </div>
			        <div class="info-des">
			            <h3 class="title"><?php echo $val_product_same['name']; ?></h3>
			            <?php /*<div class="div_price">
				            <div class="col-md-5 col-sm-5 col-xs-5 clearfix"><div class="row">
				            <div class="price <?php if($val_product_same['price_sale'] > 0){ ?> price_under <?php } ?>"><?php echo !empty($val_product_same['price'])?number_format($val_product_same['price'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
				            </div></div>
				            <?php if($val_product_same['price_sale'] > 0){ ?>
				            <div class="col-md-7 col-sm-7 col-xs-7 clearfix"><div class="row">
				            <div class="price"><?php echo !empty($val_product_same['price_sale'])?number_format($val_product_same['price_sale'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
				            </div></div>
				            <?php } ?>
				            <div class="clear"></div>
				            
			            </div>*/?>
			        </div>
			        <?php /*<?php if($val_product_same['percent'] > 0){ ?>
			        <div class="percent">
			            -<?php echo $val_product_same['percent'];?>%
			        </div>
			        <?php } ?>*/?>
			    </a>
			    <div class="clear"></div>
		        <?php /*<div class="btn_hover">
		        	<a href="<?php echo $val_product_same['id']; ?>" class="detail" title="Mua nhanh">Chi tiết</a>
		        </div>*/?>
		 	</div>
		  	<?php } ?>
		</div>
	</div>
	<?php } ?>
	<div class="clear"></div>
	<?php if($product['video'] != ''){ ?>
		<div class="clear"></div>
		<div class="title_main title_main_index clearfix"><h2><a>Video</a></h2>
			</div>
		<div class="clear"></div>
		<div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $product['video'];?>" frameborder="0" allowfullscreen></iframe></div>
	<?php } ?>
	
    <div class="clear"></div>

<?php } ?>


