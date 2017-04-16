<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menuslide extends MY_Controller {
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
		$data['title'] = 'Quản lý menuslide';
		
		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/menuslide/index/';
		$config['total_rows'] = $this->query_sql->total('dev_menu_slider');
		$config['uri_segment'] = 4;  
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['menuslide'] = $this->query_sql->view('id, name, created, publish, sort,image, url,typeid','dev_menu_slider',($page * $config['per_page']),$config['per_page']);
			if($data['menuslide'] != NULL){
				foreach ($data['menuslide'] as $key => $val) {
					$type = $this->query_sql->select_row('dev_menu', 'name', array('id' => $val['typeid']));
					$data['menuslide'][$key]['type_name'] = $type['name'];
				}
			}
		}
		$data['menu'] = $this->query_sql->select_array('dev_menu','id, name, created, publish, sort',array('parentid' => 0,'type' => 2));
		if($data['menu']){
			foreach ($data['menu'] as $key => $val) {
				$menu_child2 = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				
				$data['menu'][$key]['child_2'] = $menu_child2;

			}
		}
		$data['template'] = 'backend/menuslide/index';
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
		$data['title'] = 'Thêm menuslide';
		$data['template'] = 'backend/menuslide/add';
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên','trim|required');
			if($this->form_validation->run()){
				if($_FILES["image"]["name"]){
					$album_dir = 'upload/menuslide/';
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
					$config['source_image'] = 'upload/menuslide/'.$image_data['file_name'];
					$config['new_image'] = 'upload/menuslide/thumb/'.$image_data['file_name'];
					$config['create_thumb'] = TRUE;
    				$config['maintain_ratio'] = TRUE;
					$config['width'] = 250;
					$config['height'] = 250;

					$name_img = explode('.',$image_data['file_name']);
					$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
					
				    $this->image_lib->initialize($config);
				    $this->image_lib->resize();

				    $name_img = $image_data['file_name'];
				}else{
					$name_img = '';
					$name_img_thumb = '';
				}
				$data_insert = array(
					'name' 			=> 	$this->input->post('name'),
					'typeid' 			=> 	$this->input->post('typeid'),
					'url' 			=> 	$this->input->post('url'),
					'auto' 			=> 	$this->input->post('auto'),
					'width' 		=> 	$this->input->post('width'),
					'height' 		=> 	$this->input->post('height'),
					'image'			=>	$name_img,
					'image_thumb'	=>	$name_img_thumb,
					'publish'		=>	$this->input->post('publish'),
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				
				$flag = $this->query_sql->add('dev_menu_slider', $data_insert);
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/menuslide/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/menuslide/index',$data);
				}	
			}
		}
		$data['menu'] = $this->query_sql->select_array('dev_menu','id, name, created, publish, sort',array('parentid' => 0,'type' => 2));
		if($data['menu']){
			foreach ($data['menu'] as $key => $val) {
				$menu_child2 = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				// if(isset($menu_child2) && $menu_child2!=NULL){
				// 	foreach ($menu_child2 as $key_child2 => $val_child2) {
				// 		$menu_child3 = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
				// 		if(isset($menu_child3) && $menu_child3!=NULL){
				// 			foreach ($menu_child3 as $key_child3 => $val_child3) {
				// 				$menu_child4 = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
				// 				$menu_child3[$key_child3]['child_4'] = $menu_child4;
				// 			}
				// 		}
				// 		$menu_child2[$key_child2]['child_3'] = $menu_child3;
				// 	}
				// }
				$data['menu'][$key]['child_2'] = $menu_child2;

			}
		}
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
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề','trim|required');
			if($this->form_validation->run()){
				if($_FILES["image"]["name"]){

					$data = $this->query_sql->select_row('dev_menu_slider', 'image,image_thumb', array('id' => $id));
					$file = "upload/menuslide/".$data['image'];
					$file_thumb = "upload/menuslide/thumb/".$data['image_thumb'];
					unlink($file);
					unlink($file_thumb);

					$album_dir = 'upload/menuslide/';
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
					$config['source_image'] = 'upload/menuslide/'.$image_data['file_name'];
					$config['new_image'] = 'upload/menuslide/thumb/'.$image_data['file_name'];
					$config['create_thumb'] = TRUE;
    				$config['maintain_ratio'] = TRUE;
					$config['width'] = 250;
					$config['height'] = 250;

					$name_img = explode('.',$image_data['file_name']);
					$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];

					$this->image_lib->initialize($config);
				    $this->image_lib->resize();

					

				}else{
					$name_img = "upload/menuslide/".$data['image'];
					$name_img_thumb = "upload/menuslide/thumb/".$data['image_thumb'];
				}
				$data_update = array(
					'name' 			=> 	$this->input->post('name'),
					'typeid' 			=> 	$this->input->post('typeid'),
					'url' 			=> 	$this->input->post('url'),
					'auto' 			=> 	$this->input->post('auto'),
					'width' 		=> 	$this->input->post('width'),
					'height' 		=> 	$this->input->post('height'),
					'image'			=>	$name_img,
					'image_thumb'	=>	$name_img_thumb,
					'publish'		=>	$this->input->post('publish'),
					'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600),
				);
				
				$flag = $this->query_sql->edit('dev_menu_slider', $data_update, array('id' => $id));
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/menuslide/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/menuslide/index',$data);
				}	
			}
		}
		$data['menu'] = $this->query_sql->select_array('dev_menu','id, name, created, publish, sort',array('parentid' => 0,'type' => 2));
		if($data['menu']){
			foreach ($data['menu'] as $key => $val) {
				$menu_child2 = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				// if(isset($menu_child2) && $menu_child2!=NULL){
				// 	foreach ($menu_child2 as $key_child2 => $val_child2) {
				// 		$menu_child3 = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
				// 		if(isset($menu_child3) && $menu_child3!=NULL){
				// 			foreach ($menu_child3 as $key_child3 => $val_child3) {
				// 				$menu_child4 = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
				// 				$menu_child3[$key_child3]['child_4'] = $menu_child4;
				// 			}
				// 		}
				// 		$menu_child2[$key_child2]['child_3'] = $menu_child3;
				// 	}
				// }
				$data['menu'][$key]['child_2'] = $menu_child2;

			}
		}
		$data['menuslide'] = $this->query_sql->select_row('dev_menu_slider', 'id, name,url,image,width,height,auto, typeid, publish', array('id' => $id));
		$data['title'] = 'Cập nhật menuslide';
		$data['template'] = 'backend/menuslide/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
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
    		$data['menuslide'] = $this->query_sql->view_where('id, name, created, publish, sort,image, url,typeid','dev_menu_slider',array('typeid' => $typeid),0,20);
			if($data['menuslide'] != NULL){
				foreach ($data['menuslide'] as $key => $val) {
					$type = $this->query_sql->select_row('dev_menu', 'name', array('id' => $val['typeid']));
					$data['menuslide'][$key]['type_name'] = $type['name'];
				}
			}
		}
		$this->load->view('backend/menuslide/loadtype', isset($data)?$data:NULL);
    }
	public function get_menu_child($parentid = 0,$field = ''){
		$data = $this->query_sql->select_array('dev_menu',$field,array('parentid' => $parentid));
		return $data;
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
		$data = $this->query_sql->select_row('dev_menu_slider', 'image,image_thumb', array('id' => $id));
		$file = "upload/menuslide/".$data['image'];
		$file_thumb = "upload/menuslide/thumb/".$data['image_thumb'];
		unlink($file);
		unlink($file_thumb);
		$this->query_sql->del('dev_menu_slider',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_menu_slider','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_menu_slider', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_menu_slider','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/menuslide/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_menu_slider','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_menu_slider', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_menu_slider','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/menuslide/showall', $data_publish);
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
			$data = $this->query_sql->select_row('dev_menu_slider', 'image,image_thumb', array('id' => $value));
			$file = "upload/menuslide/".$data['image'];
			$file_thumb = "upload/menuslide/thumb/".$data['image_thumb'];
			unlink($file);
			unlink($file_thumb);
        	$this->query_sql->del('dev_menu_slider',array('id' => $value));
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
		$this->query_sql->edit('dev_menu_slider', $data_update, array('id' => $id));
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
    	$data['menuslide'] = $this->query_sql->select_like_where('dev_menu_slider','id, name, created, publish, sort,image, url,typeid',array(1 => 1),$data_like,'');
    	if($data['menuslide'] != NULL){
			foreach ($data['menuslide'] as $key => $val) {
				$type = $this->query_sql->select_row('dev_menu', 'name', array('id' => $val['typeid']));
				$data['menuslide'][$key]['type_name'] = $type['name'];
			}
		}
		$this->load->view('backend/menuslide/search', isset($data)?$data:NULL);
    }
}
