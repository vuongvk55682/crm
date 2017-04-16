<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="div_static clearfix">
                    <li><a href="admin/order/statics">Thống kê ngày</a></li>
                    <li class="active"><a href="admin/order/staticsmonth">Thống kê tháng</a></li>
                </ul>
                <div class="clear" style="height:10px;"></div>
                <form action="" method="get">
                  <div class="col-md-4"><div class="row">
                  <div class="form-group">
                      <label class="control-label col-md-4">Lọc theo năm:</label>
                      <div class="input-group col-md-8">
                          <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                          <input type="text" class="form-control" name="year" id="year" value="<?php echo $year_now;?>">
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
                        <th>Trạng thái</th>
                        <?php for ($i=1; $i < 13; $i++) { ?> 
                          <th>Tháng <?php echo $i;?></th>
                        <?php } ?>
                        
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td><strong>Đơn hàng thành công</strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_1)?$count_order_success_month_1:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_2)?$count_order_success_month_2:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_3)?$count_order_success_month_3:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_4)?$count_order_success_month_4:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_5)?$count_order_success_month_5:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_6)?$count_order_success_month_6:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_7)?$count_order_success_month_7:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_8)?$count_order_success_month_8:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_9)?$count_order_success_month_9:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_10)?$count_order_success_month_10:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_11)?$count_order_success_month_11:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_success_month_12)?$count_order_success_month_12:0;?></strong></td>
                        </tr>
                        <tr>
                          <td><strong>Đơn hàng đã hủy</strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_1)?$count_order_cancel_month_1:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_2)?$count_order_cancel_month_2:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_3)?$count_order_cancel_month_3:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_4)?$count_order_cancel_month_4:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_5)?$count_order_cancel_month_5:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_6)?$count_order_cancel_month_6:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_7)?$count_order_cancel_month_7:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_8)?$count_order_cancel_month_8:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_9)?$count_order_cancel_month_9:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_10)?$count_order_cancel_month_10:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_11)?$count_order_cancel_month_11:0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($count_order_cancel_month_12)?$count_order_cancel_month_12:0;?></strong></td>
                        </tr>
                        <tr>
                          <td><strong>Thực thu</strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_1)?number_format($total_order_month_1):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_2)?number_format($total_order_month_2):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_3)?number_format($total_order_month_3):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_4)?number_format($total_order_month_4):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_5)?number_format($total_order_month_5):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_6)?number_format($total_order_month_6):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_7)?number_format($total_order_month_7):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_8)?number_format($total_order_month_8):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_9)?number_format($total_order_month_9):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_10)?number_format($total_order_month_10):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_11)?number_format($total_order_month_11):0;?></strong></td>
                          <td class="div_center"><strong><?php echo isset($total_order_month_12)?number_format($total_order_month_12):0;?></strong></td>
                        </tr>
                    </tbody>
                    
                </table>

            </div>
        </div>
    </div>
</div>
<div id="div_load_cart"></div>