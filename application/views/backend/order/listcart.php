<div class="div_cart">
    <div class="title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Trả lời nhận xét<a id="close_cart"><i class="fa fa-close" aria-hidden="true"></i></a></div>
    <div class="clear"></div>
    <table id="lstcart" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Stt</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Khuyến mãi</th>
            <th>Giá bán</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <?php 
        $stt = 0;
        if(isset($cart) && $cart!=NULL){ ?>
        <tbody>
          <?php foreach ($cart as $key_cart => $val_cart){
              $stt += 1;
              $img_cart = base_url().'upload/product/thumb/'.$val_cart['product']['image_thumb'];
          ?>
              <tr>
                <td><?php echo $stt;?></td>
                <td class="left"><?php echo $val_cart['product']['name'];?></td>
                <td><img src="<?php echo $img_cart;?>" alt="<?php echo $val_cart['product']['name'];?>"></td>
                <td class="div_center"><?php echo $val_cart['number'];?></td>
                <td class="div_center"><?php echo number_format($val_cart['price']);?></td>
                <td class="div_center">- <?php echo $val_cart['percent'];?> %</td>
                <td class="div_center">
                <?php if($val_cart['price_sale'] > 0){ ?>
                  <?php echo number_format($val_cart['price_sale']);?>
                <?php }else{ ?>
                  <?php echo number_format($val_cart['price']);?>
                <?php } ?>
                </td>
                <td class="div_center"><?php echo number_format($val_cart['total']);?></td>
              </tr>
          <?php } ?>
          <tr>
            <td class="right"><strong>Total</strong></td>
            <td class="right total"><strong><?php echo number_format($sum_total);?> vnđ</strong> </td>
            <td colspan="6">
            </td>
          </tr>
          <?php if($order['name_company'] != '' && $order['tax_company'] != ''){ ?>
          <tr>
            <td colspan="8" style="color:#F00;"><strong>Yêu cầu xuất hóa đơn</strong></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Tên công tin</strong></td>
            <td colspan="6"><strong><?php echo $order['name_company'];?></strong></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Mã số thuế</strong></td>
            <td colspan="6"><strong><?php echo $order['tax_company'];?></strong></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Địa chỉ</strong></td>
            <td colspan="6"><strong><?php echo $order['address_company'];?></strong></td>
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