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
              <div class="mailbox-controls div_float_right">

              <div class="form-group">
                  <select class="form-control" id="s_thang" name="s_thang">
                    <option value=''>chon thang</option>
                       <option value='1' >Thang 1</option>
                       <option value='2' >Thang 2</option>
                       <option value='3' >Thang 3</option>
                       <option value='4' >Thang 4</option>
                       <option value='5' >Thang 5</option>
                       <option value='6' >Thang 6</option>
                       <option value='7' >Thang 7</option>
                       <option value='8' >Thang 8</option>
                       <option value='9' >Thang 9</option>
                       <option value='10' >Thang 10</option>
                       <option value='11' >Thang 11</option>
                       <option value='12' >Thang 12</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  placeholder="Lọc theo năm" name="keyword" id="keyword" />
                </div>
                     
                      
                
                        
                  
                  <a href="admin/bangluong/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                  <a control="bangluong" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                  <a control="bangluong" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th class="div_center"><input type="checkbox" class="check-all"></th>
                          <th class="div_center">Tháng năm</th>
                          <th class="div_center">Tháng</th> 
                          <th class="div_center">Năm</th>
                          <th class="div_center">Lương theo hơp đồng (vnđ)  </th> 
                          <th class="div_center">luong theo ngày công (vnđ)</th> 
                          <th class="div_center">Tổng các khoản thưởng (vnđ)</th>
                          <th class="div_center">Tổng các khoản giảm trừ</th>
                          <th class="div_center">Phụ cấp (vnđ)</th>
                          <th class="div_center">Thực lĩnh (vnđ)</th>
                          <th class="div_center">Ngày </th>
                          <th class="div_center">Ngày tạp mới</th>
                          <th class="div_center">Ngày câp nhật</th>
                          <th class="div_center">Hiển thị</th>
                      </tr>
                  </thead>
                  <tbody id="div_load">
                    <?php if(isset($bangluong) && $bangluong!=NULL){ ?>
                      <?php foreach($bangluong as $key => $val){ 
                        
                            
                        ?>

                      <tr> 
                        <td class="div_center">
                          <input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id'];?>">
                        </td>
                        <td><a href="admin/bangluong/edit/<?php echo $val['_id']?>"><?php echo $val['thangnam']?></a></td>
                          <td><?php echo ($val['thang']);?></td>
                          <td><?php echo ($val['nam']);?></td>
                          <td><?php echo number_format($val['hopdong']);?></td>
                          <td><?php echo number_format($val['ngaycong']);?></td>
                          <td><?php echo number_format($val['khoanthuong'])?></td>
                          <td><?php echo number_format($val['giamtru'])?></td>
                          <td><?php echo number_format($val['phucap'])?></td> 
                          <td><?php echo number_format($val['thuclinh'])?></td>  
                           <td><?php echo  $val['ngay'] ?></td>  
                           <td><?php echo $val['created'];?></td> 
                           <td><?php echo $val['updated'];?></td> 
                        <td class="div_center publish"><a onClick="show('<?php echo $val['_id']?>');" control="bangluong" title="Hiển thị" class="div_hienthi<?php echo $val['_id']?> div_hienthi" divid="div_hienthi<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>" value="<?php echo $val['_id'] ?>">
                          <?php if($val['publish'] == 0){ ?>
                            <i class="fa fa-check-circle"></i>
                          <?php }else{ ?>
                            <i class="fa fa-circle"></i>
                          <?php } ?></a>
                        </td>
                        <td class="div_center tool">
                          <a href="admin/bangluong/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
                          <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']; ?>" seq="<?php echo $val['_id']; ?>" control="bangluong"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
              </table>
              <?php echo isset($list_pagination)?$list_pagination:''; ?>
              <div class="mailbox-controls div_float_right">
                  <a href="admin/bangluong/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                  <a control="bangluong" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                  <a control="bangluong" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
              </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 $(document).ready(function(){
    $('#s_thang').change(function(){
        var s_thang = $(this).val();
        var keyword = $('#keyword').val();
        if(s_thang != '')  
        {
              $.ajax
              ({
                 method: "POST",
                 url: "admin/bangluong/search",
                 data: { s_thang:s_thang,keyword:keyword},
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
    $('#keyword').change(function(){
        var s_thang = $('#s_thang').val();
        var keyword = $('#keyword').val();
        if(keyword != '')  
        {
              $.ajax
              ({
                 method: "POST",
                 url: "admin/bangluong/search",
                 data: { keyword:keyword,s_thang:s_thang},
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
  });
</script>