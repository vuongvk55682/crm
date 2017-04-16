<div id="boxleft-wrap">
	<div class="panel panel-info">
	    <div class="panel-heading" role="tab" id="heading-bestseller">
	        <h4 class="panel-title">
	            <a class="accordion-toggle" data-toggle="collapse" data-parent="#boxleft" href="#collapse-bestseller" aria-expanded="true" aria-controls="collapse-bestseller">
	                Top 100 Điện Gia Dụng bán chạy
	            </a>
	        </h4>
	    </div>
	    <div id="collapse-bestseller" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-bestseller">
	        <div class="bestseller-list">
	            <a href="san-pham-ban-chay.html" class="btn-gradiant see-all">
	                Xem tất cả Top 100 trong tuần <i class="fa fa-angle-right"></i>
	            </a>
	            <?php if(isset($product_banchay) && $product_banchay != NULL){ ?>
	            	<?php foreach ($product_banchay as $key_banchay_left => $val_banchay_left) { 
	            		$url_product_banchay = base_url().$val_banchay_left['alias'].'-p'.$val_banchay_left['id'].'.html';
	            		$img_product_banchay = base_url().'upload/product/thumb/'.$val_banchay_left['image_thumb'];
	            		$stt__product_banchay = $key_banchay_left + 1;
	            	?>
		    		<div class="bestseller-item clearfix">
					    <p class="image">
					        <a href="<?php echo $url_product_banchay;?>" title="<?php echo $val_banchay_left['title'];?>"><img src="<?php echo $img_product_banchay;?>"></a>
					        <span class="rank rank3"><?php echo $stt__product_banchay;?></span>
					    </p>
					    <p class="name">
					        <a href="<?php echo $url_product_banchay;?>" title="<?php echo $val_banchay_left['title'];?>">
					            <?php echo $val_banchay_left['name'];?></a>
					    </p>
					    <?php if($val_banchay_left['percent'] > 0){ ?>
		                	<p class="saleoff"><span>-<?php echo $val_banchay_left['percent'];?>%</span></p>
		                <?php } ?>
		        		<p class="price"><?php echo number_format($val_banchay_left['price']);?>&nbsp;₫</p>
					</div>
					<?php } ?> 
					<div class="clear"></div>  
				<?php } ?>        
	            <a href="san-pham-ban-chay.html" class="btn-gradiant see-all">
	                Xem tất cả Top 100 trong tuần  <i class="fa fa-angle-right"></i>
	            </a>
	        </div>
	    </div>
	</div>
</div>