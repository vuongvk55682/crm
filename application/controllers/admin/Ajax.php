<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');

	}
	public function __destruct(){
	}
	public function loaddistrict()
	{
		$cityid = $_POST['cityid'];
		$data['district'] = $this->query_sql->select_array('dev_district','id, name',array('publish' => 0,'cityid' => $cityid));
		$this->load->view('backend/ajax/loaddistrict', isset($data)?$data:NULL);
	}
	public function banchay()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
    	$id = $_POST['id'];
    	$banchay = $_POST['banchay'];
    	$table = $_POST['table'];
		$data_update['banchay'] = $banchay;
		$this->query_sql->edit($table, $data_update, array('id' => $id));
    }
    public function replycomment()
	{
		$id = $_POST['id'];
		$data['replycomment'] = $this->query_sql->select_array('dev_product_comment','*',array('parentid' => $id));
		if($data['replycomment'] != NULL){
			foreach ($data['replycomment'] as $key => $val) {
				$data['replycomment'][$key]['user'] = $this->query_sql->select_row('ci_user', 'id, fullname', array('id' => $val['userid']));

				$data['replycomment'][$key]['count_error'] = $this->query_sql->total_where('dev_product_comment_error',array('commentid' => $val['id']));
			}
		}
		$this->load->view('backend/ajax/replycomment', isset($data)?$data:NULL);
	}
	public function filtermethodorder()
	{
		$methodid = $_POST['methodid'];
		$data['replycomment'] = $this->query_sql->select_array('dev_product_comment','*',array('parentid' => $id));
		if($data['replycomment'] != NULL){
			foreach ($data['replycomment'] as $key => $val) {
				$data['replycomment'][$key]['user'] = $this->query_sql->select_row('ci_user', 'id, fullname', array('id' => $val['userid']));

				$data['replycomment'][$key]['count_error'] = $this->query_sql->total_where('dev_product_comment_error',array('commentid' => $val['id']));
			}
		}
		$this->load->view('backend/ajax/replycomment', isset($data)?$data:NULL);
	}
}
