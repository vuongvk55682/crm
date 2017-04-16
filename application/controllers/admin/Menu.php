<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {
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
		$data['title'] = 'Quản lý danh mục';
		$data['template'] = 'backend/menu/index';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/menu/index/';
		$config['total_rows'] = $this->query_sql->total('dev_menu');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 200;  
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['menu'] = $this->query_sql->view_where('id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild','dev_menu',array('parentid' => 0),($page * $config['per_page']),$config['per_page']);
			if($data['menu'] != NULL){
				foreach ($data['menu'] as $key => $val) {
					$data['menu'][$key]['child_2'] = $this->get_menu_child($val['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, image, image_qc, is_top, is_footer,is_banner,is_homechild, parentid');
					if($data['menu'][$key]['child_2'] != NULL){
						foreach ($data['menu'][$key]['child_2'] as $key_child2 => $val_child2) {
							$data['menu'][$key]['child_2'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild');
							if($data['menu'][$key]['child_2'][$key_child2]['child_3'] != NULL){
								foreach ($data['menu'][$key]['child_2'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
									$data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild');
									if($data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
										foreach ($data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
											$data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild');
										}
									}
								}
							}
						}
					}
				}
			}
		}

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function loadtype()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
    	$typeid = $_POST['typeid'];
    	if($typeid != ''){
    		$data['menu'] = $this->query_sql->view_where('id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild','dev_menu',array('id' => $typeid),0,100);
			if($data['menu'] != NULL){
				foreach ($data['menu'] as $key => $val) {
					$data['menu'][$key]['child_2'] = $this->get_menu_child($val['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, image, image_qc, is_top, is_footer,is_banner,is_homechild, parentid');
					if($data['menu'][$key]['child_2'] != NULL){
						foreach ($data['menu'][$key]['child_2'] as $key_child2 => $val_child2) {
							$data['menu'][$key]['child_2'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild');
							if($data['menu'][$key]['child_2'][$key_child2]['child_3'] != NULL){
								foreach ($data['menu'][$key]['child_2'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
									$data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild');
									if($data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
										foreach ($data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
											$data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild');
										}
									}
								}
							}
						}
					}
				}
			}
		}
		$this->load->view('backend/menu/loadtype', isset($data)?$data:NULL);
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
		$data['title'] = 'Thêm danh mục';
		$data['template'] = 'backend/menu/add';
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên','trim|required');
			if($this->form_validation->run()){
				// if($_FILES["image"]["name"]){
				// 	$album_dir = 'upload/menu/';
				// 	if(!is_dir($album_dir)){ create_dir($album_dir); } 
				// 	$config['upload_path']	= $album_dir;
				// 	$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				// 	$config['max_size'] = 5120;
				// 	$config['width'] = 30;
				// 	$config['height'] = 30;

					
				// 	$this->load->library('upload', $config); 
				// 	$this->upload->initialize($config); 
				// 	$image = $this->upload->do_upload("image");
				// 	$image_data = $this->upload->data();

				//     $name_img = $image_data['file_name'];
				// }else{
				// 	$name_img = '';
				// }
				// if($_FILES["image_qc"]["name"]){
				// 	$album_dir_bg = 'upload/menu/';
				// 	if(!is_dir($album_dir_bg)){ create_dir($album_dir_bg); } 
				// 	$config_bg['upload_path']	= $album_dir_bg;
				// 	$config_bg['allowed_types'] = 'jpg|png|jpeg|gif'; 
				// 	$config_bg['max_size'] = 5120;
				// 	$config['width'] = 400;
				// 	$config['height'] = 500;

					
				// 	$this->load->library('upload', $config_bg); 
				// 	$this->upload->initialize($config_bg); 
				// 	$image_qc = $this->upload->do_upload("image_qc");
				// 	$image_data_bg = $this->upload->data();

				//     $name_image_qc = $image_data_bg['file_name'];
				// }else{
				// 	$name_image_qc = '';
				// }
				$alias = $this->CI_function->check_alias(0,$this->CI_function->create_alias($this->input->post('name')),'','dev_menu');
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
					'name' 			=> 	$this->input->post('name'),
					'parentid' 		=> 	$this->input->post('parentid'),
					'link' 			=> 	$this->input->post('link'),
					'type' 			=> 	$this->input->post('type'),
					'alias' 		=> 	$alias,
					'title' 		=> 	$title,
					// 'image' 		=> 	$name_img,
					// 'image_qc' 		=> 	$name_image_qc,
					'is_menu' 		=> 	1,
					'is_home' 		=> 	1,
					'is_left' 		=> 	1,
					'is_top' 		=> 	1,
					'is_footer' 	=> 	1,
					'is_banner' 	=> 	1,
					'is_homechild'	=>	1,
					'content' 		=> 	$this->input->post('content'),
					'content_ads' 		=> 	$this->input->post('content_ads'),
					'link_qc' 		=> 	$this->input->post('link_qc'),
					'image_link' 		=> 	$this->input->post('image_link'),
					'show_brand' 	=> 	$this->input->post('show_brand'),
					'is_full' 	=> 	$this->input->post('is_full'),
					'shows' 	=> 	$this->input->post('shows'),
					'meta_keyword' 	=> 	$keyword,
					'meta_description' 	=> 	$description,
					'publish'		=>	$this->input->post('publish'),
					'iconid'		=>	$this->input->post('iconid'),
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->query_sql->add('dev_menu', $data_insert);
				$id_insert = $flag['id_insert'];

				$data_insert_route = array(
					'name' 	=> 	$this->input->post('name'),
					'alias' 	=> 	$alias,
					'type' 		=> 	3,
					'parentid' 	=> 	$id_insert,
				);
				$flag_route = $this->query_sql->add('dev_route', $data_insert_route);

				$data_insert_lang = array(
					'name' 			=> 	$this->input->post('en_name'),
					'parentid' 		=> 	$id_insert,
					'description' 	=> 	$this->input->post('en_description'),
					'content'		=>	$this->input->post('en_content'),
					'type' 			=> 	'menu',
					'lang' 			=> 	'en',
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$this->query_sql->add('dev_lang', $data_insert_lang);
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/menu/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/menu/index',$data);
				}	
			}
		}
		$data['menu'] = $this->query_sql->select_array('dev_menu','id, name, created, publish, sort',array('parentid' => 0));
		if($data['menu']){
			foreach ($data['menu'] as $key => $val) {
				$menu_child2 = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if(isset($menu_child2) && $menu_child2!=NULL){
					foreach ($menu_child2 as $key_child2 => $val_child2) {
						$menu_child3 = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
						if(isset($menu_child3) && $menu_child3!=NULL){
							foreach ($menu_child3 as $key_child3 => $val_child3) {
								$menu_child4 = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
								$menu_child3[$key_child3]['child_4'] = $menu_child4;
							}
						}
						$menu_child2[$key_child2]['child_3'] = $menu_child3;
					}
				}
				$data['menu'][$key]['child_2'] = $menu_child2;

			}
		}
		$data['icon'] = $this->query_sql->select_array('dev_icon','id, icon',array('publish' => 0));
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function get_menu_child($parentid = 0,$field = ''){
		$data = $this->query_sql->select_array('dev_menu',$field,array('parentid' => $parentid));
		return $data;
	}
	public function addslow()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên','trim|required');
			if($this->form_validation->run()){
				$alias = $this->CI_function->check_alias(0,$this->CI_function->create_alias($this->input->post('name')),'','dev_menu');
				$title = $this->input->post('title');
				$id = $this->input->post('id');
				$description = $this->input->post('meta_description');
				$keyword = $this->input->post('meta_keyword');
				$act = $this->input->post('act');
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
					'name' 			=> 	$this->input->post('name'),
					'parentid' 		=> 	$this->input->post('typeids'),
					'link' 			=> 	$this->input->post('link'),
					'type' 			=> 	2,
					'alias' 		=> 	$alias,
					'title' 		=> 	$title,
					'is_menu' 		=> 	1,
					'is_home' 		=> 	1,
					'is_left' 		=> 	1,
					'is_top' 		=> 	1,
					'is_footer' 	=> 	1,
					'meta_keyword' 	=> 	$keyword,
					'meta_description' 	=> 	$description,
					'publish'		=>	0,
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->query_sql->add('dev_menu', $data_insert);
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					if(isset($id) && $id != 0){
						redirect('admin/product/edit/'.$id,isset($data)?$data:'');
					}else if(isset($act) && $act != ''){
						redirect('admin/product/curl/',isset($data)?$data:'');
					}
					else{
						redirect('admin/product/add',isset($data)?$data:'');
					}
					
				}
			}
		}
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
		if($this->input->post()){
			$menu = $this->query_sql->select_row('dev_menu', 'image,image_qc', array('id' => $id));
			$this->form_validation->set_rules('name','Tiêu đề','trim|required');
			if($this->form_validation->run()){
				if($_FILES["image"]["name"]){
					$file = "upload/menu/".$menu['image'];
					unlink($file);

					$album_dir = 'upload/menu/';
					if(!is_dir($album_dir)){ create_dir($album_dir); } 
					$config['upload_path']	= $album_dir;
					$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
					$config['max_size'] = 5120;
					
					$this->load->library('upload', $config); 
					$this->upload->initialize($config); 
					$image = $this->upload->do_upload("image");
					$image_data = $this->upload->data();

				    $name_img = $image_data['file_name'];

				}else{
					$name_img = $menu['image'];
				}
				if($_FILES["image_qc"]["name"]){
					$file_qc = "upload/menu/".$menu['image_qc'];
					unlink($file_qc);

					$album_dir_qc = 'upload/menu/';
					if(!is_dir($album_dir_qc)){ create_dir($album_dir_qc); } 
					$config_qc['upload_path']	= $album_dir_qc;
					$config_qc['allowed_types'] = 'jpg|png|jpeg|gif'; 
					$config_qc['max_size'] = 5120;
					
					$this->load->library('upload', $config_qc); 
					$this->upload->initialize($config_qc); 
					$image_qc = $this->upload->do_upload("image_qc");
					$image_data_qc = $this->upload->data();

				    $name_image_qc = $image_data_qc['file_name'];

				}else{
					$name_image_qc = $menu['image_qc'];
				}
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
						'type' 		=> 	3,
						'parentid' 	=> 	$id,
					);
					$flag_route = $this->query_sql->add('dev_route', $data_insert_route);
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

				$en_lang= $this->query_sql->select_row('dev_lang', 'id', array('parentid' => $id,'type' => 'menu','lang' => 'en'));
				if(isset($en_lang) && $en_lang!=NULL){
					$data_update_lang = array(
						'name' 			=> 	$this->input->post('en_name'),
						'content'		=>	$this->input->post('en_content'),
					);
					$this->query_sql->edit('dev_lang', $data_update_lang, array('parentid' => $id,'type' => 'menu','lang' => 'en'));
				}else{
					$data_insert_lang = array(
						'name' 			=> 	$this->input->post('en_name'),
						'parentid' 		=> 	$id,
						'content'		=>	$this->input->post('en_content'),
						'type' 			=> 	'menu',
						'lang' 			=> 	'en',
						'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
					);
					$this->query_sql->add('dev_lang', $data_insert_lang);
				}
				
				$data_update = array(
					'name' 			=> 	$this->input->post('name'),
					'parentid' 		=> 	$this->input->post('parentid'),
					'link' 			=> 	$this->input->post('link'),
					'type' 			=> 	$this->input->post('type'),
					'alias' 		=> 	$alias,
					'title' 		=> 	$title,
					'image' 		=> 	$name_img,
					'image_qc' 		=> 	$name_image_qc,
					'content' 		=> 	$this->input->post('content'),
					'content_ads' 	=> 	$this->input->post('content_ads'),
					'link_qc' 		=> 	$this->input->post('link_qc'),
					'image_link' 	=> 	$this->input->post('image_link'),
					'show_brand' 	=> 	$this->input->post('show_brand'),
					'is_full' 	=> 	$this->input->post('is_full'),
					'shows' 	=> 	$this->input->post('shows'),
					'meta_keyword' 	=> 	$keyword,
					'meta_description' 	=> 	$description,
					'publish'		=>	$this->input->post('publish'),
					'iconid'		=>	$this->input->post('iconid'),
					'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/menu/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/menu/index',$data);
				}	
			}
		}
		
		$data['menu'] = $this->query_sql->select_row('dev_menu', 'id, name, meta_keyword, meta_description, title, created, publish, parentid, type, content, link, image, image_qc,link_qc,image_link,iconid,show_brand,content_ads,is_full,shows', array('id' => $id));
		$data['en_lang'] = $this->query_sql->select_row('dev_lang', 'name,description,content', array('parentid' => $id,'type' => 'menu','lang' => 'en'));

		$data['menus'] = $this->query_sql->select_array('dev_menu','id, name, created, publish, sort, parentid, type',array('parentid' => 0));
		if($data['menus']){
			foreach ($data['menus'] as $key => $val) {
				$menu_child2 = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if(isset($menu_child2) && $menu_child2!=NULL){
					foreach ($menu_child2 as $key_child2 => $val_child2) {
						$menu_child3 = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
						if(isset($menu_child3) && $menu_child3!=NULL){
							foreach ($menu_child3 as $key_child3 => $val_child3) {
								$menu_child4 = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
								$menu_child3[$key_child3]['child_4'] = $menu_child4;
							}
						}
						$menu_child2[$key_child2]['child_3'] = $menu_child3;
					}
				}
				$data['menus'][$key]['child_2'] = $menu_child2;
			}
		}
		$data['icon'] = $this->query_sql->select_array('dev_icon','id, icon',array('publish' => 0));
		$data['title'] = 'Cập nhật danh mục';
		$data['template'] = 'backend/menu/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
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
		$menu = $this->query_sql->select_row('dev_menu', 'image,image_qc', array('id' => $id));
		$file = "upload/menu/".$menu['image'];
		$file_qc = "upload/menu/".$menu['image_qc'];
		unlink($file);
		unlink($file_qc);
		$this->query_sql->del('dev_menu',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_menu','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_menu','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/menu/show', $data_publish);
	}
	public function showleft()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_menu','is_left',array('id' => $id));
		if($sql['is_left']==1){
			$is_left = 0;
		}else{
			$is_left = 1;
		}
		$data_update['is_left'] = $is_left;
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_menu','is_left',array('id' => $id));
		$data_is_left['is_left'] = $data_sql['is_left'];
		$this->load->view('backend/menu/showleft', $data_is_left);
	}
	public function showtop()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_menu','is_top',array('id' => $id));
		if($sql['is_top']==1){
			$is_top = 0;
		}else{
			$is_top = 1;
		}
		$data_update['is_top'] = $is_top;
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_menu','is_top',array('id' => $id));
		$data_is_top['is_top'] = $data_sql['is_top'];
		$this->load->view('backend/menu/showtop', $data_is_top);
	}
	public function showfooter()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_menu','is_footer',array('id' => $id));
		if($sql['is_footer']==1){
			$is_footer = 0;
		}else{
			$is_footer = 1;
		}
		$data_update['is_footer'] = $is_footer;
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_menu','is_footer',array('id' => $id));
		$data_is_footer['is_footer'] = $data_sql['is_footer'];
		$this->load->view('backend/menu/showfooter', $data_is_footer);
	}
	public function showbanner()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_menu','is_banner',array('id' => $id));
		if($sql['is_banner']==1){
			$is_banner = 0;
		}else{
			$is_banner = 1;
		}
		$data_update['is_banner'] = $is_banner;
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_menu','is_banner',array('id' => $id));
		$data_is_banner['is_banner'] = $data_sql['is_banner'];
		$this->load->view('backend/menu/showbanner', $data_is_banner);
	}
	public function showmenu()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_menu','is_menu',array('id' => $id));
		if($sql['is_menu']==1){
			$is_menu = 0;
		}else{
			$is_menu = 1;
		}
		$data_update['is_menu'] = $is_menu;
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_menu','is_menu',array('id' => $id));
		$data_is_menu['is_menu'] = $data_sql['is_menu'];
		$this->load->view('backend/menu/showmenu', $data_is_menu);
	}
	public function showhome()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_menu','is_home',array('id' => $id));
		if($sql['is_home']==1){
			$is_home = 0;
		}else{
			$is_home = 1;
		}
		$data_update['is_home'] = $is_home;
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_menu','is_home',array('id' => $id));
		$data_is_home['is_home'] = $data_sql['is_home'];
		$this->load->view('backend/menu/showhome', $data_is_home);
	}
	public function showhomechild()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_menu','is_homechild',array('id' => $id));
		if($sql['is_homechild']==1){
			$is_homechild = 0;
		}else{
			$is_homechild = 1;
		}
		$data_update['is_homechild'] = $is_homechild;
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_menu','is_homechild',array('id' => $id));
		$data_is_homechild['is_homechild'] = $data_sql['is_homechild'];
		$this->load->view('backend/menu/showhomechild', $data_is_homechild);
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
		$sql = $this->query_sql->select_row('dev_menu','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_menu','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/menu/showall', $data_publish);
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
        	$menu = $this->query_sql->select_row('dev_menu', 'image,image_qc', array('id' => $value));
        	$file = "upload/menu/".$menu['image'];
			$file_qc = "upload/menu/".$menu['image_qc'];
			unlink($file);
			unlink($file_qc);
        	$this->query_sql->del('dev_menu',array('id' => $value));
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
		$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
    }
    public function changeparent()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
    	$id = $_POST['id'];
    	$parentid = $_POST['parentid'];
    	$data_update['parentid'] = $parentid;
    	$this->query_sql->edit('dev_menu', $data_update, array('id' => $id));
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
    	$data_like['name'] = $keyword;
    	$data['menu'] = $this->query_sql->select_like('dev_menu','id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild',$data_like,'');
    	if($data['menu'] != NULL){
			foreach ($data['menu'] as $key => $val) {
				$data['menu'][$key]['child_2'] = $this->get_menu_child($val['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, image, image_qc, is_top, is_footer,is_banner,is_homechild, parentid');
				if($data['menu'][$key]['child_2'] != NULL){
					foreach ($data['menu'][$key]['child_2'] as $key_child2 => $val_child2) {
						$data['menu'][$key]['child_2'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild');
						if($data['menu'][$key]['child_2'][$key_child2]['child_3'] != NULL){
							foreach ($data['menu'][$key]['child_2'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
								$data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild');
								if($data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
									foreach ($data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
										$data['menu'][$key]['child_2'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, is_left, is_menu, is_home, sort, parentid, image, image_qc, is_top, is_footer,is_banner,is_homechild');
									}
								}
							}
						}
					}
				}
			}
		}
		$this->load->view('backend/menu/search', isset($data)?$data:NULL);
    }
}
