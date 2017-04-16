<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test1 extends MY_Controller {
	public function __construct(){
		parent::__construct();

	}
	public function __destruct(){
	}
	public function index($page = 1)
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		// limit(3)->offset(1)->get('khachhang');

		$data['title'] = 'Quản lý Test1';
		$data['template'] = 'backend/test1/index';
		$data['data_index'] = $this->get_index();

		$config = $this->Query_mongo->_pagination();
		$config['base_url'] = base_url().'admin/test1/index/';
		$config['total_rows'] = $this->mongo_db->count('test1');
		// var_dump($config['total_rows']);die;
		$config['uri_segment'] = 4; 
		$config['per_page'] = 10; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['test1'] = $this->mongo_db->select(array('_id','name','gioitinh'))->get('test1');
			// var_dump($data['test1']);die;
		}

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$data['title'] = 'Thêm tỉnh/thành';
		$data['template'] = 'backend/test1/add';
		if($this->input->post()){
			// $this->form_validation->set_rules('name','Tên','trim|required');
				
				$data_insert = array(
					'name' 			=> 	$this->input->post('name'),
					'gioitinh' 		=> 	$this->input->post('gioitinh'),
					// 'alias' 		=> 	$alias,
					// 'title' 		=> 	$title,
					// 'meta_keyword' 	=> 	$keyword,
					// 'meta_description' 	=> 	$description,
					// 'publish'		=>	$this->input->post('publish'),
					// 'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$flag = $this->mongo_db->insert('test1', $data_insert);
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/test1/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/test1/index',$data);
				}	
			
		}
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function edit($id='')
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		if($this->input->post()){
			// $this->form_validation->set_rules('name','Tiêu đề','trim|required');
			// if($this->form_validation->run()){
				// $alias = $this->CI_function->check_alias($id,$this->CI_function->create_alias($this->input->post('name')),$this->input->post('name'),'dev_city');
				// $title = $this->input->post('title');
				// $description = $this->input->post('meta_description');
				// $keyword = $this->input->post('meta_keyword');
				// if($title == ''){
				// 	$title = $this->input->post('name');
				// }
				// if($description == ''){
				// 	$description = $this->input->post('name').', '.$data['data_index']['title']['meta_description'];
				// }
				// if($keyword == ''){
				// 	$keyword = $this->input->post('name').', '.$data['data_index']['title']['meta_keyword'];
				// }
				$data_update = array(
					'name' 			=> 	$this->input->post('name'),
					'gioitinh' 		=> 	$this->input->post('gioitinh')
					// 'alias' 		=> 	$alias,
					// 'title' 		=> 	$title,
					// 'meta_keyword' 	=> 	$keyword,
					// 'meta_description' 	=> 	$description,
					// 'publish'		=>	$this->input->post('publish'),
					// 'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);

				$flag = $this->mongo_db->update('test1', $data_update,array('_id' => new MongoId($id)));

				// var_dump($flag);die;
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/test1/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/test1/index',$data);
				}	
			// }
		}
		
		//$data['test1'] = $this->query_sql->select_row('test1', 'id, name, publish,meta_keyword,meta_description,title', array('id' => $id));
		$data['test1'] = $this->mongo_db->select(array('name','gioitinh'))->where(array('_id' => new MongoId($id)))->find_one('test1');
		// $data['test1'] = $this->mongo_db->select(array('name','gioitinh'))->get_where('test1', array('_id' => new MongoId($id)));
		// echo $data['test1']['_id']['$id'];die;
		// var_dump($data['test1']);die;
		$data['title'] = 'Cập nhật test1';
		$data['template'] = 'backend/test1/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function delete()
	{
		
		$id = $_POST['id'];
		$this->mongo_db->delete('test1',array('_id' => new MongoId($id)));
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
		$sql = $this->query_sql->select_row('dev_city','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_city', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_city','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/city/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_city','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_city', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_city','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/city/showall', $data_publish);
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
        	$this->query_sql->del('dev_city',array('id' => $value));
        }
	}
}
