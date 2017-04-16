<?php 
	if($kh_ten != ''){
		$data_insert = array(
			'kh_ten' 			=> 	(string)trim($kh_ten),
			'kh_dienthoai' 		=> 	(string)$kh_dienthoai,
			'kh_diachi' 		=> 	(string)$kh_diachi,
			'kh_ma' 			=> 	(string)$kh_ma,
			'kh_masothue' 		=> 	(string)$kh_masothue,
			'kh_email' 			=> 	(string)$kh_email,
			'kh_fax' 			=> 	(string)$kh_fax,
			'kh_logo' 			=> 	(string)$kh_logo,
			'kh_sothich' 		=> 	(string)$kh_sothich,
			'kh_cmnd' 			=> 	(string)$kh_cmnd,
			'kh_sinhnhat' 		=> 	$kh_sinhnhat_date,
			'kh_gioitinh' 		=> 	$kh_gioitinh,
			'kh_tinhthanhpho' 	=> 	$kh_tinhthanhpho2,
			'kh_quanhuyen' 		=> 	$kh_quanhuyen2,
			'kh_anh'			=>	$kh_anh,
			'kh_anh_thumb'		=>	$kh_anh_thumb,
			'kh_website'		=>	$kh_website,
			'kh_mota'			=>	(string)trim($kh_mota),

			'gt_ten'			=>	(string)trim($gt_ten),
			'gt_nguoipt'		=>	$gt_nguoipt2,
			'gt_moiqh'			=>	$gt_moiqh2,

			'publish'			=>	0,
			'created'			=> 	$this->created()
		);
		$flag = $this->mongo_db->insert('dev_khachhang', $data_insert);
		$arr_data_insert[] = $data_insert;

		$data_insert_filter = array(
			'id_khachhang'		=>	$data_insert['_id'],
			'kh_sinhnhat' 		=> 	$sinhnhat_date,
			'kh_gioitinh' 		=> 	$kh_gioitinh,
			'kh_tinhthanhpho' 	=> 	$kh_tinhthanhpho2,
			'kh_quanhuyen' 		=> 	$kh_quanhuyen2,
			'id_nganhhoc' 		=> 	$arr_kh_nganhhoc2,
			'id_nguoipt' 		=> 	$gt_nguoipt2,
			'id_moiqh'			=>	$gt_moiqh2,
			'id_nhomkhachhang' 	=> 	$arr_gt_nhomkh2,
			'id_nguonkhachhang' => 	$arr_gt_nguonkh2,
			'created'			=>	$this->created()
		);
		$arr_data_insert_filter[] = $data_insert_filter;
		
		if (isset($arr_kh_nganhhoc2) && $arr_kh_nganhhoc2 != NULL) {
			foreach ($arr_kh_nganhhoc2 as $key => $val) {
				$data_insert_nganhhoc = array(
					'id_khachhang'		=>	$data_insert['_id'],
					'id_nganhhoc' 		=> 	$val,
					'created'			=>	$this->created()
				);
				$this->mongo_db->insert('dev_khachhang_nganhhoc', $data_insert_nganhhoc);
			}
		}

		if (isset($arr_gt_nhomkh2) && $arr_gt_nhomkh2 != NULL) {
			foreach ($arr_gt_nhomkh2 as $key => $val) {
				$data_insert_nhomkh = array(
					'id_khachhang'		=>	$data_insert['_id'],
					'id_nhomkhachhang' 	=> 	$val,
					'created'			=>	$this->created()
				);
				$this->mongo_db->insert('dev_khachhang_nhomkh', $data_insert_nhomkh);
			}
		}

		if (isset($arr_gt_nguonkh2) && $arr_gt_nguonkh2 != '') {
			foreach ($arr_gt_nguonkh2 as $key => $val) {
				$data_insert_nguonkh = array(
					'id_khachhang'		=>	$data_insert['_id'],
					'id_nguonkhachhang' => 	$val,
					'created'			=>	$this->created()
				);
				$this->mongo_db->insert('dev_khachhang_nguonkh', $data_insert_nguonkh);
			}
		}

		$data_insert_lh = array(
			'id_khachhang'	=>	$data_insert['_id'],
			'lh_ten' 		=> 	(string)trim($lh_ten),
			'lh_vitri' 		=> 	$lh_vitri,
			'lh_dienthoai' 	=> 	(string)$lh_dienthoai,
			'lh_sinhnhat' 	=>  $lh_sinhnhat_date,
			'lh_email' 		=>  (string)$lh_email,
			'lh_ghichu' 	=>  $lh_ghichu,
			'lh_nhanmail' 	=>  $lh_nhanmail,
			'lh_lienhechinh'=>  $lh_lienhechinh,
			'created'  		=>  $this->created()
		);
		$this->mongo_db->insert('dev_lienhe', $data_insert_lh);
	}


 ?>