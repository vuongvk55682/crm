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
                <div class="col-md-4">
                <div class="row">
                  <div class="input-group">
                      <input type="text" class="form-control" id="search" name="search" control="news">
                      <div class="input-group-addon"><i class="fa fa-search"></i></div>
                  </div>
                </div>
                </div>
                <div class="col-md-6 div_float_right">
                <div class="row">
                    <a href="admin/news/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="news" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                    <a control="news" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
                </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">Tên</th>
                            <th class="div_center">Danh mục</th>
                            <th class="div_center">Hình ảnh</th> 
                            <th class="div_center">Lượt xem</th>
                            <th class="div_center">Ngày cập nhật</th>
                            <th class="div_center">Hiển thị</th>
                            <th class="div_center">Nâng cao</th> 
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="div_load">
                        <?php if(isset($news) && $news!=NULL){ ?>
                            <?php foreach($news as $key => $val){ ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td><a href="admin/news/edit/<?php echo $val['id']?>"><?php echo $val['name'];?></a></td>
                              <td><?php echo $val['type_name'];?></td>
                              <td class="div_center"><?php if($val['image_thumb']!=''){ ?> <img src="upload/news/thumb/<?php echo $val['image_thumb'];?>" alt="" class="img_admin">
                              <?php }?></td>
                              <td class="div_center"><?php echo isset($val['is_view'])?$val['is_view']:0;?></td>
                              <td><?php echo $val['created'];?></td>
                              <td class="div_center publish"><a onClick="show(<?php echo $val['id']?>);" control="news" title="Hiển thị" class="div_hienthi<?php echo $val['id']?> div_hienthi" divid="div_hienthi<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['publish'] == 0){ ?>
                                  <i class="fa fa-check-circle"></i>
                                <?php }else{ ?>
                                  <i class="fa fa-circle"></i>
                                <?php } ?></a>
                              </td>
                              <td class="div_center publish">
                              <a onClick="home(<?php echo $val['id']?>);" control="news" title="home" class="div_is_home<?php echo $val['id']?> div_is_home" divid="div_is_home<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_home'] == 0){ ?>
                                  <span class="label label-success">Trang chủ</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Trang chủ</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="hots(<?php echo $val['id']?>);" control="news" title="hot" class="div_is_hot<?php echo $val['id']?> div_is_hot" divid="div_is_hot<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_hot'] == 0){ ?>
                                  <span class="label label-success">Nổi bật</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Nổi bật</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                              </td>
                              <td class="div_center tool">
                                <a href="admin/news/edit/<?php echo $val['id']?>"><i class="fa fa-edit"></i></a>
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="news"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo isset($list_pagination)?$list_pagination:''; ?>
                <div class="col-md-6 div_float_right">
                <div class="row">
                    <a href="admin/news/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="news" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                    <a control="news" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

