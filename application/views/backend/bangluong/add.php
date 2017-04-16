<!-- InputMask -->
<script src="public/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<!-- Select2 -->
<link href="public/select2/select2.min.css" rel="stylesheet" type="text/css" />
<script src="public/select2/select2.full.min.js" type="text/javascript"></script>

<div class="row">
  <div class="col-md-12">
  <div class="row">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
      </div>
      <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
        <div id="form_kh" class="box-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">

                    <div class="row">
                   
                    
                   
                      <div id="form_thongtinkh" class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Tháng/Năm</label>
                            <input type="text" class="form-control" placeholder="Lương theo tháng Năm" id="thangnam" data-inputmask="'alias': 'mm/yyyy'" data-mask="" name="thangnam" id="thangnam">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Theo Hợp Đồng</label>
                            <input onkeyup="return FormatNumber(this);" placeholder="Lương theo hợp đồng" type="text" class="form-control" id="hopdong"   name="hopdong">
                          </div>
                              
                          <div class="form-group">
                            <label class="control-label">
                              Theo ngày công
                            </label>
                            <input onkeyup="return FormatNumber(this);"" placeholder="Lương theo ngày công" type="text" class="form-control"   name="ngaycong" id="ngaycong" />
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label">
                              Các khoản thưởng 
                            </label>
                              <input onkeyup="return FormatNumber(this);" placeholder="Lương theo thưởng" type="text" class="form-control"   name="khoanthuong" id="khoanthuong" />
                          </div>
                          <div class="form-group">
                            <label class="control-label">
                              Tổng các khoản giảm trừ
                            </label>
                              <input onkeyup="return FormatNumber(this);" placeholder="Lương theo giảm trừ" type="text" class="form-control"   name="giamtru" id="giamtru" />
                          </div>
                          <div class="form-group">
                            <label class="control-label">
                                Phụ cấp
                              </label>
                              <input onkeyup="return FormatNumber(this);" placeholder="Lương theo phụ cấp" type="text" class="form-control"   name="phucap" id="phucap" />
                          </div>
                          <div class="form-group">
                            <label class="control-label" >
                                Lương thực lĩnh
                              </label>
                                <input onkeyup="return FormatNumber(this);"" type="text" class="form-control"  placeholder="Lương theo thực lĩnh" name="thuclinh" id="thuclinh" />
                          </div>
                          <div class="form-group">
                           <label class="control-label">
                                Ngày
                              </label>
                               
                              <div class="clear"></div>
                              <input type="text" class="form-control" placeholder="Ngày" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="ngay" id="ngay">
                          </div>
                        </div>
                        <div class="form-group">
                        </div>
                      </div>
                    </div>
                  </div>
                  
        </div><!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Lưu</a>
          <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
          
          <a href="admin/bangluong/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#thangnam').datetimepicker({
        format: 'YYYY/MM'
    });
  });
  $(document).ready(function() {
    $('#ngay').datetimepicker({
        format: 'YYYY/MM/DD'
    });
  });
  

</script>