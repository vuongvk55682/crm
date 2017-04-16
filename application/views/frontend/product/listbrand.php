<h1 class="title_hidden"><?php echo $name; ?></h1>

<div class="col-md-9">
	<div class="filter">
		<div class="filter-list-box">
            <h1><?php echo $name; ?></h1>
            <h4><?php if($number_product > 0){ ?>(<?php echo $number_product;?>)<?php } ?></h4>
        </div>
        <div class="clear"></div>
		<div class="option-box clearfix">
		    <div class="view-box pull-right">
		        <div class="btn-group pull-left sort-box page-box hidden-xs">
		            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
		                <span class="title">Hiển thị:
		                	<?php if(isset($limit) && $limit != ''){ echo $limit; }else{ echo '24'; } ?>
		                </span>
		                <span class="caret"></span>
		            </button>
		            <ul class="dropdown-menu page-limit" role="menu">
		                <li><a onClick="showNumber(24);">24</a></li>
		                <li><a onClick="showNumber(32);">32</a></li>
		                <li><a onClick="showNumber(40);">40</a></li>
		            </ul>
		        </div>

		        <div class="btn-group btn-group-sm">
		            <button onClick="showMode('grid');" title="Lưới" type="button" class="product-mode-grid btn btn-default <?php if(isset($show) && $show == 1){ ?> active <?php } ?>"><i class="fa fa-th"></i></button>
		            <button onClick="showMode('list');" title="Danh sách" type="button" class="product-mode-list btn btn-default <?php if(isset($show) && $show == 2){ ?> active <?php } ?>"><i class="fa fa-th-list"></i></button>
		        </div>
		    </div>

		    <div class="sort-box-holder pull-left">
		        <div class="btn-group pull-left sort-box hidden-lg">
		            <a href="#boxleft-wrap" class="btn btn-default btn-sm btn-filter">
		                Bộ lọc <i class="fa fa-angle-right"></i>
		            </a>
		        </div>

		        <div class="btn-group pull-left sort-box has-separator">
		            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
		                <span class="title">
		                	<?php if(isset($n_price) && $n_price == 1){ ?>
		                		Giá: Thấp đến Cao
		                	<?php }else if(isset($n_price) && $n_price == 2){?>
		                		Giá: Cao đến Thấp
		                	<?php }else if(isset($n_price) && $n_price == 4){?>
		                		Hàng mới nhập
		                	<?php }else if(isset($n_price) && $n_price == 5){?>
		                		Sản phẩm chọn lọc
		                	<?php }else if(isset($n_price) && $n_price == 6){?>
		                		Bán chạy nhất
		                	<?php }else if(isset($n_price) && $n_price == 7){?>
		                		Giảm giá nhiều nhất
		                	<?php }else{ ?>
		                		Sản phẩm chọn lọc
		                	<?php } ?>
		                </span>
		                <span class="caret"></span>
		            </button>
		            <ul class="sort-list dropdown-menu" role="menu">
		                <li data-order="top_seller"><a onClick="showOrder('order','banchay')">Bán chạy nhất</a></li>
		                <li data-order="discount_percent,desc"><a onClick="showOrder('order','sale')">Giảm giá nhiều nhất</a></li>
		                <li><a onClick="showOrder('id','desc')">Hàng mới nhập</a></li>
		                <li><a onClick="showOrder('price','asc')">Giá: Thấp đến Cao</a></li>
		                <li><a onClick="showOrder('price','desc')">Giá: Cao đến Thấp</a></li>
		                <li data-order="position"><a onClick="showOrder('order','choose')">Sản phẩm chọn lọc</a></li>
		            </ul>
		        </div>

		        <!-- Best discounts -->
		        <div class="btn-group pull-left sort-box hidden-sm hidden-xs">
		            <button onClick="showOrder('order','sale')" class="btn btn-default btn-sm js-sort-btn <?php if(isset($n_price) && $n_price == 7){ ?> active <?php } ?>" type="button" data-order="discount_percent,desc">
		                <span class="title">Giảm giá nhiều nhất</span>
		            </button>
		        </div>

		        <!-- Best sellers -->
		        <div class="btn-group pull-left sort-box hidden-sm hidden-xs">
		            <button onClick="showOrder('order','banchay')" class="btn btn-default btn-sm js-sort-btn <?php if(isset($n_price) && $n_price == 6){ ?> active <?php } ?>" type="button" data-order="top_seller">
		                <span class="title">Bán chạy nhất</span>
		            </button>
		        </div>

		        <!-- Price low to high -->
		        <div class="btn-group pull-left sort-box hidden-sm hidden-xs">
		            <button onClick="showOrder('price','asc')" class="btn btn-default btn-sm js-sort-btn <?php if(isset($n_price) && $n_price == 1){ ?> active <?php } ?>" type="button">
		                <span class="title">Giá: Thấp đến Cao</span>
		            </button>
		        </div>
		    </div>
		</div>
	</div> 
	<div class="clear"></div>
	<div class="list_product">
		<?php if(isset($product) && $product != NULL){ ?>
			<?php foreach ($product as $key_product => $val_product) { 
				$url_product = base_url().$val_product['alias'].'-p'.$val_product['id'].'.html';
				$img_product = base_url().'upload/product/thumb/'.$val_product['image_thumb'];
			?>
				<?php if(isset($show) && $show == 1){ ?>
				<div class="col-md-3 col-sm-3 col-xs-6 clearfix"><div class="row">
				 	<div class="item">
					 	<a href="<?php echo $url_product; ?>">
					 		<div class="info-image">
					        	<img class="lazyclick" data-original="<?php echo $img_product;
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
				        	<a href="dat-hang.html?id=<?php echo $val_product['id']; ?>" class="btn btn-large btn-block btn-default" title="Mua nhanh"><img src="public/images/icon/ico10.png" height="14" width="18" alt="">Thêm vào giỏ hàng</a>
				        </div>
				 	</div>
				</div></div>
				<?php if(($key_product + 1) % 4 == 0){ ?> <div class="clear"></div> <?php } ?>
				<?php }else{ ?>
					<div class="col-md-12 col-sm-12 col-xs-12 clearfix"><div class="row">
					 	<div class="item item_list"><div class="row">
						 	<div class="col-md-3 col-sm-3 col-xs-4"><a href="<?php echo $url_product; ?>" title="<?php echo $val_product['title']; ?>">
						 		<div class="info-image">
						        	<img class="lazyclick" data-original="<?php echo $img_product;
						        	?>" alt="<?php echo $val_product['title']; ?>" title="<?php echo $val_product['title']; ?>" >
						        </a></div>
						    </div>
						    <div class="col-md-9 col-sm-9 col-xs-8">
						        <div class="info-des"><a href="<?php echo $url_product; ?>" title="<?php echo $val_product['title']; ?>">
						            <h3 class="title"><?php echo $val_product['name']; ?></h3>
						            <div class="div_price">
						            	<?php if($val_product['price_sale'] > 0){ ?>
							            <div class="price"><?php echo !empty($val_product['price_sale'])?number_format($val_product['price_sale'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
							            <?php } ?>
							            <?php if($val_product['percent'] > 0){ ?>
								        <div class="percent_list">
								            -<?php echo $val_product['percent'];?>%
								        </div>
								        <?php } ?>
							            <div class="clear"></div>
							            <div class="price <?php if($val_product['price_sale'] > 0){ ?> price_under <?php } ?>"><?php echo !empty($val_product['price'])?number_format($val_product['price'], 0, '.', '.').' <sup>đ</sup>':$price; ?></div>
						            </div>
						        </a></div>
						        <div class="clear" style="height:10px;"></div>
						        <?php if($val_product['description_like'] != ''){ ?>
							        <div class="description_like">
							            <?php echo $val_product['description_like'];?>
							            <a href="<?php echo $url_product; ?>" title="<?php echo $val_product['title']; ?>">Xem chi tiết <i class="fa fa-caret-right"></i></a>
							        </div>
						        <?php } ?>
						        <div class="clear" style="height:10px;"></div>
						        <div class="btn_hover_list">
						        	<a href="dat-hang.html?id=<?php echo $val_product['id']; ?>" class="btn btn-large btn-default" title="Mua nhanh"><img src="public/images/icon/ico10.png" height="14" width="18" alt="">Thêm vào giỏ hàng</a>
						        </div>
						    </div>
					 	</div></div>
					</div></div>
				<?php } ?>
		  	<?php } ?>
		  	<div class="clear"></div>
			<div id="pagination">
		    	<?php echo isset($list_pagination)?$list_pagination:''; ?>
		    </div>
		<?php }else{ ?>
    		<div class="col-md-12">Chưa có sản phẩm...</div>
    	<?php } ?>
	</div>
	<div class="introduce-content">
		<?php echo isset($content)?$content:''; ?>
	</div>
	<div class="clear"></div>
</div>
<div class="col-md-3 hidden-sm hidden-xs">
	<div class="cate_product_left">
		<div class="title">Danh mục sản phẩm</div>
		<div class="clear"></div>
		<?php if(isset($cate_child_left) && $cate_child_left != NULL){ ?>
		<div class="cate_active"><a href="" title="<?php echo $name; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $name; ?></a></div>
		<ul>
			<?php foreach ($cate_child_left as $key_cate_child_left => $val_cate_child_left) { 
				$url_cate_child_left = base_url().$val_cate_child_left['alias'].'-t'.$val_cate_child_left['id'].'.html';
			?>
				<li><a href="<?php echo $url_cate_child_left;?>" title="<?php echo $val_cate_child_left['name'];?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo $val_cate_child_left['name'];?> <?php if($val_cate_child_left['number_product'] > 0){ echo '('.$val_cate_child_left['number_product'].')'; } ?></a>
					<?php if(isset($val_cate_child_left['child2']) && $val_cate_child_left['child2'] != NULL){ ?>
					<ul>
						<?php foreach ($val_cate_child_left['child2'] as $key_cate_child_left2 => $val_cate_child_left2) { 
							$url_cate_child_left2 = base_url().$val_cate_child_left2['alias'].'-t'.$val_cate_child_left2['id'].'.html';
						?>
							<li><a href="<?php echo $url_cate_child_left2;?>" title="<?php echo $val_cate_child_left2['name'];?>"><?php echo $val_cate_child_left2['name'];?><?php if($val_cate_child_left2['number_product'] > 0){ echo '('.$val_cate_child_left2['number_product'].')'; } ?></a>
								
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
