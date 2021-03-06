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
                <label class="control-label">Danh mục</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                    <select class="form-control select2" name="typeid" id="typeid" control="film">
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
            </div>
            <?php /*<div class="form-group">
                <label class="control-label">Khu vực</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                    <select class="form-control select2" name="cityid" id="cityid">
                      <option value="">Chọn khu vực</option>
                      <?php if(isset($city) && !is_null($city)){ ?>
                      <?php foreach ($city as $key_city => $val_city) { ?>
                            <option value="<?php echo $val_city['id'];?>"><?php echo $val_city['name'];?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>
                </div>
            </div>*/?>
            <div class="form-group">
                <label class="control-label">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="name" id="name" control="news">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Url</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="alias" id="alias">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Title</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input class="form-control" name="title" id="title">
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
                    <div id="box_img" class="div_avatar"></div>
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
                    <div id="box_icon" class="div_avatar"></div>
                </div>
            </div>
            </div>*/?>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="6" name="description" id="description"></textarea>
            </div>
            <?php /*<div class="col-md-12"><div class="row">
                <div class="item-manager">
                    <div id="dZUpload" class="dropzone">
                        <div class="dz-default dz-message"></div>
                    </div>
                </div>
                <div id="div_list_img"></div>
            </div></div>*/?>
          </div><!-- /.box-body -->
        </div>
        <div class="col-md-6">
            <div class="box-body">
                <div class="form-group">
                    <label>Meta keyword</label>
                    <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"></textarea>
                </div>
                <div class="form-group">
                    <label>Meta description</label>
                    <textarea class="form-control" rows="4" name="meta_description" id="meta_description"></textarea>
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                      <input checked="" type="radio" name="publish" id="publish" value="0"> Hiển thị
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="publish" id="publish" value="1"> Không
                    </label>
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                      <input type="radio" name="is_hot" id="is_hot" value="0"> Nổi bật
                    </label>
                    <label class="radio-inline">
                      <input checked=""  type="radio" name="is_hot" id="is_hot" value="1"> Không 
                    </label>
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                      <input type="radio" name="is_home" id="is_home" value="0"> Trang chủ
                    </label>
                    <label class="radio-inline">
                      <input checked="" type="radio" name="is_home" id="is_home" value="1"> Không
                    </label>
                </div>
                <?php /*<div class="form-group">
                    <label class="control-label">Website</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="website" id="website">
                    </div>
                </div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Hotline</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="hotline" id="hotline">
                    </div>
                </div>
                </div></div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Fax</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input class="form-control" name="fax" id="fax">
                    </div>
                </div>
                </div></div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <textarea class="form-control" rows="2" name="address" id="address"></textarea>
                </div>*/?>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Nội dung</label>
                <textarea id="content" name="content" class="ckeditor"></textarea>
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
                        <input type="text" class="form-control" name="en_name" id="en_name" control="news">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="6" name="en_description" id="en_description"></textarea>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <textarea class="form-control" rows="2" name="en_address" id="en_address"></textarea>
                </div>
            </div><!-- /.box-body -->
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea id="en_content" name="en_content" class="ckeditor"></textarea>
                </div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Lưu</a>
            <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
            <a href="admin/news/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
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
            url: "admin/news/dropzone",
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
                        url: "admin/news/deldropzone",
                        type: "POST",
                        data: { image: file.name}
                    });
                });
            }
        });
    });
</script>