$(document).ready(function(){
	$('.reset').click(function(){
		$('#frm-admin')[0].reset();
	});
	$('.add').click(function(){
	    $('#frm-admin').submit();
	    return false;
	});
  $('.edit_price').click(function(){
      $('#frm-price').submit();
      return false;
  });
  $('.edit_pricesale').click(function(){
      $('#frm-pricesale').submit();
      return false;
  });
  $('.add_addslow').click(function(){
      $('#frm-addslow').submit();
      return false;
  });
	$('#btn_show').click(function(){
		if($('.menu_tool').hasClass('move-div')){
			$('.menu_tool').removeClass('move-div');
		}else{
			$('.menu_tool').addClass('move-div');
		}
	});

  //set height sidebar
  var height_main = $( window ).height() - (50 + 35);
  $('.sidebar').height(height_main);

  $('.sidebar').hover(function(){
      if($(this).hasClass('move_sidebar')){
          $(this).removeClass('move_sidebar');
      }else{
          $(this).addClass('move_sidebar');
      }
  });
  // $(".select2").select2();
  $(".my-colorpicker2").colorpicker();


    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.div_fixed').addClass('move_fixed');
      }else {
        $('.div_fixed').removeClass('move_fixed');
      }
    });
    
    
    $('#search').keyup(function(){
        var keyword = $(this).val();
        var control = $(this).attr('control');
        if(keyword != '')  
        {
              $.ajax
              ({
                 method: "POST",
                 url: "admin/"+control+"/search",
                 data: { keyword:keyword},
                 dataType: "html",
                  success: function(data){
                    $('.pagination').html('');
                    $('.div_footer').html('');
                    $('#div_load').html( data );
                  }
              });

        }else{
            location.reload();
        }      
    });
    $('.check-all').click(function() {  //on click
        if(this.checked) { // check select status
            $('.checkbox-menu').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox-menu').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    $('.btn_sent').click(function(){
        var listid="";
        $("input[name='chon']").each(function(){
        if(this.checked){
          listid = listid+","+this.value;
        } 
        })
        listid=listid.substr(1);
        window.location = 'admin/mail/sent?listid='+listid;
    });
    $('a#del-all').click(function(){
        if($('.check-all').is(':checked') || $('.checkbox-menu').is(':checked')) {
          var xacnhanxoa = confirm('Bạn có chắc muốn xóa không?');
          var control = $(this).attr('control');
          if(xacnhanxoa==true){
            var listid="";
            $("input[name='chon']").each(function(){
            if(this.checked){
              $(this).parent().parent().fadeOut();
              listid = listid+","+this.value;
            } 
            })
            listid=listid.substr(1);
            if(listid != '')  
            {
                $.ajax
                ({
                 method: "POST",
                 url: "admin/"+control+"/deleteall",
                 data: { listid:listid},
                });
                window.setTimeout('location.reload()', 1000);
                return false;
            }
          }
        }else{
          alert('Vui lòng chọn đối tượng bạn muốn thao tác!!');
        }
    });
    $('a#show-all').click(function(){
        if($('.check-all').is(':checked') || $('.checkbox-menu').is(':checked')) {
          var control = $(this).attr('control');
          $("input[name='chon']").each(function(){
          if(this.checked){
            var divid = $(this).parent().parent().find('.publish').children('a.div_hienthi').attr('divid');
            listid = this.value;
            $.ajax
              ({
               method: "POST",
               url: "admin/"+control+"/showall",
               data: { listid:listid},
               dataType: "html",
                  success: function(data){
                    $( '.'+divid ).html( data );
                  }
              });
          } 
          });
        }else{
          alert('Vui lòng chọn đối tượng bạn muốn thao tác!!');
        }
    });
    $('a#permission').click(function(){
        if($('.check-all').is(':checked') || $('.checkbox-menu').is(':checked')) {
            var id_role = $('#id_role').val();
            var listid="";
            var unlistid="";
            $("input[name='chon']").each(function(){
            if(this.checked){
              listid = listid+","+this.value;
            }else{
              unlistid = unlistid+","+this.value;
            } 
            })
            listid=listid.substr(1);
            unlistid=unlistid.substr(1);
            if(listid != '')  
            {
                $.ajax
                ({
                 method: "POST",
                 url: "admin/role/updatepermission",
                 data: { listid:listid,unlistid:unlistid,id_role:id_role},
                });
                alert('Cập nhật phân quyền thành công!');
                window.setTimeout('location.reload()', 1000);
                return false;
            }
        }else{
          alert('Vui lòng chọn đối tượng bạn muốn thao tác!!');
        }
    });
    $('.sort').change(function() {
	      var id = $(this).attr('seq');
	      var sort = $(this).val();
	      var control = $(this).attr('control');
	      if(id != '')  
	      {
	          $.ajax
	          ({
	             method: "POST",
	             url: "admin/"+control+"/sort",
	             data: { id:id, sort:sort},
	          });
	      }       
	   });
    $('.method_order').change(function() {
        var id = $(this).attr('seq');
        var methodid = $(this).val();
        alert(methodid);
        if(methodid != '')  
        {
            $.ajax
            ({
               method: "POST",
               url: "admin/order/change_method",
               data: { methodid:methodid,id:id},
            });
        }       
     });
      $('#typeid').change(function() {
        var typeid = $(this).val();
        var control = $(this).attr('control');
        if(typeid != '')  
        {
            $.ajax
            ({
              method: "POST",
              url: "admin/"+control+"/loadtype",
              data: { typeid:typeid },
              dataType: "html",
              success: function(data){
                $('.pagination').html('');
                $('.div_footer').html('');
                $('#div_load').html(data);
              }
            });
        }else{
            location.reload();
        }        
      });
      $('#name').change(function(){
          var _title = $('#name').val();
          var control = $('#name').attr('control');
          if(title != '')  
          {
              $.ajax
              ({
                  method: "POST",
                  url: "admin/"+control+"/alias",
                  data: {_title:_title},
                  dataType: "json",
                  success: function(data){
                      $('#alias').val(data.alias);
                  }
              });
          }
      });
     $('.menu_item').click(function() {
          //$(this).parent().find('.fa-angle-down').css("display", "block");
          $(this).parent().find('.menu_child').animate({
              height: "toggle"
          }, 300);
     }); 
     $('#birthday').datetimepicker({
        format: 'YYYY/MM/DD HH:mm:ss'
    });

    $('#date').datetimepicker({
        format: 'YYYY/MM/DD'
    });



    $('.vieworder').click(function(){
        var id = $(this).attr('id');
        var control = $(this).attr('control');
        if(id != '')  
        {
              $.ajax
              ({
                 method: "POST",
                 url: "admin/"+control+"/listcart",
                 data: { id:id},
                 dataType: "html",
                 success: function(data){
                    $('#div_load_cart').addClass('div_load_cart');
                    $('#div_load_cart').html(data);
                 }
              });
        }       
    });
    // $('#div_load_cart').click(function(){
    //     $('#div_load_cart').removeClass('div_load_cart');
    // });
    
    
    

    setTimeout(function(){
        $('.success').fadeOut('400');
    }, 2000);
    setTimeout(function(){
        $('.error').fadeOut('400');
    }, 2000);
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
    $('#myTabs a[href="#profile"]').tab('show')
    $('#myTabs a:first').tab('show')
    $('#myTabs a:last').tab('show')

});
function show(id){
    var divid = $('.div_hienthi'+id).attr('divid');
    var control = $('.div_hienthi').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/show",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function status(id){
    var divid = $('.div_status'+id).attr('divid');
    var control = $('.div_status').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/status",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showtop(id){
    var divid = $('.div_top'+id).attr('divid');
    var control = $('.div_top').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showtop",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function changeparent(id){
    alert('Thay đổi thành công!!');
    var parentid = $('.parentid'+id).val();
    var control = $('.parentid'+id).attr('control');
    if(parentid != '')  
    {
          $.ajax
          ({
             method: "POST",
             url: "admin/"+control+"/changeparent",
             data: { id:id,parentid:parentid},
             dataType: "html",
          });
    }       
};
function showmenu(id){
    var divid = $('.div_menu'+id).attr('divid');
    var control = $('.div_menu').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showmenu",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showhome(id){
    var divid = $('.div_home'+id).attr('divid');
    var control = $('.div_home').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showhome",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showhomechild(id){
    var divid = $('.div_homechild'+id).attr('divid');
    var control = $('.div_homechild').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showhomechild",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function home(id){
    var divid = $('.div_is_home'+id).attr('divid');
    var control = $('.div_is_home').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/home",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function hots(id){
    var divid = $('.div_is_hot'+id).attr('divid');
    var control = $('.div_is_hot').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/hot",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showleft(id){
    var divid = $('.div_left'+id).attr('divid');
    var control = $('.div_left').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showleft",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showhuuich(id){
    var divid = $('.div_huuich'+id).attr('divid');
    var control = $('.div_huuich').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showhuuich",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showbanchay(id){
    var divid = $('.div_banchay'+id).attr('divid');
    var control = $('.div_banchay').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showbanchay",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showchoose(id){
    var divid = $('.div_choose'+id).attr('divid');
    var control = $('.div_choose').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showchoose",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showtop(id){
    var divid = $('.div_top'+id).attr('divid');
    var control = $('.div_top').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showtop",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function shownew(id){
    var divid = $('.div_new'+id).attr('divid');
    var control = $('.div_new').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/shownew",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showslider(id){
    var divid = $('.div_slider'+id).attr('divid');
    var control = $('.div_slider').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showslider",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showsale(id){
    var divid = $('.div_sale'+id).attr('divid');
    var control = $('.div_sale').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showsale",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showfooter(id){
    var divid = $('.div_footer'+id).attr('divid');
    var control = $('.div_footer').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showfooter",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showbanner(id){
    var divid = $('.div_banner'+id).attr('divid');
    var control = $('.div_banner').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showbanner",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function showhot(id){
    var divid = $('.div_hot'+id).attr('divid');
    var control = $('.div_hot').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/showhot",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function active(id){
    var divid = $('.div_active'+id).attr('divid');
    var control = $('.div_active').attr('control');
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/"+control+"/active",
           data: { id:id},
           dataType: "html",
            success: function(data){
              $( '.'+divid ).html( data );
            }
        });
    }
}
function del(id) {
    var xacnhanxoa = confirm('Bạn có chắc muốn xóa không?');
    if(xacnhanxoa==true){
      $('.delete'+id).parent().parent().fadeOut();
      // alert(id);
      var control = $('.delete').attr('control');
          if(id != '')  
          { 
            $.ajax
            ({
               method: "POST",
               url: "admin/"+control+"/delete",
               data: { id:id},
            });
            window.setTimeout('location.reload()', 2000);
          }
    }
}
function changType(id){
    var typeid = $('.parentid'+id).val();
    var control = $('.parentid'+id).attr('control');
    if(id != '')  
    {
        $.ajax
        ({
          method: "POST",
          url: "admin/"+control+"/change_type",
          data: { typeid:typeid,id:id}
        });
    }   
}
function loadDistrict(){
    var cityid = $('#cityid').val();
    if(cityid != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/ajax/loaddistrict",
           data: { cityid:cityid},
           dataType: "html",
            success: function(data){
              $('#districtid').html( data );
            }
        });
    }
}


function delDropzone(id) {
    var xacnhanxoa = confirm('Bạn có chắc muốn xóa không?');
    if(xacnhanxoa==true){
      $('.delete'+id).parent().fadeOut();
      var control = $('.delete').attr('control');
          if(id != '')  
          { 
            $.ajax
            ({
               method: "POST",
               url: "admin/"+control+"/delimgdetail",
               data: { id:id},
            });
            window.setTimeout('location.reload()', 2000);
          }
    }   
}
function banchay(banchay,table,id) {
  var banchay = banchay.value;
  if(banchay != '' && id != '')  
  {
      $.ajax
      ({
         method: "POST",
         url: "admin/ajax/banchay",
         data: { id:id, banchay:banchay,table:table},
      });
  }       
}
function filterMethodOrder(){
    $('#frm_filterOrder').submit();
    return false;
}
function getReply(id,divload){
    if(id != '')  
    {
        $.ajax
        ({
           method: "POST",
           url: "admin/ajax/replycomment",
           data: { id:id},
           dataType: "html",
           success: function(data){
              $(divload).addClass('div_load_cart');
              $(divload).html(data);
           }
        });
    }       
}

function FormatNumber(num)
{
    var pattern = "0123456789.";
    var len = num.value.length;
    if (len != 0)
    {
        var index = 0;
        
        while ((index < len) && (len != 0))
            if (pattern.indexOf(num.value.charAt(index)) == -1)
            {
                if (index == len-1)
                    num.value = num.value.substring(0, len-1);
                else if (index == 0)
                        num.value = num.value.substring(1, len);
                     else num.value = num.value.substring(0, index)+num.value.substring(index+1, len);
                index = 0;
                len = num.value.length;
            }
            else index++;
    }
    val = num.value;
    val = val.replace(/[^\d.]/g,"");
    arr = val.split('.');
    lftsde = arr[0];
    rghtsde = arr[1];
    result = "";
    lng = lftsde.length;
    j = 0;
    for (i = lng; i > 0; i--){
        j++;
        if (((j % 3) == 1) && (j != 1)){
            result = lftsde.substr(i-1,1) + "," + result;
        }else{
            result = lftsde.substr(i-1,1) + result;
        }
    }
    if(rghtsde==null){
        num.value = result;
    }else{
        num.value = result+'.'+arr[1];
    }
}



