<!-- REVOLUTION SLIDER -->
<link rel="stylesheet" type="text/css" href="css/fullwidth.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
<!-- main menu -->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

<!-- REVOLUTION SLIDER -->
<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>



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
				startwidth:1170,
				startheight:580,

				onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

				thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
				thumbHeight:50,
				thumbAmount:3,

				hideThumbs:200,
				navigationType:"none",				// bullet, thumb, none
				navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

				navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


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


				stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
				stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

				hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
				hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
				hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


				fullWidth:"on",

				shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

			});

});



</script>


<!-- Slider
======================================= -->  

<div class="container_full">   
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">    
		<ul>    
			<li data-transition="papercut" data-slotamount="9" data-thumb="#">			
				<img src="https://www.b4safe.com/public/frontend/images/sliders/slider-bg1.jpg" style="opacity: 1;" alt="" />			
				<div class="caption sfb" data-x="0" data-y="340" data-speed="900" data-start="900" data-easing="easeOutSine">
					<div class="display_text_center">
						<a href="#parallax_01" style="text-shadow: black 0.1em 0.1em 0.2em"  class="button_slider">Li&ecirc;n Hệ <i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>

				<div class="caption sfb stb"  data-x="0" data-y="280" data-speed="900" data-start="700" data-easing="easeOutExpo">
					<div class="display_text_center">
						<h3 style="text-shadow: black 0.1em 0.1em 0.2em">Cả thế giới thiệt hại hơn 1,2 Tỷ Đ&ocirc;-la V&igrave; Mất Thư Điện Tử*</h3>
					</div>
				</div>
				
				<div class="caption sfb stb"  data-x="-10" data-y="200" data-speed="900" data-start="1200" data-easing="easeOutExpo">
					<div class="display_text_center"><h2 style="text-shadow: black 0.1em 0.1em 0.2em">B4safe giảm thiểu chi ph&iacute; bảo vệ th&ocirc;ng tin</h2></div>
				</div>			
				<div class="caption sfr stb small_text3"  data-x="950" data-y="550" data-speed="900" data-start="2100" data-easing="easeOutExpo">
					*: B&aacute;o c&aacute;o của cục điều tra li&ecirc;n bang Mỹ (FBI) th&aacute;ng 08-2015
				</div>		   
			</li>
			<!-- SLIDE 3 --> 
			<li data-transition="papercut" data-slotamount="9" data-thumb="#">
				<img src="https://www.b4safe.com/public/frontend/images/sliders/slider-bg2.jpg" style="opacity: 1;" alt="" />		
				<div class="caption sfb" data-x="0" data-y="340" data-speed="900" data-start="900" data-easing="easeOutSine">
					<div class="display_text_center">
						<a href="#parallax_01" class="button_slider" style="text-shadow: black 0.1em 0.1em 0.2em">Li&ecirc;n Hệ <i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>
				<div class="caption sfb stb"  data-x="0" data-y="280" data-speed="900" data-start="700" data-easing="easeOutExpo">
					<div class="display_text_center"><h3 style="text-shadow: black 0.1em 0.1em 0.2em">Hơn 95% nguy&ecirc;n nh&acirc;n mất dữ liệu doanh nghiệp l&agrave; do nh&acirc;n vi&ecirc;n g&acirc;y ra*</h3>
					</div>
				</div>		
				<div class="caption sfb stb"  data-x="-10" data-y="200" data-speed="900" data-start="1200" data-easing="easeOutExpo">
					<div class="display_text_center"><h2 style="text-shadow: black 0.1em 0.1em 0.2em">B4safe bảo vệ th&ocirc;ng tin doanh nghiệp từ gốc rễ</h2></div>
				</div>		
				<div class="caption sfr stb small_text3"  data-x="950" data-y="550" data-speed="900" data-start="2100" data-easing="easeOutExpo">
					*: IBM 2015 Cyber Security Intelligence Index
				</div>			   
			</li>						 
		</ul>		
	</div>            
	</div>
</div><!-- end slider -->
