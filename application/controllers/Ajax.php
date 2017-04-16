<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends My_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	
	public function __destruct(){
	}
	public function viewfast()
	{
		$id = $_POST['id'];
		$data['product'] = $this->query_sql->select_row('dev_product', 'id, name,title, typeid, alias, created, image, image_thumb, is_sale, publish, content,meta_keyword,meta_description, price, is_view, info_product, brandid', array('publish' => 0, 'id' => $id));
		$data['title'] = $data['product']['title'];
		$data['keyword'] = $data['product']['meta_keyword'];
		$data['description'] = $data['product']['meta_description'];
		$data['image'] = base_url().'upload/product/'.$data['product']['image'];
		$data['url'] = $data['product']['alias'].'-p'.$data['product']['id'].'.html';
		$data['name'] = $data['product']['name'];



		$product_config = $this->query_sql->select_row('dev_product_config', 'id,content', array('id' => 1));
		$arr_content = json_decode($product_config['content'],true);
		$data['price'] = $arr_content['price'];

		$data['image_detail'] = $this->query_sql->select_array('dev_product_image', 'id,image', array('productid' => $id));
		$this->load->view('frontend/ajax/viewfast', isset($data)?$data:NULL);
	}
	public function liked()
	{
		$productid = $_POST['productid'];
		$userid = $_POST['userid'];
		$product_like = $this->query_sql->select_row('dev_product_like', 'id', array('productid' => $productid,'userid' => $userid));
		if($product_like != NULL){
			$result = array(
				'text' => 1,
			);
			echo json_encode($result);
		}else{
			$result = array(
				'text' => 0,
			);
			echo json_encode($result);
			$data_insert = array(
				'productid' 	=> 	$productid,
				'userid' 		=> 	$userid,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('dev_product_like', $data_insert);
		}
		
	}
	public function del_like()
	{
		$productid = $_POST['productid'];
		$userid = $_POST['userid'];
		$this->query_sql->del('dev_product_like',array('productid' => $productid,'userid' => $userid));
	}
	public function del_dedanh()
	{
		$productid = $_POST['productid'];
		$userid = $_POST['userid'];
		$this->query_sql->del('dev_product_dedanh',array('productid' => $productid,'userid' => $userid));
	}
	public function del_rating()
	{
		$productid = $_POST['productid'];
		$userid = $_POST['userid'];
		$this->query_sql->del('dev_product_rating',array('productid' => $productid,'userid' => $userid));
	}
	public function loaddistrict()
	{
		$cityid = $_POST['cityid'];
		$data['district'] = $this->query_sql->select_array('dev_district','id, name',array('publish' => 0,'cityid' => $cityid));
		$this->load->view('frontend/ajax/loaddistrict', isset($data)?$data:NULL);
	}
	public function loadward()
	{
		$districtid = $_POST['districtid'];
		$data['ward'] = $this->query_sql->select_array('dev_ward','id, name',array('publish' => 0,'districtid' => $districtid));
		$this->load->view('frontend/ajax/loadward', isset($data)?$data:NULL);
	}
	public function loadalbum()
	{
		$id = $_POST['id'];
		$data['album'] = $this->query_sql->select_row('dev_album', 'id,name', array('id' => $id));
		if(isset($data['album']) && $data['album'] != NULL){
			if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
				$en_lang = $this->query_sql->select_row('dev_lang', 'name,content', array('parentid' => $data['album']['id'],'type' => 'album','lang' => 'en'));
				if($en_lang != NULL){
					$data['album'][$key]['name'] = $en_lang['name'];
				}
			}
		}
		$data['album_image'] = $this->query_sql->select_array('dev_album_image','image',array('albumid' => $id));
		$this->load->view('frontend/ajax/loadalbum', isset($data)?$data:NULL);
	}
	public function loadvideo()
	{
		$id = $_POST['id'];
		$data['video'] = $this->query_sql->select_row('dev_video', 'id,name,url', array('id' => $id));
		if(isset($data['video']) && $data['video'] != NULL){
			if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
				$en_lang = $this->query_sql->select_row('dev_lang', 'name', array('parentid' => $data['video']['id'],'type' => 'video','lang' => 'en'));
				if($en_lang != NULL){
					$data['video'][$key]['name'] = $en_lang['name'];
				}
			}
		}
		$this->load->view('frontend/ajax/loadvideo', isset($data)?$data:NULL);
	}
	public function updatecart()
	{
		$id = $_POST['id'];
		$qty = $_POST['qty'];

		$data = array(
	        'id' => $id,
	        'qty'   => $qty
		);
		$this->cart->update($data);
	}
	public function dedanhmuasau()
	{
		$productid = $_POST['productid'];
		$userid = $_POST['userid'];
		$rowid = $_POST['rowid'];

		$product_like = $this->query_sql->select_row('dev_product_dedanh', 'id', array('productid' => $productid,'userid' => $userid));
		if($product_like != NULL){
			$result = array(
				'text' => 1,
			);
			echo json_encode($result);
		}else{
			$result = array(
				'text' => 0,
			);
			echo json_encode($result);
			$data_insert = array(
				'productid' 	=> 	$productid,
				'userid' 		=> 	$userid,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('dev_product_dedanh', $data_insert);
			$this->cart->remove($rowid);
		}
		
	}
	public function checkdem()
	{
		$ngaynhan = $_POST['ngaynhan'];
		$ngaytra = $_POST['ngaytra'];
		echo $ngaytra;die;
		
		
		$result = array(
			'count_comment' => $count_comment,
		);
		echo json_encode($result);
	}
	public function getthanks()
	{
		$commentid = $_POST['commentid'];
		$userid = $_POST['userid'];
		$count_comment = $this->query_sql->total_where('dev_product_comment_thanks',array('commentid' => $commentid));
		$data_insert = array(
			'commentid' 	=> 	$commentid,
			'userid' 		=> 	$userid,
			'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
		);
		$flag = $this->query_sql->add('dev_product_comment_thanks', $data_insert);
		
		$result = array(
			'count_comment' => $count_comment,
		);
		echo json_encode($result);
	}
	
	public function getcommenterror()
	{
		$commentid = $_POST['commentid'];
		$userid = $_POST['userid'];
		$data_insert = array(
			'commentid' 	=> 	$commentid,
			'userid' 		=> 	$userid,
			'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
		);
		$flag = $this->query_sql->add('dev_product_comment_error', $data_insert);
	}
	public function loadship()
	{
		$cityid = $_POST['cityid'];
		$districtid = $_POST['districtid'];
		$ship = $this->query_sql->select_row('dev_ship','id, number',array('publish' => 0,'cityid' => $cityid,'districtid' => $districtid));
		if($ship != NULL){
			$t=date('d-m-Y');
			$day = date("d");
			$month = date("m");
			$year = date("y");
			$week = date("w");
			$day_now = 0;
			if(($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) && ($day + $ship['number']) > 31){
				$day_now = ($day + $ship['number']) - 31;
				if($month == 12){
					$month_now = 1;
					$year = $year + 1;
				}else{
					$month_now = $month + 1;
				}
				
			}else{
				$day_now = $day + $ship['number'];
				$month_now = $month; 
			}
			if(($month == 4 || $month == 6 || $month == 9 || $month == 11) && ($day + $ship['number']) > 30){
				$day_now = ($day + $ship['number']) - 30;
				if($month == 12){
					$month_now = 1;
					$year = $year + 1;
				}else{
					$month_now = $month + 1;
				}
			}else{
				$day_now = $day + $ship['number'];
				$month_now = $month;
			}

			//Week
			if(($week + $ship['number']) > 7){
				$week = ($week + $ship['number']) - 7;
			}else{
				$week = $week + $ship['number'];
			}
			if(($week + 1) > 7){
				$week_next = 1;
			}else{
				$week_next = $week + 1;
			}
			$week_txt = $this->CI_function->ChangeToWeek($week);
			$weeknext_txt = $this->CI_function->ChangeToWeek($week_next);


			$day_next = $day_now + 1;
			$date = $day_now.'/'.$month_now.'/20'.$year;
			$date_next = $day_next.'/'.$month_now.'/20'.$year;

			$result = array(
				'date' => $date,
				'date_next' => $date_next,
				'week' => $week_txt,
				'week_next' => $weeknext_txt,
			);
			echo json_encode($result);
		}
		
	}
	public function khaosat()
	{
		$productid = $_POST['productid'];
		$num = $_POST['num'];
		$product_khaosat = $this->query_sql->select_row('dev_product_khaosat', 'type1,type2,type3,type4,type5', array('productid' => $productid));
		if($product_khaosat == NULL){
			$data_insert = array(
				'productid' 	=> 	$productid,
				'type'.$num 	=> 	1,
			);
			$flag = $this->query_sql->add('dev_product_khaosat', $data_insert);
		}else{
			//echo $num;die;
			if($num == 1){
				$data_update = array(
					'type1' 	=> 	$product_khaosat['type1'] + 1,
				);
			}
			else if($num == 2){
				$data_update = array(
					'type2' 	=> 	$product_khaosat['type2'] + 1,
				);
			}
			else if($num == 3){
				$data_update = array(
					'type3' 	=> 	$product_khaosat['type3'] + 1,
				);
			}
			else if($num == 4){
				$data_update = array(
					'type4' 	=> 	$product_khaosat['type4'] + 1,
				);
			}
			else{
				$data_update = array(
					'type5' 	=> 	$product_khaosat['type5'] + 1,
				);
			}
			
			$flag = $this->query_sql->edit('dev_product_khaosat', $data_update, array('productid' => $productid));
		}		
	}
	public function khaosat_order()
	{
		$userid = $_POST['userid'];
		$num = $_POST['num'];
		$product_khaosat = $this->query_sql->select_row('dev_order_khaosat', 'type1,type2,type3,type4,type5', array('userid' => $userid));
		if($product_khaosat == NULL){
			$data_insert = array(
				'userid' 	=> 	$userid,
				'type'.$num 	=> 	1,
			);
			$flag = $this->query_sql->add('dev_order_khaosat', $data_insert);
		}else{
			//echo $num;die;
			if($num == 1){
				$data_update = array(
					'type1' 	=> 	$product_khaosat['type1'] + 1,
				);
			}
			else if($num == 2){
				$data_update = array(
					'type2' 	=> 	$product_khaosat['type2'] + 1,
				);
			}
			else if($num == 3){
				$data_update = array(
					'type3' 	=> 	$product_khaosat['type3'] + 1,
				);
			}
			else if($num == 4){
				$data_update = array(
					'type4' 	=> 	$product_khaosat['type4'] + 1,
				);
			}
			else{
				$data_update = array(
					'type5' 	=> 	$product_khaosat['type5'] + 1,
				);
			}
			
			$flag = $this->query_sql->edit('dev_order_khaosat', $data_update, array('userid' => $userid));
		}		
	}
	public function checkemail(){
		$table = $_POST['table'];
		$email = $_POST['email'];
		$tutor = $this->query_sql->select_row($table, 'id', array('email' => $email));
		if($tutor!=NULL){
			$result = array(
				'rs' => 1
			);
		}else{
			$result = array(
				'rs' => 0
			);
		}
		echo json_encode($result);
	}
}