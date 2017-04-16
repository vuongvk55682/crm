<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends My_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	
	public function __destruct(){
	}
	public function add()
	{
		$id = $_GET['id'];
		$percent = 0; 
		if(isset($id) && $id > 0){
			$product = $this->query_sql->select_row('dev_product', 'id, name, image_thumb, price, price_sale', array('publish' => 0, 'id' => $id));
			$price = isset($product['price'])?$product['price']:0;
			$name = isset($product['name'])?$product['name']:'';
			if($product['price_sale'] > 0){ 
				$percent = round(100-(($product['price_sale']*100)/$product['price']),0);
			}
			$name = $this->CI_function->del_string_special($product['name']);
			$data = array(
		        'id'      => $id,
		        'qty'     => 1,
		        'price'   => $product['price'],
		        'name'    => $name,
		        'options' => array('Image' => $product['image_thumb'],'Price_sale' => $product['price_sale'],'Percent' => $percent)
			);
			$flat = $this->cart->insert($data);
			if($flat != ''){
				redirect('gio-hang.html');
			}
		}
	}
	public function addcart()
	{
		$id = $_POST['id'];
		$qty = $_POST['qty'];
		$percent = 0;
		if(isset($id) && $id > 0){
			$product = $this->query_sql->select_row('dev_product', 'id, name, image_thumb, price,price_sale', array('publish' => 0, 'id' => $id));
			$price = isset($product['price'])?$product['price']:0;
			$name = isset($product['name'])?$product['name']:'';
			if($product['price_sale'] > 0){ 
				$percent = round(100-(($product['price_sale']*100)/$product['price']),0);
			}
			$name = $this->CI_function->del_string_special($product['name']);
			$data = array(
		        'id'      => $id,
		        'qty'     => $qty,
		        'price'   => $product['price'],
		        'name'    => $name,
		        'options' => array('Image' => $product['image_thumb'],'Price_sale' => $product['price_sale'],'Percent' => $percent)
			);
			$flat = $this->cart->insert($data);
			if($flat != ''){
				redirect('gio-hang.html');
			}
		}
	}
	public function cart()
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thông tin đơn hàng';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];

		$data['listcart'] = $this->cart->contents();

		
		$data['template'] = 'frontend/cart/cart';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function delcart()
	{
		$this->cart->destroy();
		redirect('gio-hang.html');
	}
	public function updatecart()
	{
		if($this->input->post()){
			$arr_post = $this->input->post();
			if(isset($arr_post) && $arr_post != NULL){
				foreach ($arr_post as $key => $val) {
					$data = array(
				        'rowid' => $val['rowid'],
				        'qty'   => $val['qty']
					);
					$this->cart->update($data);
				}
			}
			redirect('gio-hang.html');
		}
	}
	public function del()
	{
		$id = $_POST['id'];
		$this->cart->remove($id);
	}
	public function pay()
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thanh toán & đặt mua';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		$data['listcart'] = $this->cart->contents();
		if($data['listcart'] == NULL){
			redirect('/');
		}
		$data['address'] = $this->query_sql->select_row('dev_user_address', 'id,fullname,cityid, districtid,wardid,address,phone,company',array('userid' => $userid,'active' => 1));
		if($data['address'] != NULL){
			$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $data['address']['cityid']));
			$data['address']['city_name'] = $city['name'];

			$district = $this->query_sql->select_row('dev_district', 'name', array('id' => $data['address']['districtid']));
			$data['address']['district_name'] = $district['name'];

			$ward = $this->query_sql->select_row('dev_ward', 'name', array('id' => $data['address']['wardid']));
			$data['address']['ward_name'] = $ward['name'];

			$data['ship'] = $this->CI_function->PriceShip($data['address']['cityid'],$data['address']['districtid']);

		}
		if($this->CI_auth->check_logged_user() != ''){
			$userid = $this->CI_auth->logged_id_user();
			$data['user'] = $this->query_sql->select_row('ci_user', 'id, fullname, email, birthday,phone,sex', array('id' => $userid));
		}
		if($this->input->post()){
			$code = $this->CI_function->RandomString(6);
			$order = $this->query_sql->select_row('dev_order', 'id',array('code' => $code));
			if($order != NULL){
				$code = $this->CI_function->RandomString(6);
			}
			$info_user = $this->query_sql->select_row('ci_user', 'email,sex',array('id' => $userid));
			$info_address = $this->query_sql->select_row('dev_user_address', 'id',array('userid' => $userid,'active' => 1));
			$method = $this->input->post('method');
			$data_insert = array(
				'fullname' 	=> 	$this->input->post('pay_full_name'),
				'phone' 	=> 	$this->input->post('pay_phone'),
				'userid' 	=> 	$userid,
				'code' 		=> 	$code,
				'email' 	=> 	$info_user['email'],
				'sex' 		=> 	$info_user['sex'],
				'addressid'	=>	$info_address['id'],
				'name_company' 	=> 	$this->input->post('name_company'),
				'tax_company' 	=> 	$this->input->post('tax_company'),
				'address_company' 	=> 	$this->input->post('address_company'),
				'method'	=>	$method,
				'created'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('dev_order', $data_insert);
			$insert_id = $flag['id_insert'];
			$data['method'] = $this->input->post('methodid');
			$arr_data_insert = NULL;
			$listcart = $this->cart->contents();
			if(isset($listcart) && $listcart!=NULL){
				foreach ($listcart as $key_listcart => $val_listcart) {
					$data_insert_cart = array(
						'productid' => 	$val_listcart['id'],
						'orderid' 	=> 	$insert_id,
						'number' 	=> 	$val_listcart['qty'],
						'price' 	=> 	$val_listcart['price'],
						'price_sale' 	=> 	$val_listcart['options']['Price_sale'],
						'percent' 	=> 	$val_listcart['options']['Percent'],
						'created'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
					);
					$arr_data_insert[] = $data_insert_cart;
				}
			}
			$flag = $this->query_sql->adds('dev_cart', $arr_data_insert);
			if($flag>0){
				$this->cart->destroy();
				$this->session->set_userdata('orderid', $insert_id);
				if($method == 1){
					redirect('thanh-toan-tien-mat.html');
				}else if($method == 2){
					redirect('hinh-thuc-chuyen-khoan.html');
				}else{
					redirect('thanh-toan-paypal.html');
				}
			}	
		}
		
		$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));
		$data['district'] = $this->query_sql->select_array('dev_district','id, name',array('publish' => 0));
		$data['ward'] = $this->query_sql->select_array('dev_ward','id, name',array('publish' => 0));
		$data['template'] = 'frontend/cart/pay';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function pay_success()
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Đặt hàng thành công';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$data['pay_success'] = $this->get_info('pay_success');

		$data['template'] = 'frontend/cart/pay_success';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function managerpay()
	{
		if($this->CI_auth->check_logged_user() === false){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Lịch sử mua hàng';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		if($this->input->post()){
			$code = $this->input->post('code');
			$phone = $this->input->post('phone');
			$where = array(
				'code' => $code,
				'phone' => $phone
			);
		}else{
			$where = array(
				'userid' => $userid
			);
		}
		$data['order'] = $this->query_sql->select_array('dev_order','*',$where);

		$data['template'] = 'frontend/cart/managerpay';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function detailpay()
	{
		if($this->CI_auth->check_logged_user() === false){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Chi tiết đơn hàng';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];

		$orderid = $_GET['id'];
		$userid = $this->CI_auth->logged_id_user();
		$data['cart'] = $this->query_sql->select_array('dev_cart','*',array('orderid' => $orderid));
		$sum_total = 0;
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

		$data['template'] = 'frontend/cart/detailpay';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function shipping()
	{
		// if($this->CI_auth->check_logged_user() === false){
		// 	redirect(base_url());
		// }
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Địa chỉ giao hàng';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		$data['address'] = $this->query_sql->select_row('dev_user_address', 'id,fullname,cityid, districtid,wardid,address,phone,company',array('userid' => $userid,'active' => 1));
		if($data['address'] != NULL){
			$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $data['address']['cityid']));
			$data['address']['city_name'] = $city['name'];

			$district = $this->query_sql->select_row('dev_district', 'name', array('id' => $data['address']['districtid']));
			$data['address']['district_name'] = $district['name'];

			$ward = $this->query_sql->select_row('dev_ward', 'name', array('id' => $data['address']['wardid']));
			$data['address']['ward_name'] = $ward['name'];
		}


		if($this->input->post()){
			$type = $this->input->post('update');
			$id = $this->input->post('id');
			if($type == 1){
				$data_update = array(
					'fullname' 		=> 	$this->input->post('fullname'),
					'company' 		=> 	$this->input->post('company'),
					'phone' 		=> 	$this->input->post('phone'),
					'cityid' 		=> 	$this->input->post('cityid'),
					'districtid' 	=> 	$this->input->post('districtid'),
					'wardid' 		=> 	$this->input->post('wardid'),
					'address' 		=> 	$this->input->post('address'),
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				
				$result = $this->query_sql->edit('dev_user_address', $data_update,array('id' => $id));
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				$active = $this->input->post('active');
				if($active == 1){
					$data_update_active = array(
						'active' => 0
					);
					$result = $this->query_sql->edit('dev_user_address', $data_update_active,array('userid' => $userid));
				}else{
					$active = 0;
				}
				$data_insert = array(
					'fullname' 		=> 	$this->input->post('add_fullname'),
					'company' 		=> 	$this->input->post('add_company'),
					'phone' 		=> 	$this->input->post('add_phone'),
					'cityid' 		=> 	$this->input->post('add_cityid'),
					'districtid' 	=> 	$this->input->post('add_districtid'),
					'wardid' 		=> 	$this->input->post('add_wardid'),
					'address' 		=> 	$this->input->post('add_address'),
					'active'		=>	$active,
					'userid'		=>	$userid,
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				
				$result = $this->query_sql->add('dev_user_address', $data_insert);
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
			
		}

		$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));
		$data['district'] = $this->query_sql->select_array('dev_district','id, name',array('publish' => 0));
		$data['ward'] = $this->query_sql->select_array('dev_ward','id, name',array('publish' => 0));
		$data['template'] = 'frontend/cart/shipping';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function checkorder()
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Tra cứu tình trạng đơn hàng';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		if($this->input->get()){
			$email = $this->input->get('order_email');
			$code = $this->input->get('order_code');
			$order = $this->query_sql->select_row('dev_order', 'id,code,created,method,methodid', array('email' => $email, 'code' => $code));
		}else{
			$order = $this->query_sql->select_row('dev_order', 'id,code,created,method,methodid', array('userid' => $userid));
		}
		if($order != NULL){
			if($order['method'] == 1){
				$method = "Thanh toán tiền mặt khi nhận hàng";
			}else if($order['method'] == 2){
				$method = "Thanh toán bằng hình thức chuyển khoản";
			}else{
				$method = "Thanh toán Paypal";
			}
			$order['method'] = $method;
			$info_address = $this->query_sql->select_row('dev_user_address', 'id,fullname,cityid,districtid,wardid,phone,address',array('userid' => $userid,'active' => 1));
			if($info_address != NULL){
				$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $info_address['cityid']));
				$info_address['city_name'] = $city['name'];

				$district = $this->query_sql->select_row('dev_district', 'name', array('id' => $info_address['districtid']));
				$info_address['district_name'] = $district['name'];

				$ward = $this->query_sql->select_row('dev_ward', 'name', array('id' => $info_address['wardid']));
				$info_address['ward_name'] = $ward['name'];

				$data['ship'] = $this->CI_function->PriceShip($info_address['cityid'],$info_address['districtid']);

			}
			$order['address'] = $info_address;

			$cart = $this->query_sql->select_array('dev_cart','*',array('orderid' => $order['id']));
			if($cart != NULL){
				foreach ($cart as $key_cart => $val_cart) {
					$product = $this->query_sql->select_row('dev_product', 'id,alias,name', array('id' => $val_cart['productid']));
					$cart[$key_cart]['product_name'] = $product['name'];
					$cart[$key_cart]['product_id'] = $product['id'];
					$cart[$key_cart]['product_alias'] = $product['alias'];
				}
			}
			$order['cart'] = $cart;

		}

		$data['order'] = $order;
		if($this->input->get()){
			$order_orther = $this->query_sql->select_array('dev_order','code,id,created',array('email' => $email, 'code' => $code,'id != ' => $order['id']));
		}else{
			$order_orther = $this->query_sql->select_array('dev_order','code,id,created',array('userid' => $userid,'id != ' => $order['id']));
		}
		
		if($order_orther != NULL){
			foreach ($order_orther as $key_order_orther => $val_order_orther) {
				$cart_orther = $this->query_sql->select_array('dev_cart','*',array('orderid' => $val_order_orther['id']));
				if($cart_orther != NULL){
					foreach ($cart_orther as $key_cart_orther => $val_cart_orther) {
						$product = $this->query_sql->select_row('dev_product', 'name', array('id' => $val_cart_orther['productid']));
						$cart_orther[$key_cart]['product_name'] = $product['name'];
					}
				}
				$order_orther[$key_order_orther]['cart'] = $cart_orther;
			}
		}
		$data['order_orther'] = $order_orther;

		
		$data['template'] = 'frontend/cart/checkorder';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function paypal($code)
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thanh toán Paypal';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$data['pay_success'] = $this->get_info('pay_success');
		if(!$this->session->userdata('orderid')){
			redirect('/');
		}
		$orderid = $this->session->userdata('orderid');
		$data['order'] = $this->query_sql->select_row('dev_order', 'id,code',array('id' => $orderid));
		$cart = $this->query_sql->select_array('dev_cart','price',array('orderid' => $orderid));
		$total_price = 0;
		if(isset($cart) && $cart!=NULL){
			foreach ($cart as $key => $val) {
				$total_price += $val['price'];
			}
		}
		$data['order']['total_price'] = $total_price;
		$this->session->unset_userdata('orderid');

		$data['template'] = 'frontend/cart/paypal';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function paytransfer()
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Đăng ký thành công - Hình thức thanh toán chuyển khoản';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		if(!$this->session->userdata('orderid')){
			redirect('/');
		}
		$orderid = $this->session->userdata('orderid');
		$data['order'] = $this->query_sql->select_row('dev_order', 'id,code',array('id' => $orderid));
		$cart = $this->query_sql->select_array('dev_cart','price',array('orderid' => $orderid));
		$total_price = 0;
		if(isset($cart) && $cart!=NULL){
			foreach ($cart as $key => $val) {
				$total_price += $val['price'];
			}
		}
		$data['order']['total_price'] = $total_price;

		$this->session->unset_userdata('orderid');
		
		
		$data['template'] = 'frontend/cart/paytransfer';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function paymoney()
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Đăng ký thành công - Thanh toán khi nhận hàng';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		if(!$this->session->userdata('orderid')){
			redirect('/');
		}
		$orderid = $this->session->userdata('orderid');
		$data['order'] = $this->query_sql->select_row('dev_order', 'id,code,email,userid',array('id' => $orderid));
		$cart = $this->query_sql->select_array('dev_cart','price',array('orderid' => $orderid));
		$total_price = 0;
		if(isset($cart) && $cart!=NULL){
			foreach ($cart as $key => $val) {
				$total_price += $val['price'];
			}
		}
		$data['order']['total_price'] = $total_price;

		$info_address = $this->query_sql->select_row('dev_user_address', 'id,fullname,cityid,districtid,wardid,phone,address',array('userid' => $userid,'active' => 1));
		if($info_address != NULL){
			$data['ship'] = $this->CI_function->PriceShip($info_address['cityid'],$info_address['districtid']);

		}
		$order['address'] = $info_address;

		$this->session->unset_userdata('orderid');
		
		
		$data['template'] = 'frontend/cart/paymoney';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
}