<div class="list_cart">
  	<div class="box-body">
      	<div class="col-md-12 tracking-order">
      		  <h1>Tra cứu tình trạng đơn hàng<?php echo $title; ?></h1>
            <div class="clear" style="height:10px;"></div>
            <?php if(isset($order) && $order != NULL){ ?>
            <div class="tracking-order-process">
              <p class="order-id">Mã đơn hàng: <?php echo $order['code'];?></p>
              <p class="status">Tình trạng đơn hàng: <span>ĐẶT HÀNG THÀNH CÔNG </span></p>
                  <div class="row bs-wizard">
                      <div class="col-lg-2 col-md-2 bs-wizard-step complete">
                          <div class="text-center bs-wizard-stepnum">
                              <p>Đặt hàng thành công</p>
                              <span>2016-10-17 00:14:47</span>
                          </div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <span class="bs-wizard-dot"></span>
                      </div>
                      <div class="col-lg-3 col-md-3 bs-wizard-step <?php if($order['methodid'] == 2 || $order['methodid'] == 3 || $order['methodid'] == 4 || $order['methodid'] == 5){ ?> complete <?php }else{ ?> disabled <?php } ?>">
                          <div class="text-center bs-wizard-stepnum">
                              <p>Chúng tôi đã tiếp nhận đơn hàng</p>
                              <span></span>
                          </div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <span class="bs-wizard-dot"></span>
                      </div>
                      <div class="col-lg-3 col-md-3 bs-wizard-step <?php if($order['methodid'] == 3 || $order['methodid'] == 4 || $order['methodid'] == 5){ ?> complete <?php }else{ ?> disabled <?php } ?>">
                          <div class="text-center bs-wizard-stepnum">
                              <p>Đóng gói xong - Sẵn sàng giao hàng</p>
                              <span></span>
                          </div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <span class="bs-wizard-dot"></span>
                      </div>
                      <div class="col-lg-2 col-md-2 bs-wizard-step <?php if($order['methodid'] == 4 || $order['methodid'] == 5){ ?> complete <?php }else{ ?> disabled <?php } ?>">
                          <div class="text-center bs-wizard-stepnum">
                              <p>Bắt đầu giao hàng</p>
                              <span></span>
                          </div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <span class="bs-wizard-dot"></span>
                      </div>
                      <div class="col-lg-2 col-md-2 bs-wizard-step <?php if($order['methodid'] == 5){ ?> complete <?php }else{ ?> disabled <?php } ?>">
                          <div class="text-center bs-wizard-stepnum">
                              <p>Giao hàng thành công</p>
                              <span></span>
                          </div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <span class="bs-wizard-dot"></span>
                      </div>
                      </div>
              
                  <div class="detail-toggle-show text-center"><a class="show-detail">Chi tiết đơn hàng
                          <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
                  </div>
            </div>
            <div class="tracking-order-detail">
              <div class="row top">
                  <?php if(isset($order['address']) && $order['address'] != NULL){ ?>
                  <div class="col-lg-3 col-md-3 item">
                      <h4>Địa chỉ người nhận</h4>
                      <p><?php echo $order['address']['fullname'];?></p>
                      <p><?php echo $order['address']['address'];?>, <?php echo $order['address']['ward_name'];?>, <?php echo $order['address']['district_name'];?>, <?php echo $order['address']['city_name'];?></p>
                  </div>
                  <?php } ?>
                  <?php if(isset($ship) && $ship != NULL){ ?>
                  <div class="col-lg-3 col-md-3 item">
                      <h4>Thời gian giao hàng &amp; Vận chuyển</h4>
                      <p>Vận chuyển Tiết Kiệm (dự kiến giao hàng vào <?php echo $ship['week'];?>, <?php echo $ship['date'];?> - <?php echo $ship['week_next'];?>, <?php echo $ship['date_next'];?>)</p>
                      <p>Miễn phí vận chuyển</p>
                  </div>
                  <?php } ?>
                  <?php if(isset($order['address']) && $order['address'] != NULL){ ?>
                  <div class="col-lg-3 col-md-3 item">
                      <h4>Thông tin thanh toán</h4>
                      <p><?php echo $order['address']['fullname'];?></p>
                      <p><?php echo $order['address']['address'];?>, <?php echo $order['address']['ward_name'];?>, <?php echo $order['address']['district_name'];?>, <?php echo $order['address']['city_name'];?></p>
                  </div>
                  <?php } ?>
                  <div class="col-lg-3 col-md-3 item">
                      <h4>Phương thức thanh toán</h4>
                      <p><?php echo $order['method'];?></p>
                  </div>
              </div>
              <div class="bottom">
                  <h4>Đơn hàng bao gồm</h4> 
                  <table class="table-responsive-2">
                      <thead>
                      <tr>
                          <th>Tên sản phẩm</th>
                          <th>Số lượng</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php if(isset($order['cart']) && $order['cart']){ 
                          $sum_total = 0;
                          $sum_total_sale = 0;
                          if(isset($ship) && $ship != NULL){
                              $_ship = $ship['price'];
                          }else{
                              $_ship = 0;
                          }
                      ?>
                          <?php foreach ($order['cart'] as $key_cart => $val_cart) {
                              $stt =  $key_cart + 1;
                              if($val_cart['price_sale'] > 0){ 
                                $total_sale = $val_cart['price_sale'] * $val_cart['number'];  
                              }
                              $total = $val_cart['price'] * $val_cart['number'];
                              
                              if($val_cart['price_sale'] > 0){ 
                                  $sum_total_sale = $sum_total_sale + $total_sale;
                              }
                              $sum_total = $sum_total + $total;
                              if($val_cart['price_sale'] > 0){
                                  $sum_total_main = $sum_total_sale + $_ship;
                              }else{
                                  $sum_total_main = $sum_total + $_ship;
                              }
                              $link_product_cart = base_url().$val_cart['product_alias'].'-p'.$val_cart['product_id'].'.html';
                          ?>
                        <tr>
                            <td>
                                <a href="<?php echo $link_product_cart;?>" target="_blank"><?php echo $val_cart['product_name'];?></a>
                            </td>
                            <td>
                                <strong class="hidden-lg hidden-md">Số lượng: </strong><?php echo $val_cart['number'];?>                     
                            </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <td><strong>Tổng</strong></td>
                            <td><strong><?php echo number_format($sum_total_main);?>&nbsp;₫</strong></td>
                        </tr>
                      </tfoot>
                  </table>
              </div>
              <div class="detail-toggle-hide text-center">
                  <a class="hide-detail">
                    <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                    Thu gọn
                  </a>
              </div>
            </div>
            <?php if(isset($order_orther) && $order_orther != NULL){ ?>
            <div class="row distance-top">
              <div class="col-lg-12">
                  <h1 class="text-center">Các đơn hàng khác</h1>
                  <div class="dashboard-order have-margin">
                    <?php foreach ($order_orther as $key_order_orther => $val_order_orther) { ?>
                        <div class="orderid"><b>Mã đơn hàng:</b> <a href="chi-tiet-don-hang.html?code=<?php echo $val_order_orther['id'];?>" title="Đơn hàng">#<?php echo $val_order_orther['code'];?></a> - Ngày mua: <?php echo $val_order_orther['created'];?></div>
                        <div class="clear"></div>
                        <div class="dashboard-order have-margin">
                        <table class="table-responsive-2">
                            <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th style="text-align:right">Tổng tiền</th>
                                <th>
                                    <span class="hidden-xs hidden-sm hidden-md">Trạng thái đơn hàng</span>
                                    <span class="hidden-lg">Trạng thái</span>
                                </th>
                                <!--                            <th></th>-->
                            </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($val_order_orther['cart']) && $val_order_orther['cart']){ ?>
                                    <?php foreach ($val_order_orther['cart'] as $key_cart_orther => $val_cart_orther) { ?>
                                        <tr>
                                            <td><?php echo isset($val_cart_orther['product_name'])?$val_cart_orther['product_name']:'Không xác định';?></td>
                                            <td style="text-align:right">
                                            <?php if($val_cart_orther['price_sale'] > 0){ ?>
                                                <?php echo number_format($val_cart_orther['price_sale']);?>
                                            <?php }else{ ?>
                                                <?php echo number_format($val_cart_orther['price']);?>
                                            <?php } ?>
                                            &nbsp;₫</td>
                                            <td>
                                                <span class="order-status">Đã hủy</span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>
                    <?php } ?>
                  </div>
                  <div class="pull-right"><a href="thong-tin-don-hang.html" class="order-history-link">Lịch sử đơn hàng <i class="fa fa-angle-right"></i></a>
                  </div>
                </div>
            </div>
            <?php } ?>
            <?php }else{ ?>
                <div id="div_info_error">Không tìm thấy đơn hàng trong hệ thống.Vui lòng kiểm tra lại!</div>
            <?php } ?>
            <div class="row">
              <div class="col-lg-7" style="margin: 30px auto 0px;float:none;">

                <div class="tracking-order-form">
                  <h4>Tra cứu theo mã đơn hàng</h4>
                  <p class="description">Điền vào các thông tin bên dưới để xem tình trạng vắn tắt của Đơn hàng</p>
                  <div id="div_error_order"></div>
                  <form onsubmit="return checkCheckOrder();" id="frm_checkorder" class="form-inline" action="" method="get">
                    <div class="form-group has-feedback ">
                      <label for="email">Địa chỉ email</label>
                      <input name="order_email" type="email" class="form-control" id="order_email" value="<?php echo $data_index['info_user']['email'];?>">
                      <span class="help-block"></span>

                    </div>
                    <div class="form-group ">
                      <label for="order-id">Mã đơn hàng</label>
                      <input name="order_code" type="text" class="form-control" id="order_code" value="">
                      <span class="help-block"></span>
                    </div>
                    <a class="btn btn-default btn_checkorder">Kiểm Tra</a>
                  </form>
                </div>
              </div>
            </div>
        </div>
  	</div>
</div>