<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-bbooking">
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
                        <div class="input-group-addon">Tìm kiếm</div>
                        <input type="text" class="form-control" id="search" name="search" control="booking">
                        <div class="input-group-addon"><i class="fa fa-search"></i></div>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-4 div_float_right"><div class="row">
                    <a control="booking" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                </div></div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">Chi tiết</th>
                            <th class="div_center">Khách hàng</th> 
                            <th class="div_center">Điện thoại</th>
                            <th class="div_center">Email</th> 
                            <th class="div_center">Ngày nhận</th> 
                            <th class="div_center">Ngày trả</th> 
                            <th class="div_center">Người lớn</th> 
                            <th class="div_center">Trẻ em</th> 
                            <th class="div_center">Đêm</th> 
                            <th class="div_center">Ngày cập nhật</th>
                            <th class="div_center">Trạng thái</th> 
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="div_load">
                        <?php if(isset($booking) && $booking!=NULL){ ?>
                            <?php foreach($booking as $key => $val){ ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td class="div_center"><a class="label label-success vieworder" control="booking" id="<?php echo $val['id']?>">Xem</a></td>
                              <td><?php echo $val['fullname'];?></td>
                              <td><?php echo $val['phone'];?></td>
                              <td><?php echo $val['email'];?></td>
                              <td><?php echo $val['ngaynhan'];?></td>
                              <td><?php echo $val['ngaytra'];?></td>
                              <td><?php echo $val['nguoilon'];?></td>
                              <td><?php echo $val['treem'];?></td>
                              <td><?php echo $val['dem'];?></td>
                              <td><?php echo $val['created'];?></td>
                              
                              <td class="div_center publish"><a onClick="status(<?php echo $val['id']?>);" control="booking" title="Trạng thái" class="div_status<?php echo $val['id']?> div_status" divid="div_status<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['status'] == 0){ ?>
                                   <span class="label label-danger">Chưa xử lý</span>
                                <?php }else{ ?>
                                  <span class="label label-success">Đã xử lý</span>
                                <?php } ?></a>
                              </td>
                              <td class="div_center tool">
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="booking"><i class="fa fa-trash"></i></a>
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