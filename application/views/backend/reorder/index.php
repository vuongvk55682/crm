<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3> 
            </div>
            <!-- /.box-header -->
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
                <div class="col-md-4">
                  <div class="row">
                    <div class="input-group">
                        <div class="input-group-addon">Kiểm tra mã đơn hàng</div>
                        <input type="text" class="form-control" id="search" name="search" control="reorder">
                        <div class="input-group-addon"><i class="fa fa-search"></i></div>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-4 div_float_right"><div class="row">
                    <a control="reorder" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                </div></div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">Mã đơn hàng</th> 
                            <th class="div_center">Tên khách hàng</th>
                            <th class="div_center">Số điện thoại</th> 
                            <th class="div_center">Email</th> 
                            <th class="div_center">Thời gian</th>
                            <th class="div_center">Địa điểm</th> 
                            <th class="div_center">Ngày gửi</th>
                            <th class="div_center">Nội dung dịch vụ</th>
                            <th class="div_center">Trạng thái</th> 
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="div_load">
                        <?php if(isset($reorder) && $reorder!=NULL){ ?>
                            <?php foreach($reorder as $key => $val){ 
                                if($val['position'] == 0){
                                    $position = 'Tại nhà';
                                }else{
                                    $position = 'Tại công ty';
                                }

                            ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td>#<?php echo $val['id'];?></td>
                              <td><?php echo $val['username'];?></td>
                              <td><?php echo $val['phone'];?></td>
                              <td><?php echo $val['email'];?></td>
                              <td><?php echo $val['date'];?> (<?php echo $val['time'];?>)</td>
                              <td><?php echo $position;?> <br/><?php if($val['address'] != ''){ ?>(<?php echo $val['address'];?>)<?php } ?></td>
                              <td><?php echo $val['created'];?></td>
                              <td><?php echo $val['content'];?></td>
                              <td class="div_center publish"><a onClick="status(<?php echo $val['id']?>);" control="reorder" title="Trạng thái" class="div_status<?php echo $val['id']?> div_status" divid="div_status<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['status'] == 0){ ?>
                                   <span class="label label-danger">Chưa xử lý</span>
                                <?php }else{ ?>
                                  <span class="label label-success">Đã xử lý</span>
                                <?php } ?></a>
                              </td>
                              <td class="div_center tool">
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="reorder"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo isset($list_pagination)?$list_pagination:''; ?>
            </div>
        </div>
    </div>
</div>
<div id="div_load_cart"></div>