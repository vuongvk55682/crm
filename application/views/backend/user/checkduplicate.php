<a id="launch_modal" data-toggle="modal" data-target="#load_check" data-backdrop="static" data-keyboard="false"></a>
<div class="modal fade" id="load_check" tabindex="-1" role="dialog" aria-labelledby="load_checkLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="color: #FFF; margin: 0px;font-weight: 800;">THÔNG BÁO</h4>
      </div>
      <div class="modal-body">
        <div>
          <span style="color: red;">
            <strong><?=$setname?> ĐÃ TỒN TẠI !</strong>
          </span>
        </div>
        <div style="margin-top: 5px;">
          Trùng thông tin với tài khoản sau:
        </div>
        <div style="max-height: 300px;overflow: auto;">
          <table border="1" class="table table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th style="width: 26em;">Tài khoản</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
            <?php if (isset($check_duplicate) && $check_duplicate != NULL) { ?>
              <?php $i = 0 ?>
              <?php foreach ($check_duplicate as $key => $val) { 
                $i++;
                ($val['email'] != '')? $email = $val['email']:$email = 'Chưa có Email' ;
              ?>
                <tr>
                  <td style="text-align: center;"> <?=$i?> </td>
                  <td ><a style="display: block;" href="#" target="_blank"> <?=$val['username']?> </a></td>
                  <td style="text-align: center;"> <?=$email?> </td>
                </tr>
              <?php } ?>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <?php if ($setname == "TÀI KHOẢN") { ?>
          <button type="button" class="btn btn-primary" data-dismiss="modal" disabled="disabled">Cho phép trùng</button>
        <?php } else { ?>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cho phép trùng</button>
        <?php } ?>
        
        <a class="btn btn-default" id="disallow_duplicate" data-dismiss="modal">Đóng</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#disallow_duplicate').click(function(){
      $('#<?=$fieldsdup?>').val('');
    });
    
  });
</script>