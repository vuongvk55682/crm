<?php if(isset($order) && $order!=NULL){ ?>
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
      <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
      <td><?php echo $val['code'];?></td>
      <td class="div_center"><a class="label label-success vieworder" control="order" id="<?php echo $val['id']?>">Xem</a></td>
      <td><?php echo $val['fullname'];?></td>
      <td><?php echo $val['phone'];?></td>
      <td><?php echo $val['email'];?></td>
      <td><?php echo $method;?></td>
      <td><?php echo $val['created'];?></td>
      <td class="div_center publish"><a onClick="status(<?php echo $val['id']?>);" control="order" title="Trạng thái" class="div_status<?php echo $val['id']?> div_status" divid="div_status<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
        <?php if($val['status'] == 0){ ?>
           <span class="label label-danger">Chưa xử lý</span>
        <?php }else{ ?>
          <span class="label label-success">Đã xử lý</span>
        <?php } ?></a>
      </td>
      <td class="div_center tool">
        <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="order"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
<?php } ?>