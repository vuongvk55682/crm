<link rel="stylesheet" href="public/flexslider/demo/css/demo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="public/flexslider/demo/css/flexslider.css" type="text/css" media="screen" />
<script type="text/javascript">
	$(window).load(function(){
	    $('#carousel_album').flexslider({
	        animation: "slide",
	        controlNav: false,
	        animationLoop: false,
	        slideshow: false,
	        itemWidth: 98,
	        itemMargin: 8,
	        asNavFor: '#slider_album'
	    });

	    $('#slider_album').flexslider({
	        animation: "slide",
	        controlNav: false,
	        animationLoop: false,
	        slideshow: false,
	        sync: "#carousel_album",
	        start: function(slider){
	          $('body').removeClass('loading');
	        }
	    });
	});
</script>

<div class="container"><div class="row">
<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="album_left">
		<div class="title"><?php echo $menu_album['name'];?></div>
		<?php if(isset($menu_album['child']) && $menu_album['child']){ ?>
			<ul class="type">
			<?php foreach ($menu_album['child'] as $key_menu_album => $val_menu_album) { 
				$url_menu_album = $val_menu_album['alias'].'-ta'.$val_menu_album['id'].'.html';
			?>
				<li><a href="<?php echo $url_menu_album;?>" title="<?php echo $val_menu_album['name'];?>"><?php echo $val_menu_album['name'];?></a></li>
			<?php } ?>
			</ul>
		<?php } ?>
	</div>
</div>
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="list_news">
	<h1 class="title_main"><span><?php echo $name; ?></h1>
	<div class="clear"></div>
	<?php if(isset($album_image) && $album_image != NULL){ ?>
	<div id="slider_album" class="flexslider">
      	<ul class="slides">
      		<?php foreach ($album_image as $key_album_image => $val_album_image) { ?>
	        <li>
		    	<img src="upload/album/detail/<?php echo $val_album_image['image'];?>" />
			</li>	
			<?php } ?>	
      	</ul>
    </div>
    <div id="carousel_album" class="flexslider">
      	<ul class="slides">
      		<?php foreach ($album_image as $key_album_image => $val_album_image) { ?>
	        <li>
		    	<img src="upload/album/detail/<?php echo $val_album_image['image'];?>" />
			</li>
			<?php } ?>		
      	</ul>
    </div>
    <?php } ?>
</div>
</div>
</div></div>
<script defer src="public/flexslider/demo/js/jquery.flexslider.js"></script>
