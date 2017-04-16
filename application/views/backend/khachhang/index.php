<style type="text/css" media="screen">
  .bold {
    font-weight: 800 !important;
  }
 
  .dropdown.dropdown-lg .dropdown-menu {
      margin-top: 3px;
      /*padding: 6px 20px;*/
  }
  .input-group-btn .btn-group {
      display: flex !important;
  }
  .btn-group .btn {
      border-radius: 0;
      margin-left: -1px;
  }
  .btn-group .btn:last-child {
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
  }
  .form-horizontal .form-group {
      margin-left: 0;
      margin-right: 0;
  }
  .form-group .form-control:last-child {
      border-top-left-radius: 4px;
      border-bottom-left-radius: 4px;
  }
  #kh_adv_search #search_content {
      overflow: auto;
      height: 350px;
  }
  #kh_adv_search #search_content #arrow_right {
      text-align: center;
      height: 34px;
      line-height: 34px;
      font-size: 26px;
  }
  #kh_adv_search #search_confirm {
     margin-top: 20px;
  }
  #kh_upload #kh_uploadLabel {
    text-align: center;
    text-transform: uppercase;
    font-weight: 800;
  }
  #kh_upload .modal-body {
    text-align: left;
  }
  #kh_upload #upload_warning {
    padding: 6px 0px 0px 10px;
    color: red;
    margin-top: 1em;
    border: 1px dashed red;
  }
  #kh_upload .upload_browse {
    margin-top: 10px;
  }
  #kh_upload #upload_list {
    margin-top: 10px;
  }
  @media screen and (min-width: 768px) {
    #date_start .bootstrap-datetimepicker-widget {
      left: -25px !important;
    }
    #date_end .bootstrap-datetimepicker-widget {
      right: -30px !important;
    }
    .dropdown.dropdown-lg {
        position: static !important;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        min-width: 30em;
    }
  }
</style>

<link href="public/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!-- <script src="public/admin/js/jquery-1.12.4.js" type="text/javascript"></script> -->
<script src="public/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>

<!-- InputMask -->
<script src="public/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<!-- Select2 -->
<link href="public/select2/select2.min.css" rel="stylesheet" type="text/css" />
<script src="public/select2/select2.full.min.js" type="text/javascript"></script>
              
<div id="floatingCirclesG">
  <div class="f_circleG" id="frotateG_01"></div>
  <div class="f_circleG" id="frotateG_02"></div>
  <div class="f_circleG" id="frotateG_03"></div>
  <div class="f_circleG" id="frotateG_04"></div>
  <div class="f_circleG" id="frotateG_05"></div>
  <div class="f_circleG" id="frotateG_06"></div>
  <div class="f_circleG" id="frotateG_07"></div>
  <div class="f_circleG" id="frotateG_08"></div>
</div> 
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
            </div>
            <div class="box-body">
              <div class="col-md-12">
                  <?php
                      $message_flashdata = $this->session->flashdata('message_flashdata');
                      if(isset($message_flashdata) && count($message_flashdata)){
                        if($message_flashdata['type'] == 'sucess'){
                        ?>
                          <div class="success"><i class="fa fa-check"></i> <?php echo $message_flashdata['message']; ?></div>
                        <?php
                        }else if($message_flashdata['type'] == 'error'){
                        ?>
                          <div class="error"><i class="fa fa-close"></i> <?php echo $message_flashdata['message']; ?></div> 
                        <?php
                        }
                      }
                  ?>
              </div>
              <div class="clear"></div>
              <div class="col-md-3">
                <div class="form-group">
                  <select class="form-control select2" data-placeholder="Chọn nhóm khách hàng" name="nhomkh_id" id="nhomkh_id">
                    <option value="0">Chọn nhóm khách hàng</option>
                      <?php if (isset($nhomkh) && $nhomkh != NULL) { ?>
                        <?php foreach ($nhomkh as $key => $val) { ?>
                          <option value="<?php echo $val['_id'] ?>"><?php echo $val['nhomkh_ten']; ?> <?php echo "(".$val['sum_nhomkh'].")"; ?></option>
                        <?php } ?>
                      <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <select class="form-control select2" data-placeholder="Chọn nguồn khách hàng" name="nguonkh_id" id="nguonkh_id">
                    <option value="0">Chọn nguồn khách hàng</option>
                      <?php if (isset($nguonkh) && $nguonkh != NULL) { ?>
                        <?php foreach ($nguonkh as $key => $val) { ?>
                          <option value="<?php echo $val['_id'] ?>"><?php echo $val['nguonkh_ten']; ?></option>
                        <?php } ?>
                      <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <select class="form-control select2" data-placeholder="Chọn người phụ trách" name="nguoipt_id" id="nguoipt_id">
                    <option value="0">Chọn người phụ trách</option>
                      <?php if (isset($nguoipt) && $nguoipt != NULL) { ?>
                        <?php foreach ($nguoipt as $key => $val) { ?>
                          <option value="<?php echo $val['_id'] ?>"><?php echo $val['nguoipt_ten']; ?></option>
                        <?php } ?>
                      <?php } ?>
                  </select>
                </div>
              </div>
              <form id="upload_kh" action="admin/khachhang/importexcel" method="post" enctype="multipart/form-data">
                <div class="col-md-3 div_float_right">
                  <a class="btn btn-success" data-toggle="modal" data-target="#kh_upload">Upload KH</a>
                  <div class="modal fade" id="kh_upload" tabindex="-1" role="dialog" aria-labelledby="kh_uploadLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="kh_uploadLabel">TẢI LÊN DANH SÁCH KHÁCH HÀNG</h4>
                        </div>
                        <div class="modal-body">
                          <div>
                            <span>
                              Vui lòng
                              <a style="text-transform: uppercase; font-weight: 800;" id="download_sample" href="admin/khachhang/download/danhsachkhachhang_mau.xlsx">nhập theo mẫu dữ liệu này</a>
                              và chọn tải lên danh sách.
                            </span>
                          </div>
                          <div id="upload_warning">
                            <p>Chú ý:</p>
                            <ul>
                              <li>Các luật Automation sẽ KHÔNG ĐƯỢC thực hiện khi upload dữ liệu</li>
                              <li>Giới hạn mỗi lần upload tối đa <strong>1000</strong> Khách hàng</li>
                            </ul>
                          </div>
                          <div class="upload_browse">
                            <span class="btn btn-primary btn-file btn-sm avatar_pick">
                              <i class="fa fa-upload" aria-hidden="true"></i>
                              Tải lên danh sách
                              <input type="file" name="fileupload" id="fileupload">
                              <input type="hidden" name="abc">
                            </span>
                          </div>
                          <div id="upload_list">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div style="text-align: left;" class="col-md-6 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="my_account" id="my_account" value="1" checked placeholder="">
                                Đánh dấu là khách hàng của tôi
                              </label>
                            </div>
                          </div>
                          <div style="text-align: left;" class="col-md-6 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="overwrite_ma_kh" id="overwrite_ma_kh" value="1" placeholder="">
                                Ghi đè dữ liệu nếu trùng mã
                              </label>
                            </div>
                          </div>
                          <div style="text-align: left;" class="col-md-6 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="duplicate_email_kh" id="duplicate_email_kh" value="1" placeholder="">
                                Cho phép trùng email
                              </label>
                            </div>
                          </div>
                          <div style="text-align: left;" class="col-md-6 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="duplicate_dienthoai_kh" id="duplicate_dienthoai_kh" value="1" placeholder="">
                                Cho phép trùng số điện thoại
                              </label>
                            </div>
                          </div>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                          <a class="btn btn-primary sendfile">Hoàn tất</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <div class="clear"></div>
              <div class="col-md-3">
                <div class="form-group">
                  <select class="form-control select2" data-placeholder="Chọn ngành học" name="nganhhoc_id" id="nganhhoc_id">
                    <option value="0">Chọn ngành học</option>
                      <?php if (isset($nganhhoc) && $nganhhoc != NULL) { ?>
                        <?php foreach ($nganhhoc as $key => $val) { ?>
                          <option value="<?php echo $val['_id'] ?>"><?php echo $val['nganhhoc_ten']; ?></option>
                        <?php } ?>
                      <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <select class="form-control select2" data-placeholder="Chọn mối quan hệ" name="moiqh_id" id="moiqh_id">
                    <option value="0">Tất cả</option>
                      <?php if (isset($moiqh) && $moiqh != NULL) { ?>
                        <?php foreach ($moiqh as $key => $val) { ?>
                          <option value="<?php echo $val['_id'] ?>"><?php echo $val['moiqh_ten']; ?></option>
                        <?php } ?>
                      <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-5">
                <div class="input-group">
                  <input type="text" class="form-control" name="searchkhachhang" id="searchkhachhang" placeholder="Tìm kiếm">
                  <div class="input-group-btn">
                    <div class="btn-group" role="group">
                      <div class="dropdown dropdown-lg">
                        <button type="button" id="closePanel2" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" title="Tìm kiếm nâng cao"><span class="caret"></span></button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <form id="kh_adv_search" class="form-horizontal">
                            <div id="search_content">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-slack" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" name="kh_ma_adv" id="kh_ma_adv" placeholder="Mã khách hàng" value="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-slack" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" name="kh_masothue_adv" id="kh_masothue_adv" placeholder="Mã số thuế" value="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" name="kh_diachi_adv" id="kh_diachi_adv" placeholder="Địa chỉ" value="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <input type="email" class="form-control" name="kh_email_adv" id="kh_email_adv" placeholder="Email" value="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" name="kh_dienthoai_adv" id="kh_dienthoai_adv" placeholder="Điện thoại" value="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="kh_sinhnhat_adv" id="kh_sinhnhat_adv" placeholder="Sinh nhật" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <select class="form-control" name="kh_gioitinh_adv" id="kh_gioitinh_adv" data-placeholder="Chọn giới tính">
                                    <option value="0" selected>Chọn giới tính</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                  </select>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                  <label>Thời gian tạo khách hàng</label>
                                  <div class="clear"></div>
                                  <div class='col-md-5'>
                                    <div class="row">
                                      <div class='input-group date' id="date_start">
                                        <input type='text' class="form-control" name="date_start_adv" id='date_start_adv' placeholder="Từ"/>
                                        <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div id="arrow_right" class="row">
                                      <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                    </div>
                                  </div>
                                  <div class='col-md-5'>
                                    <div class="row">
                                      <div class='input-group date' id="date_end">
                                        <input type='text' class="form-control" name="date_end_adv" id='date_end_adv' placeholder="Đến"/>
                                        <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                  <label class="control-label">
                                    Tỉnh/Thành Phố
                                  </label>
                                  <div>
                                    <select class="form-control" name="kh_tinhthanhpho_adv" id="kh_tinhthanhpho_adv" data-placeholder="Chọn Tỉnh/Thành Phố">
                                      <option value="0">Chọn Tỉnh/Thành Phố</option>
                                      <?php if (isset($tinhthanhpho) && $tinhthanhpho != NULL) { ?>
                                        <?php foreach ($tinhthanhpho as $key => $val) { ?>
                                          <option value="<?php echo $val['_id'] ?>"><?php echo $val['tinhthanhpho_ten'] ?></option>}
                                        <?php } ?>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">
                                    Quận/Huyện
                                  </label>
                                  <div id="div_load_qh">
                                    <select class="form-control" name="kh_quanhuyen_adv" id="kh_quanhuyen_adv" data-placeholder="Chọn Quận/Huyện">
                                      <option value="0">Chọn Quận/Huyện</option>
                                      <?php if (isset($quanhuyen) && $quanhuyen != NULL) { ?>
                                        <?php foreach ($quanhuyen as $key => $val) { ?>
                                          <option value="<?php echo $val['_id'] ?>"><?php echo $val['quanhuyen_ten'] ?></option>}
                                        <?php } ?>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="clear"></div>
                            <div id="search_confirm">
                              <div class="col-md-12">
                                  <button type="button" onclick="searchKhachhangAdv()" class="btn btn-primary">Tìm kiếm</button>
                                  <button type="button" onclick="closePanel2()" class="btn btn-success">Đóng</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <a onclick="searchKhachhang()" class="btn btn-primary" title="Tìm kiếm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                      <a id="reload_kh" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
                    </div>
                  </div>
                </div>
              </div>
              <form id="select_kh" action="" method="post" enctype="multipart/form-data">
                <div class="col-md-1">
                  <div id="btn_filter">
                    <i onclick="showPanel1()" class="fa fa-filter" aria-hidden="true" title="Hiển thị cột"></i>
                    <i class="fa fa-eye dropdown-toggle" aria-hidden="true" data-toggle="dropdown" title="Hiển thị số trang"></i>
                    <div class="dropdown-menu">
                      <ul id="show_numberpage">
                        <li><a onclick="pageLimit(25)" class="limit_page page_limit25" data-limit ="25">Hiển thị 25 kết quả/trang</a></li>
                        <li><a onclick="pageLimit(50)" class="limit_page page_limit50 active-limit" data-limit ="50">Hiển thị 50 kết quả/trang</a></li>
                        <li><a onclick="pageLimit(100)" class="limit_page page_limit100" data-limit ="100">Hiển thị 100 kết quả/trang</a></li>
                        <li><a onclick="pageLimit(200)" class="limit_page page_limit200" data-limit ="200">Hiển thị 200 kết quả/trang</a></li>
                        <li><a onclick="pageLimit(500)" class="limit_page page_limit500" data-limit ="500">Hiển thị 500 kết quả/trang</a></li>
                        <li><a onclick="pageLimit(1000)" class="limit_page page_limit1000" data-limit ="1000">Hiển thị 1000 kết quả/trang</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="clear"></div>
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="row">
                      <div id="show_cols" class="show_panel">
                        <div class="form-group">
                          <label>
                            Lựa chọn cột hiển thị
                          </label>
                          <div class="clear"></div>
                          <?php if (isset($showfield) && $showfield != NULL) { ?>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_ten" id="kh_ten" value="0" <?php if (isset($showfield['kh_ten']) && $showfield['kh_ten'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Tên khách hàng
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_dienthoai" id="kh_dienthoai" value="0" <?php if (isset($showfield['kh_dienthoai']) && $showfield['kh_dienthoai'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Điện thoại
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_diachi" id="kh_diachi" value="0" <?php if (isset($showfield['kh_diachi']) && $showfield['kh_diachi'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Địa chỉ
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_ma" id="kh_ma" value="0" <?php if (isset($showfield['kh_ma']) && $showfield['kh_ma'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Mã khách hàng
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_masothue" id="kh_masothue" value="0" <?php if (isset($showfield['kh_masothue']) && $showfield['kh_masothue'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Mã số thuế
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_email" id="kh_email" value="0" <?php if (isset($showfield['kh_email']) && $showfield['kh_email'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Email
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_fax" id="kh_fax" value="0" <?php if (isset($showfield['kh_fax']) && $showfield['kh_fax'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Fax
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_logo" id="kh_logo" value="0" <?php if (isset($showfield['kh_logo']) && $showfield['kh_logo'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Logo
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_sothich" id="kh_sothich" value="0" <?php if (isset($showfield['kh_sothich']) && $showfield['kh_sothich'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Sở thích khách hàng
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_cmnd" id="kh_cmnd" value="0" <?php if (isset($showfield['kh_cmnd']) && $showfield['kh_cmnd'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Chứng minh thư
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_sinhnhat" id="kh_sinhnhat" value="0" <?php if (isset($showfield['kh_sinhnhat']) && $showfield['kh_sinhnhat'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Sinh nhật
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_gioitinh" id="kh_gioitinh" value="0" <?php if (isset($showfield['kh_gioitinh']) && $showfield['kh_gioitinh'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Giới tính
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_tinhthanhpho" id="kh_tinhthanhpho" value="0" <?php if (isset($showfield['kh_tinhthanhpho']) && $showfield['kh_tinhthanhpho'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Tỉnh/Thành Phố
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_quanhuyen" id="kh_quanhuyen" value="0" <?php if (isset($showfield['kh_quanhuyen']) && $showfield['kh_quanhuyen'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Quận/Huyện
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_nganhhoc" id="kh_nganhhoc" value="0" <?php if (isset($showfield['kh_nganhhoc']) && $showfield['kh_nganhhoc'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Ngành học
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_anh" id="kh_anh" value="0" <?php if (isset($showfield['kh_anh']) && $showfield['kh_anh'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Ảnh đại diện
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_website" id="kh_website" value="0" <?php if (isset($showfield['kh_website']) && $showfield['kh_website'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Website
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="kh_mota" id="kh_mota" value="0" <?php if (isset($showfield['kh_mota']) && $showfield['kh_mota'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Mô tả
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="lienhe" id="lienhe" value="0" <?php if (isset($showfield['lienhe']) && $showfield['lienhe'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Liên hệ
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="gt_ten" id="gt_ten" value="0" <?php if (isset($showfield['gt_ten']) && $showfield['gt_ten'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Người giới thiệu
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="gt_nguoipt" id="gt_nguoipt" value="0" <?php if (isset($showfield['gt_nguoipt']) && $showfield['gt_nguoipt'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Người phụ trách
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="gt_nhomkh" id="gt_nhomkh" value="0" <?php if (isset($showfield['gt_nhomkh']) && $showfield['gt_nhomkh'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Nhóm khách hàng
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="gt_nguonkh" id="gt_nguonkh" value="0" <?php if (isset($showfield['gt_nguonkh']) && $showfield['gt_nguonkh'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Nguồn khách hàng
                                </label>
                              </div>
                            </div>
                            <div class="col-md-2 col-xs-6">
                              <div class="row">
                                <label class="control-label">
                                  <input type="checkbox" name="gt_moiqh" id="gt_moiqh" value="0" <?php if (isset($showfield['gt_moiqh']) && $showfield['gt_moiqh'] == 0) { ?> checked <?php } ?> placeholder="">
                                  Mối quan hệ
                                </label>
                              </div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group">
                          <a onclick="selectKhachhang()" class="btn btn-success btn-flat add">Áp dụng</a>
                          <a onclick="closePanel();" class="btn btn-default" title="Đóng">Đóng</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <div class="clear"></div>
                          
              <div id="div_load">
                <div class="col-md-6">
                  <div id="page_pagination" style="display: inline-block;">
                    <span>1</span>
                    &nbsp;
                    <span>-</span>
                    &nbsp;
                    <span>50</span>
                    &nbsp;
                    <span>của</span>
                    &nbsp;
                    <span><?php echo isset($khachhang_num['count_kh'])? $khachhang_num['count_kh']:''; ?></span>
                    &nbsp;
                    <input type="hidden" name="khachhang_num" id="khachhang_num" value="<?php echo isset($khachhang_num['count_kh'])? $khachhang_num['count_kh']:''; ?>">
                    <span>
                      <a onclick="pagePrev()" id="page_prev" class="btn btn-default disabled">
                        <input type="hidden" name="num_prev" id="num_prev" value="0">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> 
                      </a>
                    </span>
                    <span>
                      <a onclick="pageNext()" id="page_next" class="btn btn-default">
                        <input type="hidden" name="num_next" id="num_next" value="50">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </span>
                    <span>Trang</span>
                    <span>
                      <input type="text" name="page_index" id="page_index" value="1" maxlength="<?php echo isset($khachhang_num['max_length'])? $khachhang_num['max_length']:''; ?>" style="width: 3em;text-align: center;">
                    </span>
                    &nbsp;
                    <span>/</span>
                    <span><?php echo isset($khachhang_num['page_kh'])? $khachhang_num['page_kh']:''; ?></span>
                    <input type="hidden" name="page_kh" id="page_kh" value="<?php echo isset($khachhang_num['page_kh'])? $khachhang_num['page_kh']:''; ?>">
                  </div>
                </div>
                <div class="clear"></div>
                <div class="mailbox-controls div_float_right">
                    <a href="admin/khachhang/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="khachhang" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                    <!-- <a control="khachhang" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a> -->
                </div>
                <div class="clear"></div>
                <div class="table-responsive">
                  <table id="kh_table" class="table table-bordered table-striped" >
                    <thead>
                      <tr>
                          <th class="div_center"><input type="checkbox" class="check-all"></th>
                          <th id="cols-27" class="div_center">Thao tác<div id="cols-27-sizer"></div></th>
                          <th class="div_center">#</th>
                          <th id="cols-1" class="div_center kh_ten_1">Tên khách hàng<div id="cols-1-sizer"></div></th> 
                          <th id="cols-2" class="div_center kh_dienthoai_1">Điện thoại<div id="cols-2-sizer"></th>
                          <th id="cols-3" class="div_center kh_diachi_1">Địa chỉ<div id="cols-3-sizer"></th>  
                          <th id="cols-4" class="div_center kh_ma_1">Mã KH<div id="cols-4-sizer"></th> 
                          <th id="cols-28" class="div_center kh_masothue_1">Mã số thuế<div id="cols-28-sizer"></th> 
                          <th id="cols-5" class="div_center kh_email_1">Email<div id="cols-5-sizer"></th> 
                          <th id="cols-6" class="div_center kh_fax_1">Fax<div id="cols-6-sizer"></th> 
                          <th id="cols-7" class="div_center kh_logo_1">Logo<div id="cols-7-sizer"></th>
                          <th id="cols-8" class="div_center kh_sothich_1">Sở thích<div id="cols-8-sizer"></th> 
                          <th id="cols-9" class="div_center kh_cmnd_1">Chứng minh thư<div id="cols-9-sizer"></th> 
                          <th id="cols-10" class="div_center kh_sinhnhat_1">Sinhnhật<div id="cols-10-sizer"></th> 
                          <th id="cols-11" class="div_center kh_gioitinh_1">Giới tính<div id="cols-11-sizer"></th> 
                          <th id="cols-12" class="div_center kh_tinhthanhpho_1">Tỉnh/Thành Phố<div id="cols-12-sizer"></th> 
                          <th id="cols-13" class="div_center kh_quanhuyen_1">Quận huyện<div id="cols-13-sizer"></th> 
                          <th id="cols-14" class="div_center kh_nganhhoc_1">Ngành học<div id="cols-14-sizer"></th> 
                          <th id="cols-15" class="div_center kh_anh_1">Ảnh đại diện<div id="cols-15-sizer"></th> 
                          <th id="cols-16" class="div_center kh_website_1">Website<div id="cols-16-sizer"></th> 
                          <th id="cols-17" class="div_center kh_mota_1">Mô tả<div id="cols-17-sizer"></th>

                          <th id="cols-18" class="div_center lienhe_1">Liên hệ<div id="cols-18-sizer"></th>

                          <th id="cols-19" class="div_center gt_ten_1">Người giới thiệu<div id="cols-19-sizer"></th> 
                          <th id="cols-20" class="div_center gt_nguoipt_1">Người phụ trách<div id="cols-20-sizer"></th> 
                          <th id="cols-21" class="div_center gt_nhomkh_1">Nhóm khách hàng<div id="cols-21-sizer"></th> 
                          <th id="cols-22" class="div_center gt_nguonkh_1">Nguồn khách hàng<div id="cols-22-sizer"></th> 
                          <th id="cols-23" class="div_center gt_moiqh_1">Mối quan hệ<div id="cols-23-sizer"></th> 

                          <th id="cols-24" class="div_center" style="min-width: 12em;">Ngày tạo<div id="cols-24-sizer"></div></th>
                          <th id="cols-25" class="div_center" style="min-width: 12em;">Ngày cập nhật<div id="cols-25-sizer"></div></th>
                          <th id="cols-26" class="div_center">Hiển thị<div id="cols-26-sizer"></div></th> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($khachhang) && $khachhang!=NULL){ ?>
                        <?php $i = 0; ?>
                        <?php foreach($khachhang as $key => $val){ 
                          $i++;
                          if ($val['kh_gioitinh'] == 2) { $_gioitinh = "Nữ"; } else { $_gioitinh = "Nam"; }
                          if (isset($val['kh_sinhnhat']) && $val['kh_sinhnhat'] != '0') {
                            $date1 =  date('d/m/Y', $val['kh_sinhnhat']->sec);
                            } else { $date1 = ''; }
                          if (isset($val['kh_anh_thumb']) && $val['kh_anh_thumb'] != '') { $_kh_anh_thumb = $val['kh_anh_thumb']; } else { $_kh_anh_thumb = 'noavatar.png'; }
                          if (isset($val['created'])) { $created_str = date('d-m-Y H:i:s', $val['created']->sec); } else { $created_str = ''; }
                          if (isset($val['updated'])) { $updated_str = date('d-m-Y H:i:s', $val['updated']->sec); } else { $updated_str = ''; }
                        ?>
                        <tr> 
                          <td class="div_center">
                            <input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id'];?>">
                          </td>
                          <td class="div_center tool">
                            <a href="admin/khachhang/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
                            <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']; ?>" seq="<?php echo $val['_id']; ?>" control="khachhang"><i class="fa fa-trash"></i></a>
                          </td>
                          <td class="div_center"><?php echo $i ?></td>
                          <td class="kh_ten_1"><a href="admin/khachhang/details/<?php echo $val['_id']?>"><?php echo $val['kh_ten'];?></a></td>
                          <td class="kh_dienthoai_1"><?php echo $val['kh_dienthoai']; ?></td>
                          <td class="kh_diachi_1"><?php echo $val['kh_diachi']; ?></td>
                          <td class="kh_ma_1"><?php echo $val['kh_ma']; ?></td>
                          <td class="kh_masothue_1"><?php echo $val['kh_masothue']; ?></td>
                          <td class="kh_email_1"><?php echo $val['kh_email']; ?></td>
                          <td class="kh_fax_1"><?php echo $val['kh_fax']; ?></td>
                          <td class="kh_logo_1"><?php echo $val['kh_logo']; ?></td>
                          <td class="kh_sothich_1"><?php echo $val['kh_sothich']; ?></td>
                          <td class="kh_cmnd_1"><?php echo $val['kh_cmnd']; ?></td> 
                          <td class="kh_sinhnhat_1"><?php echo $date1; ?></td> 
                          <td class="kh_gioitinh_1"><?php echo $_gioitinh; ?></td> 
                          <td class="kh_tinhthanhpho_1">
                            <?php if (isset($tinhthanhpho) && $tinhthanhpho != NULL) { ?>
                              <?php foreach ($tinhthanhpho as $key1 => $val1) { ?>
                                <?php if ($val1['_id'] == $val['kh_tinhthanhpho']) {
                                  echo $val1['tinhthanhpho_ten'];
                                } ?>
                              <?php } ?>
                            <?php } ?>
                          </td> 
                          <td class="kh_quanhuyen_1">
                            <?php if (isset($quanhuyen) && $quanhuyen != NULL) { ?>
                              <?php foreach ($quanhuyen as $key1 => $val1) { ?>
                                <?php if ($val1['_id'] == $val['kh_quanhuyen']) {
                                  echo $val1['quanhuyen_ten'];
                                } ?>
                              <?php } ?>
                            <?php } ?>
                          </td> 
                          <td class="kh_nganhhoc_1">
                            <?php if (isset($nganhhoc)&& $nganhhoc != NULL) { ?>
                              <?php $nganhhoc_str = ''; ?>
                              <?php foreach ($nganhhoc as $key1 => $val1) { ?>
                                <?php foreach ($khachhang_nganhhoc as $key2 => $val2) { ?>
                                  <?php if ($val2['id_nganhhoc'] == $val1['_id'] && $val2['id_khachhang'] == $val['_id']) {
                                    $nganhhoc_str .= $val1['nganhhoc_ten'].", ";
                                  } ?>
                                <?php } ?>
                              <?php } ?>
                              <?php echo substr($nganhhoc_str,0,-2); ?>
                            <?php } ?>
                          </td>
                          <td class="kh_anh_1" style="text-align: center;"> 
                            <img src="upload/khachhang/thumb/<?php echo $_kh_anh_thumb; ?>" alt="">
                          </td>
                          <td class="kh_website_1"><?php echo $val['kh_website']; ?></td> 
                          <td class="kh_mota_1"><?php echo $val['kh_mota']; ?></td> 

                          <td class="lienhe_1"><?php echo $val['sum_lienhe']; ?></td> 

                          <td class="gt_ten_1"><?php echo $val['gt_ten']; ?></td> 
                          <td class="gt_nguoipt_1">
                            <?php if (isset($nguoipt) && $nguoipt != NULL) { ?>
                              <?php foreach ($nguoipt as $key1 => $val1) { ?>
                                <?php if ($val1['_id'] == $val['gt_nguoipt']) {
                                  echo $val1['nguoipt_ten'];
                                } ?>
                              <?php } ?>
                            <?php } ?>
                          </td> 
                          <td class="gt_nhomkh_1">
                            <?php if (isset($nhomkh)&& $nhomkh != NULL) { ?>
                              <?php $nhomkh_str = ''; ?>
                              <?php foreach ($nhomkh as $key1 => $val1) { ?>
                                <?php foreach ($khachhang_nhomkh as $key2 => $val2) { ?>
                                  <?php if ($val2['id_nhomkhachhang'] == $val1['_id'] && $val2['id_khachhang'] == $val['_id']) {
                                    $nhomkh_str .= $val1['nhomkh_ten'].", ";
                                  } ?>
                                <?php } ?>
                              <?php } ?>
                              <?php echo substr($nhomkh_str,0,-2); ?>
                            <?php } ?>
                          </td>
                          <td class="gt_nguonkh_1">
                            <?php if (isset($nguonkh)&& $nguonkh != NULL) { ?>
                              <?php $nguonkh_str = ''; ?>
                              <?php foreach ($nguonkh as $key1 => $val1) { ?>
                                <?php foreach ($khachhang_nguonkh as $key2 => $val2) { ?>
                                  <?php if ($val2['id_nguonkhachhang'] == $val1['_id'] && $val2['id_khachhang'] == $val['_id']) {
                                    $nguonkh_str .= $val1['nguonkh_ten'].", ";
                                  } ?>
                                <?php } ?>
                              <?php } ?>
                              <?php echo substr($nguonkh_str,0,-2); ?>
                            <?php } ?>
                          </td> 
                          <td class="gt_moiqh_1">
                            <?php if (isset($moiqh) && $moiqh != NULL) { ?>
                              <?php foreach ($moiqh as $key1 => $val1) { ?>
                                <?php if ($val1['_id'] == $val['gt_moiqh']) {
                                  echo $val1['moiqh_ten'];
                                } ?>
                              <?php } ?>
                            <?php } ?>
                          </td> 
                          <td><?php echo $created_str; ?></td>
                          <td><?php echo $updated_str; ?></td>
                          <td class="div_center publish"><a onClick="show('<?php echo $val['_id']?>');" control="khachhang" title="Hiển thị" class="div_hienthi<?php echo $val['_id']?> div_hienthi" divid="div_hienthi<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>">
                            <?php if($val['publish'] == 0){ ?>
                              <i class="fa fa-check-circle"></i>
                            <?php }else{ ?>
                              <i class="fa fa-circle"></i>
                            <?php } ?></a>
                          </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
             
              <?php echo isset($list_pagination)?$list_pagination:''; ?>
              <div class="mailbox-controls div_float_right">
                  <a href="admin/khachhang/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                  <a control="khachhang" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                  <!-- <a control="khachhang" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a> -->
              </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#floatingCirclesG').hide();
    $('.sendfile').click(function(){
        $('.sendfile').attr('disabled', '');
        $('#upload_kh').submit();
        // return false;
    });
    //binds to onchange event of your input field
    $('#fileupload').bind('change', function() {
      var fileExtension = ['xlsx', 'xls'];
      var sizeinbytes   = this.files[0].size;
      var filename      = this.files[0].name;
      if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        Lobibox.notify('error', {
            msg: 'Định dạng tập tin không hợp lệ, tập tin phải có dạng: '+fileExtension.join(', '),
            size: 'mini',
            position: 'center bottom',
            sound: false, 
            delay: 8000,
        });
        return false;
      }else {
        if (sizeinbytes <= 5242880) {
          if ($('#show_list').hasClass('file_name')) {
            $('#show_list').remove();
          }
          var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
          var fSize = sizeinbytes; 
          b=0;
          while(fSize>900){fSize/=1024;b++;}
          var filesize = (Math.round(fSize*100)/100)+''+fSExt[b];

          $('#upload_list').append('<span id="show_list" class="file_name">'+filename+' ('+filesize+')</span>')
          
        } else {
          Lobibox.notify('error', {
              msg: 'Tối đa dung lượng 1 tập tin là (5MB)',
              size: 'mini',
              position: 'center bottom',
              sound: false, 
              delay: 5000,
          });
          return false;
        }
      }
    });

    $(".select2").select2();
    $("#kh_sinhnhat_adv").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

    if ($('.limit_page').hasClass('active-limit')) {
      $('.active-limit').addClass('bold');
    } else {
      $('.limit_page').removeClass('bold');
    }

    $('#page_index').keypress(function(e){
      if(e.which == 13){//Enter key pressed
        return false;
      }
    });
    $('#page_index').change(function(){
        return pageChange();
    });
    $('#page_index').keyup(function(){
      var page_index = $('#page_index').val();
      var page_kh = $('#page_kh').val();
      if (parseInt(page_index) > parseInt(page_kh)) {
        var page_del = page_index.substring(0, page_index.length - 1);
        $('#page_index').val(page_del);
      }
    });

    var num_limit     = $('.active-limit').attr('data-limit');
    var num_prev      = $('#num_prev').val();
    var khachhang_num = $('#khachhang_num').val();
    var num_minus     = parseInt(khachhang_num) - parseInt(num_prev);

    if (num_minus <= 50) {
      $('#page_next').addClass('disabled');
    } else {
      $('#page_next').removeClass('disabled');
    }

    $('#reload_kh').click(function(){
      location.reload();
    });
    $(function () {
      if ($('#kh_ten').is(":checked"))        { $('.kh_ten_1').show() }else{ $('.kh_ten_1').hide() }
      if ($('#kh_dienthoai').is(":checked"))  { $('.kh_dienthoai_1').show() }else{ $('.kh_dienthoai_1').hide() }
      if ($('#kh_diachi').is(":checked"))     { $('.kh_diachi_1').show() }else{ $('.kh_diachi_1').hide() }
      if ($('#kh_email').is(":checked"))      { $('.kh_email_1').show() }else{ $('.kh_email_1').hide() }
      if ($('#kh_ma').is(":checked"))         { $('.kh_ma_1').show() }else{ $('.kh_ma_1').hide() }
      if ($('#kh_masothue').is(":checked"))   { $('.kh_masothue_1').show() }else{ $('.kh_masothue_1').hide() }
      if ($('#kh_fax').is(":checked"))        { $('.kh_fax_1').show() }else{ $('.kh_fax_1').hide() }
      if ($('#kh_logo').is(":checked"))       { $('.kh_logo_1').show() }else{ $('.kh_logo_1').hide() }
      if ($('#kh_sothich').is(":checked"))    { $('.kh_sothich_1').show() }else{ $('.kh_sothich_1').hide() }
      if ($('#kh_cmnd').is(":checked"))       { $('.kh_cmnd_1').show() }else{ $('.kh_cmnd_1').hide() }
      if ($('#kh_sinhnhat').is(":checked"))   { $('.kh_sinhnhat_1').show() }else{ $('.kh_sinhnhat_1').hide() }
      if ($('#kh_gioitinh').is(":checked"))   { $('.kh_gioitinh_1').show() }else{ $('.kh_gioitinh_1').hide() }
      if ($('#kh_tinhthanhpho').is(":checked")) { $('.kh_tinhthanhpho_1').show() }else{ $('.kh_tinhthanhpho_1').hide() }
      if ($('#kh_quanhuyen').is(":checked"))  { $('.kh_quanhuyen_1').show() }else{ $('.kh_quanhuyen_1').hide() }
      if ($('#kh_nganhhoc').is(":checked"))   { $('.kh_nganhhoc_1').show() }else{ $('.kh_nganhhoc_1').hide() }
      if ($('#kh_anh').is(":checked"))        { $('.kh_anh_1').show() }else{ $('.kh_anh_1').hide() }
      if ($('#kh_website').is(":checked"))    { $('.kh_website_1').show() }else{ $('.kh_website_1').hide() }
      if ($('#kh_mota').is(":checked"))       { $('.kh_mota_1').show() }else{ $('.kh_mota_1').hide() }
      if ($('#lienhe').is(":checked"))        { $('.lienhe_1').show() }else{ $('.lienhe_1').hide() }
      if ($('#gt_ten').is(":checked"))        { $('.gt_ten_1').show() }else{ $('.gt_ten_1').hide() }
      if ($('#gt_nguoipt').is(":checked"))    { $('.gt_nguoipt_1').show() }else{ $('.gt_nguoipt_1').hide() }
      if ($('#gt_nhomkh').is(":checked"))     { $('.gt_nhomkh_1').show() }else{ $('.gt_nhomkh_1').hide() }
      if ($('#gt_nguonkh').is(":checked"))    { $('.gt_nguonkh_1').show() }else{ $('.gt_nguonkh_1').hide() }
      if ($('#gt_moiqh').is(":checked"))      { $('.gt_moiqh_1').show() }else{ $('.gt_moiqh_1').hide() }
    });
    $(function () {
      $('#date_start_adv').datetimepicker({
        format:'DD/MM/YYYY',
        locale: 'vi'
      });
      $('#date_end_adv').datetimepicker({
        format:'DD/MM/YYYY',
        locale: 'vi',
        useCurrent: false //Important! See issue #1075
      });
      $("#date_start_adv").on("dp.change", function (e) {
        $('#date_end_adv').data("DateTimePicker").minDate(e.date);
      });
      $("#date_end_adv").on("dp.change", function (e) {
        $('#date_start_adv').data("DateTimePicker").maxDate(e.date);
      });
    });

    $('#searchkhachhang').keypress(function(e){
      if(e.which == 13){//Enter key pressed
        return searchKhachhang();
      }
    });
    
    $('#kh_tinhthanhpho_adv').change(function(){
      var tinhthanhpho_id = $('#kh_tinhthanhpho_adv').val();
        $.ajax
        ({
           method: "POST",
           url: "admin/khachhang/filterthanhpho_adv",
           data: { tinhthanhpho_id:tinhthanhpho_id },
           dataType: "html",
            success: function(data){
            $('#div_load_qh').html( data );
            }
        });
    });

    $('#nhomkh_id').change(function(){
      return searchKhachhang();
    });
    $('#nguonkh_id').change(function(){
      return searchKhachhang();
    });
    $('#nguoipt_id').change(function(){
      return searchKhachhang();
    });
    $('#nganhhoc_id').change(function(){
      return searchKhachhang();
    });
    $('#moiqh_id').change(function(){
      return searchKhachhang();
    });
    
  });
  function searchKhachhang(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var searchkhachhang  = $('#searchkhachhang').val();
    var nguonkh_id       = $('#nguonkh_id').val();
    var nhomkh_id        = $('#nhomkh_id').val();
    var nguoipt_id       = $('#nguoipt_id').val();
    var nganhhoc_id      = $('#nganhhoc_id').val();
    var moiqh_id         = $('#moiqh_id').val();

    var num_limit        = $('.active-limit').attr('data-limit');

      $.ajax
      ({
         method: "POST",
         url: "admin/khachhang/searchkhachhang",
         data: {searchkhachhang:searchkhachhang, nhomkh_id:nhomkh_id, nguonkh_id:nguonkh_id, nguoipt_id:nguoipt_id, nganhhoc_id:nganhhoc_id, moiqh_id:moiqh_id, num_limit:num_limit},
         dataType: "html",
          success: function(data){
            $('.pagination').html('');
            $('.div_footer').html('');
            $('#div_load').html( data );
            $('#floatingCirclesG').hide();
          }
      });
  }
  function searchKhachhangAdv(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var searchkhachhang  = $('#searchkhachhang').val();
    var nguonkh_id       = $('#nguonkh_id').val();
    var nhomkh_id        = $('#nhomkh_id').val();
    var nguoipt_id       = $('#nguoipt_id').val();
    var nganhhoc_id      = $('#nganhhoc_id').val();
    var moiqh_id         = $('#moiqh_id').val();

    var kh_ma_adv        = $('#kh_ma_adv').val();
    var kh_masothue_adv  = $('#kh_masothue_adv').val();
    var kh_diachi_adv    = $('#kh_diachi_adv').val();
    var kh_email_adv     = $('#kh_email_adv').val();
    var kh_dienthoai_adv = $('#kh_dienthoai_adv').val();
    var kh_sinhnhat_adv  = $('#kh_sinhnhat_adv').val();
    var kh_gioitinh_adv  = $('#kh_gioitinh_adv').val();
    var date_start_adv   = $('#date_start_adv').val();
    var date_end_adv     = $('#date_end_adv').val();
    var kh_tinhthanhpho_adv = $('#kh_tinhthanhpho_adv').val();
    var kh_quanhuyen_adv = $('#kh_quanhuyen_adv').val();

    var num_limit        = $('.active-limit').attr('data-limit');

    $('#closePanel2').click();
    
      $.ajax
      ({
         method: "POST",
         url: "admin/khachhang/searchkhachhangadv",
         data: { searchkhachhang:searchkhachhang, nhomkh_id:nhomkh_id, nguonkh_id:nguonkh_id, nguoipt_id:nguoipt_id, nganhhoc_id:nganhhoc_id, moiqh_id:moiqh_id, kh_ma_adv:kh_ma_adv, kh_masothue_adv:kh_masothue_adv, kh_diachi_adv:kh_diachi_adv, kh_email_adv:kh_email_adv, kh_dienthoai_adv:kh_dienthoai_adv, kh_sinhnhat_adv:kh_sinhnhat_adv, kh_gioitinh_adv:kh_gioitinh_adv, date_start_adv:date_start_adv, date_end_adv:date_end_adv, kh_tinhthanhpho_adv:kh_tinhthanhpho_adv, kh_quanhuyen_adv:kh_quanhuyen_adv, num_limit:num_limit },
         dataType: "html",
          success: function(data){
            $('.pagination').html('');
            $('.div_footer').html('');
            $('#div_load').html( data );
            $('#floatingCirclesG').hide();
          }
      });
  }

  $(function() {
    var thHeight = $("table#kh_table th:first").height();
    $("table#kh_table th").resizable({
        handles: "e",
        minHeight: thHeight,
        maxHeight: thHeight,
        minWidth: 40,
        resize: function (event, ui) {
          var sizerID = "#" + $(event.target).attr("id") + "-sizer";
          $(sizerID).width(ui.size.width);
        }
    });
  });

  function showPanel1(){
    if($('#show_cols').hasClass('hide_panel')){
      $('#show_cols').removeClass('hide_panel');
    }else{
      $('#show_cols').addClass('hide_panel');
    }
  }
  function closePanel(){
    if($('#show_cols').hasClass('hide_panel')){
      $('#show_cols').removeClass('hide_panel');
    }
  }

  function closePanel2(){
    $('#closePanel2').click();
  }

  function selectKhachhang(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    if ($('#kh_ten').is(":checked"))        {var kh_ten           = $('#kh_ten').val(); $('.kh_ten_1').show() }else{ var kh_ten = 1; $('.kh_ten_1').hide() }
    if ($('#kh_dienthoai').is(":checked"))  {var kh_dienthoai     = $('#kh_dienthoai').val(); $('.kh_dienthoai_1').show() }else{ var kh_dienthoai = 1; $('.kh_dienthoai_1').hide() }
    if ($('#kh_diachi').is(":checked"))     {var kh_diachi        = $('#kh_diachi').val(); $('.kh_diachi_1').show() }else{ var kh_diachi = 1; $('.kh_diachi_1').hide() }
    if ($('#kh_ma').is(":checked"))         {var kh_ma            = $('#kh_ma').val(); $('.kh_ma_1').show() }else{ var kh_ma = 1; $('.kh_ma_1').hide() }
    if ($('#kh_masothue').is(":checked"))   {var kh_masothue      = $('#kh_masothue').val(); $('.kh_masothue_1').show() }else{ var kh_masothue = 1; $('.kh_masothue_1').hide() }
    if ($('#kh_email').is(":checked"))      {var kh_email         = $('#kh_email').val(); $('.kh_email_1').show() }else{ var kh_email = 1; $('.kh_email_1').hide() }
    if ($('#kh_fax').is(":checked"))        {var kh_fax           = $('#kh_fax').val(); $('.kh_fax_1').show() }else{ var kh_fax = 1; $('.kh_fax_1').hide() }
    if ($('#kh_logo').is(":checked"))       {var kh_logo          = $('#kh_logo').val(); $('.kh_logo_1').show() }else{ var kh_logo = 1; $('.kh_logo_1').hide() }
    if ($('#kh_sothich').is(":checked"))    {var kh_sothich       = $('#kh_sothich').val(); $('.kh_sothich_1').show() }else{ var kh_sothich = 1; $('.kh_sothich_1').hide() }
    if ($('#kh_cmnd').is(":checked"))       {var kh_cmnd          = $('#kh_cmnd').val(); $('.kh_cmnd_1').show() }else{ var kh_cmnd = 1; $('.kh_cmnd_1').hide() }
    if ($('#kh_sinhnhat').is(":checked"))   {var kh_sinhnhat      = $('#kh_sinhnhat').val(); $('.kh_sinhnhat_1').show() }else{ var kh_sinhnhat = 1; $('.kh_sinhnhat_1').hide() }
    if ($('#kh_gioitinh').is(":checked"))   {var kh_gioitinh      = $('#kh_gioitinh').val(); $('.kh_gioitinh_1').show() }else{ var kh_gioitinh = 1; $('.kh_gioitinh_1').hide() }
    if ($('#kh_tinhthanhpho').is(":checked")) {var kh_tinhthanhpho = $('#kh_tinhthanhpho').val(); $('.kh_tinhthanhpho_1').show() }else{ var kh_tinhthanhpho = 1; $('.kh_tinhthanhpho_1').hide() }
    if ($('#kh_quanhuyen').is(":checked"))  {var kh_quanhuyen     = $('#kh_quanhuyen').val(); $('.kh_quanhuyen_1').show() }else{ var kh_quanhuyen = 1; $('.kh_quanhuyen_1').hide() }
    if ($('#kh_nganhhoc').is(":checked"))   {var kh_nganhhoc      = $('#kh_nganhhoc').val(); $('.kh_nganhhoc_1').show() }else{ var kh_nganhhoc = 1; $('.kh_nganhhoc_1').hide() }
    if ($('#kh_anh').is(":checked"))        {var kh_anh           = $('#kh_anh').val(); $('.kh_anh_1').show() }else{ var kh_anh = 1; $('.kh_anh_1').hide() }
    if ($('#kh_website').is(":checked"))    {var kh_website       = $('#kh_website').val(); $('.kh_website_1').show() }else{ var kh_website = 1; $('.kh_website_1').hide() }
    if ($('#kh_mota').is(":checked"))       {var kh_mota          = $('#kh_mota').val(); $('.kh_mota_1').show() }else{ var kh_mota = 1; $('.kh_mota_1').hide() }
    if ($('#lienhe').is(":checked"))        {var lienhe           = $('#lienhe').val(); $('.lienhe_1').show() }else{ var lienhe = 1; $('.lienhe_1').hide() }
    if ($('#gt_ten').is(":checked"))        {var gt_ten           = $('#gt_ten').val(); $('.gt_ten_1').show() }else{ var gt_ten = 1; $('.gt_ten_1').hide() }
    if ($('#gt_nguoipt').is(":checked"))    {var gt_nguoipt       = $('#gt_nguoipt').val(); $('.gt_nguoipt_1').show() }else{ var gt_nguoipt = 1; $('.gt_nguoipt_1').hide() }
    if ($('#gt_nhomkh').is(":checked"))     {var gt_nhomkh        = $('#gt_nhomkh').val(); $('.gt_nhomkh_1').show() }else{ var gt_nhomkh = 1; $('.gt_nhomkh_1').hide() }
    if ($('#gt_nguonkh').is(":checked"))    {var gt_nguonkh       = $('#gt_nguonkh').val(); $('.gt_nguonkh_1').show() }else{ var gt_nguonkh = 1; $('.gt_nguonkh_1').hide() }
    if ($('#gt_moiqh').is(":checked"))      {var gt_moiqh         = $('#gt_moiqh').val(); $('.gt_moiqh_1').show() }else{ var gt_moiqh = 1; $('.gt_moiqh_1').hide() }

    if($('#show_cols').hasClass('hide_panel')){
      $('#show_cols').removeClass('hide_panel');
    }
        $.ajax
        ({
          method: "POST",
          url: "admin/khachhang/selectkhachhang",
          data: {
            kh_ten:kh_ten,
            kh_dienthoai:kh_dienthoai,
            kh_diachi:kh_diachi,
            kh_ma:kh_ma,
            kh_masothue:kh_masothue,
            kh_email:kh_email,
            kh_fax:kh_fax,
            kh_logo:kh_logo,
            kh_sothich:kh_sothich,
            kh_cmnd:kh_cmnd,
            kh_sinhnhat:kh_sinhnhat,
            kh_gioitinh:kh_gioitinh,
            kh_tinhthanhpho:kh_tinhthanhpho,
            kh_quanhuyen:kh_quanhuyen,
            kh_nganhhoc:kh_nganhhoc,
            kh_anh:kh_anh,
            kh_website:kh_website,
            kh_mota:kh_mota,
            lienhe:lienhe,
            gt_ten:gt_ten,
            gt_nguoipt:gt_nguoipt,
            gt_nhomkh:gt_nhomkh,
            gt_nguonkh:gt_nguonkh,
            gt_moiqh:gt_moiqh
          },
        });
      $('#floatingCirclesG').hide();
  }

  function pageChange(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var searchkhachhang  = $('#searchkhachhang').val();
    var nguonkh_id       = $('#nguonkh_id').val();
    var nhomkh_id        = $('#nhomkh_id').val();
    var nguoipt_id       = $('#nguoipt_id').val();
    var nganhhoc_id      = $('#nganhhoc_id').val();
    var moiqh_id         = $('#moiqh_id').val();

    var kh_ma_adv        = $('#kh_ma_adv').val();
    var kh_masothue_adv  = $('#kh_masothue_adv').val();
    var kh_diachi_adv    = $('#kh_diachi_adv').val();
    var kh_email_adv     = $('#kh_email_adv').val();
    var kh_dienthoai_adv = $('#kh_dienthoai_adv').val();
    var kh_sinhnhat_adv  = $('#kh_sinhnhat_adv').val();
    var kh_gioitinh_adv  = $('#kh_gioitinh_adv').val();
    var date_start_adv   = $('#date_start_adv').val();
    var date_end_adv     = $('#date_end_adv').val();
    var kh_tinhthanhpho_adv = $('#kh_tinhthanhpho_adv').val();
    var kh_quanhuyen_adv = $('#kh_quanhuyen_adv').val();

    var num_limit        = $('.active-limit').attr('data-limit');
    var page_index       = $('#page_index').val();
    
    $.ajax
    ({
      method: "POST",
      url: "admin/khachhang/searchkhachhangadv",
      data: { searchkhachhang:searchkhachhang, nhomkh_id:nhomkh_id, nguonkh_id:nguonkh_id, nguoipt_id:nguoipt_id, nganhhoc_id:nganhhoc_id, moiqh_id:moiqh_id, kh_ma_adv:kh_ma_adv, kh_masothue_adv:kh_masothue_adv, kh_diachi_adv:kh_diachi_adv, kh_email_adv:kh_email_adv, kh_dienthoai_adv:kh_dienthoai_adv, kh_sinhnhat_adv:kh_sinhnhat_adv, kh_gioitinh_adv:kh_gioitinh_adv, date_start_adv:date_start_adv, date_end_adv:date_end_adv, kh_tinhthanhpho_adv:kh_tinhthanhpho_adv, kh_quanhuyen_adv:kh_quanhuyen_adv, page_index:page_index, num_limit:num_limit },
      dataType: "html",
      success: function(data){
        $('.pagination').html('');
        $('.div_footer').html('');
        $('#div_load').html( data );
        $('#floatingCirclesG').hide();
      }
    });
  }
  function pagePrev(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var searchkhachhang  = $('#searchkhachhang').val();
    var nguonkh_id       = $('#nguonkh_id').val();
    var nhomkh_id        = $('#nhomkh_id').val();
    var nguoipt_id       = $('#nguoipt_id').val();
    var nganhhoc_id      = $('#nganhhoc_id').val();
    var moiqh_id         = $('#moiqh_id').val();

    var kh_ma_adv        = $('#kh_ma_adv').val();
    var kh_masothue_adv  = $('#kh_masothue_adv').val();
    var kh_diachi_adv    = $('#kh_diachi_adv').val();
    var kh_email_adv     = $('#kh_email_adv').val();
    var kh_dienthoai_adv = $('#kh_dienthoai_adv').val();
    var kh_sinhnhat_adv  = $('#kh_sinhnhat_adv').val();
    var kh_gioitinh_adv  = $('#kh_gioitinh_adv').val();
    var date_start_adv   = $('#date_start_adv').val();
    var date_end_adv     = $('#date_end_adv').val();
    var kh_tinhthanhpho_adv = $('#kh_tinhthanhpho_adv').val();
    var kh_quanhuyen_adv = $('#kh_quanhuyen_adv').val();

    var num_limit       = $('.active-limit').attr('data-limit');
    var num_prev        = $('#num_prev').val();
    var page_index      = $('#page_index').val();
    
      $.ajax
      ({
         method: "POST",
         url: "admin/khachhang/searchkhachhangadv",
         data: { searchkhachhang:searchkhachhang, nhomkh_id:nhomkh_id, nguonkh_id:nguonkh_id, nguoipt_id:nguoipt_id, nganhhoc_id:nganhhoc_id, moiqh_id:moiqh_id, kh_ma_adv:kh_ma_adv, kh_masothue_adv:kh_masothue_adv, kh_diachi_adv:kh_diachi_adv, kh_email_adv:kh_email_adv, kh_dienthoai_adv:kh_dienthoai_adv, kh_sinhnhat_adv:kh_sinhnhat_adv, kh_gioitinh_adv:kh_gioitinh_adv, date_start_adv:date_start_adv, date_end_adv:date_end_adv, kh_tinhthanhpho_adv:kh_tinhthanhpho_adv, kh_quanhuyen_adv:kh_quanhuyen_adv, num_prev:num_prev, page_index:page_index, num_limit:num_limit },
         dataType: "html",
          success: function(data){
            $('.pagination').html('');
            $('.div_footer').html('');
            $('#div_load').html( data );
            $('#floatingCirclesG').hide();
          }
      });
  }
  function pageNext(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var searchkhachhang  = $('#searchkhachhang').val();
    var nguonkh_id       = $('#nguonkh_id').val();
    var nhomkh_id        = $('#nhomkh_id').val();
    var nguoipt_id       = $('#nguoipt_id').val();
    var nganhhoc_id      = $('#nganhhoc_id').val();
    var moiqh_id         = $('#moiqh_id').val();

    var kh_ma_adv        = $('#kh_ma_adv').val();
    var kh_masothue_adv  = $('#kh_masothue_adv').val();
    var kh_diachi_adv    = $('#kh_diachi_adv').val();
    var kh_email_adv     = $('#kh_email_adv').val();
    var kh_dienthoai_adv = $('#kh_dienthoai_adv').val();
    var kh_sinhnhat_adv  = $('#kh_sinhnhat_adv').val();
    var kh_gioitinh_adv  = $('#kh_gioitinh_adv').val();
    var date_start_adv   = $('#date_start_adv').val();
    var date_end_adv     = $('#date_end_adv').val();
    var kh_tinhthanhpho_adv = $('#kh_tinhthanhpho_adv').val();
    var kh_quanhuyen_adv = $('#kh_quanhuyen_adv').val();

    var num_limit       = $('.active-limit').attr('data-limit');
    var num_next        = $('#num_next').val();
    var page_index      = $('#page_index').val();

      $.ajax
      ({
         method: "POST",
         url: "admin/khachhang/searchkhachhangadv",
         data: { searchkhachhang:searchkhachhang, nhomkh_id:nhomkh_id, nguonkh_id:nguonkh_id, nguoipt_id:nguoipt_id, nganhhoc_id:nganhhoc_id, moiqh_id:moiqh_id, kh_ma_adv:kh_ma_adv, kh_masothue_adv:kh_masothue_adv, kh_diachi_adv:kh_diachi_adv, kh_email_adv:kh_email_adv, kh_dienthoai_adv:kh_dienthoai_adv, kh_sinhnhat_adv:kh_sinhnhat_adv, kh_gioitinh_adv:kh_gioitinh_adv, date_start_adv:date_start_adv, date_end_adv:date_end_adv, kh_tinhthanhpho_adv:kh_tinhthanhpho_adv, kh_quanhuyen_adv:kh_quanhuyen_adv, num_next:num_next, page_index:page_index, num_limit:num_limit },
         dataType: "html",
          success: function(data){
            $('.pagination').html('');
            $('.div_footer').html('');
            $('#div_load').html( data );
            $('#floatingCirclesG').hide();
          }
      });
  }
  function pageLimit(value){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);

    if ($('.limit_page').hasClass('active-limit')) {
      $('.limit_page').removeClass('active-limit');
      $('.limit_page').removeClass('bold');
      $('.page_limit'+value).addClass('active-limit');
    }
    var searchkhachhang  = $('#searchkhachhang').val();
    var nguonkh_id       = $('#nguonkh_id').val();
    var nhomkh_id        = $('#nhomkh_id').val();
    var nguoipt_id       = $('#nguoipt_id').val();
    var nganhhoc_id      = $('#nganhhoc_id').val();
    var moiqh_id         = $('#moiqh_id').val();

    var kh_ma_adv        = $('#kh_ma_adv').val();
    var kh_masothue_adv  = $('#kh_masothue_adv').val();
    var kh_diachi_adv    = $('#kh_diachi_adv').val();
    var kh_email_adv     = $('#kh_email_adv').val();
    var kh_dienthoai_adv = $('#kh_dienthoai_adv').val();
    var kh_sinhnhat_adv  = $('#kh_sinhnhat_adv').val();
    var kh_gioitinh_adv  = $('#kh_gioitinh_adv').val();
    var date_start_adv   = $('#date_start_adv').val();
    var date_end_adv     = $('#date_end_adv').val();
    var kh_tinhthanhpho_adv = $('#kh_tinhthanhpho_adv').val();
    var kh_quanhuyen_adv = $('#kh_quanhuyen_adv').val();
    
    var num_limit        = value;
    var page_index       = $('#page_index').val();
    
      $.ajax
      ({
         method: "POST",
         url: "admin/khachhang/searchkhachhangadv",
         data: { searchkhachhang:searchkhachhang, nhomkh_id:nhomkh_id, nguonkh_id:nguonkh_id, nguoipt_id:nguoipt_id, nganhhoc_id:nganhhoc_id, moiqh_id:moiqh_id, kh_ma_adv:kh_ma_adv, kh_masothue_adv:kh_masothue_adv, kh_diachi_adv:kh_diachi_adv, kh_email_adv:kh_email_adv, kh_dienthoai_adv:kh_dienthoai_adv, kh_sinhnhat_adv:kh_sinhnhat_adv, kh_gioitinh_adv:kh_gioitinh_adv, date_start_adv:date_start_adv, date_end_adv:date_end_adv, kh_tinhthanhpho_adv:kh_tinhthanhpho_adv, kh_quanhuyen_adv:kh_quanhuyen_adv, page_index:page_index, num_limit:num_limit },
         dataType: "html",
          success: function(data){
            $('.pagination').html('');
            $('.div_footer').html('');
            $('#div_load').html( data );
            $('#floatingCirclesG').hide();
          }
      });
  }
</script>