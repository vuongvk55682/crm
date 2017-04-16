<style type="text/css">
    #menu{
        background: <?php  echo $data_index['system']['color_menutop'];?> none repeat scroll 0 0;
    }
    #sidebar .sidebar .title_sidebar,#content-wrapper .title_main_index h2,header #banner .banner .search .btn_search,header #banner .banner .item_banner .head_menu_mobile a i,#content-wrapper .title_main,header #banner .banner .item_banner .head_menu_mobile .head_type_mobile_fix .title  { 
        background-color: <?php echo $data_index['system']['color_title'];?>;
    }
</style>
<?php if(isset($data_index['banner']) && $data_index['banner'] != NULL){ ?>
<div id="banner" class="clearfix">
    <div class="container banner clearfix"><div class="row">
        <div class="col-md-2 col-sm-3 col-xs-12 item_banner">
            <?php 
            	$width = '';
            	$height = '';
                $url_banner = $data_index['banner']['url'];
        	    if($data_index['banner']['auto'] == 1){ 
        	    	$img_banner = base_url().'upload/banner/thumb/'.$data_index['banner']['image_thumb'];
        	    }else{
        	    	$img_banner = base_url().'upload/banner/'.$data_index['banner']['image'];
        	    	$width = $data_index['banner']['width'];
        	    	$height = $data_index['banner']['height'];
        	    }
            ?>
            <a href="<?php echo $url_banner;?>"><img src="<?php echo $img_banner;?>" alt="<?php echo $data_index['banner']['name'];?>" widht="<?php echo $width;?>" height="<?php echo $height;?>" class="banner_img"></a>

            <div class="head_menu_mobile">
                <?php $this->load->view('frontend/layout/menu_mobile'); ?>
            </div>

            <?php if($data_index['config']['is_menu_thuongmai'] == 1){ ?>
                <?php $this->load->view('frontend/layout/slide_type_hover'); ?>
            <?php } ?>
        </div>
        <?php if($data_index['config']['is_search_auto'] == 1){ ?>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="text_banner hidden-xs">
                <?php echo isset($data_index['keys']['text_banner'])?$data_index['keys']['text_banner']:'';?>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12"><div class="row">
                <?php  $this->load->view('frontend/layout/search'); ?>
            </div></div>
        </div>
        <?php } ?>

        <?php /*<div class="col-md-6 col-sm-12 col-xs-12">
            <div class="text_banner">
                <?php echo isset($data_index['keys']['text_banner'])?$data_index['keys']['text_banner']:'';?>
            </div>
            
        </div>*/?>

        <?php if($data_index['config']['is_check_cart'] == 1){ ?>
        <div class="col-xs-1 head_check_order"><div class="row">
            <a href="kiem-tra-don-hang.html" title="Kiểm tra trạng thái Đơn hàng của bạn" class="check_order"><i class="fa fa-map-marker" aria-hidden="true"></i>Kiểm tra Đơn hàng</a>
        </div></div>
        <?php } ?>

        

        <?php if($data_index['config']['is_cart'] == 1){ ?>
        <div class="col-md-1 col-sm-1 col-xs-2 head_check_cart">
            <?php $this->load->view('frontend/layout/cart'); ?>
        </div>   
        <?php } ?>

        <?php if($data_index['config']['choose_width_menu'] == 2){ ?>
            <?php  $this->load->view('frontend/layout/menu_banner'); ?>
        <?php } ?>
        <?php /*<div class="langbox">
            <?php if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){ ?>
                <a class="vietnamese" href="session/index?lang=vn"><i></i><?php echo isset($data_index['_keys']['vietnames'])?$data_index['_keys']['vietnames']:'';?></a>
            <?php }else{ ?>
                <a class="english" href="session/index?lang=en">English</a>
            <?php } ?>
        </div>*/?>
        <div class="col-md-2 col-sm-12 col-xs-12 hidden-xs">
            <div class="wp_share">
            <?php if($data_index['config']['is_login'] == 1){ ?>
            <div class="head_check_login">
                <?php $this->load->view('frontend/layout/login'); ?>
            </div>
            <?php } ?>
            
                <?php $this->load->view('frontend/plugin/share'); ?>
                <div class="clear height10"></div>
                <?php echo isset($data_index['keys']['hotline_banner'])?$data_index['keys']['hotline_banner']:'';?>
            </div>
        </div>
        
        
    </div></div>
    

</div>
<?php } ?>