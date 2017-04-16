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
                
                <div class="col-md-4 div_float_right"><div class="row">
                    <a control="comment" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                </div></div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">Người bình luận</th>
                            <th class="div_center">Người cảm ơn</th> 
                            <th class="div_center">Nội dung</th>
                            <th class="div_center">Ngày gửi</th>
                            <th class="div_center">Hiển thị</th>
                            <th class="div_center">Nâng cao</th>  
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="div_load">
                        <?php if(isset($comment) && $comment!=NULL){ ?>
                            <?php foreach($comment as $key => $val){ 
  
                            ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td width="140"><?php echo $val['user']['fullname'];?>
                              <div class="clear"></div>
                                (<a onclick="getReply(<?php echo $val['id']?>,'#div_load_cart');" class="ajax" style="font-size:12px;"><i class="fa fa-comments" aria-hidden="true"></i> <?php echo isset($val['count_reply'])?$val['count_reply']:0;?> trả lời</a>)
                              </td>
                              <td class="div_center" width="100"><a class="ajax"><?php echo isset($val['count_thanks'])?$val['count_thanks']:0;?> người</a></td>
                              <td><?php echo $val['content'];?></td>
                              <td width="140"><?php echo $val['created'];?></td>
                              <td class="div_center publish"><a onClick="show(<?php echo $val['id']?>);" control="comment" title="Hiển thị" class="div_hienthi<?php echo $val['id']?> div_hienthi" divid="div_hienthi<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['publish'] == 0){ ?>
                                   <span class="label label-danger">Active</span>
                                <?php }else{ ?>
                                  <span class="label label-success">Active</span>
                                <?php } ?></a>
                              </td>
                              <td class="div_center publish"><a onClick="showhuuich(<?php echo $val['id']?>);" control="comment" title="home" class="div_huuich<?php echo $val['id']?> div_huuich" divid="div_huuich<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_huuich'] == 0){ ?>
                                  <span class="label label-success">Hữu ích</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Hữu ích</span>
                                <?php } ?></a>
                              </td>
                              <td class="div_center tool">
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="comment"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo isset($list_pagination)?$list_pagination:''; ?>
            </div>
        </div>
    </div>
</div>
<div id="div_load_cart"></div>