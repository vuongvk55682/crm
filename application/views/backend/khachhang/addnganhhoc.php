<?php if (isset($nganhhoc) && $nganhhoc != NULL) { ?>
  <?php foreach ($nganhhoc as $key => $val) { ?>
    <option value="<?php echo $val['_id'] ?>"><?php echo $val['nganhhoc_ten']; ?></option>
  <?php } ?>
<?php } ?>