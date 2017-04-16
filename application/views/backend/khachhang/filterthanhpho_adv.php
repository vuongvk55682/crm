<select class="form-control" name="kh_quanhuyen_adv" id="kh_quanhuyen_adv" data-placeholder="Chọn Quận/Huyện">
  <option value="0">Chọn Quận/Huyện</option>
  <?php if (isset($quanhuyen) && $quanhuyen != NULL) { ?>
    <?php foreach ($quanhuyen as $key => $val) { ?>
      <option value="<?php echo $val['_id'] ?>"><?php echo $val['quanhuyen_ten'] ?></option>}
    <?php } ?>
  <?php } ?>
</select>
