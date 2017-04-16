<?php if(isset($donvi) && $donvi != NULL){ ?>
    <option selected="selected" value="Chưa có đơn vị">Chọn đơn vị</option>
    <?php foreach ($donvi as $key_donvi => $val_donvi) { ?>
      <option value="<?php echo $val_donvi['ten'];?>"><?php echo $val_donvi['ten'];?></option>
    <?php } ?> 
<?php } ?>