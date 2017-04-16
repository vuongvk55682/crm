<!-- InputMask -->
<script src="public/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<!-- Select2 -->
<link href="public/select2/select2.min.css" rel="stylesheet" type="text/css" />
<script src="public/select2/select2.full.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#sinhnhat_kh").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("#sinhnhat_lh").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $(".select2").select2();
  });
</script>
<div class="row">
  <div class="col-md-12">
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
                            <input type="text" class="form-control" id="thangnam" data-inputmask="'alias': 'mm/yyyy'" data-mask="" name="thangnam" id="thangnam" value="<?php echo isset($bangluong['thangnam'])? $bangluong['thangnam']: ''; ?>">
                          </div>
                          
                          
                    
                        <div class="form-group">
                          <label class="control-label">
                           Theo hợp đồng
                          </label>
                            <input type="text" class="form-control" name="hopdong" id="hopdong" placeholder="Hợp đồng" value="<?php echo isset($bangluong['hopdong'])? $bangluong['hopdong']: ''; ?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Theo ngày công
                          </label>
                            <input type="text" class="form-control" name="ngaycong" id="ngaycong" placeholder="Ngày công " value="<?php echo isset($bangluong['ngaycong'])? $bangluong['ngaycong']: ''; ?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                           Tổng các khoản thưởng 
                          </label>
                         
                            <input type="text" class="form-control" name="khoanthuong" id="khoanthuong" placeholder="Khoản thưởng" value="<?php echo isset($bangluong['khoanthuong'])? $bangluong['khoanthuong']: ''; ?>">
                       
                          <div class="form-group">
                           <label class="control-label">
                           Tổng các giam tru 
                          </label>
                            <input type="text" class="form-control" name="giamtru" id="giamtru" placeholder="Giảm trừ" value="<?php echo isset($bangluong['giamtru'])? $bangluong['giamtru']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Phụ cấp
                          </label>
                          <div class="form-group">

                            <input type="email" class="form-control" name="phucap" id="phucap" placeholder="phụ Cấp" value="<?php echo isset($bangluong['phucap'])? $bangluong['phucap']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Lương thực lĩnh 
                          </label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="thuclinh" id="thuclinh" placeholder="Thực Lĩnh " value="<?php echo isset($bangluong['thuclinh'])? $bangluong['thuclinh']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Ngày
                          </label>
                          <input type="text" class="form-control" name="ngay" id="ngay" placeholder="Ngày " value="<?php echo isset($bangluong['ngay'])? $bangluong['ngay']: ''; ?>">
                        </div>
                        
                        
                        
                     
                     

                       
                    
                      </div>
                    </div>
                  </div>
                  <!-- <div class="clear"></div> -->
                 
            
                  
                </div>
              </div>
      
            </div>
          </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
          <a href="admin/bangluong/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
        </div>
      </form>
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