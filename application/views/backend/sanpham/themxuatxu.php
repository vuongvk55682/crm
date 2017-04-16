<?php if(isset($xuatxu) && $xuatxu != NULL){ ?>
    <option selected="selected" value="Chưa có xuất xứ">Chọn Xuất xứ</option>
    <?php foreach ($xuatxu as $key_xuatxu => $val_xuatxu) { ?>
      <option value="<?php echo $val_xuatxu['ten'];?>"><?php echo $val_xuatxu['ten'];?></option>
    <?php } ?> 
<?php } ?>