<?php if(isset($newshot) && $newshot != NULL){ ?>
<div class="list_newshot">
	<div class="productslide cate_productslide" id="productbrand">
		<?php foreach ($newshot as $key_newshot => $val_newshot) { 
			$url_newshot = base_url().$val_newshot['alias'].'-l'.$val_newshot['id'].'.html';
			$img_newshot = base_url().'upload/news/'.$val_newshot['image'];
		?>
	 	<div class="item">
		 	<a href="<?php echo $url_newshot; ?>">
	        	<img class="lazyOwl" data-src="<?php echo $img_newshot;
	        	?>" alt="<?php echo $val_newshot['title']; ?>" title="<?php echo $val_newshot['title']; ?>" >

	            <h3 class="title"><?php echo $val_newshot['name']; ?></h3>
		    </a>
	 	</div>
	  	<?php } ?>
	</div>
</div>
<?php } ?>