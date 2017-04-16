<?php if(isset($phong) && $phong!=NULL){ ?>
<?php foreach($phong as $key => $val){ ?>
<tr> 
  <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
  <td><a href="admin/phong/edit/<?php echo $val['id']?>"><?php echo $val['name'];?></a></td>
  <td><?php echo $val['songuoi'];?></td>
  <td>
  <?php if(isset($val['tiennghi']) && $val['tiennghi'] != NULL){ ?>
      <?php foreach ($val['tiennghi'] as $key_tiennghi => $val_tiennghi) { ?>
          <img src="upload/tiennghi/<?php echo $val_tiennghi;?>" alt="<?php echo $val['name'];?>"/>
      <?php } ?>
  <?php } ?> 
  </td>
  <td class="div_center"><?php if($val['image_thumb']!=''){ ?> <img src="upload/phong/thumb/<?php echo $val['image_thumb'];?>" alt="" class="img_admin">
  <?php }?></td>
  
  
  <td class="div_center publish"><a onClick="show(<?php echo $val['id']?>);" control="phong" title="Hiển thị" class="div_hienthi<?php echo $val['id']?> div_hienthi" divid="div_hienthi<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
    <?php if($val['publish'] == 0){ ?>
      <i class="fa fa-check-circle"></i>
    <?php }else{ ?>
      <i class="fa fa-circle"></i>
    <?php } ?></a>
  </td>
  
  <td class="div_center tool">
    <a href="admin/phong/edit/<?php echo $val['id']?>"><i class="fa fa-edit"></i></a>
    <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="phong"><i class="fa fa-trash"></i></a>
  </td>
</tr>
<?php } ?>
<?php } ?>