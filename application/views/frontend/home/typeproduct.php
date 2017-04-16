<?php if(isset($menu) && $menu!=NULL){ ?>
<?php foreach ($menu as $key_menu => $val_menu) { 
	$stt_menu = $key_menu + 1;
	$url_menu = base_url().$val_menu['alias'].'-t'.$val_menu['id'].'.html';
?>
<div class="list_product clearfix">
	<div class="title_main title_main_index clearfix"><h2><a href="<?php echo $url_menu;?>" title="<?php echo $val_menu['name'];?>"><?php echo $val_menu['name'];?></a>
	</h2></div>
	<div class="clear"></div>
    <?php if(isset($val_menu['product']) && $val_menu['product']!=NULL){ ?>
		<?php foreach ($val_menu['product'] as $key_product => $val_product) { 
			$url = base_url().$val_product['alias'].'.html';
		?>
			<div class="col-md-4 col-sm-4 col-xs-6 clearfix">
				<div class="item clearfix">
					<a href="<?php echo $url;?>" title="<?php echo $val_product['name']; ?>">
						<div class="info-image">
				        	<img class="lazy" src="<?php echo base_url(); ?>upload/product/thumb/<?php echo $val_product['image_thumb']; ?>" alt="<?php echo $val_product['title']; ?>" data-src="<?php echo base_url(); ?>upload/product/thumb/<?php echo $val_product['image_thumb']; ?>" title="<?php echo $val_product['title']; ?>" >
				        </div>
				        <div class="info-des">
				            <h3 class="title"><?php echo $val_product['name']; ?></h3>
				            <?php /*<div class="div_price">
					            <?php if($val_product['price_sale'] > 0){ ?>
					            <div class="col-md-7 col-sm-7 col-xs-7 clearfix"><div class="row">
					            <div class="price"><?php echo !empty($val_product['price_sale'])?number_format($val_product['price_sale'], 0, '.', '.').' $':$price; ?></div>
					            </div></div>
					            <?php } ?>
					            <div class="col-md-5 col-sm-5 col-xs-5 clearfix"><div class="row">
					            <div class="price <?php if($val_product['price_sale'] > 0){ ?> price_under <?php } ?>"><?php echo !empty($val_product['price'])?number_format($val_product['price'], 0, '.', '.').' $':$price; ?></div>
					            </div></div>
					            <div class="clear"></div>	            
				            </div> */?>
				        </div>
			        </a>
			        <?php /*<div class="btn_hover">
			        	<a href="<?php echo $url;?>" class="detail">Chi tiết</a>
			        </div>*/?>
			    </div>
		    </div>
		<?php } ?>
		<div class="clear" style="height: 10px;"></div>
    <?php } ?>
</div>
<?php } ?>
<?php } ?>

