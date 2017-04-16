<link rel="stylesheet" href="public/elevatezoom/jquery.fancybox.css">
<link rel="stylesheet" href="public/owlcarousel/owl.carousel.min.css">
<script src="public/bootstrap/js/jQuery-2.1.4.min.js"></script>
<script src="public/owlcarousel/owl.carousel.js"></script>
<script src="public/elevatezoom/jquery.elevatezoom.js"></script>
<script src="public/elevatezoom/jquery.elevatezoom.min.js" type="text/javascript"></script>
<script src="public/elevatezoom/jquery.fancybox.pack.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#img_01").elevateZoom({
      zoomWindowFadeIn : 500,
      zoomLensFadeIn: 500,
      gallery   : "gal1",
      cursor:"pointer",
      zoomType: "inner",  
    });
    $('.owl-carousel-2').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      autoplay: true,
      responsive:{
          0:{
              items:4
          },
          600:{
              items:4
          },
          1000:{
              items:5
          }
      }
    });
  });
  $("#img_01").bind("click", function(e) {  
    var ez =   $('#img_01').data('elevateZoom');  
    $.fancybox(ez.getGalleryList()); return false;
    });
</script>
<style type="text/css">
    .zoomContainer{
        display: none!important;
    }
</style>

<?php if($product!=NULL){ ?>
<div class="list_product load_view">
  <h1 class="title_main"><span><i class="fa fa-heartbeat"></i> <?php echo $product['name']; ?></span></h1>
  <a id="div_close"><i class="fa fa-close" aria-hidden="true"></i></a>
  <div class="clear"></div>
  <div class="col-md-5 col-sm-5 col-xs-12 box-img"><div class="row" id="box-img-item">
    <img style="width:100%; float:left;" class="imgct" id="img_01" src="<?php echo base_url(); ?>upload/product/<?php echo $product['image']; ?>" data-zoom-image="<?php echo base_url(); ?>upload/product/<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" title="<?php echo $product['title']; ?>"/>
    </div>
    <div class="clear"></div>
    <?php if(isset($image_detail) && $image_detail!=NULL){ ?>
    <div id="gal1" class="owl-carousel-2 div_image_detail">
    <?php foreach ($image_detail as $key_image_detail => $val_image_detail) { ?>
    <div class="item_img">
      <a href="#" data-image="<?php echo base_url(); ?>upload/product/detail/<?php echo $val_image_detail['image']; ?>" data-zoom-image="<?php echo base_url(); ?>upload/product/detail/<?php echo $val_image_detail['image']; ?>"> 
        <img src="<?php echo base_url(); ?>upload/product/detail/<?php echo $val_image_detail['image']; ?>" alt="<?php echo $product['title']; ?>" title="<?php echo $product['title']; ?>" /> 
      </a>
    </div>
    <?php } ?>
    </div>
    <?php } ?>

  </div>
  <div class="col-md-6 col-sm-7 col-xs-12 box-des">
    <h2><?php echo $product['name']; ?></h2>
    <?php if($product['price']!=''){?><div class="price"><i class="fa fa-tags"></i>&nbsp;<b>Giá</b>: <span><?php echo !empty($product['price'])?number_format($product['price'],0,'.','.').' <sup>đ</sup>':$price; ?></span></div><?php } ?>
    <div class="clear" style="height:10px;"></div>
    <?php $this->load->view('frontend/plugin/share'); ?>
    <div class="clear" style="height:10px;"></div>
    <div class="price"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;<b>Lượt xem</b>: <span class="view"><?php echo isset($product['is_view'])?$product['is_view']:0;?></span></div>
    <div class="clear" style="height:10px;"></div>
    <div class="div_cart">
      <div class="col-md-1 col-sm-1 col-xs-1"><div class="row"><input type="number" name="number" id="number" value="1"></input></div></div>
      <div class="col-md-5 col-sm-5 col-xs-5">
      <a onClick="addcart(<?php echo $product['id'];?>);" class="btn btn-block btn-social btn-google-plus addcart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Đặt hàng</a></div>
    </div>
  </div>
  
  <div class="clear"></div>
</div>
<?php } ?>