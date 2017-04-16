<div class="row">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo isset($title)?$title:'';?></h3>
        </div>
        <div class="col-md-6">
          <div class="box-body">
            <div class="form-group">
                <label class="control-label">Danh mục</label>
                <div class="clear"></div>
                <div class="col-md-9"><div class="row">
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
                </div></div>
                <div class="col-md-3 "><div class="row">
                    <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myType">Thêm nhanh</a>
                </div></div>
            </div>
            <div class="clear" style="height:10px;"></div>
            <div class="form-group">
                <label class="control-label">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="name" id="name">
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
            <div class="form-group">
                <label>Mô tả kỹ thuật</label>
                <textarea id="des" name="des" class="ckeditor1"></textarea>
                <script>
                    CKEDITOR.replace( 'des' ,{        
                      toolbar: [
                             ['Source'] ,
                             ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About'] ,
                             ['Syntaxhighlight']
                           ]              
                    });
                </script>
            </div>
            <?php /*<div class="form-group">
                <label>Mô tả</label>
                <textarea id="description_like" name="description_like" class="ckeditor1"></textarea>
                <script>
                    CKEDITOR.replace( 'description_like' ,{        
                      toolbar: [
                             ['Source'] ,
                             ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About'] ,
                             ['Syntaxhighlight']
                           ]              
                    });
                </script>
            </div>*/?>
            <div class="col-md-12"><div class="row">
                <div class="item-manager">
                    <div id="dZUpload" class="dropzone">
                        <div class="dz-default dz-message"></div>
                    </div>
                </div>
                <div id="div_list_img"></div>
            </div></div>

          </div><!-- /.box-body -->
        </div>
        <div class="col-md-6">
            <div class="box-body">
                <div class="col-md-6"><div class="row">
                <div class="form-group" ng-app="myModule">
                    <label class="control-label">Giá</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input onkeyup="return FormatNumber(this);" format="number" class="form-control" name="price" id="price" >
                        <div class="input-group-addon">VNĐ</div>
                    </div>
                </div>
                </div></div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Giá khuyến mãi</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input onkeyup="return FormatNumber(this);" format="number" class="form-control" name="price_sale" id="price_sale" >
                        <div class="input-group-addon">VNĐ</div>
                    </div>
                </div>
                </div></div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Mã sản phẩm</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input format="number" class="form-control" name="code" id="code" >
                    </div>
                </div>
                </div></div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Phần trăm</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input format="number" class="form-control" name="percent" id="percent" >
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
                </div></div>
                <div class="clear"></div>
                <div class="form-group">
                    <label>Meta keyword</label>
                    <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"></textarea>
                </div>
                <div class="form-group">
                    <label>Meta description</label>
                    <textarea class="form-control" rows="4" name="meta_description" id="meta_description"></textarea>
                </div>
                <div class="form-group">
                    <label class="lbl_radio">
                      <input class="minimal" checked="" type="radio" name="publish" id="publish" value="0"> Hiển thị
                    </label>
                    <label class="lbl_radio">
                      <input class="minimal" type="radio" name="publish" id="publish" value="1"> Không
                    </label>
                </div>
                <div class="form-group">
                    <label class="lbl_radio">
                      <input class="minimal" checked="" type="radio" name="is_hot" id="is_hot" value="0"> Nổi bật
                    </label>
                    <label class="lbl_radio">
                      <input class="minimal" type="radio" name="is_hot" id="is_hot" value="1"> Không 
                    </label>
                </div>
                <div class="form-group">
                    <label class="lbl_radio">
                      <input class="minimal" checked="" type="radio" name="is_home" id="is_home" value="0"> Trang chủ
                    </label>
                    <label class="lbl_radio">
                      <input class="minimal" type="radio" name="is_home" id="is_home" value="1"> Không
                    </label>
                </div>
                <?php /*<div class="form-group">
                    <label class="control-label">Thương hiệu</label>
                    <div class="input-group">
                        <label class="control-label">Thương hiệu</label>
                        <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                        <select class="form-control select2" name="brandid" id="brandid" control="film">
                          <option value="">Chọn danh mục</option>
                          <?php if(isset($brand) && !is_null($brand)){ ?>
                          <?php foreach ($brand as $key_brand => $val_brand) { ?>
                                <option value="<?php echo $val_brand['id'];?>"><?php echo $val_brand['name'];?></option>
                          <?php } ?>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Thông tin bảo hành</label>
                    <textarea id="guarantee" name="guarantee" class="ckeditor1"></textarea>
                    <script>
                        CKEDITOR.replace( 'guarantee' ,{        
                          toolbar: [
                                 ['Source'] ,
                                 ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About'] ,
                                 ['Syntaxhighlight']
                               ]              
                        });
                    </script>
                </div>
                <div class="form-group">
                    <label>Dịch vụ & khuyến mãi</label>
                    <textarea id="service" name="service" class="ckeditor1"></textarea>
                    <script>
                        CKEDITOR.replace( 'service' ,{        
                          toolbar: [
                                 ['Source'] ,
                                 ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About'] ,
                                 ['Syntaxhighlight']
                               ]              
                        });
                    </script>
                </div>*/?>
                <div class="form-group">
                    <label for="name">Mã nhúng (https://www.youtube.com/watch?v=<span style="color:#F00;">tjUMEOXzRK8</span>)</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input type="text" class="form-control" id="video" name="video">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea id="content" name="content" class="ckeditor"></textarea>
            </div>
        </div>
        <?php /*<div class="col-md-12">
            <div class="form-group">
                <label>Thông số kỹ thuật</label>
                <textarea id="info_product" name="infoproduct" class="ckeditor"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Thông tin khuyến mãi</label>
                <textarea id="info_sale" name="info_sale" class="ckeditor"></textarea>
            </div>
        </div>*/?>
        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Lưu</a>
            <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
            <a href="admin/product/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
          </div>
      </div>
    </div>
    </form>
</div>

<div class="modal fade" id="myType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <form action="admin/menu/addslow" method="post" id="frm-addslow">
        <div class="modal-content">
            <div class="modal-body clearfix">
                <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label">Danh mục</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                            <select class="form-control select2" name="typeids" id="typeids" control="film">
                              <option value="">Chọn danh mục</option>
                              <?php if(isset($type) && !is_null($type)){ ?>
                              <?php foreach ($type as $key_type => $val_type) { ?>
                                    <option value="<?php echo $val_type['id'];?>"><?php echo $val_type['name'];?></option>
                              <?php } ?>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0px;">
                        <label class="control-label">Tên danh mục</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                            <input type="text" class="form-control" name="name" id="name" value="">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0px;">
                        <label class="control-label">Title</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                            <input type="text" class="form-control" name="title" id="title" value="">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0px;">
                        <label class="control-label">Link</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                            <input type="text" class="form-control" name="link" id="link" value="">
                        </div>
                    </div>
                </div>
                </div>
                <div class="clear" style="height: 10px;"></div>
                <div class="col-md-12">
                <div class="row">
                    <a data-dismiss="modal" class="btn btn-success btn-flat"><i class="fa fa-times"></i> Đóng</a>
                    <button type="button" class="btn btn-success btn-flat add_addslow"><i class="fa fa-unlock-alt"></i> Lưu</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
<link rel="stylesheet" href="public/dropzone/dropzone.css" type="text/css" />
<script type="text/javascript" src="public/dropzone/dropzone.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dZUpload').dropzone({
            url: "admin/product/dropzone",
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
                        url: "admin/product/deldropzone",
                        type: "POST",
                        data: { image: file.name}
                    });
                });
            }
        });
    });
</script>
