<?php if($data_index['config']['choose_width_slide'] == 2){ ?>
<div class="container">
	<div class="row">
		<?php if($data_index['config']['is_menu_thuongmai'] == 1){ ?>
			<?php $this->load->view('frontend/layout/slide_type'); ?>
		<?php } ?>
		<div class="col-md-<?php echo $data_index['config']['col_slide']?$data_index['config']['col_slide']:0;?>">
			<!-- SLIDER-AREA-START -->
			<div class="slider">
				<?php if(isset($data_index['slider']) && $data_index['slider'] != NULL){ ?>
				<div id="owl-demo" class="owl-theme">
					<?php foreach ($data_index['slider'] as $key_slider => $val_slider) { ?>
				 	<a href="" title="<?php echo $val_slider['name'];?>"><img class="lazyOwl" data-src="upload/slider/<?php echo $val_slider['image'];?>" alt="<?php echo $val_slider['name'];?>" <?php if($data_index['config']['width_slide_img'] == 1){ ?> width="100%" <?php } ?>></a>
				  	<?php } ?>
				</div>
				<?php } ?>
			</div>
			<!-- SLIDER-AREA-END -->
		</div>
	</div>
</div>
<?php }else{ ?>
	<div class="slider">
		<?php if(isset($data_index['slider']) && $data_index['slider'] != NULL){ ?>
		<div id="owl-demo" class="owl-theme">
			<?php foreach ($data_index['slider'] as $key_slider => $val_slider) { ?>
		 	<a href="" title="<?php echo $val_slider['name'];?>">
		 		<img class="lazyOwl" data-src="upload/slider/<?php echo $val_slider['image'];?>" alt="<?php echo $val_slider['name'];?>" <?php if($data_index['config']['width_slide_img'] == 1){ ?> width="100%" <?php } ?>>
		 	</a>
		  	<?php } ?>
		</div>
		<?php } ?>
	</div>
<?php } ?>