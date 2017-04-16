<?php if(isset($nhasanxuat) && $nhasanxuat != NULL){ ?>
    <option selected="selected" value="chưa có nhà sản xuất">Chọn nhà sản xuất</option>
    <?php foreach ($nhasanxuat as $key_nhasanxuat => $val_nhasanxuat) { ?>
      <option value="<?php echo $val_nhasanxuat['ten'];?>"><?php echo $val_nhasanxuat['ten'];?></option>
    <?php } ?> 
<?php } ?>