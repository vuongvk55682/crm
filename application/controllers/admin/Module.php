<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends MY_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->model('query_sql');
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
		$data['data_index'] = $this->get_index();

		$data['title'] = 'Quản lý module';
		$data['template'] = 'backend/module/index';

		// $config = $this->Query_mongo->_pagination();
		// $config['base_url'] = base_url().'admin/module/index/';
		// $config['total_rows'] = $this->mongo_db->count('ci_module');
		// $config['uri_segment'] = 4;
		// $config['per_page'] = 100;  
		// $total_page = ceil($config['total_rows']/$config['per_page']);
		// $page = ($page > $total_page)?$total_page:$page;
		// $page = ($page < 1)?1:$page;
		// $page = $page - 1;
		
		// $this->pagination->initialize($config);
		// $data['list_pagination'] = $this->pagination->create_links();
		$total_rows = $this->mongo_db->count('ci_module');
		if($total_rows > 0){
			// $data['module'] = $this->query_sql->view_where('id, name, controller, created, publish, sort, parentid, action','ci_module',array('parentid' => 0),($page * $config['per_page']),$config['per_page']);

			$data['module'] = $this->mongo_db->order_by(array('created' => 'DESC'))->get_where('ci_module', array('parentid' => '0'));
			// $data['module'] = $this->mongo_db->get_where('ci_module', array('parentid' => '0'));

			foreach ($data['module'] as $key => $val) {
				// $data_child = $this->query_sql->select_array('ci_module','id, name, controller, created, publish, sort, parentid',array('parentid' => $val['id']));
				$data_child = $this->mongo_db->get_where('ci_module',array('parentid' => "".$val['_id'].""));

				$data['module'][$key]['module_child'] = $data_child;
			}
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
		$data['title'] = 'Thêm module';
		$data['template'] = 'backend/module/add';
		if($this->input->post()){
			// $this->form_validation->set_rules('name','Tên','trim|required');
			// if($this->form_validation->run()){
			$created_str = gmdate('Y-m-d H:i:s', time()+7*3600);
			$created_int = strtotime($created_str);

			$data_insert = array(
				'name' 			=> 	$this->input->post('name'),
				'parentid' 		=> 	$this->input->post('parentid'),
				'controller' 	=> 	$this->input->post('controller'),
				'action' 		=> 	$this->input->post('action'),
				'publish'		=>	$this->input->post('publish'),
				'created'		=>	new MongoDate($created_int)
			);
			$flag = $this->mongo_db->insert('ci_module', $data_insert);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/module/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/module/index',$data);
			}	
		}
		$data['module'] = $this->mongo_db->select(array('_id', 'name', 'controller', 'created', 'publish', 'sort'))->get_where('ci_module',array('parentid' => '0'));
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
			$updated_str = gmdate('Y-m-d H:i:s', time()+7*3600);
			$updated_int = strtotime($updated_str);

			$data_update = array(
				'name' 			=> 	$this->input->post('name'),
				'parentid' 		=> 	$this->input->post('parentid'),
				'controller' 	=> 	$this->input->post('controller'),
				'action' 		=> 	$this->input->post('action'),
				'publish'		=>	$this->input->post('publish'),
				'updated'		=>	new MongoDate($updated_int)
			);
			$flag = $this->mongo_db->update_set('ci_module', $data_update, $id);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/module/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/module/index',$data);
			}
		}
		
		$data['module']	= $this->mongo_db->select(array('_id', 'name', 'controller', 'created', 'publish', 'parentid', 'action'))->where(array('_id' => new MongoId($id)))->find_one('ci_module');

		$data['modules'] = $this->mongo_db->select(array('id', 'name', 'controller', 'created', 'publish', 'sort', 'parentid'))->get_where('ci_module',array('parentid' => '0'));
		
		$data['title'] = 'Cập nhật module';
		$data['template'] = 'backend/module/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function delete()
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$id = $_POST['id'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('parentid' => new MongoId($id)))->find_one('ci_module');
		// $sql = $this->query_sql->select_row('ci_module','publish',array('parentid' => $id));
		if($sql != NULL){
			$this->session->set_flashdata('message_flashdata', array(
				'type'		=> 'sucess',
				'message'	=> 'Không thể xóa khi có danh mục con!',
			));
			redirect('admin/module/index',$data);
		}else{
			$this->mongo_db->delete('ci_module',array('_id' => new  MongoId($id)));
			// $this->query_sql->del('ci_module',array('id' => $id));
		}
	}
	public function show()
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$id = $_POST['id'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('ci_module');
		// $sql = $this->query_sql->select_row('ci_module','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('ci_module',$data_update,$id);
		// $this->query_sql->edit('ci_module', $data_update, array('id' => $id));
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('ci_module');
		// $data_sql = $this->query_sql->select_row('ci_module','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/module/show', $data_publish);
	}
	public function showall()
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$listid = $_POST['listid'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('ci_module');
		// $sql = $this->query_sql->select_row('ci_module','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('ci_module',$data_update,$listid);
		// $this->query_sql->edit('ci_module', $data_update, array('id' => $listid));
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('ci_module');
		// $data_sql = $this->query_sql->select_row('ci_module','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/module/showall', $data_publish);
	}
	public function deleteall()
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $val) {
        	$this->mongo_db->delete('ci_module',array('_id' => new  MongoId($val)));
        	// $this->query_sql->del('ci_module',array('id' => $value));
        }
	}
	public function sort()
    {
  //   	if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
    	$id = $_POST['id'];
    	$sort = $_POST['sort'];
		$data_update['sort'] = $sort;
		$this->query_sql->edit('ci_module', $data_update, array('id' => $id));
    }
    public function changeparentid()
    {
  //   	if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
    	$id = $_POST['id'];
    	$parentid = $_POST['parentid'];
    	$data['parentid'] = $parentid;
    	$this->query_sql->edit('ci_module', $data, array('id' => $id));
    }
    public function search()
    {
  //   	if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		// $data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
    	$keyword = $_POST['keyword'];
    	$data_like['name'] = $keyword;
    	$data['module'] = $this->query_sql->select_like('ci_module','id, name, controller, created, publish,parentid, sort',$data_like,'');
    	foreach ($data['module'] as $key => $val) {
			$data_child = $this->query_sql->select_array('ci_module','id, name, controller, created, publish, sort, parentid',array('parentid' => $val['id']));
			$data['module'][$key]['module_child'] = $data_child;
		}
		$this->load->view('backend/module/search', isset($data)?$data:NULL);
    }
}
