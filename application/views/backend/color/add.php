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
              <label>Mã màu</label>
              <div class="input-group my-colorpicker2">
                <input type="text" class="form-control" name="code" id="code" />
                <div class="input-group-addon">
                  <i></i>
                </div>
              </div><!-- /.input group -->
            </div><!-- /.form group -->
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
            <a href="admin/color/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
          </div>
        </form>
      </div>
    </div>
</div>
