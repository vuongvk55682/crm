<?php if(isset($data_index['typeleft']) && $data_index['typeleft'] != NULL){ ?>
	<ul class="clearfix">
		<?php foreach ($data_index['typeleft'] as $key_menu => $val_menu) { 
			$url = base_url().$val_menu['alias'].'-t'.$val_menu['id'].'.html';
		?>
			<li><a href="<?php echo $url;?>" title="<?php echo $val_menu['name'];?>"><i class="fa fa-angle-double-right"></i> <?php echo $val_menu['name'];?></a></li>
		<?php } ?>
	</ul>
<?php } ?>