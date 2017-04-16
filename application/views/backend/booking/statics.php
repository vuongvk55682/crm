<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="div_static clearfix">
                    <li class="active"><a href="admin/order/statics">Thống kê ngày</a></li>
                    <li><a href="admin/order/staticsmonth">Thống kê tháng</a></li>
                </ul>
                <div class="clear" style="height:10px;"></div>
                <form action="" method="get">
                  <div class="col-md-4"><div class="row">
                  <div class="form-group">
                      <label class="control-label col-md-2">Lọc:</label>
                      <div class="input-group col-md-10">
                          <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                          <input type="text" class="form-control" name="date" id="date" value="<?php echo $day_now;?>">
                      </div>
                  </div>
                  </div></div>
                  <div class="col-md-2"><div class="row">
                      <button class="btn">Lọc</button>
                  </div></div>
                </form>
                <div class="clear"></div>
                <table id="lstcart" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Stt</th>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết đơn hàng</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($order) && $order != NULL){ ?>
                            <?php foreach ($order as $key => $val) { 
                              $stt = $key + 1;
                              if($val['methodid'] == 1){
                                  $_method = 'Đặt hàng thành công';
                              }else if($val['methodid'] == 2){
                                  $_method = 'Đã tiếp nhận đơn hàng';
                              }else if($val['methodid'] == 3){
                                  $_method = 'Đã đóng gói';
                              }else if($val['methodid'] == 4){
                                  $_method = 'Bắt đầu giao hàng';
                              }else{
                                  $_method = 'Hoàn tất giao hàng';
                              }
                            ?>
                                <tr>
                                    <td><?php echo $stt;?></td>
                                    <td><?php echo $val['code'];?></td>
                                    <td><?php echo $val['fullname'];?></td>
                                    <td><?php echo number_format($val['sum_total']);?></td>
                                    <td><?php echo $_method;?></td>
                                    <td class="div_center"><a class="label label-success vieworder" control="order" id="<?php echo $val['id'];?>">Xem</a></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td><strong>Tổng</strong></td>
                                <td colspan="3"><strong><?php echo number_format($_sum_total);?></strong></td>
                            </tr>
                            <tr>
                                <td><strong>Thực thu</strong></td>
                                <td colspan="3"><strong><?php echo number_format($_thucthu);?></strong></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                    
                </table>

            </div>
        </div>
    </div>
</div>
<div id="div_load_cart"></div>