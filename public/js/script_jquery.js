(function($){
  $(function(){

	//search
   	$('.btn_search').click(function(){
	    $('#frm-search').submit();
	    return false;
	}); 

	$("img.lazy").lazyload({
		threshold : 200,
		effect : "fadeIn",
	});

	


	
  	$("#producthot").owlCarousel({
	   	loop:true,
	    margin:10,
	    nav:true,
	    items:5,
	    lazyLoad : true,
	    pagination: false,
	    navigation: true,
	    autoplay: true,
    	responsive:{
	        0:{
	            items:2
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:4
	        }
	    }
  	});
  	

  	$("#owl-demo").owlCarousel({
    	navigation : false,
    	singleItem : true,
    	transitionStyle : "fadeUp",
    	autoPlay:true
  	});


	

	$("#menuslide0").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide1").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide2").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide3").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide4").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide5").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide6").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide7").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide8").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide9").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});
  	$("#menuslide10").owlCarousel({
    	navigation : true,
    	singleItem : true,
    	autoPlay:false,
    	navigationText : ["", ""],
  	});

  	$('#productbanchay0').owlCarousel({
	    loop:true,
	    margin:10,
	    navigation : true,
	    pagination : false,
	    nav:true,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay1').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay2').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay3').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay4').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay5').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay6').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay7').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay8').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay9').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay10').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay11').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});

	$('#productgiamgia0').owlCarousel({
	    loop:true,
	    margin:10,
	    navigation : true,
	    pagination : false,
	    nav:true,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia1').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia2').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia3').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia4').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia5').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia6').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia7').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia8').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia9').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia10').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia11').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});

	$('#productnoibat0').owlCarousel({
	    loop:true,
	    margin:10,
	    navigation : true,
	    pagination : false,
	    nav:true,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat1').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat2').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat3').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat4').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat5').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat6').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat7').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat8').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat9').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat10').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat11').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    navigation : true,
	    pagination : false,
	    items:4,
	    navigationText : ["", ""],
	    autoPlay: false,
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 4],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	
	$('.item_img').click(function(){
		var image = $(this).attr('url');
		$('#box-img-item').html('<img style="width:100%; float:left;" class="imgct" id="img_01" src="'+image+'" data-zoom-image="'+image+'">');
	});
	$(".btn_next").on("click" ,function(){
     	$('html, body').animate({
	        scrollTop: $(this).parent().parent().parent().find('.div_end').offset().top
	    }, 500);
   	});
   	$(".btn_prev").on("click" ,function(){
     	$('html, body').animate({
	        scrollTop: $(this).parent().parent().parent().find('.div_first').offset().top
	    }, 500);
   	});

	$('.reset').click(function(){
		$('#frm')[0].reset();
	});
	$('.reset').click(function(){
		$('#frm_pay')[0].reset();
	});
	$('.add').click(function(){
	    $('#frm').submit();
	    return false;
	});
	$('.checkorder').click(function(){
	    $('#frm_checkorder').submit();
	    return false;
	});
	$('.pay').click(function(){
	    $('#frm_pay').submit();
	    return false;
	});
	$('.btn_sentmail').click(function(){
	    $('#frm_mail').submit();
	    return false;
	});

	$('.logintk').click(function(){
	    $('#frm_login').submit();
	    return false;
	});

	$('.clk_infouser').click(function(){
    	if($('.login').hasClass('move_div')){
			$('.login').removeClass('move_div');
			$('.div_user_fix').css('display','none');
		}else{
			$('.login').addClass('move_div');
			$('.div_user_fix').css('display','block');
		}
    });
    $('.div_user_fix').click(function(){
		$('.login').removeClass('move_div');
		$('.div_user_fix').css('display','none');
    });

	//Datatimepicker
    $('#birthday').datetimepicker({
        format: 'YYYY/MM/DD HH:mm:ss'
    });

 //    $(window).scroll(function() {
	// 	if ($(this).scrollTop() > 40) {
	// 		$('#banner').addClass('banner_fix');
	// 	}else{
	// 		$('#banner').removeClass('banner_fix');
	// 	}
	// });

	$(window).scroll(function() {
		if ($(this).scrollTop() > 40) {
			$('#order_top').addClass('order_top_fix');
		}else{
			$('#order_top').removeClass('order_top_fix');
		}
	});

	$(window).scroll(function() {
		if ($(this).scrollTop() > 60) {
			$('#clk_type_fix').addClass('move_clk_type_fix');
		}else{
			$('#clk_type_fix').removeClass('move_clk_type_fix');
			$('.typefix').removeClass('move_typefix');
		}
	});

	
	$('.clk_conten_a').click(function(){
		if($('.clk_content').hasClass('move_content')){
			$('.clk_content').removeClass('move_content');
			$('.clk_conten_a').html('Xem thêm <i class="fa fa-chevron-down" aria-hidden="true"></i>');
		}else{
			$('.clk_content').addClass('move_content');
			$('.clk_conten_a').html('Thu gọn <i class="fa fa-chevron-up" aria-hidden="true"></i>');
		}
	});
	
	$('.clk_span').click(function(){
		$(this).parent().find('ul').slideToggle(300);
	});

    $('#btn_menu').click(function(){
		if($(this).parent().find('.menu_top').hasClass('move_menu')){
			$(this).parent().find('.menu_top').removeClass('move_menu');
		}else{
			$(this).parent().find('.menu_top').addClass('move_menu');
		}
	});

	$('#clk_type_fix').click(function(){
		if($('.typefix').hasClass('move_typefix')){
			$('.typefix').removeClass('move_typefix');
			$('.full_fix').css('display','none');
		}else{
			$('.typefix').addClass('move_typefix');
			$('.full_fix').css('display','block');
		}
	});

    $('#clk_sort_pro').click(function(){
    	if($(this).parent().find('.ul_sort').hasClass('move_sort')){
			$(this).parent().find('.ul_sort').removeClass('move_sort');
			$('.full_fix').css('display','none');
		}else{
			$(this).parent().find('.ul_sort').addClass('move_sort');
			$('.full_fix').css('display','block');
		}
    });
    $('.full_fix').click(function(){
    	$(this).parent().find('.ul_sort').removeClass('move_sort');
    	$('.typefix').removeClass('move_typefix');
    	$('.full_fix').css('display','none');
    });

    $(window).scroll(function() {
		if ($(this).scrollTop() > 200) {
			$('.go-top').fadeIn(200);
		} else {
			$('.go-top').fadeOut(200);
		}
	});
	
    

	$('.go-top').click(function(event) {
		event.preventDefault();
		
		$('html, body').animate({scrollTop: 0}, 300);
	});

	$('.slider8').bxSlider({
	    mode: 'vertical',
	    slideWidth: 300,
	    minSlides: 2,
	    slideMargin: 10,
	    auto: true,
	    controls:false
	});

	$('.slider10').bxSlider({
	    auto: true,
	    speed: 1000,
	    controls:true
	});
	$('.slider11').bxSlider({
	    auto: true,
	    speed: 1100,
	    controls:true
	});
	$('.slider12').bxSlider({
	    auto: true,
	    speed: 1200,
	    controls:true
	});
	$('.slider13').bxSlider({
	    auto: true,
	    speed: 1300,
	    controls:true
	});
	$('.slider14').bxSlider({
	    auto: true,
	    speed: 1400,
	    controls:true
	});
	$('.slider15').bxSlider({
	    auto: true,
	    speed: 1500,
	    controls:true
	});

	$('.slider16').bxSlider({
	    auto: true,
	    speed: 1600,
	    controls:true
	});
	$('.slider17').bxSlider({
	    auto: true,
	    controls:true
	});

    

    $('#keyword').keyup(function(){
    	var keyword = $(this).val();
    	if(keyword != ''){
    		$.ajax
          	({
             	method: "POST",
             	url: "search/auto",
             	data: { keyword:keyword},
             	dataType: "html",
              	success: function(data){
              		$('.div_result_search').addClass('move_result_search');
                	$('.div_result_search').html(data);
              	}
          	});
    	}else{
    		$('.div_result_search').removeClass('move_result_search');
    	}
    });

    $('.viewfast').click(function(){
    	var id = $(this).attr('id');
    	if(id != ''){
    		$.ajax
          	({
             	method: "POST",
             	url: "ajax/viewfast",
             	data: { id:id},
             	dataType: "html",
              	success: function(data){
              		$('.full_load_view').addClass('move_load_view');
                	$('.full_load_view').html(data);
              	}
          	});
    	}
    });
    $('.full_load_view').click(function(){
    	$('.full_load_view').removeClass('move_load_view');
    });

    $('.delcart').click(function(){
    	var xacnhanxoa = confirm('Bạn có chắc muốn xóa không?');
	    if(xacnhanxoa==true){
	      	$(this).parent().parent().fadeOut();
	      	var control = $(this).attr('control');
	      	var id = $(this).attr('id');
          	if(id != '')  
          	{ 
            	$.ajax
            	({
               		method: "POST",
               		url: ""+control+"/del",
               		data: { id:id},
            	});
            	//window.setTimeout('location.reload()', 2000);
          	}
	    }
    });

	var width_win = $(window).height();
	// if(width_win < 640){
	//     $('.search').click(function(){
	//     	var widht_search = $(this).find('.item').width();
	//     	if(widht_search > 64){
	//     		$(this).find('.item').animate({ "width": '-=' + '200px' }, "slow");
	//     	}else{
	//     		$(this).find('.item').animate({ "width": '+=' + '200px' }, "slow");
	//     	}
		    
	// 	});
	// }

	$('#liked').click(function(){
		var div2Pos = $('.rightfix ').position();
		var div2Width = $(".rightfix").css("width");
		var div2Height = $(".rightfix").css("height");
		$("#div3").animate({top:div2Pos.top,left:div2Pos.left,right:div2Pos.right, width:'35px', height:'70px','opacity':'1'}, 2000,function(){
			$(this).css({top:'150px',left:'40px',width:'300px',height:'300px',opacity:'0'});
		});
		var id = $(this).attr('productid');
		if(id != '')
		{
			$.ajax
          	({
             	method: "POST",
             	url: "product/liked",
             	data: { id:id},
             	dataType: "json",
              	success: function(data){
              		$('#div_liked').html(data.number);
              	}
          	});
		}	
	});
  }); // end of document ready
})(jQuery); // end of jQuery name space
function addcart(id){
	var qty = $('#number').val();
	if(id != ''){
		$.ajax
      	({
         	method: "POST",
         	url: "cart/addcart",
         	data: { id:id,qty:qty},
         	dataType: "html",
      	});
      	window.location = 'gio-hang.html';
	}
}



