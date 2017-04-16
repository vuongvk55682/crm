<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Controller {
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
		$data['title'] = 'Quản lý đặt phòng';
		$data['template'] = 'backend/booking/index';
		$data['data_index'] = $this->get_index();
		

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/booking/index/';

		$config['total_rows'] = $this->query_sql->total('dev_booking');
		$config['uri_segment'] = 4; 
		$config['per_page'] = 10; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){

			$data['booking'] = $this->query_sql->view('*','dev_booking',($page * $config['per_page']),$config['per_page']);
		}

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function listcart()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$id = $_POST['id'];
		
		$booking = $this->query_sql->select_row('dev_booking','*',array('id' => $id));
		
		$ar_loaiphong = explode(',',$booking['loaiphongid']);
		if($ar_loaiphong != NULL){
			//$ar_loaiphong['info_phong'] = NULL;
			foreach ($ar_loaiphong as $key => $val) {
				$ar = explode('_',$val);

				$phong = $this->query_sql->select_row('dev_phong', 'name,image,tiennghiid,gia,songuoi', array('id' => $ar[1]));
				$phong['soluong'] = $ar[0];
				if($phong != NULL){
					$ar_tiennghi = json_decode($phong['tiennghiid'],true);
					if($ar_tiennghi != NULL){
						$ar_img = NULL;
						foreach ($ar_tiennghi as $key_tiennghi => $val_tiennghi) {
							$tiennghi = $this->query_sql->select_row('ci_image', 'image', array('id' => $val_tiennghi));
							$ar_img[] = $tiennghi['image'];
						}
						$phong['tiennghi'] = $ar_img;
					}
				}
				$loaiphong[] = $phong;
				
			}
		}
		$data['phong'] = $loaiphong;
		$this->load->view('backend/booking/listcart', $data);
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

		$this->query_sql->del('dev_cart',array('bookingid' => $id));
		$this->query_sql->del('dev_booking',array('id' => $id));
	}
	public function status()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_booking','status',array('id' => $id));
		if($sql['status']==1){
			$status = 0;
		}else{
			$status = 1;
		}
		$data_update['status'] = $status;
		$this->query_sql->edit('dev_booking', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_booking','status',array('id' => $id));
		$data_status['status'] = $data_sql['status'];
		$this->load->view('backend/booking/status', $data_status);
	}
	public function change_method()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		$methodid = $_POST['methodid'];
		$id = $_POST['id'];

		$data_update['methodid'] = $methodid;
		$this->query_sql->edit('dev_booking', $data_update, array('id' => $id));
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
        	$this->query_sql->del('dev_cart',array('bookingid' => $value));
        	$this->query_sql->del('dev_booking',array('id' => $value));
        }
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
    		$data_like['fullname'] = $keyword;
    		$data['booking'] = $this->query_sql->select_like('dev_booking','*',$data_like,'');
		}
		$this->load->view('backend/booking/search', isset($data)?$data:NULL);
    }
}
