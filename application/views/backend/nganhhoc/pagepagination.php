<div class="col-md-6">
  <div id="page_pagination" style="display: inline-block;">
    <span><?php echo isset($nganhhoc_num['num_from'])? $nganhhoc_num['num_from']:''; ?></span>
    &nbsp;
    <span>-</span>
    &nbsp;
    <span><?php echo isset($nganhhoc_num['num_to'])? $nganhhoc_num['num_to']:''; ?></span>
    &nbsp;
    <span>của</span>
    &nbsp;
    <span><?php echo isset($nganhhoc_num['count_kh'])? $nganhhoc_num['count_kh']:''; ?></span>
    &nbsp;
    <input type="hidden" name="nganhhoc_num" id="nganhhoc_num" value="<?php echo isset($nganhhoc_num['count_kh'])? $nganhhoc_num['count_kh']:''; ?>">
    <span>
      <a onclick="pagePrev()" id="page_prev" class="btn btn-default">
        <input type="hidden" name="num_prev" id="num_prev" value="<?php if (isset($nganhhoc_num['num_from'])) {$num_prev = (int)$nganhhoc_num['num_from'] - 1; echo $num_prev; } ?>">
        <i class="fa fa-chevron-left" aria-hidden="true"></i> 
      </a>
    </span>
    <span>
      <a onclick="pageNext()" id="page_next" class="btn btn-default">
        <input type="hidden" name="num_next" id="num_next" value="<?php echo isset($nganhhoc_num['num_to'])? $nganhhoc_num['num_to']:''; ?>">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>
    </span>
    <span>Trang</span>
    <span>
      <input type="text" name="page_index" id="page_index" maxlength="<?php echo isset($nganhhoc_num['max_length'])? $nganhhoc_num['max_length']:''; ?>" value="<?php echo isset($nganhhoc_num['page_change'])? $nganhhoc_num['page_change']:''; ?>" placeholder="" style="width: 3em;text-align: center;">
    </span>
    &nbsp;
    <span>/</span>
    <span><?php echo isset($nganhhoc_num['page_kh'])? $nganhhoc_num['page_kh']:''; ?></span>
    <input type="hidden" name="page_kh" id="page_kh" value="<?php echo isset($nganhhoc_num['page_kh'])? $nganhhoc_num['page_kh']:''; ?>">
  </div>
</div>
<div class="clear"></div>
<div class="mailbox-controls div_float_right">
    <a href="admin/nganhhoc/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
    <a control="nganhhoc" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
    <a control="nganhhoc" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
</div>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="div_center"><input type="checkbox" class="check-all"></th>
            <th class="div_center">#</th>
            <th class="div_center">Ngành học</th> 
            <th class="div_center">Ngày tạo</th>
            <th class="div_center">Ngày cập nhật</th>
            <th class="div_center">Hiển thị</th> 
            <th class="div_center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
      <?php if(isset($nganhhoc) && $nganhhoc!=NULL){ ?>
        <?php $i = $nganhhoc_num['num_from'] - 1; ?>
        <?php foreach($nganhhoc as $key => $val){
          $i++;
          if (isset($val['created'])) { $created_str = date('d-m-Y H:i:s', $val['created']->sec); } else { $created_str = ''; }
          if (isset($val['updated'])) { $updated_str = date('d-m-Y H:i:s', $val['updated']->sec); } else { $updated_str = ''; }
        ?>
        <tr> 
          <td class="div_center">
            <input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id'];?>">
          </td>
          <td class="div_center"><?php echo $i ?></td>
          <td><a href="admin/nganhhoc/edit/<?php echo $val['_id']?>"><?php echo $val['nganhhoc_ten'];?></a></td>
          <td><?php echo $created_str; ?></td>
          <td><?php echo $updated_str; ?></td>
          <td class="div_center publish"><a onClick="show('<?php echo $val['_id']?>');" control="nganhhoc" title="Hiển thị" class="div_hienthi<?php echo $val['_id']?> div_hienthi" divid="div_hienthi<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>">
            <?php if($val['publish'] == 0){ ?>
              <i class="fa fa-check-circle"></i>
            <?php }else{ ?>
              <i class="fa fa-circle"></i>
            <?php } ?></a>
          </td>
          <td class="div_center tool">
            <a href="admin/nganhhoc/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
            <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>" control="nganhhoc"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
</table>
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
    
    var num_limit     = 50;
    var num_next      = $('#num_next').val();
    var num_prev      = $('#num_prev').val();
    var nganhhoc_num  = $('#nganhhoc_num').val();
    var num_minus     = parseInt(nganhhoc_num) - parseInt(num_prev);

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
  });
</script>