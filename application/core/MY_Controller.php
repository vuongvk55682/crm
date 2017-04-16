<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		parent::__construct();
		//$this->load->model('query_sql');
		$this->load->helper('cookie');
		$this->load->library('facebook');
		$this->load->library('mongo_db', array('activate' => 'default'),'mongo_db');
	}
	protected function get_index(){
		
		$data['moduless'] = $this->get_listmodule();
		return $data;
	}
	protected function get_listmodule(){

		$data = $this->mongo_db->select(array('_id', 'name', 'controller', 'created', 'publish', 'action','parentid'))->get_where('ci_module',array('publish' => '0', 'parentid' => '0'));
		// $data = $this->query_sql->select_array('ci_module', 'id, name, created, controller, publish,action', array('publish' => 0,'parentid' => 0), 'sort asc,id asc');
		foreach ($data as $key => $val) {
			$data_child = $this->mongo_db->select(array('_id', 'name', 'controller', 'created', 'publish', 'action'))->get_where('ci_module',array('parentid' => "".$val['_id']."", 'publish' => '0'));
			// $data_child = $this->query_sql->select_array('ci_module', 'id, name, created, controller, publish,action', array('parentid' => $val['id'],'publish' => 0), 'sort asc,id asc');
			$data[$key]['child'] = $data_child;
			$data[$key]['active'] = $this->get_permission($val['_id']);
			if($data[$key]['child'] != NULL){
				foreach ($data[$key]['child'] as $key_child => $val_child) {
					$data[$key]['child'][$key_child]['active'] = $this->get_permission($val_child['_id']);
				}
			}
		}
		return $data;
	}
	protected function get_roleid(){
		$id_user = $this->CI_auth->logged_id();
		$user = $this->mongo_db->select(array('id_role'))->get_where('ci_user',array('_id' => $id_user));
		// $user = $this->db->select('id_role')->from('ci_user')->where('id', $id_user)->get()->row_array();
		$data = $user['id_role'];
		return $data;
	}
	protected function get_permission($id_module = 0){
		$id_role 	= $this->get_roleid();
		$permission = $this->mongo_db->select(array('active'))->get_where('dev_permission', array('id_role' => $id_role, 'id_module' => $id_module));
		// $permission = $this->db->select('active')->from('dev_permission')->where(array('id_role' => $id_role, 'id_module' => $id_module))->get()->row_array();
		$data = $permission['active'];
		return $data;
	}
	
}