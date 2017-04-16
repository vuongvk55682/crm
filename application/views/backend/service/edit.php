<div class="row">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
        <?php /*<ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#vn" aria-controls="system" role="tab" data-toggle="tab"><strong>Tiếng việt</strong></a></li>
            <li role="presentation"><a href="#en" aria-controls="contact" role="tab" data-toggle="tab"> <strong>Tiếng anh</strong></a></li>
        </ul>*/?>
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="vn">
        <div class="col-md-6">
          <div class="box-body">
            <div class="form-group">
                <label class="control-label">Thuộc nhóm</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                    <select class="form-control select2" name="typeid" id="typeid" control="service">
                      <option value="">Chọn nhóm</option>
                      <?php if(isset($type) && !is_null($type)){ ?>
                      <?php foreach ($type as $key_type => $val_type) { ?>
                            <option value="<?php echo $val_type['id'];?>" <?php if($val_type['id'] == $service['typeid']){ ?> selected <?php } ?>><?php echo $val_type['name'];?></option>
                            <?php if(isset($val_type['type_child']) && !is_null($val_type['type_child'])){ ?>
                            <?php foreach ($val_type['type_child'] as $key_type_child => $val_type_child) { ?>
                                <option value="<?php echo $val_type_child['id'];?>" <?php if($val_type_child['id'] == $service['typeid']){ ?> selected <?php } ?>>1---- <?php echo $val_type_child['name'];?></option>
                                <?php if(isset($val_type_child['child_3']) && !is_null($val_type_child['child_3'])){ ?>
                                    <?php foreach ($val_type_child['child_3'] as $key_type_child3 => $val_type_child3) { ?>
                                        <option value="<?php echo $val_type_child3['id'];?>" <?php if($val_type_child3['id'] == $service['typeid']){ ?> selected <?php } ?>>----2---- <?php echo $val_type_child3['name'];?></option>
                                            <?php if(isset($val_type_child3['child_4']) && !is_null($val_type_child3['child_4'])){ ?>
                                                <?php foreach ($val_type_child3['child_4'] as $key_type_child4 => $val_type_child4) { ?>
                                                    <option value="<?php echo $val_type_child4['id'];?>" <?php if($val_type_child4['id'] == $service['typeid']){ ?> selected <?php } ?>>--------3---- <?php echo $val_type_child4['name'];?></option>
                                                    <?php if(isset($val_type_child4['child_5']) && !is_null($val_type_child4['child_5'])){ ?>
                                                        <?php foreach ($val_type_child4['child_5'] as $key_type_child5 => $val_type_child5) { ?>
                                                            <option value="<?php echo $val_type_child5['id'];?>" <?php if($val_type_child5['id'] == $service['typeid']){ ?> selected <?php } ?>>------------4---- <?php echo $val_type_child5['name'];?></option>
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
            </div>
            <?php /*<div class="form-group">
                <label class="control-label">Khu vực</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                    <select class="form-control select2" name="cityid" id="cityid">
                      <option value="">Chọn khu vực</option>
                      <?php if(isset($city) && !is_null($city)){ ?>
                      <?php foreach ($city as $key_city => $val_city) { ?>
                            <option value="<?php echo $val_city['id'];?>" <?php if($val_city['id'] == $service['cityid']){ ?> selected <?php } ?>><?php echo $val_city['name'];?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>
                </div>
            </div>*/?>
            <div class="form-group">
                <label class="control-label">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($service['name']) && $service['name']!=''){ echo $service['name']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Url</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="alias" id="alias" value="<?php if(isset($service['alias']) && $service['alias']!=''){ echo $service['alias']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Title</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input class="form-control" name="title" id="title" value="<?php if(isset($service['title']) && $service['title']!=''){ echo $service['title']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Hình ảnh đại diện</label>
                <span class="btn btn-primary btn-file btn-sm">
                    Browse <input type="file" name="image" id="image">
                </span>
            </div>
            <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                    <div id="box_img" class="div_avatar">
                        <?php if($service['image_thumb']!=''){ ?>
                            <img src="upload/service/thumb/<?php echo $service['image_thumb'];?>" alt="">
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <?php /*<div class="form-group">
                <label for="name">Icon</label>
                <span class="btn btn-primary btn-file btn-sm">
                    Browse <input type="file" name="icon" id="icon">
                </span>
            </div>
            <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                    <div id="box_icon" class="div_avatar">
                        <?php if($service['icon']!=''){ ?>
                            <img src="upload/service/icon/<?php echo $service['icon'];?>" alt="">
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>*/?>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="6" name="description" id="description"><?php if(isset($service['description']) && $service['description']!=''){ echo $service['description']; }?></textarea>
            </div>
            <?php /*<div class="col-md-12"><div class="row">
                <div class="item-manager">
                    <div id="dZUpload" class="dropzone">
                        <div class="dz-default dz-message"></div>
                    </div>
                </div>
                <div id="div_list_img"></div>
                <div class="clear"></div>
                <?php if(isset($service_img) && $service_img!=NULL){ ?>
                    <?php foreach ($service_img as $key_serviceimg => $val_serviceimg) { ?>
                        <div class="col-md-3 item_product_img item_service_img"><img src="upload/service/detail/<?php echo $val_serviceimg['image'];?>">
                        <a onClick="delDropzone(<?php echo $val_serviceimg['id'];?>);" class="del_service_img delete delete<?php echo $val_serviceimg['id'];?>" control="service"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div></div>*/?>
          </div><!-- /.box-body -->
        </div>
        <div class="col-md-6">
            <div class="box-body">
                <div class="form-group">
                    <label>Meta keyword</label>
                    <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"><?php if(isset($service['meta_keyword']) && $service['meta_keyword']!=''){ echo $service['meta_keyword']; }?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta description</label>
                    <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php if(isset($service['meta_description']) && $service['meta_description']!=''){ echo $service['meta_description']; }?></textarea>
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                      <input <?php if($service['publish'] == 0){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="0"> Hiển thị
                    </label>
                    <label class="radio-inline">
                      <input <?php if($service['publish'] == 1){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="1"> Không
                    </label>
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                      <input <?php if($service['is_hot'] == 0){ ?> checked="" <?php } ?> type="radio" name="is_hot" id="is_hot" value="0"> Nổi bật
                    </label>
                    <label class="radio-inline">
                      <input <?php if($service['is_hot'] == 1){ ?> checked="" <?php } ?> type="radio" name="is_hot" id="is_hot" value="1"> Không 
                    </label>
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                      <input <?php if($service['is_home'] == 0){ ?> checked="" <?php } ?> type="radio" name="is_home" id="is_home" value="0"> Hiện thị trên trang chủ
                    </label>
                    <label class="radio-inline">
                      <input <?php if($service['is_home'] == 1){ ?> checked="" <?php } ?> type="radio" name="is_home" id="is_home" value="1"> Không
                    </label>
                </div>
                <?php /*<div class="form-group">
                    <label class="control-label">Website</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="website" id="website" value="<?php if(isset($service['website']) && $service['website']!=''){ echo $service['website']; }?>">
                    </div>
                </div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Hotline</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="hotline" id="hotline" value="<?php if(isset($service['hotline']) && $service['hotline']!=''){ echo $service['hotline']; }?>">
                    </div>
                </div>
                </div></div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Fax</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="fax" id="fax" value="<?php if(isset($service['fax']) && $service['fax']!=''){ echo $service['fax']; }?>">
                    </div>
                </div>
                </div></div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <textarea class="form-control" rows="2" name="address" id="address"><?php if(isset($service['address']) && $service['address']!=''){ echo $service['address']; }?></textarea>
                </div>*/?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Nội dung</label>
                <textarea id="content" name="content" class="ckeditor"><?php if(isset($service['content']) && $service['content']!=''){ echo $service['content']; }?></textarea>
            </div>
        </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="en">
            <div class="col-md-6">
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Tên</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input type="text" class="form-control" name="en_name" id="en_name" control="service" value="<?php if(isset($en_lang['name']) && $en_lang['name']!=''){ echo $en_lang['name']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="6" name="en_description" id="en_description"><?php if(isset($en_lang['description']) && $en_lang['description']!=''){ echo $en_lang['description']; }?></textarea>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <textarea class="form-control" rows="2" name="en_address" id="en_address"><?php if(isset($en_lang['address']) && $en_lang['address']!=''){ echo $en_lang['address']; }?></textarea>
                </div>
            </div><!-- /.box-body -->
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea id="en_content" name="en_content" class="ckeditor"><?php if(isset($en_lang['content']) && $en_lang['content']!=''){ echo $en_lang['content']; }?></textarea>
                </div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/service/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
          </div>
      </div>
    </div>
    </form>
</div>
<link rel="stylesheet" href="public/dropzone/dropzone.css" type="text/css" />
<script type="text/javascript" src="public/dropzone/dropzone.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dZUpload').dropzone({
            url: "admin/service/dropzone",
            addRemoveLinks: true, 
            dictRemoveFile: 'Delete',
            init: function() {
                this.on("success", function(file, response) {
                    var obj = $.parseJSON(response);
                    $(file.previewTemplate).find('.dz-preview').attr('id', "document-" + obj.id);
                    $('#div_list_img').append('<input type="hidden" name="id_img[]" value="'+obj.id+'">');
                });
                this.on("removedfile", function(file) {
                    $.ajax({
                        url: "admin/service/deldropzone",
                        type: "POST",
                        data: { image: file.name}
                    });
                });
            }
        });
    });
</script>
