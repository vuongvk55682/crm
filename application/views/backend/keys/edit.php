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
                <label class="control-label">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($keys['name']) && $keys['name']!=''){ echo $keys['name']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Key</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input class="form-control" name="key" id="key" value="<?php if(isset($keys['key']) && $keys['key']!=''){ echo $keys['key']; }?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="radio-inline">
                  <input <?php if($keys['publish'] == 0){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="0"> Hiển thị
                </label>
                <label class="radio-inline">
                  <input <?php if($keys['publish'] == 1){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="1"> Không
                </label>
            </div>
          </div><!-- /.box-body -->
        </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="en">
            <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="en_name" id="en_name" value="<?php if(isset($en_lang['name']) && $en_lang['name']!=''){ echo $en_lang['name']; }?>">
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/keys/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
      </div>
    </div>
    </form>
</div>