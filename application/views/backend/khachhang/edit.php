<!-- InputMask -->
<script src="public/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="public/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<!-- Select2 -->
<link href="public/select2/select2.min.css" rel="stylesheet" type="text/css" />
<script src="public/select2/select2.full.min.js" type="text/javascript"></script>

<script type="text/javascript" src="public/admin/js/filereader.js"></script>

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
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
      </div>
      <form id="frm-admin" onsubmit="return checkKhachhang();" method="post" action="" enctype="multipart/form-data">
        <div id="form_kh" class="box-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <div class="row">
                      <div id="form_thongtinkh" class="col-md-12">
                        <div class="form_title">
                          <h3>THÔNG TIN KHÁCH HÀNG</h3>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Tên khách hàng (
                            <span class="span_red">*</span>
                            )
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="kh_ten" id="kh_ten" placeholder="Tên khách hàng" value="<?php echo isset($khachhang['kh_ten'])? $khachhang['kh_ten']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Điện thoại (
                            <span class="span_red">*</span>
                            )
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai" placeholder="Điện thoại" value="<?php echo isset($khachhang['kh_dienthoai'])? $khachhang['kh_dienthoai']: ''; ?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label">
                            Địa chỉ (
                            <span class="span_red">*</span>
                            )
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-location-arrow" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="kh_diachi" id="kh_diachi" placeholder="Địa chỉ" value="<?php echo isset($khachhang['kh_diachi'])? $khachhang['kh_diachi']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Mã KH (
                            <span class="span_red">*</span>
                            )
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-slack" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="kh_ma" id="kh_ma" placeholder="Mã khách hàng" value="<?php echo isset($khachhang['kh_ma'])? $khachhang['kh_ma']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Mã số thuế
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-slack" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="kh_masothue" id="kh_masothue" placeholder="Mã số thuế" value="<?php echo isset($khachhang['kh_masothue'])? $khachhang['kh_masothue']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Email
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-envelope-o"></i>
                            </div>
                            <input type="email" class="form-control" name="kh_email" id="kh_email" placeholder="Email" value="<?php echo isset($khachhang['kh_email'])? $khachhang['kh_email']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Fax
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-fax" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="kh_fax" id="kh_fax" placeholder="" value="<?php echo isset($khachhang['kh_fax'])? $khachhang['kh_fax']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Logo
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-bookmark" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="kh_logo" id="kh_logo" placeholder="" value="<?php echo isset($khachhang['kh_logo'])? $khachhang['kh_logo']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Sở thích khách hàng
                          </label>
                          <input type="text" class="form-control" name="kh_sothich" id="kh_sothich" placeholder="" value="<?php echo isset($khachhang['kh_sothich'])? $khachhang['kh_sothich']: ''; ?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Chứng minh thư
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-credit-card" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="kh_cmnd" id="kh_cmnd" placeholder="Số CMND" value="<?php echo isset($khachhang['kh_cmnd'])? $khachhang['kh_cmnd']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Sinh nhật
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control lh_sinhnhat2" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="kh_sinhnhat" id="kh_sinhnhat" value="<?php if (isset($khachhang['kh_sinhnhat']) && $khachhang['kh_sinhnhat'] != '0') {
                              $date1 = date('d/m/Y', $khachhang['kh_sinhnhat']->sec);
                              echo $date1;
                              } else {
                                echo "";
                              } ?>" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Giới tính
                          </label>
                          <br/>
                          <label class="radio-inline">
                            <input type="radio" name="kh_gioitinh" id="kh_gioitinh" value="1" <?php if(isset($khachhang['kh_gioitinh']) && $khachhang['kh_gioitinh'] == 1) { ?> checked <?php } ?> >
                            Nam
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="kh_gioitinh" id="kh_gioitinh" value="2" <?php if(isset($khachhang['kh_gioitinh']) && $khachhang['kh_gioitinh'] == 2) { ?> checked <?php } ?> >
                            Nữ
                          </label>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Tỉnh/Thành Phố
                          </label>
                          <div>
                            <select class="form-control select2" name="kh_tinhthanhpho" id="kh_tinhthanhpho" data-placeholder="Chọn Tỉnh/Thành Phố">
                              <option value="0">Chọn Tỉnh/Thành Phố</option>
                              <?php if (isset($tinhthanhpho) && $tinhthanhpho != NULL) { ?>
                                <?php foreach ($tinhthanhpho as $key => $val) { ?>
                                  <option value="<?php echo $val['_id'] ?>"
                                    <?php if ($val['_id'] == $khachhang['kh_tinhthanhpho']) { ?>
                                      selected
                                    <?php } ?>
                                  > <?php echo $val['tinhthanhpho_ten'] ?></option>}
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
                            <select class="form-control select2" name="kh_quanhuyen" id="kh_quanhuyen" data-placeholder="Chọn Quận/Huyện">
                              <option value="0">Chọn Quận/Huyện</option>
                              <?php if (isset($quanhuyen) && $quanhuyen != NULL) { ?>
                                <?php foreach ($quanhuyen as $key => $val) { ?>
                                  <option value="<?php echo $val['_id'] ?>"
                                    <?php if ($val['_id'] == $khachhang['kh_quanhuyen']) { ?>
                                      selected
                                    <?php } ?>
                                  > <?php echo $val['quanhuyen_ten'] ?></option>}
                                <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group">
                          <label class="control-label">
                            Ngành học
                          </label>
                          <div class="clear"></div>
                          <div class="col-md-10">
                            <div class="row">
                              <div class="clear"></div>
                              <select class="form-control select2" multiple data-placeholder="Chọn ngành học" name="kh_nganhhoc[]" id="kh_nganhhoc">
                                <?php if (isset($nganhhoc) && $nganhhoc != NULL) { ?>
                                  <?php foreach ($nganhhoc as $key => $val) { ?>
                                    <option value="<?php echo $val['_id'] ?>" 
                                    <?php foreach ($khachhang_nganhhoc as $key1 => $val1) { ?>
                                      <?php if ($val['_id'] == $val1['id_nganhhoc']) { ?>
                                        selected
                                      <?php } ?>
                                    <?php } ?>
                                    > <?php echo $val['nganhhoc_ten']; ?> </option>
                                  <?php } ?>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="row">
                              <span class="input-group-btn">
                                <button onclick="showPanel1()" class="btn btn-default btn-block" type="button">
                                  <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                              </span>
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="col-md-12">
                          <div id="nganhhoc" class="show_panel">
                            <div class="form-group">
                              <label>
                                Thêm Ngành học
                              </label>
                              <input type="text" class="form-control" name="nganhhoc_ten" id="nganhhoc_ten" value="" placeholder="Ngành học">
                            </div>
                            <div class="form-group">
                              <a onclick="addNganhhoc();" class="btn btn-primary" title="Thêm">Thêm</a>
                              <a onclick="closePanel();" class="btn btn-default" title="Đóng">Đóng</a>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Ảnh hồ sơ
                          </label>
                            <span class="btn btn-primary btn-file btn-sm avatar_pick">
                              Browse
                              <input type="file" name="kh_anh" id="kh_anh">
                            </span>
                        </div>
                        <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                              <div id="box_img_kh" class="div_kh_anh">
                                <?php if (isset($khachhang['kh_anh']) && $khachhang['kh_anh'] != NULL) { ?>
                                  <img src="upload/khachhang/<?php echo $khachhang['kh_anh']; ?>" alt="">
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Website
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-globe" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="kh_website" id="kh_website" placeholder="Tên trang Web" value="<?php echo isset($khachhang['kh_website'])? $khachhang['kh_website']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Mô tả
                          </label>
                          <textarea class="form-control" name="kh_mota" id="kh_mota" rows="4"><?php echo isset($khachhang['kh_mota'])? $khachhang['kh_mota']: ''; ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <div id="form_lienhe">
                        <div class="col-md-12">
                          <div class="form_title">
                            <h3>liên hệ</h3>
                          </div>
                        </div>
                        <input type="hidden" id="count_num" name="count_num" value="<?php echo isset($lienhe_num['count_lienhe'])? $lienhe_num['count_lienhe']:''; ?>">
                        <?php $i = 0; ?>
                        <?php if (isset($lienhe) && $lienhe != NULL) { ?>
                          <?php foreach ($lienhe as $key => $val) { 
                            $i++;
                            if (isset($val['lh_sinhnhat']) && $val['lh_sinhnhat'] != '0') { $date1 = date('d/m/Y', $val['lh_sinhnhat']->sec); } else { $date1 = ''; }
                          ?>
                            <div class="form_lienhe<?php echo $i; ?> margintop10 col-md-12">
                              <div class="col-md-12 border">
                                <div class="row margintop10">
                                <div class="lh_reduce"> 
                                  <a onclick="deleteLienhe(<?php echo $i; ?>)" class="deletelienhe(<?php echo $i; ?>)" title="Xóa liên hệ"> 
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                  </a> 
                                </div>
                                  <div class="col-md-7">
                                    <div class="form-group">
                                      <label class="control-label">
                                        Họ và tên
                                      </label>
                                      <input type="text" class="form-control" name="lh_ten[]" placeholder="Họ tên" value="<?php echo isset($val['lh_ten'])? $val['lh_ten']: ''; ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="control-label">
                                        Vị trí
                                      </label>
                                      <input type="text" class="form-control" name="lh_vitri[]"  placeholder="" value="<?php echo isset($val['lh_vitri'])? $val['lh_vitri']: ''; ?>">
                                    </div>
                                  </div>
                                  <div class="clear"></div>
                                  <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label class="control-label">
                                        Điện thoại
                                      </label>
                                      <input type="text" class="form-control" name="lh_dienthoai[]" placeholder="Điện thoại" value="<?php echo isset($val['lh_dienthoai'])? $val['lh_dienthoai']: ''; ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="control-label">
                                        Sinh nhật
                                      </label>
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" class="form-control lh_sinhnhat2" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="lh_sinhnhat[]" value="<?php echo $date1 ?>" >
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                  <label class="control-label">
                                    Email
                                  </label>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <input type="email" class="form-control" name="lh_email[]" placeholder="Email" value="<?php echo isset($val['lh_email'])? $val['lh_email']: ''; ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">
                                    Ghi chú
                                  </label>
                                  <textarea class="form-control" name="lh_ghichu[]" rows="2"> <?php echo isset($val['lh_ghichu'])? $val['lh_ghichu']: ''; ?> </textarea>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="checkbox">
                                        <label class="control-label">
                                          <input type="checkbox" name="lh_nhanmail[]" value="1"
                                            <?php if ($val['lh_nhanmail'] == 1 && $val['lh_nhanmail'] != NULL ) { ?> checked <?php } ?> 
                                          >
                                          Nhận Email
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="radio-inline margintop10">
                                        <input type="radio" name="lh_lienhechinh" value="<?php echo $i ?>"
                                          <?php if ($val['lh_lienhechinh'] == $i && $val['lh_lienhechinh'] != NULL) { ?> checked <?php } ?>
                                        >
                                        Liên hệ chính
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php } ?>
                        <?php } ?>
                        <div id="form_lh_add">
                        </div>
                        <div id="lh_add" class="col-md-12">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="lh_add">
                                <a id="clk_add" title="Thêm">
                                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                                  <p>Thêm liên hệ</p>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <div id="form_gioithieu" class="col-md-12">
                        <div class="form_title">
                          <h3>Giới thiệu</h3>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Người giới thiệu
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="gt_ten" id="gt_ten" placeholder="Tên người giới thiệu" value="<?php echo isset($khachhang['gt_ten'])? $khachhang['gt_ten']: ''; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Người phụ trách
                          </label>
                          <div>
                            <select class="form-control select2" name="gt_nguoipt" id="gt_nguoipt" data-placeholder="Chọn người phụ trách">
                              <option value="0">Chọn người phụ trách</option>
                              <?php if (isset($nguoipt) && $nguoipt != NULL) { ?>
                                <?php foreach ($nguoipt as $key => $val) { ?>
                                  <option value="<?php echo $val['_id'] ?>"
                                  <?php if ($val['_id'] == $khachhang['gt_nguoipt']) { ?>
                                    selected
                                  <?php } ?>
                                  ><?php echo $val['nguoipt_ten'] ?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-group">
                          <label class="control-label">
                            Nhóm khách hàng
                          </label>
                          <div class="clear"></div>
                          <div class="col-md-10">
                            <div class="row">
                              <div class="clear"></div>
                              <select class="form-control select2" multiple data-placeholder="Chọn nhóm khách hàng" name="gt_nhomkh[]" id="gt_nhomkh">
                                <?php if (isset($nhomkh) && $nhomkh != NULL) { ?>
                                  <?php foreach ($nhomkh as $key => $val) { ?>
                                    <option value="<?php echo $val['_id'] ?>" 
                                    <?php foreach ($khachhang_nhomkh as $key1 => $val1) { ?>
                                      <?php if ($val['_id'] == $val1['id_nhomkhachhang']) { ?>
                                        selected
                                      <?php } ?>
                                    <?php } ?>
                                    > <?php echo $val['nhomkh_ten']; ?> </option>
                                  <?php } ?>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="row">
                              <span class="input-group-btn">
                                <button onclick="showPanel2()" class="btn btn-default btn-block" type="button">
                                  <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                              </span>
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="col-md-12">
                          <div id="nhomkhachhang" class="show_panel">
                            <div class="form-group">
                              <label>
                                Thêm Nhóm khách hàng
                              </label>
                              <input type="text" class="form-control" name="nhomkh_ten" id="nhomkh_ten" value="" placeholder="Nhóm khách hàng">
                            </div>
                            <div class="form-group">
                              <a onclick="addNhomkhachhang();" class="btn btn-primary" title="Thêm">Thêm</a>
                              <a onclick="closePanel();" class="btn btn-default" title="Đóng">Đóng</a>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Nguồn khách hàng
                          </label>
                          <div class="clear"></div>
                          <div class="col-md-10">
                            <div class="row">
                              <div class="clear"></div>
                              <select class="form-control select2" multiple data-placeholder="Chọn nguồn khách hàng" name="gt_nguonkh[]" id="gt_nguonkh">
                                <?php if (isset($nguonkh) && $nguonkh != NULL) { ?>
                                  <?php foreach ($nguonkh as $key => $val) { ?>
                                    <option value="<?php echo $val['_id'] ?>" 
                                    <?php foreach ($khachhang_nguonkh as $key1 => $val1) { ?>
                                      <?php if ($val['_id'] == $val1['id_nguonkhachhang']) { ?>
                                        selected
                                      <?php } ?>
                                    <?php } ?>
                                    > <?php echo $val['nguonkh_ten']; ?> </option>
                                  <?php } ?>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="row">
                              <span class="input-group-btn">
                                <button onclick="showPanel3()" class="btn btn-default btn-block" type="button">
                                  <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                              </span>
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="col-md-12">
                          <div id="nguonkhachhang" class="show_panel">
                            <div class="form-group">
                              <label>
                                Thêm Nguồn khách hàng
                              </label>
                              <input type="text" class="form-control" name="nguonkh_ten" id="nguonkh_ten" value="" placeholder="Nguồn khách hàng">
                            </div>
                            <div class="form-group">
                              <a onclick="addNguonkhachhang();" class="btn btn-primary" title="Thêm">Thêm</a>
                              <a onclick="closePanel();" class="btn btn-default" title="Đóng">Đóng</a>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">
                            Mối quan hệ
                          </label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-tags" aria-hidden="true"></i>
                            </div>
                            <select class="form-control" name="gt_moiqh" id="gt_moiqh">
                              <option value="0">Chọn mối quan hệ</option>
                              <?php if (isset($moiqh) && $moiqh != NULL) { ?>
                                <?php foreach ($moiqh as $key => $val) { ?>
                                  <option value="<?php echo $val['_id'] ?>"
                                  <?php if ($val['_id'] == $khachhang['gt_moiqh']) { ?>
                                    selected
                                  <?php } ?>
                                  ><?php echo $val['moiqh_ten'] ?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="clear"></div>
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
                </div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
          <button class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</button>
          <a href="admin/khachhang/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="check_duplicate">
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#floatingCirclesG').hide();

    $('#kh_dienthoai').change(function(){
      return checkDuplicateDienthoai();
    });
    $('#kh_ma').change(function(){
      return checkDuplicateMa();
    });
    $('#kh_masothue').change(function(){
      return checkDuplicateMasothue();
    });
    $('#kh_email').change(function(){
      return checkDuplicateEmail();
    });
    $('#kh_cmnd').change(function(){
      return checkDuplicateCmnd();
    });

    $('#kh_tinhthanhpho').change(function(){
      var tinhthanhpho_id = $(this).val();
        $.post('admin/khachhang/filterthanhpho', { tinhthanhpho_id:tinhthanhpho_id }, function(data) {
          $('#div_load_qh').html( data );
        });
    });

  });

  var i = $('#count_num').val();
  $('#clk_add').click(function(){
    i++;
    if (i <= 5) {
    $('#form_lh_add').append('<div class="form_lienhe'+i+' col-md-12 margintop10"> <div class="col-md-12 border"> <div class="row margintop10"> <div class="lh_reduce"> <a onclick="deleteLienhe('+i+')" class="deletelienhe('+i+')" title="Xóa liên hệ"> <i class="fa fa-times" aria-hidden="true"></i> </a> </div> <div class="col-md-7"> <div class="form-group"> <label class="control-label"> Họ và tên </label> <input type="text" class="form-control" name="lh_ten[]" placeholder="Họ tên" value=""> </div> </div> <div class="col-md-5"> <div class="form-group"> <label class="control-label"> Vị trí </label> <input type="text" class="form-control" name="lh_vitri[]" placeholder="" value=""> </div> </div> <div class="clear"></div> <div class="col-md-7 col-sm-12"> <div class="form-group"> <label class="control-label"> Điện thoại </label> <input type="text" class="form-control" name="lh_dienthoai[]" placeholder="Điện thoại" value=""> </div> </div> <div class="col-md-5"> <div class="form-group"> <label class="control-label"> Sinh nhật </label> <div class="input-group"> <div class="input-group-addon"> <i class="fa fa-calendar" aria-hidden="true"></i> </div> <input type="text" class="form-control lh_sinhnhat2" data-inputmask="\'alias\': \'dd/mm/yyyy\'" data-mask name="lh_sinhnhat[]"/> </div> </div> </div> </div> <div class="clear"></div> <div class="form-group"> <label class="control-label"> Email </label> <div class="input-group"> <div class="input-group-addon"> <i class="fa fa-envelope-o"></i> </div> <input type="email" class="form-control" name="lh_email[]" placeholder="Email" value=""> </div> </div> <div class="form-group"> <label class="control-label"> Ghi chú </label> <textarea class="form-control" name="lh_ghichu[]" rows="2"></textarea> </div> <div class="row"> <div class="col-md-6"> <div class="form-group"> <div class="checkbox"> <label class="control-label"> <input type="checkbox" name="lh_nhanmail[]" value="1"> Nhận Email </label> </div> </div> </div> <div class="col-md-6"> <div class="form-group"> <label class="radio-inline margintop10"> <input type="radio" name="lh_lienhechinh" id="lh_lienhechinh" value="'+i+'" placeholder=""> Liên hệ chính </label> </div> </div> </div> </div> </div>');
    } else {
      Lobibox.notify('warning', {
          msg: 'Tối đa được 5 liên hệ',
          size: 'mini',
          position: 'right bottom',
          sound: false, 
          delay: 4000,  //In milliseconds
      });
      i=5;
    }
    $(".lh_sinhnhat2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  });

  $(".lh_sinhnhat2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  $("#kh_sinhnhat").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  $(".select2").select2();

  var opts_kh = {
      on: {
        load: function(e, file) {
          var fileDiv = $('#box_img_kh');
            var img = new Image();
            img.onload = function() {
              fileDiv.html(img);
            };
          img.src = e.target.result;
        }
      }
  };
  FileReaderJS.setupInput(document.getElementById('kh_anh'), opts_kh);

  function deleteLienhe(num){
    i--;
    $('.form_lienhe'+num).remove();
  }
  function showPanel1(){
    if($('#nganhhoc').hasClass('hide_panel')){
        $('#nganhhoc').removeClass('hide_panel');
      }else{
        $('#nganhhoc').addClass('hide_panel');
      }
  }
  function showPanel2(){
    if($('#nhomkhachhang').hasClass('hide_panel')){
        $('#nhomkhachhang').removeClass('hide_panel');
      }else{
        $('#nhomkhachhang').addClass('hide_panel');
      }
  }
   function showPanel3(){
    if($('#nguonkhachhang').hasClass('hide_panel')){
        $('#nguonkhachhang').removeClass('hide_panel');
      }else{
        $('#nguonkhachhang').addClass('hide_panel');
      }
  }
  function closePanel(){
    if($('.show_panel').hasClass('hide_panel')){
        $('.show_panel').removeClass('hide_panel');
      }
  }
  function addNganhhoc(){
    var nganhhoc_ten = $('#nganhhoc_ten').val();
    if(nganhhoc_ten != '')  
    {
      if($('#nganhhoc').hasClass('hide_panel')){
        $('#nganhhoc').removeClass('hide_panel');
      }
      
      $.post('admin/khachhang/addnganhhoc', { nganhhoc_ten:nganhhoc_ten }, function(data) {
        $('#kh_nganhhoc').html( data );
        return lobiboxSuccess();
      });
    }else {
      return lobiboxError();
    }
  }
  function addNguonkhachhang(){
    var nguonkh_ten = $('#nguonkh_ten').val();
    if(nguonkh_ten != '')  
    {
      if($('#nguonkhachhang').hasClass('hide_panel')){
        $('#nguonkhachhang').removeClass('hide_panel');
      }

      $.post('admin/khachhang/addnguonkhachhang', { nguonkh_ten:nguonkh_ten }, function(data) {
        $('#gt_nguonkh').html( data );
        return lobiboxSuccess();
      });
    }else {
      return lobiboxError();
    }
  }
  function addNhomkhachhang(){
    var nhomkh_ten = $('#nhomkh_ten').val();
    if(nhomkh_ten != '')  
    {
      if($('#nhomkhachhang').hasClass('hide_panel')){
        $('#nhomkhachhang').removeClass('hide_panel');
      }

      $.post('admin/khachhang/addnhomkhachhang', { nhomkh_ten:nhomkh_ten }, function(data) {
        $('#gt_nhomkh').html( data );
        return lobiboxSuccess();
      });
    }else {
      return lobiboxError();
    }
  }

  function checkDuplicateDienthoai(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var checkdup  = $('#kh_dienthoai').val();
    var fieldsdup = 'kh_dienthoai';
    var setname   = 'ĐIỆN THOẠI';
    $.post('admin/khachhang/checkduplicate', { checkdup:checkdup, fieldsdup:fieldsdup, setname:setname }, function(data) {
      $('#check_duplicate').html(data);
      $('#launch_modal').click();
      $('#floatingCirclesG').hide();
    });
  }
  function checkDuplicateMa(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var checkdup  = $('#kh_ma').val();
    var fieldsdup = 'kh_ma';
    var setname   = 'Mã KH';
    $.post('admin/khachhang/checkduplicate', { checkdup:checkdup, fieldsdup:fieldsdup, setname:setname }, function(data) {
      $('#check_duplicate').html(data);
      $('#launch_modal').click();
      $('#floatingCirclesG').hide();
    });
  }
  function checkDuplicateMasothue(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var checkdup  = $('#kh_masothue').val();
    var fieldsdup = 'kh_masothue';
    var setname   = 'MÃ SỐ THUẾ';
    $.post('admin/khachhang/checkduplicate', { checkdup:checkdup, fieldsdup:fieldsdup, setname:setname }, function(data) {
      $('#check_duplicate').html(data);
      $('#launch_modal').click();
      $('#floatingCirclesG').hide();
    });
  }
  function checkDuplicateEmail(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var checkdup  = $('#kh_email').val();
    var fieldsdup = 'kh_email';
    var setname   = 'EMAIL';
    $.post('admin/khachhang/checkduplicate', { checkdup:checkdup, fieldsdup:fieldsdup, setname:setname }, function(data) {
      $('#check_duplicate').html(data);
      $('#launch_modal').click();
      $('#floatingCirclesG').hide();
    });
  }
  function checkDuplicateCmnd(){
    $('#floatingCirclesG').show();
    $("#floatingCirclesG").delay(30000);
    var checkdup  = $('#kh_cmnd').val();
    var fieldsdup = 'kh_cmnd';
    var setname   = 'CHỨNG MINH THƯ';
    $.post('admin/khachhang/checkduplicate', { checkdup:checkdup, fieldsdup:fieldsdup, setname:setname }, function(data) {
      $('#check_duplicate').html(data);
      $('#launch_modal').click();
      $('#floatingCirclesG').hide();
    });
  }

  function lobiboxError(){
    Lobibox.notify('error', {
        msg: 'Dữ liệu trống!',
        size: 'mini',
        position: 'right bottom',
        sound: false, 
        delay: 2000,  //In milliseconds
    });
    return false;
  }
  function lobiboxSuccess(){
    Lobibox.notify('success', {
        msg: 'Thêm dữ liệu thành công!',
        rounded: true,
        size: 'mini',
        position: 'top center',
        sound: false, 
        delay: 2000,  //In milliseconds
    });
    return false;
  }
</script>