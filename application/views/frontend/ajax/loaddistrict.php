<option value="">Chọn quận/huyện</option>
<?php if(isset($district) && !is_null($district)){ ?>
<?php foreach ($district as $key_district => $val_district) { ?>
      <option value="<?php echo $val_district['id'];?>"><?php echo $val_district['name'];?></option>
<?php } ?>
<?php } ?>