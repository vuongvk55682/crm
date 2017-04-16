<div class="div_cart">
    <div class="title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Loại phòng khách hàng đặt<a id="close_cart"><i class="fa fa-close" aria-hidden="true"></i></a></div>
    <div class="clear"></div>
    <table id="lstcart" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Stt</th>
            <th>Loại phòng</th>
            <th>Giá</th>
            <th>Tiện nghi</th>
            <th>Số người</th>
            <th>Số lượng</th>
          </tr>
        </thead>
        <?php 
        $stt = 0;
        if(isset($phong) && $phong!=NULL){ ?>
        <tbody>
          <?php foreach ($phong as $key_phong => $val_phong){ 
            $stt = $key_phong + 1;
          ?>
              <tr>
                <td><?php echo $stt;?></td>
                <td class="left"><?php echo $val_phong['name'];?></td>
                <td class="left"><?php echo number_format($val_phong['gia']);?><sup>đ</sup></td>
                <td class="div_center">
                    <?php if(isset($val_phong['tiennghi']) && $val_phong['tiennghi'] != NULL){ ?>
                      <?php foreach ($val_phong['tiennghi'] as $key_tiennghi => $val_tiennghi) { ?>
                          <img src="upload/tiennghi/<?php echo $val_tiennghi;?>" alt="<?php echo $val_phong['name'];?>"/>
                      <?php } ?>
                    <?php } ?>
                </td>
                <td class="div_center">
                    <?php for ($i=0; $i < $val_phong['songuoi']; $i++) { ?>
                        <i class="fa fa-user" aria-hidden="true"></i>
                    <?php } ?></td>
                <td class="div_center"><?php echo $val_phong['soluong'];?></td>
                
              </tr>
          <?php } ?>
        </tbody>
        <?php } ?>
    </table>
</div>
<script src="public/bootstrap/js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#close_cart').click(function(){
        $('#div_load_cart').removeClass('div_load_cart');
    });
  });
</script>