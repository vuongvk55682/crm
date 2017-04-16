<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khachhang extends MY_Controller {
	public function __construct(){
		parent::__construct();

	}
	public function __destruct(){
	}
	public function index($page = 1)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		$id_user = $this->CI_auth->logged_id();

		$data['title'] = 'Thông tin khách hàng';
		$data['template'] = 'backend/khachhang/index';
		
		$data['khachhang'] = $this->mongo_db->order_by(array('created' => 'DESC'))->get1('dev_khachhang',50,0);
		$count_kh = $this->mongo_db->count('dev_khachhang');
		
		$page_integer = $count_kh % 50;
		if ($page_integer == 0) {
			$page_kh = $count_kh / 50;
		} else {
			$count_kh_int = $count_kh / 50 + 1;
			$page_kh = (int)$count_kh_int;
		}

		$data['khachhang_num']['count_kh'] 		= $count_kh;
		$data['khachhang_num']['page_kh'] 		= $page_kh;
		$data['khachhang_num']['max_length'] 	= strlen($page_kh);

		$data['tinhthanhpho'] 	= $this->mongo_db->get_where('dev_tinhthanhpho', 	array('publish' => 0));
		$data['quanhuyen'] 		= $this->mongo_db->get_where('dev_quanhuyen', 		array('publish' => 0));
		$data['lienhe']			= $this->mongo_db->get('dev_lienhe');
		$data['nganhhoc'] 		= $this->mongo_db->get_where('dev_nganhhoc', 		array('publish' => 0));
		$data['nhomkh'] 		= $this->mongo_db->get_where('dev_nhomkhachhang', 	array('publish' => 0));
		$data['nguonkh'] 		= $this->mongo_db->get_where('dev_nguonkhachhang', 	array('publish' => 0));
		$data['nguoipt'] 		= $this->mongo_db->get_where('dev_nguoiphutrach', 	array('publish' => 0));
		$data['moiqh'] 			= $this->mongo_db->get_where('dev_moiquanhe', 		array('publish' => 0));

		$data['khachhang_nganhhoc'] = $this->mongo_db->get('dev_khachhang_nganhhoc');
		$data['khachhang_nhomkh'] 	= $this->mongo_db->get('dev_khachhang_nhomkh');
		$data['khachhang_nguonkh'] 	= $this->mongo_db->get('dev_khachhang_nguonkh');

		// Dem phan tu 
		foreach ($data['nhomkh'] as $key_nhomkh => $val_nhomkh) {
			$count_nhomkh = $this->mongo_db->where(array('id_nhomkhachhang' => "".$val_nhomkh['_id'].""))->count('dev_khachhang_nhomkh');
			$data['nhomkh'][$key_nhomkh]['sum_nhomkh'] = $count_nhomkh;
		}
		foreach ($data['khachhang'] as $key_khachhang => $val_khachhang) {
			$count_lienhe = $this->mongo_db->where(array('id_khachhang' => $val_khachhang['_id']))->count('dev_lienhe');
			$data['khachhang'][$key_khachhang]['sum_lienhe'] = $count_lienhe;
		}

		$data['showfield'] = $this->mongo_db->where(array('id_user' => $id_user))->find_one('dev_khachhang_showfield');

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		$id_user 			= $this->CI_auth->logged_id();

		$data['title'] 		= 'Thêm mới khách hàng';
		$data['template'] 	= 'backend/khachhang/add';
		if($this->input->post()){
			$kh_sinhnhat_str = $this->input->post('kh_sinhnhat');
			$kh_sinhnhat = $this->sinhnhat($kh_sinhnhat_str);

			$kh_anh = $this->input->post('kh_anh');
			if ($_FILES["kh_anh"]["name"]) {
				$album_dir = 'upload/khachhang/';
				if(!is_dir($album_dir)){ create_dir($album_dir); }
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = 5120;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$image = $this->upload->do_upload("kh_anh");
				$image_data = $this->upload->data();

				$this->load->library('image_lib');
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= 'upload/khachhang/'.$image_data['file_name'];
				$config['new_image']		= 'upload/khachhang/thumb/'.$image_data['file_name'];
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio']	= TRUE;
				$config['width'] 			= 100;
				$config['height'] 			= 50;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
				
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];
			}else {
				$name_img = '';
				$name_img_thumb = '';
			}

			$ar_lh_ten 			= $this->input->post('lh_ten');
			$ar_lh_vitri	 	= $this->input->post('lh_vitri');
			$ar_lh_dienthoai 	= $this->input->post('lh_dienthoai');
			$ar_lh_sinhnhat	 	= $this->input->post('lh_sinhnhat');
			$ar_lh_email	 	= $this->input->post('lh_email');
			$ar_lh_ghichu	 	= $this->input->post('lh_ghichu');
			$ar_lh_nhanmail	 	= $this->input->post('lh_nhanmail');
			$ar_lh_lienhechinh	= (int)$this->input->post('lh_lienhechinh');
			
			$kh_ten 			= $this->input->post('kh_ten');
			$kh_logo 			= $this->input->post('kh_logo');
			$kh_diachi 			= $this->input->post('kh_diachi');
			$kh_gioitinh 		= $this->input->post('kh_gioitinh');
			$kh_tinhthanhpho 	= $this->input->post('kh_tinhthanhpho');
			$kh_quanhuyen 		= $this->input->post('kh_quanhuyen');
			$kh_nganhhoc 		= $this->input->post('kh_nganhhoc');
			$gt_ten 			= $this->input->post('gt_ten');
			$gt_nguoipt 		= $this->input->post('gt_nguoipt');
			$gt_nhomkh 			= $this->input->post('gt_nhomkh');
			$gt_nguonkh 		= $this->input->post('gt_nguonkh');
			$gt_moiqh			= $this->input->post('gt_moiqh');

			$publish 			= (int)$this->input->post('publish');

			$data_insert = array(
				'id_user' 				=> 	$id_user,
				'kh_ten' 				=> 	$kh_ten,
				'kh_dienthoai' 			=> 	$this->input->post('kh_dienthoai'),
				'kh_diachi' 			=> 	$kh_diachi,
				'kh_ma' 				=> 	$this->input->post('kh_ma'),
				'kh_masothue' 			=> 	$this->input->post('kh_masothue'),
				'kh_email' 				=> 	$this->input->post('kh_email'),
				'kh_fax' 				=> 	$this->input->post('kh_fax'),
				'kh_logo' 				=> 	$kh_logo,
				'kh_sothich' 			=> 	$this->input->post('kh_sothich'),
				'kh_cmnd' 				=> 	$this->input->post('kh_cmnd'),
				'kh_sinhnhat' 			=> 	$kh_sinhnhat,
				'kh_gioitinh' 			=> 	$kh_gioitinh,
				'kh_tinhthanhpho' 		=> 	$kh_tinhthanhpho,
				'kh_quanhuyen' 			=> 	$kh_quanhuyen,
				'kh_anh'				=>	$name_img,
				'kh_anh_thumb'			=>	$name_img_thumb,
				'kh_website'			=>	$this->input->post('kh_website'),
				'kh_mota'				=>	$this->input->post('kh_mota'),

				'gt_ten'				=>	$gt_ten,
				'gt_nguoipt'			=>	$gt_nguoipt,
				'gt_moiqh'				=>	$gt_moiqh,
				
				'publish'				=>	$publish,
				'created'				=>	$this->created()

			);

			$flag = $this->mongo_db->insert('dev_khachhang', $data_insert);

			$data_insert_filter = array(
				'id_user' 			=> 	$id_user,
				'id_khachhang'		=>	$data_insert['_id'],
				'kh_sinhnhat' 		=> 	$kh_sinhnhat,
				'kh_gioitinh' 		=> 	$kh_gioitinh,
				'kh_tinhthanhpho' 	=> 	$kh_tinhthanhpho,
				'kh_quanhuyen' 		=> 	$kh_quanhuyen,
				'id_nganhhoc' 		=> 	$kh_nganhhoc,
				'id_nguoipt' 		=> 	$gt_nguoipt,
				'id_moiqh'			=>	$gt_moiqh,
				'id_nhomkhachhang' 	=> 	$gt_nhomkh,
				'id_nguonkhachhang' => 	$gt_nguonkh,
				'created'			=>	$this->created()
			);
			$this->mongo_db->insert('dev_khachhang_filter', $data_insert_filter);
			
			if (isset($kh_nganhhoc) && $kh_nganhhoc != '') {
				foreach ($kh_nganhhoc as $key => $val) {
					$data_insert_nganhhoc = array(
						'id_user' 			=> 	$id_user,
						'id_khachhang'		=>	$data_insert['_id'],
						'id_nganhhoc' 		=> 	$val,
						'created'			=>	$this->created()
					);
					$data_insert_nganhhocs[] = $data_insert_nganhhoc;
				}
				$this->mongo_db->batch_insert('dev_khachhang_nganhhoc', $data_insert_nganhhocs);
			}

			if (isset($gt_nhomkh) && $gt_nhomkh != '') {
				foreach ($gt_nhomkh as $key => $val) {
					$data_insert_nhomkh = array(
						'id_user' 			=> 	$id_user,
						'id_khachhang'		=>	$data_insert['_id'],
						'id_nhomkhachhang' 	=> 	$val,
						'created'			=>	$this->created()
					);
					$data_insert_nhomkhs[] = $data_insert_nhomkh;
				}
				$this->mongo_db->batch_insert('dev_khachhang_nhomkh', $data_insert_nhomkhs);
			}

			if (isset($gt_nguonkh) && $gt_nguonkh != '') {
				foreach ($gt_nguonkh as $key => $val) {
					$data_insert_nguonkh = array(
						'id_user' 			=> 	$id_user,
						'id_khachhang'		=>	$data_insert['_id'],
						'id_nguonkhachhang' => 	$val,
						'created'			=>	$this->created()
					);
					$data_insert_nguonkhs[] = $data_insert_nguonkh;
				}
				$this->mongo_db->batch_insert('dev_khachhang_nguonkh', $data_insert_nguonkhs);
			}
			if($ar_lh_ten != NULL){
				foreach ($ar_lh_ten as $key_ar_lh_ten => $val_ar_lh_ten) {
					if (isset($ar_lh_sinhnhat[$key_ar_lh_ten]) && $ar_lh_sinhnhat[$key_ar_lh_ten] != '') {
						$lh_sinhnhat_arr  = explode('/', $ar_lh_sinhnhat[$key_ar_lh_ten]);
						$lh_sinhnhat  	  = $lh_sinhnhat_arr[2].'-'.$lh_sinhnhat_arr[1].'-'.$lh_sinhnhat_arr[0];
						$lh_sinhnhat_date = new MongoDate(strtotime($lh_sinhnhat));
					} else {
						$lh_sinhnhat_date = '0';
					}
					$data_insert_lh = array(
						'id_user' 		=> 	$id_user,
						'id_khachhang'	=>	$data_insert['_id'],
						'lh_ten' 		=> 	$ar_lh_vitri[$key_ar_lh_ten],
						'lh_vitri' 		=> 	$ar_lh_vitri[$key_ar_lh_ten],
						'lh_dienthoai' 	=> 	$ar_lh_dienthoai[$key_ar_lh_ten],
						'lh_sinhnhat' 	=>  $lh_sinhnhat_date,
						'lh_email' 		=>  $ar_lh_email[$key_ar_lh_ten],
						'lh_ghichu' 	=>  $ar_lh_ghichu[$key_ar_lh_ten],
						'lh_nhanmail' 	=>  $ar_lh_nhanmail[$key_ar_lh_ten],
						'lh_lienhechinh'=>  $ar_lh_lienhechinh,
						'created'  		=>  $this->created()
					);
					$data_insert_lhs[] = $data_insert_lh;
				}
				$this->mongo_db->batch_insert('dev_lienhe', $data_insert_lhs);
			}

			// Start khach Hang History
			$data_insert_history = array(
				'id_khachhang'		=>	$data_insert['_id'],
				'id_user_created' 	=> 	$id_user,
				
				'created'  			=>  $this->created()
			);
			$this->mongo_db->insert('dev_khachhang_history', $data_insert_history);
			// End khach hang History

			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/khachhang/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/khachhang/index',$data);
			}
		}
		$data['tinhthanhpho'] 	= $this->mongo_db->get_where('dev_tinhthanhpho', array('publish' => 0));
		$data['quanhuyen'] 		= $this->mongo_db->get_where('dev_quanhuyen', array('publish' => 0));
		$data['nganhhoc'] 		= $this->mongo_db->select(array('_id', 'nganhhoc_ten'))->get('dev_nganhhoc');
		$data['nguoipt'] 		= $this->mongo_db->select(array('_id', 'nguoipt_ten'))->get('dev_nguoiphutrach');
		$data['nhomkh'] 		= $this->mongo_db->select(array('_id', 'nhomkh_ten'))->get('dev_nhomkhachhang');
		$data['nguonkh'] 		= $this->mongo_db->select(array('_id', 'nguonkh_ten'))->get('dev_nguonkhachhang');
		$data['moiqh'] 			= $this->mongo_db->select(array('_id', 'moiqh_ten'))->get('dev_moiquanhe');

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function edit($id='',$details='')
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		// Lay id User
		$id_user = $this->CI_auth->logged_id();

		$kh_history = $this->mongo_db->where(array('_id' => new MongoId($id)))->find_one('dev_khachhang');
		$kh_filter_history = $this->mongo_db->where(array('id_khachhang' => new MongoId($id)))->find_one('dev_khachhang_filter');

		$data['data_index'] = $this->get_index();
		if($this->input->post()){
			$kh_sinhnhat_str = $this->input->post('kh_sinhnhat');
			$kh_sinhnhat 	 = $this->sinhnhat($kh_sinhnhat_str);
			
			$khachhang_anh = $this->mongo_db->select(array('kh_anh','kh_anh_thumb'))->where(array('_id' => new MongoId($id)))->find_one('dev_khachhang');
			if ($_FILES["kh_anh"]["name"]) {
				$file 		= "upload/khachhang/".$khachhang_anh['kh_anh'];
				$file_thumb = "upload/khachhang/thumb/".$khachhang_anh['kh_anh_thumb'];
				if($khachhang_anh['kh_anh'] != '') {
					unlink($file);
				}
				if($khachhang_anh['kh_anh_thumb'] != '') {
					unlink($file_thumb);
				}
				$album_dir = 'upload/khachhang/';
				if(!is_dir($album_dir)){ create_dir($album_dir); }
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = 5120;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$image = $this->upload->do_upload("kh_anh");
				$image_data = $this->upload->data();

				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/khachhang/'.$image_data['file_name'];
				$config['new_image'] = 'upload/khachhang/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 45;
				$config['height'] = 45;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
				
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];

			} else {
				$name_img = $khachhang_anh['kh_anh'];
				$name_img_thumb = $khachhang_anh['kh_anh_thumb'];
			}

			$ar_lh_ten 			= $this->input->post('lh_ten');
			$ar_lh_vitri	 	= $this->input->post('lh_vitri');
			$ar_lh_dienthoai 	= $this->input->post('lh_dienthoai');
			$ar_lh_sinhnhat	 	= $this->input->post('lh_sinhnhat');
			$ar_lh_email	 	= $this->input->post('lh_email');
			$ar_lh_ghichu	 	= $this->input->post('lh_ghichu');
			$ar_lh_nhanmail	 	= $this->input->post('lh_nhanmail');
			$ar_lh_lienhechinh	= (int)$this->input->post('lh_lienhechinh');

			$kh_ten 			= $this->input->post('kh_ten');
			$kh_dienthoai 		= $this->input->post('kh_dienthoai');
			$kh_logo 			= $this->input->post('kh_logo');
			$kh_diachi 			= $this->input->post('kh_diachi');
			$kh_ma 				= $this->input->post('kh_ma');
			$kh_masothue 		= $this->input->post('kh_masothue');
			$kh_email 			= $this->input->post('kh_email');
			$kh_fax 			= $this->input->post('kh_fax');
			$kh_sothich 		= $this->input->post('kh_sothich');
			$kh_cmnd 			= $this->input->post('kh_cmnd');
			$kh_gioitinh 		= $this->input->post('kh_gioitinh');
			$kh_tinhthanhpho 	= $this->input->post('kh_tinhthanhpho');
			$kh_quanhuyen 		= $this->input->post('kh_quanhuyen');
			$kh_nganhhoc 		= $this->input->post('kh_nganhhoc');
			$kh_website 		= $this->input->post('kh_website');
			$kh_mota 			= $this->input->post('kh_mota');

			$gt_ten 			= $this->input->post('gt_ten');
			$gt_nguoipt 		= $this->input->post('gt_nguoipt');
			$gt_nhomkh 			= $this->input->post('gt_nhomkh');
			$gt_nguonkh 		= $this->input->post('gt_nguonkh');
			$gt_moiqh			= $this->input->post('gt_moiqh');

			$publish 			= (int)$this->input->post('publish');

			$data_update = array(
				'kh_ten' 				=> 	$kh_ten,
				'kh_dienthoai' 			=> 	$kh_dienthoai,
				'kh_diachi' 			=> 	$kh_diachi,
				'kh_ma' 				=> 	$kh_ma,
				'kh_masothue' 			=> 	$kh_masothue,
				'kh_email' 				=> 	$kh_email,
				'kh_fax' 				=> 	$kh_fax,
				'kh_logo' 				=> 	$kh_logo,
				'kh_sothich' 			=> 	$kh_sothich,
				'kh_cmnd' 				=> 	$kh_cmnd,
				'kh_sinhnhat' 			=> 	$kh_sinhnhat,
				'kh_gioitinh' 			=> 	$kh_gioitinh,
				'kh_tinhthanhpho' 		=> 	$kh_tinhthanhpho,
				'kh_quanhuyen' 			=> 	$kh_quanhuyen,
				'kh_anh'				=>	$name_img,
				'kh_anh_thumb'			=>	$name_img_thumb,
				'kh_website'			=>	$kh_website,
				'kh_mota'				=>	$kh_mota,

				'gt_ten'				=>	$gt_ten,
				'gt_nguoipt'			=>	$gt_nguoipt,
				'gt_moiqh'				=>	$gt_moiqh,
				
				'publish'				=>	$publish,
				'updated'				=>	$this->updated()
			);

			$flag = $this->mongo_db->update_set('dev_khachhang',$data_update,$id);

			$this->mongo_db->delete_all1('dev_khachhang_nganhhoc',	array('id_khachhang' => new MongoId($id)));
			$this->mongo_db->delete_all1('dev_lienhe',				array('id_khachhang' => new MongoId($id)));

			$data_update_filter = array(
				'kh_sinhnhat' 		=> 	$kh_sinhnhat,
				'kh_gioitinh' 		=> 	$kh_gioitinh,
				'kh_tinhthanhpho' 	=> 	$kh_tinhthanhpho,
				'kh_quanhuyen' 		=> 	$kh_quanhuyen,
				'id_nganhhoc' 		=> 	$kh_nganhhoc,
				'id_nguoipt' 		=> 	$gt_nguoipt,
				'id_moiqh'			=>	$gt_moiqh,
				'id_nhomkhachhang' 	=> 	$gt_nhomkh,
				'id_nguonkhachhang' => 	$gt_nguonkh,

				'updated'			=>	$this->updated()
			);
			$this->mongo_db->update_set1('dev_khachhang_filter', $data_update_filter, array('id_khachhang' => new MongoId($id)));

			if (isset($kh_nganhhoc) && $kh_nganhhoc != '') {
				foreach ($kh_nganhhoc as $key => $val) {
					$data_insert_nganhhoc = array(
						'id_khachhang'		=>	new MongoId($id),
						'id_nganhhoc' 		=> 	$val,
						'updated'			=>	$this->updated()
					);
					$data_insert_nganhhocs[] = $data_insert_nganhhoc;
				}
				$this->mongo_db->batch_insert('dev_khachhang_nganhhoc', $data_insert_nganhhocs);
			}

			$this->mongo_db->delete_all1('dev_khachhang_nhomkh',array('id_khachhang' => new MongoId($id)));
			if (isset($gt_nhomkh) && $gt_nhomkh != '') {
				foreach ($gt_nhomkh as $key => $val) {
					$data_insert_nhomkh = array(
						'id_khachhang'		=>	new MongoId($id),
						'id_nhomkhachhang' 	=> 	$val,
						'updated'			=>	$this->updated()
					);
					$data_insert_nhomkhs[] = $data_insert_nhomkh;
				}
				$this->mongo_db->batch_insert('dev_khachhang_nhomkh', $data_insert_nhomkhs);
			}

			$this->mongo_db->delete_all1('dev_khachhang_nguonkh',array('id_khachhang' => new MongoId($id)));
			if (isset($gt_nguonkh) && $gt_nguonkh != '') {
				foreach ($gt_nguonkh as $key => $val) {
					$data_insert_nguonkh = array(
						'id_khachhang'		=>	new MongoId($id),
						'id_nguonkhachhang' => 	$val,
						'updated'			=>	$this->updated()
					);
					$data_insert_nguonkhs[] = $data_insert_nguonkh;
				}
				$this->mongo_db->batch_insert('dev_khachhang_nguonkh', $data_insert_nguonkhs);
			}

			if (isset($ar_lh_lienhechinh) && $ar_lh_lienhechinh == 0) {
				$ar_lh_lienhechinh =1;
			}
			if($ar_lh_ten != NULL){
				foreach ($ar_lh_ten as $key_ar_lh_ten => $val_ar_lh_ten) {
					if (isset($ar_lh_sinhnhat[$key_ar_lh_ten]) && $ar_lh_sinhnhat[$key_ar_lh_ten] != '') {
						$lh_sinhnhat_arr  = explode('/', $ar_lh_sinhnhat[$key_ar_lh_ten]);
						$lh_sinhnhat  	  = $lh_sinhnhat_arr[2].'-'.$lh_sinhnhat_arr[1].'-'.$lh_sinhnhat_arr[0];
						$lh_sinhnhat_date = new MongoDate(strtotime($lh_sinhnhat));
					} else {
						$lh_sinhnhat_date = '0';
					}
					$data_update_lh = array(
						'id_khachhang'	=>	new MongoId($id),
						'lh_ten' 		=> 	$ar_lh_ten[$key_ar_lh_ten],
						'lh_vitri' 		=> 	$ar_lh_vitri[$key_ar_lh_ten],
						'lh_dienthoai' 	=> 	$ar_lh_dienthoai[$key_ar_lh_ten],
						'lh_sinhnhat' 	=>  $lh_sinhnhat_date,
						'lh_email' 		=>  $ar_lh_email[$key_ar_lh_ten],
						'lh_ghichu' 	=>  $ar_lh_ghichu[$key_ar_lh_ten],
						'lh_nhanmail' 	=>  $ar_lh_nhanmail[$key_ar_lh_ten],
						'lh_lienhechinh'=>  $ar_lh_lienhechinh,
						'updated'		=>	$this->updated()
					);
					$data_update_lhs[] = $data_update_lh;
				}
				$this->mongo_db->batch_insert('dev_lienhe', $data_update_lhs);
			}


			// Start History Khach hang
			if(
				$kh_history['kh_ten'] 			!= $kh_ten 			|| $kh_history['kh_dienthoai'] 	!= $kh_dienthoai ||
				$kh_history['kh_diachi'] 		!= $kh_diachi 		|| $kh_history['kh_ma'] 		!= $kh_ma ||
				$kh_history['kh_masothue'] 		!= $kh_masothue 	|| $kh_history['kh_email'] 		!= $kh_email ||
				$kh_history['kh_fax'] 			!= $kh_fax 			|| $kh_history['kh_logo'] 		!= $kh_logo ||
				$kh_history['kh_sothich'] 		!= $kh_sothich 		|| $kh_history['kh_cmnd'] 		!= $kh_cmnd ||
				$kh_history['kh_sinhnhat'] 		!= $kh_sinhnhat 	|| $kh_history['kh_gioitinh'] 	!= $kh_gioitinh ||
				$kh_history['kh_tinhthanhpho'] 	!= $kh_tinhthanhpho || $kh_history['kh_quanhuyen'] 	!= $kh_quanhuyen ||
				$kh_history['kh_website'] 		!= $kh_website 		|| $kh_history['kh_mota'] 		!= $kh_mota ||

				$kh_history['gt_ten'] 			!= $gt_ten 			|| $kh_history['gt_nguoipt'] 	!= $gt_nguoipt ||
				$kh_history['gt_moiqh'] 		!= $gt_moiqh 		|| $kh_filter_history['id_nganhhoc'] != $kh_nganhhoc ||
				$kh_filter_history['id_nhomkhachhang'] != $gt_nhomkh|| $kh_filter_history['id_nguonkhachhang'] != $gt_nguonkh
			)
			{
				$data_history = array(
					'id_khachhang' 				=> new MongoId($id),
					'id_user_change' 			=> $id_user,
					'kh_ten_history' 			=> $kh_history['kh_ten'],
					'kh_ten_new' 				=> $kh_ten,
					'kh_dienthoai_history' 		=> $kh_history['kh_dienthoai'],
					'kh_dienthoai_new' 			=> $kh_dienthoai,
					'kh_diachi_history' 		=> $kh_history['kh_diachi'],
					'kh_diachi_new' 			=> $kh_diachi,
					'kh_ma_history' 			=> $kh_history['kh_ma'],
					'kh_ma_new' 				=> $kh_ma,
					'kh_masothue_history' 		=> $kh_history['kh_masothue'],
					'kh_masothue_new' 			=> $kh_masothue,
					'kh_email_history' 			=> $kh_history['kh_email'],
					'kh_email_new' 				=> $kh_email,
					'kh_fax_history' 			=> $kh_history['kh_fax'],
					'kh_fax_new' 				=> $kh_fax,
					'kh_logo_history' 			=> $kh_history['kh_logo'],
					'kh_logo_new' 				=> $kh_logo,
					'kh_sothich_history' 		=> $kh_history['kh_sothich'],
					'kh_sothich_new' 			=> $kh_sothich,
					'kh_cmnd_history' 			=> $kh_history['kh_cmnd'],
					'kh_cmnd_new' 				=> $kh_cmnd,
					'kh_sinhnhat_history' 		=> $kh_history['kh_sinhnhat'],
					'kh_sinhnhat_new' 			=> $kh_sinhnhat,
					'kh_gioitinh_history' 		=> $kh_history['kh_gioitinh'],
					'kh_gioitinh_new' 			=> $kh_gioitinh,
					'kh_tinhthanhpho_history' 	=> $kh_history['kh_tinhthanhpho'],
					'kh_tinhthanhpho_new' 		=> $kh_tinhthanhpho,
					'kh_quanhuyen_history' 		=> $kh_history['kh_quanhuyen'],
					'kh_quanhuyen_new' 			=> $kh_quanhuyen,
					'kh_nganhhoc_history' 		=> $kh_filter_history['id_nganhhoc'],
					'kh_nganhhoc_new' 			=> $kh_nganhhoc,
					'kh_website_history' 		=> $kh_history['kh_website'],
					'kh_website_new' 			=> $kh_website,
					'kh_mota_history' 			=> $kh_history['kh_mota'],
					'kh_mota_new' 				=> $kh_mota,

					'gt_ten_history' 			=> $kh_history['gt_ten'],
					'gt_ten_new' 				=> $gt_ten,
					'gt_nguoipt_history' 		=> $kh_history['gt_nguoipt'],
					'gt_nguoipt_new' 			=> $gt_nguoipt,
					'gt_nhomkh_history' 		=> $kh_filter_history['id_nhomkhachhang'],
					'gt_nhomkh_new' 			=> $gt_nhomkh,
					'gt_nguonkh_history' 		=> $kh_filter_history['id_nguonkhachhang'],
					'gt_nguonkh_new' 			=> $gt_nguonkh,
					'gt_moiqh_history' 			=> $kh_history['gt_moiqh'],
					'gt_moiqh_new' 				=> $gt_moiqh,

					'created' 					=> $this->created()
				);
				$this->mongo_db->insert('dev_khachhang_history', $data_history);
			}

			// End History Khach hang

			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				if (isset($details) && $details == 'details') {
					redirect('admin/khachhang/'.$details.'/'.$id,$data);
				}else {
					redirect('admin/khachhang/index',$data);
				}
				
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				if (isset($details) && $details == 'details') {
					redirect('admin/khachhang/'.$details.'/'.$id,$data);
				}else {
					redirect('admin/khachhang/index',$data);
				}
			}	
		}

		$count_lienhe = $this->mongo_db->select(array('id_khachhang'))->where(array('id_khachhang' => new MongoId($id)))->count('dev_lienhe');
		$data['lienhe_num']['count_lienhe'] = $count_lienhe;

		$data['khachhang'] = $this->mongo_db->where(array('_id' => new MongoId($id)))->find_one('dev_khachhang');

		$data['tinhthanhpho'] = $this->mongo_db->get_where('dev_tinhthanhpho', array('publish' => 0));

		if ($data['khachhang']['kh_tinhthanhpho'] == '0') {
			$data['quanhuyen'] = $this->mongo_db->get_where('dev_quanhuyen', array('publish' => 0));
		} else {
			$data['quanhuyen'] = $this->mongo_db->get_where('dev_quanhuyen', array('publish' => 0, 'id_tinhthanhpho' => new MongoId($data['khachhang']['kh_tinhthanhpho'])));
		}

		$data['nganhhoc'] 	= $this->mongo_db->select(array('_id', 'nganhhoc_ten'))	->get('dev_nganhhoc');
		$data['nguoipt'] 	= $this->mongo_db->select(array('_id', 'nguoipt_ten'))	->get('dev_nguoiphutrach');
		$data['nhomkh'] 	= $this->mongo_db->select(array('_id', 'nhomkh_ten'))	->get('dev_nhomkhachhang');
		$data['nguonkh'] 	= $this->mongo_db->select(array('_id', 'nguonkh_ten'))	->get('dev_nguonkhachhang');
		$data['moiqh'] 		= $this->mongo_db->select(array('_id', 'moiqh_ten'))	->get('dev_moiquanhe');
		$data['lienhe'] 	= $this->mongo_db->get_where('dev_lienhe', array('id_khachhang' => new MongoId($id)));

		$data['khachhang_nganhhoc'] = $this->mongo_db->get_where('dev_khachhang_nganhhoc', 	array('id_khachhang' => new MongoId($id)));
		$data['khachhang_nhomkh'] 	= $this->mongo_db->get_where('dev_khachhang_nhomkh', 	array('id_khachhang' => new MongoId($id)));
		$data['khachhang_nguonkh'] 	= $this->mongo_db->get_where('dev_khachhang_nguonkh', 	array('id_khachhang' => new MongoId($id)));

		$data['title'] = 'Cập nhật khách hàng';
		$data['template'] = 'backend/khachhang/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function details($id='')
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();

		$data['khachhang'] = $this->mongo_db->where(array('_id' => new MongoId($id)))->find_one('dev_khachhang');

		$data['tinhthanhpho'] 	= $this->mongo_db->get_where('dev_tinhthanhpho', 	array('publish' => 0));
		$data['quanhuyen'] 		= $this->mongo_db->get_where('dev_quanhuyen', 		array('publish' => 0));
		$data['nganhhoc'] 	= $this->mongo_db->select(array('_id', 'nganhhoc_ten'))	->get('dev_nganhhoc');
		$data['nguoipt'] 	= $this->mongo_db->select(array('_id', 'nguoipt_ten'))	->get('dev_nguoiphutrach');
		$data['nhomkh'] 	= $this->mongo_db->select(array('_id', 'nhomkh_ten'))	->get('dev_nhomkhachhang');
		$data['nguonkh'] 	= $this->mongo_db->select(array('_id', 'nguonkh_ten'))	->get('dev_nguonkhachhang');
		$data['moiqh'] 		= $this->mongo_db->select(array('_id', 'moiqh_ten'))	->get('dev_moiquanhe');

		$data['khachhang_nganhhoc'] = $this->mongo_db->get_where('dev_khachhang_nganhhoc', 	array('id_khachhang' => new MongoId($id)));
		$data['khachhang_nhomkh'] 	= $this->mongo_db->get_where('dev_khachhang_nhomkh', 	array('id_khachhang' => new MongoId($id)));
		$data['khachhang_nguonkh'] 	= $this->mongo_db->get_where('dev_khachhang_nguonkh', 	array('id_khachhang' => new MongoId($id)));
		$data['khachhang_history'] 	= $this->mongo_db->order_by(array('created' => 'DESC'))->get_where('dev_khachhang_history', array('id_khachhang' => new MongoId($id)));

		$data['user'] 		= $this->mongo_db->select(array('_id', 'fullname'))->get('ci_user');
		$data['kh_id']		= $id;

		$data['template'] = 'backend/khachhang/details';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();

		$id = $_POST['id'];
		
		//Xoa nhieu Document dua tren dieu kien
		$this->mongo_db->delete_all1('dev_lienhe',				array('id_khachhang' => new MongoId($id)));
		$this->mongo_db->delete_all1('dev_khachhang_nganhhoc',	array('id_khachhang' => new MongoId($id)));
		$this->mongo_db->delete_all1('dev_khachhang_nhomkh',	array('id_khachhang' => new MongoId($id)));
		$this->mongo_db->delete_all1('dev_khachhang_nguonkh',	array('id_khachhang' => new MongoId($id)));
		$this->mongo_db->delete_all1('dev_khachhang_filter',	array('id_khachhang' => new MongoId($id)));
		$this->mongo_db->delete_all1('dev_khachhang_history',	array('id_khachhang' => new MongoId($id)));

		// Xoa anh khach hang
		$khachhang_anh = $this->mongo_db->select(array('kh_anh','kh_anh_thumb'))->where(array('_id' => new MongoId($id)))->find_one('dev_khachhang');
		$file 		= "upload/khachhang/".$khachhang_anh['kh_anh'];
		$file_thumb = "upload/khachhang/thumb/".$khachhang_anh['kh_anh_thumb'];
		if($khachhang_anh['kh_anh'] != '') {
			unlink($file);
		}
		if($khachhang_anh['kh_anh_thumb'] != '') {
			unlink($file_thumb);
		}

		
		$this->mongo_db->delete('dev_khachhang',array('_id' => new MongoId($id)));
	}
	public function show()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$id = $_POST['id'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('dev_khachhang');
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('dev_khachhang',$data_update,$id);
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('dev_khachhang');
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/khachhang/show', $data_publish);
	}
	public function showall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$listid = $_POST['listid'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('dev_khachhang');
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('dev_khachhang',$data_update,$listid);
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('dev_khachhang');
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/khachhang/showall', $data_publish);
	}
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $val) {
        	$this->mongo_db->delete_all1('dev_lienhe',				array('id_khachhang' => new MongoId($val)));
        	$this->mongo_db->delete_all1('dev_khachhang_nganhhoc',	array('id_khachhang' => new MongoId($val)));
        	$this->mongo_db->delete_all1('dev_khachhang_nhomkh',	array('id_khachhang' => new MongoId($val)));
			$this->mongo_db->delete_all1('dev_khachhang_nguonkh',	array('id_khachhang' => new MongoId($val)));
        	$this->mongo_db->delete_all1('dev_khachhang_filter',	array('id_khachhang' => new MongoId($val)));
        	$this->mongo_db->delete_all1('dev_khachhang_history',	array('id_khachhang' => new MongoId($val)));

        	// Xoa anh khach hang
        	$khachhang_anh = $this->mongo_db->select(array('kh_anh','kh_anh_thumb'))->where(array('_id' => new MongoId($val)))->find_one('dev_khachhang');
        	$file 		= "upload/khachhang/".$khachhang_anh['kh_anh'];
        	$file_thumb = "upload/khachhang/thumb/".$khachhang_anh['kh_anh_thumb'];
        	if($khachhang_anh['kh_anh'] != '') {
        		unlink($file);
        	}
        	if($khachhang_anh['kh_anh_thumb'] != '') {
        		unlink($file_thumb);
        	}

        	$this->mongo_db->delete('dev_khachhang',array('_id' => new MongoId($val)));
        }
	}
	public function addnganhhoc()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$nganhhoc_ten 	= $_POST['nganhhoc_ten'];

		$data_insert	= array(
			'nganhhoc_ten' 	=> 	ucfirst($nganhhoc_ten),
			'publish' 		=> 	0,
			'created'		=>	$this->created()
		);

		$this->mongo_db->insert('dev_nganhhoc', $data_insert);
		$data['nganhhoc'] = $this->mongo_db->get('dev_nganhhoc');
		$this->load->view('backend/khachhang/addnganhhoc', isset($data)?$data:NULL);
	}
	public function addnguonkhachhang()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$nguonkh_ten 	= $_POST['nguonkh_ten'];

		$data_insert	= array(
			'nguonkh_ten' 	=> 	ucfirst($nguonkh_ten),
			'publish' 		=> 	0,
			'created'		=>	$this->created()
		);

		$this->mongo_db->insert('dev_nguonkhachhang', $data_insert);
		$data['nguonkh'] = $this->mongo_db->get('dev_nguonkhachhang');
		$this->load->view('backend/khachhang/addnguonkhachhang', isset($data)?$data:NULL);
	}
	public function addnhomkhachhang()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$nhomkh_ten 	= $_POST['nhomkh_ten'];

		$data_insert	= array(
			'nhomkh_ten' 	=> 	ucfirst($nhomkh_ten),
			'publish' 		=> 	0,
			'created'		=>	$this->created()
		);

		$this->mongo_db->insert('dev_nhomkhachhang', $data_insert);
		$data['nhomkh'] = $this->mongo_db->get('dev_nhomkhachhang');
		$this->load->view('backend/khachhang/addnhomkhachhang', isset($data)?$data:NULL);
	}
	public function searchkhachhang()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$searchkhachhang 	= $_POST['searchkhachhang'];
		$nhomkh_id 	 		= $_POST['nhomkh_id'];
		$nguonkh_id  		= $_POST['nguonkh_id'];
		$nguoipt_id	 		= $_POST['nguoipt_id'];
		$nganhhoc_id 		= $_POST['nganhhoc_id'];
		$moiqh_id 	 		= $_POST['moiqh_id'];

		$num_limit 			= (int)$_POST['num_limit'];
		
		$ar_khachhangid 	= array('');

		if (!isset($num_limit) || $num_limit == NULL ) {
			$num_limit = 50;
		}

		$data1 = $this->mongo_db
			->where_in1('id_nhomkhachhang',array($nhomkh_id))
			->where_in1('id_nguonkhachhang',array($nguonkh_id))
			->where_in1('id_nguoipt',array($nguoipt_id))
			->where_in1('id_nganhhoc',array($nganhhoc_id))
			->where_in1('id_moiqh',array($moiqh_id))
				->get('dev_khachhang_filter');

		foreach ($data1 as $key => $val) {
			if($key == 0 && isset($val)){
				$ar_khachhangid = array($key => $val['id_khachhang']);
			}else{
				$ar_khachhangid = array_merge(array($key => $val['id_khachhang']),$ar_khachhangid);
			}
		}

		$strip_regex = $this->stripUnicode1($searchkhachhang);
		$regex = new MongoRegex("/".$strip_regex."/isu");
		$where_or = array('kh_ten' => $regex, 'kh_logo' => $regex, 'gt_ten' => $regex);
		
		$num_skip = 0;

		$data['khachhang'] = $this->mongo_db->where_in('_id',$ar_khachhangid)->where_or($where_or)->order_by(array('created' => 'DESC'))->get1('dev_khachhang',$num_limit,$num_skip);

		$count_kh = $this->mongo_db->where_in('_id',$ar_khachhangid)->where_or($where_or)->count('dev_khachhang');

		$page_integer = $count_kh % $num_limit;
		if ($page_integer == 0) {
			$page_kh = $count_kh / $num_limit;
		} else {
			$count_kh_int = $count_kh / $num_limit + 1;
			$page_kh = (int)$count_kh_int;
		}
		
		$num_from 	 = 1;
		$num_to	  	 = $num_limit;
		$page_change = 1;

		$data['khachhang_num']['num_from'] 		= $num_from;
		$data['khachhang_num']['num_to'] 		= $num_to;
		$data['khachhang_num']['count_kh'] 		= $count_kh;
		$data['khachhang_num']['page_change'] 	= $page_change;
		$data['khachhang_num']['max_length'] 	= strlen($page_kh);
		$data['khachhang_num']['page_kh'] 		= $page_kh;

		$data['tinhthanhpho'] 	= $this->mongo_db->get_where('dev_tinhthanhpho', 	array('publish' => 0));
		$data['quanhuyen'] 		= $this->mongo_db->get_where('dev_quanhuyen', 		array('publish' => 0));
		$data['lienhe']			= $this->mongo_db->get('dev_lienhe');
		$data['nganhhoc'] 		= $this->mongo_db->get_where('dev_nganhhoc', 		array('publish' => 0));
		$data['nhomkh'] 		= $this->mongo_db->get_where('dev_nhomkhachhang', 	array('publish' => 0));
		$data['nguonkh'] 		= $this->mongo_db->get_where('dev_nguonkhachhang', 	array('publish' => 0));
		$data['nguoipt'] 		= $this->mongo_db->get_where('dev_nguoiphutrach', 	array('publish' => 0));
		$data['moiqh'] 			= $this->mongo_db->get_where('dev_moiquanhe', 		array('publish' => 0));

		$data['khachhang_nganhhoc'] = $this->mongo_db->get('dev_khachhang_nganhhoc');
		$data['khachhang_nhomkh'] 	= $this->mongo_db->get('dev_khachhang_nhomkh');
		$data['khachhang_nguonkh'] 	= $this->mongo_db->get('dev_khachhang_nguonkh');

		foreach ($data['khachhang'] as $key_khachhang => $val_khachhang) {
			$count_lienhe = $this->mongo_db->where(array('id_khachhang' => $val_khachhang['_id']))->count('dev_lienhe');
			$data['khachhang'][$key_khachhang]['sum_lienhe'] = $count_lienhe;
		}

		$this->load->view('backend/khachhang/searchkhachhang', isset($data)?$data:NULL);
	}
	public function searchkhachhangadv()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$searchkhachhang 	= $_POST['searchkhachhang'];
		$nhomkh_id 	 		= $_POST['nhomkh_id'];
		$nguonkh_id  		= $_POST['nguonkh_id'];
		$nguoipt_id	 		= $_POST['nguoipt_id'];
		$nganhhoc_id 		= $_POST['nganhhoc_id'];
		$moiqh_id 	 		= $_POST['moiqh_id'];

		$kh_ma_adv 	 		= $_POST['kh_ma_adv'];
		$kh_masothue_adv 	= $_POST['kh_masothue_adv'];
		$kh_diachi_adv 	 	= $_POST['kh_diachi_adv'];
		$kh_email_adv 	 	= $_POST['kh_email_adv'];
		$kh_dienthoai_adv 	= $_POST['kh_dienthoai_adv'];
		$kh_sinhnhat_adv 	= $_POST['kh_sinhnhat_adv'];
		$kh_gioitinh_adv 	= $_POST['kh_gioitinh_adv'];
		$date_start_adv 	= $_POST['date_start_adv'];
		$date_end_adv 	 	= $_POST['date_end_adv'];
		$kh_tinhthanhpho_adv = $_POST['kh_tinhthanhpho_adv'];
		$kh_quanhuyen_adv 	= $_POST['kh_quanhuyen_adv'];

		$num_limit 		= (int)$_POST['num_limit'];
		$num_prev 		= (int)$_POST['num_prev'];
		$num_next 		= (int)$_POST['num_next'];
		$page_index 	= (int)$_POST['page_index'];

		$ar_khachhangid 	= array('');

		$kh_sinhnhat_adv1 = $this->sinhnhat($kh_sinhnhat_adv);

		if (!isset($num_limit) || $num_limit == NULL ) {
			$num_limit = 50;
		}

		if (isset($date_start_adv) && $date_start_adv != '') {
			$date_start_arr = explode('/', $date_start_adv);
			$date_start = $date_start_arr[2].'-'.$date_start_arr[1].'-'.$date_start_arr[0];
			$date_start_date = new MongoDate(strtotime($date_start));
		}

		if (isset($date_end_adv) && $date_end_adv != '') {
			$date_end_arr = explode('/', $date_end_adv);
			$date_end = $date_end_arr[2].'-'.$date_end_arr[1].'-'.$date_end_arr[0];
			$date_end_date = new MongoDate(strtotime($date_end)+(3600*24));
		}

		$data1 = $this->mongo_db
			->where_in1('id_nhomkhachhang',array($nhomkh_id))
			->where_in1('id_nguonkhachhang',array($nguonkh_id))
			->where_in1('id_nguoipt',array($nguoipt_id))
			->where_in1('id_nganhhoc',array($nganhhoc_id))
			->where_in1('id_moiqh',array($moiqh_id))
			->where_in1('kh_tinhthanhpho',array($kh_tinhthanhpho_adv))
			->where_in1('kh_quanhuyen',array($kh_quanhuyen_adv))
			->where_in1('kh_gioitinh',array($kh_gioitinh_adv))
			->where_in1('kh_sinhnhat',array($kh_sinhnhat_adv1))
				->get('dev_khachhang_filter');

		foreach ($data1 as $key => $val) {
			if($key == 0 && isset($val)){
				$ar_khachhangid = array($key => $val['id_khachhang']);
			}else{
				$ar_khachhangid = array_merge(array($key => $val['id_khachhang']),$ar_khachhangid);
			}
		}

		if ($searchkhachhang == '' && $kh_ma_adv == '' && $kh_masothue_adv == '' && $kh_diachi_adv == '' && $kh_email_adv == '' && $kh_dienthoai_adv == '') {
			$regex 	= '';
			$regex1	= new MongoRegex("/".$regex.".*$/imsu");
		}else {
			$regex1 			= $this->regex_strip($searchkhachhang);
			$kh_ma_adv1 		= $this->regex($kh_ma_adv);
			$kh_masothue_adv1 	= $this->regex($kh_masothue_adv);
			$kh_diachi_adv1 	= $this->regex_strip($kh_diachi_adv);
			$kh_email_adv1 		= $this->regex($kh_email_adv);
			$kh_dienthoai_adv1 	= $this->regex($kh_dienthoai_adv);
		}
	
		$where_or = array(
			'kh_ten' 		=> $regex1, 
			'kh_logo' 		=> $regex1, 
			'gt_ten' 		=> $regex1,
		);
	
		$where_and = array(
			'kh_diachi' 	=> $kh_diachi_adv1,
			'kh_ma' 		=> $kh_ma_adv1,
			'kh_masothue' 	=> $kh_masothue_adv1,
			'kh_email' 		=> $kh_email_adv1,
			'kh_dienthoai' 	=> $kh_dienthoai_adv1,
		);

		if (isset($num_prev) && $num_prev != NULL && isset($page_index) && $page_index != NULL) {
			$num_skip  	 = $num_prev - $num_limit;
			$num_from 	 = $num_prev + 1 - $num_limit;
			$num_to	  	 = $num_prev;
			$page_change = $page_index - 1;
		}elseif (isset($num_next) && $num_next != NULL && isset($page_index) && $page_index != NULL) {
			$num_skip 	 = $num_next;
			$num_from 	 = $num_next + 1;
			$num_to	  	 = $num_next + $num_limit;
			$page_change = $page_index + 1;
		}elseif (isset($page_index) && $page_index != NULL) {
			$num_skip 	 = $page_index * $num_limit - $num_limit;
			$num_from 	 = $page_index * $num_limit - $num_limit +1;
			$num_to	  	 = $page_index * $num_limit;
			$page_change = $page_index;
		} else {
			$num_skip 	 = 0;
			$num_from 	 = 1;
			$num_to	  	 = $num_limit;
			$page_change = 1;
		}

		if ($searchkhachhang == '' && $kh_ma_adv == '' && $kh_masothue_adv == '' && $kh_diachi_adv == '' && $kh_email_adv == '' && $kh_dienthoai_adv == '') {
			$data['khachhang'] = $this->mongo_db
				->where_in('_id',$ar_khachhangid)
				->where_between1('created', $date_start_date, $date_end_date)
				->order_by(array('created' => 'DESC'))
					->get1('dev_khachhang',$num_limit,$num_skip);

			$count_kh = $this->mongo_db
				->where_in('_id',$ar_khachhangid)
				->where_between1('created', $date_start_date, $date_end_date)
					->count('dev_khachhang');
		}elseif($searchkhachhang == '') {
			$data['khachhang'] = $this->mongo_db
				->where_in('_id',$ar_khachhangid)
				->where3($where_and)
				->where_between1('created', $date_start_date, $date_end_date)
				->order_by(array('created' => 'DESC'))
					->get1('dev_khachhang',$num_limit,$num_skip);

			$count_kh = $this->mongo_db
				->where_in('_id',$ar_khachhangid)
				->where3($where_and)
				->where_between1('created', $date_start_date, $date_end_date)
					->count('dev_khachhang');
		}else {
			$data['khachhang'] = $this->mongo_db
				->where_in('_id',$ar_khachhangid)
				->where3($where_and)
				->where_or($where_or)
				->where_between1('created', $date_start_date, $date_end_date)
				->order_by(array('created' => 'DESC'))
					->get1('dev_khachhang',$num_limit,$num_skip);

			$count_kh = $this->mongo_db
				->where_in('_id',$ar_khachhangid)
				->where3($where_and)
				->where_or($where_or)
				->where_between1('created', $date_start_date, $date_end_date)
					->count('dev_khachhang');
		}
		
		$page_integer = $count_kh % $num_limit;
		if ($page_integer == 0) {
			$page_kh = $count_kh / $num_limit;
		} else {
			$count_kh_int = $count_kh / $num_limit + 1;
			$page_kh = (int)$count_kh_int;
		}

		$data['khachhang_num']['num_from'] 		= $num_from;
		$data['khachhang_num']['num_to'] 		= $num_to;
		$data['khachhang_num']['count_kh'] 		= $count_kh;
		$data['khachhang_num']['page_change'] 	= $page_change;
		$data['khachhang_num']['max_length'] 	= strlen($page_kh);
		$data['khachhang_num']['page_kh'] 		= $page_kh;

		$data['tinhthanhpho'] 	= $this->mongo_db->get_where('dev_tinhthanhpho', 	array('publish' => 0));
		$data['quanhuyen'] 		= $this->mongo_db->get_where('dev_quanhuyen', 		array('publish' => 0));
		$data['lienhe']			= $this->mongo_db->get('dev_lienhe');
		$data['nganhhoc'] 		= $this->mongo_db->get_where('dev_nganhhoc', 		array('publish' => 0));
		$data['nhomkh'] 		= $this->mongo_db->get_where('dev_nhomkhachhang', 	array('publish' => 0));
		$data['nguonkh'] 		= $this->mongo_db->get_where('dev_nguonkhachhang', 	array('publish' => 0));
		$data['nguoipt'] 		= $this->mongo_db->get_where('dev_nguoiphutrach', 	array('publish' => 0));
		$data['moiqh'] 			= $this->mongo_db->get_where('dev_moiquanhe', 		array('publish' => 0));

		$data['khachhang_nganhhoc'] = $this->mongo_db->get('dev_khachhang_nganhhoc');
		$data['khachhang_nhomkh'] 	= $this->mongo_db->get('dev_khachhang_nhomkh');
		$data['khachhang_nguonkh'] 	= $this->mongo_db->get('dev_khachhang_nguonkh');

		foreach ($data['khachhang'] as $key_khachhang => $val_khachhang) {
			$count_lienhe = $this->mongo_db->where(array('id_khachhang' => $val_khachhang['_id']))->count('dev_lienhe');
			$data['khachhang'][$key_khachhang]['sum_lienhe'] = $count_lienhe;
		}
		
		$this->load->view('backend/khachhang/searchkhachhang', isset($data)?$data:NULL);
	}
	public function searchdetailskhachhang()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// $id_user = $this->CI_auth->logged_id();
		$kh_id 			= $_POST['kh_id'];
		$id_nguoipt 	= $_POST['id_nguoipt'];
		$search_comment = $_POST['search_comment'];
		// var_dump($id_nguoipt);die;
		if ($id_nguoipt == '0') {
			// $data['user_id_show'] = '0';
			$data['khachhang_history'] 	= $this->mongo_db->order_by(array('created' => 'DESC'))->get_where('dev_khachhang_history', array('id_khachhang' => new MongoId($kh_id)));
		}else {
			$data['user_id_show'] 		= $this->mongo_db->select(array('id_user'))->where(array('_id' => new MongoId($id_nguoipt)))->find_one('dev_nguoiphutrach');
			$data['khachhang_history'] 	= $this->mongo_db->order_by(array('created' => 'DESC'))->get_where('dev_khachhang_history', array('id_khachhang' => new MongoId($kh_id), 'id_user_change' => $data['user_id_show']['id_user']));
			// $data['user'] 				= $this->mongo_db->select(array('_id', 'fullname'))->get('ci_user');
		}

		// $data['khachhang'] = $this->mongo_db->where(array('_id' => new MongoId($id)))->find_one('dev_khachhang');

		$data['tinhthanhpho'] 	= $this->mongo_db->get_where('dev_tinhthanhpho', 	array('publish' => 0));
		$data['quanhuyen'] 		= $this->mongo_db->get_where('dev_quanhuyen', 		array('publish' => 0));
		$data['nganhhoc'] 	= $this->mongo_db->select(array('_id', 'nganhhoc_ten'))	->get('dev_nganhhoc');
		$data['nguoipt'] 	= $this->mongo_db->select(array('_id', 'nguoipt_ten'))	->get('dev_nguoiphutrach');
		$data['nhomkh'] 	= $this->mongo_db->select(array('_id', 'nhomkh_ten'))	->get('dev_nhomkhachhang');
		$data['nguonkh'] 	= $this->mongo_db->select(array('_id', 'nguonkh_ten'))	->get('dev_nguonkhachhang');
		$data['moiqh'] 		= $this->mongo_db->select(array('_id', 'moiqh_ten'))	->get('dev_moiquanhe');

		$data['khachhang_nganhhoc'] = $this->mongo_db->get_where('dev_khachhang_nganhhoc', 	array('id_khachhang' => new MongoId($id)));
		$data['khachhang_nhomkh'] 	= $this->mongo_db->get_where('dev_khachhang_nhomkh', 	array('id_khachhang' => new MongoId($id)));
		$data['khachhang_nguonkh'] 	= $this->mongo_db->get_where('dev_khachhang_nguonkh', 	array('id_khachhang' => new MongoId($id)));
		// $data['khachhang_history'] 	= $this->mongo_db->order_by(array('created' => 'DESC'))->get_where('dev_khachhang_history', array('id_khachhang' => new MongoId($id)));

		$data['user'] 		= $this->mongo_db->select(array('_id', 'fullname'))->get('ci_user');

		$this->load->view('backend/khachhang/searchdetailskhachhang', isset($data)?$data:'');

	}
	public function filterthanhpho()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$tinhthanhpho_id = $_POST['tinhthanhpho_id'];

		if ($tinhthanhpho_id != '0') {
			$data['quanhuyen'] = $this->mongo_db->get_where('dev_quanhuyen', array('id_tinhthanhpho' => new MongoId($tinhthanhpho_id)));
		} else {
			$data['quanhuyen'] = $this->mongo_db->get('dev_quanhuyen');
		}

		$this->load->view('backend/khachhang/filterthanhpho', isset($data)?$data:NULL);
	}
	public function filterthanhpho_adv()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$tinhthanhpho_id = $_POST['tinhthanhpho_id'];
		if ($tinhthanhpho_id != '0') {
			$data['quanhuyen'] = $this->mongo_db->where(array('id_tinhthanhpho' => new MongoId($tinhthanhpho_id)))->get('dev_quanhuyen');
		} else {
			$data['quanhuyen'] = $this->mongo_db->get('dev_quanhuyen');
		}
		
		$this->load->view('backend/khachhang/filterthanhpho_adv', isset($data)?$data:NULL);
	}
	public function selectkhachhang()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		$id_user = $this->CI_auth->logged_id();

		$kh_ten 			= $_POST['kh_ten'];
		$kh_dienthoai 		= $_POST['kh_dienthoai'];
		$kh_diachi 			= $_POST['kh_diachi'];
		$kh_ma 				= $_POST['kh_ma'];
		$kh_masothue 		= $_POST['kh_masothue'];
		$kh_email 			= $_POST['kh_email'];
		$kh_fax 			= $_POST['kh_fax'];
		$kh_logo 			= $_POST['kh_logo'];
		$kh_sothich 		= $_POST['kh_sothich'];
		$kh_cmnd 			= $_POST['kh_cmnd'];
		$kh_sinhnhat 		= $_POST['kh_sinhnhat'];
		$kh_gioitinh 		= $_POST['kh_gioitinh'];
		$kh_tinhthanhpho 	= $_POST['kh_tinhthanhpho'];
		$kh_quanhuyen 		= $_POST['kh_quanhuyen'];
		$kh_nganhhoc 		= $_POST['kh_nganhhoc'];
		$kh_anh 			= $_POST['kh_anh'];
		$kh_website 		= $_POST['kh_website'];
		$kh_mota 			= $_POST['kh_mota'];
		$lienhe 			= $_POST['lienhe'];
		$gt_ten 			= $_POST['gt_ten'];
		$gt_nguoipt 		= $_POST['gt_nguoipt'];
		$gt_nhomkh 			= $_POST['gt_nhomkh'];
		$gt_nguonkh 		= $_POST['gt_nguonkh'];
		$gt_moiqh 			= $_POST['gt_moiqh'];

		$data_update_showfield = array(
			'kh_ten' 			=> $kh_ten,
			'kh_dienthoai' 		=> $kh_dienthoai,
			'kh_diachi' 		=> $kh_diachi,
			'kh_ma' 			=> $kh_ma,
			'kh_masothue' 		=> $kh_masothue,
			'kh_email' 			=> $kh_email,
			'kh_fax' 			=> $kh_fax,
			'kh_logo' 			=> $kh_logo,
			'kh_sothich' 		=> $kh_sothich,
			'kh_cmnd' 			=> $kh_cmnd,
			'kh_sinhnhat' 		=> $kh_sinhnhat,
			'kh_gioitinh' 		=> $kh_gioitinh,
			'kh_tinhthanhpho' 	=> $kh_tinhthanhpho,
			'kh_quanhuyen'	 	=> $kh_quanhuyen,
			'kh_nganhhoc' 		=> $kh_nganhhoc,
			'kh_anh' 			=> $kh_anh,
			'kh_website' 		=> $kh_website,
			'kh_mota' 			=> $kh_mota,
			'lienhe' 			=> $lienhe,
			'gt_ten' 			=> $gt_ten,
			'gt_nguoipt' 		=> $gt_nguoipt,
			'gt_nhomkh' 		=> $gt_nhomkh,
			'gt_nguonkh' 		=> $gt_nguonkh,
			'gt_moiqh' 			=> $gt_moiqh
		);
		
		$this->mongo_db->update_set1('dev_khachhang_showfield', $data_update_showfield, array('id_user' => $id_user));
	}
	public function download($file)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
	    $url = 'upload/file/'.$file;
	    $this->load->helper('download');
	    $data = file_get_contents($url);
	    $name = $file;
	    force_download($name,$data);
	}
	public function importexcel()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$id_user = $this->CI_auth->logged_id();
	   //  if($this->CI_auth->check_logged() === false){
	   // 		redirect(base_url().'admin/dang-nhap.html');
	  	// }
	  	// $data['data_index'] = $this->get_index();
	  	// if($data['data_index']['permission'] == 0){
	   // 		redirect(base_url().'admin/');
	  	// }
	    $this->load->library('excel');
	    if($this->input->post()){
	       	unlink('upload/file/danhsachkhachhang.xlsx');
	       	$my_account 			= $this->input->post('my_account');
	       	$overwrite_ma_kh 		= $this->input->post('overwrite_ma_kh');
	       	$duplicate_email_kh 	= $this->input->post('duplicate_email_kh');
	       	$duplicate_dienthoai_kh = $this->input->post('duplicate_dienthoai_kh');

	        if($_FILES["fileupload"]["name"]){
		        $tempFile = $_FILES['fileupload']['tmp_name'];
		    	$fileName = $_FILES['fileupload']['name'];
				$new_fileName = explode('.',$fileName);
				$new_fileName = 'danhsachkhachhang.'.$new_fileName[1];
		    	$targetPath = getcwd() . '/upload/file/';
		    	$targetFile = $targetPath . $new_fileName;
		    	move_uploaded_file($tempFile, $targetFile);
		    	$pathToFile = 'upload/file/'.$new_fileName;
		    	// $this->load->library('excel');
		    	ini_set('memory_limit', '-1');
		    	$objPHPExcel = new PHPExcel();
		       	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		       	$objReader->setReadDataOnly(true);

	       		if (is_readable($pathToFile)){
	      			$objPHPExcel = $objReader->load($pathToFile);
	    		} else {
	      			// handle problem, for example
	      			echo "cannot read $pathToFile";
	      			exit;
	    		}
		    	$number_row = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		       	$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

	    		for($i=3;$i<=$number_row;$i++) {
	     			$kh_ten 		 = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
	        		$kh_dienthoai 	 = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
	        		$kh_diachi 		 = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
	        		$kh_ma 			 = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();   
	        		$kh_masothue 	 = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
	        		$kh_email 		 = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();   
	        		$kh_fax 		 = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();   
	        		$kh_logo 		 = $objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
	        		$kh_sothich 	 = $objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
	        		$kh_cmnd 		 = $objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
	        		$kh_sinhnhat 	 = $objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
	        		$kh_gioitinh 	 = $objWorksheet->getCellByColumnAndRow(12,$i)->getValue();
	        		$kh_tinhthanhpho = $objWorksheet->getCellByColumnAndRow(13,$i)->getValue();
	        		$kh_quanhuyen 	 = $objWorksheet->getCellByColumnAndRow(14,$i)->getValue();
	        		$kh_nganhhoc 	 = $objWorksheet->getCellByColumnAndRow(15,$i)->getValue();
	        		$kh_website 	 = $objWorksheet->getCellByColumnAndRow(16,$i)->getValue();
	        		$kh_mota 	 	 = $objWorksheet->getCellByColumnAndRow(17,$i)->getValue();
	        		$gt_ten 	 	 = $objWorksheet->getCellByColumnAndRow(18,$i)->getValue();
	        		$gt_nguoipt 	 = $objWorksheet->getCellByColumnAndRow(19,$i)->getValue();
	        		$gt_nhomkh 	 	 = $objWorksheet->getCellByColumnAndRow(20,$i)->getValue();
	        		$gt_nguonkh 	 = $objWorksheet->getCellByColumnAndRow(21,$i)->getValue();
	        		$gt_moiqh 	 	 = $objWorksheet->getCellByColumnAndRow(22,$i)->getValue();
	        		$lh_ten 	 	 = $objWorksheet->getCellByColumnAndRow(23,$i)->getValue();
	        		$lh_email 	 	 = $objWorksheet->getCellByColumnAndRow(24,$i)->getValue();
	        		$lh_dienthoai 	 = $objWorksheet->getCellByColumnAndRow(25,$i)->getValue();
	        		$lh_sinhnhat 	 = $objWorksheet->getCellByColumnAndRow(26,$i)->getValue();

	        		($kh_ten 			== NULL)? $kh_ten 			= '':$kh_ten;
	        		($kh_dienthoai 		== NULL)? $kh_dienthoai 	= '':$kh_dienthoai;
	        		($kh_diachi 		== NULL)? $kh_diachi 		= '':$kh_diachi;
	        		($kh_ma 			== NULL)? $kh_ma 			= '':$kh_ma;
	        		($kh_masothue 		== NULL)? $kh_masothue 		= '':$kh_masothue;
	        		($kh_email 			== NULL)? $kh_email 		= '':$kh_email;
	        		($kh_fax 			== NULL)? $kh_fax 			= '':$kh_fax;
	        		($kh_logo 			== NULL)? $kh_logo 			= '':$kh_logo;
	        		($kh_sothich 		== NULL)? $kh_sothich 		= '':$kh_sothich;
	        		($kh_cmnd 			== NULL)? $kh_cmnd 			= '':$kh_cmnd;
	        		($kh_sinhnhat 		== NULL)? $kh_sinhnhat 		= '':$kh_sinhnhat;
	        		($kh_gioitinh 		== NULL)? $kh_gioitinh 		= '':$kh_gioitinh;
	        		($kh_tinhthanhpho 	== NULL)? $kh_tinhthanhpho 	= '':$kh_tinhthanhpho;
	        		($kh_quanhuyen 		== NULL)? $kh_quanhuyen 	= '':$kh_quanhuyen;
	        		($kh_nganhhoc 		== NULL)? $kh_nganhhoc 		= '':$kh_nganhhoc;
	        		($kh_website 		== NULL)? $kh_website 		= '':$kh_website;
	        		($kh_mota 			== NULL)? $kh_mota 			= '':$kh_mota;
	        		($gt_ten 			== NULL)? $gt_ten 			= '':$gt_ten;
	        		($gt_nguoipt 		== NULL)? $gt_nguoipt 		= '':$gt_nguoipt;
	        		($gt_nhomkh 		== NULL)? $gt_nhomkh 		= '':$gt_nhomkh;
	        		($gt_nguonkh 		== NULL)? $gt_nguonkh 		= '':$gt_nguonkh;
	        		($gt_moiqh 			== NULL)? $gt_moiqh 		= '':$gt_moiqh;
	        		($lh_ten 			== NULL)? $lh_ten 			= '':$lh_ten;
	        		($lh_email 			== NULL)? $lh_email 		= '':$lh_email;
	        		($lh_dienthoai 		== NULL)? $lh_dienthoai 	= '':$lh_dienthoai;
	        		($lh_sinhnhat 		== NULL)? $lh_sinhnhat 		= '':$lh_sinhnhat;

	        		// Xet dieu kien du lieu
	        		if ($kh_ten != '') {
	        			$kh_anh = '';
	        			$kh_anh_thumb = '';
	        			$lh_vitri = '';
	        			$lh_ghichu = '';
	        			$lh_nhanmail = '1';
	        			$lh_lienhechinh = 1;

						// Sinh Nhat Khach Hang
						$kh_sinhnhat_date = $this->sinhnhatExcel($kh_sinhnhat);

						// Gioi Tinh
						if (strtolower($kh_gioitinh) == "nữ") {
							$kh_gioitinh = '2';
						}else {
							$kh_gioitinh = '1';
						}
						
						// Tinh Thanh Pho
						$kh_tinhthanhpho_str 	= $this->stripUnicode2($kh_tinhthanhpho);
						$kh_tinhthanhpho_regex 	= $this->regex($kh_tinhthanhpho_str);
						$kh_tinhthanhpho1 		= $this->mongo_db->select(array('_id'))->where(array('tinhthanhpho_ten' => $kh_tinhthanhpho_regex))->find_one('dev_tinhthanhpho');
						if ($kh_tinhthanhpho1 == NULL) {
							$kh_tinhthanhpho2 = '0';
						}else {
							foreach ($kh_tinhthanhpho1['_id'] as $key => $val) {
								$kh_tinhthanhpho2 = $val;
							}
						}

						// Quan Huyen
						$kh_quanhuyen_str 	= $this->stripUnicode2($kh_quanhuyen);
						$kh_quanhuyen_regex = $this->regex($kh_quanhuyen_str);
						$kh_quanhuyen1 		= $this->mongo_db->select(array('_id'))->where(array('quanhuyen_ten' => $kh_quanhuyen_regex))->find_one('dev_quanhuyen');
						if ($kh_quanhuyen1 == NULL) {
							$kh_quanhuyen2 = '0';
						}else {
							foreach ($kh_quanhuyen1['_id'] as $key => $val) {
								$kh_quanhuyen2 = $val;
							}
						}
						
						//Nganh Hoc
						$arr_kh_nganhhoc2 = $this->multidataExcel($kh_nganhhoc, 'nganhhoc_ten', 'dev_nganhhoc');

						//Nguoi Phu Trach
						if ($gt_nguoipt != '') {
							$gt_nguoipt_trim 	= trim($gt_nguoipt);
							$gt_nguoipt_regex 	= new MongoRegex("/".$gt_nguoipt_trim."$/imsu");
							$gt_nguoipt1 		= $this->mongo_db->select(array('_id'))->where(array('nguoipt_ten' => $gt_nguoipt_regex))->find_one('dev_nguoiphutrach');
							if ($gt_nguoipt1 == NULL) {
								$insert_gt_nguoipt = array(
									'nguoipt_ten' 	=> 	ucfirst($gt_nguoipt_trim),
									'publish' 		=>	0,
									'created' 		=>	$this->created()
								);
								$this->mongo_db->insert('dev_nguoiphutrach', $insert_gt_nguoipt);
								$gt_nguoipts = $this->mongo_db->select(array('_id'))->where(array('nguoipt_ten'=> $gt_nguoipt_regex))->find_one('dev_nguoiphutrach');
								foreach ($gt_nguoipts['_id'] as $key1 => $val1) {
									$gt_nguoipt2 = $val1;
								}
							}else {
								foreach ($gt_nguoipt1['_id'] as $key2 => $val2) {
									$gt_nguoipt2 = $val2;
								}
							}
						}else {
							$gt_nguoipt2 = '0';
						}

						// Nhom Khach Hang
						$arr_gt_nhomkh2 = $this->multidataExcel($gt_nhomkh, 'nhomkh_ten', 'dev_nhomkhachhang');

						// Nguon khach Hang
						$arr_gt_nguonkh2 = $this->multidataExcel($gt_nguonkh, 'nguonkh_ten', 'dev_nguonkhachhang');

						// Moi Quan He
						if ($gt_moiqh != '') {
							$gt_moiqh_trim 	= trim($gt_moiqh);
							$gt_moiqh_regex 	= new MongoRegex("/".$gt_moiqh_trim."$/imsu");
							$gt_moiqh1 		= $this->mongo_db->select(array('_id'))->where(array('moiqh_ten' => $gt_moiqh_regex))->find_one('dev_moiquanhe');
							if ($gt_moiqh1 == NULL) {
								$insert_gt_moiqh = array(
									'moiqh_ten' 	=> 	ucfirst($gt_moiqh_trim),
									'publish' 		=>	0,
									'created' 		=>	$this->created()
								);
								$this->mongo_db->insert('dev_moiquanhe', $insert_gt_moiqh);
								$gt_moiqhs = $this->mongo_db->select(array('_id'))->where(array('moiqh_ten'=> $gt_moiqh_regex))->find_one('dev_moiquanhe');
								foreach ($gt_moiqhs['_id'] as $key1 => $val1) {
									$gt_moiqh2 = $val1;
								}
							}else {
								foreach ($gt_moiqh1['_id'] as $key2 => $val2) {
									$gt_moiqh2 = $val2;
								}
							}
						}else {
							$gt_moiqh2 = '0';
						}

						// Sinh Nhat Lien he
						$lh_sinhnhat_date = $this->sinhnhatExcel($lh_sinhnhat);
						
					}
					
					// Them du lieu cho phep trung so
					if($kh_ten != ''){
						$data_insert = array(
							'id_user' 			=> 	$id_user,
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
							'id_user' 			=> 	$id_user,
							'id_khachhang'		=>	$data_insert['_id'],
							'kh_sinhnhat' 		=> 	$kh_sinhnhat_date,
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
									'id_user' 			=> 	$id_user,
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
									'id_user' 			=> 	$id_user,
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
									'id_user' 			=> 	$id_user,
									'id_khachhang'		=>	$data_insert['_id'],
									'id_nguonkhachhang' => 	$val,
									'created'			=>	$this->created()
								);
								$this->mongo_db->insert('dev_khachhang_nguonkh', $data_insert_nguonkh);
							}
						}

						$data_insert_lh = array(
							'id_user' 		=> 	$id_user,
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

	       		}
				$this->mongo_db->batch_insert('dev_khachhang_filter', $arr_data_insert_filter);

				redirect('admin/khachhang');
	        }
	    }

	    
	}
	public function checkduplicate()
	{
		$checkdup 	= $_POST['checkdup'];
		$fieldsdup 	= $_POST['fieldsdup'];

		$data['setname'] = $_POST['setname'];
		$data['fieldsdup'] = $fieldsdup;

		if ($checkdup != '' || $checkdup != NULL) {
			$checkdup_trim 	= trim($checkdup);
			$checkdup_regex = new MongoRegex("/^".$checkdup_trim."$/imsu");

			$data['check_duplicate'] = $this->mongo_db->select(array('_id', 'kh_ten', 'kh_ma', 'gt_nguoipt'))->get_where('dev_khachhang',array($fieldsdup => $checkdup_regex));
		}

		if (count($data['check_duplicate']) > 0) {
			$data['nguoipt'] 	= $this->mongo_db->select(array('_id', 'nguoipt_ten'))->get('dev_nguoiphutrach');
			$this->load->view('backend/khachhang/checkduplicate', isset($data)?$data:NULL);
		}
	}
	public function sinhnhat($sinhnhat = '')
	{
		if (isset($sinhnhat) && $sinhnhat != '') {
			$sinhnhat_arr = explode('/', $sinhnhat);
			$sinhnhat_str = $sinhnhat_arr[2].'-'.$sinhnhat_arr[1].'-'.$sinhnhat_arr[0];
			$sinhnhat_date = new MongoDate(strtotime($sinhnhat_str));
		} else {
			$sinhnhat_date = '0';
		}
		return $sinhnhat_date;
	}
	public function created()
	{
		$created_str = gmdate('Y-m-d H:i:s', time()+7*3600);
		$created_int = strtotime($created_str);
		return new MongoDate($created_int);
	}
	public function updated()
	{
		$updated_str = gmdate('Y-m-d H:i:s', time()+7*3600);
		$updated_int = strtotime($updated_str);
		return new MongoDate($updated_int);
	}
	public function regex($value = '')
	{
		if ($value != '' && $value != NULL) {
			$result = new MongoRegex("/".$value.".*$/imsu");
		}
		return $result;
	}
	public function regex_strip($value = '')
	{
		
		if ($value != '' && $value != NULL) {
			$strip_regex = $this->stripUnicode1($value);
			$result = new MongoRegex("/".$strip_regex."/isu");
		}
		return $result;
	}
	public function stripUnicode($str)
	{
		if(!$str) return $str = '';
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
			'd'=>'đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'D'=>'Đ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		);
		foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
		return $str;
	}
	public function stripUnicode1($str)
	{
		if(!$str) return $str = '';
		$unicode = array(
			'.'=>'a|e|i|o|u|y',
		);
		foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
		return $str;
	}
	public function stripUnicode2($str)
	{
		if(!$str) return $str = '';
		$unicode = array(
			'.'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|đ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Đ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Í|Ì|Ỉ|Ĩ|Ị|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		);
		foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
		return $str;
	}
	public function multidataExcel($multidata='', $field='', $collection='')
	{
		if ($multidata != '') {
			$multidata_arr = explode(',',$multidata);
			$arr_multidata2 = array();
			foreach ($multidata_arr as $key => $val) {
				$multidata_trim 	= trim($val);
				if ($val != '') {
					$multidata_regex 	= new MongoRegex("/".$multidata_trim."$/imsu");
					$multidata1 		= $this->mongo_db->select(array('_id'))->where(array($field => $multidata_regex))->find_one($collection);
					if ($multidata1 == NULL) {
						$insert_multidata 	= array(
							$field 		=> 	ucfirst($multidata_trim),
							'publish'	=>	0,
							'created'	=>	$this->created()
						);
						$this->mongo_db->insert($collection, $insert_multidata);
						$multidatas 	= $this->mongo_db->select(array('_id'))->where(array($field => $multidata_regex))->find_one($collection);
						foreach ($multidatas['_id'] as $key1 => $val1) {
							$multidata2 = $val1;
						}
					}else {
						foreach ($multidata1['_id'] as $key2 => $val2) {
							$multidata2 = $val2;
						}
					}
					$arr_multidata2 = array_merge(array($key => $multidata2), $arr_multidata2);
				}
			}
		}else {
			$arr_multidata2 = NULL;
		}
		return $arr_multidata2;
	}
	public function sinhnhatExcel($sinhnhat='')
	{
		if (isset($sinhnhat) && $sinhnhat != NULL ) {
			$sinhnhat 		= preg_replace("/\-/", '/', $sinhnhat);
			$sinhnhat_arr 	= explode('/', $sinhnhat);
			if (count($sinhnhat_arr) == 3) {
				if ((int)$sinhnhat_arr[1] > 12 && (int)$sinhnhat_arr[0] <= 12) {
					$sinhnhat_str 	= $sinhnhat_arr[2].'-'.$sinhnhat_arr[0].'-'.$sinhnhat_arr[1];
					$sinhnhat_date 	= new MongoDate(strtotime($sinhnhat_str));
				}elseif ((int)$sinhnhat_arr[1] > 12 && (int)$sinhnhat_arr[0] > 12) {
					$sinhnhat_date = '0';
				}else {
					$sinhnhat_str 	= $sinhnhat_arr[2].'-'.$sinhnhat_arr[1].'-'.$sinhnhat_arr[0];
					$sinhnhat_date 	= new MongoDate(strtotime($sinhnhat_str));
				}
			}else {
				$sinhnhat_date = '0';
			}
		}else {
			$sinhnhat_date = '0';
		}
		return $sinhnhat_date;
	}
}