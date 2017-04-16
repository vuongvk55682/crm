<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanpham extends MY_Controller {
	public function __construct(){
		parent::__construct();

	}
	public function __destruct(){
	}
	public function index($page = 1){
		$data['title'] = 'Sản Phẩm';
		$data['template'] = 'backend/sanpham/index';
		$data['data_index'] = $this->get_index();
		$data['danhmuc'] = $this->mongo_db->get('dev_sanpham_danhmuc');

		$config = $this->Query_mongo->_pagination();
		$config['base_url'] = base_url().'admin/sanpham/index/';
		$config['total_rows'] = $this->mongo_db->count('dev_sanpham');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 10; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['sanpham'] = $this->mongo_db->get('dev_sanpham');
			foreach ($data['sanpham'] as $key => $value) {
				$data['hinhanh'] = $this->mongo_db->where(array('productid' => $value['_id']))->get('dev_product_image');
				foreach ($data['hinhanh'] as $key1 => $val) {
					$data['sanpham'][$key]['image'][]=$val['image'];
				}
			}
		}
		
		$this->load->view('backend/index', isset($data)?$data:NULL);

	}

	public function add()
	{
		

		$data['title'] = 'Thêm mới Sản phẩm';
		$data['template'] = 'backend/sanpham/add';
		$data['xuatxu'] = $this->mongo_db->get('dev_xuatxu');
		$data['nhasanxuat'] = $this->mongo_db->get('dev_nhasanxuat');
		$data['danhmuc'] = $this->mongo_db->get('dev_sanpham_danhmuc');
		$data['donvi'] = $this->mongo_db->get('dev_donvi');
		if($this->input->post()){
			$ar_thuoctinh = $this->input->post('thuoctinh');
			$ar_motathuoctinh = $this->input->post('motathuoctinh');
			if($ar_thuoctinh != NULL && $ar_motathuoctinh){
				foreach ($ar_thuoctinh as $key_tt => $val_tt) {
					if($val_tt != '' && $ar_motathuoctinh[$key_tt] != ''){
						$thuoctinh[] = array(
							$val_tt => $ar_motathuoctinh[$key_tt]
						);
					}
				}
			}
			// $thuoctinh = json_encode($thuoctinh);
			$created_str = gmdate('Y-m-d H:i:s', time()+7*3600);
			$created_int = strtotime($created_str);
			$ngaysanxuat=$this->input->post('ngaysanxuat');
			$ngaysanxuat=date($ngaysanxuat);
			// $ngaysanxuat = strtotime($ngaysanxuat);
			$ngayhethan=$this->input->post('ngayhethan');
			$ngayhethan = strtotime($ngayhethan);
			// $hinhanh_sp = $this->input->post('dZUpload');
			 
			if ($_FILES["$hinhanh_sp"]["name"]) {
				$album_dir = 'upload/sanpham/';
				if(!is_dir($album_dir)){ create_dir($album_dir); }
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = 5120;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$image = $this->upload->do_upload("$hinhanh_sp");
				$image_data = $this->upload->data();

				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/sanpham/'.$image_data['file_name'];
				$config['new_image'] = 'upload/sanpham/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 200;
				$config['height'] = 150;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
				
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];
			}else {
				$name_img = '';
				$name_img_thumb = '';
			}
			

			$data_insert = array(
				'danhmuc_sp' 		=> 	$this->input->post('danhmuc_sp'),
				'mota' 				=> 	$this->input->post('mota'),
				'ten_sp' 			=> 	$this->input->post('ten_sp'),
				'ma_sp' 			=> 	$this->input->post('ma_sp'),
				'giabanle' 			=> 	$this->input->post('giabanle'),
				'chietkhaugiabanle' => 	$this->input->post('chietkhaugiabanle'),
				'giabanbuon' 		=> 	$this->input->post('giabanbuon'),
				'chietkhaugiabanbuon' 		=> 	$this->input->post('chietkhaugiabanbuon'),
				'giabanonline' 		=> 	$this->input->post('giabanonline'),			
				'chietkhaugiabanonline' 	=> 	$this->input->post('chietkhaugiabanonline'),
				'giamua' 			=> 	$this->input->post('giamua'),
				'chietkhaugiamua' 	=> 	$this->input->post('chietkhaugiamua'),
				'giakhuyenmai'		=>	$this->input->post('giakhuyenmai'),
				'nhasanxuat'		=>	$this->input->post('nhasanxuat'),
				'xuatxu'			=>	$this->input->post('xuatxu'),
				'donvi'				=>	$this->input->post('donvi'),
				'huong'				=>	$this->input->post('huong'),
				'ngaysanxuat'		=>	$ngaysanxuat,
				'ngayhethan'		=>	$ngayhethan,
				'mausac'			=>	$this->input->post('mausac'),
				'giadoitac'			=>	$this->input->post('giadoitac'),
				'giaxuatxuong'		=>	$this->input->post('giaxuatxuong'),
				'giabanle'			=>	$this->input->post('giabanle'),
				'nhacungcap'		=>	$this->input->post('nhacungcap'),
				'EMEI'				=>	$this->input->post('EMEI'),
				'content'			=>	$this->input->post('content'),
				'thuoctinh'			=> $thuoctinh,
				'hinhanh_sp'		=> $hinhanh_sp,
				'created'			=>	$created_int
			);

			$flag = $this->mongo_db->insert('dev_sanpham', $data_insert);
			$data_insert['_id'];
			// $data_insert_route = array(
			// 	'name' 	=> 	$this->input->post('name'),
			// 	'alias' 	=> 	$alias,
			// 	'type' 		=> 	1,
			// 	'parentid' 	=> 	$data_insert,
			// );
			// $flag_route = $this->query_sql->add('dev_route', $data_insert_route);

			//Update product image
			$arr_idproductimg = $this->input->post('id_img');


			foreach ($arr_idproductimg as $key => $val) {
				$data_update_product_image['productid'] = $data_insert['_id'];

				$this->mongo_db->update_set('dev_product_image', $data_update_product_image,$val);
			}
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/sanpham/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/sanpham/index',$data);
			}
		}


		// insert thuoc tinh
		$data['thuoctinh'] = $this->input->post('thuoctinh');
		$data_thuoctinh = array(
				'productid'		=> $data_insert['_id']
			);

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	
	public function edit($id='')
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$data['xuatxu'] = $this->mongo_db->get('dev_xuatxu');
		$data['nhasanxuat'] = $this->mongo_db->get('dev_nhasanxuat');
		$data['danhmuc'] = $this->mongo_db->get('dev_sanpham_danhmuc');
		$data['donvi'] = $this->mongo_db->get('dev_donvi');
		$data['sanpham'] = $this->mongo_db->where(array('_id' => new MongoId($id)))->find_one('dev_sanpham');
		$data['sanpham']['ngaysanxuat']= date('d/m/Y', $data['sanpham']['ngaysanxuat']);
		$data['sanpham']['ngayhethan']= date('d/m/Y', $data['sanpham']['ngayhethan']);
		// $data['sanpham']['thuoctinh']=json_decode($data['sanpham']['thuoctinh']) ;
		$data['product_img'] = $this->mongo_db->where(array('productid' => $id))->get('dev_product_image');

		if($this->input->post()){
			$ar_thuoctinh = $this->input->post('thuoctinh');
			$ar_motathuoctinh = $this->input->post('motathuoctinh');
			if($ar_thuoctinh != NULL && $ar_motathuoctinh){
				foreach ($ar_thuoctinh as $key_tt => $val_tt) {
					if($val_tt != '' && $ar_motathuoctinh[$key_tt] != ''){
						$thuoctinh[] = array(
							$val_tt => $ar_motathuoctinh[$key_tt]
						);
					}
				}
			}
			// $thuoctinh = json_encode($thuoctinh);
			$created_str = gmdate('d-m-Y H:i:s', time()+7*3600);
			$created_int = strtotime($created_str);
			$ngaysanxuat=$this->input->post('ngaysanxuat');
			$ngaysanxuat = strtotime($ngaysanxuat);
			$ngayhethan=$this->input->post('ngayhethan');
			$ngayhethan = strtotime($ngayhethan);
			// $hinhanh_sp = $this->input->post('dZUpload');
			 
			if ($_FILES["$hinhanh_sp"]["name"]) {
				$album_dir = 'upload/sanpham/';
				if(!is_dir($album_dir)){ create_dir($album_dir); }
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = 5120;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$image = $this->upload->do_upload("$hinhanh_sp");
				$image_data = $this->upload->data();

				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/sanpham/'.$image_data['file_name'];
				$config['new_image'] = 'upload/sanpham/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 200;
				$config['height'] = 150;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
				
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];
			}else {
				$name_img = '';
				$name_img_thumb = '';
			}
			// $data = $this->query_sql->select_row('dev_product', 'image,image_thumb', array('id' => $id));
			// $alias = $this->CI_function->check_alias2($id,'parentid',$this->CI_function->create_alias($this->input->post('name')),$this->input->post('name'),'dev_route');

			// $route = $this->query_sql->select_row('dev_route', 'id,name,alias,parentid', array('parentid' => $id));
			// if($route != NULL){
			// 	$data_update_route = array(
			// 		'name' 	=> 	$this->input->post('name'),
			// 		'alias' 	=> 	$alias,
			// 	);
			// 	$this->query_sql->edit('dev_route', $data_update_route, array('parentid' => $id));
			// }else{
			// 	$data_insert_route = array(
			// 		'name' 	=> 	$this->input->post('name'),
			// 		'alias' 	=> 	$alias,
			// 		'type' 		=> 	1,
			// 		'parentid' 	=> 	$id,
			// 	);
			// 	$flag_route = $this->query_sql->add('dev_route', $data_insert_route);
			// }
			
			
			// //Update product image
			// $arr_idproductimg = $this->input->post('id_img');
			// foreach ($arr_idproductimg as $key_idproductimg => $val_idproductimg) {
			// 	$data_update_product_image['productid'] = $id;
			// 	$this->query_sql->edit('dev_product_image', $data_update_product_image, array('id' => $val_idproductimg));
			// }
			if($_FILES["image"]["name"]){
				$file = "upload/sanpham/detail/".$data['image'];
				$file_thumb = "upload/sanpham/detail/thumb/".$data['image_thumb'];
				unlink($file);
				unlink($file_thumb);

				$album_dir = 'upload/sanpham/detail/';
				if(!is_dir($album_dir)){ create_dir($album_dir); } 
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$config['max_size'] = 5120;
				
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				$image = $this->upload->do_upload("image");
				$image_data = $this->upload->data();

				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/sanpham/detail/'.$image_data['file_name'];
				$config['new_image'] = 'upload/sanpham/detail/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 300;
				$config['height'] = 300;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];

				$this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];

			}else{
				$name_img = $data['image'];
				$name_img_thumb = $data['image_thumb'];
			}
			$title = $this->input->post('title');
			$description = $this->input->post('meta_description');
			$keyword = $this->input->post('meta_keyword');
			if($title == ''){
				$title = $this->input->post('name');
			}
			if($description == ''){
				$description = $this->input->post('name').', '.$data['data_index']['title']['meta_description'];
			}
			if($keyword == ''){
				$keyword = $this->input->post('name').', '.$data['data_index']['title']['meta_keyword'];
			}
			$price = str_replace(',', '',$this->input->post('price'));
			$price_sale = str_replace(',', '',$this->input->post('price_sale'));
			if($price_sale > 0){
				$sale = $price - $price_sale;
			}else{
				$sale = 0;
			}

			$data_update = array(
				'danhmuc_sp' 		=> 	$this->input->post('danhmuc_sp'),
				'mota' 				=> 	$this->input->post('mota'),
				'ten_sp' 			=> 	$this->input->post('ten_sp'),
				'ma_sp' 			=> 	$this->input->post('ma_sp'),
				'giabanle' 			=> 	$this->input->post('giabanle'),
				'chietkhaugiabanle' => 	$this->input->post('chietkhaugiabanle'),
				'giabanbuon' 		=> 	$this->input->post('giabanbuon'),
				'chietkhaugiabanbuon' 		=> 	$this->input->post('chietkhaugiabanbuon'),
				'giabanonline' 		=> 	$this->input->post('giabanonline'),
				'chietkhaugiabanonline' 	=> 	$this->input->post('chietkhaugiabanonline'),
				'giamua' 			=> 	$this->input->post('giamua'),
				'chietkhaugiamua' 	=> 	$this->input->post('chietkhaugiamua'),
				'giakhuyenmai'		=>	$this->input->post('giakhuyenmai'),
				'nhasanxuat'		=>	$this->input->post('nhasanxuat'),
				'xuatxu'			=>	$this->input->post('xuatxu'),
				'donvi'				=>	$this->input->post('donvi'),
				'huong'				=>	$this->input->post('huong'),
				'ngaysanxuat'		=>	$ngaysanxuat,
				'ngayhethan'		=>	$ngayhethan,
				'mausac'			=>	$this->input->post('mausac'),
				'giadoitac'			=>	$this->input->post('giadoitac'),
				'giaxuatxuong'		=>	$this->input->post('giaxuatxuong'),
				'giabanle'			=>	$this->input->post('giabanle'),
				'nhacungcap'		=>	$this->input->post('nhacungcap'),
				'EMEI'				=>	$this->input->post('EMEI'),
				'content'			=>	$this->input->post('content'),
				'thuoctinh'			=> $thuoctinh,
				'hinhanh_sp'		=> $hinhanh_sp,
				'created'			=>	$created_int
			);
			$flag = $this->mongo_db->update_set('dev_sanpham',$data_update,$id);

			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/sanpham/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/sanpham/index',$data);
			}	
		}
		
		$data['title'] = 'Cập nhật sản phẩm';
		$data['template'] = 'backend/sanpham/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function dropzone(){
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$random = rand(10,1000);
		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			$new_fileName = explode('.',$fileName);
			$new_fileName = $new_fileName[0].'-'.$random.'.'.$new_fileName[1];
			$targetPath = getcwd() . '/upload/sanpham/detail/';
			$targetFile = $targetPath . $new_fileName;
			move_uploaded_file($tempFile, $targetFile);


			$this->load->library('image_lib');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'upload/sanpham/detail/'.$new_fileName;
			$config['new_image'] = 'upload/sanpham/detail/thumb/'.$new_fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 300;
			$config['height'] = 300;

			$name_img = explode('.',$new_fileName);
			$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];

			$created_str = gmdate('d-m-Y H:i:s', time()+7*3600);
			$created_int = strtotime($created_str);
			
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();
			$data_insert = array(
				'image' 		=> 	$new_fileName,
				'image_thumb' 	=> 	$name_img_thumb,
				'created'		=>	$created_int
			);
			$flag = $this->mongo_db->insert('dev_product_image', $data_insert);

			$arr_id = array(
				'id' => new MongoId($data_insert['_id']),
			);
			echo json_encode($arr_id);


		}
    }
    public function deldropzone(){
    	$image = $_POST['image'];
    	// echo $image;die;
    	// $image = substr($image,0,-4);
    	// $product_image = $this->query_sql->select_row_like_position('dev_product_image', 'id,image', 'image',$image,'after','id desc');
    	$product_image = $this->mongo_db->where(array('image'=>$image))->find_one('dev_product_image');

    	$file = "upload/sanpham/detail/".$product_image['image'];
		unlink($file);
    	$this->mongo_db->delete('dev_product_image',array('image' => $product_image['image']));
    }

    public function delimgdetail()
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$id = $_POST['id'];
		// $product_image = $this->query_sql->select_row('dev_product_image', 'image', array('id' => $id));
		$product_image = $this->mongo_db->where(array('product_id'=>$id))->get('dev_product_image');
		$file = "upload/sanpham/detail/".$product_image['image'];
		unlink($file);
		$this->mongo_db->delete('dev_product_image',array('id' => $id));
	}
	
	

	public function themdanhmuc(){
		$tendanhmuc = $_POST['tendanhmuc'];
		$data_insert = array(
			'ten' 		=> 	$tendanhmuc
		);

		$flag = $this->mongo_db->insert('dev_sanpham_danhmuc', $data_insert);
		$data['danhmuc'] = $this->mongo_db->get('dev_sanpham_danhmuc');
		$this->load->view('backend/sanpham/themdanhmuc', isset($data)?$data:NULL);

	}
	public function themnhasanxuat(){
		$tennhasanxuat = $_POST['tennhasanxuat'];
		$data_insert = array(
			'ten' 		=> 	$tennhasanxuat
		);

		$flag = $this->mongo_db->insert('dev_nhasanxuat', $data_insert);
		$data['nhasanxuat'] = $this->mongo_db->get('dev_nhasanxuat');
		$this->load->view('backend/sanpham/themnhasanxuat', isset($data)?$data:NULL);

	}
	public function themxuatxu(){
		$tenxuatxu = $_POST['tenxuatxu'];
		$data_insert = array(
			'ten' 		=> 	$tenxuatxu
		);
		$flag = $this->mongo_db->insert('dev_xuatxu', $data_insert);
		$data['xuatxu'] = $this->mongo_db->get('dev_xuatxu');
		$this->load->view('backend/sanpham/themxuatxu', isset($data)?$data:NULL);

	}
	public function themdonvi(){
		$tendonvi = $_POST['tendonvi'];
		$data_insert = array(
			'ten' 		=> 	$tendonvi
		);
		$flag = $this->mongo_db->insert('dev_donvi', $data_insert);
		$data['donvi'] = $this->mongo_db->get('dev_donvi');
		$this->load->view('backend/sanpham/themdonvi', isset($data)?$data:NULL);

	}
	public function boloc(){
		$ten = $_POST['ten'];
		$data['sanpham'] = $this->mongo_db->where(array('danhmuc_sp'=>$ten))->get('dev_sanpham');
		$this->load->view('backend/sanpham/boloc', isset($data)?$data:NULL);

	}
}
