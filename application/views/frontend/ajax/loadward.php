<option value="">Chọn phường/xã</option>
<?php if(isset($ward) && !is_null($ward)){ ?>
<?php foreach ($ward as $key_ward => $val_ward) { ?>
      <option value="<?php echo $val_ward['id'];?>"><?php echo $val_ward['name'];?></option>
<?php } ?>
<?php } ?>