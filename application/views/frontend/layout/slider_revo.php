<!-- REVOLUTION SLIDER -->
<script type="text/javascript">
	var tpj=jQuery;
	tpj.noConflict();
	tpj(document).ready(function() {
	if (tpj.fn.cssOriginal!=undefined)
	tpj.fn.css = tpj.fn.cssOriginal;
	var api = tpj('.fullwidthbanner').revolution(
	{
		delay:9000,
		startwidth:1200,
		startheight:420,

		onHoverStop:"on",
		thumbWidth:100,
		thumbHeight:50,
		thumbAmount:3,

		hideThumbs:200,
		navigationType:"none",				// bullet, thumb, none
		navigationArrows:"solo",

		navigationStyle:"round",
		navigationHAlign:"center",				// Vertical Align top,center,bottom
		navigationVAlign:"bottom",					// Horizontal Align left,center,right
		navigationHOffset:30,
		navigationVOffset:-40,

		soloArrowLeftHalign:"left",
		soloArrowLeftValign:"center",
		soloArrowLeftHOffset:0,
		soloArrowLeftVOffset:0,

		soloArrowRightHalign:"right",
		soloArrowRightValign:"center",
		soloArrowRightHOffset:0,
		soloArrowRightVOffset:0,

		touchenabled:"on",						// Enable Swipe Function : on/off


		stopAtSlide:-1,
		stopAfterLoops:-1,

		hideCaptionAtLimit:0,
		hideAllCaptionAtLilmit:0,		
		hideSliderAtLimit:0,
		fullWidth:"on",
		shadow:0
	});
});
</script>
<?php if(isset($data_index['slider']) && $data_index['slider'] != NULL){ ?>
<div class="slider">
<div class="container_full">   
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">    
			<ul>	
				<?php foreach ($data_index['slider'] as $key_slider => $val_slider) { ?>
			  		<li data-transition="papercut" data-slotamount="9" data-thumb="#"><img src="upload/slider/<?php echo $val_slider['image'];?>" alt="<?php echo $val_slider['name'];?>" style="opacity: 1;" alt="" /></li>
			  	<?php } ?>	 
			</ul>		
		</div>            
	</div>
</div>
</div>
<?php } ?><!-- end slider -->