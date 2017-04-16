<div class="row" ng-app="myApp">
    <form id="frm-admin" method="post" action="" enctype="multipart/form-data">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-sitemap" aria-hidden="true"></i> <?php echo isset($title)?$title:'';?></h3>
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
        <div class="col-md-12"><div class="row">
            <div class="box-body">
                <input type="hidden" name="id" id="id">
                
                <div class="form-group">
                    <label for="name">File sitemap</label>
                    <span class="btn btn-primary btn-file btn-sm">
                        Browse <input type="file" name="sitemap" id="sitemap">
                    </span>
                </div>
            </div><!-- /.box-body -->
        </div></div>

        <div class="clear"></div>
        <div class="box-footer">
            <a href="admin/system/create_sitemap" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Tạo sitemap</a>
            <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Upload</a>
        </div>
      </div>
    </div>
    </form>
</div>