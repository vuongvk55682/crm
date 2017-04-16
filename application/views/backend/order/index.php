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
                        <input type="text" class="form-control" id="search" name="search" control="order">
                        <div class="input-group-addon"><i class="fa fa-search"></i></div>
                    </div>
                  </div>
                </div>
                <form method="get" action="" id="frm_filterOrder">
                <div class="col-md-3">
                  <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                      <select onchange="filterMethodOrder();" class="form-control select2" name="methodid" id="methodid">
                        <option value="">Lọc đơn hàng theo</option>
                        <option value="0">Tất cả đơn hàng</option>
                        <option value="1">Mới đặt hàng</option>
                        <option value="2">Tiếp nhận đơn hàng</option>
                        <option value="3">Đóng gói hoàn tất</option>
                        <option value="4">Bắt đầu giao hàng</option>
                        <option value="5">Giao hàng thành công</option>
                      </select>
                  </div>
                </div>
                </form>
                <div class="col-md-4 div_float_right"><div class="row">
                    <a control="order" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                </div></div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">Mã đơn hàng</th> 
                            <th class="div_center">Đơn hàng</th> 
                            <th class="div_center">Khách hàng</th> 
                            <th class="div_center">Điện thoại</th>
                            <th class="div_center">Email</th> 
                            <th class="div_center">Thanh toán</th>
                            <th class="div_center">Ngày cập nhật</th>
                            <th class="div_center">Trình trạng</th>
                            <th class="div_center">Trạng thái</th> 
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="div_load">
                        <?php if(isset($order) && $order!=NULL){ ?>
                            <?php foreach($order as $key => $val){ 
                                $method = '';
                                if($val['method'] == 1){
                                    $method = 'Thanh toán tiền mặt khi nhận hàng';
                                }else if($val['method'] == 2){
                                    $method = 'Thanh toán bằng hình thức chuyển khoản';
                                }else{
                                    $method = 'Thanh toán Paypal';
                                }

                            ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td><?php echo $val['code'];?></td>
                              <td class="div_center"><a class="label label-success vieworder" control="order" id="<?php echo $val['id']?>">Xem</a></td>
                              <td><?php echo $val['fullname'];?></td>
                              <td><?php echo $val['phone'];?></td>
                              <td><?php echo $val['email'];?></td>
                              <td><?php echo $method;?></td>
                              <td><?php echo $val['created'];?></td>
                              <td>
                                  <select width="80" name="method_order" id="method_order" class="method_order" seq="<?php echo $val['id']?>"> 
                                      <option value="1" <?php if($val['methodid'] == 1){ ?> selected <?php } ?>>Mới đặt hàng</option>
                                      <option value="2" <?php if($val['methodid'] == 2){ ?> selected <?php } ?>>Tiếp nhận đơn hàng</option>
                                      <option value="3" <?php if($val['methodid'] == 3){ ?> selected <?php } ?>>Đóng gói hoàn tất</option>
                                      <option value="4" <?php if($val['methodid'] == 4){ ?> selected <?php } ?>>Bắt đầu giao hàng</option>
                                      <option value="5" <?php if($val['methodid'] == 5){ ?> selected <?php } ?>>Giao hàng thành công</option>
                                      <option value="6" <?php if($val['methodid'] == 6){ ?> selected <?php } ?>>Hủy</option>
                                  </select>
                              </td>
                              <td class="div_center publish"><a onClick="status(<?php echo $val['id']?>);" control="order" title="Trạng thái" class="div_status<?php echo $val['id']?> div_status" divid="div_status<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['status'] == 0){ ?>
                                   <span class="label label-danger">Chưa xử lý</span>
                                <?php }else{ ?>
                                  <span class="label label-success">Đã xử lý</span>
                                <?php } ?></a>
                              </td>
                              <td class="div_center tool">
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="order"><i class="fa fa-trash"></i></a>
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