<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
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
		$data['title'] = 'Quản lý thông tin liên hệ';
		$data['template'] = 'backend/contact/index';
		$data['data_index'] = $this->get_index();
		

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/contact/index/';
		$config['total_rows'] = $this->query_sql->total('dev_contact');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 10; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['contact'] = $this->query_sql->view('*','dev_contact',($page * $config['per_page']),$config['per_page']);
		}

		$this->load->view('backend/index', isset($data)?$data:NULL);
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
		$this->query_sql->del('dev_contact',array('id' => $id));
	}
	public function status()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_contact','status',array('id' => $id));
		if($sql['status']==1){
			$status = 0;
		}else{
			$status = 1;
		}
		$data_update['status'] = $status;
		$this->query_sql->edit('dev_contact', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_contact','status',array('id' => $id));
		$data_status['status'] = $data_sql['status'];
		$this->load->view('backend/contact/status', $data_status);
	}
	public function changestatus()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$data_update['status'] = 1;
		$this->query_sql->edit('dev_contact', $data_update, array('id' => $id));
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
        	$this->query_sql->del('dev_contact',array('id' => $value));
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
    		$data_like['fullname'] = $keyword;
    		$data['contact'] = $this->query_sql->select_like('dev_contact','*',$data_like,'');
		}
		$this->load->view('backend/contact/search', isset($data)?$data:NULL);
    }
}
