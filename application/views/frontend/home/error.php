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
    <meta name="author" content="www.<?php echo substr(site_url(),7); ?>"/>
    <meta property="og:title" content="<?php echo isset($title)?$title:''; ?>"/>
    <meta property="og:url" content="<?php echo site_url(); ?><?php echo isset($url)?$url:'';?>" />
    <meta property="og:image" content="<?php echo isset($image)?$image:''; ?>" />
    <link rel="alternate" href="<?php echo site_url(); ?>" hreflang="vi-vn" />
    <meta http-equiv="REFRESH" content="1800" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.placename" content="Hồ Ch&iacute; Minh" />
    <meta name="geo.position" content="10.776435;106.601245" />
    <meta name="ICBM" content="10.776435, 106.601245" />
    <meta name="msvalidate.01" content="4A122E1D7BE2BEA01E640C985860E165" />

    <!-- Dublin Core-->
     <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
     <meta name="DC.title" content="<?php echo isset($title)?$title:''; ?>">
     <meta name="DC.identifier" content="<?php echo site_url(); ?>">
     <meta name="DC.description" content="<?php echo isset($description)?$description:''; ?>">
     <meta name="DC.subject" content="<?php echo isset($keyword)?$keyword:''; ?>">
     <meta name="DC.language" scheme="UTF-8" content="vi">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="upload/system/<?php echo $data_index['system']['favicon'];?>" type="image/x-icon" />
    <link rel="shortcut icon" href="upload/system/<?php echo $data_index['system']['favicon'];?>" type="image/x-icon" />
    <meta name="google-site-verification" content="U9ELRVzg8OYjIa5Xsas3MC_WQ-nsnggZ0mpKlgcIphM" />
    <title><?php echo isset($title)?$title:''; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="public/css/style.css" type="text/css" />
    <link rel="stylesheet" href="public/css/animate.css" type="text/css" />
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    
    <link rel="stylesheet" type="text/css" href="public/font-awesome-4.3.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    
    
    
    <script type="text/javascript">
        var time = 10; // Thời gian đếm ngược
        var page = 'http://ghemassagenhat.net/'; // Trang bạn muốn chuyển đến
        function countDown(){
            time--;
            gett("timecount").innerHTML = time;
            if(time == 0){
                window.location = page;
            }
        }
        function gett(id){
            if(document.getElementById) return document.getElementById(id);
            if(document.all) return document.all.id;
            if(document.layers) return document.layers.id;
            if(window.opera) return window.opera.id;
        }
        function init(){
            if(gett('timecount')){
                setInterval(countDown, 1000);
                gett("timecount").innerHTML = time;
            }
            else{
                setTimeout(init, 50);
            }
        }
        document.onload = init();
    </SCRIPT>
</head>
<body>
    <div class="col s12 m12 l8 page_error">
        Sorry, we couldn't find that page
        <div class="clear"></div>
        <div class="div_404">404</div>
        <div class="clear"></div>
        
        <h3>Pages will automatically switch after <span id="timecount"></span> seconds!</h3>
    </div>
    <script src="public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/script_jquery.js" type="text/javascript"></script>
</body>

</html>