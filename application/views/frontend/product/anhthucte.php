<?php if(isset($product_album) && $product_album != NULL){ ?>
<div class="row">
  <div class="col-md-12">
    <div class="title_main title_main_index clearfix"><h2><a>Hình ảnh thực tế</a></h2></div>
    <div class="clear" style="height:10px;"></div>
  </div>
  <div class="col-md-8">
    <div id="sync1">
      <?php foreach ($product_album as $key_product_album => $val_product_album) { ?>
        <div class="item"><img src="upload/product/album/<?php echo $val_product_album['image'];?>"></div>
      <?php } ?>
    </div>
  </div>
  <div class="col-md-4">
    <div id="sync2">
      <?php foreach ($product_album as $key_product_album => $val_product_album) { ?>
      <div class="item"><img src="upload/product/album/<?php echo $val_product_album['image'];?>"></div>
      <?php } ?>
    </div>
  </div>
</div>
<?php } ?>