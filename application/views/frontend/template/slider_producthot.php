<script>
    jssor_1_slider_init = function() {
        
        var jssor_1_options = {
          $AutoPlay: true,
          $DragOrientation: 2,
          $PlayOrientation: 2,
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
          }
        };
        
        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
        
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 500);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        //responsive code end
    };
</script>
<?php if(isset($data_index['producthot']) && $data_index['producthot'] != NULL){ ?>
<div class="slider_pro_hot">
<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width:450px;height: 510px; visibility: hidden;">
        <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div style="position:absolute;display:block;background:url('public/jssor/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 450px; height: 320px;">
    	<?php foreach ($data_index['producthot'] as $key_producthot => $val_producthot) { 
			$url_producthot = base_url().$val_producthot['alias'].'-p'.$val_producthot['id'].'.html';
		?>
        <div data-p="112.50" style="display: none;">
            <a href="<?php echo $url_producthot;?>" title="<?php echo $val_producthot['title']; ?>">
			<img data-u="image" src="<?php echo base_url(); ?>upload/product/thumb/<?php echo $val_producthot['image_thumb']; ?>" alt="<?php echo $val_producthot['title']; ?>" >
            <div class="clear"></div>
            <div class="title_hot"><?php echo $val_producthot['title']; ?></div>
			</a>
        </div>
        <?php } ?>
        <a data-u="ad" href="http://www.jssor.com" style="display:none">jQuery Slider</a>
    
    </div>
    <!-- Arrow Navigator -->
    <!-- <span data-u="arrowleft" class="jssora08l" style="top:8px;left:8px;width:50px;height:50px;" data-autocenter="1"></span>
    <span data-u="arrowright" class="jssora08r" style="bottom:8px;right:8px;width:50px;height:50px;" data-autocenter="1"></span> -->
</div>
</div>
    <script>
        jssor_1_slider_init();
    </script>
<?php } ?>
