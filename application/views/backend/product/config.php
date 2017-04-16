<div class="row">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo isset($title)?$title:'';?></h3>
        </div>
        <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
            <div class="form-group">
                <label class="control-label">Số lượng SP/trang</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="number" class="form-control" name="number_page" id="number_page" value="<?php echo isset($product_config['number_page'])?$product_config['number_page']:'';?>">
                </div>
            </div>
            </div>
            <div class="col-md-2">
            <div class="form-group">
                <label class="control-label">Giá</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="price" id="price" value="<?php echo isset($product_config['price'])?$product_config['price']:'';?>">
                </div>
            </div>
            </div>
            <div class="clear"></div>
            <div class="col-md-2">
            <div class="form-group">
                <label class="control-label">Hình (Chiều dài)</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="width" id="width" value="<?php echo isset($product_config['width'])?$product_config['width']:'';?>">
                </div>
            </div>
            </div>
            <div class="col-md-2">
            <div class="form-group">
                <label class="control-label">Hình (Chiều rộng)</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                    <input type="text" class="form-control" name="height" id="height" value="<?php echo isset($product_config['height'])?$product_config['height']:'';?>">
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
          <div class="box-footer">
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Lưu</a>
            <a href="admin/product/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
          </div>
      </div>
    </div>
    </form>
</div>