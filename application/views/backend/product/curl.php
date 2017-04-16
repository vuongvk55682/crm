<div class="row">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
        </div>
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
        <div class="box-body">
            <div class="col-md-4">
                <div class="row">
                    <label class="control-label">Danh mục</label>
                    <div class="col-md-11">
                    <div class="row">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-unsorted"></i></div>
                        <select class="form-control select2" name="typeid" id="typeid" control="film">
                          <option value="">Chọn danh mục</option>
                          <?php if(isset($type) && !is_null($type)){ ?>
                          <?php foreach ($type as $key_type => $val_type) { ?>
                                <option value="<?php echo $val_type['id'];?>"><?php echo $val_type['name'];?></option>
                                <?php if(isset($val_type['type_child']) && !is_null($val_type['type_child'])){ ?>
                                <?php foreach ($val_type['type_child'] as $key_type_child => $val_type_child) { ?>
                                    <option value="<?php echo $val_type_child['id'];?>">--- <?php echo $val_type_child['name'];?></option>
                                    <?php if(isset($val_type_child['child_3']) && !is_null($val_type_child['child_3'])){ ?>
                                    <?php foreach ($val_type_child['child_3'] as $key_type_child3 => $val_type_child3) { ?>
                                        <option value="<?php echo $val_type_child3['id'];?>">------ <?php echo $val_type_child3['name'];?></option>
                                    <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php } ?>
                          <?php } ?>
                          <?php } ?>
                        </select>
                    </div>
                    </div></div>
                    <div class="col-md-1">
                          <div class="row">
                              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myType"><i class="fa fa-plus" aria-hidden="true"></i></a>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="control-label">Link nguồn</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-link" aria-hidden="true"></i></div>
                        <input type="text" class="form-control" name="url" id="url">
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
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
                    <input type="hidden" name="act" id="act" value="curl">
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

