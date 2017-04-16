<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends MY_Controller {
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
		$data['title'] = 'Quản lý thông tin';
		$data['template'] = 'backend/info/index';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/info/index/';
		$config['total_rows'] = $this->query_sql->total('dev_info');
		$config['uri_segment'] = 4;  
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['info'] = $this->query_sql->view_where('id, created, name,publish,key','dev_info',array('publish' => 0),($page * $config['per_page']),$config['per_page']);
		}
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function admin($page = 1)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Quản lý thông tin';
		$data['template'] = 'backend/info/admin';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/info/admin/';
		$config['total_rows'] = $this->query_sql->total('dev_info');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 20; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['info'] = $this->query_sql->view('id, created, name,publish,key','dev_info',($page * $config['per_page']),$config['per_page']);
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
		$data['title'] = 'Thêm thông tin';
		$data['template'] = 'backend/info/add';
		if($this->input->post()){
			$data_insert = array(
				'name' 			=> 	$this->input->post('name'),
				'publish' 		=> 	$this->input->post('publish'),
				'key' 		=> 	$this->input->post('key'),
				'content'		=>	$this->input->post('content'),
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);

			
			$flag = $this->query_sql->add('dev_info', $data_insert);
			$id_insert = $flag['id_insert'];
			$data_insert_lang = array(
				'parentid' 		=> 	$id_insert,
				'content'		=>	$this->input->post('en_content'),
				'type' 			=> 	'info',
				'lang' 			=> 	'en',
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$this->query_sql->add('dev_lang', $data_insert_lang);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/info/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/info/index',$data);
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
			$en_lang= $this->query_sql->select_row('dev_lang', 'id', array('parentid' => $id,'type' => 'info','lang' => 'en'));
			if(isset($en_lang) && $en_lang!=NULL){
				$data_update_lang = array(
					'content'		=>	$this->input->post('en_content'),
				);
				$this->query_sql->edit('dev_lang', $data_update_lang, array('parentid' => $id,'type' => 'info','lang' => 'en'));
			}else{
				$data_insert_lang = array(
					'parentid' 		=> 	$id,
					'content'		=>	$this->input->post('en_content'),
					'type' 			=> 	'info',
					'lang' 			=> 	'en',
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$this->query_sql->add('dev_lang', $data_insert_lang);
			}
			$data_update = array(
				'name' 			=> 	$this->input->post('name'),
				'publish' 		=> 	$this->input->post('publish'),
				'key' 		=> 	$this->input->post('key'),
				'content'		=>	$this->input->post('content'),
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->edit('dev_info', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/info/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/info/index',$data);
			}	
		}
		$data['info'] = $this->query_sql->select_row('dev_info', '*', array('id' => $id));
		$data['en_lang'] = $this->query_sql->select_row('dev_lang', 'content', array('parentid' => $id,'type' => 'info','lang' => 'en'));
		$data['title'] = 'Cập nhật thông tin';
		$data['template'] = 'backend/info/edit';
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
		$this->query_sql->del('dev_info',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_info','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_info', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_info','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/info/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_info','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_info', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_info','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/info/showall', $data_publish);
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
        	$this->query_sql->del('dev_info',array('id' => $value));
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
    		$data['info'] = $this->query_sql->select_like('dev_info','id,created, name,publish,key',$data_like,'');
		}
		$this->load->view('backend/info/search', isset($data)?$data:NULL);
    }
}
