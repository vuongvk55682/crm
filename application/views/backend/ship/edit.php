<div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <form id="frm-admin" method="post" action="">
          <div class="box-body">
            <div class="form-group">
                <label class="control-label">Thuộc tỉnh/thành</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                    <select onChange="loadDistrict();" class="form-control select2" name="cityid" id="cityid">
                      <option value="">Chọn tỉnh/thành</option>
                      <?php if(isset($city) && !is_null($city)){ ?>
                      <?php foreach ($city as $key_city => $val_city) { ?>
                            <option value="<?php echo $val_city['id'];?>" <?php if($val_city['id'] == $ship['cityid']){ ?> selected <?php } ?>><?php echo $val_city['name'];?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Thuộc quận/huyện</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                    <select class="form-control select2" name="districtid" id="districtid">
                        <option value="">Chọn quận/huyện</option>
                        <?php if(isset($district) && !is_null($district)){ ?>
                        <?php foreach ($district as $key_district => $val_district) { ?>
                              <option value="<?php echo $val_district['id'];?>" <?php if($val_district['id'] == $ship['districtid']){ ?> selected <?php } ?>><?php echo $val_district['name'];?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Thời gian giao (ngày)</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="number" name="number" value="<?php if(isset($ship['number']) && $ship['number']!=''){ echo $ship['number']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Phí gian giao</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input onkeyup="return FormatNumber(this);" type="text" class="form-control" id="price" name="price" value="<?php if(isset($ship['price']) && $ship['price']!=''){ echo $ship['price']; }?>">
                </div>
            </div>
            <div class="form-group">
                <?php if($ship['publish'] == 0){ ?>
                  <div class="radio-inline">
                    <label>
                      <input type="radio" name="publish" id="publish" value="0" checked />
                      Hiển thị
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input type="radio" name="publish" id="publish" value="1" />
                      Không
                    </label>
                  </div>
                <?php }else{ ?>
                  <div class="radio-inline">
                    <label>
                      <input type="radio" name="publish" id="publish" value="0" />
                      Hiển thị
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input type="radio" name="publish" id="publish" value="1" checked />
                      Không
                    </label>
                  </div>
                <?php } ?>
            </div>
          </div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/ship/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
        </form>
      </div>
    </div>
</div>