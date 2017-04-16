<div class="row">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo isset($title)?$title:'';?></h3>
        </div>
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Gửi tới</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input type="text" class="form-control" name="mail" id="mail" value="<?php echo isset($listmail)?$listmail:'';?>">
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Tiêu đề</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea id="content" name="content" class="ckeditor"></textarea>
                </div>
            </div>
        </div><!-- /.box-body -->

        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Gửi</a>
            <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
            <a href="admin/mail/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
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
