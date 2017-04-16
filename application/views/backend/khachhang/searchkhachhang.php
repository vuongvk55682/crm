<div class="col-md-6">
  <div id="page_pagination" style="display: inline-block;">
    <span><?php echo isset($khachhang_num['num_from'])? $khachhang_num['num_from']:''; ?></span>
    &nbsp;
    <span>-</span>
    &nbsp;
    <span><?php echo isset($khachhang_num['num_to'])? $khachhang_num['num_to']:''; ?></span>
    &nbsp;
    <span>của</span>
    &nbsp;
    <span><?php echo isset($khachhang_num['count_kh'])? $khachhang_num['count_kh']:''; ?></span>
    &nbsp;
    <input type="hidden" name="khachhang_num" id="khachhang_num" value="<?php echo isset($khachhang_num['count_kh'])? $khachhang_num['count_kh']:''; ?>">
    <span>
      <a onclick="pagePrev()" id="page_prev" class="btn btn-default">
        <input type="hidden" name="num_prev" id="num_prev" value="<?php if (isset($khachhang_num['num_from'])) {$num_prev = (int)$khachhang_num['num_from'] - 1; echo $num_prev; } ?>">
        <i class="fa fa-chevron-left" aria-hidden="true"></i> 
      </a>
    </span>
    <span>
      <a onclick="pageNext()" id="page_next" class="btn btn-default">
        <input type="hidden" name="num_next" id="num_next" value="<?php echo isset($khachhang_num['num_to'])? $khachhang_num['num_to']:''; ?>">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>
    </span>
    <span>Trang</span>
    <span>
      <input type="text" name="page_index" id="page_index" maxlength="<?php echo isset($khachhang_num['max_length'])? $khachhang_num['max_length']:''; ?>" value="<?php echo isset($khachhang_num['page_change'])? $khachhang_num['page_change']:''; ?>" placeholder="" style="width: 3em;text-align: center;">
    </span>
    &nbsp;
    <span>/</span>
    <span><?php echo isset($khachhang_num['page_kh'])? $khachhang_num['page_kh']:''; ?></span>
    <input type="hidden" name="page_kh" id="page_kh" value="<?php echo isset($khachhang_num['page_kh'])? $khachhang_num['page_kh']:''; ?>">
  </div>
</div>
<div class="clear"></div>
<div class="mailbox-controls div_float_right">
    <a href="admin/khachhang/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
    <a control="khachhang" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
    <!-- <a control="khachhang" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a> -->
</div>
<div class="clear"></div>
<div class="table-responsive">
  <table id="kh_table" class="table table-bordered table-striped" >
    <thead>
      <tr>
          <th class="div_center"><input type="checkbox" class="check-all"></th>
          <th id="cols-27" class="div_center">Thao tác<div id="cols-27-sizer"></div></th>
          <th class="div_center">#</th>
          <th id="cols-1" class="div_center kh_ten_1">Tên khách hàng<div id="cols-1-sizer"></div></th> 
          <th id="cols-2" class="div_center kh_dienthoai_1">Điện thoại<div id="cols-2-sizer"></th>
          <th id="cols-3" class="div_center kh_diachi_1">Địa chỉ<div id="cols-3-sizer"></th>  
          <th id="cols-4" class="div_center kh_ma_1">Mã KH<div id="cols-4-sizer"></th> 
          <th id="cols-28" class="div_center kh_masothue_1">Mã số thuế<div id="cols-28-sizer"></th> 
          <th id="cols-5" class="div_center kh_email_1">Email<div id="cols-5-sizer"></th> 
          <th id="cols-6" class="div_center kh_fax_1">Fax<div id="cols-6-sizer"></th> 
          <th id="cols-7" class="div_center kh_logo_1">Logo<div id="cols-7-sizer"></th>
          <th id="cols-8" class="div_center kh_sothich_1">Sở thích<div id="cols-8-sizer"></th> 
          <th id="cols-9" class="div_center kh_cmnd_1">Chứng minh thư<div id="cols-9-sizer"></th> 
          <th id="cols-10" class="div_center kh_sinhnhat_1">Sinhnhật<div id="cols-10-sizer"></th> 
          <th id="cols-11" class="div_center kh_gioitinh_1">Giới tính<div id="cols-11-sizer"></th> 
          <th id="cols-12" class="div_center kh_tinhthanhpho_1">Tỉnh/Thành Phố<div id="cols-12-sizer"></th> 
          <th id="cols-13" class="div_center kh_quanhuyen_1">Quận huyện<div id="cols-13-sizer"></th> 
          <th id="cols-14" class="div_center kh_nganhhoc_1">Ngành học<div id="cols-14-sizer"></th> 
          <th id="cols-15" class="div_center kh_anh_1">Ảnh đại diện<div id="cols-15-sizer"></th> 
          <th id="cols-16" class="div_center kh_website_1">Website<div id="cols-16-sizer"></th> 
          <th id="cols-17" class="div_center kh_mota_1">Mô tả<div id="cols-17-sizer"></th>

          <th id="cols-18" class="div_center lienhe_1">Liên hệ<div id="cols-18-sizer"></th> 

          <th id="cols-19" class="div_center gt_ten_1">Người giới thiệu<div id="cols-19-sizer"></th> 
          <th id="cols-20" class="div_center gt_nguoipt_1">Người phụ trách<div id="cols-20-sizer"></th> 
          <th id="cols-21" class="div_center gt_nhomkh_1">Nhóm khách hàng<div id="cols-21-sizer"></th> 
          <th id="cols-22" class="div_center gt_nguonkh_1">Nguồn khách hàng<div id="cols-22-sizer"></th> 
          <th id="cols-23" class="div_center gt_moiqh_1">Mối quan hệ<div id="cols-23-sizer"></th> 

          <th id="cols-24" class="div_center" style="min-width: 12em;">Ngày tạo<div id="cols-24-sizer"></div></th>
          <th id="cols-25" class="div_center" style="min-width: 12em;">Ngày cập nhật<div id="cols-25-sizer"></div></th>
          <th id="cols-26" class="div_center">Hiển thị<div id="cols-26-sizer"></div></th> 
      </tr>
    </thead>
    <tbody>
      <?php if(isset($khachhang) && $khachhang!=NULL){ ?>
        <?php $i = $khachhang_num['num_from'] - 1; ?>
        <?php foreach($khachhang as $key => $val){ 
          $i++;
          if ($val['kh_gioitinh'] == 2) { $_gioitinh = "Nữ"; } else { $_gioitinh = "Nam"; }
          if (isset($val['kh_sinhnhat']) && $val['kh_sinhnhat'] != '0') {
            $date1 =  date('d/m/Y', $val['kh_sinhnhat']->sec);
            } else { $date1 = ''; }
          if (isset($val['kh_anh_thumb']) && $val['kh_anh_thumb'] != '') { $_kh_anh_thumb = $val['kh_anh_thumb']; } else { $_kh_anh_thumb = 'noavatar.png'; }
          if (isset($val['created'])) { $created_str = date('d-m-Y H:i:s', $val['created']->sec); } else { $created_str = ''; }
          if (isset($val['updated'])) { $updated_str = date('d-m-Y H:i:s', $val['updated']->sec); } else { $updated_str = ''; }
        ?>
        <tr> 
          <td class="div_center">
            <input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id'];?>">
          </td>
          <td class="div_center tool">
            <a href="admin/khachhang/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
            <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']; ?>" seq="<?php echo $val['_id']; ?>" control="khachhang"><i class="fa fa-trash"></i></a>
          </td>
          <td class="div_center"><?php echo $i ?></td>
          <td class="kh_ten_1"><a href="admin/khachhang/edit/<?php echo $val['_id']?>"><?php echo $val['kh_ten'];?></a></td>
          <td class="kh_dienthoai_1"><?php echo $val['kh_dienthoai']; ?></td>
          <td class="kh_diachi_1"><?php echo $val['kh_diachi']; ?></td>
          <td class="kh_ma_1"><?php echo $val['kh_ma']; ?></td>
          <td class="kh_masothue_1"><?php echo $val['kh_masothue']; ?></td>
          <td class="kh_email_1"><?php echo $val['kh_email']; ?></td>
          <td class="kh_fax_1"><?php echo $val['kh_fax']; ?></td>
          <td class="kh_logo_1"><?php echo $val['kh_logo']; ?></td>
          <td class="kh_sothich_1"><?php echo $val['kh_sothich']; ?></td>
          <td class="kh_cmnd_1"><?php echo $val['kh_cmnd']; ?></td> 
          <td class="kh_sinhnhat_1"><?php echo $date1; ?></td> 
          <td class="kh_gioitinh_1"><?php echo $_gioitinh; ?></td> 
          <td class="kh_tinhthanhpho_1">
            <?php if (isset($tinhthanhpho) && $tinhthanhpho != NULL) { ?>
              <?php foreach ($tinhthanhpho as $key1 => $val1) { ?>
                <?php if ($val1['_id'] == $val['kh_tinhthanhpho']) {
                  echo $val1['tinhthanhpho_ten'];
                } ?>
              <?php } ?>
            <?php } ?>
          </td> 
          <td class="kh_quanhuyen_1">
            <?php if (isset($quanhuyen) && $quanhuyen != NULL) { ?>
              <?php foreach ($quanhuyen as $key1 => $val1) { ?>
                <?php if ($val1['_id'] == $val['kh_quanhuyen']) {
                  echo $val1['quanhuyen_ten'];
                } ?>
              <?php } ?>
            <?php } ?>
          </td> 
          <td class="kh_nganhhoc_1">
            <?php if (isset($nganhhoc)&& $nganhhoc != NULL) { ?>
              <?php $nganhhoc_str = ''; ?>
              <?php foreach ($nganhhoc as $key1 => $val1) { ?>
                <?php foreach ($khachhang_nganhhoc as $key2 => $val2) { ?>
                  <?php if ($val2['id_nganhhoc'] == $val1['_id'] && $val2['id_khachhang'] == $val['_id']) {
                    $nganhhoc_str .= $val1['nganhhoc_ten'].", ";
                  } ?>
                <?php } ?>
              <?php } ?>
              <?php echo substr($nganhhoc_str,0,-2); ?>
            <?php } ?>
          </td>
          <td class="kh_anh_1" style="text-align: center;"><img src="upload/khachhang/thumb/<?php echo $_kh_anh_thumb; ?>" alt=""></td>
          <td class="kh_website_1"><?php echo $val['kh_website']; ?></td> 
          <td class="kh_mota_1"><?php echo $val['kh_mota']; ?></td> 

          <td class="lienhe_1"><?php echo $val['sum_lienhe']; ?></td> 

          <td class="gt_ten_1"><?php echo $val['gt_ten']; ?></td> 
          <td class="gt_nguoipt_1">
            <?php if (isset($nguoipt) && $nguoipt != NULL) { ?>
              <?php foreach ($nguoipt as $key1 => $val1) { ?>
                <?php if ($val1['_id'] == $val['gt_nguoipt']) {
                  echo $val1['nguoipt_ten'];
                } ?>
              <?php } ?>
            <?php } ?>
          </td> 
          <td class="gt_nhomkh_1">
            <?php if (isset($nhomkh)&& $nhomkh != NULL) { ?>
              <?php $nhomkh_str = ''; ?>
              <?php foreach ($nhomkh as $key1 => $val1) { ?>
                <?php foreach ($khachhang_nhomkh as $key2 => $val2) { ?>
                  <?php if ($val2['id_nhomkhachhang'] == $val1['_id'] && $val2['id_khachhang'] == $val['_id']) {
                    $nhomkh_str .= $val1['nhomkh_ten'].", ";
                  } ?>
                <?php } ?>
              <?php } ?>
              <?php echo substr($nhomkh_str,0,-2); ?>
            <?php } ?>
          </td>
          <td class="gt_nguonkh_1">
            <?php if (isset($nguonkh)&& $nguonkh != NULL) { ?>
              <?php $nguonkh_str = ''; ?>
              <?php foreach ($nguonkh as $key1 => $val1) { ?>
                <?php foreach ($khachhang_nguonkh as $key2 => $val2) { ?>
                  <?php if ($val2['id_nguonkhachhang'] == $val1['_id'] && $val2['id_khachhang'] == $val['_id']) {
                    $nguonkh_str .= $val1['nguonkh_ten'].", ";
                  } ?>
                <?php } ?>
              <?php } ?>
              <?php echo substr($nguonkh_str,0,-2); ?>
            <?php } ?>
          </td> 
          <td class="gt_moiqh_1">
            <?php if (isset($moiqh) && $moiqh != NULL) { ?>
              <?php foreach ($moiqh as $key1 => $val1) { ?>
                <?php if ($val1['_id'] == $val['gt_moiqh']) {
                  echo $val1['moiqh_ten'];
                } ?>
              <?php } ?>
            <?php } ?>
          </td> 
          <td><?php echo $created_str; ?></td>
          <td><?php echo $updated_str; ?></td>
          <td class="div_center publish"><a onClick="show('<?php echo $val['_id']?>');" control="khachhang" title="Hiển thị" class="div_hienthi<?php echo $val['_id']?> div_hienthi" divid="div_hienthi<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>">
            <?php if($val['publish'] == 0){ ?>
              <i class="fa fa-check-circle"></i>
            <?php }else{ ?>
              <i class="fa fa-circle"></i>
            <?php } ?></a>
          </td>
        </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</div>
<script type="text/javascript">
  $(document).ready(function(){
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

    $('#page_index').keypress(function(e){
      if(e.which == 13){//Enter key pressed
        return false;
      }
    });
    $('#page_index').change(function(){
      return pageChange();
    });
    $('#page_index').keyup(function(){
      var page_index = $('#page_index').val();
      var page_kh = $('#page_kh').val();
      if (parseInt(page_index) > parseInt(page_kh)) {
        var page_del = page_index.substring(0, page_index.length - 1);
        $('#page_index').val(page_del);
      }
    });

    if ($('.limit_page').hasClass('active-limit')) {
      $('.active-limit').addClass('bold');
    } else {
      $('.limit_page').removeClass('bold');
    }

    var num_limit     = $('.active-limit').attr('data-limit');
    var num_next      = $('#num_next').val();
    var num_prev      = $('#num_prev').val();
    var khachhang_num = $('#khachhang_num').val();
    var num_minus     = parseInt(khachhang_num) - parseInt(num_prev);

    if (parseInt(num_next) <= num_limit) 
    {
      $('#page_prev').addClass('disabled');
    }else {
      $('#page_prev').removeClass('disabled');
    }

    if (num_minus <= num_limit) {
      $('#page_next').addClass('disabled');
    } else {
      $('#page_next').removeClass('disabled');
    }
   
    $(function () {
      if ($('#kh_ten').is(":checked"))        { $('.kh_ten_1').show() }else{ $('.kh_ten_1').hide() }
      if ($('#kh_dienthoai').is(":checked"))  { $('.kh_dienthoai_1').show() }else{ $('.kh_dienthoai_1').hide() }
      if ($('#kh_diachi').is(":checked"))     { $('.kh_diachi_1').show() }else{ $('.kh_diachi_1').hide() }
      if ($('#kh_email').is(":checked"))      { $('.kh_email_1').show() }else{ $('.kh_email_1').hide() }
      if ($('#kh_ma').is(":checked"))         { $('.kh_ma_1').show() }else{ $('.kh_ma_1').hide() }
      if ($('#kh_masothue').is(":checked"))   { $('.kh_masothue_1').show() }else{ $('.kh_masothue_1').hide() }
      if ($('#kh_fax').is(":checked"))        { $('.kh_fax_1').show() }else{ $('.kh_fax_1').hide() }
      if ($('#kh_logo').is(":checked"))       { $('.kh_logo_1').show() }else{ $('.kh_logo_1').hide() }
      if ($('#kh_sothich').is(":checked"))    { $('.kh_sothich_1').show() }else{ $('.kh_sothich_1').hide() }
      if ($('#kh_cmnd').is(":checked"))       { $('.kh_cmnd_1').show() }else{ $('.kh_cmnd_1').hide() }
      if ($('#kh_sinhnhat').is(":checked"))   { $('.kh_sinhnhat_1').show() }else{ $('.kh_sinhnhat_1').hide() }
      if ($('#kh_gioitinh').is(":checked"))   { $('.kh_gioitinh_1').show() }else{ $('.kh_gioitinh_1').hide() }
      if ($('#kh_tinhthanhpho').is(":checked")) { $('.kh_tinhthanhpho_1').show() }else{ $('.kh_tinhthanhpho_1').hide() }
      if ($('#kh_quanhuyen').is(":checked"))  { $('.kh_quanhuyen_1').show() }else{ $('.kh_quanhuyen_1').hide() }
      if ($('#kh_nganhhoc').is(":checked"))   { $('.kh_nganhhoc_1').show() }else{ $('.kh_nganhhoc_1').hide() }
      if ($('#kh_anh').is(":checked"))        { $('.kh_anh_1').show() }else{ $('.kh_anh_1').hide() }
      if ($('#kh_website').is(":checked"))    { $('.kh_website_1').show() }else{ $('.kh_website_1').hide() }
      if ($('#kh_mota').is(":checked"))       { $('.kh_mota_1').show() }else{ $('.kh_mota_1').hide() }
      if ($('#lienhe').is(":checked"))        { $('.lienhe_1').show() }else{ $('.lienhe_1').hide() }
      if ($('#gt_ten').is(":checked"))        { $('.gt_ten_1').show() }else{ $('.gt_ten_1').hide() }
      if ($('#gt_nguoipt').is(":checked"))    { $('.gt_nguoipt_1').show() }else{ $('.gt_nguoipt_1').hide() }
      if ($('#gt_nhomkh').is(":checked"))     { $('.gt_nhomkh_1').show() }else{ $('.gt_nhomkh_1').hide() }
      if ($('#gt_nguonkh').is(":checked"))    { $('.gt_nguonkh_1').show() }else{ $('.gt_nguonkh_1').hide() }
      if ($('#gt_moiqh').is(":checked"))      { $('.gt_moiqh_1').show() }else{ $('.gt_moiqh_1').hide() }
    });
    $(function() {
      var thHeight = $("table#kh_table th:first").height();
      $("table#kh_table th").resizable({
          handles: "e",
          minHeight: thHeight,
          maxHeight: thHeight,
          minWidth: 40,
          resize: function (event, ui) {
            var sizerID = "#" + $(event.target).attr("id") + "-sizer";
            $(sizerID).width(ui.size.width);
          }
      });
    });
  });
</script>