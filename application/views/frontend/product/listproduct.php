<h1 class="title_hidden"><?php echo $name; ?></h1>
<?php if($image_qc !=''){ ?>
<div class="div_image_qc">
	<a href="<?php echo $link_qc;?>" title="<?php echo $name; ?>" target="_blank">
		<img  src="upload/menu/<?php echo $image_qc;?>" alt="<?php echo $name; ?>" />
	</a>
</div>
<div class="clear" style="height:10px;"></div>
<?php } ?>
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
	                <span class="title">Show:
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

	    <?php /*<div class="sort-box-holder pull-left">
	        <div class="btn-group pull-left sort-box hidden-lg">
	            <a href="#boxleft-wrap" class="btn btn-default btn-sm btn-filter">
	                Bộ lọc <i class="fa fa-angle-right"></i>
	            </a>
	        </div>

	        <div class="btn-group pull-left sort-box has-separator">
	            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
	                <span class="title">
	                	<?php if(isset($n_price) && $n_price == 1){ ?>
	                		Price: Low to High
	                	<?php }else if(isset($n_price) && $n_price == 2){?>
	                		Price: High to Low
	                	<?php }else if(isset($n_price) && $n_price == 4){?>
	                		New Products
	                	<?php }else if(isset($n_price) && $n_price == 5){?>
	                		Choose Products
	                	<?php }else{ ?>
	                		Choose products
	                	<?php } ?>
	                </span>
	                <span class="caret"></span>
	            </button>
	            <ul class="sort-list dropdown-menu" role="menu">
	                <li data-order="top_seller"><a onClick="showOrder('order','banchay')">Bán chạy nhất</a></li>
	                <li data-order="discount_percent,desc"><a onClick="showOrder('order','sale')">Giảm giá nhiều nhất</a></li>
	                <li><a onClick="showOrder('id','desc')">New Product</a></li>
	                <li><a onClick="showOrder('price','asc')">Price: Low to High</a></li>
	                <li><a onClick="showOrder('price','desc')">Price: High to Low</a></li>
	                <li data-order="position"><a onClick="showOrder('order','choose')">Sản phẩm chọn lọc</a></li>
	            </ul>
	        </div>

	        <!-- Best discounts -->
	        <div class="btn-group pull-left sort-box hidden-sm hidden-xs">
	            <button onClick="showOrder('order','sale')" class="btn btn-default btn-sm js-sort-btn <?php if(isset($n_price) && $n_price == 7){ ?> active <?php } ?>" type="button" data-order="discount_percent,desc">
	                <span class="title">Losers Top</span>
	            </button>
	        </div>
	        <!-- Price low to high -->
	        <div class="btn-group pull-left sort-box hidden-sm hidden-xs">
	            <button onClick="showOrder('price','asc')" class="btn btn-default btn-sm js-sort-btn <?php if(isset($n_price) && $n_price == 1){ ?> active <?php } ?>" type="button">
	                <span class="title">Price: Low to High</span>
	            </button>
	        </div>
	    </div>*/?>
	</div>
</div> 
<div class="clear height20"></div>
<div class="list_product">
	<?php if(isset($product) && $product != NULL){ ?>
		<?php foreach ($product as $key_product => $val_product) { 
			$url_product = base_url().$val_product['alias'].'.html';
			$img_product = base_url().'upload/product/thumb/'.$val_product['image_thumb'];
		?>
			<?php if(isset($show) && $show == 1){ ?>
			<div class="col-md-4 col-sm-4 col-xs-6 clearfix">
			 	<div class="item">
				 	<a href="<?php echo $url_product; ?>">
				 		<div class="info-image">
				        	<img class="lazyclick" data-original="<?php echo $img_product;
				        	?>" alt="<?php echo $val_product['title']; ?>" title="<?php echo $val_product['title']; ?>" >
				        </div>
				        <div class="info-des">
				            <h3 class="title"><?php echo $val_product['name']; ?></h3>
				           
				        </div>
				    </a>
				    
			 	</div>
			</div>
			<?php if(($key_product + 1) % 3 == 0){ ?> <div class="clear"></div> <?php } ?>
			<?php }else{ ?>
				<div class="col-md-12 col-sm-12 col-xs-12 clearfix"><div class="row">
				 	<div class="item item_list"><div class="row">
					 	<div class="col-md-2 col-sm-3 col-xs-4"><a href="<?php echo $url_product; ?>" title="<?php echo $val_product['title']; ?>">
					 		<div class="info-image">
					        	<img class="lazyclick" data-original="<?php echo $img_product;
					        	?>" alt="<?php echo $val_product['title']; ?>" title="<?php echo $val_product['title']; ?>" >
					        </a></div>
					    </div>
					    <div class="col-md-10 col-sm-9 col-xs-8">
					        <div class="info-des"><a href="<?php echo $url_product; ?>" title="<?php echo $val_product['title']; ?>">
					            <h3 class="title"><?php echo $val_product['name']; ?></h3>
					            
					        </a></div>
					        
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
<?php if($content != ''){ ?>
<div class="introduce-content">
	<?php echo isset($content)?$content:''; ?>
</div>
<?php } ?>
<div class="clear"></div>


