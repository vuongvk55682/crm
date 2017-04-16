<div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <form id="frm-admin" method="post" action="">
          <div class="box-body">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#vn" aria-controls="system" role="tab" data-toggle="tab"><strong>Tiếng việt</strong></a></li>
              <li role="presentation"><a href="#en" aria-controls="contact" role="tab" data-toggle="tab"> <strong>Tiếng anh</strong></a></li>
            </ul>
            <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="vn">
            <div class="form-group">
                <label for="name">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($video['name']) && $video['name']!=''){ echo $video['name']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Mã nhúng (Ví dụ: https://www.youtube.com/watch?v=<span style="color:#F00;">3NB_iecxHW0</span>)</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="url" name="url" value="<?php if(isset($video['url']) && $video['url']!=''){ echo $video['url']; }?>">
                </div>
            </div>
            <div class="form-group">
                <?php if($video['publish'] == 0){ ?>
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
            <div role="tabpanel" class="tab-pane" id="en">
                <div class="form-group">
                    <label for="name">Tên</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input type="text" class="form-control" id="en_name" name="en_name" value="<?php if(isset($en_lang['name']) && $en_lang['name']!=''){ echo $en_lang['name']; }?>">
                    </div>
                </div>
            </div>
            </div>
          </div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/video/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
        </form>
      </div>
    </div>
</div>