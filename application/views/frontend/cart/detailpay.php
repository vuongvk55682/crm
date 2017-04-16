<div class="order_detail">
<h1 class="title_main"><span><i class="fa fa-heartbeat"></i> <?php echo $title; ?></span></h1>
<div class="box-body">
    <div class="table-responsive">
    <table id="lstcart" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="div_center">Stt</th>
            <th class="div_center">Tên sản phẩm</th>
            <th class="div_center">Hình ảnh</th>
            <th class="div_center">Số lượng</th>
            <th class="div_center">Đơn giá</th>
            <th class="div_center">Khuyến mãi</th>
            <th class="div_center">Giá bán</th>
            <th class="div_center">Thành tiền</th>
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
                <td class="div_center"><?php echo $stt;?></td>
                <td class="left"><?php echo $val_cart['product']['name'];?></td>
                <td class="div_center"><img src="<?php echo $img_cart;?>" alt="<?php echo $val_cart['product']['name'];?>"></td>
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
        </tbody>
        <?php } ?>
    </table>
    </div>
    
</div>
<div class="box-footer">
  <a href="don-hang.html" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở lại đơn hàng</a>
</div>
</div>
