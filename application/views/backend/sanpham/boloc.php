
<?php if(isset($sanpham) && $sanpham != NULL){ ?>

<div id="<?php echo $id?>" class="tab-pane fade in active table-responsive">
	<table class="table table-bordered table-striped">

		<thead>
      <tr>
          <th class="div_center"><input type="checkbox" class="check-all"></th>
          <th class="div_center">#</th> 
         
            <th id="cols-1" class="div_center inmavach_1">In mã vạch<div id="cols-1-sizer"></div></th> 
          
          
            <th id="cols-2" class="div_center tonkho_1">Tồn kho<div id="cols-2-sizer"></div></th>
          
          
            <th id="cols-3" class="div_center hinhanh_sp_1">Hình ảnh 1<div id="cols-3-sizer"></div></th>
          
          
            <th id="cols-4" class="div_center ma_sp_1">Mã sản phẩm<div id="cols-4-sizer"></div></th>
          
            <th id="cols-5" class="div_center ten_sp_1">Tên sản phẩm<div id="cols-5-sizer"></div></th>  
          
            <th id="cols-6" class="div_center danhmuc_sp_1">danh mục<div id="cols-6-sizer"></div></th> 
         
            <th id="cols-7" class="div_center donvi_1">đơn vị<div id="cols-7-sizer"></div></th>
         
            <th id="cols-8" class="div_center nhasanxuat_1">nhà sản xuất<div id="cols-8-sizer"></div></th>
          
            <th id="cols-9" class="div_center xuatxu_1">xuất xứ<div id="cols-9-sizer"></div></th>
         
            <th id="cols-10" class=" div_center mota_1">mô tả<div id="cols-10-sizer"></div></th>
         
            <th id="cols-11" class=" div_center ngaysanxuat_1">Ngày sản xuất<div id="cols-11-sizer"></div></th>
         
            <th id="cols-12" class=" div_center ngayhethan_1">Ngày hết hạn<div id="cols-12-sizer"></div></th>
          
            <th id="cols-13" class=" div_center mausac_1">Màu sắc<div id="cols-13-sizer"></div></th>
         
            <th id="cols-14" class=" div_center giabanle_1">giá bán lẻ<div id="cols-14-sizer"></div></th>
        
            <th id="cols-15" class=" div_center chietkhaugiabanle_1">chiết khấu giá bán lẻ<div id="cols-15-sizer"></div></th>
          
            <th id="cols-16" class=" div_center giabanbuon_1">giá bán buôn<div id="cols-16-sizer"></div></th>

            <th id="cols-17" class=" div_center chietkhaugiabanbuon_1">chiết khấu giá bán buôn<div id="cols-17-sizer"></div></th>
         
            <th id="cols-18" class=" div_center giabanonline_1">giá bán online<div id="cols-18-sizer"></div></th>

            <th id="cols-19" class=" div_center chietkhaugiabanonline_1">chiết khấu online<div id="cols-19-sizer"></div></th>
        
            <th id="cols-20" class=" div_center giamua_1">giá mua<div id="cols-20-sizer"></div></th>
        
            <th id="cols-21" class=" div_center chietkhaugiamua_1">chiết khấu giá mua<div id="cols-21-sizer"></div></th>
         
            <th id="cols-22" class=" div_center giakhuyenmai_1">giá khuyến mại<div id="cols-22-sizer"></div></th> 
        
            <th id="cols-23" class=" div_center giadoitac_1">giá đối tác<div id="cols-23-sizer"></div></th>
        
            <th id="cols-24" class=" div_center giaxuatxuong_1">giá xuất xưởng<div id="cols-24-sizer"></div></th>

            <th id="cols-25" class=" div_center huong_1">Hướng<div id="cols-25-sizer"></div></th>

            <th id="cols-26" class=" div_center EMEI_1">EMEI<div id="cols-26-sizer"></div></th>

            <th id="cols-27" class=" div_center lienhelancuoi_1">Liên hệ lần cuối<div id="cols-27-sizer"></div></th> 
         
            <th id="cols-28" class=" div_center thaotac_1">thao tác<div id="cols-28-sizer"></div></th>

      </tr>
    </thead>

    <tbody>
      <?php if(isset($sanpham) && $sanpham!=NULL){ ?>
        <?php $i=0;
        foreach($sanpham as $key => $val){ 
          $i++;
          if (isset($val['hinhanh_thumb']) && $val['hinhanh_thumb'] != NULL) { $_hinhanh_thumb = $val['hinhanh_thumb']; } else { $_hinhanh_thumb = ''; }
          if (isset($val['created'])) { $created_str = date('Y-m-d H:i:s', $val['created']); } else { $created_str = ''; }
          if (isset($val['updated'])) { $updated_str = date('Y-m-d H:i:s', $val['updated']); } else { $updated_str = ''; }
        ?>
        <tr> 
          <td class="div_center">
            <input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id'];?>">
          </td>
          <td><?php echo $i; ?></td>
          <td class="inmavach_1"><?php echo $val['inmavach']; ?></td>
          <td class="tonkho_1"><?php echo $val['tonkho']; ?></td>
          <td class="hinhanh_sp hinhanh_sp_1">
              <img src="upload/sanpham/detail/<?php echo $val['image'][0]; ?>" alt="">
          </td>
          <td class="ma_sp_1"><?php echo $val['ma_sp']; ?></td>
          <td class="ten_sp_1"><a href="admin/sanpham/showsanpham/<?php echo $val['_id']?>"><?php echo $val['ten_sp'];?></a></td>
          <td class="danhmuc_sp_1"><?php echo $val['danhmuc_sp']; ?></td>
          <td class="donvi_1"><?php echo $val['donvi']; ?></td>
          <td class="nhasanxuat_1"><?php echo $val['nhasanxuat']; ?></td>
          <td class="xuatxu_1"><?php echo $val['xuatxu']; ?></td>
          <td class="mota_1"><?php echo $val['mota']; ?></td>
          <td class="ngaysanxuat_1"><?php echo $val['ngaysanxuat']; ?></td>
          <td class="ngayhethan_1"><?php echo $val['ngayhethan']; ?></td>
          <td class="mausac_1"><?php echo $val['mausac']; ?></td>
          <td class="giabanle_1"><?php echo $val['giabanle']; ?></td>
          <td class="chietkhaugiabanle_1"><?php echo $val['chietkhaugiabanle']; ?></td>
          <td class="giabanbuon_1"><?php echo $val['giabanbuon']; ?></td>
          <td class="chietkhaugiabanbuon_1"><?php echo $val['chietkhaugiabanbuon']; ?></td>
          <td class="giabanonline_1"><?php echo $val['giabanonline']; ?></td>
          <td class="chietkhaugiabanonline_1"><?php echo $val['chietkhaugiabanonline']; ?></td>
          <td class="giamua_1"><?php echo $val['giamua']; ?></td>
          <td class="chietkhaugiamua_1"><?php echo $val['chietkhaugiamua']; ?></td>
          <td class="giakhuyenmai_1"><?php echo $val['giakhuyenmai']; ?></td>
          <td class="giadoitac_1"><?php echo $val['giadoitac']; ?></td>
          <td class="giaxuatxuong_1"><?php echo $val['giaxuatxuong']; ?></td>
          <td class="huong_1"><?php echo $val['huong']; ?></td>
          <td class="EMEI_1"><?php echo $val['EMEI']; ?></td>
          <td class="lienhelancuoi_1"><?php echo $val['lienhelancuoi']; ?></td>
          <td class="div_center tool">
            <a href="admin/sanpham/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
            <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']; ?>" seq="<?php echo $val['_id']; ?>" control="sanpham"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php } ?>
      <?php } ?>
    </tbody>

	</table>
</div>

<?php }else {?>
	<div id="<?php echo $id?>" class="tab-pane fade in active">
		<?php echo 'Chưa có sản phẩm ';?>
	</div>
	<?php } ?>