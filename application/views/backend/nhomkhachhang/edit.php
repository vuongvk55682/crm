<div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <form id="frm-admin" onsubmit="return checkNhomkhachhang();" method="post" action="">
          <div class="box-body">
            <div class="form-group">
                <label for="name">Tên</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                  <input type="text" class="form-control" id="nhomkh_ten" name="nhomkh_ten" value="<?php if(isset($nhomkhachhang['nhomkh_ten']) && $nhomkhachhang['nhomkh_ten']!=''){ echo $nhomkhachhang['nhomkh_ten']; }?>">
                </div>
            </div>
            <div class="form-group">
              <label class="radio-inline">
                <input <?php if($nhomkhachhang['publish'] == 0){ ?> checked <?php } ?> type="radio" name="publish" id="publish" value="0"/>
                Hiển thị
              </label>
              <label class="radio-inline">
                <input <?php if($nhomkhachhang['publish'] == 1){ ?> checked <?php } ?> type="radio" name="publish" id="publish" value="1"/>
                Không
              </label>
            </div>
            <div class="box-footer">
              <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
              <a href="admin/nhomkhachhang/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>