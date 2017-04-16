<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends MY_Controller {
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
		$data['title'] = 'Quản lý mail khách hàng';
		$data['template'] = 'backend/mail/index';
		$data['data_index'] = $this->get_index();
		

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/mail/index/';
		$config['total_rows'] = $this->query_sql->total('dev_mail');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 10; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['mail'] = $this->query_sql->view('id, mail, created,sex,type','dev_mail',($page * $config['per_page']),$config['per_page']);
			if($data['mail'] != NULL){
				foreach ($data['mail'] as $key => $val) {
					$data['mail'][$key]['ar_type'] =  json_decode($val['type'],true);
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
		$data['title'] = 'Thêm mail khách hàng';
		$data['template'] = 'backend/mail/add';
		if($this->input->post()){
			$this->form_validation->set_rules('mail','Mail','trim|required');
			if($this->form_validation->run()){
				$data_insert = array(
					'mail' 			=> 	$this->input->post('mail'),
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->query_sql->add('dev_mail', $data_insert);
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/mail/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/mail/index',$data);
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
			$this->form_validation->set_rules('mail','Mail','trim|required');
			if($this->form_validation->run()){
				
				$data_update = array(
					'mail' 			=> 	$this->input->post('mail'),
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->query_sql->edit('dev_mail', $data_update, array('id' => $id));
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/mail/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/mail/index',$data);
				}	
			}
		}
		
		$data['mail'] = $this->query_sql->select_row('dev_mail', 'id, mail', array('id' => $id));
		$data['title'] = 'Cập nhật mail khách hàng';
		$data['template'] = 'backend/mail/edit';
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
		$this->query_sql->del('dev_mail',array('id' => $id));
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
        	$this->query_sql->del('dev_mail',array('id' => $value));
        }
	}
	public function sent($id=0)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$listid = $_GET['listid'];
		$list_mail = '';
		if(isset($listid) && $listid != NULL){
			$arr_id = explode(',',$listid);
			if($arr_id != NULL){
				foreach ($arr_id as $key_id => $val_id) {
					$mail = $this->query_sql->select_row('dev_mail', 'mail', array('id' => $val_id));
					$list_mail .= $mail['mail'].',';
				}
			}
			$data['listmail'] = substr($list_mail,0,-1);
		}

		$data['title'] = 'Gửi mail';
		$data['template'] = 'backend/mail/sent';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
}
