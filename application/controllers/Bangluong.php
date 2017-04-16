<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bangluong extends MY_Controller {
	public function __construct(){
		parent::__construct();
		

	}
	public function __destruct(){
	}
	public function index($page = 1)
	{
		$data['title'] = 'Thông tin Bảng Lương';
		$data['template'] = 'backend/bangluong/index';
		$data['data_index'] = $this->get_index();
		
		$config = $this->Query_mongo->_pagination();
		$config['base_url'] = base_url().'admin/bangluong/index/';
		$config['total_rows'] = $this->mongo_db->count('bangluong');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 10; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['bangluong'] = $this->mongo_db->select(array('_id', 'thangnam','thang','nam','hopdong', 'ngaycong', 'khoanthuong', 'phucap','giamtru','thuclinh','ngay', 'created', 'updated','publish',))->get('bangluong');
		}

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		$data['title'] = 'Thêm mới Bảng Lương';
		$data['template'] = 'backend/bangluong/add';
		$ngay_str = $this->input->post('ngay');
		$hopdong = str_replace(',','', $this->input->post('hopdong'));
		$ngaycong = str_replace(',','', $this->input->post('ngaycong'));
		$khoanthuong = str_replace(',', '', $this->input->post('khoanthuong'));
		$giamtru = str_replace(',','', $this->input->post('giamtru'));
		$phucap = str_replace(',', '', $this->input->post('phucap'));
		if($this->input->post()){
			$thangnam_str = $this->input->post('thangnam');
			$thangnam_arr = explode('/', $thangnam_str);
			$thangnam = $thangnam_arr[1].'-'.$thangnam_arr[0];
			$thang  = (int)$thangnam_arr[1];
			$nam = $thangnam_arr[0];
			$data_insert = array(
				'thangnam' 		=> 	$thangnam_str,
				'thang'			=>$thang,
				'nam'			=>$nam,
				'hopdong' 	    => 	$hopdong,
				'ngaycong' 		=> 	$ngaycong,
				'khoanthuong' 	=> 	$khoanthuong,
				'giamtru' 		=> 	$giamtru,
				'phucap' 	=> 	$phucap,
				'ngay' 		=> 	$ngay_str,
				'thuclinh' 	=> 	$this->input->post('thuclinh'),
				'publish'		=>	$this->input->post('publish'),
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600),
			);
			$flag = $this->mongo_db->insert('bangluong', $data_insert);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/bangluong/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/bangluong/index',$data);
			}	
			
		}
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function edit($id='')
	{
		if($this->input->post()){
			$thangnam_str = $this->input->post('thangnam');
			if (isset($thangnam_str) && $thangnam_str != '') {
				$thangnam_arr = explode('/', $thangnam_str);
				$kh_sinhnhat = $thangnam_arr[1].'-'.$thangnam_arr[0];
				$thang  = (int)$thangnam_arr[1];
				$nam= $thangnam_arr[0];
				$thangnam_date = strtotime($kh_sinhnhat);
			} else {
				$thangnamt_date = '';
			}

			$data_update = array(
				'thangnam' 		=> 	$this->input->post('thangnam'),
				'nam'			=>$nam,
				'thang'			=>$thang,
				'hopdong' 	    => 	$this->input->post('hopdong'),
				'ngaycong' 	=> 	$this->input->post('ngaycong'),
				'khoanthuong' 	=> 	$this->input->post('khoanthuong'),
				'giamtru' 	=> 	$this->input->post('giamtru'),
				'phucap' 	=> 	$this->input->post('phucap'),
				'thuclinh' 	=> 	$this->input->post('thuclinh'),
				'ngay' 	=> 	$this->input->post('ngay'),
				'publish'		=>	$this->input->post('publish'),
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600),
			);
			$flag = $this->mongo_db->update_set('bangluong',$data_update,$id);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/bangluong/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/bangluong/index',$data);
			}	
		}
		
		
		$data['bangluong'] = $this->mongo_db->select(array('thangnam','thang','nam', 'hopdong', 'ngaycong', 'khoanthuong','giamtru', 'phucap','thuclinh','ngay', 'publish'))->where(array('_id' => new MongoId($id)))->find_one('bangluong');
		$data['title'] = 'Cập nhật bảng lương';
		$data['template'] = 'backend/bangluong/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function delete()
	{
		$id = $_POST['id'];
		$this->mongo_db->delete('bangluong',array('_id' => new  MongoId($id)));
	}
	public function show()
	{
		
		$id = $_POST['id'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('bangluong');
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('bangluong',$data_update,$id);
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($id)))->find_one('bangluong');
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/bangluong/show', $data_publish);
	}
	public function showall()
	{
		$listid = $_POST['listid'];
		$sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('bangluong');
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->mongo_db->update_set('bangluong',$data_update,$listid);
		$data_sql = $this->mongo_db->select(array('publish'))->where(array('_id' => new MongoId($listid)))->find_one('bangluong');
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/bangluong/showall', $data_publish);
	}
	public function deleteall()
	{
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $val) {
        	$this->mongo_db->delete('bangluong',array('_id' => new  MongoId($val)));
        }
	}
    public function search()
    {	
        $keyword = $_POST['keyword'];
        $s_thang = (int)$_POST['s_thang'];
        $where = NULL;
        if($keyword != '' && $s_thang == ''){
        	$where = array('nam' => "".$keyword."");
        }else if($keyword == '' && $s_thang != ''){
        	$where = array('thang' => $s_thang);
        }
        else{
        	$where = array('nam' => "".$keyword."");
        	$where = array_merge(array('thang' => $s_thang),$where);
        }
        $data['bangluong'] = $this->mongo_db->select(array('_id', 'thangnam','thang','nam','hopdong', 'ngaycong', 'khoanthuong', 'phucap','giamtru','thuclinh','ngay', 'created', 'updated','publish',))->get_where('bangluong',$where);

        $this->load->view('backend/bangluong/search', isset($data)?$data:NULL);
    }
    
}

