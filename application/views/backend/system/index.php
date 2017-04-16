<div class="row" ng-app="myApp">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cấu hình site</h3>
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
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#system" aria-controls="system" role="tab" data-toggle="tab"><i class="fa fa-cog"></i> <strong>Thông tin chung</strong></a></li>
            <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab"><i class="fa fa-phone-square"></i> <strong>Thông tin liên hệ</strong></a></li>
            
        </ul>
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="system">
        <div class="col-md-6">
          <div class="box-body">
            <div class="form-group">
                <label class="control-label">Title</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="title" id="title" value="<?php if(isset($system['title']) && $system['title']!=''){ echo $system['title']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label>Meta keyword</label>
                <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"><?php if(isset($system['meta_keyword']) && $system['meta_keyword']!=''){ echo $system['meta_keyword']; }?></textarea>
            </div>
            <div class="form-group">
                <label>Meta description</label>
                <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php if(isset($system['meta_description']) && $system['meta_description']!=''){ echo $system['meta_description']; }?></textarea>
            </div>
            <div class="form-group">
                <label for="name">Favicon</label>
                <span class="btn btn-primary btn-file btn-sm">
                    Browse <input type="file" name="favicon" id="favicon">
                </span>
            </div>
            <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                    <div id="box_img_fv" class="div_avatar">
                        <?php if($system['favicon']!=''){ ?>
                            <img src="upload/system/<?php echo $system['favicon'];?>" alt="">
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label class="control-label">Google analytics</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input class="form-control" name="analytics" id="analytics" value="<?php if(isset($system['analytics']) && $system['analytics']!=''){ echo $system['analytics']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Google webmaster</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input class="form-control" name="webmaster" id="webmaster" value="<?php if(isset($system['webmaster']) && $system['webmaster']!=''){ echo $system['webmaster']; }?>">
                </div>
            </div>
            <strong style="background:#F00;color:#FFF;padding:2px 10px;margin-bottom:10px;">Background website</strong>
            <div class="clear" style="height:10px;"></div>
            <div class="form-group">
                <label class="control-label">Menu top</label>
                <div class="input-group my-colorpicker2">
                    <div class="input-group-addon"><i></i></div>
                    <input class="form-control" name="color_menutop" id="color_menutop" value="<?php echo $system['color_menutop'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Menu bottom</label>
                <div class="input-group my-colorpicker2">
                    <div class="input-group-addon"><i></i></div>
                    <input class="form-control" name="color_menubottom" id="color_menubottom" value="<?php echo $system['color_menubottom'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Title</label>
                <div class="input-group my-colorpicker2">
                    <div class="input-group-addon"><i></i></div>
                    <input class="form-control" name="color_title" id="color_title" value="<?php echo $system['color_title'];?>">
                </div>
            </div>
          </div><!-- /.box-body -->
        </div>
        <div class="col-md-6">
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Email nhận thông tin</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                        <input class="form-control" name="email_to" id="email_to" value="<?php if(isset($system['email_to']) && $system['email_to']!=''){ echo $system['email_to']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Host mail</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="hostmail" id="hostmail" value="<?php if(isset($system['hostmail']) && $system['hostmail']!=''){ echo $system['hostmail']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Tên người gửi</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="fullname" id="fullname" value="<?php if(isset($system['fullname']) && $system['fullname']!=''){ echo $system['fullname']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Hostmail user</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="usermail" id="usermail" value="<?php if(isset($system['usermail']) && $system['usermail']!=''){ echo $system['usermail']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Hostmail pass</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" type="password" name="passmail" id="passmail" value="<?php if(isset($system['passmail']) && $system['passmail']!=''){ echo $system['passmail']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                          <input <?php if(isset($system['status']) && $system['status'] == 1){ ?> checked <?php } ?> type="checkbox" name="status" id="status" value="1">
                          Đóng website
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Nội dung</label>
                    <textarea class="form-control" rows="4" name="content" id="content"><?php if(isset($system['content']) && $system['content']!=''){ echo $system['content']; }?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Fancy Facebook</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="fancyfacebook" id="fancyfacebook" value="<?php if(isset($system['fancyfacebook']) && $system['fancyfacebook']!=''){ echo $system['fancyfacebook']; }?>">
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="contact">
            <div class="col-md-6">
              <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Tên công ty</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input type="text" class="form-control" name="company" id="company" value="<?php if(isset($contact['company']) && $contact['company']!=''){ echo $contact['company']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Điện thoại</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php if(isset($contact['phone']) && $contact['phone']!=''){ echo $contact['phone']; }?>">
                    </div>
                </div>
                <div class="col-md-6">
                <div class="row">
                <div class="form-group">
                    <label class="control-label">Tọa độ</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                        <input type="text" class="form-control" name="coordinates" id="coordinates" value="<?php if(isset($contact['coordinates']) && $contact['coordinates']!=''){ echo $contact['coordinates']; }?>">
                    </div>
                </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="row">
                <div class="form-group">
                    <label class="control-label">Độ phóng to/nhỏ</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                        <input type="text" class="form-control" name="zoom" id="zoom" value="<?php if(isset($contact['zoom']) && $contact['zoom']!=''){ echo $contact['zoom']; }?>">
                    </div>
                </div>
                </div>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <textarea class="form-control" rows="4" name="address" id="address"><?php if(isset($contact['address']) && $contact['address']!=''){ echo $contact['address']; }?></textarea>
                </div>
                
              </div><!-- /.box-body -->
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="widget">
            mmm
        </div>
        </div>

        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/system/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
      </div>
    </div>
    </form>
</div>