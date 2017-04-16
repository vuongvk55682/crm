<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
            <div class="box-body">
            <?php /*<ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#vn" aria-controls="system" role="tab" data-toggle="tab"><strong>Tiếng việt</strong></a></li>
                <li role="presentation"><a href="#en" aria-controls="contact" role="tab" data-toggle="tab"> <strong>Tiếng anh</strong></a></li>
            </ul>*/?>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="vn">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName">Tên</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($menu['name']) && $menu['name']!=''){ echo $menu['name']; }?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Thuộc danh mục</label>
                            <select class="form-control select2" name="parentid" id="parentid">
                                <option value="0">Gốc</option>
                                <?php if(isset($menus) && !is_null($menus)){ ?>
                                    <?php foreach ($menus as $key_menu => $val_menu) { ?>
                                        <option value="<?php echo $val_menu['id'];?>" <?php if($val_menu['id'] == $menu['parentid']){ ?> selected <?php } ?>>+ <?php echo $val_menu['name'];?></option>
                                        <?php if(isset($val_menu['child_2']) && !is_null($val_menu['child_2'])){ ?>
                                            <?php foreach ($val_menu['child_2'] as $key_menu_child2 => $val_menu_child2) { ?>
                                                <option value="<?php echo $val_menu_child2['id'];?>" <?php if($val_menu_child2['id'] == $menu['parentid']){ ?> selected <?php } ?>>--- <?php echo $val_menu_child2['name'];?></option>
                                                <?php if(isset($val_menu_child2['child_3']) && !is_null($val_menu_child2['child_3'])){ ?>
                                                    <?php foreach ($val_menu_child2['child_3'] as $key_menu_child3 => $val_menu_child3) { ?>
                                                        <option value="<?php echo $val_menu_child3['id'];?>" <?php if($val_menu_child3['id'] == $menu['parentid']){ ?> selected <?php } ?>>--------- <?php echo $val_menu_child3['name'];?></option>
                                                        <?php if(isset($val_menu_child3['child_4']) && !is_null($val_menu_child3['child_4'])){ ?>
                                                            <?php foreach ($val_menu_child3['child_4'] as $key_menu_child4 => $val_menu_child4) { ?>
                                                                <option value="<?php echo $val_menu_child4['id'];?>" <?php if($val_menu_child4['id'] == $menu['parentid']){ ?> selected <?php } ?>>---------3----- <?php echo $val_menu_child4['name'];?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="exampleInputName">Title</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                <input type="text" class="form-control" id="title" name="title" value="<?php if(isset($menu['title']) && $menu['title']!=''){ echo $menu['title']; }?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="radio-inline">
                                <label>
                                    <input <?php if($menu['type'] == 0){ ?> checked <?php } ?> type="radio" name="type" id="type" value="0" />
                                    None
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input <?php if($menu['type'] == 1){ ?> checked <?php } ?> type="radio" name="type" id="type" value="1" />
                                    Bài viết
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input <?php if($menu['type'] == 3){ ?> checked <?php } ?> type="radio" name="type" id="type" value="3" />
                                    Sản phẩm
                                </label>
                            </div>
                            <?php /*<div class="radio-inline">
                                <label>
                                    <input <?php if($menu['type'] == 3){ ?> checked <?php } ?> type="radio" name="type" id="type" value="3" />
                                    Lĩnh vực hoạt động
                                </label>
                            </div>*/?>
                        </div>
                        <?php /*<div class="form-group">
                            <label for="name">Icon đại diện</label>
                            <span class="btn btn-primary btn-file btn-sm">
                                Browse <input type="file" name="image" id="image">
                            </span>
                        </div>
                        <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                                <div id="box_img" class="div_avatar">
                                    <?php if($menu['image']!=''){ ?>
                                        <img src="upload/menu/<?php echo $menu['image'];?>" alt="" style="background-color: #ddd;">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Link cho ảnh đại diện</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                <input type="text" class="form-control" id="image_link" name="image_link" value="<?php if(isset($menu['image_link']) && $menu['image_link']!=''){ echo $menu['image_link']; }?>">
                            </div>
                        </div>*/?>
                        <div class="form-group">
                            <label for="exampleInputName">Link</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                <input type="text" class="form-control" id="link" name="link" value="<?php if(isset($menu['link']) && $menu['link']!=''){ echo $menu['link']; }?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Meta keyword</label>
                            <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"><?php if(isset($menu['meta_keyword']) && $menu['meta_keyword']!=''){ echo $menu['meta_keyword']; }?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta description</label>
                            <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php if(isset($menu['meta_description']) && $menu['meta_description']!=''){ echo $menu['meta_description']; }?></textarea>
                        </div>
                        <?php /*<div class="form-group">
                            <label for="name">Hình ảnh quảng cáo</label>
                            <span class="btn btn-primary btn-file btn-sm">
                                Browse <input type="file" name="image_qc" id="image_qc">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Link Qc</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                <input type="text" class="form-control" id="link_qc" name="link_qc" value="<?php if(isset($menu['link_qc']) && $menu['link_qc']!=''){ echo $menu['link_qc']; }?>">
                            </div>
                        </div>
                        <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                                <div id="box_img_bg" class="div_avatar">
                                    <?php if($menu['image_qc']!=''){ ?>
                                        <img src="upload/menu/<?php echo $menu['image_qc'];?>" alt="">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        </div>*/?>
                        <div class="form-group">
                            <?php if($menu['publish'] == 0){ ?>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="publish" id="publish" value="0" checked />
                                    Hiển thị
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="publish" id="publish" value="1" />
                                    Không
                                </label>
                            </div>
                            <?php }else{ ?>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="publish" id="publish" value="0" />
                                    Hiển thị
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="publish" id="publish" value="1" checked />
                                    Ẩn
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if(isset($icon) && $icon != NULL){ ?>
                        <div class="form-group">
                            <?php foreach ($icon as $key_icon => $val_icon) { ?>
                                <div class="radio-inline">
                                    <label>
                                        <input <?php if($val_icon['id'] == $menu['iconid']){ ?> checked <?php } ?> type="radio" name="iconid" id="iconid" value="<?php echo $val_icon['id'];?>" />
                                        <i style="font-style:normal;font-size:20px !important;color:#F00;" class="<?php echo $val_icon['icon'];?>"></i>
                                    </label>
                                </div>
                                <?php if(($key_icon + 1) % 9 == 0){?> <div class="clear"></div> <?php } ?>
                            <?php } ?>
                        </div>
                        
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                  <input <?php if($menu['show_brand'] == 1){ ?> checked <?php } ?> type="checkbox" name="show_brand" id="show_brand" value="1">
                                  Hiển thị thương hiệu Trang chủ
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-12">
                        <?php /*<div class="form-group">
                            <div class="checkbox">
                                <label>
                                  <input <?php if($menu['is_full'] == 1){ ?> checked <?php } ?> type="checkbox" name="is_full" id="is_full" value="1">
                                  <strong>Full</strong>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="radio-inline">
                                <label>
                                    <input <?php if($menu['shows'] == 0){ ?> checked <?php } ?> type="radio" name="shows" id="shows" value="0" checked />
                                    List
                                </label>
                            </div>
                          <div class="radio-inline">
                                <label>
                                    <input <?php if($menu['shows'] == 1){ ?> checked <?php } ?> type="radio" name="shows" id="shows" value="1" />
                                    Grid
                                </label>
                          </div>
                        </div>*/?>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="content" name="content" class="ckeditor"><?php if(isset($menu['content']) && $menu['content']!=''){ echo $menu['content']; }?></textarea>
                        </div>
                    </div>
                    <?php /*<div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung quảng cáo</label>
                            <textarea id="content_ads" name="content_ads" class="ckeditor"><?php if(isset($menu['content_ads']) && $menu['content_ads']!=''){ echo $menu['content_ads']; }?></textarea>
                        </div>
                    </div>*/?>
                </div>
                <div role="tabpanel" class="tab-pane" id="en">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName">Tên</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                            <input type="text" class="form-control" id="en_name" name="en_name" value="<?php if(isset($en_lang['name']) && $en_lang['name']!=''){ echo $en_lang['name']; }?>">
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="en_content" name="en_content" class="ckeditor"><?php if(isset($en_lang['content']) && $en_lang['content']!=''){ echo $en_lang['content']; }?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            </div><!-- /.box-body -->

          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Lưu</a>
            <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
            <a href="admin/menu/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
          </div>
        </form>
      </div>
    </div>
</div>