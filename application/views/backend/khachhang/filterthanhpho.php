<!-- Select2 -->
<link href="public/select2/select2.min.css" rel="stylesheet" type="text/css" />
<script src="public/select2/select2.full.min.js" type="text/javascript"></script>

<select class="form-control select2" name="kh_quanhuyen" id="kh_quanhuyen" data-placeholder="Chọn Quận/Huyện">
  <option value="0">Chọn Quận/Huyện</option>
  <?php if (isset($quanhuyen) && $quanhuyen != NULL) { ?>
    <?php foreach ($quanhuyen as $key => $val) { ?>
      <option value="<?php echo $val['_id'] ?>"><?php echo $val['quanhuyen_ten'] ?></option>}
    <?php } ?>
  <?php } ?>
</select>

<script type="text/javascript">
  $(document).ready(function(){
	$(".select2").select2();
  });
</script>

