<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3> 
            </div>
            <!-- /.box-header -->
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
                    <a type="button" class="btn btn-success btn-flat btn_sent"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Gửi mail</a>
                    <a href="admin/mail/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="mail" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">Mail</th> 
                            <th class="div_center">Giới tính</th>
                            <th class="div_center">Tin yêu cầu</th> 
                            <th class="div_center">Ngày gửi</th>
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($mail) && $mail!=NULL){ ?>
                            <?php foreach($mail as $key => $val){ 
                              if($val['sex'] == 0){
                                $sex = 'Nam';
                              }else{
                                $sex = 'Nữ';
                              }
                            ?>
                            <tr> 
                              <input name="list_mailid" id="list_mailid" value="" type="hidden">
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td><a href="admin/mail/edit/<?php echo $val['id']?>"><?php echo $val['mail'];?></a></td>
                              <td><?php echo $sex;?></td>
                              <td><?php if(isset($val['ar_type']) && $val['ar_type'] != NULL){ ?>
                                <?php foreach ($val['ar_type'] as $key_type => $val_type) { 
                                    if($val_type == 0){
                                      $txt_type = 'Cập nhật ưu đãi chung';
                                    }
                                    if($val_type == 1){
                                      $txt_type = 'Bản tin Sách - Văn phòng phẩm';
                                    }
                                    if($val_type == 2){
                                      $txt_type = 'Bản tin Điện tử (Điện thoại - Tablet, Tivi, Thiết bị số, Điện lạnh)';
                                    }
                                ?>
                                  <p>- <?php echo $txt_type;?></p>
                                <?php } ?>
                              <?php } ?></td>
                              <td><?php echo $val['created'];?></td>
                              <td class="div_center tool">
                                <a href="admin/mail/edit/<?php echo $val['id']?>"><i class="fa fa-edit"></i></a>
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="mail"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                    </tbody>
                </table>
                <?php echo isset($list_pagination)?$list_pagination:''; ?>
                <div class="mailbox-controls div_float_right">
                    <a href="admin/mail/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="mail" id="del-all-mail" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                </div>
            </div>
        </div>
    </div>
</div>