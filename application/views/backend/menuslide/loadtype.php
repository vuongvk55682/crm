<?php if(isset($menuslide) && $menuslide!=NULL){ ?>
    <?php foreach($menuslide as $key => $val){ ?>
    <tr> 
      <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
      <td><a href="admin/menuslide/edit/<?php echo $val['id']?>"><?php echo $val['name'];?></a></td>
      <td><?php echo $val['type_name'];?></td>
      <td class="div_center"><?php if($val['image']!=''){ ?> <img src="upload/menuslide/<?php echo $val['image'];?>" alt="" class="img_admin">
      <?php }?></td>
      <td><?php echo $val['url'];?></td>
      <td><?php echo $val['created'];?></td>
      <td class="div_center"><input class="sort div_center" name="sort" control="menuslide" value="<?php echo $val['sort'];?>" id="sort" size="5" seq="<?php echo $val['id']?>"></td>
      <td class="div_center publish"><a onClick="show(<?php echo $val['id']?>);" control="menuslide" title="Hiển thị" class="div_hienthi<?php echo $val['id']?> div_hienthi" divid="div_hienthi<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
        <?php if($val['publish'] == 0){ ?>
          <i class="fa fa-check-circle"></i>
        <?php }else{ ?>
          <i class="fa fa-circle"></i>
        <?php } ?></a>
      </td>
      <td class="div_center tool">
        <a href="admin/menuslide/edit/<?php echo $val['id']?>"><i class="fa fa-edit"></i></a>
        <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="menuslide"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    <?php } ?>
<?php } ?>