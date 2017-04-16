<script type="text/javascript">
   $(document).ready(function(){
      $('#paypal').click();
   });  
</script>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
      <!-- Nhập địa chỉ email người nhận tiền (người bán) -->
      <input type="hidden" name="business" value="lmhieu2104@gmail.com">

      <!-- tham số cmd có giá trị _xclick chỉ rõ cho paypal biết là người dùng nhất nút thanh toán -->
      <input type="hidden" name="cmd" value="_xclick">

      <!-- Thông tin mua hàng. -->
      <input type="hidden" name="item_name" value="Ma: <?php echo isset($order['code'])?$order['code']:'';?>">
      <!--Trị giá của giỏ hàng, vì paypal không hỗ trợ tiền việt nên phải đổi ra tiền $-->
      <input type="hidden" name="amount" placeholder="Nhập số tiền vào" value="<?php echo isset($order['total_price'])?$order['total_price']:'';?>">
      <!--Loại tiền-->
      <input type="hidden" name="currency_code" value="USD">
      <!--Đường link mình cung cấp cho Paypal biết để sau khi xử lí thành công nó sẽ chuyển về theo đường link này-->
      <input type="hidden" name="return" value="http://localhost/demothanhtoanonline/thanhcong.html">
      <!--Đường link mình cung cấp cho Paypal biết để nếu  xử lí KHÔNG thành công nó sẽ chuyển về theo đường link này-->
      <input type="hidden" name="cancel_return" value="http://localhost/demothanhtoanonline/loi.html">
      <!-- Nút bấm. -->
      <input style="display:none;" type="submit" name="submit" id="paypal" value="Thanh toán quay Paypal">
</form>