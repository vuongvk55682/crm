<div class="list_cart">
    <div class="box-body">
        <div class="col-md-12 shipping-address">
            <h3 class="title_main"><span>3. <?php echo $title; ?></span></h3>
            <div class="clear" style="height:20px;"></div>
            <div class="col-lg-12">
                <div class="row bs-wizard">

                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">
                            <span>Login</span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <span class="bs-wizard-dot">1</span>
                    </div>

                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum">
                            <span class="hidden-xs">Shipping address</span>
                            <span class="visible-xs-inline-block">Address</span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <span class="bs-wizard-dot">2</span>
                    </div>

                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">
                            <span class="hidden-xs">Pay &amp; Order</span>
                            <span class="visible-xs-inline-block">Pay</span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <span class="bs-wizard-dot">3</span>
                    </div>

                </div>
            </div>
            <div class="clear" style="height:20px;"></div>
            <div class="row row-style-2">
              <div class="col-lg-8 has-padding">
                  <div class="panel panel-default payment">
                      <div class="panel-body">
                        <form class="form-horizontal hide-block" role="form" id="frm_pay" action="" method="post">
                            <?php if(isset($ship) && $ship != NULL){ ?>
                            <div id="panel-shipping-plan">    
                              <div class="form-group row"><h4 class="col-lg-12">Select package delivery</h4></div>
                              <div class="form-group row-style-3 clearfix">
                                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                      <label class="control-label">
                                        <input checked="" type="radio" name="r2" class="minimal" />
                                      </label>
                                  </div>
                                  <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10"><div class="row">
                                      <label for="plan-1" class="control-label is-large">
                                      <img src="https://vcdn.tikicdn.com/assets/img/sc-standard.png" height="17" width="31" alt="">
                                            Standard delivery: free (delivery expected in <?php echo $ship['week'];?>, <?php echo $ship['date'];?> - <?php echo $ship['week_next'];?>, <?php echo $ship['date_next'];?>)
                                      </label>
                                  </div></div>
                              </div>
                            </div>
                            <?php } ?>
                            <div class="form-group row">
                                <h4 class="col-lg-12 is-mt">Choose a payment method:</h4>
                            </div>
                            <div class="form-group row row-style-3 ">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                    <label class="control-label">
                                        <input checked="" type="radio" name="method" class="minimal" value="1" />
                                    </label>
                                </div>
                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10"><div class="row">
                                    <label for="cod" class="control-label is-large hover">
                                    Cash payment on delivery </label>
                                </div></div>
                            </div>
                            <div class="form-group row row-style-3 ">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                    <label class="control-label">
                                        <input type="radio" name="method" class="minimal" value="2" />
                                    </label>
                                </div>
                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10"><div class="row">
                                    <label for="cod" class="control-label is-large hover">
                                    Payment by bank transfer </label>
                                </div></div>
                            </div>
                            <div class="form-group row row-style-3 ">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                    <label class="control-label">
                                        <input type="radio" name="method" class="minimal" value="3" />
                                    </label>
                                </div>
                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10"><div class="row">
                                    <label for="cod" class="control-label is-large hover">
                                    Paypal Payments </label>
                                </div></div>
                            </div>
                            <div class="form-group row">
                                <h4 class="col-lg-12 is-mt">Buyer information:</h4>
                            </div>
                            <div id="get_info_customer" class="form-group row row-style-3">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                    <label class="control-label">
                                      <input type="checkbox" class="minimal get_info_customer" checked />
                                    </label>
                                </div>

                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10"><div class="row">
                                    <label for="icheck-1" class="control-label is-large">Using Name &amp; The phone number for the shipping address</label>
                                </div></div>
                            </div>
                            <div class="form-group row js-payment-sub cart_info_custom">
                                <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default payment-sub">
                                        <div class="panel-body">
                                            <h5>If you send the goods to another person, please enter the name and phone number to us your own communications.</h5>
                                            <div class="form-group row row-style-4">
                                                <label for="" class="col-lg-2 control-label visible-lg-block">Fullname</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="pay_full_name" value="<?php echo isset($address['fullname'])?$address['fullname']:'';?>" id="pay_full_name" class="form-control" data-error="Please enter your name">
                                                </div>
                                            </div>
                                            <div class="form-group row row-style-4 end">
                                                <label for="" class="col-lg-2 control-label visible-lg-block">Phone</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="pay_phone" value="<?php echo isset($address['phone'])?$address['phone']:'';?>" placeholder="Phone" id="pay_phone" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="clk_hoadondo" class="form-group row row-style-3">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                    <label class="control-label">
                                      <input type="checkbox" class="minimal clk_hoadondo" />
                                    </label>
                                </div>
                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10"><div class="row">
                                    <label for="icheck-2" class="control-label is-large">
                                        Invoice request for this order red
                                    </label>
                                </div></div>
                            </div>
                            <div class="form-group row js-payment-sub div_hoadondo">
                                <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default payment-sub">
                                        <div class="panel-body">
                                            <div class="form-group row row-style-4" id="tax_name">
                                                <label for="company" class="col-lg-3 control-label visible-lg-block">Company name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="name_company" placeholder="Nhập tên công ty đầy đủ" id="name_company" class="form-control infoOrderCompany hasNote" value="" data-error="Vui lòng nhập tên công ty">
                                                    <span class="help-block"></span>
                                                </div>
                                                <span style="display: none; font-size: 11px; color: red;">Please enter the company name.<br>Do not re-enter the type of business</span>
                                            </div>

                                            <div class="form-group row row-style-4">
                                                <label for="tax" class="col-lg-3 control-label visible-lg-block">Tax code</label>
                                                <div class="col-lg-6">
                                                    <input type="tel" name="tax_company" placeholder="Mã số thuế" id="tax_company" class="form-control infoOrderCompany" value="" data-error="Vui lòng nhập mã số thuế">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>


                                            <div class="form-group row row-style-4 ">
                                                <label for="street" class="col-lg-3 control-label visible-lg-block">Address</label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control infoOrderCompany hasNote" name="address_company" id="address_company" cols="30" rows="4" data-error="Vui lòng nhập địa chỉ" placeholder="Enter the company address (including ward / commune, district / district, Province / City where applicable)"></textarea>
                                                    <span class="help-block"></span>
                                                </div>
                                                <span style="display: none; font-size: 11px; color: red;">Vui lòng chỉ nhập Số nhà, Tên đường,<br>Tên phường (nếu có).<br>Không nhập lại Quận/Huyện và<br>Tỉnh/Thành phố</span>
                                            </div>

                                            <label style="margin-left: 15px" class="control-label"><i>Note:</i> <b>BILL OF RED ONLY ONCE ONLY </b> <i>according to the information you have entered</i></label>
                                            <label style="margin-left: 15px;line-height: 20px;" class="control-label"><i>Our bill does not have the red seal of the approval of the Tax Department <a target="_blank" href="https://vcdn.tikicdn.com/assets/files/hoadon-tiki.pdf">Here</a></i></label>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row end">
                                <div class="col-lg-6">
                                    <button type="button" id="btn-placeorder" class="btn btn-block btn-default btn-checkout pay">ORDER</button>
                                    <p class="note">Please check the order before Purchase</p>
                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4">
                <?php if(isset($address) && $address != NULL){ ?>
                <div class="panel panel-default cart">
                    <div class="panel-body">
                        <div class="order">
                            <span class="title">Shipping address</span>
                            <a data-toggle="modal" data-target="#myUpdateAddress" class="btn btn-default btn-custom1">Edit</a>
                        </div>
                        <div class="information">
                            <h6><?php echo $address['fullname'];?></h6>
                            <p class="end"><?php echo $address['address'];?>, <?php echo $address['ward_name'];?>, <php echo $address['district_name'];?>,<?php echo $address['city_name'];?><br>Phone: <?php echo $address['phone'];?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php 
                    $stt = 0;
                    if(isset($listcart) && $listcart!=NULL){ ?>
                  <div class="panel panel-default cart">
                      <div class="panel-body">
                          <div class="order">
                              <span class="title">Order</span>
                              <span class="title"> (2 product)</span>
                              <a href="gio-hang.html" class="btn btn-default btn-custom1">Edit</a>
                          </div>
                          <div class="product">
                          <?php 
                            $sum_total = 0;
                            foreach ($listcart as $key_cart => $val_cart){
                              $stt += 1;
                              if($val_cart['options']['Price_sale'] > 0){ 
                                $total = $val_cart['options']['Price_sale'] * $val_cart['qty'];  
                              }else{
                                $total = $val_cart['subtotal'];
                              }
                              $img_cart = base_url().'upload/product/thumb/'.$val_cart['options']['Image'];
                              $sum_total = $sum_total + $total;
                          ?>
                              <div class="item clearfix">
                                  <p class="title"><strong>1 x</strong><a href="https://tiki.vn/tu-lanh-panasonic-nr-bj176ssvn-152l-p167648.html?ref=c1882.c3861.c4654.c4862.c2328.c4659.c4788.c4868.c4870.c4925.c5083.c5095.c5215.c4718.c5510.c5949." target="_blank"><?php echo $val_cart['name'];?></a></p>
                                  <p class="price"><span>
                                  <?php if($val_cart['options']['Price_sale'] > 0){ ?>
                                      <?php echo $this->cart->format_number($val_cart['options']['Price_sale']); ?>
                                  <?php }else{ ?>
                                      <?php echo $this->cart->format_number($val_cart['price']); ?>
                                  <?php } ?>
                                  &nbsp;₫ </span></p>
                              </div> 
                          <?php } ?>                                                  
                          </div>
                          <div class="clear"></div>
                          <p class="total">Provisional:<span><?php echo $this->cart->format_number($sum_total); ?> &nbsp;$</span></p>
                          <p class="shipping">
                              Shipping Costs:
                              <span>0&nbsp;$</span>
                          </p>
                          <p class="total2">
                              Amount:
                              <span><?php echo $this->cart->format_number($sum_total); ?> &nbsp;$ </span>
                          </p>
                          <p class="text-right">
                              <i>(VAT included)</i>
                          </p>
                      </div>
                  </div>
                <?php } ?>
                </div>
              </div>
          
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('frontend/cart/editaddress'); ?>


