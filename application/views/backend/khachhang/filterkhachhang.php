<?php if(isset($khachhang) && $khachhang!=NULL){ ?>
  <?php $i = 0; ?>
  <?php foreach($khachhang as $key => $val){ 
    $i++;
    if ($val['kh_gioitinh'] == 2) { $_gioitinh = "Nữ"; } else { $_gioitinh = "Nam"; }
    if (isset($val['kh_sinhnhat']) && $val['kh_sinhnhat'] != '0') {
      $date1 =  date('d/m/Y', $val['kh_sinhnhat']->sec);
      } else { $date1 = ''; }
    if (isset($val['kh_anh_thumb']) && $val['kh_anh_thumb'] != NULL) { $_kh_anh_thumb = $val['kh_anh_thumb']; } else { $_kh_anh_thumb = ''; }
    if (isset($val['created'])) { $created_str = date('d-m-Y H:i:s', $val['created']->sec); } else { $created_str = ''; }
    if (isset($val['updated'])) { $updated_str = date('d-m-Y H:i:s', $val['updated']->sec); } else { $updated_str = ''; }
  ?>
  <tr> 
    <td class="div_center">
      <input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id'];?>">
    </td>
    <td class="div_center"><?php echo $i ?></td>
    <td class="kh_ten_1"><a href="admin/khachhang/edit/<?php echo $val['_id']?>"><?php echo $val['kh_ten'];?></a></td>
    <td class="kh_dienthoai_1"><?php echo $val['kh_dienthoai']; ?></td>
    <td class="kh_logo_1"><?php echo $val['kh_logo']; ?></td>
    <td class="kh_diachi_1"><?php echo $val['kh_diachi']; ?></td>
    <td class="kh_email_1"><?php echo $val['kh_email']; ?></td>
    <td class="kh_fax_1"><?php echo $val['kh_fax']; ?></td>
    <td class="kh_sothich_1"><?php echo $val['kh_sothich']; ?></td>
    <td class="kh_ma_1"><?php echo $val['kh_ma']; ?></td>
    <td class="kh_cmnd_1"><?php echo $val['kh_cmnd']; ?></td> 
    <td class="kh_sinhnhat_1"><?php echo $date1; ?></td> 
    <td class="kh_gioitinh_1"><?php echo $_gioitinh; ?></td> 
    <td class="kh_tinhthanhpho_1">
      <?php if (isset($tinhthanhpho) && $tinhthanhpho != NULL) { ?>
        <?php foreach ($tinhthanhpho as $key1 => $val1) { ?>
          <?php if ($val1['_id'] == $val['kh_tinhthanhpho']) {
            echo $val1['tinhthanhpho_ten'];
          } ?>
        <?php } ?>
      <?php } ?>
    </td> 
    <td class="kh_quanhuyen_1">
      <?php if (isset($quanhuyen) && $quanhuyen != NULL) { ?>
        <?php foreach ($quanhuyen as $key1 => $val1) { ?>
          <?php if ($val1['_id'] == $val['kh_quanhuyen']) {
            echo $val1['quanhuyen_ten'];
          } ?>
        <?php } ?>
      <?php } ?>
    </td> 
    <td class="kh_nganhhoc_1">
      <?php if (isset($nganhhoc)&& $nganhhoc != NULL) { ?>
        <?php $nganhhoc_str = ''; ?>
        <?php foreach ($nganhhoc as $key1 => $val1) { ?>
          <?php foreach ($khachhang_nganhhoc as $key2 => $val2) { ?>
            <?php if ($val2['id_nganhhoc'] == $val1['_id'] && $val2['id_khachhang'] == $val['_id']) {
              $nganhhoc_str .= $val1['nganhhoc_ten'].", ";
            } ?>
          <?php } ?>
        <?php } ?>
        <?php echo substr($nganhhoc_str,0,-2); ?>
      <?php } ?>
    </td>
    <td class="kh_anh_1" style="text-align: center;"><img src="upload/khachhang/thumb/<?php echo $_kh_anh_thumb; ?>" alt=""></td>
    <td class="kh_website_1"><?php echo $val['kh_website']; ?></td> 
    <td class="kh_mota_1"><?php echo $val['kh_mota']; ?></td> 

    <td class="lienhe_1"><?php echo $val['sum_lienhe']; ?></td> 

    <td class="gt_ten_1"><?php echo $val['gt_ten']; ?></td> 
    <td class="gt_nguoipt_1">
      <?php if (isset($nguoipt) && $nguoipt != NULL) { ?>
        <?php foreach ($nguoipt as $key1 => $val1) { ?>
          <?php if ($val1['_id'] == $val['gt_nguoipt']) {
            echo $val1['nguoipt_ten'];
          } ?>
        <?php } ?>
      <?php } ?>
    </td> 
    <td class="gt_nhomkh_1">
      <?php if (isset($nhomkh)&& $nhomkh != NULL) { ?>
        <?php $nhomkh_str = ''; ?>
        <?php foreach ($nhomkh as $key1 => $val1) { ?>
          <?php foreach ($khachhang_nhomkh as $key2 => $val2) { ?>
            <?php if ($val2['id_nhomkhachhang'] == $val1['_id'] && $val2['id_khachhang'] == $val['_id']) {
              $nhomkh_str .= $val1['nhomkh_ten'].", ";
            } ?>
          <?php } ?>
        <?php } ?>
        <?php echo substr($nhomkh_str,0,-2); ?>
      <?php } ?>
    </td>
    <td class="gt_nguonkh_1">
      <?php if (isset($nhomkh)&& $nhomkh != NULL) { ?>
        <?php $nguonkh_str = ''; ?>
        <?php foreach ($nguonkh as $key1 => $val1) { ?>
          <?php foreach ($khachhang_nguonkh as $key2 => $val2) { ?>
            <?php if ($val2['id_nguonkhachhang'] == $val1['_id'] && $val2['id_khachhang'] == $val['_id']) {
              $nguonkh_str .= $val1['nguonkh_ten'].", ";
            } ?>
          <?php } ?>
        <?php } ?>
        <?php echo substr($nguonkh_str,0,-2); ?>
      <?php } ?>
    </td> 
    <td class="gt_moiqh_1">
      <?php if (isset($moiqh) && $moiqh != NULL) { ?>
        <?php foreach ($moiqh as $key1 => $val1) { ?>
          <?php if ($val1['_id'] == $val['gt_moiqh']) {
            echo $val1['moiqh_ten'];
          } ?>
        <?php } ?>
      <?php } ?>
    </td> 
    <td><?php echo $created_str; ?></td>
    <td><?php echo $updated_str; ?></td>
    <td class="div_center publish"><a onClick="show('<?php echo $val['_id']?>');" control="khachhang" title="Hiển thị" class="div_hienthi<?php echo $val['_id']?> div_hienthi" divid="div_hienthi<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>">
      <?php if($val['publish'] == 0){ ?>
        <i class="fa fa-check-circle"></i>
      <?php }else{ ?>
        <i class="fa fa-circle"></i>
      <?php } ?></a>
    </td>
    <td class="div_center tool">
      <a href="admin/khachhang/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
      <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']; ?>" seq="<?php echo $val['_id']; ?>" control="khachhang"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
  <?php } ?>
<?php } ?>
<script type="text/javascript">
  $(document).ready(function(){
    $(function () {
      if ($('#kh_ten').is(":checked"))        { $('.kh_ten_1').show() }else{ $('.kh_ten_1').hide() }
      if ($('#kh_dienthoai').is(":checked"))  { $('.kh_dienthoai_1').show() }else{ $('.kh_dienthoai_1').hide() }
      if ($('#kh_logo').is(":checked"))       { $('.kh_logo_1').show() }else{ $('.kh_logo_1').hide() }
      if ($('#kh_diachi').is(":checked"))     { $('.kh_diachi_1').show() }else{ $('.kh_diachi_1').hide() }
      if ($('#kh_email').is(":checked"))      { $('.kh_email_1').show() }else{ $('.kh_email_1').hide() }
      if ($('#kh_fax').is(":checked"))        { $('.kh_fax_1').show() }else{ $('.kh_fax_1').hide() }
      if ($('#kh_sothich').is(":checked"))    { $('.kh_sothich_1').show() }else{ $('.kh_sothich_1').hide() }
      if ($('#kh_ma').is(":checked"))         { $('.kh_ma_1').show() }else{ $('.kh_ma_1').hide() }
      if ($('#kh_cmnd').is(":checked"))       { $('.kh_cmnd_1').show() }else{ $('.kh_cmnd_1').hide() }
      if ($('#kh_sinhnhat').is(":checked"))   { $('.kh_sinhnhat_1').show() }else{ $('.kh_sinhnhat_1').hide() }
      if ($('#kh_gioitinh').is(":checked"))   { $('.kh_gioitinh_1').show() }else{ $('.kh_gioitinh_1').hide() }
      if ($('#kh_tinhthanhpho').is(":checked")) { $('.kh_tinhthanhpho_1').show() }else{ $('.kh_tinhthanhpho_1').hide() }
      if ($('#kh_quanhuyen').is(":checked"))  { $('.kh_quanhuyen_1').show() }else{ $('.kh_quanhuyen_1').hide() }
      if ($('#kh_nganhhoc').is(":checked"))   { $('.kh_nganhhoc_1').show() }else{ $('.kh_nganhhoc_1').hide() }
      if ($('#kh_anh').is(":checked"))        { $('.kh_anh_1').show() }else{ $('.kh_anh_1').hide() }
      if ($('#kh_website').is(":checked"))    { $('.kh_website_1').show() }else{ $('.kh_website_1').hide() }
      if ($('#kh_mota').is(":checked"))       { $('.kh_mota_1').show() }else{ $('.kh_mota_1').hide() }
      if ($('#lienhe').is(":checked"))        { $('.lienhe_1').show() }else{ $('.lienhe_1').hide() }
      if ($('#gt_ten').is(":checked"))        { $('.gt_ten_1').show() }else{ $('.gt_ten_1').hide() }
      if ($('#gt_nguoipt').is(":checked"))    { $('.gt_nguoipt_1').show() }else{ $('.gt_nguoipt_1').hide() }
      if ($('#gt_nhomkh').is(":checked"))     { $('.gt_nhomkh_1').show() }else{ $('.gt_nhomkh_1').hide() }
      if ($('#gt_nguonkh').is(":checked"))    { $('.gt_nguonkh_1').show() }else{ $('.gt_nguonkh_1').hide() }
      if ($('#gt_moiqh').is(":checked"))      { $('.gt_moiqh_1').show() }else{ $('.gt_moiqh_1').hide() }
    });
  });
</script>
