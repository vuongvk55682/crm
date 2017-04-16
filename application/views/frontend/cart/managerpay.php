<div class="list_cart">
  	<h1 class="title_main"><span><i class="fa fa-heartbeat"></i> <?php echo $title; ?></span></h1>
  	<div class="box-body">
  	<?php if(isset($order) && $order!=NULL){ ?>
  	<div class="table-responsive">
  	   <table id="example1" class="table table-bordered table-striped">
	        <thead>
	            <tr>
	                <th class="div_center">Mã đơn hàng</th> 
	                <th class="div_center">Đơn hàng</th> 
	                <th class="div_center">Khách hàng</th> 
	                <th class="div_center">Điện thoại</th>
	                <th class="div_center">Email</th> 
	                <th class="div_center">Thanh toán</th>
	                <th class="div_center">Ngày đặt hàng</th>
	            </tr>
	        </thead>
	        <tbody id="div_load">
	            <?php foreach($order as $key => $val){ 
	                    $method = '';
	                    if($val['method'] == 1){
	                        $method = 'Chuyển khoản';
	                    }else if($val['method'] == 2){
	                        $method = 'Thanh toán khi nhận hàng';
	                    }else{
	                        $method = 'Không xác định';
	                    }
	                ?>
	                <tr> 
	                  <td><?php echo $val['code'];?></td>
	                  <td class="div_center"><a href="don-hang-chi-tiet.html?id=<?php echo $val['id'];?>" class="label label-success" control="order" id="<?php echo $val['id']?>">Xem</a></td>
	                  <td><?php echo $val['fullname'];?></td>
	                  <td><?php echo $val['phone'];?></td>
	                  <td><?php echo $val['email'];?></td>
	                  <td><?php echo $method;?></td>
	                  <td><?php echo $val['created'];?></td>
	                </tr>
	            <?php } ?>
	        </tbody>
	    </table>
	</div>
	<?php }else{ ?>
		<div class="col-md-12">
			Đơn hàng không tồn tại.Vui lòng kiểm tra lại thông tin hoặc liên hệ với chúng tôi để biết thêm chi tiết!
		</div>
	<?php } ?>
  	</div>
</div>

