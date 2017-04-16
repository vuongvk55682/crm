<div class="row">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-pencil-square" aria-hidden="true"></i> <?php echo isset($title)?$title:'';?></h3>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#vn" aria-controls="system" role="tab" data-toggle="tab"><strong>Tiếng việt</strong></a></li>
            <li role="presentation"><a href="#en" aria-controls="contact" role="tab" data-toggle="tab"> <strong>Tiếng anh</strong></a></li>
        </ul>
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="vn">
        <div class="col-md-6"> 
          <div class="box-body">
            <div class="form-group">
                <label class="control-label">Thuộc nhóm</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                    <select class="form-control select2" name="typeid" id="typeid" control="album">
                      <option value="">Chọn nhóm</option>
                      <?php if(isset($type) && !is_null($type)){ ?>
                      <?php foreach ($type as $key_type => $val_type) { ?>
                            <option value="<?php echo $val_type['id'];?>" <?php if($val_type['id'] == $album['typeid']){ ?> selected <?php } ?>><?php echo $val_type['name'];?></option>
                            <?php if(isset($val_type['type_child']) && !is_null($val_type['type_child'])){ ?>
                            <?php foreach ($val_type['type_child'] as $key_type_child => $val_type_child) { ?>
                                <option value="<?php echo $val_type_child['id'];?>" <?php if($val_type_child['id'] == $album['typeid']){ ?> selected <?php } ?>>1---- <?php echo $val_type_child['name'];?></option>
                                <?php if(isset($val_type_child['child_3']) && !is_null($val_type_child['child_3'])){ ?>
                                    <?php foreach ($val_type_child['child_3'] as $key_type_child3 => $val_type_child3) { ?>
                                        <option value="<?php echo $val_type_child3['id'];?>" <?php if($val_type_child3['id'] == $album['typeid']){ ?> selected <?php } ?>>----2---- <?php echo $val_type_child3['name'];?></option>
                                            <?php if(isset($val_type_child3['child_4']) && !is_null($val_type_child3['child_4'])){ ?>
                                                <?php foreach ($val_type_child3['child_4'] as $key_type_child4 => $val_type_child4) { ?>
                                                    <option value="<?php echo $val_type_child4['id'];?>" <?php if($val_type_child4['id'] == $album['typeid']){ ?> selected <?php } ?>>--------3---- <?php echo $val_type_child4['name'];?></option>
                                                    <?php if(isset($val_type_child4['child_5']) && !is_null($val_type_child4['child_5'])){ ?>
                                                        <?php foreach ($val_type_child4['child_5'] as $key_type_child5 => $val_type_child5) { ?>
                                                            <option value="<?php echo $val_type_child5['id'];?>" <?php if($val_type_child5['id'] == $album['typeid']){ ?> selected <?php } ?>>------------4---- <?php echo $val_type_child5['name'];?></option>
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
            <div class="form-group">
                <label class="control-label">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($album['name']) && $album['name']!=''){ echo $album['name']; }?>" control="album">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Url</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="alias" id="alias" value="<?php if(isset($album['alias']) && $album['alias']!=''){ echo $album['alias']; }?>">
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
                        <?php if($album['image_thumb']!=''){ ?>
                            <img src="upload/album/thumb/<?php echo $album['image_thumb'];?>" alt="">
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-12"><div class="row">
                <div class="item-manager">
                    <div id="dZUpload" class="dropzone">
                        <div class="dz-default dz-message"></div>
                    </div>
                </div>
                <div id="div_list_img"></div>
                <div class="clear"></div>
                <?php if(isset($album_img) && $album_img!=NULL){ ?>
                    <?php foreach ($album_img as $key_albumimg => $val_albumimg) { ?>
                        <div class="col-md-3 item_product_img item_album_img"><img src="upload/album/detail/<?php echo $val_albumimg['image'];?>">
                        <a onClick="delDropzone(<?php echo $val_albumimg['id'];?>);" class="del_album_img delete delete<?php echo $val_albumimg['id'];?>" control="album"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div></div>
          </div><!-- /.box-body -->
        </div>
        <div class="col-md-6">
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Title</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="title" id="title" value="<?php if(isset($album['title']) && $album['title']!=''){ echo $album['title']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Meta keyword</label>
                    <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"><?php if(isset($album['meta_keyword']) && $album['meta_keyword']!=''){ echo $album['meta_keyword']; }?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta description</label>
                    <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php if(isset($album['meta_description']) && $album['meta_description']!=''){ echo $album['meta_description']; }?></textarea>
                </div>
                <div class="form-group">
                    <label class="lbl_radio">
                      <input class="minimal" <?php if($album['publish'] == 0){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="0"> Hiển thị
                    </label>
                    <label class="lbl_radio">
                      <input class="minimal" <?php if($album['publish'] == 1){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="1"> Không
                    </label>
                </div>
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
                        <input type="text" class="form-control" name="en_name" id="en_name" control="album" value="<?php if(isset($en_lang['name']) && $en_lang['name']!=''){ echo $en_lang['name']; }?>">
                    </div>
                </div>
            </div><!-- /.box-body -->
            </div>
        </div>
        </div>
        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/album/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
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
            url: "admin/album/dropzone",
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
                        url: "admin/album/deldropzone",
                        type: "POST",
                        data: { image: file.name}
                    });
                });
            }
        });
    });
</script>
