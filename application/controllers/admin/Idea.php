<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idea extends MY_Controller {
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
		$data['title'] = 'Quản lý ý kiến khách hàng';
		$data['template'] = 'backend/idea/index';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/idea/index/';
		$config['total_rows'] = $this->query_sql->total('dev_idea');
		$config['uri_segment'] = 4;  
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['idea'] = $this->query_sql->view('id, created, name,publish,position','dev_idea',($page * $config['per_page']),$config['per_page']);
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
		$data['title'] = 'Thêm ý kiến khách hàng';
		$data['template'] = 'backend/idea/add';
		if($this->input->post()){
			if($_FILES["image"]["name"]){
				$album_dir = 'upload/idea/';
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
				$name_img = '';
			}
			$data_insert = array(
				'name' 			=> 	$this->input->post('name'),
				'publish' 		=> 	$this->input->post('publish'),
				'content' 			=> 	$this->input->post('content'),
				'position' 		=> 	$this->input->post('position'),
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('dev_idea', $data_insert);
			$id_insert = $flag['id_insert'];
			$data_insert_lang = array(
				'position' 		=> 	$this->input->post('en_position'),
				'parentid' 		=> 	$id_insert,
				'content'		=>	$this->input->post('en_content'),
				'type' 			=> 	'idea',
				'lang' 			=> 	'en',
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$this->query_sql->add('dev_lang', $data_insert_lang);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/idea/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/idea/index',$data);
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
		$userid = $this->CI_auth->logged_id();
		if($this->input->post()){
			
			$en_lang= $this->query_sql->select_row('dev_lang', 'id', array('parentid' => $id,'type' => 'idea','lang' => 'en'));
			if(isset($en_lang) && $en_lang!=NULL){
				$data_update_lang = array(
					'position' 		=> 	$this->input->post('en_position'),
					'content'		=>	$this->input->post('en_content'),
				);
				$this->query_sql->edit('dev_lang', $data_update_lang, array('parentid' => $id,'type' => 'idea','lang' => 'en'));
			}else{
				$data_insert_lang = array(
					'position' 		=> 	$this->input->post('en_position'),
					'parentid' 		=> 	$id,
					'content'		=>	$this->input->post('en_content'),
					'type' 			=> 	'idea',
					'lang' 			=> 	'en',
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$this->query_sql->add('dev_lang', $data_insert_lang);
			}
			$data_update = array(
				'name' 			=> 	$this->input->post('name'),
				'publish' 		=> 	$this->input->post('publish'),
				'content' 			=> 	$this->input->post('content'),
				'position' 		=> 	$this->input->post('position'),
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->edit('dev_idea', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/idea/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/idea/index',$data);
			}	
		}
		$data['idea'] = $this->query_sql->select_row('dev_idea', '*', array('id' => $id));
		$data['en_lang'] = $this->query_sql->select_row('dev_lang', 'trades,idea,content', array('parentid' => $id,'type' => 'idea','lang' => 'en'));
		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 1));
		if(isset($data['type']) && $data['type']!=NULL){
			foreach ($data['type'] as $key => $val) {
				$data['type'][$key]['child'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => $val['id'],'type' => 1));
			}
		}
		$data['title'] = 'Cập nhật ý kiến khách hàng';
		$data['template'] = 'backend/idea/edit';
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
		$data = $this->query_sql->select_row('dev_idea', 'avatar', array('id' => $id));
		$file = "upload/idea/".$data['avatar'];
		unlink($file);
		$this->query_sql->del('dev_lang',array('parentid' => $id,'type' => 'idea','lang' => 'en'));
		$this->query_sql->del('dev_idea',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_idea','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_idea', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_idea','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/idea/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_idea','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_idea', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_idea','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/idea/showall', $data_publish);
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
        	$data = $this->query_sql->select_row('dev_idea', 'avatar', array('id' => $value));
			$file = "upload/idea/".$data['avatar'];
			unlink($file);
			$this->query_sql->del('dev_lang',array('parentid' => $value,'type' => 'idea','lang' => 'en'));
        	$this->query_sql->del('dev_idea',array('id' => $value));
        }
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
    		$data['idea'] = $this->query_sql->select_like('dev_idea','id,created, name,publish,position',$data_like,'');
		}
		$this->load->view('backend/idea/search', isset($data)?$data:NULL);
    }
}
