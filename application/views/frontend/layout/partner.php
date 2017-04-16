<?php if(isset($partner) && $partner != NULL){ ?>
<div class="container"><div class="row">
	<div class="list_partner">
		<div class="productslide" id="partner">
			<?php foreach ($partner as $key_partner => $val_partner) { 
				$img_partner = base_url().'upload/partner/'.$val_partner['image'];
			?>
		 	<div class="item">
			 	<a href="<?php echo $val_partner['url'];?>" title="<?php echo $val_partner['name'];?>" target="_blank">
			 		<img src="<?php echo $img_partner;?>" alt="<?php echo $val_partner['name'];?>" />
			    </a>
		 	</div>
		  	<?php } ?>
		</div>
	</div>
</div></div>
<?php } ?>