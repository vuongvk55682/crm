<div class="list_cart">
  	<div class="box-body">
      	<div class="col-md-12 shipping-address">
      		  <h3 class="title_main"><span>2. <?php echo $title; ?></span></h3>
            <div class="clear" style="height:20px;"></div>
            <div class="row row-style-2">
                <div class="col-lg-12">
                    <div class="row bs-wizard">

                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step complete">
                            <div class="text-center bs-wizard-stepnum">
                                <span>Login</span>
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <span class="bs-wizard-dot">1</span>
                        </div>

                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step active">
                            <div class="text-center bs-wizard-stepnum">
                                <span class="hidden-xs">Shipping address</span>
                                <span class="visible-xs-inline-block">Address</span>
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <span class="bs-wizard-dot">2</span>
                        </div>

                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step disabled">
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
                <div class="col-lg-12">
                    <?php if(isset($address) && $address != NULL){ ?>
                    <div class="panel panel-default address-list">
                        <div class="panel-body">
                            <form id="form-address" method="post" action="/checkout/shipping/saving_shipping_address">
                              <h5 class="visible-lg-block">Choose a shipping address is available below:</h5>
                                <div class="row row-address-list">
                                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 item" id="item-1636056">
                                      <div class="panel panel-default address-item is-default">
                                         <div class="panel-body">
                                            <p class="name"><?php echo $address['fullname'];?></p>
                                            <p class="address">
                                              Address: <?php echo $address['address'];?>, <?php echo $address['ward_name'];?>, <?php echo $address['district_name'];?>,<?php echo $address['city_name'];?>
                                            </p>
                                            <p class="address">Việt Nam</p>
                                            <p class="phone">Phone: 0932741142</p>
                                            <p class="action">
                                                <a href="thanh-toan.html" type="button" class="btn btn-default btn-custom1 saving-address is-blue">
                                                Assigned to this address</a>
                                                <button data-toggle="modal" data-target="#myUpdateAddress" type="button" class="btn btn-default btn-custom1 edit-address">Edit</button>
                                            </p>
                                            <span class="default">Default</span>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <p class="other">
                                  You want delivery to another address?
                                  <a data-toggle="modal" data-target="#myAddAddress" id="addNewAddress">
                                    Add new shipping address
                                  </a>
                                </p>
                            </form>
                        </div>
                    </div>
                    <?php }else{ ?>
                        <div class="no_address-list">You have no shipping address information! Please add the shipping address <a data-toggle="modal" data-target="#myAddAddress">Here</a></div>
                    <?php } ?>
                </div>
      	    </div>
        </div>
  	</div>
</div>

<?php $this->load->view('frontend/cart/editaddress'); ?>

<div class="modal fade" id="myAddAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <form onsubmit="return checkAddAddress();" action="" method="post" id="frm_addaddress">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="myModalLabel">Add shipping address</h5>
            <div id="div_error_addaddress"></div>
            </div>
            <input type="hidden" name="update" id="update" value="2">
            <div class="modal-body clearfix">
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="control-label">Fullname <span>(*)</span></label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                          <input type="text" class="form-control" name="add_fullname" id="add_fullname" value="" placeholder="Enter your fullname">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Company</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                          <input type="text" class="form-control" name="add_company" id="add_company" value="" placeholder="Enter your company">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Phone <span>(*)</span></label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                          <input type="text" class="form-control" name="add_phone" id="add_phone" value="" placeholder="Enter your phone">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">City <span>(*)</span></label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-users"></i></div>
                          <select onChange="loadDistrictDiv('#add_cityid','#add_districtid');" class="form-control select2" name="add_cityid" id="add_cityid">
                            <option value="">Choose City</option>
                            <?php if(isset($city) && !is_null($city)){ ?>
                            <?php foreach ($city as $key_city => $val_city) { ?>
                                  <option value="<?php echo $val_city['id'];?>" ><?php echo $val_city['name'];?></option>
                            <?php } ?>
                            <?php } ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">District <span>(*)</span></label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-users"></i></div>
                          <select onChange="loadWardDiv('#add_districtid','#add_wardid');" class="form-control select2" name="add_districtid" id="add_districtid">
                              <option value="">Choose District</option>
                              
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Ward <span>(*)</span></label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-users"></i></div>
                          <select class="form-control select2" name="add_wardid" id="add_wardid">
                              <option value="">Choose Ward</option>
                              
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Address <span>(*)</span></label>
                      <textarea class="form-control" rows="4" name="add_address" id="add_address"></textarea>
                  </div>
                  <div class="form-group">
                      <div class="checkbox">
                          <label>
                            <input type="checkbox" name="active" id="active" value="1">
                            Use this address as the default.
                          </label>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="col-md-4">
                
              </div>
              <div class="col-md-8">
                <div class="row">
                  <button data-dismiss="modal" class="btn btn-info"><i class="fa fa-times"></i> Cancel</button>
                  <button type="button" class="btn btn-info btn_addaddress"><i class="fa fa-unlock-alt"></i> Save</button>
                </div>
              </div>
          </div>
      </div>
  </form>
  </div>
</div>

