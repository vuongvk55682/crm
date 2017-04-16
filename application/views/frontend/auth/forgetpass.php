<div class="list_register">
	<h1 class="title_main"><span><i class="fa fa-heartbeat"></i> <?php echo $title; ?></span></h1>
	<div class="clear"></div>
	<form onsubmit="return checklogin();" name="myForm" id="frm" method="post" action="" enctype="multipart/form-data">
          <div class="box-body">
            <?php echo isset($data_index['forgetpass']['content'])?$data_index['forgetpass']['content']:'';?>
          	<div class="clear"></div>
          	<div class="col-md-12">
          	<div class="row">
                <div class="col-md-6">
                <div class="row">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                        <input control="auth" onchange="return checkemail(this);" class="form-control" name="lg_email" id="email">
                    </div>
                </div>
                </div>
                </div>
                <div class="col-md-3">
                      <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Gửi</a>
                      <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Hủy</a>
                </div>
            </div>
            </div>

          </div><!-- /.box-body -->
        </div>
    </form>
</div>