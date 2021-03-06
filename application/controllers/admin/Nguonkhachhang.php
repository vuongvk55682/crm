<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nguonkhachhang extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function __destruct(){
	}
	public function index($page = 1)
	{
		$data['title'] = 'Thông tin nguồn khách hàng';
		$data['template'] = 'backend/nguonkhachhang/index';
		$data['data_index'] = $this->get_index();

		$data['nguonkhachhang'] = $this->mongo_db->order_by(array('created' => 'DESC'))->get1('dev_nguonkhachhang',50,0);
		$count_kh 				= $this->mongo_db->count('dev_nguonkhachhang');
		
		$page_integer = $count_kh % 50;
		if ($page_integer == 0) {
			$page_kh = $count_kh / 50;
		} else {
			$count_kh_int = $count_kh / 50 + 1;
			$page_kh = (int)$count_kh_int;
		}

		$data['nguonkhachhang_num']['count_kh'] 	= $count_kh;
		$data['nguonkhachhang_num']['page_kh'] 		= $page_kh;
		$data['nguonkhachhang_num']['max_length'] 	= strlen($page_kh);

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		$data['title'] = 'Thêm nguồn khách hàng';
		$data['template'] = 'backend/nguonkhachhang/add';
		if($this->input->post()){
			$publish 		= (int)$this->input->post('publish');

			$created_str	= gmdate('Y-m-d H:i:s', time()+7*3600);
			$created_int 	= strtotime($created_str);
				
			$data_insert = array(
				'nguonkh_ten' 	=> 	ucfirst($this->input->post('nguonkh_ten')),
				'publish'		=>	$publish,
				'created'		=>	new MongoDate($created_int)
			);

			$flag = $this->mongo_db->insert('dev_nguonkhachhang', $data_insert);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/nguonkhachhang/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/nguonkhachhang/index',$data);
			}	
		}
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function edit($id='')
	{
		if($this->input->post()){
			$publish 		= (int)$this->input->post('publish');

			$updated_str 	= gmdate('Y-m-d H:i:s', time()+7*3600);
			$updated_int 	= strtotime($updated_str);

			$data_update = array(
				'nguonkh_ten' 	=> 	ucfirst($this->input->post('nguonkh_ten')),
				'publish'		=>	$publish,
				'updated'		=>	new MongoDate($updated_int)
			);
			$flag = $this->mongo_db->update_set('dev_nguonkhachhang',$data_update,$id);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/nguonkhachhang/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/nguonkhachhang/index',$data);
			}	
			
		}
		
		$data['nguonkhachhang'] = $this->mongo_db->where(array('_id' => new MongoId($id)))->find_one('dev_nguonkhachhang');
		$data['title'] = 'Cập nhật nguồn khách hàng';
		$data['template'] = 'backend/nguonkhachhang/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function delete()
	{
		$id = $_POST['id'];
		$this->mongo_db->delete('dev_nguonkhachhang',array('_id' => new  MongoId($id)));
	}
	public function show()
	{
		$id = $_POST['id'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('dev_nguonkhachhang');
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('dev_nguonkhachhang',$data_update,$id);
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('dev_nguonkhachhang');
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/nguonkhachhang/show', $data_publish);
	}
	public function showall()
	{
		$listid = $_POST['listid'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('dev_nguonkhachhang');
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('dev_nguonkhachhang',$data_update,$listid);
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('dev_nguonkhachhang');
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/nguonkhachhang/showall', $data_publish);
	}
	public function deleteall()
	{
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $val) {
        	$this->mongo_db->delete('dev_nguonkhachhang',array('_id' => new  MongoId($val)));
        }
	}
	public function pagepagination()
	{
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

		$data['nguonkhachhang'] = $this->mongo_db->order_by(array('created' => 'DESC'))->get1('dev_nguonkhachhang', 50, $num_skip);
		$count_kh 				= $this->mongo_db->count('dev_nguonkhachhang');

		$page_integer = $count_kh % 50;
		if ($page_integer == 0) {
			$page_kh = $count_kh / 50;
		} else {
			$count_kh_int = $count_kh / 50 + 1;
			$page_kh = (int)$count_kh_int;
		}

		$data['nguonkhachhang_num']['num_from'] 	= $num_from;
		$data['nguonkhachhang_num']['num_to'] 		= $num_to;
		$data['nguonkhachhang_num']['count_kh'] 	= $count_kh;
		$data['nguonkhachhang_num']['page_change'] 	= $page_change;
		$data['nguonkhachhang_num']['max_length'] 	= strlen($page_kh);
		$data['nguonkhachhang_num']['page_kh'] 		= $page_kh;

		$this->load->view('backend/nguonkhachhang/pagepagination', isset($data)?$data:NULL);
	}
}
