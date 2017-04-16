<?php if(isset($danhmuc) && $danhmuc != NULL){ ?>
    <option selected="selected" value="chưa có danh mục">Chọn Danh mục</option>
    <?php foreach ($danhmuc as $key_danhmuc => $val_danhmuc) { ?>
      <option value="<?php echo $val_danhmuc['ten'];?>""><?php echo $val_danhmuc['ten'];?>
      </option>
    <?php } ?> 
<?php } ?>