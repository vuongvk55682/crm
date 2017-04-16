<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Route extends My_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	
	public function __destruct(){
	}
	public function index($alias = '', $page = 1){
		$data['data_index'] = $this->get_index();
		$route = $this->query_sql->select_row('dev_route', 'id,type,parentid', array('alias' => $alias));
		if($route['type'] == 1){
			$data['product'] = $this->query_sql->select_row('dev_product', 'id, name,title, typeid, alias, created, image, image_thumb, is_sale, publish, content,meta_keyword,meta_description, price, is_view, info_product, brandid, info_sale,price_sale,des,guarantee,video,service', array('publish' => 0, 'id' => $route['parentid']));
			$data['title'] = $data['product']['title'];
			$data['keyword'] = $data['product']['meta_keyword'];
			$data['description'] = $data['product']['meta_description'];
			$data['image'] = base_url().'upload/product/'.$data['product']['image'];
			$data['url'] = $data['product']['alias'].'.html';
			$data['name'] = $data['product']['name'];
			$userid = $this->CI_auth->logged_id_user();
			
			$data['comment'] = $this->query_sql->select_array('dev_product_comment', 'id,content,userid,title,created', array('productid' => $id,'parentid' => 0,'publish' => 1,'is_huuich' => 0));
			if($data['comment'] != NULL){
				foreach ($data['comment'] as $key_cmmt => $val_cmmt) {
					$user = $this->query_sql->select_row('ci_user', 'fullname', array('id' => $val_cmmt['userid']));
					$data['comment'][$key_cmmt]['user'] = $user;

					$data['comment'][$key_cmmt]['number_day'] = $this->CI_function->CountMonthFromDate($val_cmmt['created']);

					$data['comment'][$key_cmmt]['name_city'] = $this->CI_function->GetCityFromUser($val_cmmt['userid']);
					
					$count_comment = $this->query_sql->total_where('dev_product_comment_thanks',array('commentid' => $val_cmmt['id']));
					$data['comment'][$key_cmmt]['count_thanks'] = $count_comment;

					$check_thanks = $this->query_sql->select_row('dev_product_comment_thanks', 'id', array('commentid' => $val_cmmt['id'],'userid' => $userid));
					$data['comment'][$key_cmmt]['check_thanks'] = $check_thanks;

					$comment_child = $this->query_sql->select_array('dev_product_comment', 'id,content,userid,title', array('parentid' => $val_cmmt['id'],'publish' => 1));
					if($comment_child != NULL){
						foreach ($comment_child as $key_cmmt_child => $val_cmmt_child) {
							$user = $this->query_sql->select_row('ci_user', 'fullname', array('id' => $val_cmmt_child['userid']));
							$comment_child[$key_cmmt_child]['user'] = $user;
						}
					}
					$data['comment'][$key_cmmt]['comment_child'] = $comment_child;
				}
			}

			$data['comment_news'] = $this->query_sql->select_array('dev_product_comment', 'id,content,userid,title,created', array('productid' => $id,'parentid' => 0,'publish' => 1));
			if($data['comment_news'] != NULL){
				foreach ($data['comment_news'] as $key_cmmt_news => $val_cmmt_news) {
					$user = $this->query_sql->select_row('ci_user', 'fullname', array('id' => $val_cmmt_news['userid']));
					$data['comment_news'][$key_cmmt_news]['user'] = $user;

					$count_comment = $this->query_sql->total_where('dev_product_comment_thanks',array('commentid' => $val_cmmt_news['id']));
					$data['comment_news'][$key_cmmt_news]['count_thanks'] = $count_comment;

					$data['comment_news'][$key_cmmt_news]['number_day'] = $this->CI_function->CountMonthFromDate($val_cmmt_news['created']);

					$data['comment_news'][$key_cmmt_news]['name_city'] = $this->CI_function->GetCityFromUser($val_cmmt_news['userid']);

					$check_thanks = $this->query_sql->select_row('dev_product_comment_thanks', 'id', array('commentid' => $val_cmmt_news['id'],'userid' => $userid));
					$data['comment_news'][$key_cmmt_news]['check_thanks'] = $check_thanks;

					$comment_child = $this->query_sql->select_array('dev_product_comment', 'id,content,userid,title', array('parentid' => $val_cmmt_news['id'],'publish' => 1));
					if($comment_child != NULL){
						foreach ($comment_child as $key_cmmt_news_child => $val_cmmt_child) {
							$user = $this->query_sql->select_row('ci_user', 'fullname', array('id' => $val_cmmt_child['userid']));
							$comment_child[$key_cmmt_news_child]['user'] = $user;
						}
					}
					$data['comment_news'][$key_cmmt_news]['comment_child'] = $comment_child;
				}
			}


			$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));

			$data['product_album'] = $this->query_sql->select_array('dev_product_album','id,image',array('publish' => 0,'productid' => $data['product']['id']));
			

			$data['rating'] = $this->query_sql->select_row('dev_rating', 'percent,star1,star2,star3,star4,star5', array('productid' => $id));
			if($data['rating'] != NULL){
				if($data['rating']['percent'] > 0 && $data['rating']['percent'] < 3){
					$data['rating']['percent'] = 1;
				}else if($data['rating']['percent'] > 2 && $data['rating']['percent'] < 5){
					$data['rating']['percent'] = 2;
				}else if($data['rating']['percent'] > 4 && $data['rating']['percent'] < 7){
					$data['rating']['percent'] = 3;
				}else if($data['rating']['percent'] > 6 && $data['rating']['percent'] < 9){
					$data['rating']['percent'] = 4;
				}else{
					$data['rating']['percent'] = 5;
				}
			}

			$product_config = $this->query_sql->select_row('dev_product_config', 'id,content', array('id' => 1));
			$arr_content = json_decode($product_config['content'],true);
			$data['price'] = $arr_content['price'];

			$data['image_detail'] = $this->query_sql->select_array('dev_product_image', 'id,image,image_thumb', array('productid' => $id));

			$brand = $this->query_sql->select_row('ci_image', 'id,name,alias', array('id' => $data['product']['brandid']));
			$data['product']['brand'] = $brand;

			$list_cookie  = substr(base64_decode(base64_decode(get_cookie('ci_like',TRUE))),0,-5);
			$ar_cookie = explode('-',$list_cookie);

			if($data['product']['price'] > 0 && $data['product']['price_sale'] > 0){
				$percent = round(100-(($data['product']['price_sale']*100)/$data['product']['price']),0);
				$profit = $data['product']['price'] - $data['product']['price_sale'];
			}else{
				$percent = 0;
				$profit = 0;
			}
			$data['product']['percent'] = $percent;
			$data['product']['profit'] = $profit;

			//Update view
			$data_update = array(
				'is_view' => $data['product']['is_view'] + 1
			);
			$flag = $this->query_sql->edit('dev_product', $data_update, array('id' => $id));

			$type = $this->query_sql->select_row('dev_menu', 'id', array('id' => $data['product']['typeid']));
			$data['product_same'] = $this->query_sql->select_array('dev_product','id, name,title, typeid, alias, created, image, image_thumb, is_sale, publish, content, price, price_sale',array('id !=' => $id, 'publish' => 0),NULL,NULL);
			if($data['product_same'] != NULL){
				foreach ($data['product_same'] as $key_product_same => $val_product_same) {
					if($val_product_same['price_sale'] > 0){
						$percent_same = round(100-(($val_product_same['price_sale']*100)/$val_product_same['price']),0);
					}else{
						$percent_same = 0;
					}
					$data['product_same'][$key_product_same]['percent'] = $percent_same;


					$rating_same = $this->query_sql->select_row('dev_rating', 'percent,star1,star2,star3,star4,star5', array('productid' => $val_product_same['id']));
					if($rating_same != NULL){
						if($rating_same['percent'] > 0 && $rating_same['percent'] < 3){
							$percent_star_same = 1;
						}else if($rating_same['percent'] > 2 && $rating_same['percent'] < 5){
							$percent_star_same = 2;
						}else if($rating_same['percent'] > 4 && $rating_same['percent'] < 7){
							$percent_star_same = 3;
						}else if($rating_same['percent'] > 6 && $rating_same['percent'] < 9){
							$percent_star_same = 4;
						}else{
							$percent_star_same = 5;
						}
						$data['product_same'][$key_product_same]['percent_star'] = $percent_star_same;
					}
				}
			}

			$data['product_brand'] = $this->query_sql->select_array('dev_product','id, name,title, typeid, alias, created, image, image_thumb, is_sale, publish, content, price, price_sale',array('id !=' => $id, 'publish' => 0,'brandid' => $data['product']['brandid']),NULL,NULL);
			if($data['product_brand'] != NULL){
				foreach ($data['product_brand'] as $key_product_brand => $val_product_brand) {
					if($val_product_brand['price_sale'] > 0){
						$percent_brand = round(100-(($val_product_brand['price_sale']*100)/$val_product_brand['price']),0);
					}else{
						$percent_brand = 0;
					}
					$data['product_brand'][$key_product_brand]['percent'] = $percent_brand;

					$rating_brand = $this->query_sql->select_row('dev_rating', 'percent,star1,star2,star3,star4,star5', array('productid' => $val_product_brand['id']));
					if($rating_brand != NULL){
						if($rating_brand['percent'] > 0 && $rating_brand['percent'] < 3){
							$percent_star_brand = 1;
						}else if($rating_brand['percent'] > 2 && $rating_brand['percent'] < 5){
							$percent_star_brand = 2;
						}else if($rating_brand['percent'] > 4 && $rating_brand['percent'] < 7){
							$percent_star_brand = 3;
						}else if($rating_brand['percent'] > 6 && $rating_brand['percent'] < 9){
							$percent_star_brand = 4;
						}else{
							$percent_star_brand = 5;
						}
						$data['product_brand'][$key_product_brand]['percent_star'] = $percent_star_brand;
					}
				}
			}

			$data['product_hot'] = $this->query_sql->select_array('dev_product','id, name,title, typeid, alias, created, image, image_thumb, is_sale, publish, content, price, price_sale',array('id !=' => $id, 'publish' => 0,'typeid' => $data['product']['typeid'],'is_hot' => 0),NULL,NULL);

			$data['template'] = 'frontend/product/detail';
			
		}else if($route['type'] == 3){
			$type_menu = $this->query_sql->select_row('dev_menu', 'id,type', array('alias' => $alias));
			$id = $type_menu['id'];
			if($type_menu['type'] == 3){
				$data['title'] = $this->CI_function->get_row_by_id($id,'dev_menu','title');
				$data['keyword'] = $this->CI_function->get_row_by_id($id,'dev_menu','meta_keyword');
				$data['description'] = $this->CI_function->get_row_by_id($id,'dev_menu','meta_description');
				$data['image_qc'] = $this->CI_function->get_row_by_id($id,'dev_menu','image_qc');
				$data['link_qc'] = $this->CI_function->get_row_by_id($id,'dev_menu','link_qc');

				//Product left
				$data['product_banchay'] = $this->get_product_banchay();
				
				//Sort and view
				$v_order = 'id desc';
				$n_order = 0;
				if(isset($_GET['price'])){
					$price = $_GET['price'];
					
					if($price == 'asc'){
						$v_order = 'price asc';
						$n_order = 1;
					}
					else{
						$v_order = 'price desc';
						$n_order = 2;
					}
					
				}
				if(isset($_GET['orderid'])){
					$orderid = $_GET['orderid'];
					if($orderid == 'asc'){
						$v_order = 'id asc';
						$n_order = 3;
					}
					else{
						$v_order = 'id desc';
						$n_order = 4;
					}
					
				}
				if(isset($_GET['order'])){
					$order = $_GET['order'];
					if($order == 'choose'){
						$v_order = 'is_choose asc';
						$n_order = 5;
					}else if($order == 'banchay'){
						$v_order = 'is_banchay asc';
						$n_order = 6;
					}
					else if($order == 'sale'){
						$v_order = 'sale desc';
						$n_order = 7;
					}
					else{
						$v_order = 'id desc';
						$n_order = 8;
					}
					
				}
				$data['n_price'] = $n_order;
				$show = 1;
				if(isset($_GET['mode'])){
					$mode = $_GET['mode'];
					
					if($mode == 'grid'){
						$show = 1;
					}else if($mode == 'list'){
						$show = 2;
					}else{
						$show = 1;
					}
				}
				$this->session->set_userdata('show', $show);
				if($this->session->userdata('show') != ''){
					$data['show'] = $this->session->userdata('show');
				}


				$product_config = $this->query_sql->select_row('dev_product_config', 'id,content', array('id' => 1));
				$arr_content = json_decode($product_config['content'],true);
				$data['price'] = $arr_content['price'];
				$data['name'] = $this->CI_function->get_row_by_id($id,'dev_menu','name');
				$data['content'] = $this->CI_function->get_row_by_id($id,'dev_menu','content');
				$typeid = $id;
				$type_alias = $this->CI_function->get_row_by_id($id,'dev_menu','alias');
				$data['url'] = $type_alias.'-t'.$typeid.'.html';
				$menu = $this->query_sql->select_array('dev_menu','id,parentid',array('parentid' => $typeid));
				
				

				$list_typeid = $this->CI_function->getListMenuId($typeid);
				$cate_child_left = $this->query_sql->select_array('dev_menu', 'id, name, alias, type, link', array('parentid' => $id, 'publish' => 0), 'sort asc,id asc');
				foreach ($cate_child_left as $key_cate_child => $val_cate_child) {
					$cate_child_left2 = $this->query_sql->select_array('dev_menu', 'id, name, type, alias, link', array('parentid' => $val_cate_child['id'], 'publish' => 0), 'sort asc,id asc');
					if(isset($cate_child_left2) && $cate_child_left2 != NULL){
						foreach ($cate_child_left2 as $key_cate_child_left2 => $val_cate_child_left2) {
							$list_typeid3 = $this->CI_function->getListMenuId($val_cate_child_left2['id']);
							$cate_child_left2[$key_cate_child_left2]['number_product'] = $this->query_sql->total_where_in('dev_product',array('publish' => 0),$list_typeid3,'typeid');
						}
					}
					$list_typeid2 = $this->CI_function->getListMenuId($val_cate_child['id']);
					$cate_child_left[$key_cate_child]['number_product'] = $this->query_sql->total_where_in('dev_product',array('publish' => 0),$list_typeid2,'typeid');
					$cate_child_left[$key_cate_child]['child2'] = $cate_child_left2;
				}
				$data['cate_child_left'] = $cate_child_left;



				
				$config = $this->query_sql->_pagination();
				$config['base_url'] = base_url().$type_alias.'.html/page/';
				$config['first_url'] = base_url().$type_alias.'.html';
				$config['total_rows'] = $this->query_sql->total_where_in('dev_product',array('publish' => 0),$list_typeid,'typeid');
				if(isset($_GET['limit'])){
					$config['per_page'] = $_GET['limit'];
					$data['limit'] = $_GET['limit'];
				}else{
					$config['per_page'] = $arr_content['number_page'];
				}
				
				$config['uri_segment'] = 3;
				$total_page = ceil($config['total_rows']/$config['per_page']);
				$page = ($page > $total_page)?$total_page:$page;
				$page = ($page < 1)?1:$page;
				$page = $page - 1;
				$this->pagination->initialize($config);
				$data['list_pagination'] = $this->pagination->create_links();

				if($config['total_rows']>0){
					$data['number_product'] = $config['total_rows'];
					$data['product'] = $this->query_sql->view_where_in('id, name,title, typeid, alias, created, image, image_thumb, is_sale, publish, content, price,price_sale,description_like','dev_product',array('publish' => 0),$list_typeid,'typeid',($page * $config['per_page']),$config['per_page'],$v_order);
					if($data['product'] != NULL){
						foreach ($data['product'] as $key_product => $val_product) {
							if($val_product['price_sale'] > 0){
								$percent = round(100-(($val_product['price_sale']*100)/$val_product['price']),0);
							}else{
								$percent = 0;
							}
							$data['product'][$key_product]['percent'] = $percent;

							$rating = $this->query_sql->select_row('dev_rating', 'percent,star1,star2,star3,star4,star5', array('productid' => $val_product['id']));
							if($rating != NULL){
								if($rating['percent'] > 0 && $rating['percent'] < 3){
									$percent_star = 1;
								}else if($rating['percent'] > 2 && $rating['percent'] < 5){
									$percent_star = 2;
								}else if($rating['percent'] > 4 && $rating['percent'] < 7){
									$percent_star = 3;
								}else if($rating['percent'] > 6 && $rating['percent'] < 9){
									$percent_star = 4;
								}else{
									$percent_star = 5;
								}
								$product[$key_product]['percent_star'] = $percent_star;
							}
						}
					}
				}
				$data['template'] = 'frontend/product/listproduct';
			}else{
				$typeid = $id;

				$data['title'] = $this->CI_function->get_row_by_id($id,'dev_menu','title');
				$data['keyword'] = $this->CI_function->get_row_by_id($id,'dev_menu','meta_keyword');
				$data['description'] = $this->CI_function->get_row_by_id($id,'dev_menu','meta_description');
				$menu = $this->query_sql->select_row('dev_menu','id,is_full,shows,content,name',array('id' => $id));
				$data['name'] = $menu['name'];
				$data['content'] = $menu['content'];


				$data['typeid'] = $id;
				$data['url'] = $type_alias.'.html';
				$list_typeid = $this->CI_function->getListMenuId($id);
				$menu = $this->query_sql->select_row('dev_menu','id,is_full,shows',array('id' => $typeid));
				$data['_type'] = $menu;
				
				
				$config = $this->query_sql->_pagination();
				$config['base_url'] = base_url().$type_alias.'.html/page/';
				$config['first_url'] = base_url().$type_alias.'.html';
				if($menu != NULL){
					$config['total_rows'] = $this->query_sql->total_where_in('dev_news',array('publish' => 0),$list_typeid,'typeid');
				}else{
					$config['total_rows'] = $this->query_sql->total_where('dev_news',array('typeid' => $typeid, 'publish' => 0));
				}

				$parentid = $this->CI_function->getParentId($typeid,'id','dev_menu');
				$data['parentid'] = $parentid;
				if($parentid > 0){
					$data['type_name'] = $this->CI_function->get_row_by_id($parentid,'dev_menu','name');
					$data['type_id'] = $this->CI_function->get_row_by_id($parentid,'dev_menu','id');
					$data['type_alias'] = $this->CI_function->get_row_by_id($parentid,'dev_menu','alias');
					$data['type'] = $this->query_sql->select_array('dev_menu','id, name,alias,title',array('publish' => 0,'parentid' => $parentid));
				}else{
					$data['type'] = $this->query_sql->select_array('dev_news','id, name,title,alias',array('publish' => 0,'typeid' => $typeid));
				}
				
				$config['per_page'] = 10;
				$config['uri_segment'] = 3;
				$total_page = ceil($config['total_rows']/$config['per_page']);
				$page = ($page > $total_page)?$total_page:$page;
				$page = ($page < 1)?1:$page;
				$page = $page - 1;
				
				$this->pagination->initialize($config);
				$data['list_pagination'] = $this->pagination->create_links();

				
				if($config['total_rows']>0){
					if($menu != NULL){
						$data['news'] = $this->query_sql->view_where_in('id, title, name, typeid, alias, created, image, publish, is_home, is_hot, content, description','dev_news',array('publish' => 0),$list_typeid,'typeid',($page * $config['per_page']),$config['per_page']);

					}else{
						$data['news'] = $this->query_sql->view_where('id, title,name, typeid, alias, created, image, publish, is_home, is_hot, content, description','dev_news',array('typeid' => $typeid, 'publish' => 0),($page * $config['per_page']),$config['per_page']);
					}
					
				}
					
				$data['template'] = 'frontend/news/listnews';
			}
		}else{
			$data['detail'] = $this->query_sql->select_row('dev_news', 'id,hotline,website,fax,address, title, name, typeid, description,meta_description,meta_keyword, alias, content, image, is_view, created, userid,cityid', array('alias' => $alias, 'publish' => 0));
			$data['title'] = $data['detail']['title'];
			$data['keyword'] = $data['detail']['meta_keyword'];
			$data['description'] = $data['detail']['meta_description'];
			$data['image'] = base_url().'upload/news/'.$data['detail']['image'];
			$data['url'] = $data['detail']['alias'].'.html';
			$data['name'] = $data['detail']['name'];
			if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
				$en_lang = $this->query_sql->select_row('dev_lang', 'name,content,description,address', array('parentid' => $data['detail']['id'],'type' => 'news','lang' => 'en'));
				$data['detail']['name'] = $en_lang['name'];
				$data['detail']['description'] = $en_lang['description'];
				$data['detail']['address'] = $en_lang['address'];
				$data['detail']['content'] = $en_lang['content'];
				$data['name'] = $en_lang['name'];

			}
			
			$parentid = $this->CI_function->getParentId($data['detail']['typeid'],'id','dev_menu');
			$data['parentid'] = $parentid;
			if($parentid > 0){
				$data['type_name'] = $this->CI_function->get_row_by_id($parentid,'dev_menu','name');
				$data['type_id'] = $this->CI_function->get_row_by_id($parentid,'dev_menu','id');
				$data['type_alias'] = $this->CI_function->get_row_by_id($parentid,'dev_menu','alias');
				$data['type'] = $this->query_sql->select_array('dev_menu','id, name,alias,title',array('publish' => 0,'parentid' => $parentid));
				if(isset($data['type']) && $data['type'] != NULL){
					foreach ($data['type'] as $key_type => $val_type) {
						if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
							$en_lang = $this->query_sql->select_row('dev_lang', 'name', array('parentid' => $val_type['id'],'type' => 'menu','lang' => 'en'));

							$data['type'][$key_type]['name'] = $en_lang['name'];
						}
					}
				}
			}else{
				$data['newsleft'] = $this->query_sql->select_array('dev_news','id, name,title,alias',array('publish' => 0,'typeid' => $data['detail']['typeid']));
				if(isset($data['newsleft']) && $data['newsleft'] != NULL){
					foreach ($data['newsleft'] as $keynewsleft => $valnewsleft) {
						if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
							$en_lang = $this->query_sql->select_row('dev_lang', 'name,content', array('parentid' => $valnewsleft['id'],'type' => 'news','lang' => 'en'));
							if($en_lang != NULL){
								$data['newsleft'][$keynewsleft]['name'] = $en_lang['name'];
							}else{
								$data['newsleft'][$keynewsleft]['name'] = '';
							}
							
						}
					}
				}
			}
			

				
			//Update view
			$data_update = array(
				'is_view' => $data['detail']['is_view'] + 1
			);
			$flag = $this->query_sql->edit('dev_news', $data_update, array('id' => $id));

			$user = $this->query_sql->select_row('ci_user', 'username', array('id' => $data['detail']['userid']));
			$data['detail']['username'] = $user['username'];


			//$data['news'] = $this->query_sql->select_array('dev_news','id, title, name, typeid, alias,description, image, publish',array('id !=' => $id, 'publish' => 0,'typeid' => $data['detail']['typeid']),NULL,NULL);

			
			$data['template'] = 'frontend/news/detail';
		}
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
}