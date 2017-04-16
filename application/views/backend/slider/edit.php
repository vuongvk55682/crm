<div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
                <label for="name">Tên slider</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($slider['name']) && $slider['name']!=''){ echo $slider['name']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Url</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-link"></i></div>
                    <input type="text" class="form-control" id="url" name="url" value="<?php if(isset($slider['url']) && $slider['url']!=''){ echo $slider['url']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <span class="btn btn-primary btn-file btn-sm">
                    Browse <input type="file" name="image" id="image">
                </span>
            </div>
            <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                    <div id="box_img">
                        <?php if($slider['image']!=''){ ?>
                            <img src="upload/slider/<?php echo $slider['image'];?>" alt="" class="image_admin">
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label for="name">Kích thước</label>
                <div class="input-group">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 checkbox">
                    <div class="row">
                        <label>
                        <?php if($slider['auto']==1){ ?>
                        <input type="checkbox" checked="" name="auto" id="auto" value="1">
                        <?php }else{ ?>
                        <input type="checkbox" name="auto" id="auto" value="1">
                        <?php } ?>
                        Auto</label> 
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="row">
                    <div class="input-group">
                        <div class="input-group-addon">Width</div>
                        <input type="text" class="form-control" name="width" id="width" value="<?php if(isset($slider['width']) && $slider['width']!=''){ echo $slider['width']; }?>">
                        <div class="input-group-addon">px</div>
                    </div>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="row">
                    <div class="input-group">
                        <div class="input-group-addon">Height</div>
                        <input type="text" class="form-control" name="height" id="height" value="<?php if(isset($slider['height']) && $slider['height']!=''){ echo $slider['height']; }?>">
                        <div class="input-group-addon">px</div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?php if($slider['publish'] == 0){ ?>
                <div class="radio-inline">
                    <label>
                        <input type="radio" class="minimal-red" name="publish" id="publish" value="0" checked />
                        Hiển thị
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" class="minimal-red" name="publish" id="publish" value="1" />
                        Không
                    </label>
                </div>
                <?php }else{ ?>
                <div class="radio-inline">
                    <label>
                        <input type="radio" class="minimal-red" name="publish" id="publish" value="0" />
                        Hiển thị
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" class="minimal-red" name="publish" id="publish" value="1" checked />
                        Không
                    </label>
                </div>
                <?php } ?>
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/slider/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
        </form>
      </div>
    </div>
</div>