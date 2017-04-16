<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class District extends MY_Controller {
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
		$data['title'] = 'Quản lý quận/huyện';
		$data['template'] = 'backend/district/index';
		$data['data_index'] = $this->get_index();
		

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/district/index/';
		$config['total_rows'] = $this->query_sql->total('dev_district');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 25; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['district'] = $this->query_sql->view('id, name, created, publish, sort, cityid','dev_district',($page * $config['per_page']),$config['per_page']);
			if(isset($data['district']) && $data['district']!=NULL){
				foreach ($data['district'] as $key => $val) {
					$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $val['cityid']));
					$data['district'][$key]['city_name'] = $city['name'];
				}
			}
		}
		$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));
		$this->load->view('backend/index', isset($data)?$data:NULL);
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
    		$data['district'] = $this->query_sql->select_like('dev_district','id, name, created, publish, sort, cityid',$data_like,'');
			if(isset($data['district']) && $data['district']!=NULL){
				foreach ($data['district'] as $key => $val) {
					$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $val['cityid']));
					$data['district'][$key]['city_name'] = $city['name'];
				}
			}
		}
		$this->load->view('backend/district/search', isset($data)?$data:NULL);
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
    		$data['district'] = $this->query_sql->select_array('dev_district','id, name, created, publish, sort, cityid',array('cityid' => $typeid));
			if(isset($data['district']) && $data['district']!=NULL){
				foreach ($data['district'] as $key => $val) {
					$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $val['cityid']));
					$data['district'][$key]['city_name'] = $city['name'];
				}
			}
		}
		$this->load->view('backend/district/loadtype', isset($data)?$data:NULL);
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
		$data['title'] = 'Thêm quận/huyện';
		$data['template'] = 'backend/district/add';
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tên','trim|required');
			if($this->form_validation->run()){
				$alias = $this->CI_function->check_alias(0,$this->CI_function->create_alias($this->input->post('name')),'','dev_district');
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
					'alias' 		=> 	$alias,
					'title' 		=> 	$title,
					'meta_keyword' 	=> 	$keyword,
					'meta_description' 	=> 	$description,
					'cityid' 	=> 	$this->input->post('cityid'),
					'publish'		=>	$this->input->post('publish'),
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->query_sql->add('dev_district', $data_insert);
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/district/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/district/index',$data);
				}	
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
			$this->form_validation->set_rules('name','Tiêu đề','trim|required');
			if($this->form_validation->run()){
				$alias = $this->CI_function->check_alias($id,$this->CI_function->create_alias($this->input->post('name')),$this->input->post('name'),'dev_district');
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
				$data_update = array(
					'name' 			=> 	$this->input->post('name'),
					'alias' 		=> 	$alias,
					'title' 		=> 	$title,
					'meta_keyword' 	=> 	$keyword,
					'meta_description' 	=> 	$description,
					'cityid' 	=> 	$this->input->post('cityid'),
					'publish'		=>	$this->input->post('publish'),
					'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->query_sql->edit('dev_district', $data_update, array('id' => $id));
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/district/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/district/index',$data);
				}	
			}
		}
		$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));
		$data['district'] = $this->query_sql->select_row('dev_district', 'id, name, publish, cityid,meta_keyword,meta_description,title', array('id' => $id));
		$data['title'] = 'Cập nhật quận/huyện';
		$data['template'] = 'backend/district/edit';
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
		$this->query_sql->del('dev_district',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_district','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_district', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_district','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/district/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_district','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_district', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_district','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/district/showall', $data_publish);
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
        	$this->query_sql->del('dev_district',array('id' => $value));
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
		$this->query_sql->edit('dev_district', $data_update, array('id' => $id));
    }
    
}
