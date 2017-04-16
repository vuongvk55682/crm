<div class="col-md-3">
	<div class="info_login clearfix">
		<div class="title clearfix">
			<?php if($data_index['info_user']['avatar_thumb'] != ''){ ?>
	            <img src="upload/user/thumb/<?php echo $data_index['info_user']['avatar_thumb'];?>" class="img-circle" alt="User Image" />
	        <?php }else{ ?>
	            <img src="public/bootstrap/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
	        <?php } ?>
	        Tài khoản
	        <h3><?php echo $data_index['info_user']['fullname'];?></h3>
		</div>
		<div class="clear"></div>
		<ul>
			<li><a href="thong-tin-chung.html">Thông tin chung</a></li>
			<li><a href="thong-tin-tai-khoan.html">Thông tin tài khoản</a></li>
			<li><a href="so-dia-chi.html">Số địa chỉ</a></li>
			<li><a href="thong-tin-don-hang.html">Đơn hàng của tôi</a></li>
			<li><a href="san-pham-danh-gia.html">Sản phẩm đánh giá</a></li>
			<li class="active"><a href="de-danh-mua-sau.html">Để danh mua sau</a></li>
			<li><a href="danh-sach-san-pham-yeu-thich.html">Danh sách yêu thích</a></li>
			<li><a href="hoi-dap.html">Hỏi đáp</a></li>
			<li><a href="quan-ly-xu.html">Quản lý xu</a></li>
		</ul>
	</div>
</div>
<div class="col-md-9">
	<h1 class="have-margin"><?php echo $title;?></h1>
	<div class="list_product">
		<?php if(isset($product) && $product != NULL){ ?>
			<?php foreach ($product as $key_product => $val_product) { 
				$url_product = base_url().$val_product['alias'].'-p'.$val_product['id'].'.html';
				$img_product = base_url().'upload/product/thumb/'.$val_product['image_thumb'];
			?>
			<div class="<?php if(isset($show) && $show == 2){ ?> col-md-12 col-sm-12 col-xs-12 <?php }else{ ?> col-md-3 col-sm-3 col-xs-6 <?php } ?>clearfix del<?php echo $val_product['id']; ?>"><div class="row">
			 	<div class="item">
				 	<a href="<?php echo $url_product; ?>">
				 		<div class="info-image">
				        	<img class="lazyclick" data-original="<?php echo $img_product;
				        	?>" alt="<?php echo $val_product['title']; ?>" title="<?php echo $val_product['title']; ?>" >
				        	<a class="del" onClick="delDeDanh(<?php echo $val_product['id'];?>,<?php echo $data_index['info_user']['id'];?>);" title="Xóa sản phẩm để dành mua sau"><img src="public/images/icon/trash.png" alt=""></a>
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
			 </div></div>
		  	<?php } ?>
		  	<div class="clear"></div>
			<div id="pagination">
		    	<?php echo isset($list_pagination)?$list_pagination:''; ?>
		    </div>
		<?php }else{ ?>
    		<div class="div_error_like">Chưa có sản phẩm nào được để dànhm...</div>
    	<?php } ?>
	</div>
	<?php echo isset($content)?$content:''; ?>
	<div class="clear"></div>
</div>

