<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
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
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$data['title'] = 'Quản lý thành viên quản trị website';
		$data['template'] = 'backend/user/index';
		$total_rows = $this->mongo_db->count('ci_user');
		
		if ($total_rows > 0) {
			$data['user'] = $this->mongo_db->order_by(array('created' => 'DESC'))->get1('ci_user',50,0);
			$count_kh 	  = $this->mongo_db->count('ci_user');
			
			$page_integer = $count_kh % 50;
			if ($page_integer == 0) {
				$page_kh = $count_kh / 50;
			} else {
				$count_kh_int = $count_kh / 50 + 1;
				$page_kh = (int)$count_kh_int;
			}

			$data['ci_user_num']['count_kh'] 	= $count_kh;
			$data['ci_user_num']['page_kh'] 	= $page_kh;
			$data['ci_user_num']['max_length'] 	= strlen($page_kh);

			if (!is_null($data['user'])) {
				foreach ($data['user'] as $key => $val) {
					$role_row = $this->mongo_db->select(array('name'))->get_where('ci_role', array('_id' => $val['id_role']));
					$data['user'][$key]['role_name'] = $role_row['name'];
				}
			}
		}

		$data['role'] = $this->mongo_db->get('ci_role');

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$data['title'] = 'Thêm thành viên quản trị website';
		$data['template'] = 'backend/user/add';
		if($this->input->post()){
			$rand_salt 		= $this->CI_encrypts->genRndSalt();
			$encrypt_pass 	= $this->CI_encrypts->encryptUserPwd( $this->input->post('password'),$rand_salt);

			$birthday_str 	= $this->input->post('birthday');
			$birthday 		= $this->sinhnhat($birthday_str);

			$username 		= $this->input->post('username');
			$full_name 		= ucfirst($this->input->post('fullname'));
			$active 		= (int)$this->input->post('active');

           	if($_FILES["avatar"]["name"]){
				$album_dir = 'upload/user/';
				if(!is_dir($album_dir)){ create_dir($album_dir); } 
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$config['max_size'] = 5120;
				
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				$image = $this->upload->do_upload("avatar");
				$image_data = $this->upload->data();

				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/user/'.$image_data['file_name'];
				$config['new_image'] = 'upload/user/thumb/'.$image_data['file_name'];
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
				$name_img = '';
				$name_img_thumb = '';
			}

		    $data_insert = array(
				'username' 		=> 	$username,
				'password' 		=> 	$encrypt_pass,
				'sex' 			=> 	$this->input->post('sex'),
				'birthday' 		=> 	$birthday,
				'email' 		=> 	$this->input->post('email'),
				'phone' 		=> 	$this->input->post('phone'),
				'id_role' 		=> 	$this->input->post('id_role'),
				'avatar'		=>	$name_img,
				'avatar_thumb'	=>	$name_img_thumb,
				'salt' 			=>  $rand_salt,
				'fullname' 		=> 	$full_name,
				'active'		=>	$active,
				'created'		=>	$this->created()
			);
			$flag = $this->mongo_db->insert('ci_user', $data_insert);

			$nguoipt_insert = array(
				'id_user' 		=> 	$data_insert['_id'],
				'nguoipt_ten' 	=> 	$full_name,
				'publish'		=>	$active,
				'created'		=>	$this->created()
			);
			$this->mongo_db->insert('dev_nguoiphutrach', $nguoipt_insert);

			$kh_showfield_insert = array(
				'id_user' 			=> 	$data_insert['_id'],
				'kh_ten' 			=> '0',
				'kh_dienthoai' 		=> '0',
				'kh_diachi' 		=> '0',
				'kh_ma' 			=> '0',
				'kh_masothue' 		=> '1',
				'kh_email' 			=> '0',
				'kh_fax' 			=> '1',
				'kh_logo' 			=> '1',
				'kh_sothich' 		=> '1',
				'kh_cmnd' 			=> '1',
				'kh_sinhnhat' 		=> '1',
				'kh_gioitinh' 		=> '0',
				'kh_tinhthanhpho' 	=> '0',
				'kh_quanhuyen'	 	=> '0',
				'kh_nganhhoc' 		=> '0',
				'kh_anh' 			=> '0',
				'kh_website' 		=> '1',
				'kh_mota' 			=> '1',
				'lienhe' 			=> '0',
				'gt_ten' 			=> '1',
				'gt_nguoipt' 		=> '0',
				'gt_nhomkh' 		=> '0',
				'gt_nguonkh' 		=> '0',
				'gt_moiqh' 			=> '0',
				
				'publish'			=>	$active,
				'created'			=>	$this->created()
			);
			$this->mongo_db->insert('dev_khachhang_showfield', $kh_showfield_insert);

			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/user/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/user/index',$data);
			}	
	           
		}
		$data['role'] = $this->mongo_db->get('ci_role');
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function edit($id='')
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		

		if($this->input->post()){
			$rand_salt 		= $this->CI_encrypts->genRndSalt();
			$user_anh 		= $this->mongo_db->select(array('avatar','avatar_thumb'))->where(array('_id' => new MongoId($id)))->find_one('ci_user');

			$birthday_str 	= $this->input->post('birthday');
			$birthday 		= $this->sinhnhat($birthday_str);

			$fullname 		= ucfirst($this->input->post('fullname'));
			$active 		= (int)$this->input->post('active');

			if($_FILES["avatar"]["name"]){
				$file = "upload/user/".$user_anh['avatar'];
				$file_thumb = "upload/user/thumb/".$user_anh['avatar_thumb'];
				if($khachhang_anh['kh_anh'] != '') {
					unlink($file);
				}
				if($khachhang_anh['kh_anh_thumb'] != '') {
					unlink($file_thumb);
				}
				$album_dir = 'upload/user/';
				if(!is_dir($album_dir)){ create_dir($album_dir); } 
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$config['max_size'] = 5120;
				
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				$image = $this->upload->do_upload("avatar");
				$image_data = $this->upload->data();

				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/user/'.$image_data['file_name'];
				$config['new_image'] = 'upload/user/thumb/'.$image_data['file_name'];
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
				$name_img = $user_anh['avatar'];
				$name_img_thumb = $user_anh['avatar_thumb'];
			}


		    if($this->input->post('password') != ''){
		    	$encrypt_pass = $this->CI_encrypts->encryptUserPwd( $this->input->post('password'),$rand_salt);
		    	$data_edit = array(
		    		'password' 		=> 	$encrypt_pass,
		    		'salt' 			=>  $rand_salt,
					'sex' 			=> 	$this->input->post('sex'),
					'birthday' 		=> 	$birthday,
					'email' 		=> 	$this->input->post('email'),
					'phone' 		=> 	$this->input->post('phone'),
					'id_role' 		=> 	$this->input->post('id_role'),
					'fullname' 		=> 	$fullname,
					'avatar'		=>	$name_img,
					'avatar_thumb'	=>	$name_img_thumb,
					'active'		=>	$active,
					'updated'		=>	$this->updated()
				);
		    
		    }else {
    	    	$data_edit = array(
    				'sex' 			=> 	$this->input->post('sex'),
    				'birthday' 		=> 	$birthday,
    				'email' 		=> 	$this->input->post('email'),
    				'phone' 		=> 	$this->input->post('phone'),
    				'id_role' 		=> 	$this->input->post('id_role'),
    				'fullname' 		=> 	$fullname,
    				'avatar'		=>	$name_img,
    				'avatar_thumb'	=>	$name_img_thumb,
    				'active'		=>	$active,
    				'updated'		=>	$this->updated()
    			);
		    }	
			$flag = $this->mongo_db->update_set('ci_user',$data_edit,$id);

			$nguoipt_update = array(
				'nguoipt_ten' 	=> 	$fullname,
				'publish'		=>	$active,
				'updated'		=>	$this->updated()
			);
			$this->mongo_db->update_set1('dev_nguoiphutrach',$nguoipt_update, array('id_user' => new MongoId($id)));

			$kh_showfield_update = array(
				'publish'		=>	$active,
				'updated'		=>	$this->updated()
			);
			$this->mongo_db->update_set1('dev_khachhang_showfield', $kh_showfield_update, array('id_user' => new MongoId($id)));

			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/user/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/user/index',$data);
			}	
		}

		$data['role'] = $this->mongo_db->get('ci_role');

		$data['user'] = $this->mongo_db->where(array('_id' => new MongoId($id)))->find_one('ci_user');
		$data['title'] = 'Cập nhật thành viên quản trị website';
		$data['template'] = 'backend/user/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }

		$id = $_POST['id'];

		// Xoa anh khach hang
		$user_anh = $this->mongo_db->select(array('avatar','avatar_thumb'))->where(array('_id' => new MongoId($id)))->find_one('ci_user');
		$file 		= "upload/user/".$user_anh['avatar'];
		$file_thumb = "upload/user/thumb/".$user_anh['avatar_thumb'];
		if($user_anh['kh_anh'] != '') {
			unlink($file);
		}
		if($user_anh['kh_anh_thumb'] != '') {
			unlink($file_thumb);
		}

		$this->mongo_db->delete('dev_nguoiphutrach',array('id_user' => new  MongoId($id)));
		$this->mongo_db->delete('dev_khachhang_showfield',array('id_user' => new  MongoId($id)));

		$this->mongo_db->delete('ci_user',array('_id' => new  MongoId($id)));
	}
	public function active()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$id = $_POST['id'];
		$sql = $this->mongo_db->select(array('active'))->where(array('_id' => new MongoId($id)))->find_one('ci_user');
		if($sql['active']==1){
			$active = 0;
		}else{
			$active = 1;
		}
		$data_update['active'] = $active;
		$this->mongo_db->update_set('ci_user',$data_update,$id);

		$data_sql = $this->mongo_db->select(array('active'))->where(array('_id' => new MongoId($id)))->find_one('ci_user');
		$data_active['active'] = $data_sql['active'];
		$this->load->view('backend/user/active', $data_active);
	}
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $val) {
        	// Xoa anh khach hang
        	$user_anh = $this->mongo_db->select(array('avatar','avatar_thumb'))->where(array('_id' => new MongoId($id)))->find_one('ci_user');
        	$file 		= "upload/user/".$user_anh['avatar'];
        	$file_thumb = "upload/user/thumb/".$user_anh['avatar_thumb'];
        	if($user_anh['avatar'] != '') {
        		unlink($file);
        	}
        	if($user_anh['avatar_thumb'] != '') {
        		unlink($file_thumb);
        	}
        	$this->mongo_db->delete('dev_nguoiphutrach',array('id_user' => new  MongoId($val)));
        	$this->mongo_db->delete('dev_khachhang_showfield',array('id_user' => new  MongoId($val)));
        	$this->mongo_db->delete('ci_user',array('_id' => new  MongoId($val)));
        }
	}
	// public function sort()
 //    {
 //    	if($this->CI_auth->check_logged() === false){
	// 		redirect(base_url().'admin/dang-nhap.html');
	// 	}
	// 	$data['data_index'] = $this->get_index();
	// 	if($data['data_index']['permission'] == 0){
	// 		redirect(base_url().'admin/');
	// 	}
 //    	$id = $_POST['id'];
 //    	$sort = $_POST['sort'];
	// 	$data_update['sort'] = $sort;
	// 	$this->query_sql->edit('ci_user', $data_update, array('id' => $id));
 //    }
  //   public function search()
  //   {
  //   	if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
  //   	$keyword = $_POST['keyword'];
  //   	$data_like['fullname'] = $keyword;
  //   	$data['user'] = $this->query_sql->select_like('ci_user','id, fullname, created, username,active,id_role,avatar_thumb',$data_like,'');
  //   	if(!is_null($data['user'])){
		// 	foreach ($data['user'] as $key => $val) {
		// 		$role_row = $this->query_sql->select_row('ci_role', 'name', array('id' => $val['id_role']));
		// 		$data['user'][$key]['role_name'] = $role_row['name'];
		// 	}
		// }
		// $this->load->view('backend/user/search', isset($data)?$data:NULL);
  //   }
	public function searchuser()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();

		$search_user 	= $_POST['search_user'];

		$num_prev 		= (int)$_POST['num_prev'];
		$num_next 		= (int)$_POST['num_next'];
		$page_index 	= (int)$_POST['page_index'];

		$num_limit 		= 50;

		$strip_regex = $this->stripUnicode1($search_user);
		$regex = new MongoRegex("/".$strip_regex."/isu");
		$where_or = array('username' => $regex, 'email' => $regex, 'fullname' => $regex);

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

		$data['user'] 	= $this->mongo_db->where_or($where_or)->order_by(array('created' => 'DESC'))->get1('ci_user',$num_limit,$num_skip);
		$count_kh 		= $this->mongo_db->where_or($where_or)->count('ci_user');

		$page_integer = $count_kh % 50;
		if ($page_integer == 0) {
			$page_kh = $count_kh / 50;
		} else {
			$count_kh_int = $count_kh / 50 + 1;
			$page_kh = (int)$count_kh_int;
		}
		$data['ci_user_num']['num_from'] 	= $num_from;
		$data['ci_user_num']['num_to'] 		= $num_to;
		$data['ci_user_num']['count_kh'] 	= $count_kh;
		$data['ci_user_num']['page_change'] = $page_change;
		$data['ci_user_num']['max_length'] 	= strlen($page_kh);
		$data['ci_user_num']['page_kh'] 	= $page_kh;

		if (!is_null($data['user'])) {
			foreach ($data['user'] as $key => $val) {
				$role_row = $this->mongo_db->select(array('name'))->get_where('ci_role', array('_id' => $val['id_role']));
				$data['user'][$key]['role_name'] = $role_row['name'];
			}
		}

		$data['role'] = $this->mongo_db->get('ci_role');

		$this->load->view('backend/user/pagepagination', isset($data)?$data:NULL);

	}
	public function checkduplicate()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$checkdup 	= $_POST['checkdup'];
		$fieldsdup 	= $_POST['fieldsdup'];

		$data['setname'] = $_POST['setname'];
		$data['fieldsdup'] = $fieldsdup;

		if ($checkdup != '' || $checkdup != NULL) {
			$checkdup_trim 	= trim($checkdup);
			$checkdup_regex = new MongoRegex("/^".$checkdup_trim."$/i");

			$data['check_duplicate'] = $this->mongo_db->select(array('_id', 'username', 'email'))->get_where('ci_user',array($fieldsdup => $checkdup_regex));
		}

		if (count($data['check_duplicate']) > 0) {
			$this->load->view('backend/user/checkduplicate', isset($data)?$data:NULL);
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
    public function stripUnicode1($str)
    {
    	if(!$str) return $str = '';
    	$unicode = array(
    		'.'=>'a|e|i|o|u|y',
    	);
    	foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
    	return $str;
    }
}
