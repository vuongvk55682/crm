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
                    <select class="form-control select2" name="cityid" id="cityid">
                      <option value="">Chọn tỉnh/thành</option>
                      <?php if(isset($city) && !is_null($city)){ ?>
                      <?php foreach ($city as $key_city => $val_city) { ?>
                            <option value="<?php echo $val_city['id'];?>" <?php if($val_city['id'] == $ward['cityid']){ ?> selected <?php } ?>><?php echo $val_city['name'];?></option>
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
                              <option value="<?php echo $val_district['id'];?>" <?php if($val_district['id'] == $ward['districtid']){ ?> selected <?php } ?>><?php echo $val_district['name'];?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($ward['name']) && $ward['name']!=''){ echo $ward['name']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="title" name="title" value="<?php if(isset($ward['title']) && $ward['title']!=''){ echo $ward['title']; }?>">
                </div>
            </div>
            <div class="form-group">
                <?php if($ward['publish'] == 0){ ?>
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
            <div class="form-group">
                <label>Meta keyword</label>
                <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"><?php if(isset($ward['meta_keyword']) && $ward['meta_keyword']!=''){ echo $ward['meta_keyword']; }?></textarea>
            </div>
            <div class="form-group">
                <label>Meta description</label>
                <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php if(isset($ward['meta_description']) && $ward['meta_description']!=''){ echo $ward['meta_description']; }?></textarea>
            </div>
          </div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/ward/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
        </form>
      </div>
    </div>
</div>