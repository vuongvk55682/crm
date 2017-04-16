<link href="public/owlcarousel/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" href="public/owlcarousel/owl.theme.css">
<script src="public/bootstrap/js/jQuery-2.1.4.min.js"></script>
<script src="public/owlcarousel/owl.carousel.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.close').click(function(){
    	$('#loadalbum').css('display','none');
        $('#loadalbum').html('');
    });
    $('#productalbum').owlCarousel({
	    rewindNav : false,
		afterLazyLoad: true,
    	singleItem:true,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
	});
  });
</script>
<style type="text/css">
	#productalbum .item{
		text-align: center;
	}
	#productalbum .item img{
		max-width: 100%;
	}
</style>
<div class="loadalbum">
	<div class="title">
		<?php echo $album['name'];?>
		<a class="close">x</a>
	</div>
	<div class="clear"></div>
	<?php if(isset($album_image) && $album_image != NULL){ ?>
	<div class="list_album_image">
		<div class="productslide cate_productslide" id="productalbum">
			<?php foreach ($album_image as $key_album_image => $val_album_image) { 
				$img_album_image = base_url().'upload/album/detail/'.$val_album_image['image'];
			?>
		 	<div class="item">
		        <img class="lazyOwl" data-src="<?php echo $img_album_image;
		        	?>" alt="<?php echo $album['name'];?>" title="<?php echo $album['name'];?>" >
		 	</div>
		  	<?php } ?>
		</div>
	</div>
	<?php } ?>
</div>