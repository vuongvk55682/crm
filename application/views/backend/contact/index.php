<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-bcontact">
                <h3 class="box-title"><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo isset($title)?$title:'';?></h3> 
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
                <div class="col-md-4">
                  <div class="row">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" name="search" control="contact">
                        <div class="input-group-addon"><i class="fa fa-search"></i></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 div_float_right"><div class="row">
                    <a control="contact" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                </div></div>
                <table id="example1" class="table table-bcontacted table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th> 
                            <th class="div_center">Khách hàng</th> 
                            <th class="div_center">Xem chi tiết</th> 
                            <th class="div_center">Email</th> 
                            <th class="div_center">Điện thoại</th>
                            <th class="div_center">Ngày gửi</th>
                            <th class="div_center">Trạng thái</th> 
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="div_load">
                        <?php if(isset($contact) && $contact!=NULL){ ?>
                            <?php foreach($contact as $key => $val){ ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td><?php echo $val['fullname'];?></td>
                              <td class="div_center"><a data-toggle="modal" data-target="#myContact<?php echo $key;?>" class="label label-success view_detail" id="<?php echo $val['id']?>" control="contact">Xem</a></td>
                              <td><?php echo $val['phone'];?></td>
                              <td><?php echo $val['email'];?></td>
                              <td><?php echo $val['created'];?></td>
                              <td class="div_center publish">
                                <?php if($val['status'] == 0){ ?>
                                   <span class="label label-danger">Mới</span>
                                <?php }else{ ?>
                                  <span class="label label-success">Đã xem</span>
                                <?php } ?>
                              </td>
                              <td class="div_center tool">
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="contact"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <div class="modal fade" id="myContact<?php echo $key;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h5 class="modal-title" id="myModalLabel"><i class="fa fa-file-text" aria-hidden="true"></i> Nội dung</h5>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $val['content'];?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo isset($list_pagination)?$list_pagination:''; ?>
            </div>
        </div>
    </div>
</div>

