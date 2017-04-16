<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');

	}
	public function __destruct(){
	}
	public function index($id = 0,$page = 1)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Quản lý bình luận';
		$data['template'] = 'backend/comment/index';
		$data['data_index'] = $this->get_index();
		

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/comment/index/';
		if(isset($id) && $id > 0){
			$config['total_rows'] = $this->query_sql->total_where('dev_product_comment',array('productid' => $id,'parentid' => 0));
		}else{
			$config['total_rows'] = $this->query_sql->total_where('dev_product_comment',array('parentid' => 0));
		}
		
		$config['uri_segment'] = 4; 
		$config['per_page'] = 100; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			if(isset($id) && $id > 0){
				$data['comment'] = $this->query_sql->view_where('*','dev_product_comment',array('productid' => $id,'parentid' => 0),($page * $config['per_page']),$config['per_page']);
			}else{
				$data['comment'] = $this->query_sql->view_where('*','dev_product_comment',array('parentid' => 0),($page * $config['per_page']),$config['per_page']);
			}
			if($data['comment'] != NULL){
				foreach ($data['comment'] as $key => $val) {
					$data['comment'][$key]['user'] = $this->query_sql->select_row('ci_user', 'id, fullname', array('id' => $val['userid']));

					$data['comment'][$key]['count_reply'] = $this->query_sql->total_where('dev_product_comment',array('parentid' => $val['id']));

					$data['comment'][$key]['count_thanks'] = $this->query_sql->total_where('dev_product_comment_thanks',array('commentid' => $val['id']));
				}
			}
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
		$this->query_sql->del('dev_product_comment',array('parentid' => $id));
		$reply = $this->query_sql->select_array('dev_product_comment', 'id', array('parentid' => $id));
		if($reply != NULL){
			foreach ($reply as $key_reply => $val_reply) {
				$this->query_sql->del('dev_product_comment_error',array('commentid' => $val_reply['id']));
			}
		}else{
			$this->query_sql->del('dev_product_comment_error',array('commentid' => $id));
		}
		$this->query_sql->del('dev_product_comment_thanks',array('commentid' => $id));
		$this->query_sql->del('dev_product_comment',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_product_comment','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_product_comment', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product_comment','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/comment/show', $data_publish);
	}
	public function showhuuich()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_product_comment','is_huuich',array('id' => $id));
		if($sql['is_huuich']==1){
			$is_huuich = 0;
		}else{
			$is_huuich = 1;
		}
		$data_update['is_huuich'] = $is_huuich;
		$this->query_sql->edit('dev_product_comment', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product_comment','is_huuich',array('id' => $id));
		$data_is_huuich['is_huuich'] = $data_sql['is_huuich'];
		$this->load->view('backend/comment/showhuuich', $data_is_huuich);
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
        	$this->query_sql->del('dev_product_comment',array('parentid' => $value));
			$reply = $this->query_sql->select_array('dev_product_comment', 'id', array('parentid' => $value));
			if($reply != NULL){
				foreach ($reply as $key_reply => $val_reply) {
					$this->query_sql->del('dev_product_comment_error',array('commentid' => $val_reply['id']));
				}
			}else{
				$this->query_sql->del('dev_product_comment_error',array('commentid' => $value));
			}
			$this->query_sql->del('dev_product_comment_thanks',array('commentid' => $value));
        	$this->query_sql->del('dev_product_comment',array('id' => $value));
        }
	} 
}
