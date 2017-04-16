<div class="sentmail">
	<div class="title"><?php echo isset($data_index['_keys']['register_mail'])?$data_index['_keys']['register_mail']:'';?></div>
	<form id="frm_mail" method="post" action="gui-mail.html">
		<div class="col-md-10 col-sm-10 col-xs-10"><div class="row">
		<div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                <input type="text" class="form-control" id="mail" name="mail" placeholder="<?php echo isset($data_index['_keys']['enter_email'])?$data_index['_keys']['enter_email']:'';?>">
            </div>
        </div>
        </div></div>
        <div class="col-md-2 col-sm-2 col-xs-2"><div class="row">
        	<a class="btn bg-maroon btn-flat clk_checkmail" onClick="return checksentmail_f();"><?php echo isset($data_index['_keys']['send'])?$data_index['_keys']['send']:'';?></a>
            <a style="display: none;" id="clkmyMail" data-toggle="modal" data-target="#myMail" ></a>
        </div></div>
	</form>
</div>
<div class="modal fade" id="myMail" style="margin-top: 50px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel"> Thông báo</h5>
              </div>
              <div class="modal-body">
                    Gửi mail thành công. Vui lòng xác nhận để hoàn tất!
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success btn-flat btn_sentmail"><i class="fa fa-unlock-alt"></i> Xác nhận</button>
              </div>
        </div>
    </div>
</div>
