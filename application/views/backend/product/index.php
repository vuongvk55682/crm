<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo isset($title)?$title:'';?></h3> 
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
                <div class="div_fixed clearfix">
                    <div class="col-md-3">
                    <div class="row">
                      <div class="input-group">
                          <input type="text" class="form-control" id="search" name="search" control="product">
                          <div class="input-group-addon"><i class="fa fa-search"></i></div>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-3"><div class="row">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                        <select class="form-control select2" name="typeid" id="typeid" control="product">
                          <option value="">Chọn danh mục</option>
                          
                          <?php if(isset($type) && !is_null($type)){ ?>
                          <?php foreach ($type as $key_type => $val_type) { ?>
                                <option value="<?php echo $val_type['id'];?>"><?php echo $val_type['name'];?></option>
                                <?php if(isset($val_type['type_child']) && !is_null($val_type['type_child'])){ ?>
                                <?php foreach ($val_type['type_child'] as $key_type_child => $val_type_child) { ?>
                                    <option value="<?php echo $val_type_child['id'];?>">1---- <?php echo $val_type_child['name'];?></option>
                                        <?php if(isset($val_type_child['child_3']) && !is_null($val_type_child['child_3'])){ ?>
                                        <?php foreach ($val_type_child['child_3'] as $key_type_child3 => $val_type_child3) { ?>
                                            <option value="<?php echo $val_type_child3['id'];?>">----2---- <?php echo $val_type_child3['name'];?></option>
                                            <?php if(isset($val_type_child3['child_4']) && !is_null($val_type_child3['child_4'])){ ?>
                                                <?php foreach ($val_type_child3['child_4'] as $key_type_child4 => $val_type_child4) { ?>
                                                    <option value="<?php echo $val_type_child4['id'];?>">--------3---- <?php echo $val_type_child4['name'];?></option>
                                                    <?php if(isset($val_type_child4['child_5']) && !is_null($val_type_child4['child_5'])){ ?>
                                                        <?php foreach ($val_type_child4['child_5'] as $key_type_child5 => $val_type_child5) { ?>
                                                            <option value="<?php echo $val_type_child5['id'];?>">------------4---- <?php echo $val_type_child5['name'];?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                <?php } ?>
                                <?php } ?>
                          <?php } ?>
                          <?php } ?>
                        </select>
                    </div>
                    </div></div>
                    <div class="col-md-6 div_float_right">
                    <div class="row">
                        <!-- <a href="admin/product/exportexcel" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Export</a>
                        <a href="admin/product/importexcel" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Import</a> 
                        <a href="admin/product/curl" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span> Rút tin</a>-->
                        <a href="admin/product/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                        <a control="product" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                        <a control="product" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
                    </div>
                    </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">Tên</th>
                            <th class="div_center">Danh mục</th>
                            <th class="div_center">Hình ảnh</th>
                            <th class="div_center">Giá</th> 
                            <th class="div_center">Lượt xem</th> 
                            <th class="div_center">Top bán chạy</th>
                            <th class="div_center">Ngày cập nhật</th>
                            <th class="div_center">Hiển thị</th>
                            <th class="div_center">Nâng cao</th> 
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="div_load">
                        <?php if(isset($product) && $product!=NULL){ ?>
                            <?php foreach($product as $key => $val){ ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td width="150"><a href="admin/product/edit/<?php echo $val['id']?>"><?php echo $val['name'];?></a>
                              
                              </td>
                              <td>
                                <select style="width:200px;" onChange="changType(<?php echo $val['id'];?>)" name="parentid" id="parentid" control="product" class="parentid<?php echo $val['id'];?>">
                                    <option value="">Chọn danh mục</option>
                                    <?php if(isset($type) && !is_null($type)){ ?>
                                    <?php foreach ($type as $key_type => $val_type) { ?>
                                          <option value="<?php echo $val_type['id'];?>" <?php if($val_type['id'] == $val['typeid']){ ?> selected <?php } ?>><?php echo $val_type['name'];?></option>
                                          <?php if(isset($val_type['type_child']) && !is_null($val_type['type_child'])){ ?>
                                          <?php foreach ($val_type['type_child'] as $key_type_child => $val_type_child) { ?>
                                              <option value="<?php echo $val_type_child['id'];?>" <?php if($val_type_child['id'] == $val['typeid']){ ?> selected <?php } ?>>1---- <?php echo $val_type_child['name'];?></option>
                                              <?php if(isset($val_type_child['child_3']) && !is_null($val_type_child['child_3'])){ ?>
                                                  <?php foreach ($val_type_child['child_3'] as $key_type_child3 => $val_type_child3) { ?>
                                                      <option value="<?php echo $val_type_child3['id'];?>" <?php if($val_type_child3['id'] == $val['typeid']){ ?> selected <?php } ?>>----2---- <?php echo $val_type_child3['name'];?></option>
                                                          <?php if(isset($val_type_child3['child_4']) && !is_null($val_type_child3['child_4'])){ ?>
                                                              <?php foreach ($val_type_child3['child_4'] as $key_type_child4 => $val_type_child4) { ?>
                                                                  <option value="<?php echo $val_type_child4['id'];?>" <?php if($val_type_child4['id'] == $val['typeid']){ ?> selected <?php } ?>>--------3---- <?php echo $val_type_child4['name'];?></option>
                                                                  <?php if(isset($val_type_child4['child_5']) && !is_null($val_type_child4['child_5'])){ ?>
                                                                      <?php foreach ($val_type_child4['child_5'] as $key_type_child5 => $val_type_child5) { ?>
                                                                          <option value="<?php echo $val_type_child5['id'];?>" <?php if($val_type_child5['id'] == $val['typeid']){ ?> selected <?php } ?>>------------4---- <?php echo $val_type_child5['name'];?></option>
                                                                      <?php } ?>
                                                                  <?php } ?>
                                                              <?php } ?>
                                                          <?php } ?>
                                                  <?php } ?>
                                                  <?php } ?>
                                          <?php } ?>
                                          <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                              </td>
                              <td class="div_center"><?php if($val['image_thumb']!=''){ ?> <img src="upload/product/thumb/<?php echo $val['image_thumb'];?>" alt="" class="img_admin">
                              <?php }?></td>
                              <td class="div_tool_hover" width="130">
                              <?php if($val['price'] != 0){ ?>
                              Bán: <?php echo number_format($val['price']);?><sup>đ</sup>
                              <a class="i_modal" data-toggle="modal" data-target="#myPrice">
                                  <i class="fa fa-cog" aria-hidden="true"></i>
                              </a>
                              <div class="modal fade" id="myPrice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                <form action="admin/product/change_price" method="post" id="frm-price">
                                    <div class="modal-content">
                                        <div class="modal-body clearfix">
                                        <div class="col-md-9">
                                            <div class="form-group" style="margin-bottom: 0px;">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-dollar" aria-hidden="true"></i></div>
                                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $val['id'];?>">
                                                    <input onkeyup="return FormatNumber(this);" type="text" class="form-control" name="price" id="price" value="<?php echo number_format($val['price']);?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="row">
                                            <a data-dismiss="modal" class="btn btn-success btn-flat"><i class="fa fa-times"></i> Đóng</a>
                                            <button type="button" class="btn btn-success btn-flat edit_price"><i class="fa fa-unlock-alt"></i> Lưu</button>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                              </div>
                              <?php } ?>
                              <div class="clear"></div>
                              <?php if($val['price_sale'] != 0){ ?>
                              KM: <?php echo number_format($val['price_sale']);?><sup>đ</sup>
                              <a class="i_modal" data-toggle="modal" data-target="#myPricesale">
                                  <i class="fa fa-cog" aria-hidden="true"></i>
                              </a>
                              <div class="modal fade" id="myPricesale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                <form action="admin/product/change_pricesale" method="post" id="frm-pricesale">
                                    <div class="modal-content">
                                        <div class="modal-body clearfix">
                                        <div class="col-md-9">
                                            <div class="form-group" style="margin-bottom: 0px;">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-dollar" aria-hidden="true"></i></div>
                                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $val['id'];?>">
                                                    <input onkeyup="return FormatNumber(this);" type="text" class="form-control" name="price_sale" id="price_sale" value="<?php echo number_format($val['price_sale']);?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="row">
                                            <a data-dismiss="modal" class="btn btn-success btn-flat"><i class="fa fa-times"></i> Đóng</a>
                                            <button type="button" class="btn btn-success btn-flat edit_pricesale"><i class="fa fa-unlock-alt"></i> Lưu</button>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                              </div>
                              <?php } ?>
                              </td>
                              <td class="div_center"><?php echo isset($val['is_view'])?$val['is_view']:0;?></td>
                              <td class="div_center"><input onchange="banchay(this,'dev_product',<?php echo $val['id']?>);" class="banchay div_center" name="banchay"  value="<?php echo $val['banchay'];?>" id="banchay" size="5"></td>
                              <td><?php echo $val['created'];?></td>
                              <td class="div_center publish"><a onClick="show(<?php echo $val['id']?>);" control="product" title="Hiển thị" class="div_hienthi<?php echo $val['id']?> div_hienthi" divid="div_hienthi<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['publish'] == 0){ ?>
                                  <i class="fa fa-check-circle"></i>
                                <?php }else{ ?>
                                  <i class="fa fa-circle"></i>
                                <?php } ?></a>
                              </td>
                              <td class="div_center publish"><a onClick="showhot(<?php echo $val['id']?>);" control="product" title="home" class="div_hot<?php echo $val['id']?> div_hot" divid="div_hot<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_hot'] == 0){ ?>
                                  <span class="label label-success">Nổi bật</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Nổi bật</span>
                                <?php } ?></a>
                                
                                <a onClick="shownew(<?php echo $val['id']?>);" control="product" title="home" class="div_new<?php echo $val['id']?> div_new" divid="div_new<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_new'] == 0){ ?>
                                  <span class="label label-success">Mới</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Mới</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showslider(<?php echo $val['id']?>);" control="product" title="home" class="div_slider<?php echo $val['id']?> div_slider" divid="div_slider<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_slider'] == 0){ ?>
                                  <span class="label label-success">Slider</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Slider</span>
                                <?php } ?></a>
                                
                                <a onClick="showleft(<?php echo $val['id']?>);" control="product" title="home" class="div_left<?php echo $val['id']?> div_left" divid="div_left<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_left'] == 0){ ?>
                                  <span class="label label-success">Phải</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Phải</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showsale(<?php echo $val['id']?>);" control="product" title="home" class="div_sale<?php echo $val['id']?> div_sale" divid="div_sale<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_sale'] == 0){ ?>
                                  <span class="label label-success">Khuyến mãi</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Khuyến mãi</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showbanchay(<?php echo $val['id']?>);" control="product" title="home" class="div_banchay<?php echo $val['id']?> div_banchay" divid="div_banchay<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_banchay'] == 0){ ?>
                                  <span class="label label-success">Bán chạy</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Bán chạy</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showchoose(<?php echo $val['id']?>);" control="product" title="home" class="div_choose<?php echo $val['id']?> div_choose" divid="div_choose<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_choose'] == 0){ ?>
                                  <span class="label label-success">Chọn lọc</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Chọn lọc</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                              </td>
                              <td class="div_center tool">
                                <a href="admin/product/edit/<?php echo $val['id']?>"><i class="fa fa-edit"></i></a>
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="product"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="col-md-6 div_footer">
                <div class="row">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing <?php echo $count_item['sum_first'];?> to <?php echo $count_item['sum_end'];?> of <?php echo $count_item['sum'];?> entries</div>
                </div>
                </div>
                <div class="col-md-6 div_float_right div_footer">
                <div class="row">
                    <?php echo isset($list_pagination)?$list_pagination:''; ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

