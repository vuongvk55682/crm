<div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
                <label>Thuộc danh mục</label>
                <select class="form-control select2" name="typeid" id="typeid">
                    <option value="0">Gốc</option>
                    <?php if(isset($menu) && !is_null($menu)){ ?>
                        <?php foreach ($menu as $key_menu => $val_menu) { ?>
                            <option value="<?php echo $val_menu['id'];?>" <?php if($val_menu['id'] == $menuslide['typeid']){ ?> selected <?php } ?>>+ <?php echo $val_menu['name'];?></option>
                            <?php if(isset($val_menu['child_2']) && !is_null($val_menu['child_2'])){ ?>
                                <?php foreach ($val_menu['child_2'] as $key_menu_child2 => $val_menu_child2) { ?>
                                    <option value="<?php echo $val_menu_child2['id'];?>" <?php if($val_menu_child2['id'] == $menuslide['typeid']){ ?> selected <?php } ?>>--- <?php echo $val_menu_child2['name'];?></option>
                                    <?php if(isset($val_menu_child2['child_3']) && !is_null($val_menu_child2['child_3'])){ ?>
                                        <?php foreach ($val_menu_child2['child_3'] as $key_menu_child3 => $val_menu_child3) { ?>
                                            <option value="<?php echo $val_menu_child3['id'];?>" <?php if($val_menu_child3['id'] == $menuslide['typeid']){ ?> selected <?php } ?>>--------- <?php echo $val_menu_child3['name'];?></option>
                                            <?php if(isset($val_menu_child3['child_4']) && !is_null($val_menu_child3['child_4'])){ ?>
                                                <?php foreach ($val_menu_child3['child_4'] as $key_menu_child4 => $val_menu_child4) { ?>
                                                    <option value="<?php echo $val_menu_child4['id'];?>" <?php if($val_menu_child4['id'] == $menuslide['typeid']){ ?> selected <?php } ?>>---------3----- <?php echo $val_menu_child4['name'];?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div><!-- /.form-group -->
            <div class="form-group">
                <label for="name">Tên menuslide</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($menuslide['name']) && $menuslide['name']!=''){ echo $menuslide['name']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Url</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-link"></i></div>
                    <input type="text" class="form-control" id="url" name="url" value="<?php if(isset($menuslide['url']) && $menuslide['url']!=''){ echo $menuslide['url']; }?>">
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
                        <?php if($menuslide['image']!=''){ ?>
                            <img src="upload/menuslide/<?php echo $menuslide['image'];?>" alt="" class="image_admin">
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
                        <?php if($menuslide['auto']==1){ ?>
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
                        <input type="text" class="form-control" name="width" id="width" value="<?php if(isset($menuslide['width']) && $menuslide['width']!=''){ echo $menuslide['width']; }?>">
                        <div class="input-group-addon">px</div>
                    </div>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="row">
                    <div class="input-group">
                        <div class="input-group-addon">Height</div>
                        <input type="text" class="form-control" name="height" id="height" value="<?php if(isset($menuslide['height']) && $menuslide['height']!=''){ echo $menuslide['height']; }?>">
                        <div class="input-group-addon">px</div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?php if($menuslide['publish'] == 0){ ?>
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
            <a href="admin/menuslide/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
        </form>
      </div>
    </div>
</div>