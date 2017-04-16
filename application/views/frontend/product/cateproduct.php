<h1 class="title_hidden"> <?php echo $title; ?></h1>
<div class="col-md-9">
	<?php if(isset($menuslide) && $menuslide != NULL){ ?>
	<div class="menuslide" id="menuslide0">
		<?php foreach ($menuslide as $key_menuslider => $val_menuslider) { ?>
	 	<div class="item">
	 		<a href="<?php echo $val_menuslider['url']; ?>" title="<?php echo $val_menuslider['name']; ?>">
	 			<img src="upload/menuslide/<?php echo $val_menuslider['image'];?>" alt="<?php echo $title; ?>"/>
	 		</a>
	 	</div>
	  	<?php } ?>
	</div>
	<?php } ?>
	<div class="clear height20"></div>
	<div class="cate_product_right">
		<?php if(isset($cate_child_right) && $cate_child_right != NULL){ ?>
			<?php foreach ($cate_child_right as $key_cate_child_right => $val_cate_child_right) { 
				$url_cate_child_right = base_url().$val_cate_child_right['alias'].'-t'.$val_cate_child_right['id'].'.html';
			?>
				<h2 class="title"><a href="<?php echo $url_cate_child_right;?>" title="<?php echo $val_cate_child_right['name'];?>"><?php echo $val_cate_child_right['name'];?></a>
					<a href="<?php echo $url_cate_child_right;?>" class="btn-gradiant see-all" title="<?php echo $val_cate_child_right['name'];?>"> Xem tất cả <i class="fa fa-angle-right"></i></a></h2>
				<div class="clear"></div>
				<div class="list_product">
					<?php if(isset($val_cate_child_right['product']) && $val_cate_child_right['product'] != NULL){ ?>
						<div class="productslide cate_productslide" id="productbanchay<?php echo $key_cate_child_right;?>">
							<?php foreach ($val_cate_child_right['product'] as $key_product => $val_product) { 
								$url_product = base_url().$val_product['alias'].'-p'.$val_product['id'].'.html';
								$img_product = base_url().'upload/product/thumb/'.$val_product['image_thumb'];
							?>
						 	<div class="item">
							 	<a href="<?php echo $url_product; ?>">
							 		<div class="info-image">
							        	<img <?php if($key_product < 4){ ?> class="lazyclick" data-original <?php }else{ ?> class="lazyOwl" data-src <?php } ?> ="<?php echo $img_product;
							        	?>" alt="<?php echo $val_product['title']; ?>" title="<?php echo $val_product['title']; ?>" >
							        </div>
							        <div class="info-des">
							            <h3 class="title"><?php echo $val_product['name']; ?></h3>
							            <div class="div_price">
								            <div class="col-md-5 col-sm-5 col-xs-12 clearfix"><div class="row">
								            <div class="price <?php if($val_product['price_sale'] > 0){ ?> price_under <?php } ?>"><?php echo !empty($val_product['price'])?number_format($val_product['price'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
								            </div></div>
								            <?php if($val_product['price_sale'] > 0){ ?>
								            <div class="col-md-7 col-sm-7 col-xs-12 clearfix"><div class="row">
								            <div class="price"><?php echo !empty($val_product['price_sale'])?number_format($val_product['price_sale'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
								            </div></div>
								            <?php } ?>
								            <div class="clear"></div>
								            <div class="stars-existing starrr readonly" productid="<?php echo $val_product['id']; ?>" data-rating='<?php echo isset($val_product['percent_star'])?$val_product['percent_star']:0;?>'></div>
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
						        	<a href="<?php echo $val_product['id']; ?>" class="detail" title="Mua nhanh">View Detail</a>
						        </div>
						 	</div>
						  	<?php } ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<div id="wp_left" class="col-md-3">
	<div class="cate_product_left">
		<div class="title">Danh mục sản phẩm</div>
		<div class="clear"></div>
		<?php if(isset($cate_child_left) && $cate_child_left != NULL){ ?>
		<ul>
			<?php foreach ($cate_child_left as $key_cate_child_left => $val_cate_child_left) { 
				$url_cate_child_left = base_url().$val_cate_child_left['alias'].'-t'.$val_cate_child_left['id'].'.html';
			?>
				<li><a href="<?php echo $url_cate_child_left;?>" title="<?php echo $val_cate_child_left['name'];?>"><?php echo $val_cate_child_left['name'];?></a>
					<?php if(isset($val_cate_child_left['child2']) && $val_cate_child_left['child2'] != NULL){ ?>
					<ul>
						<?php foreach ($val_cate_child_left['child2'] as $key_cate_child_left2 => $val_cate_child_left2) { 
							$url_cate_child_left2 = base_url().$val_cate_child_left2['alias'].'-t'.$val_cate_child_left2['id'].'.html';
						?>
							<li><a href="<?php echo $url_cate_child_left2;?>" title="<?php echo $val_cate_child_left2['name'];?>"><?php echo $val_cate_child_left2['name'];?></a>
								
							</li>
						<?php } ?>
					</ul>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
		<?php } ?>
	</div>
	<?php $this->load->view('frontend/template/productbanchay'); ?>
</div>	