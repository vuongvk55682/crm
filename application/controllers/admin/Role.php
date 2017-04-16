<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller {
	public function __construct(){
		parent::__construct();

	}
	public function __destruct(){
	}
	public function index($page = 1)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$data['title'] = 'Quản lý nhóm người dùng';
		$data['template'] = 'backend/role/index';
		$total_rows = $this->mongo_db->count('ci_role');

		if ($total_rows > 0) {
			$data['role'] 	= $this->mongo_db->order_by(array('created' => 'DESC'))->get1('ci_role',50,0);
			$count_kh 		= $this->mongo_db->count('ci_role');
			
			$page_integer = $count_kh % 50;
			if ($page_integer == 0) {
				$page_kh = $count_kh / 50;
			} else {
				$count_kh_int = $count_kh / 50 + 1;
				$page_kh = (int)$count_kh_int;
			}

			$data['ci_role_num']['count_kh'] 	= $count_kh;
			$data['ci_role_num']['page_kh'] 	= $page_kh;
			$data['ci_role_num']['max_length'] 	= strlen($page_kh);
		}

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$data['title'] = 'Thêm nhóm người dùng';
		$data['template'] = 'backend/role/add';
		if($this->input->post()){
			$created_str 	= gmdate('Y-m-d H:i:s', time()+7*3600);
			$created_int 	= strtotime($created_str);
			
				$data_insert = array(
					'name' 			=> 	$this->input->post('name'),
					'publish'		=>	(int)$this->input->post('publish'),
					'created'		=>	new MongoDate($created_int)
				);
				$flag = $this->mongo_db->insert('ci_role', $data_insert);
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/role/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/role/index',$data);
				}	

			// }
		}
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function edit($id='')
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		if($this->input->post()){
			$updated_str 	= gmdate('Y-m-d H:i:s', time()+7*3600);
			$updated_int 	= strtotime($updated_str);

			$data_update = array(
				'name' 			=> 	$this->input->post('name'),
				'publish'		=>	(int)$this->input->post('publish'),
				'updated'		=>	new MongoDate($updated_int)
			);
			$flag = $this->mongo_db->update_set('ci_role',$data_update,$id);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/role/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/role/index',$data);
			}	
		}
		
		$data['role'] = $this->mongo_db->where(array('_id' => new MongoId($id)))->find_one('ci_role');
		$data['title'] = 'Cập nhật nhóm người dùng';
		$data['template'] = 'backend/role/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$id = $_POST['id'];
		$this->mongo_db->delete('ci_role',array('_id' => new  MongoId($id)));
	}
	public function show()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$id = $_POST['id'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('ci_role');
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('ci_role',$data_update,$id);
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('ci_role');
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/role/show', $data_publish);
	}
	public function showall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$listid = $_POST['listid'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('ci_role');
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('ci_role',$data_update,$listid);
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('ci_role');
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/role/showall', $data_publish);
	}
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $val) {
        	$this->mongo_db->delete('ci_role',array('_id' => new  MongoId($val)));
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
		$this->query_sql->edit('ci_role', $data_update, array('id' => $id));
    }
    public function permission()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }
		$data['id_role'] = $_GET['id_role'];
		$data['title'] = 'Phân quyền nhóm người dùng';
		$data['data_index'] = $this->get_index();
		$data['template'] = 'backend/role/permission';
		

		// $data['module'] = $this->query_sql->select_array('ci_module','id, name',array('parentid' => 0,'publish' => 0));
		$data['module'] = $this->mongo_db->select(array('_id', 'name'))->get_where('ci_module', array('parentid' => 0,'publish' => 0));
		if(isset($data['module']) && $data['module'] != NULL){
			foreach ($data['module'] as $key => $val) {
				// $data_child = $this->query_sql->select_array('ci_module','id, name, parentid',array('parentid' => $val['id']));
				$data_child = $this->mongo_db->get_where('ci_module',array('parentid' => "".$val['_id'].""));
				$data['module'][$key]['module_child'] = $data_child;

				$permission = $this->mongo_db->select(array('active'))->where(array('id_role' => $data['id_role'], 'id_module' => "".$val['_id'].""))->find_one('dev_permission');
				// $permission = $this->query_sql->select_row('dev_permission', 'active', array('id_role' => $data['id_role'], 'id_module' => $val['id']));
				$data['module'][$key]['active'] = $permission['active'];
				if(isset($data['module'][$key]['module_child']) && $data['module'][$key]['module_child'] != NULL){
					foreach ($data['module'][$key]['module_child'] as $key_child => $val_child) {
						// $permission_chil = $this->query_sql->select_row('dev_permission', 'active', array('id_role' => $data['id_role'], 'id_module' => $val_child['id']));
						$permission_chil = $this->mongo_db->select(array('active'))->where(array('id_role' => $data['id_role'], 'id_module' => "".$val_child['id'].""))->get('dev_permission');
						$data['module'][$key]['module_child'][$key_child]['active'] = $permission_chil['active'];
					}
				}
			}
		}
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function updatepermission()
	{
		// if($this->CI_auth->check_logged() === false){
		// 	redirect(base_url().'admin/dang-nhap.html');
		// }
		$data['data_index'] = $this->get_index();
		// if($data['data_index']['permission'] == 0){
		// 	redirect(base_url().'admin/');
		// }

		$updated_str = gmdate('Y-m-d H:i:s', time()+7*3600);
		$updated_int = strtotime($updated_str);

		$listid = $_POST['listid'];
		$unlistid = $_POST['unlistid'];
		$id_role = $_POST['id_role'];
        $list_id = explode(',', $listid);
        $unlist_id = explode(',', $unlistid);
        foreach ($list_id as $key => $value) {
        	$permission = $this->mongo_db->select(array('_id', 'active'))->where(array('id_role' => $id_role, 'id_module' => $value))->find_one('dev_permission');
        	// $permission = $this->query_sql->select_row('dev_permission', 'id,active', array('id_role' => $id_role, 'id_module' => $value));
        	if($permission != NULL){
        		$data = array(
					'id_role' 		=> 	$id_role,
					'id_module'		=>	$value,
					'active'		=>	1,
					'updated'		=>	new MongoDate($updated_int)
				);
				$flag = $this->mongo_db->update_set1('dev_permission', $data, array('id_role' => $id_role, 'id_module' => $value));
				// $flag = $this->query_sql->edit('dev_permission', $data, array('id_role' => $id_role, 'id_module' => $value));
        	}else{
        		$data = array(
					'id_role' 		=> 	$id_role,
					'id_module'		=>	$value,
					'active'		=>	1,
					'created'		=>	new MongoDate($updated_int)
				);
				$flag = $this->mongo_db->insert('dev_permission', $data);
				// $flag = $this->query_sql->add('dev_permission', $data);
        	}
        }
        foreach ($unlist_id as $key_un => $val_un) {
        	// $permission_un = $this->query_sql->select_row('dev_permission', 'id,active', array('id_role' => $id_role, 'id_module' => $val_un));
        	$permission = $this->mongo_db->select(array('_id', 'active'))->where(array('id_role' => $id_role, 'id_module' => $val_un))->find_one('dev_permission');
        	if($permission_un != NULL){
        		$data_un = array(
					'id_role' 		=> 	$id_role,
					'id_module'		=>	$val_un,
					'active'		=>	0,
					'updated'		=>	new MongoDate($updated_int)
				);
				$flag = $this->mongo_db->update_set1('dev_permission', $data_un, array('id_role' => $id_role, 'id_module' => $val_un));
				// $flag = $this->query_sql->edit('dev_permission', $data_un, array('id_role' => $id_role, 'id_module' => $val_un));
        	}else{
        		$data_un = array(
					'id_role' 		=> 	$id_role,
					'id_module'		=>	$val_un,
					'active'		=>	0,
					'created'		=>	new MongoDate($updated_int)
				);
				$flag = $this->mongo_db->insert('dev_permission', $data_un);
				// $flag = $this->query_sql->add('dev_permission', $data_un);
        	}
        }
	}
	public function pagepagination()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		$num_prev 		= (int)$_POST['num_prev'];
		$num_next 		= (int)$_POST['num_next'];
		$page_index 	= (int)$_POST['page_index'];

		$num_limit 		= 50;

		if (isset($num_prev) && $num_prev != NULL && isset($page_index) && $page_index != NULL) {
			$num_skip  	 = $num_prev - $num_limit;
			$num_from 	 = $num_prev + 1 - $num_limit;
			$num_to	  	 = $num_prev;
			$page_change = $page_index - 1;
		}elseif (isset($num_next) && $num_next != NULL && isset($page_index) && $page_index != NULL) {
			$num_skip 	 = $num_next;
			$num_from 	 = $num_next + 1;
			$num_to	  	 = $num_next + $num_limit;
			$page_change = $page_index + 1;
		}elseif (isset($page_index) && $page_index != NULL) {
			$num_skip 	 = $page_index * $num_limit - $num_limit;
			$num_from 	 = $page_index * $num_limit - $num_limit +1;
			$num_to	  	 = $page_index * $num_limit;
			$page_change = $page_index;
		} else {
			$num_skip 	 = 0;
			$num_from 	 = 1;
			$num_to	  	 = $num_limit;
			$page_change = 1;
		}

		$data['role'] 	= $this->mongo_db->order_by(array('created' => 'DESC'))->get1('ci_role', 50, $num_skip);
		$count_kh 		= $this->mongo_db->count('ci_role');

		$page_integer = $count_kh % 50;
		if ($page_integer == 0) {
			$page_kh = $count_kh / 50;
		} else {
			$count_kh_int = $count_kh / 50 + 1;
			$page_kh = (int)$count_kh_int;
		}

		$data['ci_role_num']['num_from'] 	= $num_from;
		$data['ci_role_num']['num_to'] 		= $num_to;
		$data['ci_role_num']['count_kh'] 	= $count_kh;
		$data['ci_role_num']['page_change'] = $page_change;
		$data['ci_role_num']['max_length'] 	= strlen($page_kh);
		$data['ci_role_num']['page_kh'] 	= $page_kh;

		$this->load->view('backend/role/pagepagination', isset($data)?$data:NULL);
	}
}
