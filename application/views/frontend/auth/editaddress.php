<div class="col-md-3">
    <div class="info_login clearfix">
        <div class="title clearfix">
            <?php if($data_index['info_user']['avatar_thumb'] != ''){ ?>
                <img src="upload/user/thumb/<?php echo $data_index['info_user']['avatar_thumb'];?>" class="img-circle" alt="User Image" />
            <?php }else{ ?>
                <img src="public/bootstrap/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            <?php } ?>
            Tài khoản
            <h3><?php echo $data_index['info_user']['fullname'];?></h3>
        </div>
        <div class="clear"></div>
        <ul>
            <li><a href="thong-tin-chung.html">Thông tin chung</a></li>
            <li><a href="thong-tin-tai-khoan.html">Thông tin tài khoản</a></li>
            <li class="active"><a href="so-dia-chi.html">Số địa chỉ</a></li>
            <li><a href="thong-tin-don-hang.html">Đơn hàng của tôi</a></li>
            <li><a href="san-pham-danh-gia.html">Sản phẩm đánh giá</a></li>
            <li><a href="de-danh-mua-sau.html">Để danh mua sau</a></li>
            <li><a href="danh-sach-san-pham-yeu-thich.html">Danh sách yêu thích</a></li>
            <li><a href="hoi-dap.html">Hỏi đáp</a></li>
            <li><a href="quan-ly-xu.html">Quản lý xu</a></li>
        </ul>
    </div>
</div>
<div class="col-md-9">
    <h1 class="have-margin"><?php echo $title; ?></h1>
    
    <div class="update_user">
        <form onsubmit="return checkaddress();" name="myForm" id="frm" method="post" action="">
            <div class="col-md-12">
                <div id="div_error_address"></div>
                  <div class="box-body">
                    <div class="clear"></div>
                    <div class="col-md-12">
                    <div class="row">
                        <?php
                            $message_flashdata = $this->session->flashdata('message_flashdata');
                            if(isset($message_flashdata) && count($message_flashdata)){
                              if($message_flashdata['type'] == 'sucess'){
                              ?>
                                <div class="alert alert-success"> <?php echo $message_flashdata['message']; ?></div> 
                              <?php
                              }
                            }
                        ?>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label">Họ & tên</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo isset($address['fullname'])?$address['fullname']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Công ty</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="company" id="company" value="<?php echo isset($address['company'])?$address['company']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input type="number" type="text" class="form-control" name="phone" id="phone" value="<?php echo isset($address['phone'])?$address['phone']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tỉnh/thành</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                <select onChange="loadDistrict();" class="form-control select2" name="cityid" id="cityid">
                                  <option value="">Chọn tỉnh/thành</option>
                                  <?php if(isset($city) && !is_null($city)){ ?>
                                  <?php foreach ($city as $key_city => $val_city) { ?>
                                        <option value="<?php echo $val_city['id'];?>" <?php if($val_city['id'] == $address['cityid']){ ?> selected <?php } ?>><?php echo $val_city['name'];?></option>
                                  <?php } ?>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Quận/huyện</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                <select onChange="loadWard();" class="form-control select2" name="districtid" id="districtid">
                                    <option value="">Chọn quận/huyện</option>
                                    <?php if(isset($district) && !is_null($district)){ ?>
                                    <?php foreach ($district as $key_district => $val_district) { ?>
                                        <option value="<?php echo $val_district['id'];?>" <?php if($val_district['id'] == $address['districtid']){ ?> selected <?php } ?>><?php echo $val_district['name'];?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phường/xã</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                <select class="form-control select2" name="wardid" id="wardid">
                                    <option value="">Chọn phường/xã</option>
                                    <?php if(isset($ward) && !is_null($ward)){ ?>
                                    <?php foreach ($ward as $key_ward => $val_ward) { ?>
                                        <option value="<?php echo $val_ward['id'];?>" <?php if($val_ward['id'] == $address['wardid']){ ?> selected <?php } ?>><?php echo $val_ward['name'];?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea class="form-control" rows="4" name="address" id="address"><?php echo isset($address['address'])?$address['address']:'';?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                  <input <?php if($address['active'] == 1){ ?> checked <?php } ?> type="checkbox" name="active" id="active" value="1">
                                  Sử dụng địa chỉ này làm mặc định.
                                </label>
                            </div>
                        </div>
                    </div>
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
                    <a href="auth/listaddress" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Hủy</a>
                </div>
            </div>
        </form>
    </div>
    <?php echo isset($content)?$content:''; ?>
    <div class="clear"></div>
</div>

