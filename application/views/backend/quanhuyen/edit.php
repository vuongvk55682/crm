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
                      <option value="<?php echo $val['_id'] ?>"
                      <?php if ($val['_id'] == $quanhuyen['id_tinhthanhpho']) { ?>
                        selected
                      <?php } ?>
                      ><?php echo $val['tinhthanhpho_ten'] ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
                <label for="name">Tên</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                  <input type="text" class="form-control" id="quanhuyen_ten" name="quanhuyen_ten" value="<?php if(isset($quanhuyen['quanhuyen_ten']) && $quanhuyen['quanhuyen_ten']!=''){ echo $quanhuyen['quanhuyen_ten']; }?>">
                </div>
            </div>
            <div class="form-group">
              <label class="radio-inline">
                <input <?php if($quanhuyen['publish'] == 0){ ?> checked <?php } ?> type="radio" name="publish" id="publish" value="0"/>
                Hiển thị
              </label>
              <label class="radio-inline">
                <input <?php if($quanhuyen['publish'] == 1){ ?> checked <?php } ?> type="radio" name="publish" id="publish" value="1"/>
                Không
              </label>
            </div>
            <div class="box-footer">
              <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
              <a href="admin/quanhuyen/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>