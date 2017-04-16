<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keys extends MY_Controller {
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
		$data['title'] = 'Quản lý từ khóa';
		$data['template'] = 'backend/keys/index';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/keys/index/';
		$config['total_rows'] = $this->query_sql->total_where('dev_keys',array('publish' => 0));
		$config['uri_segment'] = 4; 
		$config['per_page'] = 20; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['keys'] = $this->query_sql->view_where('id, created, name,publish,key','dev_keys',array('publish' => 0),($page * $config['per_page']),$config['per_page']);
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
		$data['title'] = 'Quản lý từ khóa';
		$data['template'] = 'backend/keys/admin';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/keys/admin/';
		$config['total_rows'] = $this->query_sql->total('dev_keys');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 20; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['keys'] = $this->query_sql->view('id, created, name,publish,key','dev_keys',($page * $config['per_page']),$config['per_page']);
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
		$data['title'] = 'Thêm từ khóa';
		$data['template'] = 'backend/keys/add';
		if($this->input->post()){
			$data_insert = array(
				'name' 			=> 	$this->input->post('name'),
				'publish' 		=> 	$this->input->post('publish'),
				'key' 		=> 	$this->input->post('key'),
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);

			
			$flag = $this->query_sql->add('dev_keys', $data_insert);
			$id_insert = $flag['id_insert'];
			$data_insert_lang = array(
				'parentid' 		=> 	$id_insert,
				'name'			=>	$this->input->post('en_name'),
				'type' 			=> 	'keys',
				'lang' 			=> 	'en',
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$this->query_sql->add('dev_lang', $data_insert_lang);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/keys/admin',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/keys/admin',$data);
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
			$en_lang= $this->query_sql->select_row('dev_lang', 'id', array('parentid' => $id,'type' => 'keys','lang' => 'en'));
			if(isset($en_lang) && $en_lang!=NULL){
				$data_update_lang = array(
					'name'		=>	$this->input->post('en_name'),
				);
				$this->query_sql->edit('dev_lang', $data_update_lang, array('parentid' => $id,'type' => 'keys','lang' => 'en'));
			}else{
				$data_insert_lang = array(
					'parentid' 		=> 	$id,
					'name'		=>	$this->input->post('en_name'),
					'type' 			=> 	'keys',
					'lang' 			=> 	'en',
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$this->query_sql->add('dev_lang', $data_insert_lang);
			}
			
			$data_update = array(
				'name' 			=> 	$this->input->post('name'),
				'publish' 		=> 	$this->input->post('publish'),
				'key' 		=> 	$this->input->post('key'),
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->edit('dev_keys', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/keys/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/keys/index',$data);
			}	
		}
		$data['keys'] = $this->query_sql->select_row('dev_keys', '*', array('id' => $id));
		$data['en_lang'] = $this->query_sql->select_row('dev_lang', 'name', array('parentid' => $id,'type' => 'keys','lang' => 'en'));
		$data['title'] = 'Cập nhật từ khóa';
		$data['template'] = 'backend/keys/edit';
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
		$this->query_sql->del('dev_lang',array('parentid' => $id,'type' => 'keys','lang' => 'en'));
		$this->query_sql->del('dev_keys',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_keys','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_keys', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_keys','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/keys/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_keys','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_keys', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_keys','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/keys/showall', $data_publish);
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
        	$this->query_sql->del('dev_lang',array('parentid' => $value,'type' => 'keys','lang' => 'en'));
        	$this->query_sql->del('dev_keys',array('id' => $value));
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
    		$data['keys'] = $this->query_sql->select_like('dev_keys','id,created, name,publish,key',$data_like,'');
		}
		$this->load->view('backend/keys/search', isset($data)?$data:NULL);
    }
}
