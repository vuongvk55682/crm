<?php if(isset($product) && $product!=NULL){ ?>
                            <?php foreach($product as $key => $val){ ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td width="150"><a href="admin/product/edit/<?php echo $val['id']?>"><?php echo $val['name'];?></a>
                              <div class="clear"></div>
                              (<a style="color:#F00;" href="admin/product/khaosat/<?php echo $val['id']?>">Xem khảo sát</a>)
                              <div class="clear"></div>
                              <a style="color:#000;" href="admin/comment/index/<?php echo $val['id']?>"><i class="fa fa-comments" aria-hidden="true"></i> (<?php echo isset($val['number_cmmt'])?$val['number_cmmt']:0;?>) Bình luận</a>
                              <div class="clear"></div>
                              <a style="color:#000;" href="admin/product_album/index/<?php echo $val['id']?>"><i class="fa fa-image" aria-hidden="true"></i> (<?php echo isset($val['count_product_album'])?$val['count_product_album']:0;?>) Ảnh thực tế</a>
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