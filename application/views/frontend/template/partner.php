<?php if(isset($data_index['partner']) && $data_index['partner'] != NULL){ ?>
<div class="title"><a></a></div>
<div class="clear"></div>
<ul id="flexiselDemo3">
	<?php foreach ($data_index['partner'] as $key_partner => $val_partner) { 
         $img_partner = base_url().'upload/partner/'.$val_partner['image'];
    ?>
	<li>
		<a target="_blank" href="<?php echo $val_partner['url'];?>" title="<?php echo $val_partner['name'];?>">
			<img src="<?php echo $img_partner;?>" alt="<?php echo $val_partner['name'];?>" />
		</a>
	</li>
	<?php } ?>
</ul>
<?php } ?>