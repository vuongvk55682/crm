<?php if(isset($contact) && $contact!=NULL){ ?>
    <?php foreach($contact as $key => $val){ ?>
    <tr> 
      <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
      <td><?php echo $val['fullname'];?></td>
      <td><?php echo $val['phone'];?></td>
      <td><?php echo $val['email'];?></td>
      <td><?php echo $val['created'];?></td>
      <td class="div_center publish">
        <?php if($val['status'] == 0){ ?>
           <span class="label label-danger">Mới</span>
        <?php }else{ ?>
          <span class="label label-success">Đã xem</span>
        <?php } ?>
      </td>
      <td class="div_center tool">
        <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="contact"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
<?php } ?>