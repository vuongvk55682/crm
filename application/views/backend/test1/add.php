<div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <form id="frm-admin" method="post" action="">
          <div class="box-body">
            <div class="form-group">
                <label for="name">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="form-group">
                <!-- <label class="control-label">Giới TÍnh</label> -->
                <label class="radio-inline">
                    <input type="radio" name="gioitinh" id="gioitinh" value="0" checked>
                    Nam
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gioitinh" id="gioitinh" value="1">
                    Nữ
                </label>
            </div>
            <!-- <div class="form-group">
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
            </div> -->
            <!-- <div class="form-group">
                <label>Meta keyword</label>
                <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"></textarea>
            </div>
            <div class="form-group">
                <label>Meta description</label>
                <textarea class="form-control" rows="4" name="meta_description" id="meta_description"></textarea>
            </div>
          </div> --><!-- /.box-body -->

          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Lưu</a>
            <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
            <a href="admin/city/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
          </div>
        </form>
      </div>
    </div>
</div>