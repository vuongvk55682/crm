<?php if (isset($nguonkh) && $nguonkh != NULL) { ?>
  <?php foreach ($nguonkh as $key => $val) { ?>
    <option value="<?php echo $val['_id'] ?>"><?php echo $val['nguonkh_ten']; ?></option>
  <?php } ?>
<?php } ?>