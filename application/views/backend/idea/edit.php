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
                <label class="control-label">Tên khách hàng</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($idea['name']) && $idea['name']!=''){ echo $idea['name']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Chức vụ</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="position" id="position" value="<?php if(isset($idea['position']) && $idea['position']!=''){ echo $idea['position']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="radio-inline">
                  <input <?php if($idea['publish'] == 0){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="0"> Hiển thị
                </label>
                <label class="radio-inline">
                  <input <?php if($idea['publish'] == 1){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="1"> Không
                </label>
            </div>
          </div><!-- /.box-body -->
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Ý kiến</label>
                <textarea id="content" name="content" class="ckeditor"><?php if(isset($idea['content']) && $idea['content']!=''){ echo $idea['content']; }?></textarea>
            </div>
        </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="en">
            <div class="col-md-6">
            <div class="form-group">
                <label for="name">Chức vụ</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="en_position" name="en_position" value="<?php if(isset($en_lang['position']) && $en_lang['position']!=''){ echo $en_lang['position']; }?>">
                </div>
            </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Ý kiến</label>
                    <textarea id="en_content" name="en_content" class="ckeditor"><?php if(isset($en_lang['content']) && $en_lang['content']!=''){ echo $en_lang['content']; }?></textarea>
                </div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/idea/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
      </div>
    </div>
    </form>
</div>