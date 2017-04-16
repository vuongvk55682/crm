<div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <form id="frm-admin" onsubmit="return checkNguoiphutrach();" method="post" action="">
          <div class="box-body">
            <div class="form-group">
                <label for="name">Tên</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                  <input type="text" class="form-control" id="nguoipt_ten" name="nguoipt_ten" value="<?php if(isset($nguoiphutrach['nguoipt_ten']) && $nguoiphutrach['nguoipt_ten']!=''){ echo $nguoiphutrach['nguoipt_ten']; }?>">
                </div>
            </div>
            <div class="form-group">
              <label class="radio-inline">
                <input <?php if($nguoiphutrach['publish'] == 0){ ?> checked <?php } ?> type="radio" name="publish" id="publish" value="0"/>
                Hiển thị
              </label>
              <label class="radio-inline">
                <input <?php if($nguoiphutrach['publish'] == 1){ ?> checked <?php } ?> type="radio" name="publish" id="publish" value="1"/>
                Không
              </label>
            </div>
            <div class="box-footer">
              <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
              <a href="admin/nguoiphutrach/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>