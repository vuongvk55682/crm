<style type="text/css">
  .box{
    min-height: 700px;

  }
  .san_pham{
    width: 1000px;
    max-height: 472px;
    overflow: auto;

  }
  .hinhanh_sp img{
    width: 100px;
    height: auto;
  }
  .boloc a{
    font-size: 16px;
    color: black;
  }
  #boloc_sp ul li{
    list-style-type: none;
    margin: 0px;
    padding: 0px;
    border-bottom: solid 1px #D0D0D0;
  }
   #boloc_sp ul li:hover{
    background-color: #f5f5f5;
   }
  #boloc_sp ul{
    margin: 0px;
    padding: 0px;
  }
  #boloc_sp ul li a{
    color: black;
    line-height: 35px;
    font-size: 16px;
  }
  #boloc_sp{
    padding: 0px;
  }
  .list_tabs ul li{
    list-style-type: none;
    float: left;
    border: solid 1px #c5d0dc;
    /*margin: 10px;*/
    padding: 10px;
    background-color: #f9f9f9;
    margin-bottom: -1px;
  }
  .list_tabs ul li a{
    
    
    line-height: 16px;
    position: relative;
    z-index: 11;
    font-size: 16px;
    color: black;
  }
  .list_tabs{
    margin: 0px;
    padding: 0px;

  }
  .list_tabs ul{
    margin: 0px;
    padding: 0px;
  }
  .list_tabs .active{
    background-color: white;
    box-shadow: 0 -2px 3px 0 rgba(0,0,0,.15);
    border-top: 2px solid #4c8fbd;
    border-bottom: none;
    z-index: 99;
    font-weight: bold;
  }
  #timkiem{
    /*width: 334px;*/

  }

  .wp_pareant .show_timkiem {
    position: absolute;
    top: 0px;
    /*left: 750px;*/
    width: 100%;
    max-width: 100%;
    background-color: #FFF;
    z-index: 999;
    box-shadow: 0 0 5px #CCC;
    padding: 20px;
    display: none;
}

.select2-selection__choice {
    color: #000 !important;
    background-color: #ebe9e9 !important;
    border-color: silver !important;
}
.select2-selection__choice__remove{
    color: black !important;
}
.select2-selection__choice__remove:hover {
    color: #CE1212 !important;
}
.select2-dropdown .select2-search__field:focus, .select2-search--inline .select2-search__field:focus {
  border: 0px;
}

table th{
  white-space: nowrap;
}
.imput-left{
  padding-right: 0px !important;

}
.imput-right{
  padding-left: 0px !important;
}
.imput-right input{
  height: 35px;
}



#select_kh .fa-filter {
    color: #D4D3D3;
    cursor: pointer;
    z-index: 999;
    font-size: 20px;
}
#select_kh .fa-filter:hover {
    color: #333;
}
#select_kh .show_panel {
    position: absolute;
    right: 0;
    width: 100%;
    max-width: 100%;
    background-color: #FFF;
    z-index: 999;
    box-shadow: 0 0 5px #CCC;
    padding: 15px;
    display: none;
}
#select_kh .show_panel:before {
    border: 9px solid transparent;
    border-bottom-color: #ccc;
    bottom: 100%;
    left: 86%;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
#select_kh .show_panel:after {
    border: 8px solid transparent;
    border-bottom-color: #fff;
    bottom: 100%;
    left: 86%;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
#select_kh .hide_panel {
    display: block !important;
    animation: fadeIn 0.2s ease-out;
    -moz-animation: fadeIn 0.2s ease-out;
    -webkit-animation: fadeIn 0.2s ease-out;
    -o-animation: fadeIn 0.2s ease-out;
}

table#kh_table th {
    white-space: nowrap;
    padding: 3px 6px;
}
table#kh_table td {
    /*white-space: nowrap;*/
    padding: 3px 6px;
}
table.cellpadding-0 td {
    padding: 0;
}
table.cellspacing-0 {
    border-spacing: 0;
    border-collapse: collapse;
}
</style>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="public/admin/js/jquery-1.12.4.js" type="text/javascript"></script>
<script src="public/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<link href="public/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col-md-12">

      <div class="box">
            <div class="box-header with-border boloc">
              <div class="row">
                <div class="col-md-6">
                  <a  href="#boloc_sp" data-toggle="collapse">
                    <i class="fa fa-bars"></i> <?php echo isset($title)?$title:'';?>
                  </a>
                </div>  
                
                <div class="col-md-6">
                    <div class="navbar-form">
                      <div class="form-group">
                        <input type="text" class="form-control" id="tensanpham" name="tensanpham" placeholder="Tên sản phẩm">
                      </div>
                      <a onclick="timkiem();" class="btn btn-success">Tìm Kiếm</a>
                      <button onclick="showtimkiem();" class="btn btn-info">Tìm kiếm nâng cao</button>
                      <button type="" class="btn btn-success">Upload Sản Phẩm</button>
                    </div>
                <div id="timkiem" class="wp_pareant">
                  <div class="show_timkiem">
                      <div class="form-group">
                        <div class="">
                          <input type="timkiem" class="form-control" id="masanpham" name="masanpham" placeholder="Mã sản phẩm">
          <select class="form-control select2" class="form-control" name="danhmuc_sp" id="danhmuc_sp">
            <?php if(isset($danhmuc) && $danhmuc != NULL){ ?>
              <option selected="selected" value="">Chọn danh mục</option>
              <?php foreach ($danhmuc as $key_danhmuc => $val_danhmuc) { ?>
                <option value="<?php echo $val_danhmuc['ten'];?>"><?php echo $val_danhmuc['ten'];?></option>
              <?php } ?> 
            <?php } ?>
          </select>
          <select class="form-control select2" class="form-control" name="xuatxu" id="xuatxu">
              <?php if(isset($xuatxu) && $xuatxu != NULL){ ?>
                  <option selected="selected" value="">Chọn Xuất xứ</option>
                  <?php foreach ($xuatxu as $key_xuatxu => $val_xuatxu) { ?>
                    <option value="<?php echo $val_xuatxu['ten'];?>"><?php echo $val_xuatxu['ten'];?></option>
                  <?php } ?> 
              <?php } ?>
          </select>
          <select class="form-control select2" class="form-control" name="nhasanxuat" id="nhasanxuat">
            <?php if(isset($nhasanxuat) && $nhasanxuat != NULL){ ?>
                <option selected="selected" value="">Chọn nhà sản xuất</option>
                <?php foreach ($nhasanxuat as $key_nhasanxuat => $val_nhasanxuat) { ?>
                  <option value="<?php echo $val_nhasanxuat['ten'];?>"><?php echo $val_nhasanxuat['ten'];?></option>
                <?php } ?> 
            <?php } ?>
          </select>
          <select class="form-control select2" class="form-control" name="donvi" id="donvi">
              <?php if(isset($donvi) && $donvi != NULL){ ?>
                  <option selected="selected" value="">Chọn Đơn vị</option>
                  <?php foreach ($donvi as $key_donvi => $val_donvi) { ?>
                    <option value="<?php echo $val_donvi['ten'];?>"><?php echo $val_donvi['ten'];?></option>
                  <?php } ?> 
              <?php } ?>
          </select>
          <select class="form-control select2" class="form-control" name="mausac" id="mausac">
              <?php if(isset($mausac) && $mausac != NULL){ ?>
                  <option selected="selected" value="">Chọn màu sắc</option>
                  <?php foreach ($mausac as $key_mausac => $val_mausac) { ?>
                    <option value="<?php echo $val_mausac['ten'];?>"><?php echo $val_mausac['ten'];?></option>
                  <?php } ?> 
              <?php } ?>
          </select>
          <!-- <select class="form-control select2" multiple name="themboloc" id="themboloc">
            <option onclick="themhuong();" value="huong">Hướng</option>
            <option onclick="themngaysanxuat();" value="ngaysanxuat">Ngày sản xuất</option>
            <option onclick="themngayhethan();" value="ngayhethan">Ngày hết hạn</option>
            <option onclick="themmausac();" value="mausac">Màu sắc</option>
            <option onclick="themgiadoitac();" value="giadoitac">Giá đối tác</option>
            <option onclick="themgiaxuatxuong();" value="giaxuatxuong">Giá xuất xưởng</option>
            <option onclick="themgiabanle();" value="giabanle">Giá khách lẻ</option>
            <option onclick="themnhacungcap();" value="nhacungcap">Nhà cung cấp</option>
            <option onclick="themEMEI();" value="EMEI">EMEI</option>
          </select> -->
          <div class="row">
            <div class="col-md-4 imput-left">
              <select class="form-control select2" name="huong1" id="huong1">
                <option value="bang">=</option>
                <option value="lonhon">>=</option>
                <option value="nhohon"><=</option>
              </select>
            </div>
            <div class="col-md-8 imput-right">
              <input type="timkiem" class="form-control" id="huong" name="huong" placeholder="hướng">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 imput-left">
              <select class="form-control select2" name="ngaysanxuat1" id="ngaysanxuat1">
                <option value="bang">=</option>
                <option value="lonhon">>=</option>
                <option value="nhohon"><=</option>
              </select>
            </div>
            <div class="col-md-8 imput-right">
              <!-- <input type="timkiem" class="form-control" id="ngaysanxuat" name="ngaysanxuat" placeholder="Ngày sản xuất"> -->
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="ngaysanxuat" id="ngaysanxuat" placeholder="Ngày sản xuất">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 imput-left">
              <select class="form-control select2" name="ngayhethan1" id="ngayhethan1">
                <option value="bang">=</option>
                <option value="lonhon">>=</option>
                <option value="nhohon"><=</option>
              </select>
            </div>
            <div class="col-md-8 imput-right">
              <!-- <input type="timkiem" class="form-control" id="ngayhethan" name="ngayhethan" placeholder="Ngày hết hạn"> -->
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" name="ngayhethan" id="ngayhethan" placeholder="Ngày hết hạn">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-4 imput-left">
              <select class="form-control select2" name="giadoitac1" id="giadoitac1">
                <option value="bang">=</option>
                <option value="lonhon">>=</option>
                <option value="nhohon"><=</option>
              </select>
            </div>
            <div class="col-md-8 imput-right">
              <input type="timkiem" class="form-control" id="giadoitac" name="giadoitac" placeholder="Giá đối tác">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 imput-left">
              <select class="form-control select2" name="giaxuatxuong1" id="giaxuatxuong1">
                <option value="bang">=</option>
                <option value="lonhon">>=</option>
                <option value="nhohon"><=</option>
              </select>
            </div>
            <div class="col-md-8 imput-right">
              <input type="timkiem" class="form-control" id="giaxuatxuong" name="giaxuatxuong" placeholder="Giá xuất xưởng">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 imput-left">
              <select class="form-control select2" name="giabanle1" id="giabanle1">
                <option value="bang">=</option>
                <option value="lonhon">>=</option>
                <option value="nhohon"><=</option>
              </select>
            </div>
            <div class="col-md-8 imput-right">
              <input type="timkiem" class="form-control" id="giabanle" name="giabanle" placeholder="Giá bán lẻ">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 imput-left">
              <select class="form-control select2" name="nhacungcap1" id="nhacungcap1">
                <option value="bang">=</option>
                <option value="lonhon">>=</option>
                <option value="nhohon"><=</option>
              </select>
            </div>
            <div class="col-md-8 imput-right">
              <input type="timkiem" class="form-control" id="nhacungcap" name="nhacungcap" placeholder="Nhà cung cấp">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 imput-left">
              <select class="form-control select2" name="EMEI1" id="EMEI1">
                <option value="bang">=</option>
                <option value="lonhon">>=</option>
                <option value="nhohon"><=</option>
              </select>
            </div>
            <div class="col-md-8 imput-right">
              <input type="timkiem" class="form-control" id="EMEI" name="EMEI" placeholder="EMEI">
            </div>
          </div>

                        </div>
                      </div>
                      
                      <div class="form-group">        
                        <div class="">
                          <a onclick="timkiem();" class="btn btn-success">Tìm Kiếm</a>
                          <a onclick="closetimkiem();" class="btn btn-default">Đóng</a>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
              <!-- <div class="col-md-2 upload_sp">
                    <div class="navbar-form">
                      <button type="" class="btn btn-success">Upload Sản Phẩm</button>
                    </div>
              </div>  -->
              <form id="select_kh" action="" method="post" enctype="multipart/form-data" class="dropdown-toggle">
                <div class="col-md-3">
                  <i onclick="showPanel1()" class="fa fa-filter" aria-hidden="true"></i>
                </div>
                <div class="clear"></div>
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
                                <input type="checkbox" name="inmavach" id="inmavach" value="1" <?php if (isset($showfield['inmavach']) && $showfield['inmavach'] == 1) { ?> checked <?php } ?> placeholder="">
                                In mã vạch
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="tonkho" id="tonkho" value="1" <?php if (isset($showfield['tonkho']) && $showfield['tonkho'] == 1) { ?> checked <?php } ?> placeholder="">
                                Tồn kho
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="masanpham_1" id="masanpham_1" value="1" <?php if (isset($showfield['masanpham']) && $showfield['masanpham'] == 1) { ?> checked <?php } ?> placeholder="">
                                Mã sản phẩm
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="ten_sp_1" id="ten_sp_1" value="1" <?php if (isset($showfield['ten_sp']) && $showfield['ten_sp'] == 1) { ?> checked <?php } ?> placeholder="">
                                Tên sản phẩm
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="danhmuc_sp_1" id="danhmuc_sp_1" value="1" <?php if (isset($showfield['danhmuc_sp']) && $showfield['danhmuc_sp'] == 1) { ?> checked <?php } ?> placeholder="">
                                Danh mục sản phẩm
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="mota_1" id="mota_1" value="1" <?php if (isset($showfield['mota']) && $showfield['mota'] == 1) { ?> checked <?php } ?> placeholder="">
                                Mô tả
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="giabanle_1" id="giabanle_1" value="1" <?php if (isset($showfield['giabanle']) && $showfield['giabanle'] == 1) { ?> checked <?php } ?> placeholder="">
                                Giá bán lẻ
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="chietkhaugiabanle_1" id="chietkhaugiabanle_1" value="1" <?php if (isset($showfield['chietkhaugiabanle']) && $showfield['chietkhaugiabanle'] == 1) { ?> checked <?php } ?> placeholder="">
                                Chiết khấu giá bán lẻ
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="giabanbuon_1" id="giabanbuon_1" value="1" <?php if (isset($showfield['giabanbuon']) && $showfield['giabanbuon'] == 1) { ?> checked <?php } ?> placeholder="">
                                Giá bán buôn
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="chietkhaugiabanbuon_1" id="chietkhaugiabanbuon_1" value="1" <?php if (isset($showfield['chietkhaugiabanbuon']) && $showfield['chietkhaugiabanbuon'] == 1) { ?> checked <?php } ?> placeholder="">
                                Chiết khấu gia bán buôn
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="giabanonline_1" id="giabanonline_1" value="1" <?php if (isset($showfield['giabanonline']) && $showfield['giabanonline'] == 1) { ?> checked <?php } ?> placeholder="">
                                Giá online
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="chietkhaugiabanonline_1" id="chietkhaugiabanonline_1" value="1" <?php if (isset($showfield['chietkhaugiabanonline']) && $showfield['chietkhaugiabanonline'] == 1) { ?> checked <?php } ?> placeholder="">
                                Chiết khấu giá online
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="giamua_1" id="giamua_1" value="1" <?php if (isset($showfield['giamua']) && $showfield['giamua'] == 1) { ?> checked <?php } ?> placeholder="">
                                Giá mua
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="chietkhaugiamua_1" id="chietkhaugiamua_1" value="1" <?php if (isset($showfield['chietkhaugiamua']) && $showfield['chietkhaugiamua'] == 1) { ?> checked <?php } ?> placeholder="">
                                Chiết khấu giá mua
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="giakhuyenmai_1" id="giakhuyenmai_1" value="1" <?php if (isset($showfield['giakhuyenmai']) && $showfield['giakhuyenmai'] == 1) { ?> checked <?php } ?> placeholder="">
                                Giá khuyến mãi
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="giadoitac_1" id="giadoitac_1" value="1" <?php if (isset($showfield['giadoitac']) && $showfield['giadoitac'] == 1) { ?> checked <?php } ?> placeholder="">
                                Giá đối tác
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="giaxuatxuong_1" id="giaxuatxuong_1" value="1" <?php if (isset($showfield['giaxuatxuong']) && $showfield['giaxuatxuong'] == 1) { ?> checked <?php } ?> placeholder="">
                                Giá xuất xưởng
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="nhasanxuat_1" id="nhasanxuat_1" value="1" <?php if (isset($showfield['nhasanxuat']) && $showfield['nhasanxuat'] == 1) { ?> checked <?php } ?> placeholder="">
                                Nhà sản xuất
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="xuatxu_1" id="xuatxu_1" value="1" <?php if (isset($showfield['xuatxu']) && $showfield['xuatxu'] == 1) { ?> checked <?php } ?> placeholder="">
                                Xuất xứ
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="donvi_1" id="donvi_1" value="1" <?php if (isset($showfield['donvi']) && $showfield['donvi'] == 1) { ?> checked <?php } ?> placeholder="">
                                Đơn vị
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="hinhanh_1" id="hinhanh_1" value="1" <?php if (isset($showfield['hinhanh']) && $showfield['hinhanh'] == 1) { ?> checked <?php } ?> placeholder="">
                                Hình ảnh
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="huong_1" id="huong_1" value="1" <?php if (isset($showfield['huong']) && $showfield['huong'] == 1) { ?> checked <?php } ?> placeholder="">
                                Hướng
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="ngaysanxuat_1" id="ngaysanxuat_1" value="1" <?php if (isset($showfield['ngaysanxuat']) && $showfield['ngaysanxuat'] == 1) { ?> checked <?php } ?> placeholder="">
                                Ngày sản xuất
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="ngayhethan_1" id="ngayhethan_1" value="1" <?php if (isset($showfield['ngayhethan']) && $showfield['ngayhethan'] == 1) { ?> checked <?php } ?> placeholder="">
                                Ngày hết hạn
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="mausac_1" id="mausac_1" value="1" <?php if (isset($showfield['mausac']) && $showfield['mausac'] == 1) { ?> checked <?php } ?> placeholder="">
                                Màu sắc
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="nhacungcap_1" id="nhacungcap_1" value="1" <?php if (isset($showfield['nhacungcap']) && $showfield['nhacungcap'] == 1) { ?> checked <?php } ?> placeholder="">
                                Nhà cung cấp
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="donvi_1" id="donvi_1" value="1" <?php if (isset($showfield['donvi']) && $showfield['donvi'] == 1) { ?> checked <?php } ?> placeholder="">
                                Đơn vị
                              </label>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-6">
                            <div class="row">
                              <label class="control-label">
                                <input type="checkbox" name="EMEI_1" id="EMEI_1" value="1" <?php if (isset($showfield['EMEI']) && $showfield['EMEI'] == 1) { ?> checked <?php } ?> placeholder="">
                                EMEI
                              </label>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="clear"></div>
                      <div class="form-group">
                        <a onclick="selectsanpham()" class="btn btn-success btn-flat add">Áp dụng</a>
                        <a onclick="closePanel();" class="btn btn-default" title="Đóng">Đóng</a>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
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
      <div class="mailbox-controls div_float_right">
          <a href="admin/sanpham/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
          <a control="sanpham" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
          <a control="sanpham" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
      </div>

<div class="clear"></div>

    <div class="">
      <div class="col-md-2 collapse in" id="boloc_sp">
          <div>
            <h3>Danh mục</h3>
          </div>
          <ul>
            
              <?php if(isset($danhmuc) && $danhmuc != NULL){ ?>
                  
                  <?php foreach ($danhmuc as $key_danhmuc => $val_danhmuc) { ?>
                    <li value="<?php echo $val_danhmuc['_id'];?>" onclick="dmsp('<?php echo $val_danhmuc['ten']; ?>','<?php echo $val_danhmuc['_id'];?>');" >
                      <a value ="<?php echo $val_danhmuc['_id'];?>" name ="<?php echo $val_danhmuc['_id'];?>" seq="<?php echo $val_danhmuc['_id']?>"> <?php echo $val_danhmuc['ten'];?> </a>

                     
                      </a>
                    </li>
                  <?php } ?> 
              <?php } ?>
            
          </ul>
      </div>
      <div class="col-md-10">

        <div class="tabs_sp">

              <div class="list_tabs">
                <ul>
                  <li class="mytab active"><a data-toggle="tab" href="#all">Tất cả</a></li>
                  <li class="mytab"><a data-toggle="tab" href="#new_product">Mới về</a></li>
                  <li class="mytab"><a data-toggle="tab" href="#out_off">Hết hàng</a></li>
                  
                </ul>
              </div>

                <div class="clear"></div>

              <div class="tab-content">

                  <div id="all" class="tab-pane fade in active table-responsive">
                    <table id='sanpham_table' class="table table-bordered table-striped">

                        <thead>
                          <tr>
                              <th class="div_center"><input type="checkbox" class="check-all"></th>
                              <th class="div_center">#</th> 
                             
                                <th id="cols-1" class="div_center inmavach_1">In mã vạch<div id="cols-1-sizer"></div></th> 
                              
                              
                                <th id="cols-2" class="div_center tonkho_1">Tồn kho<div id="cols-2-sizer"></div></th>
                              
                              
                                <th id="cols-3" class="div_center hinhanh_sp_1">Hình ảnh 1<div id="cols-3-sizer"></div></th>
                              
                              
                                <th id="cols-4" class="div_center ma_sp_1">Mã sản phẩm<div id="cols-4-sizer"></div></th>
                              
                                <th id="cols-5" class="div_center ten_sp_1">Tên sản phẩm<div id="cols-5-sizer"></div></th>  
                              
                                <th id="cols-6" class="div_center danhmuc_sp_1">danh mục<div id="cols-6-sizer"></div></th> 
                             
                                <th id="cols-7" class="div_center donvi_1">đơn vị<div id="cols-7-sizer"></div></th>
                             
                                <th id="cols-8" class="div_center nhasanxuat_1">nhà sản xuất<div id="cols-8-sizer"></div></th>
                              
                                <th id="cols-9" class="div_center xuatxu_1">xuất xứ<div id="cols-9-sizer"></div></th>
                             
                                <th id="cols-10" class=" div_center mota_1">mô tả<div id="cols-10-sizer"></div></th>
                             
                                <th id="cols-11" class=" div_center ngaysanxuat_1">Ngày sản xuất<div id="cols-11-sizer"></div></th>
                             
                                <th id="cols-12" class=" div_center ngayhethan_1">Ngày hết hạn<div id="cols-12-sizer"></div></th>
                              
                                <th id="cols-13" class=" div_center mausac_1">Màu sắc<div id="cols-13-sizer"></div></th>
                             
                                <th id="cols-14" class=" div_center giabanle_1">giá bán lẻ<div id="cols-14-sizer"></div></th>
                            
                                <th id="cols-15" class=" div_center chietkhaugiabanle_1">chiết khấu giá bán lẻ<div id="cols-15-sizer"></div></th>
                              
                                <th id="cols-16" class=" div_center giabanbuon_1">giá bán buôn<div id="cols-16-sizer"></div></th>
 
                                <th id="cols-17" class=" div_center chietkhaugiabanbuon_1">chiết khấu giá bán buôn<div id="cols-17-sizer"></div></th>
                             
                                <th id="cols-18" class=" div_center giabanonline_1">giá bán online<div id="cols-18-sizer"></div></th>
 
                                <th id="cols-19" class=" div_center chietkhaugiabanonline_1">chiết khấu online<div id="cols-19-sizer"></div></th>
                            
                                <th id="cols-20" class=" div_center giamua_1">giá mua<div id="cols-20-sizer"></div></th>
                            
                                <th id="cols-21" class=" div_center chietkhaugiamua_1">chiết khấu giá mua<div id="cols-21-sizer"></div></th>
                             
                                <th id="cols-22" class=" div_center giakhuyenmai_1">giá khuyến mại<div id="cols-22-sizer"></div></th> 
                            
                                <th id="cols-23" class=" div_center giadoitac_1">giá đối tác<div id="cols-23-sizer"></div></th>
                            
                                <th id="cols-24" class=" div_center giaxuatxuong_1">giá xuất xưởng<div id="cols-24-sizer"></div></th>

                                <th id="cols-25" class=" div_center huong_1">Hướng<div id="cols-25-sizer"></div></th>

                                <th id="cols-26" class=" div_center EMEI_1">EMEI<div id="cols-26-sizer"></div></th>

                                <th id="cols-27" class=" div_center lienhelancuoi_1">Liên hệ lần cuối<div id="cols-27-sizer"></div></th> 
                             
                                <th id="cols-28" class=" div_center thaotac_1">thao tác<div id="cols-28-sizer"></div></th>

                          </tr>
                        </thead>

                        <tbody>
                          <?php if(isset($sanpham) && $sanpham!=NULL){ ?>
                            <?php $i=0;
                            foreach($sanpham as $key => $val){ 
                              $i++;
                              if (isset($val['hinhanh_thumb']) && $val['hinhanh_thumb'] != NULL) { $_hinhanh_thumb = $val['hinhanh_thumb']; } else { $_hinhanh_thumb = ''; }
                              if (isset($val['created'])) { $created_str = date('Y-m-d H:i:s', $val['created']); } else { $created_str = ''; }
                              if (isset($val['updated'])) { $updated_str = date('Y-m-d H:i:s', $val['updated']); } else { $updated_str = ''; }
                            ?>
                            <tr> 
                              <td class="div_center">
                                <input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id'];?>">
                              </td>
                              <td><?php echo $i; ?></td>
                              <td class="inmavach_1"><?php echo $val['inmavach']; ?></td>
                              <td class="tonkho_1"><?php echo $val['tonkho']; ?></td>
                              <td class="hinhanh_sp hinhanh_sp_1">
                                  <img src="upload/sanpham/detail/<?php echo $val['image'][0]; ?>" alt="">
                              </td>
                              <td class="ma_sp_1"><?php echo $val['ma_sp']; ?></td>
                              <td class="ten_sp_1"><a href="admin/sanpham/showsanpham/<?php echo $val['_id']?>"><?php echo $val['ten_sp'];?></a></td>
                              <td class="danhmuc_sp_1"><?php echo $val['danhmuc_sp']; ?></td>
                              <td class="donvi_1"><?php echo $val['donvi']; ?></td>
                              <td class="nhasanxuat_1"><?php echo $val['nhasanxuat']; ?></td>
                              <td class="xuatxu_1"><?php echo $val['xuatxu']; ?></td>
                              <td class="mota_1"><?php echo $val['mota']; ?></td>
                              <td class="ngaysanxuat_1"><?php echo $val['ngaysanxuat']; ?></td>
                              <td class="ngayhethan_1"><?php echo $val['ngayhethan']; ?></td>
                              <td class="mausac_1"><?php echo $val['mausac']; ?></td>
                              <td class="giabanle_1"><?php echo $val['giabanle']; ?></td>
                              <td class="chietkhaugiabanle_1"><?php echo $val['chietkhaugiabanle']; ?></td>
                              <td class="giabanbuon_1"><?php echo $val['giabanbuon']; ?></td>
                              <td class="chietkhaugiabanbuon_1"><?php echo $val['chietkhaugiabanbuon']; ?></td>
                              <td class="giabanonline_1"><?php echo $val['giabanonline']; ?></td>
                              <td class="chietkhaugiabanonline_1"><?php echo $val['chietkhaugiabanonline']; ?></td>
                              <td class="giamua_1"><?php echo $val['giamua']; ?></td>
                              <td class="chietkhaugiamua_1"><?php echo $val['chietkhaugiamua']; ?></td>
                              <td class="giakhuyenmai_1"><?php echo $val['giakhuyenmai']; ?></td>
                              <td class="giadoitac_1"><?php echo $val['giadoitac']; ?></td>
                              <td class="giaxuatxuong_1"><?php echo $val['giaxuatxuong']; ?></td>
                              <td class="huong_1"><?php echo $val['huong']; ?></td>
                              <td class="EMEI_1"><?php echo $val['EMEI']; ?></td>
                              <td class="lienhelancuoi_1"><?php echo $val['lienhelancuoi']; ?></td>
                              <td class="div_center tool">
                                <a href="admin/sanpham/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
                                <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']; ?>" seq="<?php echo $val['_id']; ?>" control="sanpham"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php } ?>
                          <?php } ?>
                        </tbody>

                    </table>
                  </div><!-- end #all -->
                  
              </div><!-- end content_tabs -->
        </div><!-- end tabs_sp -->
      </div>
    </div>

              <!-- <?php echo isset($list_pagination)?$list_pagination:''; ?> -->
              
            </div>
        </div>
    </div>
</div>


<script src="public/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="public/datepicker/datepicker3.css">


<script type="text/javascript">
function dmsp(ten,id){
    
    
    if(ten != '')  
    {

        if($('.mytab').hasClass('xoaboloc'+id)){
          $('.mytab').removeClass('active');
          $('.xoaboloc'+id).addClass('active');
          $('.tab-pane').removeClass('in active');
          $('#'+id).addClass(' in active');
        }
        else {
        $.ajax
        ({
           method: "POST",
           url: "admin/sanpham/boloc",
           data: { ten:ten,id:id},
           dataType: "html",
            success: function(data){

              $(".tab-content").append(( data ));
            }
          });
          
          $('.tab-pane').removeClass('in active');
          $('.mytab').removeClass('active');
          $('.list_tabs ul').append('<li class="mytab active xoaboloc'+id+'"><a class="gray" data-toggle="tab" href="#'+id+'">'+ten+'</a><a onclick="xoaboloc('+'\''+id+'\''+')" class=""><i class="fa fa-times" aria-hidden="true"></i></a> </li>');
              }
    }
}

    $('#ngaysanxuat').datepicker({
      autoclose: true
    });
    $('#ngayhethan').datepicker({
      autoclose: true
    });
    function xoaboloc(id){
      $('.xoaboloc'+id).remove();
      $('#'+id).remove();
    }

    function showtimkiem(){
      if($('.show_timkiem').hasClass('hide_div')){
          $('.show_timkiem').removeClass('hide_div');
        }else{
          $('.show_timkiem').addClass('hide_div');
        }
    }
    function closetimkiem(){
      if($('.show_timkiem').hasClass('hide_div')){
          $('.show_timkiem').removeClass('hide_div');
        }
    }
    function timkiem(){
      var tensanpham = $('#tensanpham').val();
      var masanpham = $('#masanpham').val();
      var danhmuc_sp = $('#danhmuc_sp').val();
      var xuatxu = $('#xuatxu').val();
      var nhasanxuat = $('#nhasanxuat').val();
      var donvi = $('#donvi').val();
      var mausac = $('#mausac').val();
      var huong = $('#huong').val();
      var huong1 = $('#huong1').val();
      var ngaysanxuat = $('#ngaysanxuat').val();
      var ngaysanxuat1 = $('#ngaysanxuat1').val();
      var ngayhethan = $('#ngayhethan').val();
      var ngayhethan1 = $('#ngayhethan1').val();
      var giadoitac = $('#giadoitac').val();
      var giadoitac1 = $('#giadoitac1').val();
      var giaxuatxuong = $('#giaxuatxuong').val();
      var giaxuatxuong1 = $('#giaxuatxuong1').val();
      var giabanle = $('#giabanle').val();
      var giabanle1 = $('#giabanle1').val();
      var nhacungcap = $('#nhacungcap').val();
      var nhacungcap1 = $('#nhacungcap1').val();
      var EMEI = $('#EMEI').val();
      var EMEI1 = $('#EMEI1').val();
      
      $('.ketquatimkiem').remove();
      $('#ketquatimkiem').remove();
      $.ajax
        ({
           method: "POST",
           url: "admin/sanpham/timkiem",
           data: { tensanpham:tensanpham,
            masanpham:masanpham,
            danhmuc_sp:danhmuc_sp,
            nhasanxuat:nhasanxuat,
            xuatxu:xuatxu,
            donvi:donvi,
            mausac:mausac,
            huong:huong,
            huong1:huong1,
            ngaysanxuat:ngaysanxuat,
            ngaysanxuat1:ngaysanxuat1,
            ngayhethan:ngayhethan,
            ngayhethan1:ngayhethan1,
            giadoitac:giadoitac,
            giadoitac1:giadoitac1,
            giaxuatxuong:giaxuatxuong,
            giaxuatxuong1:giaxuatxuong1,
            giabanle:giabanle,
            giabanle1:giabanle1,
            nhacungcap:nhacungcap,
            nhacungcap1:nhacungcap1,
            EMEI:EMEI,
            EMEI1:EMEI1},
           dataType: "html",
            success: function(data){

              $(".tab-content").append(( data ));
            }
          });
      $('.tab-pane').removeClass('in active');
      $('.mytab').removeClass('active');
      $('.list_tabs ul').append('<li class="mytab active ketquatimkiem"><a class="gray" data-toggle="tab" href="#ketquatimkiem">kết quả tìm kiếm</a></li>');
      $('.show_timkiem').removeClass('hide_div');
          
    }




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

      $(function() {
        if ($('#inmavach').is(":checked")){
          $('.inmavach_1').show();
        }else{ 
          $('.inmavach_1').hide();
        }

        if ($('#tonkho').is(":checked")){
          $('.tonkho_1').show();
        }else{ 
          $('.tonkho_1').hide();
          }

         if ($('#hinhanh_1').is(":checked")){
          $('.hinhanh_sp_1').show();
        }else{ 
          $('.hinhanh_sp_1').hide();
          }

        if ($('#masanpham_1').is(":checked")){
          $('.ma_sp_1').show();
        }else{ 
          $('.ma_sp_1').hide();
          }

        if ($('#ten_sp_1').is(":checked")){
          $('.ten_sp_1').show();
        }else{ 
          $('.ten_sp_1').hide();
          }

        if ($('#danhmuc_sp_1').is(":checked")){
          $('.danhmuc_sp_1').show();
        }else{ 
          $('.danhmuc_sp_1').hide();
          }

        if ($('#donvi_1').is(":checked")){
          $('.donvi_1').show();
        }else{ 
          $('.donvi_1').hide();
          }

        if ($('#nhasanxuat_1').is(":checked")){
          var nhasanxuat_1 = $('#nhasanxuat_1').val();
        }else{ 
          $('.nhasanxuat_1').hide();
           }

        if ($('#xuatxu_1').is(":checked")){
          $('.xuatxu_1').show(); 
        }else{ 
          $('.xuatxu_1').hide();
          }

        if ($('#mota_1').is(":checked")){
          $('.mota_1').show(); 
        }else{ 
          $('.mota_1').hide();
          }

        if ($('#ngaysanxuat_1').is(":checked")){
          $('.ngaysanxuat_1').show(); 
        }else{ 
          $('.ngaysanxuat_1').hide();
          }

        if ($('#ngayhethan_1').is(":checked")){
          $('.ngayhethan_1').show(); 
        }else{ 
          $('.ngayhethan_1').hide();
          }

        if ($('#mausac_1').is(":checked")){
          $('.mausac_1').show();
        }else{ 
          $('.mausac_1').hide();
          }

        if ($('#giabanle_1').is(":checked")){
          $('.giabanle_1').show(); 
        }else{ 
          $('.giabanle_1').hide();
          }

        if ($('#chietkhaugiabanle_1').is(":checked")){
          $('.chietkhaugiabanle_1').show(); 
        }else{ 
          $('.chietkhaugiabanle_1').hide();
          }

        if ($('#giabanbuon_1').is(":checked")){
          $('.giabanbuon_1').show(); 
        }else{ 
          $('.giabanbuon_1').hide();
          }

        if ($('#chietkhaugiabanbuon_1').is(":checked")){
          $('.chietkhaugiabanbuon_1').show();
        }else{ 
          $('.chietkhaugiabanbuon_1').hide();
          }

        if ($('#giabanonline_1').is(":checked")){
          $('.giabanonline_1').show(); 
        }else{ 
          $('.giabanonline_1').hide();
          }

        if ($('#chietkhaugiabanonline_1').is(":checked")) {
          $('.chietkhaugiabanonline_1').show(); 
        }else{ 
          $('.chietkhaugiabanonline_1').hide();
          }

        if ($('#giamua_1').is(":checked"))  {
          $('.giamua_1').show(); 
        }else{ 
          $('.giamua_1').hide();
          }

        if ($('#chietkhaugiamua_1').is(":checked")){
          $('.chietkhaugiamua_1').show(); 
        }else{ 
          $('.chietkhaugiamua_1').hide();
          }

        if ($('#giakhuyenmai_1').is(":checked")){
          $('.giakhuyenmai_1').show(); 
        }else{ 
          $('.giakhuyenmai_1').hide();
          }

        if ($('#giadoitac_1').is(":checked")){
          $('.giadoitac_1').show();
        }else{ 
          $('.giadoitac_1').hide();
          }

        if ($('#giaxuatxuong_1').is(":checked")){
          $('.giaxuatxuong_1').show();
        }else{ 
          $('.giaxuatxuong_1').hide();
           }

        if ($('#huong_1').is(":checked")){
          $('.huong_1').show();
        }else{ 
          $('.huong_1').hide();
          }

        if ($('#nhacungcap_1').is(":checked")){
          $('.nhacungcap_1').show();
        }else{ 
          $('.nhacungcap_1').hide();
          }

        if ($('#EMEI_1').is(":checked")){
          $('.EMEI_1').show();
        }else{ 
          $('.EMEI_1').hide();
           }
      });
      function selectsanpham(){
        if ($('#inmavach').is(":checked")){
          var inmavach = $('#inmavach').val();
          $('.inmavach_1').show();
        }else{ 
          var inmavach = 0;
          $('.inmavach_1').hide();
        }

        if ($('#tonkho').is(":checked")){
          var tonkho = $('#tonkho').val();
          $('.tonkho_1').show();
        }else{ 
          $('.tonkho_1').hide();
          var tonkho = 0; }

         if ($('#hinhanh_1').is(":checked")){
          var hinhanh_1 = $('#hinhanh_1').val();
          $('.hinhanh_sp_1').show();
        }else{ 
          $('.hinhanh_sp_1').hide();
          var hinhanh_1 = 0; }

        if ($('#masanpham_1').is(":checked")){
          var masanpham_1 = $('#masanpham_1').val();
          $('.ma_sp_1').show();
        }else{ 
          $('.ma_sp_1').hide();
          var masanpham_1 = 0; }

        if ($('#ten_sp_1').is(":checked")){
          var ten_sp_1 = $('#ten_sp_1').val(); 
          $('.ten_sp_1').show();
        }else{ 
          $('.ten_sp_1').hide();
          var ten_sp_1 = 0; }

        if ($('#danhmuc_sp_1').is(":checked")){
          var danhmuc_sp_1 = $('#danhmuc_sp_1').val(); 
          $('.danhmuc_sp_1').show();
        }else{ 
          $('.danhmuc_sp_1').hide();
          var danhmuc_sp_1 = 0; }

        if ($('#donvi_1').is(":checked")){
          var donvi_1 = $('#donvi_1').val(); 
          $('.donvi_1').show();
        }else{ 
          $('.donvi_1').hide();
          var donvi_1 = 0; }

        if ($('#nhasanxuat_1').is(":checked")){
          var nhasanxuat_1 = $('#nhasanxuat_1').val();
          $('.nhasanxuat_1').show();
        }else{ 
          $('.nhasanxuat_1').hide();
          var nhasanxuat_1 = 0; }

        if ($('#xuatxu_1').is(":checked")){
          var xuatxu_1 = $('#xuatxu_1').val();
          $('.xuatxu_1').show(); 
        }else{ 
          $('.xuatxu_1').hide();
          var xuatxu_1 = 0; }

        if ($('#mota_1').is(":checked")){
          var mota_1 = $('#mota_1').val();
          $('.mota_1').show(); 
        }else{ 
          $('.mota_1').hide();
          var mota_1 = 0; }

        if ($('#ngaysanxuat_1').is(":checked")){
          var ngaysanxuat_1 = $('#ngaysanxuat_1').val();
          $('.ngaysanxuat_1').show(); 
        }else{ 
          $('.ngaysanxuat_1').hide();
          var ngaysanxuat_1 = 0; }

        if ($('#ngayhethan_1').is(":checked")){
          var ngayhethan_1 = $('#ngayhethan_1').val();
          $('.ngayhethan_1').show(); 
        }else{ 
          $('.ngayhethan_1').hide();
          var ngayhethan_1 = 0; }

        if ($('#mausac_1').is(":checked")){
          var mausac_1 = $('#mausac_1').val(); 
          $('.mausac_1').show();
        }else{ 
          $('.mausac_1').hide();
          var mausac_1 = 0; }

        if ($('#giabanle_1').is(":checked")){
          var giabanle_1 = $('#giabanle_1').val();
          $('.giabanle_1').show(); 
        }else{ 
          $('.giabanle_1').hide();
          var giabanle_1 = 0; }

        if ($('#chietkhaugiabanle_1').is(":checked")){
          var chietkhaugiabanle_1 = $('#chietkhaugiabanle_1').val();
          $('.chietkhaugiabanle_1').show(); 
        }else{ 
          $('.chietkhaugiabanle_1').hide();
          var chietkhaugiabanle_1 = 0; }

        if ($('#giabanbuon_1').is(":checked")){
          var giabanbuon_1 = $('#giabanbuon_1').val();
          $('.giabanbuon_1').show(); 
        }else{ 
          $('.giabanbuon_1').hide();
          var giabanbuon_1 = 0; }

        if ($('#chietkhaugiabanbuon_1').is(":checked")){
          var chietkhaugiabanbuon_1 = $('#chietkhaugiabanbuon_1').val();
          $('.chietkhaugiabanbuon_1').show();
        }else{ 
          $('.chietkhaugiabanbuon_1').hide();
          var chietkhaugiabanbuon_1 = 0; }

        if ($('#giabanonline_1').is(":checked")){
          var giabanonline_1 = $('#giabanonline_1').val();
          $('.giabanonline_1').show(); 
        }else{ 
          $('.giabanonline_1').hide();
          var giabanonline_1 = 0; }

        if ($('#chietkhaugiabanonline_1').is(":checked")) {
          var chietkhaugiabanonline_1 = $('#chietkhaugiabanonline_1').val();
          $('.chietkhaugiabanonline_1').show(); 
        }else{ 
          $('.chietkhaugiabanonline_1').hide();
          var chietkhaugiabanonline_1 = 0; }

        if ($('#giamua_1').is(":checked"))  {
          var giamua_1 = $('#giamua_1').val();
          $('.giamua_1').show(); 
        }else{ 
          $('.giamua_1').hide();
          var giamua_1 = 0; }

        if ($('#chietkhaugiamua_1').is(":checked")){
          var chietkhaugiamua_1 = $('#chietkhaugiamua_1').val();
          $('.chietkhaugiamua_1').show(); 
        }else{ 
          $('.chietkhaugiamua_1').hide();
          var chietkhaugiamua_1 = 0; }

        if ($('#giakhuyenmai_1').is(":checked")){
          var giakhuyenmai_1 = $('#giakhuyenmai_1').val();
          $('.giakhuyenmai_1').show(); 
        }else{ 
          $('.giakhuyenmai_1').hide();
          var giakhuyenmai_1= 0; }

        if ($('#giadoitac_1').is(":checked")){
          var giadoitac_1 = $('#giadoitac_1').val();
          $('.giadoitac_1').show();
        }else{ 
          $('.giadoitac_1').hide();
          var giadoitac_1 = 0; }

        if ($('#giaxuatxuong_1').is(":checked")){
          var giaxuatxuong_1 = $('#giaxuatxuong_1').val();
          $('.giaxuatxuong_1').show();
        }else{ 
          $('.giaxuatxuong_1').hide();
          var giaxuatxuong_1 = 0; }

        if ($('#huong_1').is(":checked")){
          var huong_1 = $('#huong_1').val(); 
          $('.huong_1').show();
        }else{ 
          $('.huong_1').hide();
          var huong_1 = 0; }

        if ($('#nhacungcap_1').is(":checked")){
          var nhacungcap_1 = $('#nhacungcap_1').val();
          $('.nhacungcap_1').show();
        }else{ 
          $('.nhacungcap_1').hide();
          var nhacungcap_1 = 0; }

        if ($('#EMEI_1').is(":checked")){
          var EMEI_1 = $('#EMEI_1').val(); 
          $('.EMEI_1').show();
        }else{ 
          $('.EMEI_1').hide();
          var EMEI_1 = 0; }

        // if(nguoninmavach != '')  
        // {
            $.ajax
            ({
              method: "POST",
              url: "admin/sanpham/selectsanpham",
              data: {
                inmavach:inmavach,
                tonkho:tonkho,
                masanpham:masanpham_1,
                ten_sp:ten_sp_1,
                danhmuc_sp:danhmuc_sp_1,
                mota:mota_1,
                giabanle:giabanle_1,
                chietkhaugiabanle:chietkhaugiabanle_1,
                giabanbuon:giabanbuon_1,
                chietkhaugiabanbuon:chietkhaugiabanbuon_1,
                giabanonline:giabanonline_1,
                chietkhaugiabanonline:chietkhaugiabanonline_1,
                giamua:giamua_1,
                chietkhaugiamua:chietkhaugiamua_1,
                giakhuyenmai:giakhuyenmai_1,
                giadoitac:giadoitac_1,
                giaxuatxuong:giaxuatxuong_1,
                nhasanxuat:nhasanxuat_1,
                xuatxu:xuatxu_1,
                donvi:donvi_1,
                hinhanh:hinhanh_1,
                huong:huong_1,
                ngaysanxuat:ngaysanxuat_1,
                ngayhethan:ngayhethan_1,
                mausac:mausac_1,
                nhacungcap:nhacungcap_1,
                EMEI:EMEI_1
              },

              dataType: "html",
              success: function(data){
                $('#kh_table').html( data );
                if($('#show_cols').hasClass('hide_panel')){
                  $('#show_cols').removeClass('hide_panel');
                }
              }
            });
        // }
      }
      $(function() {
        var thHeight = $("table#sanpham_table th:first").height();
        $("table#sanpham_table th").resizable({
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
      
</script>