<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {
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
		$data['title'] = 'Quản lý đơn hàng';
		$data['template'] = 'backend/order/index';
		$data['data_index'] = $this->get_index();
		

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/order/index/';
		if($this->input->get() && $this->input->get('methodid') > 0){
			$methodid = $this->input->get('methodid');
			$config['total_rows'] = $this->query_sql->total_where('dev_order',array('methodid' => $methodid));
		}else{
			$config['total_rows'] = $this->query_sql->total('dev_order');
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
				$data['order'] = $this->query_sql->view_where('*','dev_order',array('methodid' => $methodid),($page * $config['per_page']),$config['per_page']);
			}else{
				$data['order'] = $this->query_sql->view('*','dev_order',($page * $config['per_page']),$config['per_page']);
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
		$data['order'] = $this->query_sql->select_row('dev_order','name_company,address_company,tax_company',array('id' => $_code));
		$data['cart'] = $this->query_sql->select_array('dev_cart','id, price, number, productid,price_sale,percent',array('orderid' => $_code));
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
		$this->load->view('backend/order/listcart', $data);
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

		$this->query_sql->del('dev_cart',array('orderid' => $id));
		$this->query_sql->del('dev_order',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_order','status',array('id' => $id));
		if($sql['status']==1){
			$status = 0;
		}else{
			$status = 1;
		}
		$data_update['status'] = $status;
		$this->query_sql->edit('dev_order', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_order','status',array('id' => $id));
		$data_status['status'] = $data_sql['status'];
		$this->load->view('backend/order/status', $data_status);
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
		$this->query_sql->edit('dev_order', $data_update, array('id' => $id));
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
        	$this->query_sql->del('dev_cart',array('orderid' => $value));
        	$this->query_sql->del('dev_order',array('id' => $value));
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
    		$data['order'] = $this->query_sql->select_like('dev_order','*',$data_like,'');
		}
		$this->load->view('backend/order/search', isset($data)?$data:NULL);
    }
    public function statics()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Thống kê đơn hàng';
		$data['template'] = 'backend/order/statics';
		$data['data_index'] = $this->get_index();

		$data['day_now'] = date('Y-m-d');

		if($this->input->get()){
			$date = $this->input->get('date');
			$data['order'] = $this->query_sql->select_array('dev_order','id,name_company,address_company,tax_company,code,methodid,fullname',array('created' => $date));
			$data['day_now'] = $date;
		}else{
			$data['order'] = $this->query_sql->select_array('dev_order','id,name_company,address_company,tax_company,code,methodid,fullname',array('created' => $data['day_now']));
		}
		
		if(isset($data['order']) && $data['order'] != NULL){
			$sum_sum_total = 0;
			$thucthu = 0;
			foreach ($data['order'] as $key_order => $val_order) {
				$sum_total = 0;
				$cart = $this->query_sql->select_array('dev_cart','id, price, number, productid,price_sale,percent',array('orderid' => $val_order['id']));
				if(isset($cart) && $cart != NULL){
					foreach ($cart as $key_cart => $val_cart) {
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
				$data['order'][$key_order]['sum_total'] = $sum_total;
				$data['order'][$key_order]['cart'] = $cart;
				if($val_order['methodid'] == 5){
					$thucthu = $thucthu + $sum_total;
				}else{
					$thucthu = $thucthu;	
				}
				$sum_sum_total = $sum_sum_total + $sum_total;

			}
			$data['_sum_total'] = $sum_sum_total;
			$data['_thucthu'] = $thucthu;
		}
		
		

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function staticsmonth()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thống kê đơn hàng theo tháng';
		$data['template'] = 'backend/order/staticsmonth';
		$data['data_index'] = $this->get_index();

		$data['year_now'] = date("Y");

		if($this->input->get()){
			$year = $this->input->get('year');
			$data['order'] = $this->query_sql->select_array_before('dev_order','id,name_company,address_company,tax_company,code,methodid,fullname,created',NULL,'created',$year);
			$data['year_now'] = $year;
		}else{
			$data['order'] = $this->query_sql->select_array_before('dev_order','id,name_company,address_company,tax_company,code,methodid,fullname,created',NULL,'created',$data['year_now']);
		}
		
		
		if(isset($data['order']) && $data['order'] != NULL){
			$sum_sum_total = 0;
			$thucthu = 0;

			$count_order_success_month_1 = 0;
			$count_order_success_month_2 = 0;
			$count_order_success_month_3 = 0;
			$count_order_success_month_4 = 0;
			$count_order_success_month_5 = 0;
			$count_order_success_month_6 = 0;
			$count_order_success_month_7 = 0;
			$count_order_success_month_8 = 0;
			$count_order_success_month_9 = 0;
			$count_order_success_month_10 = 0;
			$count_order_success_month_11 = 0;
			$count_order_success_month_12 = 0;

			$count_order_cancel_month_1 = 0;
			$count_order_cancel_month_2 = 0;
			$count_order_cancel_month_3 = 0;
			$count_order_cancel_month_4 = 0;
			$count_order_cancel_month_5 = 0;
			$count_order_cancel_month_6 = 0;
			$count_order_cancel_month_7 = 0;
			$count_order_cancel_month_8 = 0;
			$count_order_cancel_month_9 = 0;
			$count_order_cancel_month_10 = 0;
			$count_order_cancel_month_11 = 0;
			$count_order_cancel_month_12 = 0;

			$total_order_month_1 = 0;
			$total_order_month_2 = 0;
			$total_order_month_3 = 0;
			$total_order_month_4 = 0;
			$total_order_month_5 = 0;
			$total_order_month_6 = 0;
			$total_order_month_7 = 0;
			$total_order_month_8 = 0;
			$total_order_month_9 = 0;
			$total_order_month_10 = 0;
			$total_order_month_11 = 0;
			$total_order_month_12 = 0;

			foreach ($data['order'] as $key_order => $val_order) {
				$sum_total = 0;
				$cart = $this->query_sql->select_array('dev_cart','id, price, number, productid,price_sale,percent',array('orderid' => $val_order['id']));
				if(isset($cart) && $cart != NULL){
					foreach ($cart as $key_cart => $val_cart) {
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
				$data['order'][$key_order]['sum_total'] = $sum_total;
				$data['order'][$key_order]['cart'] = $cart;
				if($val_order['methodid'] == 5){
					$thucthu = $thucthu + $sum_total;
				}else{
					$thucthu = $thucthu;	
				}
				$sum_sum_total = $sum_sum_total + $sum_total;

				$ar_date = explode('-',$val_order['created']);
				if($ar_date['1'] == 1){
					if($val_order['methodid'] == 5){
						$count_order_success_month_1 = $count_order_success_month_1 + 1;
						$total_order_month_1 = $total_order_month_1 + $total;
					}
					if($val_order['methodid'] == 6){
						$count_order_cancel_month_1 = $count_order_cancel_month_1 + 1;
					}
				}
				if($ar_date['1'] == 2){
					if($val_order['methodid'] == 5){
						$count_order_success_month_2 = $count_order_success_month_2 + 1;
						$total_order_month_2 = $total_order_month_2 + $total;
					}
					if($val_order['methodid'] == 6){
						$count_order_cancel_month_2 = $count_order_cancel_month_2 + 1;
					}
				}
				if($ar_date['1'] == 3){
					if($val_order['methodid'] == 5){
						$count_order_success_month_3 = $count_order_success_month_3 + 1;
						$total_order_month_3 = $total_order_month_3 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_3 = $count_order_cancel_month_3 + 1;
					}
				}
				if($ar_date['1'] == 4){
					if($val_order['methodid'] == 5){
						$count_order_success_month_4 = $count_order_success_month_4 + 1;
						$total_order_month_4 = $total_order_month_4 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_4 = $count_order_cancel_month_4 + 1;
					}
				}
				if($ar_date['1'] == 5){
					if($val_order['methodid'] == 5){
						$count_order_success_month_5 = $count_order_success_month_5 + 1;
						$total_order_month_5 = $total_order_month_5 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_5 = $count_order_cancel_month_5 + 1;
					}
				}
				if($ar_date['1'] == 6){
					if($val_order['methodid'] == 5){
						$count_order_success_month_6 = $count_order_success_month_6 + 1;
						$total_order_month_6 = $total_order_month_6 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_6 = $count_order_cancel_month_6 + 1;
					}
				}
				if($ar_date['1'] == 7){
					if($val_order['methodid'] == 5){
						$count_order_success_month_7 = $count_order_success_month_7 + 1;
						$total_order_month_7 = $total_order_month_7 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_7 = $count_order_cancel_month_7 + 1;
					}
				}
				if($ar_date['1'] == 8){
					if($val_order['methodid'] == 5){
						$count_order_success_month_8 = $count_order_success_month_8 + 1;
						$total_order_month_8 = $total_order_month_8 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_8 = $count_order_cancel_month_8 + 1;
					}
				}
				if($ar_date['1'] == 9){
					if($val_order['methodid'] == 5){
						$count_order_success_month_9 = $count_order_success_month_9 + 1;
						$total_order_month_9 = $total_order_month_9 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_9 = $count_order_cancel_month_9 + 1;
					}
				}
				if($ar_date['1'] == 10){
					if($val_order['methodid'] == 5){
						$count_order_success_month_10 = $count_order_success_month_10 + 1;
						$total_order_month_10 = $total_order_month_10 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_10 = $count_order_cancel_month_10 + 1;
					}
				}
				if($ar_date['1'] == 11){
					if($val_order['methodid'] == 5){
						$count_order_success_month_11 = $count_order_success_month_11 + 1;
						$total_order_month_11 = $total_order_month_11 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_11 = $count_order_cancel_month_11 + 1;
					}
				}
				if($ar_date['1'] == 12){
					if($val_order['methodid'] == 5){
						$count_order_success_month_12 = $count_order_success_month_12 + 1;
						$total_order_month_12 = $total_order_month_12 + $total;
					}if($val_order['methodid'] == 6){
						$count_order_cancel_month_12 = $count_order_cancel_month_12 + 1;
					}
				}


			}
			$data['_sum_total'] = $sum_sum_total;
			$data['_thucthu'] = $thucthu;

			$data['count_order_success_month_1'] = $count_order_success_month_1;
			$data['count_order_success_month_2'] = $count_order_success_month_2;
			$data['count_order_success_month_3'] = $count_order_success_month_3;
			$data['count_order_success_month_4'] = $count_order_success_month_4;
			$data['count_order_success_month_5'] = $count_order_success_month_5;
			$data['count_order_success_month_6'] = $count_order_success_month_6;
			$data['count_order_success_month_7'] = $count_order_success_month_7;
			$data['count_order_success_month_8'] = $count_order_success_month_8;
			$data['count_order_success_month_9'] = $count_order_success_month_9;
			$data['count_order_success_month_10'] = $count_order_success_month_10;
			$data['count_order_success_month_11'] = $count_order_success_month_11;
			$data['count_order_success_month_12'] = $count_order_success_month_12;

			$data['count_order_cancel_month_1'] = $count_order_cancel_month_1;
			$data['count_order_cancel_month_2'] = $count_order_cancel_month_2;
			$data['count_order_cancel_month_3'] = $count_order_cancel_month_3;
			$data['count_order_cancel_month_4'] = $count_order_cancel_month_4;
			$data['count_order_cancel_month_5'] = $count_order_cancel_month_5;
			$data['count_order_cancel_month_6'] = $count_order_cancel_month_6;
			$data['count_order_cancel_month_7'] = $count_order_cancel_month_7;
			$data['count_order_cancel_month_8'] = $count_order_cancel_month_8;
			$data['count_order_cancel_month_9'] = $count_order_cancel_month_9;
			$data['count_order_cancel_month_10'] = $count_order_cancel_month_10;
			$data['count_order_cancel_month_11'] = $count_order_cancel_month_11;
			$data['count_order_cancel_month_12'] = $count_order_cancel_month_12;


			$data['total_order_month_1'] = $total_order_month_1;
			$data['total_order_month_2'] = $total_order_month_2;
			$data['total_order_month_3'] = $total_order_month_3;
			$data['total_order_month_4'] = $total_order_month_4;
			$data['total_order_month_5'] = $total_order_month_5;
			$data['total_order_month_6'] = $total_order_month_6;
			$data['total_order_month_7'] = $total_order_month_7;
			$data['total_order_month_8'] = $total_order_month_8;
			$data['total_order_month_9'] = $total_order_month_9;
			$data['total_order_month_10'] = $total_order_month_10;
			$data['total_order_month_11'] = $total_order_month_11;
			$data['total_order_month_12'] = $total_order_month_12;
		}
		
		

		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
}
