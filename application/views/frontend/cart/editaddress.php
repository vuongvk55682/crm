<div class="modal fade" id="myUpdateAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <form action="cart/shipping" method="post" id="frm_updateaddress">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="myModalLabel">Update delivery address</h5>
            <div id="div_error"></div>
            </div>
            <input type="hidden" name="update" id="update" value="1">
            <input type="hidden" name="id" id="id" value="<?php echo $address['id'];?>">
            <div class="modal-body clearfix">
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="control-label">fullname</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-user"></i></div>
                          <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo isset($address['fullname'])?$address['fullname']:'';?>" placeholder="Enter your fullname">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Company</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                          <input type="text" class="form-control" name="company" id="company" value="<?php echo isset($address['company'])?$address['company']:'';?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Phone</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                          <input type="text" class="form-control" name="phone" id="phone" value="<?php echo isset($address['phone'])?$address['phone']:'';?>" placeholder="Enter your phone">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">City</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-users"></i></div>
                          <select onChange="loadDistrict();" class="form-control select2" name="cityid" id="cityid">
                            <option value="">Choose City</option>
                            <?php if(isset($city) && !is_null($city)){ ?>
                            <?php foreach ($city as $key_city => $val_city) { ?>
                                  <option value="<?php echo $val_city['id'];?>" <?php if($val_city['id'] == $address['cityid']){ ?> selected <?php } ?>><?php echo $val_city['name'];?></option>
                            <?php } ?>
                            <?php } ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">District</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-users"></i></div>
                          <select onChange="loadWard();" class="form-control select2" name="districtid" id="districtid">
                              <option value="">Choose District</option>
                              <?php if(isset($district) && !is_null($district)){ ?>
                              <?php foreach ($district as $key_district => $val_district) { ?>
                                  <option value="<?php echo $val_district['id'];?>" <?php if($val_district['id'] == $address['districtid']){ ?> selected <?php } ?>><?php echo $val_district['name'];?></option>
                              <?php } ?>
                              <?php } ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Ward</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-users"></i></div>
                          <select class="form-control select2" name="wardid" id="wardid">
                              <option value="">Choose Ward</option>
                              <?php if(isset($ward) && !is_null($ward)){ ?>
                              <?php foreach ($ward as $key_ward => $val_ward) { ?>
                                  <option value="<?php echo $val_ward['id'];?>" <?php if($val_ward['id'] == $address['wardid']){ ?> selected <?php } ?>><?php echo $val_ward['name'];?></option>
                              <?php } ?>
                              <?php } ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" rows="4" name="address" id="address"><?php echo isset($address['address'])?$address['address']:'';?></textarea>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="col-md-4">
                
              </div>
              <div class="col-md-8">
                <div class="row">
                  <button data-dismiss="modal" class="btn btn-info"><i class="fa fa-times"></i> Cancel</button>
                  <button type="button" class="btn btn-info btn_updateaddress"><i class="fa fa-unlock-alt"></i> Update</button>
                </div>
              </div>
          </div>
      </div>
  </form>
  </div>
</div>