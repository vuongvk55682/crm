<?php if (isset($nhomkh) && $nhomkh != NULL) { ?>
  <?php foreach ($nhomkh as $key => $val) { ?>
    <option value="<?php echo $val['_id'] ?>"><?php echo $val['nhomkh_ten']; ?></option>
  <?php } ?>
<?php } ?>