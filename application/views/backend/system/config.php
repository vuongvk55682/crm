<div class="row" ng-app="myApp">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cấu hình hiển thị</h3>
        </div>
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
        <form method="post" action="" id="frm-admin">
        <div class="box-body">
            <div class="col-xs-3">
                <div class="admin_title">Hiển thị trang chủ</div>
                <input type="hidden" name="cbs">
                <div class="form-group">
                    <label>
                      <input <?php if($config['is_type_home'] == 1){ ?> checked="" <?php } ?> type="checkbox" class="minimal" name="is_type_home" id="is_type_home" value="1" />
                      Danh mục
                    </label>
                </div>
                <div class="form-group">
                    <label>
                      <input <?php if($config['is_partner'] == 1){ ?> checked="" <?php } ?> type="checkbox" class="minimal" name="is_partner" id="is_partner" value="1" />
                      Đối tác
                    </label>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="admin_title">Hiển thị trên banner</div>
                <input type="hidden" name="cbs">
                <div class="form-group">
                    <label>
                      <input <?php if($config['is_login'] == 1){ ?> checked="" <?php } ?> type="checkbox" class="minimal" name="is_login" id="is_login" value="1" />
                      Đăng ký - Đăng nhập
                    </label>
                </div>
                <div class="form-group">
                    <label>
                      <input <?php if($config['is_cart'] == 1){ ?> checked="" <?php } ?> type="checkbox" class="minimal" name="is_cart" id="is_cart" value="1" />
                      Đặt hàng
                    </label>
                </div>
                <div class="form-group">
                    <label>
                      <input <?php if($config['is_check_cart'] == 1){ ?> checked="" <?php } ?> type="checkbox" class="minimal" name="is_check_cart" id="is_check_cart" value="1" />
                      Kiểm tra đơn hàng
                    </label>
                </div>
                <div class="form-group">
                    <label>
                      <input <?php if($config['is_search_auto'] == 1){ ?> checked="" <?php } ?> type="checkbox" class="minimal" name="is_search_auto" id="is_search_auto" value="1" />
                      Tìm kiếm Autocomplete
                    </label>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="admin_title">Hiển thị trên slide</div>
                <div class="form-group">
                    <label>
                      <input <?php if($config['is_menu_thuongmai'] == 1){ ?> checked="" <?php } ?> type="checkbox" class="minimal" name="is_menu_thuongmai" id="is_menu_thuongmai" value="1" />
                      Menu thương mại
                    </label>
                </div>
                <div class="form-group">
                    <label>Kích thước Slide: </label>
                    <div class="clear"></div>
                    <label>
                      <input <?php if($config['choose_width_slide'] == 1){ ?> checked="" <?php } ?> type="radio" name="choose_width_slide" class="minimal" value="1" checked />
                      Full
                    </label>
                    <div class="clear"></div>
                    <label>
                      <input <?php if($config['choose_width_slide'] == 2){ ?> checked="" <?php } ?> type="radio" name="choose_width_slide" class="minimal" value="2" />
                      Custom
                    </label>
                    <div class="input-group col-xs-9">
                        <div class="input-group-addon">Col</div>
                        <input type="text" class="form-control" id="col_slide" name="col_slide" value="<?php echo isset($config['col_slide'])?$config['col_slide']:12;?>">
                        <div class="input-group-addon">px</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Kích thước Img Slide: </label>
                    <div class="clear"></div>
                    <label>
                      <input <?php if($config['width_slide_img'] == 1){ ?> checked="" <?php } ?> type="radio" name="width_slide_img" class="minimal" value="1" checked />
                      100%
                    </label>
                    <div class="clear"></div>
                    <label>
                      <input <?php if($config['width_slide_img'] == 2){ ?> checked="" <?php } ?> type="radio" name="width_slide_img" class="minimal" value="2" />
                      Auto
                    </label>
                </div>
                
            </div>

            <div class="col-xs-3">
                <div class="admin_title">Hiển thị trên Menu</div>
                <div class="form-group">
                    <label>Kích thước Img Slide: </label>
                    <div class="clear"></div>
                    <label>
                      <input <?php if($config['choose_width_menu'] == 1){ ?> checked="" <?php } ?> type="radio" name="choose_width_menu" class="minimal" value="1" checked />
                      100%
                    </label>
                    <div class="clear"></div>
                    <label>
                      <input <?php if($config['choose_width_menu'] == 2){ ?> checked="" <?php } ?> type="radio" name="choose_width_menu" class="minimal" value="2" />
                      Hiển thị trên banner
                    </label>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-xs-3">
                <div class="admin_title">Hiển thị trên Footer</div>
                <input type="hidden" name="cbs">
                <div class="form-group">
                    <label>
                      <input <?php if($config['is_type_footer'] == 1){ ?> checked="" <?php } ?> type="checkbox" class="minimal" name="is_type_footer" id="is_type_footer" value="1" />
                      Danh mục
                    </label>
                </div>
                <div class="form-group">
                    <label>
                      <input <?php if($config['is_key_footer'] == 1){ ?> checked="" <?php } ?> type="checkbox" class="minimal" name="is_key_footer" id="is_key_footer" value="1" />
                      Từ khóa
                    </label>
                </div>
            </div>
        
        </div><!-- /.box-body -->
        <div class="clear"></div>
        <div class="box-footer">
            <button class="btn btn-success btn-flat"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</button>
        </div>
        </form>
      </div>
    </div>
    </form>
</div>