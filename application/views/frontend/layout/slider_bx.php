<div class="slider">
	<div class="col-lg-2 col-md-3 hidden-sm hidden-xs type_left"><div class="row">
		<?php $this->load->view('frontend/template/typeproduct'); ?>
	</div></div>
	<div class="col-lg-8 col-md-9 item_slider"><div class="row">
	<?php if(isset($data_index['slider']) && $data_index['slider'] != NULL){ ?>
	<ul class="bxslider">
		<?php foreach ($data_index['slider'] as $key_slider => $val_slider) { ?>
	  	<li id="<?php echo $key_slider;?>"><img src="upload/slider/<?php echo $val_slider['image'];?>" alt="<?php echo $val_slider['name'];?>" /></li>
	  	<?php } ?>
	</ul>
	<?php } ?>
	</div></div>
	<div class="col-lg-2 hidden-md hidden-sm hidden-xs"><div class="row">
		<?php $this->load->view('frontend/template/bxslider_producthot'); ?>
	</div></div>
</div>
<script type="text/javascript">
	(function($){
  		$(function(){
  			$('.bxslider').bxSlider({
		  		auto:true,
		  		mode:'horizontal',
		  		controls:false,
		  		buildPager: function(slideIndex){
				    switch(slideIndex){
				    <?php foreach ($data_index['slider'] as $key_slider => $val_slider) { ?>
				      	case <?php echo $key_slider;?>:
				        	return '<?php echo $val_slider['name'];?>';
				    <?php } ?>
				    }
				},
				onSlideAfter: function(slideElement){
				    // do mind-blowing JS stuff here
				    var id = slideElement.attr('id');
				    if(id == 0){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider6');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider');
				    }
				    if(id == 1){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider1');
				    }
				    if(id == 2){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider2');
				    }
				    if(id == 3){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider2');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider3');
				    }
				    if(id == 4){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider3');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider4');
				    }
				    if(id == 5){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider4');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider5');
				    }
				    if(id == 6){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider5');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider6');
				    }
				    if(id == 7){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider6');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider7');
				    }

				},
				onSlideBefore: function(slideElement){
				    // do mind-blowing JS stuff here
				    var id = slideElement.attr('id');
				    if(id == 0){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider3 bg_slider5 bg_slider6 bg_slider4');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider');
				    }
				    if(id == 1){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider4 bg_slider2 bg_slider3 bg_slider5 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider1');
				    }
				    if(id == 2){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider4 bg_slider3 bg_slider5 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider2');
				    }
				    if(id == 3){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider4 bg_slider5 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider3');
				    }
				    if(id == 4){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider3 bg_slider5 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider4');
				    }
				    if(id == 5){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider3 bg_slider4 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider5');
				    }
				    if(id == 6){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider3 bg_slider5 bg_slider4 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider6');
				    }

				},
				onSlideNext: function(slideElement){
				    // do mind-blowing JS stuff here
				    var id = slideElement.attr('id');
				    if(id == 0){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider6');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider');
				    }
				    if(id == 1){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider1');
				    }
				    if(id == 2){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider2');
				    }
				    if(id == 3){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider2');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider3');
				    }
				    if(id == 4){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider3');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider4');
				    }
				    if(id == 5){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider4');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider5');
				    }
				    if(id == 6){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider5');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider6');
				    }
				    if(id == 7){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider6');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider7');
				    }

				},
				onSlidePrev: function(slideElement){
				    // do mind-blowing JS stuff here
				    var id = slideElement.attr('id');
				    if(id == 0){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider3 bg_slider5 bg_slider6 bg_slider4');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider');
				    }
				    if(id == 1){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider4 bg_slider2 bg_slider3 bg_slider5 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider1');
				    }
				    if(id == 2){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider4 bg_slider3 bg_slider5 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider2');
				    }
				    if(id == 3){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider4 bg_slider5 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider3');
				    }
				    if(id == 4){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider3 bg_slider5 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider4');
				    }
				    if(id == 5){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider3 bg_slider4 bg_slider6 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider5');
				    }
				    if(id == 6){
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().removeClass('bg_slider1 bg_slider2 bg_slider3 bg_slider5 bg_slider4 bg_slider');
				    	slideElement.parent().parent().parent().parent().parent().parent().parent().addClass('bg_slider6');
				    }
				}
		  	});
  		}); // end of document ready
	})(jQuery); // end of jQuery name space
</script>