<?php if(isset($data_index['newshome']) && $data_index['newshome'] != NULL){ ?>
<div class="news_hot" class="clearfix">
	<ul class="clearfix">
	<?php foreach ($data_index['newshome'] as $key_newshome => $val_newshome) { 
		$url_newshome = base_url().$val_newshome['alias'].'.html';
		$img_newshome = base_url().'upload/news/'.$val_newshome['image'];
	?>
		<li class="clearfix"><a href="<?php echo $url_newshome;?>"><img src="<?php  echo $img_newshome;?>" alt="<?php echo $val_newshome['name'];?>"/> <h3><?php echo $val_newshome['name'];?></h3></a></li>
		<div class="clear"></div>
    <?php } ?>
    </ul>
</div>
<?php } ?>