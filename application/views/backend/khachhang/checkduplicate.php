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
            <strong><?=$setname?> ĐÃ TỒN TẠI, VUI LÒNG KIỂM TRA LẠI !</strong>
          </span>
        </div>
        <div style="margin-top: 5px;">
          Trùng thông tin với khách hàng sau:
        </div>
        <div style="max-height: 300px;overflow: auto;">
          <table border="1" class="table table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th style="width: 26em;">Khách hàng</th>
                <th>Người phụ trách</th>
              </tr>
            </thead>
            <tbody>
            <?php if (isset($check_duplicate) && $check_duplicate != NULL) { ?>
              <?php $i = 0 ?>
              <?php foreach ($check_duplicate as $key => $val) { 
                $i++;
              ?>
                <tr>
                  <td style="text-align: center;"> <?=$i?> </td>
                  <td><a style="display: block;" href="admin/khachhang/edit/<?=$val['_id']?>" target="_blank"> <?=$val['kh_ma']?> - <?=$val['kh_ten']?> </a></td>
                  <td style="text-align: center;">
                    <?php $nguoipt_ten = 'Chưa có người phụ trách'; 
                    foreach ($nguoipt as $key1 => $val1) { ?>
                      <?php if ($val1['_id'] == $val['gt_nguoipt']) {
                        $nguoipt_ten = $val1['nguoipt_ten'];
                      } ?>
                    <?php }?>
                    <?php echo $nguoipt_ten;?>
                  </td>
                </tr>
              <?php } ?>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cho phép trùng</button>
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