<div class="row">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-pencil-square" aria-hidden="true"></i> <?php echo isset($title)?$title:'';?></h3>
        </div>
        <div class="col-md-6"> 
          <div class="box-body">
            <div class="form-group">
                <label class="control-label">Thuộc nhóm</label>
                <div class="clear"></div>
                <div class="col-md-10"><div class="row">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                    <select class="form-control select2" name="typeid" id="typeid" control="product">
                      <option value="">Chọn nhóm</option>
                      <?php if(isset($type) && !is_null($type)){ ?>
                      <?php foreach ($type as $key_type => $val_type) { ?>
                            <option value="<?php echo $val_type['id'];?>" <?php if($val_type['id'] == $product['typeid']){ ?> selected <?php } ?>><?php echo $val_type['name'];?></option>
                            <?php if(isset($val_type['type_child']) && !is_null($val_type['type_child'])){ ?>
                            <?php foreach ($val_type['type_child'] as $key_type_child => $val_type_child) { ?>
                                <option value="<?php echo $val_type_child['id'];?>" <?php if($val_type_child['id'] == $product['typeid']){ ?> selected <?php } ?>>1---- <?php echo $val_type_child['name'];?></option>
                                <?php if(isset($val_type_child['child_3']) && !is_null($val_type_child['child_3'])){ ?>
                                    <?php foreach ($val_type_child['child_3'] as $key_type_child3 => $val_type_child3) { ?>
                                        <option value="<?php echo $val_type_child3['id'];?>" <?php if($val_type_child3['id'] == $product['typeid']){ ?> selected <?php } ?>>----2---- <?php echo $val_type_child3['name'];?></option>
                                            <?php if(isset($val_type_child3['child_4']) && !is_null($val_type_child3['child_4'])){ ?>
                                                <?php foreach ($val_type_child3['child_4'] as $key_type_child4 => $val_type_child4) { ?>
                                                    <option value="<?php echo $val_type_child4['id'];?>" <?php if($val_type_child4['id'] == $product['typeid']){ ?> selected <?php } ?>>--------3---- <?php echo $val_type_child4['name'];?></option>
                                                    <?php if(isset($val_type_child4['child_5']) && !is_null($val_type_child4['child_5'])){ ?>
                                                        <?php foreach ($val_type_child4['child_5'] as $key_type_child5 => $val_type_child5) { ?>
                                                            <option value="<?php echo $val_type_child5['id'];?>" <?php if($val_type_child5['id'] == $product['typeid']){ ?> selected <?php } ?>>------------4---- <?php echo $val_type_child5['name'];?></option>
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
                <div class="col-md-2 "><div class="row">
                    <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myType">Thêm mới</a>
                </div></div>
            </div>
            <div class="clear"></div>
            <div class="form-group">
                <label class="control-label">Tên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($product['name']) && $product['name']!=''){ echo $product['name']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Title</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input class="form-control" name="title" id="title" value="<?php if(isset($product['title']) && $product['title']!=''){ echo $product['title']; }?>">
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
                        <?php if($product['image_thumb']!=''){ ?>
                            <img src="upload/product/thumb/<?php echo $product['image_thumb'];?>" alt="">
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label>Mô tả kỹ thuật</label>
                <textarea id="des" name="des" class="ckeditor1"><?php if(isset($product['des']) && $product['des']!=''){ echo $product['des']; }?></textarea>
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
                <textarea id="description_like" name="description_like" class="ckeditor1"><?php if(isset($product['description_like']) && $product['description_like']!=''){ echo $product['description_like']; }?></textarea>
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
                <div class="clear"></div>
                <?php if(isset($product_img) && $product_img!=NULL){ ?>
                    <?php foreach ($product_img as $key_productimg => $val_productimg) { ?>
                        <div class="col-md-3 item_product_img"><img src="upload/product/detail/<?php echo $val_productimg['image'];?>">
                        <a onClick="delDropzone(<?php echo $val_productimg['id'];?>);" class="del_product_img delete delete<?php echo $val_productimg['id'];?>" control="product"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div></div>
          </div><!-- /.box-body -->
        </div>
        <div class="col-md-6">
            <div class="box-body">
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Giá</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input onkeyup="return FormatNumber(this);" class="form-control" name="price" id="price" value="<?php if(isset($product['price']) && $product['price']!=''){ echo number_format($product['price']); }?>">
                        <div class="input-group-addon">VNĐ</div>
                    </div>
                </div>
                </div></div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Giá khuyến mãi</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input onkeyup="return FormatNumber(this);" class="form-control" name="price_sale" id="price_sale" value="<?php if(isset($product['price_sale']) && $product['price_sale']!=''){ echo number_format($product['price_sale']); }?>">
                        <div class="input-group-addon">VNĐ</div>
                    </div>
                </div>
                </div></div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Mã sản phẩm</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input format="number" class="form-control" name="code" id="code" value="<?php if(isset($product['code']) && $product['code']!=''){ echo $product['code']; }?>">
                    </div>
                </div>
                </div></div>
                <div class="col-md-6"><div class="row">
                <div class="form-group">
                    <label class="control-label">Phần trăm</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input format="number" class="form-control" name="percent" id="percent" value="<?php if(isset($product['percent']) && $product['percent']!=''){ echo $product['percent']; }?>">
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
                </div></div>
                <div class="clear"></div>
                <div class="form-group">
                    <label>Meta keyword</label>
                    <textarea class="form-control" rows="4" name="meta_keyword" id="meta_keyword"><?php if(isset($product['meta_keyword']) && $product['meta_keyword']!=''){ echo $product['meta_keyword']; }?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta description</label>
                    <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php if(isset($product['meta_description']) && $product['meta_description']!=''){ echo $product['meta_description']; }?></textarea>
                </div>
                <div class="form-group">
                    <label class="lbl_radio">
                      <input class="minimal" <?php if($product['publish'] == 0){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="0"> Hiển thị
                    </label>
                    <label class="lbl_radio">
                      <input class="minimal" <?php if($product['publish'] == 1){ ?> checked="" <?php } ?> type="radio" name="publish" id="publish" value="1"> Không
                    </label>
                </div>
                <div class="form-group">
                    <label class="lbl_radio">
                      <input class="minimal" <?php if($product['is_hot'] == 0){ ?> checked="" <?php } ?> type="radio" name="is_hot" id="is_hot" value="0"> Nổi bật
                    </label>
                    <label class="lbl_radio">
                      <input class="minimal" <?php if($product['is_hot'] == 1){ ?> checked="" <?php } ?> type="radio" name="is_hot" id="is_hot" value="1"> Không 
                    </label>
                </div>
                <div class="form-group">
                    <label class="lbl_radio">
                      <input class="minimal" <?php if($product['is_home'] == 0){ ?> checked="" <?php } ?> type="radio" name="is_home" id="is_home" value="0"> Hiện thị trên trang chủ
                    </label>
                    <label class="lbl_radio">
                      <input class="minimal" <?php if($product['is_home'] == 1){ ?> checked="" <?php } ?> type="radio" name="is_home" id="is_home" value="1"> Không
                    </label>
                </div>
                <?php /*<div class="form-group">
                    <label class="control-label">Thương hiệu</label>
                    <div class="input-group">
                        
                        <div class="clear"></div>
                        <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                        <select class="form-control select2" name="brandid" id="brandid" control="film">
                          <option value="">Chọn danh mục</option>
                          <?php if(isset($brand) && !is_null($brand)){ ?>
                          <?php foreach ($brand as $key_brand => $val_brand) { ?>
                                <option value="<?php echo $val_brand['id'];?>" <?php if($val_brand['id'] == $product['brandid']){ ?> selected <?php } ?>><?php echo $val_brand['name'];?></option>
                          <?php } ?>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Thông tin bảo hành</label>
                    <textarea id="des" name="guarantee" class="ckeditor1"><?php if(isset($product['guarantee']) && $product['guarantee']!=''){ echo $product['guarantee']; }?></textarea>
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
                    <textarea id="des" name="service" class="ckeditor1"><?php if(isset($product['service']) && $product['service']!=''){ echo $product['service']; }?></textarea>
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
                        <input type="text" class="form-control" id="video" name="video" value="<?php if(isset($product['video']) && $product['video']!=''){ echo $product['video']; }?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea id="content" name="content" class="ckeditor"><?php if(isset($product['content']) && $product['content']!=''){ echo $product['content']; }?></textarea>
            </div>
        </div>
        <?php /*<div class="col-md-12">
            <div class="form-group">
                <label>Thông số kỹ thuật</label>
                <textarea id="content" name="info_product" class="ckeditor"><?php if(isset($product['info_product']) && $product['info_product']!=''){ echo $product['info_product']; }?></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Thông tin khuyến mãi</label>
                <textarea id="content" name="info_sale" class="ckeditor"><?php if(isset($product['info_sale']) && $product['info_sale']!=''){ echo $product['info_sale']; }?></textarea>
            </div>
        </div>*/?>
        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Cập nhật</a>
            <a href="admin/product/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Hủy</a>
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
                        <input type="hidden" name="id" id="id" value="<?php echo $product['id'];?>">
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
