<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" itemtype="http://schema.org/WebPage">
<html>
<head>
    <base href="<?php echo site_url(); ?><?php echo isset($url)?$url:'';?>" />
    <meta http-equiv="content-language" content="vi"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index,follow,snippet,archive" />
    <meta name="title" content="<?php echo isset($title)?$title:''; ?>" />
    <meta name="description" content="<?php echo isset($description)?$description:''; ?>" />
    <meta name="keywords" content="<?php echo isset($keyword)?$keyword:''; ?>" />
    <meta name="author" content="www.<?php echo $_SERVER['HTTP_HOST'];?>"/>
    <meta property="og:title" content="<?php echo isset($title)?$title:''; ?>"/>
    <meta property="og:url" content="<?php echo site_url(); ?><?php echo isset($url)?$url:'';?>" />
    <meta property="og:image" content="<?php echo isset($image)?$image:''; ?>" />
    <meta property="og:description" content="<?php echo isset($description)?$description:''; ?>" />
    
    <link rel="alternate" href="<?php echo site_url(); ?><?php echo isset($url)?$url:'';?>" hreflang="vi-vn" />
    <meta http-equiv="REFRESH" content="1800" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.placename" content="Hồ Ch&iacute; Minh" />
    <meta name="geo.position" content="10.776435;106.601245" />
    <meta name="ICBM" content="10.776435, 106.601245" />
    <meta name="msvalidate.01" content="4A122E1D7BE2BEA01E640C985860E165" />

    <!-- Dublin Core-->
     <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
     <meta name="DC.title" content="<?php echo isset($title)?$title:''; ?>">
     <meta property="og:type" content="website" />
     <meta name="DC.identifier" content="<?php echo site_url(); ?><?php echo isset($url)?$url:'';?>">
     <meta name="DC.description" content="<?php echo isset($description)?$description:''; ?>">
     <meta name="DC.subject" content="<?php echo isset($keyword)?$keyword:''; ?>">
     <meta name="DC.language" scheme="UTF-8" content="vi">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="<?php echo $data_index['system']['webmaster'];?>" />
    <title><?php echo isset($title)?$title:''; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" href="upload/system/<?php echo $data_index['system']['favicon'];?>" type="image/x-icon" />
    <link rel="shortcut icon" href="upload/system/<?php echo $data_index['system']['favicon'];?>" type="image/x-icon" />
    <link href="public/bootstrap/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Poppins%3A300%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
    
    <link rel="stylesheet" href="public/css/animate.css" type="text/css" />
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    

    <link rel="stylesheet" type="text/css" href="public/font-awesome-4.3.0/css/font-awesome.min.css" />
    <link href="public/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="public/jssor/jssor.css" type="text/css" media="screen"/>

    <link href="public/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="public/owlcarousel/owl.theme.css">
    <link href="public/iCheck/all.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="public/scrollbar/includes/style.css" />
    <link rel="stylesheet" href="public/scrollbar/includes/prettify/prettify.css" />
    
    <link rel="stylesheet" href="public/css/tiki.css" type="text/css" />
    <link rel="stylesheet" href="public/css/style.css" type="text/css" />
    <link rel="stylesheet" href="public/css/khachsan.css" type="text/css" />
    <link rel="stylesheet" href="public/css/responsive.css" type="text/css" />
    

     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="public/viewportchecker/viewportchecker.js"></script>
    <script src="public/parallax/parallax.js"></script>
    <script src="public/js/jquery.lazyload.js" type="text/javascript"></script>

</head>

<body>
    
    <div class="full_fix"></div>
    <div class="full_fix_opacity"></div>
    <div class="full_fix_menu_opacity"></div>
    <header>
        <?php $this->load->view('frontend/layout/header'); ?>
        <div class="clear"></div>
    </header>
    <div class="clear"></div>
        <?php $this->load->view('frontend/layout/menu'); ?>
    <div class="clear"></div>
    <?php if($data_index['crt'] == 'IndexController'){ ?>
    <section id="slider" class="clearfix bg_slider">
        <?php $this->load->view('frontend/layout/slider_owl'); ?>
    </section>
    <?php } ?>
    <?php if($data_index['crt'] != 'IndexController' && $data_index['crt'] != 'phong'){ ?>
    <section id="breadcrumb">
    <?php $this->load->view('frontend/layout/breadcrumb'); ?>
    </section>

    <div class="clear"></div>
    <?php } ?>
    <?php if($data_index['crt'] == 'phong'){ ?>
    <section id="breadcrumb">
    <?php $this->load->view('frontend/layout/support'); ?>
    </section>
    <?php } ?>
    <section id="content-wrapper" class="clearfix">
    <div class="container"><div class="row">
    <?php if($data_index['crt'] == 'contact' || $data_index['crt'] == 'phong' || $data_index['crt'] == 'activity' || $data_index['crt'] == 'auth' || $data_index['crt'] == 'video' || $data_index['crt'] == 'album' || $data_index['crt'] == 'cart'  || ($data_index['crt'] == 'auth' && $data_index['act'] == 'sucess')){ ?>
        <div class="content clearfix" <?php if($data_index['crt'] != 'IndexController'){ ?> style="min-height: 425px;" <?php } ?>>
            <?php
                if(isset($template) && !empty($template)){
                    $this->load->view($template, isset($data)?$data:NULL);
                }
            ?>
        </div>
    <?php }else{ ?>
        <div class="col-md-9" <?php if($data_index['crt'] != 'IndexController'){ ?> style="min-height: 425px;" <?php } ?>><div class="content clearfix">
            <?php
                if(isset($template) && !empty($template)){
                    $this->load->view($template, isset($data)?$data:NULL);
                }
            ?>
        </div></div>
         <div class="col-md-3"><div class="row row_nopadding"><div class="sidebars">
            <?php $this->load->view('frontend/layout/sidebar'); ?>
        </div></div></div>
    <?php } ?>
    </div></div>
    <div class="clear"></div>
    <footer>
        <?php $this->load->view('frontend/layout/footer'); ?>
    </footer>
    <script src="public/jssor/jssor.slider.min.js"></script>
    <script type="text/javascript" src="public/admin/js/moment-with-locales.js"></script>
    <script type="text/javascript" src="public/admin/js/bootstrap-datetimepicker.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="public/admin/css/bootstrap-datetimepicker.css" type="text/css" />
    <script type="text/javascript" src="public/admin/js/moment-with-locales.js"></script>
    <script type="text/javascript" src="public/admin/js/bootstrap-datetimepicker.js"></script>

    <link rel="stylesheet" href="public/admin/css/bootstrap-datetimepicker.css" type="text/css" />
    <script type="text/javascript" src="public/admin/js/moment-with-locales.js"></script>
    <script type="text/javascript" src="public/admin/js/bootstrap-datetimepicker.js"></script>

    
    <script src="public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/bootstrap/js/app.min.js" type="text/javascript"></script>
    <script src="public/bxslider/jquery.bxslider.min.js"></script>
    
    <script src="public/iCheck/icheck.min.js" type="text/javascript"></script>

    <script src="public/owlcarousel/owl.carousel.js"></script>

    <link href="public/lobibox/css/lobibox.css" rel="stylesheet" />
    <script src="public/lobibox/js/lobibox.js"></script>
    <script src="public/lobibox/demo/demo.js"></script>




    <!-- Rating -->
    <link rel="stylesheet" href="public/rating/rating.css" type="text/css" />
    <script src="public/rating/rating.js"></script>

    <script type="text/javascript" src="public/js/checkform.js"></script>
    <script src="public/js/script.js" type="text/javascript"></script>
    <!-- REVOLUTION SLIDER -->

    <script src="public/flexslider/demo/js/jquery.easing.js"></script>
    <script src="public/flexslider/demo/js/jquery.mousewheel.js"></script>
    
    <script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', '<?php echo $data_index['system']['analytics'];?>', 'auto');
      ga('send', 'pageview');
    </script>

</body>

</html>