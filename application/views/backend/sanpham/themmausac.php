<?php if(isset($mausac) && $mausac != NULL){ ?>
    <option selected="selected" value="Chưa có đơn vị">Chọn đơn vị</option>
    <?php foreach ($mausac as $key_mausac => $val_mausac) { ?>
      <option value="<?php echo $val_mausac['ten'];?>"><?php echo $val_mausac['ten'];?></option>
    <?php } ?> 
<?php } ?>