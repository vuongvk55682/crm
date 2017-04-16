<div class="row">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#vn" aria-controls="system" role="tab" data-toggle="tab"><strong>Tiếng việt</strong></a></li>
            <li role="presentation"><a href="#en" aria-controls="contact" role="tab" data-toggle="tab"> <strong>Tiếng anh</strong></a></li>
        </ul>
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="vn">
        <div class="col-md-6">
          <div class="box-body">
            
            <div class="form-group">
                <label class="control-label">Loại phòng</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($phong['name']) && $phong['name']!=''){ echo $phong['name']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Giá</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input onkeyup="return FormatNumber(this);" type="text" class="form-control" name="gia" id="gia" value="<?php if(isset($phong['gia']) && $phong['gia']!=''){ echo number_format($phong['gia']); }?>">
                    <div class="input-group-addon">vnđ</div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Url</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="alias" id="alias" value="<?php if(isset($phong['alias']) && $phong['alias']!=''){ echo $phong['alias']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Số người tối đa</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input class="form-control" name="songuoi" id="songuoi" value="<?php if(isset($phong['songuoi']) && $phong['songuoi']!=''){ echo $phong['songuoi']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Hình ảnh đại diện</label>
                <span class="btn btn-primary btn-file btn-sm">
                    Browse <input type="file" name="image" id="image">
                </span>
            </div>
            <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                    <div id="box_img" class="div_avatar">
                        <?php if($phong['image_thumb']!=''){ ?>
                            <img src="upload/phong/thumb/<?php echo $phong['image_thumb'];?>" alt="">
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <label class="control-label">Tiện nghi hiện có</label>
            <div class="clear"></div>
            <?php if(isset($tiennghi) && $tiennghi != NULL){ ?>
            <?php foreach ($tiennghi as $key_tiennghi => $val_tiennghi) { ?>
                <div class="col-xs-1">
                    <label>
                        <input
                            <?php if($phong['tiennghi'] != NULL){ ?>
                                <?php foreach ($phong['tiennghi'] as $key_tiennghis => $val_tiennghis) { ?>
                                    <?php if($val_tiennghi['id'] == $val_tiennghis){ ?>
                                        checked=""
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                         type="checkbox" name="tiennghiid[]" id="tiennghiid" value="<?php echo $val_tiennghi['id'];?>"/>
                        <img src="upload/tiennghi/<?php echo $val_tiennghi['image'];?>" alt="<?php echo $val_tiennghi['name'];?>"/>
                    </label>
                </div>
                <?php if(($key_tiennghi + 1) % 12 == 0){ ?> <div class="clear"></div> <?php } ?>
            <?php } ?>
            <?php } ?>
          </div><!-- /.box-body -->
        </div>
        <div class="col-md-6">
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Title</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="title" id="title" value="<?php if(isset($phong['title']) && $phong['title']!=''){ echo $phong['title']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Meta keyword</label>
                    <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"><?php if(isset($phong['meta_keyword']) && $phong['meta_keyword']!=''){ echo $phong['meta_keyword']; }?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta description</label>
                    <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php if(isset($phong['meta_description']) && $phong['meta_description']!=''){ echo $phong['meta_description']; }?></textarea>
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                      <input <?php if($phong['publish'] == 0){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="0"> Hiển thị
                    </label>
                    <label class="radio-inline">
                      <input <?php if($phong['publish'] == 1){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="1"> Không
                    </label>
                </div>
            </div>
        </div>
        
        </div>
        <div role="tabpanel" class="tab-pane" id="en">
            <div class="col-md-6">
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Tên</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input type="text" class="form-control" name="en_name" id="en_name" control="phong" value="<?php if(isset($en_lang['name']) && $en_lang['name']!=''){ echo $en_lang['name']; }?>">
                    </div>
                </div>
                
            </div><!-- /.box-body -->
            </div>
            
        </div>
        </div>
        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/phong/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
      </div>
    </div>
    </form>
</div>

