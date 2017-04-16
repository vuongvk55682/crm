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
                      <input type="text" class="form-control" id="search" name="search" control="menu">
                      <div class="input-group-addon"><i class="fa fa-search"></i></div>
                  </div>
                </div>
                </div>
                <div class="col-md-3"><div class="row">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                    <select class="form-control select2" name="typeid" id="typeid" control="menu">
                      <option value="">Chọn danh mục</option>
                      <?php if(isset($menu) && !is_null($menu)){ ?>
                      <?php foreach ($menu as $key_menu => $val_menu) { ?>
                            <option value="<?php echo $val_menu['id'];?>"><?php echo $val_menu['name'];?></option>
                            <?php if(isset($val_menu['child_2']) && !is_null($val_menu['child_2'])){ ?>
                            <?php foreach ($val_menu['child_2'] as $key_child_2 => $val_child_2) { ?>
                                <option value="<?php echo $val_child_2['id'];?>">+ <?php echo $val_child_2['name'];?></option>
                            <?php } ?>
                            <?php } ?>
                      <?php } ?>
                      <?php } ?>
                    </select>
                </div>
                </div></div>
                <div class="col-md-6 div_float_right">
                <div class="row">
                    <a href="admin/menu/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="menu" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                    <a control="menu" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
                </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center"><input type="checkbox" class="check-all"></th>
                            <th class="div_center">Tên</th>
                            <th class="div_center">Danh mục</th> 
                            <th class="div_center">Icon</th>
                            <th class="div_center">Hình quảng cáo</th> 
                            <th class="div_center">Ngày cập nhật</th>
                            <th class="div_center">Sắp xếp</th>
                            <th class="div_center">Hiển thị</th>
                            <th class="div_center">Hiển thị nâng cao</th> 
                            <th class="div_center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="div_load">
                        <?php if(isset($menu) && $menu!=NULL){ ?>
                        <?php foreach($menu as $key => $val){ ?>
                        <tr> 
                          <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                          <td><a href="admin/menu/edit/<?php echo $val['id']?>"><small class="label pull-left bg-red">1</small> <?php echo $val['name'];?></a></td>
                          <td>
                              <div class="col-xs-12">
                              <div></div>
                              <div class="form-group" style="margin-bottom:0px;">
                                  <select class="select-search parentid parentid<?php echo $val['id']?>" control="menu" onChange="changeparent(<?php echo $val['id']?>);" name="parentid" id="parentid" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="0">Gốc</option>
                                    <?php if(isset($menu) && !is_null($menu)){ ?>
                                    <?php foreach ($menu as $key_menu => $val_menu) { ?>
                                          <option value="<?php echo $val_menu['id'];?>" <?php if($val_menu['id'] == $val['parentid']){ ?> selected <?php } ?>>+ <?php echo $val_menu['name'];?></option>
                                          <?php if(isset($val_menu['child_2']) && !is_null($val_menu['child_2'])){ ?>
                                          <?php foreach ($val_menu['child_2'] as $key_menu_child2 => $val_menu_child2) { ?>
                                                <option value="<?php echo $val_menu_child2['id'];?>" <?php if($val_menu_child2['id'] == $val['parentid']){ ?> selected <?php } ?>>-- <?php echo $val_menu_child2['name'];?></option>
                                          <?php } ?>
                                          <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                  </select>
                              </div></div>
                          </td>
                          <td class="div_center"><?php if($val['image']!=''){ ?> <img src="upload/menu/<?php echo $val['image'];?>" alt="" class="img_admin_menu"><?php }?></td>
                          <td class="div_center"><?php if($val['image_qc']!=''){ ?> <img src="upload/menu/<?php echo $val['image_qc'];?>" style="width:100px" alt="" class="img_admin"><?php }?></td>
                          <td><?php echo $val['created'];?></td>
                          <td class="div_center"><input class="sort div_center" name="sort" control="menu" value="<?php echo isset($val['sort'])?$val['sort']:'';?>" id="sort" size="5" seq="<?php echo $val['id']?>"></td>
                          <td class="div_center publish"><a onClick="show(<?php echo $val['id']?>);" control="menu" title="Hiển thị" class="div_hienthi<?php echo $val['id']?> div_hienthi" divid="div_hienthi<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                            <?php if($val['publish'] == 0){ ?>
                              <i class="fa fa-check-circle"></i>
                            <?php }else{ ?>
                              <i class="fa fa-circle"></i>
                            <?php } ?></a>
                          </td>
                          <td class="div_center publish">
                              <a onClick="showhome(<?php echo $val['id']?>);" control="menu" title="home" class="div_home<?php echo $val['id']?> div_home" divid="div_home<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_home'] == 0){ ?>
                                  <span class="label label-success">Trang chủ</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Trang chủ</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showmenu(<?php echo $val['id']?>);" control="menu" title="menu" class="div_menu<?php echo $val['id']?> div_menu" divid="div_menu<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_menu'] == 0){ ?>
                                  <span class="label label-success">Menu top</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Menu top</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showleft(<?php echo $val['id']?>);" control="menu" title="left" class="div_left<?php echo $val['id']?> div_left" divid="div_left<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_left'] == 0){ ?>
                                  <span class="label label-success">Left</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Left</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showtop(<?php echo $val['id']?>);" control="menu" title="top" class="div_top<?php echo $val['id']?> div_top" divid="div_top<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_top'] == 0){ ?>
                                  <span class="label label-success">Top</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Top</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showfooter(<?php echo $val['id']?>);" control="menu" title="footer" class="div_footer<?php echo $val['id']?> div_footer" divid="div_footer<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_footer'] == 0){ ?>
                                  <span class="label label-success">Footer</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Footer</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showbanner(<?php echo $val['id']?>);" control="menu" title="banner" class="div_banner<?php echo $val['id']?> div_banner" divid="div_banner<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_banner'] == 0){ ?>
                                  <span class="label label-success">Banner</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Banner</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                                <a onClick="showhomechild(<?php echo $val['id']?>);" control="menu" title="homechild" class="div_homechild<?php echo $val['id']?> div_homechild" divid="div_homechild<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['is_homechild'] == 0){ ?>
                                  <span class="label label-success">Trang chủ mục con</span>
                                <?php }else{ ?>
                                  <span class="label label-danger">Trang chủ mục con</span>
                                <?php } ?></a>
                                <div class="clear"></div>
                          </td>
                          <td class="div_center tool">
                            <a href="admin/menu/edit/<?php echo $val['id']?>"><i class="fa fa-edit"></i></a>
                            <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" class="delete" seq="<?php echo $val['id']?>" control="menu"><i class="fa fa-trash"></i></a>
                            
                          </td>
                        </tr>
                            <?php if(isset($val['child_2']) && !is_null($val['child_2'])){ ?>
                                <?php foreach ($val['child_2'] as $key_child2 => $val_child2) { ?>
                                    <tr>
                                      <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val_child2['id']?>"></td>
                                      <td><a href="admin/menu/edit/<?php echo $val_child2['id']?>"><small class="label pull-left bg-yellow">2</small> <?php echo $val_child2['name'];?></a></td>
                                      <td><div class="col-xs-12">
                                          <div class="form-group" style="margin-bottom:0px;">
                                              <select <select class="select-search parentid parentid<?php echo $val_child2['id']?>" control="menu" onChange="changeparent(<?php echo $val_child2['id']?>);" name="parentid" id="parentid"  style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="0">Gốc</option>
                                                <?php if(isset($menu) && !is_null($menu)){ ?>
                                                <?php foreach ($menu as $key_menu => $val_menu) { ?>
                                                      <option value="<?php echo $val_menu['id'];?>" <?php if($val_menu['id'] == $val_child2['parentid']){ ?> selected <?php } ?>><?php echo $val_menu['name'];?></option>
                                                      <?php if(isset($val_menu['child_2']) && !is_null($val_menu['child_2'])){ ?>
                                                      <?php foreach ($val_menu['child_2'] as $key_menu_child2 => $val_menu_child2) { ?>
                                                            <option value="<?php echo $val_menu_child2['id'];?>" <?php if($val_menu_child2['id'] == $val_child2['parentid']){ ?> selected <?php } ?>>-- <?php echo $val_menu_child2['name'];?></option>
                                                      <?php } ?>
                                                      <?php } ?>
                                                <?php } ?>
                                                <?php } ?>
                                              </select>
                                          </div></div>
                                      </td>
                                      <td class="div_center"><?php if($val_child2['image']!=''){ ?> <img src="upload/menu/<?php echo $val_child2['image'];?>" alt="" class="img_admin_menu"><?php }?></td>
                                      <td class="div_center"><?php if($val_child2['image_qc']!=''){ ?> <img src="upload/menu/<?php echo $val_child2['image_qc'];?>" style="width:100px"  alt="" class="img_admin"><?php }?></td>
                                      <td><?php echo $val_child2['created'];?></td>
                                      <td class="div_center"><input class="sort div_center" name="sort" control="menu" value="<?php echo isset($val_child2['sort'])?$val_child2['sort']:'';?>" id="sort" size="5" seq="<?php echo $val_child2['id']?>"></td>
                                      <td class="div_center publish"><a onClick="show(<?php echo $val_child2['id']?>);" control="menu" title="Hiển thị" class="div_hienthi<?php echo $val_child2['id']?> div_hienthi" divid="div_hienthi<?php echo $val_child2['id']?>" seq="<?php echo $val_child2['id']?>">
                                        <?php if($val_child2['publish'] == 0){ ?>
                                          <i class="fa fa-check-circle"></i>
                                        <?php }else{ ?>
                                          <i class="fa fa-circle"></i>
                                        <?php } ?></a>
                                      </td>
                                      <td class="publish div_center">
                                          <a onClick="showhome(<?php echo $val_child2['id']?>);" control="menu" title="home" class="div_home<?php echo $val_child2['id']?> div_home" divid="div_home<?php echo $val_child2['id']?>" seq="<?php echo $val_child2['id']?>">
                                          <?php if($val_child2['is_home'] == 0){ ?>
                                            <span class="label label-success">Trang chủ</span>
                                          <?php }else{ ?>
                                            <span class="label label-danger">Trang chủ</span>
                                          <?php } ?></a>
                                          <div class="clear"></div>
                                          <a onClick="showmenu(<?php echo $val_child2['id']?>);" control="menu" title="menu" class="div_menu<?php echo $val_child2['id']?> div_menu" divid="div_menu<?php echo $val_child2['id']?>" seq="<?php echo $val_child2['id']?>">
                                          <?php if($val_child2['is_menu'] == 0){ ?>
                                            <span class="label label-success">Menu top</span>
                                          <?php }else{ ?>
                                            <span class="label label-danger">Menu top</span>
                                          <?php } ?></a>
                                          <div class="clear"></div>
                                          <a onClick="showleft(<?php echo $val_child2['id']?>);" control="menu" title="left" class="div_left<?php echo $val_child2['id']?> div_left" divid="div_left<?php echo $val_child2['id']?>" seq="<?php echo $val_child2['id']?>">
                                          <?php if($val_child2['is_left'] == 0){ ?>
                                            <span class="label label-success">Left</span>
                                          <?php }else{ ?>
                                            <span class="label label-danger">Left</span>
                                          <?php } ?></a>
                                          <div class="clear"></div>
                                          <a onClick="showtop(<?php echo $val_child2['id']?>);" control="menu" title="top" class="div_top<?php echo $val_child2['id']?> div_top" divid="div_top<?php echo $val_child2['id']?>" seq="<?php echo $val_child2['id']?>">
                                          <?php if($val_child2['is_top'] == 0){ ?>
                                            <span class="label label-success">Top</span>
                                          <?php }else{ ?>
                                            <span class="label label-danger">Top</span>
                                          <?php } ?></a>
                                          <div class="clear"></div>
                                          <a onClick="showfooter(<?php echo $val_child2['id']?>);" control="menu" title="footer" class="div_footer<?php echo $val_child2['id']?> div_footer" divid="div_footer<?php echo $val_child2['id']?>" seq="<?php echo $val_child2['id']?>">
                                          <?php if($val_child2['is_footer'] == 0){ ?>
                                            <span class="label label-success">Footer</span>
                                          <?php }else{ ?>
                                            <span class="label label-danger">Footer</span>
                                          <?php } ?></a>
                                          <div class="clear"></div>
                                          <a onClick="showbanner(<?php echo $val_child2['id']?>);" control="menu" title="banner" class="div_banner<?php echo $val_child2['id']?> div_banner" divid="div_banner<?php echo $val_child2['id']?>" seq="<?php echo $val_child2['id']?>">
                                          <?php if($val_child2['is_banner'] == 0){ ?>
                                            <span class="label label-success">Banner</span>
                                          <?php }else{ ?>
                                            <span class="label label-danger">Banner</span>
                                          <?php } ?></a>
                                          <div class="clear"></div>
                                          <a onClick="showhomechild(<?php echo $val_child2['id']?>);" control="menu" title="homechild" class="div_homechild<?php echo $val_child2['id']?> div_homechild" divid="div_homechild<?php echo $val_child2['id']?>" seq="<?php echo $val_child2['id']?>">
                                          <?php if($val_child2['is_homechild'] == 0){ ?>
                                            <span class="label label-success">Trang chủ mục con</span>
                                          <?php }else{ ?>
                                            <span class="label label-danger">Trang chủ mục con</span>
                                          <?php } ?></a>
                                          <div class="clear"></div>
                                      </td>
                                      <td class="div_center tool">
                                        <a href="admin/menu/edit/<?php echo $val_child2['id']?>"><i class="fa fa-edit"></i></a>
                                        <a onClick="del(<?php echo $val_child2['id']?>);" class="delete delete<?php echo $val_child2['id']?>" seq="<?php echo $val_child2['id']?>" control="menu"><i class="fa fa-trash"></i></a>
                                        
                                      </td>
                                    </tr>
                                    <?php if(isset($val_child2['child_3']) && !is_null($val_child2['child_3'])){ ?>
                                        <?php foreach ($val_child2['child_3'] as $key_child3 => $val_child3) { ?>
                                            <tr>
                                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val_child3['id']?>"></td>
                                              <td><a href="admin/menu/edit/<?php echo $val_child3['id']?>"><small class="label pull-left bg-green">3</small> <?php echo $val_child3['name'];?></a></td>
                                              <td><div class="col-xs-12">
                                                  <div class="form-group" style="margin-bottom:0px;">
                                                      <select class="select-search parentid" name="parentid" id="parentid" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                        <option value="0">Gốc</option>
                                                        <?php if(isset($menu) && !is_null($menu)){ ?>
                                                        <?php foreach ($menu as $key_menu => $val_menu) { ?>
                                                              <option value="<?php echo $val_menu['id'];?>" <?php if($val_menu['id'] == $val_child3['parentid']){ ?> selected <?php } ?>><?php echo $val_menu['name'];?></option>
                                                              <?php if(isset($val_menu['child_2']) && !is_null($val_menu['child_2'])){ ?>
                                                                <?php foreach ($val_menu['child_2'] as $key_menu_child2 => $val_menu_child2) { ?>
                                                                      <option value="<?php echo $val_menu_child2['id'];?>" <?php if($val_menu_child2['id'] == $val_child3['parentid']){ ?> selected <?php } ?>>-- <?php echo $val_menu_child2['name'];?></option>
                                                                <?php } ?>
                                                                <?php } ?>
                                                        <?php } ?>
                                                        <?php } ?>
                                                      </select>
                                                  </div></div>
                                              </td>
                                              <td class="div_center"><?php if($val_child3['image']!=''){ ?> <img src="upload/menu/<?php echo $val_child3['image'];?>" alt="" class="img_admin"><?php }?></td>
                                              <td class="div_center"><?php if($val_child3['image_qc']!=''){ ?> <img src="upload/menu/<?php echo $val_child3['image_qc'];?>" style="width:100px" alt="" class="img_admin"><?php }?></td>
                                              <td><?php echo $val_child3['created'];?></td>
                                              <td class="div_center"><input class="sort div_center" name="sort" control="menu" value="<?php echo isset($val_child3['sort'])?$val_child3['sort']:'';?>" id="sort" size="5" seq="<?php echo $val_child3['id']?>"></td>
                                              <td class="div_center publish"><a onClick="show(<?php echo $val_child3['id']?>);" control="menu" title="Hiển thị" class="div_hienthi<?php echo $val_child3['id']?> div_hienthi" divid="div_hienthi<?php echo $val_child3['id']?>" seq="<?php echo $val_child3['id']?>">
                                                <?php if($val_child3['publish'] == 0){ ?>
                                                  <i class="fa fa-check-circle"></i>
                                                <?php }else{ ?>
                                                  <i class="fa fa-circle"></i>
                                                <?php } ?></a>
                                              </td>
                                              <td class="publish div_center">
                                                  <a onClick="showhome(<?php echo $val_child3['id']?>);" control="menu" title="home" class="div_home<?php echo $val_child3['id']?> div_home" divid="div_home<?php echo $val_child3['id']?>" seq="<?php echo $val_child3['id']?>">
                                                  <?php if($val_child3['is_home'] == 0){ ?>
                                                    <span class="label label-success">Trang chủ</span>
                                                  <?php }else{ ?>
                                                    <span class="label label-danger">Trang chủ</span>
                                                  <?php } ?></a>
                                                  <div class="clear"></div>
                                                  <a onClick="showmenu(<?php echo $val_child3['id']?>);" control="menu" title="menu" class="div_menu<?php echo $val_child3['id']?> div_menu" divid="div_menu<?php echo $val_child3['id']?>" seq="<?php echo $val_child3['id']?>">
                                                  <?php if($val_child3['is_menu'] == 0){ ?>
                                                    <span class="label label-success">Menu top</span>
                                                  <?php }else{ ?>
                                                    <span class="label label-danger">Menu top</span>
                                                  <?php } ?></a>
                                                  <div class="clear"></div>
                                                  <a onClick="showleft(<?php echo $val_child3['id']?>);" control="menu" title="left" class="div_left<?php echo $val_child3['id']?> div_left" divid="div_left<?php echo $val_child3['id']?>" seq="<?php echo $val_child3['id']?>">
                                                  <?php if($val_child3['is_left'] == 0){ ?>
                                                    <span class="label label-success">Left</span>
                                                  <?php }else{ ?>
                                                    <span class="label label-danger">Left</span>
                                                  <?php } ?></a>
                                                  <div class="clear"></div>
                                                  <a onClick="showtop(<?php echo $val_child3['id']?>);" control="menu" title="top" class="div_top<?php echo $val_child3['id']?> div_top" divid="div_top<?php echo $val_child3['id']?>" seq="<?php echo $val_child3['id']?>">
                                                  <?php if($val_child3['is_top'] == 0){ ?>
                                                    <span class="label label-success">Top</span>
                                                  <?php }else{ ?>
                                                    <span class="label label-danger">Top</span>
                                                  <?php } ?></a>
                                                  <div class="clear"></div>
                                                  <a onClick="showfooter(<?php echo $val_child3['id']?>);" control="menu" title="footer" class="div_footer<?php echo $val_child3['id']?> div_footer" divid="div_footer<?php echo $val_child3['id']?>" seq="<?php echo $val_child3['id']?>">
                                                  <?php if($val_child3['is_footer'] == 0){ ?>
                                                    <span class="label label-success">Footer</span>
                                                  <?php }else{ ?>
                                                    <span class="label label-danger">Footer</span>
                                                  <?php } ?></a>
                                                  <div class="clear"></div>
                                                  <a onClick="showbanner(<?php echo $val_child3['id']?>);" control="menu" title="banner" class="div_banner<?php echo $val_child3['id']?> div_banner" divid="div_banner<?php echo $val_child3['id']?>" seq="<?php echo $val_child3['id']?>">
                                                  <?php if($val_child3['is_banner'] == 0){ ?>
                                                    <span class="label label-success">Banner</span>
                                                  <?php }else{ ?>
                                                    <span class="label label-danger">Banner</span>
                                                  <?php } ?></a>
                                                  <div class="clear"></div>
                                                  <a onClick="showhomechild(<?php echo $val_child3['id']?>);" control="menu" title="homechild" class="div_homechild<?php echo $val_child3['id']?> div_homechild" divid="div_homechild<?php echo $val_child3['id']?>" seq="<?php echo $val_child3['id']?>">
                                                  <?php if($val_child3['is_homechild'] == 0){ ?>
                                                    <span class="label label-success">Trang chủ mục con</span>
                                                  <?php }else{ ?>
                                                    <span class="label label-danger">Trang chủ mục con</span>
                                                  <?php } ?></a>
                                                  <div class="clear"></div>
                                              </td>
                                              <td class="div_center tool">
                                                <a href="admin/menu/edit/<?php echo $val_child3['id']?>"><i class="fa fa-edit"></i></a>
                                                <a onClick="del(<?php echo $val_child3['id']?>);" class="delete delete<?php echo $val_child3['id']?>" seq="<?php echo $val_child3['id']?>" control="menu"><i class="fa fa-trash"></i></a>
                                                
                                              </td>
                                            </tr>
                                            <?php if(isset($val_child3['child_4']) && !is_null($val_child3['child_4'])){ ?>
                                                <?php foreach ($val_child3['child_4'] as $key_child4 => $val_child4) { ?>
                                                    <tr>
                                                      <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val_child4['id']?>"></td>
                                                      <td><a href="admin/menu/edit/<?php echo $val_child4['id']?>"><small class="label pull-left bg-maroon">4</small> <?php echo $val_child4['name'];?></a></td>
                                                      <td><div class="col-xs-12">
                                                          <div class="form-group" style="margin-bottom:0px;">
                                                              <select class="select-search parentid" name="parentid" id="parentid" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                                <option value="0">Gốc</option>
                                                                <?php if(isset($menu) && !is_null($menu)){ ?>
                                                                <?php foreach ($menu as $key_menu => $val_menu) { ?>
                                                                      <option value="<?php echo $val_menu['id'];?>" <?php if($val_menu['id'] == $val_child4['parentid']){ ?> selected <?php } ?>><?php echo $val_menu['name'];?></option>
                                                                      <?php if(isset($val_menu['child_2']) && !is_null($val_menu['child_2'])){ ?>
                                                                        <?php foreach ($val_menu['child_2'] as $key_menu_child2 => $val_menu_child2) { ?>
                                                                              <option value="<?php echo $val_menu_child2['id'];?>" <?php if($val_menu_child2['id'] == $val_child4['parentid']){ ?> selected <?php } ?>>-- <?php echo $val_menu_child2['name'];?></option>
                                                                        <?php } ?>
                                                                        <?php } ?>
                                                                <?php } ?>
                                                                <?php } ?>
                                                              </select>
                                                          </div></div>
                                                      </td>
                                                      <td class="div_center"><?php if($val_child4['image']!=''){ ?> <img src="upload/menu/<?php echo $val_child4['image'];?>" alt="" class="img_admin"><?php }?></td>
                                                      <td class="div_center"><?php if($val_child4['image_qc']!=''){ ?> <img src="upload/menu/<?php echo $val_child4['image_qc'];?>" alt="" class="img_admin"><?php }?></td>
                                                      <td><?php echo $val_child4['created'];?></td>
                                                      <td class="div_center"><input class="sort div_center" name="sort" control="menu" value="<?php echo isset($val_child4['sort'])?$val_child4['sort']:'';?>" id="sort" size="5" seq="<?php echo $val_child4['id']?>"></td>
                                                      <td class="div_center publish"><a onClick="show(<?php echo $val_child4['id']?>);" control="menu" title="Hiển thị" class="div_hienthi<?php echo $val_child4['id']?> div_hienthi" divid="div_hienthi<?php echo $val_child4['id']?>" seq="<?php echo $val_child4['id']?>">
                                                        <?php if($val_child4['publish'] == 0){ ?>
                                                          <i class="fa fa-check-circle"></i>
                                                        <?php }else{ ?>
                                                          <i class="fa fa-circle"></i>
                                                        <?php } ?></a>
                                                      </td>
                                                      <td class="publish div_center">
                                                          <a onClick="showhome(<?php echo $val_child4['id']?>);" control="menu" title="home" class="div_home<?php echo $val_child4['id']?> div_home" divid="div_home<?php echo $val_child4['id']?>" seq="<?php echo $val_child4['id']?>">
                                                          <?php if($val_child4['is_home'] == 0){ ?>
                                                            <span class="label label-success">Trang chủ</span>
                                                          <?php }else{ ?>
                                                            <span class="label label-danger">Trang chủ</span>
                                                          <?php } ?></a>
                                                          <div class="clear"></div>
                                                          <a onClick="showmenu(<?php echo $val_child4['id']?>);" control="menu" title="menu" class="div_menu<?php echo $val_child4['id']?> div_menu" divid="div_menu<?php echo $val_child4['id']?>" seq="<?php echo $val_child4['id']?>">
                                                          <?php if($val_child4['is_menu'] == 0){ ?>
                                                            <span class="label label-success">Menu top</span>
                                                          <?php }else{ ?>
                                                            <span class="label label-danger">Menu top</span>
                                                          <?php } ?></a>
                                                          <div class="clear"></div>
                                                          <a onClick="showleft(<?php echo $val_child4['id']?>);" control="menu" title="left" class="div_left<?php echo $val_child4['id']?> div_left" divid="div_left<?php echo $val_child4['id']?>" seq="<?php echo $val_child4['id']?>">
                                                          <?php if($val_child4['is_left'] == 0){ ?>
                                                            <span class="label label-success">Left</span>
                                                          <?php }else{ ?>
                                                            <span class="label label-danger">Left</span>
                                                          <?php } ?></a>
                                                          <div class="clear"></div>
                                                          <a onClick="showtop(<?php echo $val_child4['id']?>);" control="menu" title="top" class="div_top<?php echo $val_child4['id']?> div_top" divid="div_top<?php echo $val_child4['id']?>" seq="<?php echo $val_child4['id']?>">
                                                          <?php if($val_child4['is_top'] == 0){ ?>
                                                            <span class="label label-success">Top</span>
                                                          <?php }else{ ?>
                                                            <span class="label label-danger">Top</span>
                                                          <?php } ?></a>
                                                          <div class="clear"></div>
                                                          <a onClick="showfooter(<?php echo $val_child4['id']?>);" control="menu" title="footer" class="div_footer<?php echo $val_child4['id']?> div_footer" divid="div_footer<?php echo $val_child4['id']?>" seq="<?php echo $val_child4['id']?>">
                                                          <?php if($val_child4['is_footer'] == 0){ ?>
                                                            <span class="label label-success">Footer</span>
                                                          <?php }else{ ?>
                                                            <span class="label label-danger">Footer</span>
                                                          <?php } ?></a>
                                                          <div class="clear"></div>
                                                          <a onClick="showbanner(<?php echo $val_child4['id']?>);" control="menu" title="banner" class="div_banner<?php echo $val_child4['id']?> div_banner" divid="div_banner<?php echo $val_child4['id']?>" seq="<?php echo $val_child4['id']?>">
                                                          <?php if($val_child4['is_banner'] == 0){ ?>
                                                            <span class="label label-success">Banner</span>
                                                          <?php }else{ ?>
                                                            <span class="label label-danger">Banner</span>
                                                          <?php } ?></a>
                                                          <div class="clear"></div>
                                                          <a onClick="showhomechild(<?php echo $val_child4['id']?>);" control="menu" title="homechild" class="div_homechild<?php echo $val_child4['id']?> div_homechild" divid="div_homechild<?php echo $val_child4['id']?>" seq="<?php echo $val_child4['id']?>">
                                                          <?php if($val_child4['is_homechild'] == 0){ ?>
                                                            <span class="label label-success">Trang chủ mục con</span>
                                                          <?php }else{ ?>
                                                            <span class="label label-danger">Trang chủ mục con</span>
                                                          <?php } ?></a>
                                                          <div class="clear"></div>
                                                      </td>
                                                      <td class="div_center tool">
                                                        <a href="admin/menu/edit/<?php echo $val_child4['id']?>"><i class="fa fa-edit"></i></a>
                                                        <a onClick="del(<?php echo $val_child4['id']?>);" class="delete delete<?php echo $val_child4['id']?>" seq="<?php echo $val_child4['id']?>" control="menu"><i class="fa fa-trash"></i></a>
                                                        
                                                      </td>
                                                    </tr>
                                                    <?php if(isset($val_child4['child_5']) && !is_null($val_child4['child_5'])){ ?>
                                                        <?php foreach ($val_child4['child_5'] as $key_child5 => $val_child5) { ?>
                                                            <tr>
                                                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val_child5['id']?>"></td>
                                                              <td><a href="admin/menu/edit/<?php echo $val_child5['id']?>"><small class="label pull-left bg-purple">5</small> <?php echo $val_child5['name'];?></a></td>
                                                              <td><div class="col-xs-12">
                                                                  <div class="form-group" style="margin-bottom:0px;">
                                                                      <select class="select-search parentid" name="parentid" id="parentid" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                                        <option value="0">Gốc</option>
                                                                        <?php if(isset($menu) && !is_null($menu)){ ?>
                                                                        <?php foreach ($menu as $key_menu => $val_menu) { ?>
                                                                              <option value="<?php echo $val_menu['id'];?>" <?php if($val_menu['id'] == $val_child5['parentid']){ ?> selected <?php } ?>><?php echo $val_menu['name'];?></option>
                                                                              <?php if(isset($val_menu['child_2']) && !is_null($val_menu['child_2'])){ ?>
                                                                                <?php foreach ($val_menu['child_2'] as $key_menu_child2 => $val_menu_child2) { ?>
                                                                                      <option value="<?php echo $val_menu_child2['id'];?>" <?php if($val_menu_child2['id'] == $val_child5['parentid']){ ?> selected <?php } ?>>-- <?php echo $val_menu_child2['name'];?></option>
                                                                                <?php } ?>
                                                                                <?php } ?>
                                                                        <?php } ?>
                                                                        <?php } ?>
                                                                      </select>
                                                                  </div></div>
                                                              </td>
                                                              <td class="div_center"><?php if($val_child5['image']!=''){ ?> <img src="upload/menu/<?php echo $val_child5['image'];?>" alt="" class="img_admin"><?php }?></td>
                                                              <td class="div_center"><?php if($val_child5['image_qc']!=''){ ?> <img src="upload/menu/<?php echo $val_child5['image_qc'];?>" alt="" class="img_admin"><?php }?></td>
                                                              <td><?php echo $val_child5['created'];?></td>
                                                              <td class="div_center"><input class="sort div_center" name="sort" control="menu" value="<?php echo isset($val_child5['sort'])?$val_child5['sort']:'';?>" id="sort" size="5" seq="<?php echo $val_child5['id']?>"></td>
                                                              <td class="div_center publish"><a onClick="show(<?php echo $val_child5['id']?>);" control="menu" title="Hiển thị" class="div_hienthi<?php echo $val_child5['id']?> div_hienthi" divid="div_hienthi<?php echo $val_child5['id']?>" seq="<?php echo $val_child5['id']?>">
                                                                <?php if($val_child5['publish'] == 0){ ?>
                                                                  <i class="fa fa-check-circle"></i>
                                                                <?php }else{ ?>
                                                                  <i class="fa fa-circle"></i>
                                                                <?php } ?></a>
                                                              </td>
                                                              <td class="publish div_center">
                                                                  <a onClick="showhome(<?php echo $val_child5['id']?>);" control="menu" title="home" class="div_home<?php echo $val_child5['id']?> div_home" divid="div_home<?php echo $val_child5['id']?>" seq="<?php echo $val_child5['id']?>">
                                                                  <?php if($val_child5['is_home'] == 0){ ?>
                                                                    <span class="label label-success">Trang chủ</span>
                                                                  <?php }else{ ?>
                                                                    <span class="label label-danger">Trang chủ</span>
                                                                  <?php } ?></a>
                                                                  <div class="clear"></div>
                                                                  <a onClick="showmenu(<?php echo $val_child5['id']?>);" control="menu" title="menu" class="div_menu<?php echo $val_child5['id']?> div_menu" divid="div_menu<?php echo $val_child5['id']?>" seq="<?php echo $val_child5['id']?>">
                                                                  <?php if($val_child5['is_menu'] == 0){ ?>
                                                                    <span class="label label-success">Menu top</span>
                                                                  <?php }else{ ?>
                                                                    <span class="label label-danger">Menu top</span>
                                                                  <?php } ?></a>
                                                                  <div class="clear"></div>
                                                                  <a onClick="showleft(<?php echo $val_child5['id']?>);" control="menu" title="left" class="div_left<?php echo $val_child5['id']?> div_left" divid="div_left<?php echo $val_child5['id']?>" seq="<?php echo $val_child5['id']?>">
                                                                  <?php if($val_child5['is_left'] == 0){ ?>
                                                                    <span class="label label-success">Left</span>
                                                                  <?php }else{ ?>
                                                                    <span class="label label-danger">Left</span>
                                                                  <?php } ?></a>
                                                                  <div class="clear"></div>
                                                                  <a onClick="showtop(<?php echo $val_child5['id']?>);" control="menu" title="top" class="div_top<?php echo $val_child5['id']?> div_top" divid="div_top<?php echo $val_child5['id']?>" seq="<?php echo $val_child5['id']?>">
                                                                  <?php if($val_child5['is_top'] == 0){ ?>
                                                                    <span class="label label-success">Top</span>
                                                                  <?php }else{ ?>
                                                                    <span class="label label-danger">Top</span>
                                                                  <?php } ?></a>
                                                                  <div class="clear"></div>
                                                                  <a onClick="showfooter(<?php echo $val_child5['id']?>);" control="menu" title="footer" class="div_footer<?php echo $val_child5['id']?> div_footer" divid="div_footer<?php echo $val_child5['id']?>" seq="<?php echo $val_child5['id']?>">
                                                                  <?php if($val_child5['is_footer'] == 0){ ?>
                                                                    <span class="label label-success">Footer</span>
                                                                  <?php }else{ ?>
                                                                    <span class="label label-danger">Footer</span>
                                                                  <?php } ?></a>
                                                                  <div class="clear"></div>
                                                                  <a onClick="showbanner(<?php echo $val_child5['id']?>);" control="menu" title="banner" class="div_banner<?php echo $val_child5['id']?> div_banner" divid="div_banner<?php echo $val_child5['id']?>" seq="<?php echo $val_child5['id']?>">
                                                                  <?php if($val_child5['is_banner'] == 0){ ?>
                                                                    <span class="label label-success">Banner</span>
                                                                  <?php }else{ ?>
                                                                    <span class="label label-danger">Banner</span>
                                                                  <?php } ?></a>
                                                                  <div class="clear"></div>
                                                                  <a onClick="showhomechild(<?php echo $val_child5['id']?>);" control="menu" title="homechild" class="div_homechild<?php echo $val_child5['id']?> div_homechild" divid="div_homechild<?php echo $val_child5['id']?>" seq="<?php echo $val_child5['id']?>">
                                                                  <?php if($val_child5['is_homechild'] == 0){ ?>
                                                                    <span class="label label-success">Trang chủ mục con</span>
                                                                  <?php }else{ ?>
                                                                    <span class="label label-danger">Trang chủ mục con</span>
                                                                  <?php } ?></a>
                                                                  <div class="clear"></div>
                                                              </td>
                                                              <td class="div_center tool">
                                                                <a href="admin/menu/edit/<?php echo $val_child5['id']?>"><i class="fa fa-edit"></i></a>
                                                                <a onClick="del(<?php echo $val_child5['id']?>);" class="delete delete<?php echo $val_child5['id']?>" seq="<?php echo $val_child5['id']?>" control="menu"><i class="fa fa-trash"></i></a>
                                                                
                                                              </td>
                                                            </tr>
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
                    </tbody>
                </table>
                <?php echo isset($list_pagination)?$list_pagination:''; ?>
                <div class="col-md-6 div_float_right">
                <div class="row">
                    <a href="admin/menu/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
                    <a control="menu" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
                    <a control="menu" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
