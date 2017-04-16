<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3> 
            </div>
            <div class="box-body">
              <div class="col-md-12">
                  <?php
                      $message_flashdata = $this->session->flashdata('message_flashdata');
                      if(isset($message_flashdata) && count($message_flashdata)){
                        if($message_flashdata['type'] == 'sucess'){
                        ?>
                          <div class="success"><i class="fa fa-check"></i> <?php echo $message_flashdata['message']; ?></div>
                        <?php
                        }else if($message_flashdata['type'] == 'error'){
                        ?>
                          <div class="error"><i class="fa fa-close"></i> <?php echo $message_flashdata['message']; ?></div> 
                        <?php
                        }
                      }
                  ?>
              </div>
              <div class="clear"></div>
              <div id="div_load">
                <div class="col-md-6">
                  <div id="page_pagination" style="display: inline-block;">
                    <span>1</span>
                    &nbsp;
                    <span>-</span>
                    &nbsp;
                    <span>50</span>
                    &nbsp;
                    <span>của</span>
                    &nbsp;
                    <span><?php echo isset($quanhuyen_num['count_kh'])? $quanhuyen_num['count_kh']:''; ?></span>
                    &nbsp;
                    <input type="hidden" name="quanhuyen_num" id="quanhuyen_num" value="<?php echo isset($quanhuyen_num['count_kh'])? $quanhuyen_num['count_kh']:''; ?>">
                    <span>
                      <a onclick="pagePrev()" id="page_prev" class="btn btn-default disabled">
                        <input type="hidden" name="num_prev" id="num_prev" value="0">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> 
                      </a>
                    </span>
                    <span>
                      <a onclick="pageNext()" id="page_next" class="btn btn-default">
                        <input type="hidden" name="num_next" id="num_next" value="50">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </span>
                    <span>Trang</span>
                    <span>
                      <input type="text" name="page_index" id="page_index" value="1" maxlength="<?php echo isset($quanhuyen_num['max_length'])? $quanhuyen_num['max_length']:''; ?>" style="width: 3em;text-align: center;">
                    </span>
                    &nbsp;
                    <span>/</span>
                    <span><?php echo isset($quanhuyen_num['page_kh'])? $quanhuyen_num['page_kh']:''; ?></span>
                    <input type="hidden" name="page_kh" id="page_kh" value="<?php echo isset($quanhuyen_num['page_kh'])? $quanhuyen_num['page_kh']:''; ?>">
                  </div>
                </div>
                <div class="clear"></div>
                <div class="mailbox-controls div_float_right">
                    <a href="admin/quanhuyen/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="quanhuyen" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                    <a control="quanhuyen" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">#</th>
                            <th class="div_center">Quận huyện</th>
                            <th class="div_center">Tỉnh Thành phố trực thuộc</th> 
                            <th class="div_center">Ngày tạo</th>
                            <th class="div_center">Ngày cập nhật</th>
                            <th class="div_center">Hiển thị</th> 
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($quanhuyen) && $quanhuyen!=NULL){ ?>
                        <?php $i = 0; ?>
                        <?php foreach($quanhuyen as $key => $val){
                          $i++;
                          if (isset($val['created'])) { $created_str = date('d-m-Y H:i:s', $val['created']->sec); } else { $created_str = ''; }
                          if (isset($val['updated'])) { $updated_str = date('d-m-Y H:i:s', $val['updated']->sec); } else { $updated_str = ''; }
                        ?>
                        <tr> 
                          <td class="div_center">
                            <input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id'];?>">
                          </td>
                          <td class="div_center"><?php echo $i ?></td>
                          <td><a href="admin/quanhuyen/edit/<?php echo $val['_id']?>"><?php echo $val['quanhuyen_ten'];?></a></td>
                          <td>
                            <?php if (isset($tinhthanhpho) && $tinhthanhpho != NULL) {
                              foreach ($tinhthanhpho as $key1 => $val1) {
                                if ($val1['_id'] == $val['id_tinhthanhpho']) {
                                  echo $val1['tinhthanhpho_ten'];
                                }
                              }
                            } ?>
                          </td>
                          <td><?php echo $created_str; ?></td>
                          <td><?php echo $updated_str; ?></td>
                          <td class="div_center publish"><a onClick="show('<?php echo $val['_id']?>');" control="quanhuyen" title="Hiển thị" class="div_hienthi<?php echo $val['_id']?> div_hienthi" divid="div_hienthi<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>">
                            <?php if($val['publish'] == 0){ ?>
                              <i class="fa fa-check-circle"></i>
                            <?php }else{ ?>
                              <i class="fa fa-circle"></i>
                            <?php } ?></a>
                          </td>
                          <td class="div_center tool">
                            <a href="admin/quanhuyen/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
                            <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>" control="quanhuyen"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                </table>
              </div>
              <?php echo isset($list_pagination)?$list_pagination:''; ?>
              <div class="mailbox-controls div_float_right">
                  <a href="admin/quanhuyen/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                  <a control="quanhuyen" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                  <a control="quanhuyen" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
              </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
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
    var quanhuyen_num  = $('#quanhuyen_num').val();
    var num_prev      = $('#num_prev').val();
    var num_minus     = parseInt(quanhuyen_num) - parseInt(num_prev);

    if (num_minus <= num_limit) {
      $('#page_next').addClass('disabled');
    } else {
      $('#page_next').removeClass('disabled');
    }
  });

  function pagePrev(){
    var num_prev        = $('#num_prev').val();
    var page_index      = $('#page_index').val();
    $.post("admin/quanhuyen/pagepagination",{ num_prev:num_prev, page_index:page_index },function(data){
      $('#div_load').html( data );
    });
  }
  function pageNext(){
    var num_next        = $('#num_next').val();
    var page_index      = $('#page_index').val();
    $.post("admin/quanhuyen/pagepagination",{ num_next:num_next, page_index:page_index },function(data){
      $('#div_load').html( data );
    });
  }
  function pageChange(){
    var page_index      = $('#page_index').val();
    $.post("admin/quanhuyen/pagepagination",{ page_index:page_index },function(data){
      $('#div_load').html( data );
    });
  }
</script>