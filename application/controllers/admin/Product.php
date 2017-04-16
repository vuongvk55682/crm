<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
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
		$data['title'] = 'Quản lý sản phẩm';
		$data['template'] = 'backend/product/index';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/product/index/';
		$config['total_rows'] = $this->query_sql->total('dev_product');
		$config['uri_segment'] = 4;
		$config['per_page'] = 20;  
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;


		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['product'] = $this->query_sql->view('id, created, name,publish,image_thumb,typeid,price,price_sale, is_hot, is_new, is_view,is_slider, is_sale, is_left,is_banchay,is_choose,banchay','dev_product',($page * $config['per_page']),$config['per_page']);
			if($data['product'] != NULL){
				foreach ($data['product'] as $key => $val) {
					$data['product'][$key]['number_cmmt'] = $this->query_sql->total_where('dev_product_comment',array('productid' => $val['id']));
					$data['product'][$key]['count_product_album'] = $this->query_sql->total_where('dev_product_album',array('productid' => $val['id']));

					$data['product'][$key]['count_product_album'] = $this->query_sql->total_where('dev_product_album',array('productid' => $val['id']));
				}
			}
		}
		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 2));
		if(isset($data['type']) && $data['type'] != NULL){
			foreach ($data['type'] as $key => $val) {
				$data['type'][$key]['type_child'] = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if($data['type'][$key]['type_child'] != NULL){
					foreach ($data['type'][$key]['type_child'] as $key_child2 => $val_child2) {
						$data['type'][$key]['type_child'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
						if($data['type'][$key]['type_child'][$key_child2]['child_3'] != NULL){
							foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
								$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
								if($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
									foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
										$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, sort');
									}
								}
							}
						}
					}
				}
			}
		}
		$count_item = array(
			'sum' => $config['total_rows'],
			'sum_first'	=>	($page * $config['per_page']) + 1,
			'sum_end'	=>	($config['total_rows'] - ($config['per_page'] * $page))>=($page * $config['per_page'])?(($config['per_page'])*($page + 1)):($config['total_rows'] - ($config['per_page'] * $page))+($config['per_page'] * $page)
		);
		$data['count_item'] = $count_item;
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function khaosat($id = 0)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Quản lý khảo sát của khách hàng';
		$data['template'] = 'backend/product/khaosat';
		$data['khaosat'] = $this->query_sql->select_array('dev_product_khaosat','*',array('productid' => $id));
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Thêm sản phẩm';
		$data['template'] = 'backend/product/add';
		if($this->input->post()){
			$alias = $this->CI_function->check_alias(0,$this->CI_function->create_alias($this->input->post('name')),'','dev_route');
			if($_FILES["image"]["name"]){
				$album_dir = 'upload/product/';
				if(!is_dir($album_dir)){ create_dir($album_dir); } 
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$config['max_size'] = 5120;

				
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				$image = $this->upload->do_upload("image");
				$image_data = $this->upload->data();


				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/product/'.$image_data['file_name'];
				$config['new_image'] = 'upload/product/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 300;
				$config['height'] = 300;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
				
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];
			}else{
				$name_img = '';
				$name_img_thumb = '';
			}
			$title = $this->input->post('title');
			$description = $this->input->post('meta_description');
			$keyword = $this->input->post('meta_keyword');
			if($title == ''){
				$title = $this->input->post('name');
			}
			if($description == ''){
				$description = $this->input->post('name').', '.$data['data_index']['title']['meta_description'];
			}
			if($keyword == ''){
				$keyword = $this->input->post('name').', '.$data['data_index']['title']['meta_keyword'];
			}
			$price = str_replace(',', '',$this->input->post('price'));
			$price_sale = str_replace(',', '',$this->input->post('price_sale'));
			if($price_sale > 0){
				$sale = $price - $price_sale;
			}else{
				$sale = 0;
			}
			$data_insert = array(
				'typeid' 		=> 	$this->input->post('typeid'),
				'brandid' 		=> 	$this->input->post('brandid'),
				'name' 			=> 	$this->input->post('name'),
				'code' 			=> 	$this->input->post('code'),
				'title' 		=> 	$title,
				'price' 		=> 	$price,
				'price_sale' 	=> 	$price_sale,
				'sale' 			=> 	$sale,
				'percent' 		=> 	$this->input->post('percent'),
				'alias' 		=> 	$alias,
				'publish' 		=> 	$this->input->post('publish'),
				'is_hot' 		=> 	$this->input->post('is_hot'),
				'is_home' 		=> 	$this->input->post('is_home'),
				'is_new' 		=> 	1,
				'is_hot' 		=> 	1,
				'is_slider' 	=> 	1,
				'is_sale' 		=> 	1,
				'is_banchay' 	=> 	1,
				'is_banchay' 	=> 	1,
				'is_choose' 	=> 	1,
				'image'			=>	$name_img,
				'image_thumb'	=>	$name_img_thumb,
				'meta_keyword' 	=> 	$keyword,
				'meta_description' 	=> 	$description,
				'content'		=>	$this->input->post('content'),
				'guarantee'		=>	$this->input->post('guarantee'),
				'des'		=>	$this->input->post('des'),
				'info_product'		=>	$this->input->post('info_product'),
				'info_sale'		=>	$this->input->post('info_sale'),
				'service'		=>	$this->input->post('service'),
				'description_like'		=>	$this->input->post('description_like'),
				'video'		=>	$this->input->post('video'),
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);

			
			$flag = $this->query_sql->add('dev_product', $data_insert);
			$id_insert = $flag['id_insert'];


			$data_insert_route = array(
				'name' 	=> 	$this->input->post('name'),
				'alias' 	=> 	$alias,
				'type' 		=> 	1,
				'parentid' 	=> 	$id_insert,
			);
			$flag_route = $this->query_sql->add('dev_route', $data_insert_route);
			//Update product image
			$arr_idproductimg = $this->input->post('id_img');
			foreach ($arr_idproductimg as $key_idproductimg => $val_idproductimg) {
				$data_update_product_image['productid'] = $id_insert;
				$this->query_sql->edit('dev_product_image', $data_update_product_image, array('id' => $val_idproductimg));
			}
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/product/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/product/index',$data);
			}	
		}
		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 3));
		if(isset($data['type']) && $data['type'] != NULL){
			foreach ($data['type'] as $key => $val) {
				$data['type'][$key]['type_child'] = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if($data['type'][$key]['type_child'] != NULL){
					foreach ($data['type'][$key]['type_child'] as $key_child2 => $val_child2) {
						$data['type'][$key]['type_child'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
						if($data['type'][$key]['type_child'][$key_child2]['child_3'] != NULL){
							foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
								$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
								if($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
									foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
										$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, sort');
									}
								}
							}
						}
					}
				}
			}
		}
		$data['brand'] = $this->query_sql->select_array('ci_image','id, name',array('publish' => 0,'type' => 'brand'));
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function get_menu_child($parentid = 0,$field = ''){
		$data = $this->query_sql->select_array('dev_menu',$field,array('parentid' => $parentid));
		return $data;
	}
	public function curl()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Rút tin sản phẩm';
		$data['template'] = 'backend/product/curl';
		if($this->input->post()){
			$url = $this->input->post('url');
			$typeid = $this->input->post('typeid');
			$type = $this->query_sql->select_row('dev_menu', 'alias,id,name', array('id' => $typeid));
			$link_type = $type['alias'].'-t'.$type['id'].'.html';
			if($url != ''){
				//Curl
				$ch = curl_init(); 
		        // set url 
		        curl_setopt($ch, CURLOPT_URL, $url); 
		        //return the transfer as a string 
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		        // $output contains the output string 
		        $output = curl_exec($ch);
		        curl_close($ch);  
		        // close curl resource to free up system resources   
				$html = $output;
				//echo $html;die;
				$temp = explode('<div class="product_list_box">', $html);
				//Product
				$temp = explode('<div class="pagination">',$temp[1]);
				//echo $temp[0];die;
				$box = explode('<tr>',$temp[0]);

				$number_box = count($box);
				//var_dump($box);die;
				if(isset($box) && $box!=NULL){
					$counter_insert = 0;
					$data_inserts = NULL;
						foreach ($box as $key_box => $val_box) {
							if($key_box > 0){
								
								//echo $val_box;die;


								$arr_des = explode('<p class="summary">',$val_box);
								$arr_des = explode('<div class="wantity">',$arr_des[1]);
								$arr_des = explode('</p>',$arr_des[0]);
								$des = trim($arr_des[0]);
								//echo $des; die;

								
								$arr_link = explode('<div class="pro_image">',$val_box);
								$arr_link = explode('<div class="check_box">',$arr_link[1]);
								$arr_link = explode('<a href="',$arr_link[0]);
								$arr_link = explode('" title="',$arr_link[1]);
								$link = $arr_link[0];
								//echo $link; die;

								$arr_img = explode('<div class="check_box">',$val_box);
								$arr_img = explode('<img src="',$arr_img[0]);
								$arr_img = explode('" border="0" alt="',$arr_img[1]);
								//$arr_img = explode('" /></a>',$arr_img[1]);
								//$arr_img = explode('" alt="',$arr_img[1]);
								$image = 'http://maytinhthienminh.vn/'.$arr_img[0];
								$image = str_replace('_100', '', $image);
								//echo $image;die;

								
								//Price
								$arr_price = explode('<div class="price_list">',$val_box);
								$arr_price = explode('<div class="quantity">',$arr_price[1]);
								$arr_price = explode('<span style="font:',$arr_price[0]);
								$arr_price = explode('Tahoma">',$arr_price[0]);
								//$arr_price = explode('">',$arr_price[0]);
								$price = trim(str_replace('.','', $arr_price[1]));
								//$price = 0;
								//echo $price;die;

								//Title
								$arr_title = explode('<div class="check_box">',$val_box);
								$arr_title = explode('" title="',$arr_title[0]);
								$arr_title = explode('"><img',$arr_title[1]);
								$name = trim($arr_title[0]);
								
								//echo $name;die;
								$title = $name.' | Laptop xách tay Dell';
								//echo $title;die;
								
								
								$alias = $this->CI_function->check_alias(0,$this->CI_function->create_alias($name),'','dev_product');
								//echo $alias;die;
								//echo $alias;die;
								$product = $this->query_sql->select_row('dev_product', 'id', array('name' => $name));
								if($product == NULL){
									//Detail
									$name_file = $alias.'.png';
									$path_file = 'upload/product/thumb/'.$alias.'.png';
									$this->curl_saveimage($image,$path_file);

									// $arr_linkkk = explode('/',$link);
									// //var_dump($arr_linkkk);die;
									// $_link = $arr_linkkk[1].$arr_linkkk[2].'/'.$arr_linkkk[3].'/'.$arr_linkkk[4].'/thong_so_ky_thuat/'.$arr_linkkk[5];

									//echo $_link;die;
									$html_detail = $this->get_link_curl($link);
									//echo $html_detail;die;

									// $ar_detail = explode('<ul class="detail_product_tab">',$html_detail);
									// $ar_detail = explode('<li class="clear"></li>',$ar_detail[1]);
									// $ar_detail = explode('Tin tức',$ar_detail[0]);
									// $ar_detail = explode('Thông số kỹ thuật',$ar_detail[1]);
									// $ar_detail = explode('<a href="',$ar_detail[0]);
									// $ar_detail = explode('">',$ar_detail[1]);
									// $link_detail = 'http://www.vatgia.com'.$ar_detail[0];
									//echo $link_detail;die;

									//$html_detail_detail = $this->get_link_curl($link_detail);
									//echo $html_detail_detail;die;

									// $ar_code = explode('Mã hàng:',$ar_detail[0]);
									// $ar_code = explode('<br>Bảo hành:',$ar_code[1]);
									// $code = trim($ar_code[0]);
									$code = '';
									
									// $ar_baohanh = explode('<br>Hãng sản xuất:',$ar_code[1]);
									// $guarantee = trim($ar_baohanh[0]);
									$guarantee = '12 tháng';

									// $ar_marker = explode('<br>',$ar_baohanh[1]);
									// $marker = trim($ar_marker[0]);
									$marker = '';

									$pro_content = '<h3 style="font-size:22px;text-align: center;">'.$name.'</h3>';
									$pro_content .= $name.': '.$des;
									$pro_content .= '<br />';
									$pro_content .= $link;
									$pro_content .= '<br />';
									$pro_content .= 'Thương hiệu: <a href="'.$link_type.'" title="'.$type['name'].'">'.$type['name'].'</a>';
									$pro_content .= '<br />';
									$pro_content .= '<img style="text-align: center;" src="http://laptopdellxachtay.com/'.$path_file.'" alt="'.$title.'" />';
									$pro_content .= '<br />';
									$pro_content .= '<br />';
									//$pro_content .= '<strong>Thông tin chi tiết:</strong><br/>';
									$arr_content = explode('<div id="thongsokythuat" class="menu_detail">',$html_detail);
									//echo $arr_content[1];die;
									$arr_content = explode('<div class="search_product_keywords"> ',$arr_content[1]);
									//echo $arr_content[0];die;
									
									// if(isset($arr_content[0]) && $arr_content[0] != NULL){
									// 	$pro_content .= $arr_content[0];
									// }else{
									// 	$pro_content .= '';
									// }
									$pro_content .= isset($data['data_index']['curl']['content'])?$data['data_index']['curl']['content']:'';
									//echo $pro_content;die;
									$description = $title.', '.$data['data_index']['title']['meta_description'];
									$keyword = $title.', '.$data['data_index']['title']['meta_keyword'];
									$data_insert = array(
										'typeid' 		=> 	$typeid,
										'name' 			=> 	$name,
										'title' 		=> 	$title,
										'alias' 		=> 	$alias,
										'price' 		=> 	$price,
										'image' 		=> 	$name_file,
										'image_thumb' 	=> 	$name_file,
										'publish' 		=> 	1,
										'code'			=> 	$code,
										'des'			=> 	$des,
										'guarantee'		=>	$guarantee,
										'maker'			=>	$marker,
										'is_hot' 		=> 	1,
										'is_home' 		=> 	1,
										'is_new' 		=> 	1,
										'is_slider' 	=> 	1,
										'is_left' 		=> 	1,
										'is_sale' 		=> 	1,
										'meta_keyword' 	=> 	$keyword,
										'meta_description' 	=> 	$description,
										'content' 		=> 	$pro_content,
										'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
									);
									$counter_insert ++;
									$data_inserts[] = $data_insert;
								}
							}
						}
						$this->db->insert_batch('dev_product',$data_inserts);
					
				}
			}
			if(isset($counter_insert) && $counter_insert > 0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Đã lưu thành công '.$counter_insert.' sản phẩm',
				));
				redirect('admin/product/curl',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Không có dữ liệu mới',
				));
				redirect('admin/product/curl',$data);
			}
		}
		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 2));
		if(isset($data['type']) && $data['type'] != NULL){
			foreach ($data['type'] as $key => $val) {
				$data['type'][$key]['type_child'] = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if($data['type'][$key]['type_child'] != NULL){
					foreach ($data['type'][$key]['type_child'] as $key_child2 => $val_child2) {
						$data['type'][$key]['type_child'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
					}
				}
			}
		}
		
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function get_link_curl($link = ''){
		$ch = curl_init(); 
        // set url 
        curl_setopt($ch, CURLOPT_URL, $link); 
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        // $output contains the output string 
        $data = curl_exec($ch);  
        return $data;
	}
	function curl_saveimage($url, $path)
	{
	    // Mở một file mới với đường dẫn và tên file là tham số $saveTo
	    $fp = fopen ($path, 'w+');
	     
	    // Bắt đầu CURl
	    $ch = curl_init($url);
	     
	    // Thiết lập giả lập trình duyệt
	    // nghĩa là giả mạo đang gửi từ trình duyệt nào đó, ở đây tôi dùng Firefox
	    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
	     
	    // Thiết lập trả kết quả về chứ không print ra
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  
	    // Thời gian timeout
	    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
	     
	    // Lưu kết quả vào file vừa mở
	    curl_setopt($ch, CURLOPT_FILE, $fp);
	     
	    // Thực hiện download file
	    $result = curl_exec($ch);
	     
	    // Đóng CURL
	    curl_close($ch);
	     
	    return $result;
	}
	public function edit($id=0)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['product_img'] = $this->query_sql->select_array('dev_product_image', 'id,image', array('productid' => $id));
		if($this->input->post()){
			$data = $this->query_sql->select_row('dev_product', 'image,image_thumb', array('id' => $id));
			$alias = $this->CI_function->check_alias2($id,'parentid',$this->CI_function->create_alias($this->input->post('name')),$this->input->post('name'),'dev_route');

			$route = $this->query_sql->select_row('dev_route', 'id,name,alias,parentid', array('parentid' => $id));
			if($route != NULL){
				$data_update_route = array(
					'name' 	=> 	$this->input->post('name'),
					'alias' 	=> 	$alias,
				);
				$this->query_sql->edit('dev_route', $data_update_route, array('parentid' => $id));
			}else{
				$data_insert_route = array(
					'name' 	=> 	$this->input->post('name'),
					'alias' 	=> 	$alias,
					'type' 		=> 	1,
					'parentid' 	=> 	$id,
				);
				$flag_route = $this->query_sql->add('dev_route', $data_insert_route);
			}
			
			
			//Update product image
			$arr_idproductimg = $this->input->post('id_img');
			foreach ($arr_idproductimg as $key_idproductimg => $val_idproductimg) {
				$data_update_product_image['productid'] = $id;
				$this->query_sql->edit('dev_product_image', $data_update_product_image, array('id' => $val_idproductimg));
			}
			if($_FILES["image"]["name"]){
				$file = "upload/product/".$data['image'];
				$file_thumb = "upload/product/thumb/".$data['image_thumb'];
				unlink($file);
				unlink($file_thumb);

				$album_dir = 'upload/product/';
				if(!is_dir($album_dir)){ create_dir($album_dir); } 
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$config['max_size'] = 5120;
				
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				$image = $this->upload->do_upload("image");
				$image_data = $this->upload->data();

				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/product/'.$image_data['file_name'];
				$config['new_image'] = 'upload/product/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 300;
				$config['height'] = 300;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];

				$this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];

			}else{
				$name_img = $data['image'];
				$name_img_thumb = $data['image_thumb'];
			}
			$title = $this->input->post('title');
			$description = $this->input->post('meta_description');
			$keyword = $this->input->post('meta_keyword');
			if($title == ''){
				$title = $this->input->post('name');
			}
			if($description == ''){
				$description = $this->input->post('name').', '.$data['data_index']['title']['meta_description'];
			}
			if($keyword == ''){
				$keyword = $this->input->post('name').', '.$data['data_index']['title']['meta_keyword'];
			}
			$price = str_replace(',', '',$this->input->post('price'));
			$price_sale = str_replace(',', '',$this->input->post('price_sale'));
			if($price_sale > 0){
				$sale = $price - $price_sale;
			}else{
				$sale = 0;
			}

			$data_update = array(
				'typeid' 		=> 	$this->input->post('typeid'),
				'brandid' 		=> 	$this->input->post('brandid'),
				'name' 			=> 	$this->input->post('name'),
				'code' 			=> 	$this->input->post('code'),
				'title' 		=> 	$title,
				'price' 		=> 	$price,
				'price_sale' 	=> 	$price_sale,
				'sale' 			=> 	$sale,
				'percent' 		=> 	$this->input->post('percent'),
				'alias' 		=> 	$alias,
				'publish' 		=> 	$this->input->post('publish'),
				'is_hot' 		=> 	$this->input->post('is_hot'),
				'is_home' 		=> 	$this->input->post('is_home'),
				'image'			=>	$name_img,
				'image_thumb'	=>	$name_img_thumb,
				'meta_keyword' 	=> 	$keyword,
				'meta_description' 	=> 	$description,
				'content'		=>	$this->input->post('content'),
				'des'			=>	$this->input->post('des'),
				'guarantee'		=>	$this->input->post('guarantee'),
				'info_product'	=>	$this->input->post('info_product'),
				'info_sale'		=>	$this->input->post('info_sale'),
				'service'		=>	$this->input->post('service'),
				'description_like'		=>	$this->input->post('description_like'),
				'video'		=>	$this->input->post('video'),
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->edit('dev_product', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/product/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/product/index',$data);
			}	
		}
		$data['product'] = $this->query_sql->select_row('dev_product', '*', array('id' => $id));
		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 3));
		if(isset($data['type']) && $data['type'] != NULL){
			foreach ($data['type'] as $key => $val) {
				$data['type'][$key]['type_child'] = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if($data['type'][$key]['type_child'] != NULL){
					foreach ($data['type'][$key]['type_child'] as $key_child2 => $val_child2) {
						$data['type'][$key]['type_child'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
						if($data['type'][$key]['type_child'][$key_child2]['child_3'] != NULL){
							foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
								$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
								if($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
									foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
										$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, sort');
									}
								}
							}
						}
					}
				}
			}
		}
		$data['brand'] = $this->query_sql->select_array('ci_image','id, name',array('publish' => 0,'type' => 'brand'));
		$data['title'] = 'Cập nhật sản phẩm';
		$data['template'] = 'backend/product/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function config()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		if($this->input->post()){
			$arr_content = array(
				'number_page' 	=> 	$this->input->post('number_page'),
				'price' 		=> 	$this->input->post('price'),
				'width' 		=> 	$this->input->post('width'),
				'height' 		=> 	$this->input->post('height')
			);
			$data_update['content'] = json_encode($arr_content);
			$flag = $this->query_sql->edit('dev_product_config', $data_update, array('id' => 1));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/product/config',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/product/config',$data);
			}	
		}
		$data['product_config'] = $this->query_sql->select_row('dev_product_config', 'content', array('id' => 1));
		$arrcontent = json_decode($data['product_config']['content'],true);
		$data['product_config']['number_page'] = $arrcontent['number_page'];
		$data['product_config']['price'] = $arrcontent['price'];
		$data['product_config']['width'] = $arrcontent['width'];
		$data['product_config']['height'] = $arrcontent['height'];
		
		$data['title'] = 'Cấu hình trang sản phẩm';
		$data['template'] = 'backend/product/config';
		$this->load->view('backend/index', isset($data)?$data:'');
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
		$product_image = $this->query_sql->select_array('dev_product_image', 'id,image', array('productid' => $id));
		if(isset($product_image) && $product_image!= NULL){
			foreach ($product_image as $key_product_image => $val_product_image) {
				$file = "upload/product/detail/".$val_product_image['image'];
				unlink($file);
				$this->query_sql->del('dev_product_image',array('id' => $val_product_image['id']));
			}
		}
		$data = $this->query_sql->select_row('dev_product', 'image,image_thumb', array('id' => $id));
		$file = "upload/product/".$data['image'];
		$file_thumb = "upload/product/thumb/".$data['image_thumb'];
		unlink($file);
		unlink($file_thumb);
		$this->query_sql->del('dev_product',array('id' => $id));
	}
	public function change_price()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		if($this->input->post()){
			$id = $this->input->post('id');
			$price = str_replace(',', '',$this->input->post('price'));
			$data_update = array(
				'price' => $price
			);
			$flag = $this->query_sql->edit('dev_product', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/product/index',$data);
			}
		}
	}
	public function change_pricesale()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		if($this->input->post()){
			$id = $this->input->post('id');
			$price_sale = str_replace(',', '',$this->input->post('price_sale'));
			$data_update = array(
				'price_sale' => $price_sale
			);
			$flag = $this->query_sql->edit('dev_product', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/product/index',$data);
			}
		}
	}
	public function change_type()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $this->input->post('id');
		$typeid = $this->input->post('typeid');
		$data_update = array(
			'typeid' => $typeid
		);
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));	
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
		$sql = $this->query_sql->select_row('dev_product','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/product/show', $data_publish);
	}
	public function shownew()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_product','is_new',array('id' => $id));
		if($sql['is_new']==1){
			$is_new = 0;
		}else{
			$is_new = 1;
		}
		$data_update['is_new'] = $is_new;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product','is_new',array('id' => $id));
		$data_is_new['is_new'] = $data_sql['is_new'];
		$this->load->view('backend/product/shownew', $data_is_new);
	}
	public function showslider()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_product','is_slider',array('id' => $id));
		if($sql['is_slider']==1){
			$is_slider = 0;
		}else{
			$is_slider = 1;
		}
		$data_update['is_slider'] = $is_slider;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product','is_slider',array('id' => $id));
		$data_is_slider['is_slider'] = $data_sql['is_slider'];
		$this->load->view('backend/product/showslider', $data_is_slider);
	}
	public function showsale()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_product','is_sale',array('id' => $id));
		if($sql['is_sale']==1){
			$is_sale = 0;
		}else{
			$is_sale = 1;
		}
		$data_update['is_sale'] = $is_sale;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product','is_sale',array('id' => $id));
		$data_is_sale['is_sale'] = $data_sql['is_sale'];
		$this->load->view('backend/product/showsale', $data_is_sale);
	}
	public function showleft()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_product','is_left',array('id' => $id));
		if($sql['is_left']==1){
			$is_left = 0;
		}else{
			$is_left = 1;
		}
		$data_update['is_left'] = $is_left;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product','is_left',array('id' => $id));
		$data_is_left['is_left'] = $data_sql['is_left'];
		$this->load->view('backend/product/showleft', $data_is_left);
	}
	public function showchoose()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_product','is_choose',array('id' => $id));
		if($sql['is_choose']==1){
			$is_choose = 0;
		}else{
			$is_choose = 1;
		}
		$data_update['is_choose'] = $is_choose;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product','is_choose',array('id' => $id));
		$data_is_choose['is_choose'] = $data_sql['is_choose'];
		$this->load->view('backend/product/showchoose', $data_is_choose);
	}
	public function showbanchay()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_product','is_banchay',array('id' => $id));
		if($sql['is_banchay']==1){
			$is_banchay = 0;
		}else{
			$is_banchay = 1;
		}
		$data_update['is_banchay'] = $is_banchay;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product','is_banchay',array('id' => $id));
		$data_is_banchay['is_banchay'] = $data_sql['is_banchay'];
		$this->load->view('backend/product/showbanchay', $data_is_banchay);
	}
	public function showhot()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_product','is_hot',array('id' => $id));
		if($sql['is_hot']==1){
			$is_hot = 0;
		}else{
			$is_hot = 1;
		}
		$data_update['is_hot'] = $is_hot;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product','is_hot',array('id' => $id));
		$data_is_hot['is_hot'] = $data_sql['is_hot'];
		$this->load->view('backend/product/showhot', $data_is_hot);
	}
	public function showall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$listid = $_POST['listid'];
		$sql = $this->query_sql->select_row('dev_product','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_product','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/product/showall', $data_publish);
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
        	$product_image = $this->query_sql->select_array('dev_product_image', 'id,image', array('productid' => $value));
			if(isset($product_image) && $product_image!= NULL){
				foreach ($product_image as $key_product_image => $val_product_image) {
					$file = "upload/product/detail/".$val_product_image['image'];
					unlink($file);
					$this->query_sql->del('dev_product_image',array('id' => $val_product_image['id']));
				}
			}
        	$data = $this->query_sql->select_row('dev_product', 'image,image_thumb', array('id' => $value));
			$file = "upload/product/".$data['image'];
			$file_thumb = "upload/product/thumb/".$data['image_thumb'];
			unlink($file);
			unlink($file_thumb);
        	$this->query_sql->del('dev_product',array('id' => $value));
        }
	}
	public function sort()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
    	$id = $_POST['id'];
    	$sort = $_POST['sort'];
		$data_update['sort'] = $sort;
		$this->query_sql->edit('dev_product', $data_update, array('id' => $id));
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
    		$data_like['name'] = $keyword;
    		$data['product'] = $this->query_sql->select_like('dev_product','id, created, name,publish,image_thumb,typeid,price,price_sale, is_hot, is_new, is_view,is_slider, is_sale, is_left,is_banchay,is_choose,banchay',$data_like,'');
    		if($data['product'] != NULL){
				foreach ($data['product'] as $key => $val) {
					$data['product'][$key]['number_cmmt'] = $this->query_sql->total_where('dev_product_comment',array('productid' => $val['id']));
					$data['product'][$key]['count_product_album'] = $this->query_sql->total_where('dev_product_album',array('productid' => $val['id']));
				}
			}
    		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 2));
			if($data['type'] != NULL){
				foreach ($data['type'] as $key_type => $val_type) {
					$data['type'][$key_type]['cate'] = $this->get_menu_child($val_type['id'],'id, name');
					if($data['type'][$key_type]['cate']){
						foreach ($data['type'][$key_type]['cate'] as $key_cate => $val_cate) {
							$data['type'][$key_type]['cate'][$key_cate]['item'] = $this->get_menu_child($val_cate['id'],'id, name');
						}
					}
				}
			}
		}
		$this->load->view('backend/product/search', isset($data)?$data:NULL);
    }
    public function loadtype()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
    	$typeid = $_POST['typeid'];
    	if($typeid != ''){
    		$data['product'] = $this->query_sql->select_array('dev_product','id, created, name,publish,image_thumb,typeid,price,price_sale, is_hot, is_new, is_view,is_slider, is_sale, is_left,is_banchay,is_choose,banchay',array('typeid' => $typeid));
    		if($data['product'] != NULL){
				foreach ($data['product'] as $key => $val) {
					$data['product'][$key]['number_cmmt'] = $this->query_sql->total_where('dev_product_comment',array('productid' => $val['id']));
					$data['product'][$key]['count_product_album'] = $this->query_sql->total_where('dev_product_album',array('productid' => $val['id']));
				}
			}
    		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 2));
			if($data['type'] != NULL){
				foreach ($data['type'] as $key_type => $val_type) {
					$data['type'][$key_type]['cate'] = $this->get_menu_child($val_type['id'],'id, name');
					if($data['type'][$key_type]['cate']){
						foreach ($data['type'][$key_type]['cate'] as $key_cate => $val_cate) {
							$data['type'][$key_type]['cate'][$key_cate]['item'] = $this->get_menu_child($val_cate['id'],'id, name');
						}
					}
				}
			}
		}
		$this->load->view('backend/product/loadtype', isset($data)?$data:NULL);
    }
    public function dropzone(){
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$random = rand(10,1000);
		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			$new_fileName = explode('.',$fileName);
			$new_fileName = $new_fileName[0].'-'.$random.'.'.$new_fileName[1];
			$targetPath = getcwd() . '/upload/product/detail/';
			$targetFile = $targetPath . $new_fileName;
			move_uploaded_file($tempFile, $targetFile);


			$this->load->library('image_lib');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'upload/product/detail/'.$new_fileName;
			$config['new_image'] = 'upload/product/detail/thumb/'.$new_fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 300;
			$config['height'] = 300;

			$name_img = explode('.',$new_fileName);
			$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
			
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();

			$data_insert = array(
				'image' 		=> 	$new_fileName,
				'image_thumb' 	=> 	$name_img_thumb,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('dev_product_image', $data_insert);
			$arr_id = array(
				'id' => $flag['id_insert']
			);
			echo json_encode($arr_id);
		}
    }
    public function deldropzone(){
    	$image = $_POST['image'];
    	$image = substr($image,0,-4);
    	$product_image = $this->query_sql->select_row_like_position('dev_product_image', 'id,image', 'image',$image,'after','id desc');
    	$file = "upload/product/detail/".$product_image['image'];
		unlink($file);
    	$this->query_sql->del('dev_product_image',array('image' => $product_image['image']));
    }
    public function delimgdetail()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$product_image = $this->query_sql->select_row('dev_product_image', 'image', array('id' => $id));
		$file = "upload/product/detail/".$product_image['image'];
		unlink($file);
		$this->query_sql->del('dev_product_image',array('id' => $id));
	}
	public function exportexcel(){
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('test worksheet');
		$this->excel->getActiveSheet()->setCellValue('A1', 'Danh sách sản phẩm');
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->setCellValue('A2', 'Stt');
		$this->excel->getActiveSheet()->setCellValue('B2', 'Tên sản phẩm');
		$this->excel->getActiveSheet()->setCellValue('C2', 'Mã sản phẩm');
		$this->excel->getActiveSheet()->setCellValue('D2', 'Danh mục');
		$this->excel->getActiveSheet()->setCellValue('E2', 'Thương hiệu');
		$this->excel->getActiveSheet()->setCellValue('F2', 'Giá bán');
		$this->excel->getActiveSheet()->setCellValue('G2', 'Giá khuyến mãi');

		//Load product
		$product = $this->query_sql->select_array('dev_product','id, name,code, typeid, price, price_sale,brandid',array('publish' => 0));
		$stt = 0;
		$i = 2;
		if($product != NULL){
			foreach ($product as $key_product => $val_product) {
				$stt = $key_product + 1;
				$i = $i + 1;
				$menu = $this->query_sql->select_row('dev_menu', 'name', array('id' => $val_product['typeid']));

				$brand = $this->query_sql->select_row('ci_image', 'name', array('id' => $val_product['brandid']));


				$this->excel->getActiveSheet()->setCellValue('A'.$i, $stt);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $val_product['name']);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $val_product['code']);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $menu['name']);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $brand['name']);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $val_product['price']);
				$this->excel->getActiveSheet()->setCellValue('G'.$i, $val_product['price_sale']);
			}
		}


		$filename ='danhsachsanpham.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
	}
	public function importexcel()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
      	$this->load->library('excel');
      	if($this->input->post()){
      		unlink('upload/file/danhsach.xlsx');
      		if($_FILES["filecsv"]["name"]){
      			$tempFile = $_FILES['filecsv']['tmp_name'];
				$fileName = $_FILES['filecsv']['name'];
      			$new_fileName = explode('.',$fileName);
				$new_fileName = 'danhsach.'.$new_fileName[1];
				$targetPath = getcwd() . '/upload/file/';
				$targetFile = $targetPath . $new_fileName;
				move_uploaded_file($tempFile, $targetFile);
				$pathToFile = 'upload/file/'.$new_fileName;
				$this->load->library('excel');
				ini_set('memory_limit', '-1');
				$objPHPExcel = new PHPExcel();
			    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
			    $objReader->setReadDataOnly(true);
			    if (is_readable($pathToFile)){
				  $objPHPExcel = $objReader->load($pathToFile);
				} else {
				  // handle problem, for example
				  echo "cannot read $pathToFile";
				  exit;
				}
				$number_row = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
			    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
			    $arr_data = NULL;
			    $list_product_error = NULL;
			    $count_unique = 0;
			    $count_notunique = 0;
			    $typeid = 0;
			    $brandid = 0;
				for($i=3;$i<=$number_row;$i++) {
					$stt = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
				    $name = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
				    $code = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
				    $danhmuc = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();   
				    $thuonghieu = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
				    $price = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();   
				    $price_sale = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();

				    $type = $this->query_sql->select_row('dev_menu', 'id', array('name' => $danhmuc));
				    if(isset($type) && $type!=NULL){
				    	$typeid = $type['id'];
				    }

				    $brand = $this->query_sql->select_row('ci_image', 'id', array('name' => $thuonghieu,'type' => 'brand'));
				    if(isset($brand) && $brand!=NULL){
				    	$brandid = $brand['id'];
				    }

				    if($name != NULL){
				    	$product = $this->query_sql->select_row('dev_product', 'id', array('name' => $name));
				    	if(isset($product) && $product!=NULL){
				    		$count_notunique += 1;
				    		$list_product_error[] = $name;
				    	}else{
				    		$data_insert = array(
							    "name" => $name,
							    "code" => $code ,
							    "typeid" => $typeid,
							    "brandid" => $brandid,
							    "price" => $price,
							    "price_sale" => $price_sale,
						    );
						    $arr_data[] = $data_insert;
						    $count_unique += 1;
				    	}
				    }
				    
			   	}
			   	$this->session->set_flashdata('message_flashdata', array(
					'list_product_error'=> $list_product_error,
					'count_unique'		=> $count_unique,
					'count_notunique'	=> $count_notunique,
				));
			   	$this->query_sql->adds('dev_product', $arr_data);
			   	redirect('admin/product/success_import',$data_result);
      		}
      	}
      	$data['title'] = 'Import dữ liệu';
		$data['template'] = 'backend/product/importexcel';
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function success_import()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Kết quả Import';
		$data['template'] = 'backend/product/success_import';
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
}
