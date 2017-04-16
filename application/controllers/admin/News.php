<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	public function __destruct(){
	}
	public function index($page = 1)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Quản lý bài viết';
		$data['template'] = 'backend/news/index';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/news/index/';
		$config['total_rows'] = $this->query_sql->total('dev_news');
		$config['uri_segment'] = 4;  
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['news'] = $this->query_sql->view('id, created, name,publish,image_thumb,typeid,is_home,is_view,is_hot','dev_news',($page * $config['per_page']),$config['per_page']);
			if(isset($data['news']) && $data['news']!=NULL){
				foreach ($data['news'] as $key => $val) {
					$type = $this->query_sql->select_row('dev_menu', 'name', array('id' => $val['typeid'], 'type' => 1));
					$data['news'][$key]['type_name'] = $type['name'];
				}
			}
		}
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$userid = $this->CI_auth->logged_id();
		$data['title'] = 'Thêm bài viết';
		$data['template'] = 'backend/news/add';
		if($this->input->post()){
			if($_FILES["image"]["name"]){
				$album_dir = 'upload/news/';
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
				$config['source_image'] = 'upload/news/'.$image_data['file_name'];
				$config['new_image'] = 'upload/news/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 120;
				$config['height'] = 100;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
				
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];
			}else{
				$name_img = '';
				$name_img_thumb = '';
			}

			// if($_FILES["icon"]["name"]){
			// 	$album_dir = 'upload/news/icon/';
			// 	if(!is_dir($album_dir)){ create_dir($album_dir); } 
			// 	$config['upload_path']	= $album_dir;
			// 	$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
			// 	$config['max_size'] = 5120;

				
			// 	$this->load->library('upload', $config); 
			// 	$this->upload->initialize($config); 
			// 	$image = $this->upload->do_upload("icon");
			// 	$image_data = $this->upload->data();


			//     $name_icon = $image_data['file_name'];
			// }else{
			// 	$name_icon = '';
			// }
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
			$data_insert = array(
				'typeid' 		=> 	$this->input->post('typeid'),
				'name' 			=> 	$this->input->post('name'),
				'title' 		=> 	$title,
				'userid' 		=> 	$userid,
				'alias' 		=> 	$this->input->post('alias'),
				'publish' 		=> 	$this->input->post('publish'),
				'is_hot' 		=> 	$this->input->post('is_hot'),
				'is_home' 		=> 	$this->input->post('is_home'),
				'description' 	=> 	$this->input->post('description'),
				// 'icon'			=>	$name_icon,
				'image'			=>	$name_img,
				'image_thumb'	=>	$name_img_thumb,
				'meta_keyword' 	=> 	$keyword,
				'meta_description' 	=> 	$description,
				'content'		=>	$this->input->post('content'),
				'cityid' 		=> 	$this->input->post('cityid'),
				'website' 		=> 	$this->input->post('website'),
				'hotline' 		=> 	$this->input->post('hotline'),
				'fax' 			=> 	$this->input->post('fax'),
				'address' 		=> 	$this->input->post('address'),
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);

			
			$flag = $this->query_sql->add('dev_news', $data_insert);
			//$flag = $this->db->affected_rows();
			$id_insert = $flag['id_insert'];
			$alias = $this->CI_function->check_alias(0,$this->CI_function->create_alias($this->input->post('name')),'','dev_route');
			$data_insert_route = array(
				'name' 	=> 	$this->input->post('name'),
				'alias' 	=> 	$alias,
				'type' 		=> 	2,
				'parentid' 	=> 	$id_insert,
			);
			$flag_route = $this->query_sql->add('dev_route', $data_insert_route);

			$data_insert_lang = array(
				'name' 			=> 	$this->input->post('en_name'),
				'parentid' 		=> 	$id_insert,
				'description' 	=> 	$this->input->post('en_description'),
				'address'		=>	$this->input->post('en_address'),
				'content'		=>	$this->input->post('en_content'),
				'type' 			=> 	'news',
				'lang' 			=> 	'en',
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$this->query_sql->add('dev_lang', $data_insert_lang);
			//Update news image
			$arr_idnewsimg = $this->input->post('id_img');
			foreach ($arr_idnewsimg as $key_idnewsimg => $val_idnewsimg) {
				$data_update_news_image['newsid'] = $id_insert;
				$this->query_sql->edit('dev_news_image', $data_update_news_image, array('id' => $val_idnewsimg));
			}
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/news/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/news/index',$data);
			}	
		}
		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 1));
		if(isset($data['type']) && $data['type'] != NULL){
			foreach ($data['type'] as $key => $val) {
				$data['type'][$key]['type_child'] = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if($data['type'][$key]['type_child'] != NULL){
					foreach ($data['type'][$key]['type_child'] as $key_child2 => $val_child2) {
						$data['type'][$key]['type_child'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
						if($data['type'][$key]['type_child'][$key_child2]['child_3'] != NULL){
							foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
								$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
								if($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
									foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
										$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, sort');
									}
								}
							}
						}
					}
				}
			}
		}
		$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function edit($id=0)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$userid = $this->CI_auth->logged_id();
		$data['news_img'] = $this->query_sql->select_array('dev_news_image', 'id,image', array('newsid' => $id));
		if($this->input->post()){
			$data = $this->query_sql->select_row('dev_news', 'image,image_thumb', array('id' => $id));
			//Update news image
			$alias = $this->CI_function->check_alias2($id,'parentid',$this->CI_function->create_alias($this->input->post('name')),$this->input->post('name'),'dev_route');

			$route = $this->query_sql->select_row('dev_route', 'id,name,alias,parentid', array('parentid' => $id));
			if($route != NULL){
				$data_update_route = array(
					'name' 	=> 	$this->input->post('name'),
					'alias' 	=> 	$alias,
				);
				$this->query_sql->edit('dev_route', $data_update_route, array('parentid' => $id));
			}else{
				$data_insert_route = array(
					'name' 	=> 	$this->input->post('name'),
					'alias' 	=> 	$alias,
					'type' 		=> 	2,
					'parentid' 	=> 	$id,
				);
				$flag_route = $this->query_sql->add('dev_route', $data_insert_route);
			}

			$arr_idnewsimg = $this->input->post('id_img');
			foreach ($arr_idnewsimg as $key_idnewsimg => $val_idnewsimg) {
				$data_update_news_image['newsid'] = $id;
				$this->query_sql->edit('dev_news_image', $data_update_news_image, array('id' => $val_idnewsimg));
			}
			if($_FILES["image"]["name"]){
				$file = "upload/news/".$data['image'];
				$file_thumb = "upload/news/thumb/".$data['image_thumb'];
				unlink($file);
				unlink($file_thumb);

				$album_dir = 'upload/news/';
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
				$config['source_image'] = 'upload/news/'.$image_data['file_name'];
				$config['new_image'] = 'upload/news/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 120;
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
			// if($_FILES["icon"]["name"]){
			// 	$file_icon = "upload/news/icon/".$data['icon'];
			// 	unlink($file_icon);

			// 	$album_dir = 'upload/news/icon/';
			// 	if(!is_dir($album_dir)){ create_dir($album_dir); } 
			// 	$config['upload_path']	= $album_dir;
			// 	$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
			// 	$config['max_size'] = 5120;
				
			// 	$this->load->library('upload', $config); 
			// 	$this->upload->initialize($config); 
			// 	$image = $this->upload->do_upload("icon");
			// 	$image_data = $this->upload->data();

			//     $name_icon = $image_data['file_name'];

			// }else{
			// 	$name_icon = $data['icon'];
			// }
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

			$en_lang= $this->query_sql->select_row('dev_lang', 'id', array('parentid' => $id,'type' => 'news','lang' => 'en'));
			if(isset($en_lang) && $en_lang!=NULL){
				$data_update_lang = array(
					'name' 			=> 	$this->input->post('en_name'),
					'description' 	=> 	$this->input->post('en_description'),
					'content'		=>	$this->input->post('en_content'),
					'address'		=>	$this->input->post('en_address'),
				);
				$this->query_sql->edit('dev_lang', $data_update_lang, array('parentid' => $id,'type' => 'news','lang' => 'en'));
			}else{
				$data_insert_lang = array(
					'name' 			=> 	$this->input->post('en_name'),
					'parentid' 		=> 	$id,
					'description' 	=> 	$this->input->post('en_description'),
					'content'		=>	$this->input->post('en_content'),
					'address'		=>	$this->input->post('en_address'),
					'type' 			=> 	'news',
					'lang' 			=> 	'en',
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$this->query_sql->add('dev_lang', $data_insert_lang);
			}

			$data_update = array(
				'typeid' 		=> 	$this->input->post('typeid'),
				'name' 			=> 	$this->input->post('name'),
				'title' 		=> 	$title,
				'userid' 		=> 	$userid,
				'alias' 		=> 	$this->input->post('alias'),
				'publish' 		=> 	$this->input->post('publish'),
				'is_hot' 		=> 	$this->input->post('is_hot'),
				'is_home' 		=> 	$this->input->post('is_home'),
				'description' 	=> 	$this->input->post('description'),
				// 'icon'			=>	$name_icon,
				'image'			=>	$name_img,
				'image_thumb'	=>	$name_img_thumb,
				'meta_keyword' 	=> 	$keyword,
				'meta_description' 	=> 	$description,
				'content'		=>	$this->input->post('content'),
				'cityid' 		=> 	$this->input->post('cityid'),
				'website' 		=> 	$this->input->post('website'),
				'hotline' 		=> 	$this->input->post('hotline'),
				'fax' 			=> 	$this->input->post('fax'),
				'address' 		=> 	$this->input->post('address'),
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->edit('dev_news', $data_update, array('id' => $id));
			
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/news/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/news/index',$data);
			}	
		}
		$data['news'] = $this->query_sql->select_row('dev_news', '*', array('id' => $id));
		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 1));
		if(isset($data['type']) && $data['type'] != NULL){
			foreach ($data['type'] as $key => $val) {
				$data['type'][$key]['type_child'] = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if($data['type'][$key]['type_child'] != NULL){
					foreach ($data['type'][$key]['type_child'] as $key_child2 => $val_child2) {
						$data['type'][$key]['type_child'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
						if($data['type'][$key]['type_child'][$key_child2]['child_3'] != NULL){
							foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
								$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
								if($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
									foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
										$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, sort');
									}
								}
							}
						}
					}
				}
			}
		}
		$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));
		$data['en_lang'] = $this->query_sql->select_row('dev_lang', 'name,description,content,address', array('parentid' => $id,'type' => 'news','lang' => 'en'));
		$data['title'] = 'Cập nhật bài viết';
		$data['template'] = 'backend/news/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function get_menu_child($parentid = 0,$field = ''){
		$data = $this->query_sql->select_array('dev_menu',$field,array('parentid' => $parentid));
		return $data;
	}
	public function alias()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$_title = $_POST['_title'];
		$id = isset($_POST['id'])?$_POST['id']:0;
		$alias = $this->CI_function->check_alias($id,$this->CI_function->create_alias($_title),'','dev_menu');
		$arr_alias = array(
			'alias' => $alias
		);
		echo json_encode($arr_alias);
	}
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$data = $this->query_sql->select_row('dev_news', 'image,image_thumb', array('id' => $id));
		$file = "upload/news/".$data['image'];
		$file_thumb = "upload/news/thumb/".$data['image_thumb'];
		unlink($file);
		unlink($file_thumb);
		$this->query_sql->del('dev_news',array('id' => $id));
	}
	public function show()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_news','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_news', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_news','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/news/show', $data_publish);
	}
	public function home()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_news','is_home',array('id' => $id));
		if($sql['is_home']==1){
			$is_home = 0;
		}else{
			$is_home = 1;
		}
		$data_update['is_home'] = $is_home;
		$this->query_sql->edit('dev_news', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_news','is_home',array('id' => $id));
		$data_is_home['is_home'] = $data_sql['is_home'];
		$this->load->view('backend/news/home', $data_is_home);
	}
	public function hot()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_news','is_hot',array('id' => $id));
		if($sql['is_hot']==1){
			$is_hot = 0;
		}else{
			$is_hot = 1;
		}
		$data_update['is_hot'] = $is_hot;
		$this->query_sql->edit('dev_news', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_news','is_hot',array('id' => $id));
		$data_is_hot['is_hot'] = $data_sql['is_hot'];
		$this->load->view('backend/news/hot', $data_is_hot);
	}
	public function showall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$listid = $_POST['listid'];
		$sql = $this->query_sql->select_row('dev_news','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_news', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_news','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/news/showall', $data_publish);
	}
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $value) {
        	$data = $this->query_sql->select_row('dev_news', 'image,image_thumb', array('id' => $value));
			$file = "upload/news/".$data['image'];
			$file_thumb = "upload/news/thumb/".$data['image_thumb'];
			unlink($file);
			unlink($file_thumb);
        	$this->query_sql->del('dev_news',array('id' => $value));
        }
	}
	public function sort()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
    	$id = $_POST['id'];
    	$sort = $_POST['sort'];
		$data_update['sort'] = $sort;
		$this->query_sql->edit('dev_news', $data_update, array('id' => $id));
    }
    public function search()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
    	$keyword = $_POST['keyword'];
    	if($keyword != ''){
    		$data_like['name'] = $keyword;
    		$data['news'] = $this->query_sql->select_like('dev_news','id,created, name,publish,image_thumb,typeid',$data_like,'');
    		if(isset($data['news']) && $data['news']!=NULL){
				foreach ($data['news'] as $key => $val) {
					$type = $this->query_sql->select_row('dev_menu', 'name', array('id' => $val['typeid']));
					$data['news'][$key]['type_name'] = $type['name'];
				}
			}
		}
		$this->load->view('backend/news/search', isset($data)?$data:NULL);
    }
    public function dropzone(){
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$random = rand(10,1000);
		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			$new_fileName = explode('.',$fileName);
			$new_fileName = $new_fileName[0].'-'.$random.'.'.$new_fileName[1];
			$targetPath = getcwd() . '/upload/news/detail/';
			$targetFile = $targetPath . $new_fileName;
			move_uploaded_file($tempFile, $targetFile);


			$this->load->library('image_lib');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'upload/news/detail/'.$new_fileName;
			$config['new_image'] = 'upload/news/detail/thumb/'.$new_fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 300;
			$config['height'] = 300;

			$name_img = explode('.',$new_fileName);
			$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
			
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();

			$data_insert = array(
				'image' 		=> 	$new_fileName,
				'image_thumb' 	=> 	$name_img_thumb,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('dev_news_image', $data_insert);
			$arr_id = array(
				'id' => $flag['id_insert']
			);
			echo json_encode($arr_id);
		}
    }
    public function deldropzone(){
    	$image = $_POST['image'];
    	$image = substr($image,0,-4);
    	$news_image = $this->query_sql->select_row_like_position('dev_news_image', 'id,image', 'image',$image,'after','id desc');
    	$file = "upload/news/detail/".$news_image['image'];
		unlink($file);
    	$this->query_sql->del('dev_news_image',array('image' => $news_image['image']));
    }
    public function delimgdetail()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$news_image = $this->query_sql->select_row('dev_news_image', 'image', array('id' => $id));
		$file = "upload/news/detail/".$news_image['image'];
		unlink($file);
		$this->query_sql->del('dev_news_image',array('id' => $id));
	}
}
