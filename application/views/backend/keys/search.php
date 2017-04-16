<?php if(isset($keys) && $keys!=NULL){ ?>
    <?php foreach($keys as $key => $val){ ?>
    <tr> 
      <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
      <td><a href="admin/keys/edit/<?php echo $val['id']?>"><?php echo $val['name'];?></a></td>
      <td class="div_center"><?php echo $val['key'];?></td>
      <td><?php echo $val['created'];?></td>
      <td class="div_center publish"><a onClick="show(<?php echo $val['id']?>);" control="keys" title="Hiển thị" class="div_hienthi<?php echo $val['id']?> div_hienthi" divid="div_hienthi<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
        <?php if($val['publish'] == 0){ ?>
          <i class="fa fa-check-circle"></i>
        <?php }else{ ?>
          <i class="fa fa-circle"></i>
        <?php } ?></a>
      </td>
      <td class="div_center tool">
        <a href="admin/keys/edit/<?php echo $val['id']?>"><i class="fa fa-edit"></i></a>
        <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="keys"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
<?php } ?>