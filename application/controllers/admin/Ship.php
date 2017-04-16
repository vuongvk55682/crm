<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ship extends MY_Controller {
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
		$data['title'] = 'Quản lý nhóm ship';
		$data['template'] = 'backend/ship/index';
		$data['data_index'] = $this->get_index();
		

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/ship/index/';
		$config['total_rows'] = $this->query_sql->total('dev_ship');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 10; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['ship'] = $this->query_sql->view('id,cityid,districtid,number, created, publish,price','dev_ship',($page * $config['per_page']),$config['per_page']);
			if(isset($data['ship']) && $data['ship']!=NULL){
				foreach ($data['ship'] as $key => $val) {
					$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $val['cityid']));
					$data['ship'][$key]['city_name'] = $city['name'];

					$district = $this->query_sql->select_row('dev_district', 'name', array('id' => $val['districtid']));
					$data['ship'][$key]['district_name'] = $district['name'];
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
		$data['title'] = 'Thêm nhóm ship';
		$data['template'] = 'backend/ship/add';
		if($this->input->post()){
			$price = str_replace(',', '', $this->input->post('price'));
			$data_insert = array(
				'number' 		=> 	$this->input->post('number'),
				'price' 		=> 	$price,
				'cityid' 		=> 	$this->input->post('cityid'),
				'districtid' 		=> 	$this->input->post('districtid'),
				'publish'		=>	$this->input->post('publish'),
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('dev_ship', $data_insert);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/ship/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/ship/index',$data);
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
		if($this->input->post()){
			$price = str_replace(',', '', $this->input->post('price'));
			$data_update = array(
				'number' 		=> 	$this->input->post('number'),
				'price' 		=> 	$price,
				'cityid' 		=> 	$this->input->post('cityid'),
				'districtid' 		=> 	$this->input->post('districtid'),
				'publish'		=>	$this->input->post('publish'),
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->edit('dev_ship', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/ship/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/ship/index',$data);
			}	
			
		}
		$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));
		$data['district'] = $this->query_sql->select_array('dev_district','id, name',array('publish' => 0));
		$data['ship'] = $this->query_sql->select_row('dev_ship', 'id, number, publish, cityid, districtid', array('id' => $id));
		$data['title'] = 'Cập nhật nhóm ship';
		$data['template'] = 'backend/ship/edit';
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
		$this->query_sql->del('dev_ship',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_ship','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_ship', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_ship','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/ship/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_ship','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_ship', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_ship','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/ship/showall', $data_publish);
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
        	$this->query_sql->del('dev_ship',array('id' => $value));
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
		$this->query_sql->edit('dev_ship', $data_update, array('id' => $id));
    }
    
}
