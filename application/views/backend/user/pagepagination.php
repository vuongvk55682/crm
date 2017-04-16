<div class="col-md-6">
  <div id="page_pagination" style="display: inline-block;">
    <span><?php echo isset($ci_user_num['num_from'])? $ci_user_num['num_from']:''; ?></span>
    &nbsp;
    <span>-</span>
    &nbsp;
    <span><?php echo isset($ci_user_num['num_to'])? $ci_user_num['num_to']:''; ?></span>
    &nbsp;
    <span>của</span>
    &nbsp;
    <span><?php echo isset($ci_user_num['count_kh'])? $ci_user_num['count_kh']:''; ?></span>
    &nbsp;
    <input type="hidden" name="ci_user_num" id="ci_user_num" value="<?php echo isset($ci_user_num['count_kh'])? $ci_user_num['count_kh']:''; ?>">
    <span>
      <a onclick="pagePrev()" id="page_prev" class="btn btn-default">
        <input type="hidden" name="num_prev" id="num_prev" value="<?php if (isset($ci_user_num['num_from'])) {$num_prev = (int)$ci_user_num['num_from'] - 1; echo $num_prev; } ?>">
        <i class="fa fa-chevron-left" aria-hidden="true"></i> 
      </a>
    </span>
    <span>
      <a onclick="pageNext()" id="page_next" class="btn btn-default">
        <input type="hidden" name="num_next" id="num_next" value="<?php echo isset($ci_user_num['num_to'])? $ci_user_num['num_to']:''; ?>">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>
    </span>
    <span>Trang</span>
    <span>
      <input type="text" name="page_index" id="page_index" maxlength="<?php echo isset($ci_user_num['max_length'])? $ci_user_num['max_length']:''; ?>" value="<?php echo isset($ci_user_num['page_change'])? $ci_user_num['page_change']:''; ?>" placeholder="" style="width: 3em;text-align: center;">
    </span>
    &nbsp;
    <span>/</span>
    <span><?php echo isset($ci_user_num['page_kh'])? $ci_user_num['page_kh']:''; ?></span>
    <input type="hidden" name="page_kh" id="page_kh" value="<?php echo isset($ci_user_num['page_kh'])? $ci_user_num['page_kh']:''; ?>">
  </div>
</div>
<div class="clear"></div>
<div class="mailbox-controls div_float_right">
    <a href="admin/role/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
    <a control="role" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
    <a control="role" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
</div>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="div_center"><input type="checkbox" class="check-all"></th>
            <th class="div_center">#</th>
            <th class="div_center">Tài khoản</th>
            <th class="div_center">Họ & Tên</th>
            <th class="div_center">Email</th>
            <th class="div_center">Thuộc nhóm</th>
            <th class="div_center">Ảnh</th> 
            <th class="div_center">Ngày tạo</th>
            <th class="div_center">Kích hoạt</th> 
            <th class="div_center">Thao tác</th>
        </tr>
    </thead>
    <tbody id="div_load">
        <?php if(isset($user) && $user!=NULL){ ?>
          <?php $i = $ci_user_num['num_from'] - 1; ?>
          <?php foreach($user as $key => $val){ 
            $i++;
            if (isset($val['kh_anh_thumb']) && $val['kh_anh_thumb'] != '') { $_kh_anh_thumb = $val['kh_anh_thumb']; } else { $_kh_anh_thumb = 'noavatar.png'; }
            if (isset($val['created'])) { $created_str = date('d-m-Y H:i:s', $val['created']->sec); } else { $created_str = ''; }
          ?>
          <tr>
            <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id']?>"></td>
            <td class="div_center"><?php echo $i ?></td>
            <td><a href="admin/user/edit/<?php echo $val['_id']?>"><?php echo $val['username'];?></a></td>
            <td><?php echo $val['fullname'];?></td>
            <td><?php echo $val['email'];?></td>
            <td>
              <?php if (isset($role) && $role != NULL) { ?>
                <?php foreach ($role as $key1 => $val1) { ?>
                  <?php if ($val1['_id'] == $val['id_role']) {
                   echo $val1['name'];
                  } ?>
                <?php } ?>
              <?php } ?>
            </td>
            <td class="div_center"><?php if($val['avatar_thumb']!=''){ ?> <img src="upload/user/thumb/<?php echo $val['avatar_thumb'];?>" alt="" class="img_admin">
            <?php }?></td>
            <td><?php echo $created_str; ?></td>
            <td class="div_center publish"><a onClick="active('<?php echo $val['_id']?>');" control="user" title="Hiển thị" class="div_active<?php echo $val['_id']?> div_active" divid="div_active<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>">
              <?php if($val['active'] == 0){ ?>
                <i class="fa fa-check-circle"></i>
              <?php }else{ ?>
                <i class="fa fa-circle"></i>
              <?php } ?></a>
            </td>
            <td class="div_center tool">
              <a href="admin/user/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
              <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>" control="user"><i class="fa fa-trash"></i></a>
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
    var ci_user_num  = $('#ci_user_num').val();
    var num_minus     = parseInt(ci_user_num) - parseInt(num_prev);

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