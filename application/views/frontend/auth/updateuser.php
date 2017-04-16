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
            <li class="active"><a href="thong-tin-tai-khoan.html">Thông tin tài khoản</a></li>
            <li><a href="so-dia-chi.html">Số địa chỉ</a></li>
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
        <form onsubmit="return checkinfouser();" name="myForm" id="frm" method="post" action="" enctype="multipart/form-data">
            <div class="col-md-12">
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
                            <label class="control-label">Email (*)</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                <input control="auth" onchange="return checkemail(this);" class="form-control" name="email" id="email" value="<?php echo isset($user['email'])?$user['email']:'';?>" disabled="">
                            </div>
                            <span id="error_email1"></span>
                            <span id="error_email">(Email không được trống)</span>
                            <span id="error_chkemail"> (Email không đúng định dạng)</span>
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                              <input <?php if($user['sex'] == 0){ ?> checked="" <?php } ?> type="radio" name="sex" id="sex" value="0"> Nam
                            </label>
                            <label class="radio-inline">
                              <input <?php if($user['sex'] == 1){ ?> checked="" <?php } ?> type="radio" name="sex" id="sex" value="1"> Nữ
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Họ & tên</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo isset($user['fullname'])?$user['fullname']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ngày sinh</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-birthday-cake"></i></div>
                                <input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo isset($user['birthday'])?$user['birthday']:'';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" id="chk_changepass" onClick="chkChangePass();">
                                  Đổi mật khẩu
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mật khẩu (*)</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control" name="password" id="password" disabled="">
                            </div>
                            <span id="error_pass"> Mật khẩu không được trống</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nhập lại mật khẩu (*)</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control" name="repassword" id="repassword" disabled="">
                            </div>
                            <span id="error_repass"> Mật khẩu không được trống</span>
                            <span id="error_chkpass"> Mật khẩu không khớp</span>
                        </div>
                    </div>
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
                </div>
            </div>
        </form>
    </div>
    <?php echo isset($content)?$content:''; ?>
    <div class="clear"></div>
</div>

