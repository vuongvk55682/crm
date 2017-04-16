<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reorder extends MY_Controller {
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
		$data['title'] = 'Quản lý danh sách sửa chữa';
		$data['template'] = 'backend/reorder/index';
		$data['data_index'] = $this->get_index();
		

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/reorder/index/';
		if($this->input->get() && $this->input->get('methodid') > 0){
			$methodid = $this->input->get('methodid');
			$config['total_rows'] = $this->query_sql->total_where('dev_reorder',array('methodid' => $methodid));
		}else{
			$config['total_rows'] = $this->query_sql->total('dev_reorder');
		}
		$config['uri_segment'] = 4; 
		$config['per_page'] = 10; 
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			if($this->input->get() && $this->input->get('methodid') > 0){
				$data['reorder'] = $this->query_sql->view_where('*','dev_reorder',array('methodid' => $methodid),($page * $config['per_page']),$config['per_page']);
			}else{
				$data['reorder'] = $this->query_sql->view('*','dev_reorder',($page * $config['per_page']),$config['per_page']);
			}
		}

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function listcart()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$_code = $_POST['id'];
		$sum_total = 0;
		$total = 0;
		$data['reorder'] = $this->query_sql->select_row('dev_reorder','name_company,address_company,tax_company',array('id' => $_code));
		$data['cart'] = $this->query_sql->select_array('dev_cart','id, price, number, productid,price_sale,percent',array('reorderid' => $_code));
		if(isset($data['cart']) && $data['cart'] != NULL){
			foreach ($data['cart'] as $key_cart => $val_cart) {
				$product = $this->query_sql->select_row('dev_product','name,image_thumb',array('id' => $val_cart['productid']));
				$data['cart'][$key_cart]['product'] = $product;
				if($val_cart['price_sale'] > 0){
					$total = $val_cart['number'] * $val_cart['price_sale'];
				}else{
					$total = $val_cart['number'] * $val_cart['price'];
				}
				$data['cart'][$key_cart]['total'] = $total;
				$sum_total = $sum_total + $total;
			}
		}
		$data['sum_total'] = $sum_total;
		$this->load->view('backend/reorder/listcart', $data);
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
		$this->query_sql->del('dev_reorder',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_reorder','status',array('id' => $id));
		if($sql['status']==1){
			$status = 0;
		}else{
			$status = 1;
		}
		$data_update['status'] = $status;
		$this->query_sql->edit('dev_reorder', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_reorder','status',array('id' => $id));
		$data_status['status'] = $data_sql['status'];
		$this->load->view('backend/reorder/status', $data_status);
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
		$this->query_sql->edit('dev_reorder', $data_update, array('id' => $id));
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
        	$this->query_sql->del('dev_reorder',array('id' => $value));
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
    		$data_like['code'] = $keyword;
    		$data['reorder'] = $this->query_sql->select_like('dev_reorder','*',$data_like,'');
		}
		$this->load->view('backend/reorder/search', isset($data)?$data:NULL);
    }
}
