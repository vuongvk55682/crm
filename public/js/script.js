$(document).ready(function(){
	$('.btn_search').click(function(){
	    $('#frm-search').submit();
	    return false;
	});
	$('.c_reset').click(function(){
		$('#frm_contact')[0].reset();
	});
	$('.btn_contact').click(function(){
	    $('#frm_contact').submit();
	    return false;
	}); 

	$(".preorder").on("click" ,function(){
     	$('html, body').animate({
	        scrollTop: $('#preorder').offset().top
	    }, 2000);
   	});

	$('.post1').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated fadeInRight',
        offset: 200
    });
    $('.post2').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated zoomIn',
        offset: 200
    });
    $('.post3').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated fadeInLeft',
        offset: 200
    });
    $('.item').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated fadeIn',
        offset: 200
    });

    $('.s_item').addClass("hidden").viewportChecker({
        classToAdd: 'visible animated fadeInUp',
        offset: 200
    });

	$("img.lazy").lazyload({
		effect : "fadeIn",
	});

	$("img.lazyclick").show().lazyload({
		effect:"fadeIn",
	});

	$('.cate_fix').hover(function(){
		$('.full_fix_opacity').css('display','block');
	})
	$('.full_fix_opacity').hover(function(){
		$('.full_fix_opacity').css('display','none');
	})

  	$("#owl-demo").owlCarousel({
  		singleItem:true,
  		lazyLoad : true,
  		addClassActive: true,
	    afterMove: function(){
	       var caption = $( ".owl-item.active .caption" ).detach();
	       caption.appendTo(".owl-item.active > div");
	    }
  	});
  	$("#product_detail").owlCarousel({
  		singleItem:true,
  		lazyLoad : true,
  	});


  	$('.hide-detail').click(function(){
  		$('.tracking-order-detail').css('display','none');
  		$('.detail-toggle-show').css('display','block');
  	});
  	$('.detail-toggle-show').click(function(){
  		$('.tracking-order-detail').css('display','block');
  		$(this).css('display','none');
  	});


  	$('#typenews').owlCarousel({
	    items:7,
	    rewindNav : false,
  		lazyLoad : true,
  		autoWidth:true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});

	$("#newsdetailslide").owlCarousel({
		rewindNav : false,
		afterLazyLoad: true,
    	singleItem:true,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	

  	$('#productsame').owlCarousel({
	    items:3,
	    rewindNav : false,
  		lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#idea').owlCarousel({
	    items:3,
	    rewindNav : false,
  		lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 1],
	});



	$('#producthot').owlCarousel({
	    items:4,
	    rewindNav : false,
  		lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 3],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});

	$('#partner').owlCarousel({
	    items:5,
	    rewindNav : false,
  		lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});

	$('#productbrand').owlCarousel({
	    items:5,
	    rewindNav : false,
  		lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});

	$('.clk_menu_mobile').click(function(){
	    if($('.head_type_mobile_fix').hasClass('move_head_type_mobile_fix')){
			$('.head_type_mobile_fix').removeClass('move_head_type_mobile_fix');
			$('.full_fix_menu_opacity').css('display','none');
		}else{
			$('.head_type_mobile_fix').addClass('move_head_type_mobile_fix');
			$('.full_fix_menu_opacity').css('display','block');
		}
	    
	});

	$('.js-quick-reply').click(function(){
		if($(this).parent().parent().parent().find('.quick-reply').hasClass('move-quick-reply')){
			$(this).parent().parent().parent().find('.quick-reply').removeClass('move-quick-reply');
		}else{
			$(this).parent().parent().parent().find('.quick-reply').addClass('move-quick-reply');
		}
	});
	$('.js-quick-reply-hide').click(function(){
		$(this).parent().removeClass('move-quick-reply');
	});

	$('.load_child2').click(function(){
	    if($(this).parent().find('.ul_type_mobile_child2').hasClass('move_ul_fix')){
			$(this).parent().find('.ul_type_mobile_child2').removeClass('move_ul_fix');
			$(this).removeClass('tranfrm');
		}else{
			$(this).parent().find('.ul_type_mobile_child2').addClass('move_ul_fix');
			$(this).addClass('tranfrm');
		}
	    
	});

	$('.load_child3').click(function(){
	    if($(this).parent().find('.ul_type_mobile_child3').hasClass('move_ul_fix')){
			$(this).parent().find('.ul_type_mobile_child3').removeClass('move_ul_fix');
			$(this).removeClass('tranfrm');
		}else{
			$(this).parent().find('.ul_type_mobile_child3').addClass('move_ul_fix');
			$(this).addClass('tranfrm');
		}
	    
	});

	$('.close').click(function(){
		$(this).parent().parent().removeClass('move_head_type_mobile_fix');
		$('.full_fix_menu_opacity').css('display','none');
	});
	$('.full_fix_menu_opacity').click(function(){
		$('.head_type_mobile_fix').removeClass('move_head_type_mobile_fix');
		$(this).css('display','none');
	});
	

	$("#menuslide0").owlCarousel({
		rewindNav : false,
		afterLazyLoad: true,
    	singleItem:true,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide1").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide2").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide3").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide4").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide5").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide6").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide7").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide8").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide9").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});
  	$("#menuslide10").owlCarousel({
    	singleItem:true,
    	rewindNav : false,
    	lazyLoad:true,
	    navigationText : ["", ""],
	    navigation : true,
  	});


	var sync1 = $("#sync1");
  	var sync2 = $("#sync2");
 
	sync1.owlCarousel({
	    singleItem : true,
	    slideSpeed : 1000,
	    rewindNav : false,
	    navigation: true,
	    navigationText : ["", ""],
	    pagination:false,
	    afterAction : syncPosition,
	    responsiveRefreshRate : 200,
	});
 
	sync2.owlCarousel({
	    items : 3,
	    itemsDesktop      : [1199,10],
	    itemsDesktopSmall     : [979,10],
	    itemsTablet       : [768,8],
	    itemsMobile       : [479,4],
	    pagination:false,
	    responsiveRefreshRate : 100,
	    afterInit : function(el){
	      el.find(".owl-item").eq(0).addClass("synced");
	    }
	});
	function syncPosition(el){
	    var current = this.currentItem;
	    $("#sync2")
	      .find(".owl-item")
	      .removeClass("synced")
	      .eq(current)
	      .addClass("synced")
	    if($("#sync2").data("owlCarousel") !== undefined){
	      center(current)
	    }
	}
 
	$("#sync2").on("click", ".owl-item", function(e){
	    e.preventDefault();
	    var number = $(this).data("owlItem");
	    sync1.trigger("owl.goTo",number);
	});
 
	function center(number){
	    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
	    var num = number;
	    var found = false;
	    for(var i in sync2visible){
	      	if(num === sync2visible[i]){
	        	var found = true;
	      	}
	    }
	 
	    if(found===false){
	      	if(num>sync2visible[sync2visible.length-1]){
	        	sync2.trigger("owl.goTo", num - sync2visible.length+2)
	      	}else{
		        if(num - 1 === -1){
		          	num = 0;
		        }
	        	sync2.trigger("owl.goTo", num);
	      	}
	    }else if(num === sync2visible[sync2visible.length-1]){
	      	sync2.trigger("owl.goTo", sync2visible[1])
	    }else if(num === sync2visible[0]){
	      	sync2.trigger("owl.goTo", num-1)
	    } 
	}

	$('#get_info_customer').click(function(){
		if($('.cart_info_custom').hasClass('move_cart_info_custom')){
			$('.cart_info_custom').removeClass('move_cart_info_custom');
			$(".get_info_customer").parent().addClass('checked');
		}else{
			$(".get_info_customer").parent().removeClass('checked');
			$('.cart_info_custom').addClass('move_cart_info_custom');
		}
	});

	$('#clk_hoadondo').click(function(){
		if($('.div_hoadondo').hasClass('move_div_hoadondo')){
			$('.div_hoadondo').removeClass('move_div_hoadondo');
			$(".clk_hoadondo").parent().removeClass('checked');
		}else{
			$('.div_hoadondo').addClass('move_div_hoadondo');
			$(".clk_hoadondo").parent().addClass('checked');
		}
	});
 

  	$('input[type="checkbox"].minimal,input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

  	$('#productbanchay0').owlCarousel({
  		items:4,
  		rewindNav : false,
  		lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay1').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay2').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay3').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay4').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay5').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay6').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay7').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay8').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay9').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay10').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productbanchay11').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});

	$('#productgiamgia0').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia1').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia2').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia3').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia4').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia5').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia6').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia7').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia8').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia9').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia10').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productgiamgia11').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});

	$('#productnoibat0').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat1').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat2').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat3').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat4').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat5').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat6').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat7').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat8').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat9').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat10').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});
	$('#productnoibat11').owlCarousel({
	    items:4,
	    rewindNav : false,
	    lazyLoad : true,
	    loop:true,
	    margin:10,
	    pagination : false,
	    navigation : true,
	    navigationText : ["", ""],
	    itemsDesktop : [1199, 4],
        itemsDesktopSmall : [979, 3],
        itemsTablet : [768, 4],
        itemsTabletSmall : false,
        itemsMobile : [479, 2],
	});

	// $(window).scroll(function() {
	// 	if ($(this).scrollTop() > 5) {
	// 		$('#banner').addClass('banner_fix');
	// 	}else{
	// 		$('#banner').removeClass('banner_fix');
	// 	}
	// });
	
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

	$('.btn_updateaddress').click(function(){
	    $('#frm_updateaddress').submit();
	    return false;
	});
	$('.btn_addaddress').click(function(){
	    $('#frm_addaddress').submit();
	    return false;
	});

	$('.btn_checkorder').click(function(){
	    $('#frm_checkorder').submit();
	    return false;
	});

	$('.btn-add-review').click(function(){
		var title = $('#review_title').val();
		var detail = $('#review_detail').val();
		if(title != '' && detail != ''){
			$('#frm_comment').submit();
			$('#bat_text').html('Gửi nhận xét thành công! Xin chân thành cảm ơn bạn!'); 
			$('#box_alert').fadeIn(200);
			$('#box_alert').delay(3000).fadeOut(1000);
		    return false;
		}else{
			$('#bat_text').html('Gửi nhận xét không thành công! tiêu đề và nội dung không được trống!'); 
			$('#box_alert').fadeIn(200);
			$('#box_alert').delay(3000).fadeOut(1000);
		    return false;
		}
		
	});

	$('.btn_regis').click(function(){
	    $('#frm_regis').submit();
	    return false;
	});

	$('.btn_login').click(function(){
	    $('#frm_login').submit();
	    return false;
	});
	$('.btn_sentmail').click(function(){
	    $('#frm_sentmail').submit();
	    return false;
	});


	$('.sel_search').click(function(){
	    if($(this).parent().find('.menu_search').hasClass('move_menu_search')){
			$(this).parent().find('.menu_search').removeClass('move_menu_search');
			$('.full_fix').css('display','none');
		}else{
			$(this).parent().find('.menu_search').addClass('move_menu_search');
			$('.full_fix').css('display','block');
		}
	});
	$('.full_fix').click(function(){
	    if($(this).parent().find('.menu_search').hasClass('move_menu_search')){
			$(this).parent().find('.menu_search').removeClass('move_menu_search');
		}
	});

	
	$('.clk_type').click(function(){
	    var cate_name = $(this).parent().data('cate');
	    var cate_id = $(this).parent().data('cateid');
	    $('.sel_search').html(cate_name + '<i class="fa fa-caret-down" aria-hidden="true"></i>')
	    $('#search_typeid').val(cate_id);
	    $(this).parent().parent().removeClass('move_menu_search');
		$('.full_fix').css('display','none');
	});

	setTimeout(function(){
	    $('.newsletter').addClass('is-up');
	}, 2000);

	$('#mc-embedded-subscribe').click(function(){
		var email = $('#mce-EMAIL').val();
		$('#mce_email').val(email);
	});

	$('.toggle').click(function(){
    	if($('.newsletter').hasClass('is-up')){
			$('.newsletter').removeClass('is-up');
		}else{
			$('.newsletter').addClass('is-up');
		}
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

    $('#date').datetimepicker({
        format: 'YYYY/MM/DD',
    });
    $('#time').datetimepicker({
        format: 'HH:mm:ss',
    });

    var dateNow = new Date();
    $('#date').datetimepicker({
        format: 'DD/MM/YYYY',
    });

    
    
    $('#ngaynhan').datetimepicker({
        format: 'DD/MM/YYYY',
    });
    $('#ngaytra').datetimepicker({
        format: 'DD/MM/YYYY',
    });
    $('#ngaytra').on('dp.change', function(e){ 
    	var ngaytra = e.date.format(e.date._f); 
    	var days = daydiff(parseDate($('#ngaynhan').val()), parseDate(ngaytra));
		$('#dem').val(days);
    });
    $('#ngaynhan').on('dp.change', function(e){ 
    	var ngaynhan = e.date.format(e.date._f); 
    	var days = daydiff(parseDate(ngaynhan), parseDate($('#ngaytra').val()));
		$('#dem').val(days);
    });
	
 

    $('.position').click(function(){
    	var position = $(this).val();
    	if(position == 1){
    		$('.reorder_add').css('display','block');
    		$('.reorder_edit').css('display','none');
    	}else{
    		$('.reorder_add').css('display','none');
    		$('.reorder_edit').css('display','block');
    	}
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

	$('.js-customer-button').click(function(){
		if($('.comment_main').hasClass('move_comment_main')){
			$('.comment_main').removeClass('move_comment_main');
			$(this).html('Viết nhận xét của bạn');
		}else{
			$('.comment_main').addClass('move_comment_main');
			$(this).html('Đóng');
		}
	});


    

    // $('#keyword').keyup(function(){
    // 	var keyword = $(this).val();
    // 	if(keyword != ''){
    // 		$.ajax
    //       	({
    //          	method: "POST",
    //          	url: "search/auto",
    //          	data: { keyword:keyword},
    //          	dataType: "html",
    //           	success: function(data){
    //           		$('.full_fix_menu_opacity').css('display','block');
    //           		$('.div_result_search').addClass('move_result_search');
    //             	$('.div_result_search').html(data);
    //           	}
    //       	});
    // 	}else{
    // 		$('.div_result_search').removeClass('move_result_search');
    // 	}
    // });
    $('.full_fix_menu_opacity').click(function(){
    	$('.div_result_search').removeClass('move_result_search');
    	$(this).css('display','none');
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
	      	$(this).parent().parent().parent().fadeOut();
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
            	window.setTimeout('location.reload()', 1000);
          	}
	    }
    });

	$('.bat-close').click( function(){
		$('#box_alert').hide();
	});
	

	// $('#liked').click(function(){
	// 	var div2Pos = $('.rightfix ').position();
	// 	var div2Width = $(".rightfix").css("width");
	// 	var div2Height = $(".rightfix").css("height");
	// 	$("#div3").animate({top:div2Pos.top,left:div2Pos.left,right:div2Pos.right, width:'35px', height:'70px','opacity':'1'}, 2000,function(){
	// 		$(this).css({top:'150px',left:'40px',width:'300px',height:'300px',opacity:'0'});
	// 	});
	// 	var id = $(this).attr('productid');
	// 	if(id != '')
	// 	{
	// 		$.ajax
 //          	({
 //             	method: "POST",
 //             	url: "product/liked",
 //             	data: { id:id},
 //             	dataType: "json",
 //              	success: function(data){
 //              		$('#div_liked').html(data.number);
 //              	}
 //          	});
	// 	}	
	// });

});
function addcart(id){
	var qty = $('#qty').val();
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
function liked(productid,userid){
	if(productid != '' && userid != ''){
		$.ajax
      	({
         	method: "POST",
         	url: "ajax/liked",
         	data: { productid:productid,userid:userid},
         	dataType: "json",
         	success: function(data){
          		if(data.text == 1){
          			$('#bat_text').html('Sản phẩm đã có trong danh sách yêu thích'); 
					$('#box_alert').fadeIn(200);
					$('#box_alert').delay(3000).fadeOut(1000);
          		}else{
          			window.location = 'danh-sach-san-pham-yeu-thich.html';
          		}
          	}
      	});
      	
	}
}
function delLike(productid,userid){
	if(productid != '' && userid != ''){
		var xacnhanxoa = confirm('Bạn có chắc muốn xóa không?');
	    if(xacnhanxoa==true){
	    	$('.del'+productid).fadeOut();
		    $.ajax
	      	({
	         	method: "POST",
	         	url: "ajax/del_like",
	         	data: { productid:productid,userid:userid},
	      	});
	    }
	}
}
function showMode(mode){
	var url = window.location.href;
	var page = '';
	if(url.indexOf("?") != -1){
		if(url.indexOf("?mode") != -1){
			if(mode == 'grid'){
				page = url.replace("list", "grid");
			}else{
				page = url.replace("grid", "list");
			}
		}else if(url.indexOf("&mode") != -1){
			if(mode == 'grid'){
				page = url.replace("list", "grid");
			}else{
				page = url.replace("grid", "list");
			}
		}
		else{
			if(mode == 'grid'){
				page = url + '&mode=grid';
			}else{
				page = url + '&mode=list';
			}
		}
	}else{
		if(mode == 'grid'){
			page = url + '?mode=grid';
		}else{
			page = url + '?mode=list';
		}
	}
	window.location = page;
}
function showNumber(number){
	var url = window.location.href;
	var page = '';
	if(url.indexOf("?") != -1){
		if(url.indexOf("?limit") != -1){
			if(number == 24){
				if(url.indexOf("?limit=32") != -1){
					page = url.replace("?limit=32", "?limit=24");
				}
				else{
					page = url.replace("?limit=40", "?limit=24");
				}
			}else if(number == 32){
				if(url.indexOf("?limit=24") != -1){
					page = url.replace("?limit=24", "?limit=32");
				}
				else{
					page = url.replace("?limit=40", "?limit=32");
				}
			}else{
				if(url.indexOf("?limit=32") != -1){
					page = url.replace("?limit=32", "?limit=40");
				}
				else{
					page = url.replace("?limit=24", "?limit=40");
				}
			}
		}else if(url.indexOf("&limit") != -1){
			if(number == 24){
				if(url.indexOf("&limit=32") != -1){
					page = url.replace("&limit=32", "&limit=24");
				}
				else{
					page = url.replace("&limit=40", "&limit=24");
				}
			}else if(number == 32){
				if(url.indexOf("&limit=24") != -1){
					page = url.replace("&limit=24", "&limit=32");
				}
				else{
					page = url.replace("&limit=40", "&limit=32");
				}
			}else{
				if(url.indexOf("&limit=32") != -1){
					page = url.replace("&limit=32", "&limit=40");
				}
				else{
					page = url.replace("&limit=24", "&limit=40");
				}
			}
		}
		else{
			page = url + '&limit=' + number;
		}
	}else{
		page = url + '?limit=' + number;
	}
	window.location = page;
}
function showOrder(type,order){
	var url = window.location.href;
	var page = '';
	if(type == 'price'){
		if(url.indexOf("&orderid=desc") != -1){
			url = url.replace("&orderid=desc", "");
		}
		if(url.indexOf("&orderid=asc") != -1){
			url = url.replace("&orderid=asc", "");
		}
		if(url.indexOf("&order=choose") != -1){
			url = url.replace("?order=choose", "");
		}
		if(url.indexOf("&order=banchay") != -1){
			url = url.replace("?order=banchay", "");
		}
		if(url.indexOf("?order=banchay") != -1){
			if(order == 'asc'){
				page = url.replace("?order=banchay", "?price=asc");
			}else{
				page = url.replace("?order=banchay", "?price=desc");
			}
		}
		else if(url.indexOf("?order=choose") != -1){
			if(order == 'asc'){
				page = url.replace("?order=choose", "?price=asc");
			}else{
				page = url.replace("?order=choose", "?price=desc");
			}
		}
		else if(url.indexOf("?order=sale") != -1){
			if(order == 'asc'){
				page = url.replace("?order=sale", "?price=asc");
			}else{
				page = url.replace("?order=sale", "?price=desc");
			}
		}
		else if(url.indexOf("?orderid=desc") != -1){
			if(order == 'asc'){
				page = url.replace("?orderid=desc", "?price=asc");
			}else{
				page = url.replace("?orderid=desc", "?price=desc");
			}
		}
		else if(url.indexOf("?orderid=asc") != -1){
			if(order == 'asc'){
				page = url.replace("?orderid=asc", "?price=asc");
			}else{
				page = url.replace("?orderid=asc", "?price=desc");
			}
		}
		else if(url.indexOf("?") != -1){
			if(url.indexOf("?price") != -1){
				if(order == 'asc'){
					page = url.replace("?price=desc", "?price=asc");
				}else{
					page = url.replace("?price=asc", "?price=desc");
				}
			}else if(url.indexOf("&price") != -1){
				if(order == 'asc'){
					page = url.replace("&price=desc", "&price=asc");
				}else{
					page = url.replace("&price=asc", "&price=desc");
				}
			}
			else{
				if(order == 'asc'){
					page = url + '&price=asc';
				}else{
					page = url + '&mode=desc';
				}
			}
		}else{
			if(order == 'asc'){
				page = url + '?price=asc';
			}else{
				page = url + '?price=desc';
			}
		}
	}
	if(type == 'id'){
		if(url.indexOf("&price=desc") != -1){
			url = url.replace("&price=desc", "");
		}
		if(url.indexOf("&price=asc") != -1){
			url = url.replace("&price=asc", "");
		}
		if(url.indexOf("&order=choose") != -1){
			url = url.replace("?order=choose", "");
		}
		if(url.indexOf("&order=banchay") != -1){
			url = url.replace("?order=banchay", "");
		}
		if(url.indexOf("?order=banchay") != -1){
			if(order == 'asc'){
				page = url.replace("?order=banchay", "?orderid=asc");
			}else{
				page = url.replace("?order=banchay", "?orderid=desc");
			}
		}
		else if(url.indexOf("?order=choose") != -1){
			if(order == 'asc'){
				page = url.replace("?order=choose", "?orderid=asc");
			}else{
				page = url.replace("?order=choose", "?orderid=desc");
			}
		}
		else if(url.indexOf("?order=sale") != -1){
			if(order == 'asc'){
				page = url.replace("?order=sale", "?orderid=asc");
			}else{
				page = url.replace("?order=sale", "?orderid=desc");
			}
		}
		else if(url.indexOf("?price=desc") != -1){
			if(order == 'asc'){
				page = url.replace("?price=desc", "?orderid=asc");
			}else{
				page = url.replace("?price=desc", "?orderid=desc");
			}
		}
		else if(url.indexOf("?price=asc") != -1){
			if(order == 'asc'){
				page = url.replace("?price=asc", "?orderid=asc");
			}else{
				page = url.replace("?price=asc", "?orderid=desc");
			}
		}
		else if(url.indexOf("?") != -1){
			if(url.indexOf("?orderid") != -1){
				if(order == 'asc'){
					page = url.replace("?orderid=desc", "?orderid=asc");
				}else{
					page = url.replace("?orderid=asc", "?orderid=desc");
				}
			}else if(url.indexOf("&orderid") != -1){
				if(order == 'asc'){
					page = url.replace("&orderid=desc", "&orderid=asc");
				}else{
					page = url.replace("&orderid=asc", "&orderid=desc");
				}
			}
			else{
				if(order == 'asc'){
					page = url + '&orderid=asc';
				}else{
					page = url + '&orderid=desc';
				}
			}
		}else{
			if(order == 'asc'){
				page = url + '?orderid=asc';
			}else{
				page = url + '?orderid=desc';
			}
		}
	}
	if(type == 'order'){
		if(url.indexOf("&price=desc") != -1){
			url = url.replace("&price=desc", "");
		}
		if(url.indexOf("&price=asc") != -1){
			url = url.replace("&price=asc", "");
		}
		
		if(url.indexOf("&orderid=desc") != -1){
			url = url.replace("&orderid=desc", "");
		}
		if(url.indexOf("&orderid=asc") != -1){
			url = url.replace("&orderid=asc", "");
		}
		if(url.indexOf("?orderid=desc") != -1){
			//url = url.replace("?orderid=desc", "");
			if(order == 'choose'){
				page = url.replace("?orderid=desc", "?order=choose");
			}else if(order == 'sale'){
				page = url.replace("?orderid=desc", "?order=sale");
			}else{
				page = url.replace("?orderid=desc", "?order=banchay");
			}
		}
		else if(url.indexOf("?orderid=asc") != -1){
			if(order == 'choose'){
				page = url.replace("?orderid=asc", "?order=choose");
			}else if(order == 'sale'){
				page = url.replace("?orderid=asc", "?order=sale");
			}else{
				page = url.replace("?orderid=asc", "?order=banchay");
			}
		}
		else if(url.indexOf("?price=desc") != -1){
			if(order == 'choose'){
				page = url.replace("?price=desc", "?order=choose");
			}else if(order == 'sale'){
				page = url.replace("?price=desc", "?order=sale");
			}else{
				page = url.replace("?price=desc", "?order=banchay");
			}
		}else if(url.indexOf("?price=asc") != -1){
			if(order == 'choose'){
				page = url.replace("?price=asc", "?order=choose");
			}else if(order == 'sale'){
				page = url.replace("?price=asc", "?order=sale");
			}else{
				page = url.replace("?price=asc", "?order=banchay");
			}
		}
		else if(url.indexOf("?") != -1){
			if(url.indexOf("?order") != -1){
				if(order == 'choose'){
					if(url.indexOf("?order=banchay") != -1){
						page = url.replace("?order=banchay", "?order=choose");
					}else{
						page = url.replace("?order=sale", "?order=choose");
					}
				}else if(order == 'sale'){
					if(url.indexOf("?order=banchay") != -1){
						page = url.replace("?order=banchay", "?order=sale");
					}else{
						page = url.replace("?order=choose", "?order=sale");
					}
				}else{
					if(url.indexOf("?order=choose") != -1){
						page = url.replace("?order=choose", "?order=banchay");
					}else{
						page = url.replace("?order=sale", "?order=banchay");
					}
				}
			}else if(url.indexOf("&order") != -1){
				if(order == 'choose'){
					page = url.replace("&order=banchay", "&order=choose");
					page = url.replace("&order=sale", "&order=choose");
				}else if(order == 'sale'){
					page = url.replace("&order=banchay", "&order=sale");
					page = url.replace("&order=choose", "&order=sale");
				}else{
					page = url.replace("&order=choose", "&order=banchay");
					page = url.replace("&order=sale", "&order=banchay");
				}
				
			}else{
				if(order == 'choose'){
					page = url + '&order=choose';
				}else if(order == 'sale'){
					page = url + '&order=sale';
				}else{
					page = url + '&order=banchay';
				}
				
			}
		}else{
			if(order == 'choose'){
				page = url + '?order=choose';
			}else if(order == 'sale'){
					page = url + '?order=sale';
			}else{
				page = url + '?order=banchay';
			}
		}
	}
	window.location = page;
}
function loadDistrict(){
    var cityid = $('#cityid').val();
    if(cityid != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "ajax/loaddistrict",
           data: { cityid:cityid},
           dataType: "html",
            success: function(data){
              $('#districtid').html( data );
            }
        });
    }
}
function loadWard(){
    var districtid = $('#districtid').val();
    if(districtid != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "ajax/loadward",
           data: { districtid:districtid},
           dataType: "html",
            success: function(data){
              $('#wardid').html( data );
            }
        });
    }
}
function loadDistrictDiv(cityid,div){
    var cityid = $(cityid).val();
    if(cityid != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "ajax/loaddistrict",
           data: { cityid:cityid},
           dataType: "html",
            success: function(data){
              $(div).html( data );
            }
        });
    }
}
function loadWardDiv(districtid,div){
    var districtid = $(districtid).val();
    if(districtid != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "ajax/loadward",
           data: { districtid:districtid},
           dataType: "html",
            success: function(data){
              $(div).html( data );
            }
        });
    }
}
function loadShip(){
    var cityid = $('#cityid').val();
    var districtid = $('#districtid').val();
    if(cityid != '' && districtid != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "ajax/loadship",
           data: { cityid:cityid,districtid:districtid},
           dataType: "json",
            success: function(data){
               $('.leadtime-standard').css('display','block');
               $('#date_ship').html(data.date);
               $('#date_ship_next').html(data.date_next);
               $('#week_ship').html(data.week);
               $('#weeknext_ship').html(data.week_next);
            }
        });
    }
}
function updateCart(){
	$('#shopping-cart').submit();
	return false;
}
function upQty(){
	var qty = $('#qty').val();
	qty = parseInt(qty) + 1
	$('#qty').val(qty);
}
function downQty(){
	var qty = $('#qty').val();
	if(qty > 0){
		qty = parseInt(qty) - 1;
		$('#qty').val(qty);
	}
}
function deDanhMuaSau(productid,userid){
	var rowid = $('.dedanh' + productid).attr('rowid');
	if(productid != '' && userid != ''){
		$.ajax
      	({
         	method: "POST",
         	url: "ajax/dedanhmuasau",
         	data: { productid:productid,userid:userid,rowid:rowid},
         	dataType: "json",
         	success: function(data){
          		if(data.text == 1){
          			$('#bat_text').html('Sản phẩm đã có trong danh sách để dành'); 
					$('#box_alert').fadeIn(200);
					$('#box_alert').delay(3000).fadeOut(1000);
          		}else{
          			$('.shopping-cart-item' + productid).fadeOut();
          			window.setTimeout('location.reload()', 1000);
          		}
          	}
      	});
      	
	}
}
function delDeDanh(productid,userid){
	if(productid != '' && userid != ''){
		var xacnhanxoa = confirm('Bạn có chắc muốn xóa không?');
	    if(xacnhanxoa==true){
	    	$('.del'+productid).fadeOut();
		    $.ajax
	      	({
	         	method: "POST",
	         	url: "ajax/del_dedanh",
	         	data: { productid:productid,userid:userid},
	      	});
	    }
	}
}
function delRating(productid,userid){
	if(productid != '' && userid != ''){
		var xacnhanxoa = confirm('Bạn có chắc muốn xóa không?');
	    if(xacnhanxoa==true){
	    	$('.del'+productid).fadeOut();
		    $.ajax
	      	({
	         	method: "POST",
	         	url: "ajax/del_rating",
	         	data: { productid:productid,userid:userid},
	      	});
	    }
	}
}
function loadAlbum(id){
	if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "ajax/loadalbum",
           data: { id:id},
           dataType: "html",
            success: function(data){
            	$('#loadalbum').css('display','block');
              	$('#loadalbum').html( data );
            }
        });
    }
}

function loadVideo(id){
	if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "ajax/loadvideo",
           data: { id:id},
           dataType: "html",
            success: function(data){
            	$('#loadalbum').css('display','block');
              	$('#loadalbum').html( data );
            }
        });
    }
}

function getThanks(commentid,userid){
	if(commentid != '' && userid != ''){
	    $.ajax
      	({
         	method: "POST",
         	url: "ajax/getthanks",
         	data: { commentid:commentid,userid:userid},
         	dataType: "json",
         	success: function(data) {
		      	if(data){
		      		if(data.count_comment > 0){
		      			$('.link').html('<b>Bạn và ' + data.count_comment + ' người khác</b> đã cảm ơn nhận xét này');
		      		}else{
		      			$('.link').html('<b>Bạn </b> đã cảm ơn nhận xét này');
		      		}
		      	}
		    }
      	});
	}
}
function sentQuestion(num,productid){
	if(productid != '' && num != ''){
		$('.alert_khaosat').css('display','block');
		$('.customer-effort-score').css('display','none');
	    $.ajax
      	({
         	method: "POST",
         	url: "ajax/khaosat",
         	data: { productid:productid,num:num},
      	});
	}
}
function sentQuestionOrder(num,userid){
	if(userid != '' && num != ''){
		$('.alert_khaosat').css('display','block');
		$('.customer-effort-score').css('display','none');
	    $.ajax
      	({
         	method: "POST",
         	url: "ajax/khaosat_order",
         	data: { userid:userid,num:num},
      	});
	}
}
function checkMail(email,table,div,div_error,btn){
	var email = email.value;
	if(email != ''){
		$.ajax
      	({
         	method: "POST",
         	url: "ajax/checkemail",
         	data: { table:table,email:email},
         	dataType: "json",
         	success: function(data) {
		      	if(data.rs == 1){
		      		$(div).val('');
		      		$(div_error).css('display','block');
		      		$(div_error).html('Email đã bị trùng! Xin vui lòng kiểm tra lại!');
		      		$(btn).css('pointer-events','none');

		      	}else{
		      		$(div_error).css('display','none');
		      		$(div_error).html('');
		      		$(btn).css('pointer-events','auto');
		      	}
		    }
      	});
      	
	}
}
function sentCommentReply(parentid,productid,userid){
	var content = $('.review_comment' + parentid).val();
	if(content != ''){
		$.ajax
      	({
         	method: "POST",
         	url: "product/replycomment",
         	data: { parentid:parentid,productid:productid,userid:userid,content:content},
      	});
      	$('.review_comment' + parentid).val('');
      	$('.js-quick-reply').parent().parent().parent().find('.quick-reply').removeClass('move-quick-reply');
      	$('#bat_text').html('Gửi nhận xét thành công! Xin chân thành cảm ơn bạn!'); 
		$('#box_alert').fadeIn(200);
		$('#box_alert').delay(3000).fadeOut(1000);
	}else{
		$('#bat_text').html('Bạn chưa nhập nội dung nhận xét!'); 
		$('#box_alert').fadeIn(200);
		$('#box_alert').delay(3000).fadeOut(1000);
		return false;
	}
}
function getCommentError(commentid,userid){
	if(commentid != '' && userid != ''){
	    $.ajax
      	({
         	method: "POST",
         	url: "ajax/getcommenterror",
         	data: { commentid:commentid,userid:userid},
      	});
      	$('.report_bad_comment' + commentid).html('Đã báo xấu');
	}
}
function parseDate(str) {
    var mdy = str.split('/');
    return new Date(mdy[2], mdy[1], parseInt(mdy[0]));
}

function daydiff(first, second) {
    return (second-first)/(1000*60*60*24)
}
function monthDiff(start, end) {
    var tempDate = new Date(start);
    var monthCount = 0;
    while((tempDate.getMonth()+''+tempDate.getFullYear()) != (end.getMonth()+''+end.getFullYear())) {
        monthCount++;
        tempDate.setMonth(tempDate.getMonth()+1);
    }
    return monthCount+1;
}


