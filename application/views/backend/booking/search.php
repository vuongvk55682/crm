<?php if(isset($booking) && $booking!=NULL){ ?>
    <?php foreach($booking as $key => $val){ ?>
    <tr> 
      <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
      <td class="div_center"><a class="label label-success vieworder" control="booking" id="<?php echo $val['id']?>">Xem</a></td>
      <td><?php echo $val['fullname'];?></td>
      <td><?php echo $val['phone'];?></td>
      <td><?php echo $val['email'];?></td>
      <td><?php echo $val['ngaynhan'];?></td>
      <td><?php echo $val['ngaytra'];?></td>
      <td><?php echo $val['nguoilon'];?></td>
      <td><?php echo $val['treem'];?></td>
      <td><?php echo $val['dem'];?></td>
      <td><?php echo $val['created'];?></td>
      
      <td class="div_center publish"><a onClick="status(<?php echo $val['id']?>);" control="booking" title="Trạng thái" class="div_status<?php echo $val['id']?> div_status" divid="div_status<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
        <?php if($val['status'] == 0){ ?>
           <span class="label label-danger">Chưa xử lý</span>
        <?php }else{ ?>
          <span class="label label-success">Đã xử lý</span>
        <?php } ?></a>
      </td>
      <td class="div_center tool">
        <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="booking"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
<?php } ?>