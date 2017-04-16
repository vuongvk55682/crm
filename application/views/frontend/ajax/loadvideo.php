<script type="text/javascript">
  $(document).ready(function(){
    $('.close').click(function(){
    	$('#loadalbum').css('display','none');
        $('#loadalbum').html('');
    });
  });
</script>
<style type="text/css">
	
</style>
<div class="loadalbum">
	<div class="title">
		<?php echo $video['name'];?>
		<a class="close">x</a>
	</div>
	<div class="clear"></div>
	<?php if(isset($video) && $video != NULL){ ?>
		<iframe width="100%" height="415" src="https://www.youtube.com/embed/<?php echo $video['url'];?>" frameborder="0" allowfullscreen></iframe>
	<?php } ?>
</div>