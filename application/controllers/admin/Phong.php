<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phong extends MY_Controller {
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
		$data['title'] = 'Quản lý phòng';
		$data['template'] = 'backend/phong/index';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/phong/index/';
		$config['total_rows'] = $this->query_sql->total('dev_phong');
		$config['uri_segment'] = 4;  
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['phong'] = $this->query_sql->view('*','dev_phong',($page * $config['per_page']),$config['per_page']);
			if($data['phong'] != NULL){
				
				foreach ($data['phong'] as $key => $val) {
					$ar_tiennghi = json_decode($val['tiennghiid'],true);
					if($ar_tiennghi != NULL){
						$ar_img = NULL;
						foreach ($ar_tiennghi as $key_tiennghi => $val_tiennghi) {
							$tiennghi = $this->query_sql->select_row('ci_image', 'image', array('id' => $val_tiennghi));
							$ar_img[] = $tiennghi['image'];
						}
						$data['phong'][$key]['tiennghi'] = $ar_img;
					}
					
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
		$data['title'] = 'Thêm phòng';
		$data['template'] = 'backend/phong/add';
		if($this->input->post()){
			if($_FILES["image"]["name"]){
				$album_dir = 'upload/phong/';
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
				$config['source_image'] = 'upload/phong/'.$image_data['file_name'];
				$config['new_image'] = 'upload/phong/thumb/'.$image_data['file_name'];
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
			$tiennghiid = json_encode($this->input->post('tiennghiid'));
			$gia = str_replace(',','',$this->input->post('gia'));
			$data_insert = array(
				'name' 			=> 	$this->input->post('name'),
				'title' 		=> 	$title,
				'gia' 			=> 	$gia,
				'alias' 		=> 	$this->input->post('alias'),
				'songuoi' 		=> 	$this->input->post('songuoi'),
				'publish' 		=> 	$this->input->post('publish'),
				'tiennghiid' 	=> 	$tiennghiid,
				'image'			=>	$name_img,
				'image_thumb'	=>	$name_img_thumb,
				'meta_keyword' 	=> 	$keyword,
				'meta_description' 	=> 	$description,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);

			
			$flag = $this->query_sql->add('dev_phong', $data_insert);
			$id_insert = $flag['id_insert'];
			$data_insert_lang = array(
				'name' 			=> 	$this->input->post('en_name'),
				'parentid' 		=> 	$id_insert,
				'type' 			=> 	'phong',
				'lang' 			=> 	'en',
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$this->query_sql->add('dev_lang', $data_insert_lang);
			
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/phong/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/phong/index',$data);
			}	
		}
		$data['tiennghi'] = $this->query_sql->select_array('ci_image', 'id,image,name', array('type' => 'tiennghi'));
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
		
		if($this->input->post()){
			$data = $this->query_sql->select_row('dev_phong', 'image,image_thumb', array('id' => $id));
			
			if($_FILES["image"]["name"]){
				$file = "upload/phong/".$data['image'];
				$file_thumb = "upload/phong/thumb/".$data['image_thumb'];
				unlink($file);
				unlink($file_thumb);

				$album_dir = 'upload/phong/';
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
				$config['source_image'] = 'upload/phong/'.$image_data['file_name'];
				$config['new_image'] = 'upload/phong/thumb/'.$image_data['file_name'];
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

			$en_lang= $this->query_sql->select_row('dev_lang', 'id', array('parentid' => $id,'type' => 'phong','lang' => 'en'));
			if(isset($en_lang) && $en_lang!=NULL){
				$data_update_lang = array(
					'name' 			=> 	$this->input->post('en_name'),
					'description' 	=> 	$this->input->post('en_description'),
					'content'		=>	$this->input->post('en_content'),
					'address'		=>	$this->input->post('en_address'),
				);
				$this->query_sql->edit('dev_lang', $data_update_lang, array('parentid' => $id,'type' => 'phong','lang' => 'en'));
			}else{
				$data_insert_lang = array(
					'name' 			=> 	$this->input->post('en_name'),
					'parentid' 		=> 	$id,
					'description' 	=> 	$this->input->post('en_description'),
					'content'		=>	$this->input->post('en_content'),
					'address'		=>	$this->input->post('en_address'),
					'type' 			=> 	'phong',
					'lang' 			=> 	'en',
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$this->query_sql->add('dev_lang', $data_insert_lang);
			}
			$tiennghiid = json_encode($this->input->post('tiennghiid'));
			$gia = str_replace(',','',$this->input->post('gia'));
			$data_update = array(
				'name' 			=> 	$this->input->post('name'),
				'title' 		=> 	$title,
				'gia' 		=> 	$gia,
				'alias' 		=> 	$this->input->post('alias'),
				'songuoi' 		=> 	$this->input->post('songuoi'),
				'publish' 		=> 	$this->input->post('publish'),
				'tiennghiid' 	=> 	$tiennghiid,
				'image'			=>	$name_img,
				'image_thumb'	=>	$name_img_thumb,
				'meta_keyword' 	=> 	$keyword,
				'meta_description' 	=> 	$description,
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->edit('dev_phong', $data_update, array('id' => $id));
			
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/phong/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/phong/index',$data);
			}	
		}
		$data['phong'] = $this->query_sql->select_row('dev_phong', '*', array('id' => $id));
		if($data['phong'] != NULL){
			$data['phong']['tiennghi'] = json_decode($data['phong']['tiennghiid'],true);
		}
		$data['tiennghi'] = $this->query_sql->select_array('ci_image', 'id,image,name', array('type' => 'tiennghi'));
		$data['en_lang'] = $this->query_sql->select_row('dev_lang', 'name,description,content,address', array('parentid' => $id,'type' => 'phong','lang' => 'en'));
		$data['title'] = 'Cập nhật phòng';
		$data['template'] = 'backend/phong/edit';
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
		$data = $this->query_sql->select_row('dev_phong', 'image,image_thumb', array('id' => $id));
		$file = "upload/phong/".$data['image'];
		$file_thumb = "upload/phong/thumb/".$data['image_thumb'];
		unlink($file);
		unlink($file_thumb);
		$this->query_sql->del('dev_phong',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_phong','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_phong', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_phong','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/phong/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_phong','is_home',array('id' => $id));
		if($sql['is_home']==1){
			$is_home = 0;
		}else{
			$is_home = 1;
		}
		$data_update['is_home'] = $is_home;
		$this->query_sql->edit('dev_phong', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_phong','is_home',array('id' => $id));
		$data_is_home['is_home'] = $data_sql['is_home'];
		$this->load->view('backend/phong/home', $data_is_home);
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
		$sql = $this->query_sql->select_row('dev_phong','is_hot',array('id' => $id));
		if($sql['is_hot']==1){
			$is_hot = 0;
		}else{
			$is_hot = 1;
		}
		$data_update['is_hot'] = $is_hot;
		$this->query_sql->edit('dev_phong', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_phong','is_hot',array('id' => $id));
		$data_is_hot['is_hot'] = $data_sql['is_hot'];
		$this->load->view('backend/phong/hot', $data_is_hot);
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
		$sql = $this->query_sql->select_row('dev_phong','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_phong', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_phong','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/phong/showall', $data_publish);
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
        	$data = $this->query_sql->select_row('dev_phong', 'image,image_thumb', array('id' => $value));
			$file = "upload/phong/".$data['image'];
			$file_thumb = "upload/phong/thumb/".$data['image_thumb'];
			unlink($file);
			unlink($file_thumb);
        	$this->query_sql->del('dev_phong',array('id' => $value));
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
		$this->query_sql->edit('dev_phong', $data_update, array('id' => $id));
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
    		$data['phong'] = $this->query_sql->select_like('dev_phong','*',$data_like,'');
    		if($data['phong'] != NULL){
				
				foreach ($data['phong'] as $key => $val) {
					$ar_tiennghi = json_decode($val['tiennghiid'],true);
					if($ar_tiennghi != NULL){
						$ar_img = NULL;
						foreach ($ar_tiennghi as $key_tiennghi => $val_tiennghi) {
							$tiennghi = $this->query_sql->select_row('ci_image', 'image', array('id' => $val_tiennghi));
							$ar_img[] = $tiennghi['image'];
						}
						$data['phong'][$key]['tiennghi'] = $ar_img;
					}
					
				}
			}
		}
		$this->load->view('backend/phong/search', isset($data)?$data:NULL);
    }
}
