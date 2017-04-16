<!-- Select2 -->
<link href="public/select2/select2.min.css" rel="stylesheet" type="text/css" />
<script src="public/select2/select2.full.min.js" type="text/javascript"></script>
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
      </div>
      <form id="frm-admin" method="post" action="">
        <div class="box-body">
          <div class="form-group">
            <label class="control-label">
              Tỉnh/Thành Phố
            </label>
            <div>
              <select class="form-control select2" name="id_tinhthanhpho" id="id_tinhthanhpho" data-placeholder="Chọn Tỉnh/Thành Phố">
                <option value="0">Chọn Tỉnh/Thành Phố</option>
                <?php if (isset($tinhthanhpho) && $tinhthanhpho != NULL) { ?>
                  <?php foreach ($tinhthanhpho as $key => $val) { ?>
                    <option value="<?php echo $val['_id'] ?>"><?php echo $val['tinhthanhpho_ten'] ?></option>}
                  <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="clear"></div>
          <div class="form-group">
              <label for="name">Quận Huyện</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-level-up" aria-hidden="true"></i></div>
                <input type="text" class="form-control" id="quanhuyen_ten" name="quanhuyen_ten">
              </div>
          </div>
          <div class="form-group">
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
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Lưu</a>
          <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
          <a href="admin/quanhuyen/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".select2").select2();
  });
</script>