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
                <div class="col-md-3">
                <div class="row">
                  <div class="input-group">
                      <input type="text" class="form-control" id="search" name="search" control="district">
                      <div class="input-group-addon"><i class="fa fa-search"></i></div>
                  </div>
                </div>
                </div>
                <div class="col-md-3"><div class="row">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                    <select class="form-control select2" name="typeid" id="typeid" control="district">
                      <option value="">Chọn tỉnh/thành</option>
                      <?php if(isset($city) && !is_null($city)){ ?>
                      <?php foreach ($city as $key_city => $val_city) { ?>
                            <option value="<?php echo $val_city['id'];?>"><?php echo $val_city['name'];?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>
                </div>
                </div></div>
                <div class="col-md-6 div_float_right">
                    <a href="admin/district/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="district" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                    <a control="district" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">Tên district</th>
                            <th class="div_center">Thuộc tỉnh/thành</th> 
                            <th class="div_center">Ngày cập nhật</th>
                            <th class="div_center">Sắp xếp</th>
                            <th class="div_center">Hiển thị</th> 
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="div_load">
                        <?php if(isset($district) && $district!=NULL){ ?>
                            <?php foreach($district as $key => $val){ ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td><a href="admin/district/edit/<?php echo $val['id']?>"><?php echo $val['name'];?></a></td>
                              <td><?php echo $val['city_name'];?></td>
                              <td><?php echo $val['created'];?></td>
                              <td class="div_center"><input class="sort div_center" name="sort" control="district" value="<?php echo $val['sort'];?>" id="sort" size="5" seq="<?php echo $val['id']?>"></td>
                              <td class="div_center publish"><a onClick="show(<?php echo $val['id']?>);" control="district" title="Hiển thị" class="div_hienthi<?php echo $val['id']?> div_hienthi" divid="div_hienthi<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['publish'] == 0){ ?>
                                  <i class="fa fa-check-circle"></i>
                                <?php }else{ ?>
                                  <i class="fa fa-circle"></i>
                                <?php } ?></a>
                              </td>
                              <td class="div_center tool">
                                <a href="admin/district/edit/<?php echo $val['id']?>"><i class="fa fa-edit"></i></a>
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="district"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                    </tbody>
                </table>
                <?php echo isset($list_pagination)?$list_pagination:''; ?>
                <div class="mailbox-controls div_float_right">
                    <a href="admin/district/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="district" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                    <a control="district" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
                </div>
            </div>
        </div>
    </div>
</div>