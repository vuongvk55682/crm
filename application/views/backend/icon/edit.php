<div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <form id="frm-admin" method="post" action="">
          <div class="box-body">
            <div class="form-group">
                <label for="name">Icon</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="icon" name="icon" value="<?php if(isset($icon['icon']) && $icon['icon']!=''){ echo $icon['icon']; }?>">
                </div>
            </div>
            <div class="form-group">
                <?php if($icon['publish'] == 0){ ?>
                    <label class="lbl_radio">
                      <input type="radio" class="minimal" name="publish" id="publish" value="0" checked />
                      Hiển thị
                    </label>
                    <label class="lbl_radio">
                      <input type="radio" class="minimal" name="publish" id="publish" value="1" />
                      Không
                    </label>
                <?php }else{ ?>
                    <label class="lbl_radio">
                      <input type="radio" class="minimal" name="publish" id="publish" value="0" />
                      Hiển thị
                    </label>
                    <label class="lbl_radio">
                      <input type="radio" class="minimal" name="publish" id="publish" value="1" checked />
                      Không
                    </label>
                <?php } ?>
            </div>
          </div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/icon/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
        </form>
      </div>
    </div>
</div>