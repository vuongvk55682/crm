<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MY_Controller {
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
		$data['title'] = 'Quản lý nhóm video';
		$data['template'] = 'backend/video/index';
		$data['data_index'] = $this->get_index();
		

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/video/index/';
		$config['total_rows'] = $this->query_sql->total('dev_video');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 10; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['video'] = $this->query_sql->view('id, name, created, publish,url, sort','dev_video',($page * $config['per_page']),$config['per_page']);
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
		$data['title'] = 'Thêm nhóm video';
		$data['template'] = 'backend/video/add';
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên','trim|required');
			if($this->form_validation->run()){
				$data_insert = array(
					'name' 			=> 	$this->input->post('name'),
					'url' 			=> 	$this->input->post('url'),
					'publish'		=>	$this->input->post('publish'),
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->query_sql->add('dev_video', $data_insert);
				$id_insert = $flag['id_insert'];
				$data_insert_lang = array(
					'name' 			=> 	$this->input->post('en_name'),
					'parentid' 		=> 	$id_insert,
					'type' 			=> 	'video',
					'lang' 			=> 	'en',
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$this->query_sql->add('dev_lang', $data_insert_lang);
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/video/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/video/index',$data);
				}	
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
				$data_update_lang = array(
					'name' 			=> 	$this->input->post('en_name')
				);
				$this->query_sql->edit('dev_lang', $data_update_lang, array('parentid' => $id,'type' => 'video','lang' => 'en'));
				$en_lang= $this->query_sql->select_row('dev_lang', 'id', array('parentid' => $id,'type' => 'video','lang' => 'en'));
				if(isset($en_lang) && $en_lang!=NULL){
					$data_update_lang = array(
						'name' 			=> 	$this->input->post('en_name')
					);
					$this->query_sql->edit('dev_lang', $data_update_lang, array('parentid' => $id,'type' => 'video','lang' => 'en'));
				}else{
					$data_insert_lang = array(
						'name' 			=> 	$this->input->post('en_name'),
						'parentid' 		=> 	$id,
						'type' 			=> 	'video',
						'lang' 			=> 	'en',
						'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
					);
					$this->query_sql->add('dev_lang', $data_insert_lang);
				}
				$data_update = array(
					'name' 			=> 	$this->input->post('name'),
					'url' 			=> 	$this->input->post('url'),
					'publish'		=>	$this->input->post('publish'),
					'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->query_sql->edit('dev_video', $data_update, array('id' => $id));
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/video/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/video/index',$data);
				}	
			}
		}
		
		$data['video'] = $this->query_sql->select_row('dev_video', 'id, name, url, publish', array('id' => $id));
		$data['en_lang'] = $this->query_sql->select_row('dev_lang', 'name', array('parentid' => $id,'type' => 'video','lang' => 'en'));
		$data['title'] = 'Cập nhật nhóm video';
		$data['template'] = 'backend/video/edit';
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
		$this->query_sql->del('dev_lang',array('parentid' => $id,'type' => 'video','lang' => 'en'));
		$this->query_sql->del('dev_video',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_video','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_video', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_video','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/video/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_video','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_video', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_video','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/video/showall', $data_publish);
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
        	$this->query_sql->del('dev_lang',array('parentid' => $value,'type' => 'video','lang' => 'en'));
        	$this->query_sql->del('dev_video',array('id' => $value));
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
		$this->query_sql->edit('dev_video', $data_update, array('id' => $id));
    }
    
}
