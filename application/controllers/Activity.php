<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends My_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	
	public function __destruct(){
	}
	
	public function listnews($type_alias = '',$page = 1)
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = $this->CI_function->get_title_by_alias($type_alias,'dev_menu','title');
		$data['keyword'] = $this->CI_function->get_keyword_by_alias($type_alias,'dev_menu','meta_keyword');
		$data['description'] = $this->CI_function->get_description_by_alias($type_alias,'dev_menu','meta_description');
		$data['name'] = $this->CI_function->get_name_by_alias($type_alias,'dev_menu','name');

		$data['image'] = $this->CI_function->get_row_by_alias($type_alias,'dev_menu','image');
		$data['content'] = $this->CI_function->get_content_by_alias($type_alias,'dev_menu','content');
		$typeid = $this->CI_function->get_id_by_alias($type_alias,'dev_menu','id');
		if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
			$en_lang = $this->query_sql->select_row('dev_lang', 'name,content', array('parentid' => $typeid,'type' => 'menu','lang' => 'en'));

			$data['name'] = $en_lang['name'];
		}
		$data['url'] = $type_alias.'-lv'.$typeid.'.html';
		$menu = $this->query_sql->select_array('dev_menu','id',array('parentid' => $typeid));
		foreach ($menu as $key_menu => $val_menu) {
			$list_typeid[] = $val_menu['id'];
		}
		$list_typeid[] = $typeid;
		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().$type_alias.'-tn'.$typeid.'.html/page/';
		$config['first_url'] = base_url().$type_alias.'-tn'.$typeid.'.html';
		if($menu != NULL){
			if(isset($_GET['city']) && $_GET['city']){
				$cityid = $_GET['city'];
				$config['total_rows'] = $this->query_sql->total_where_in('dev_news',array('publish' => 0,'cityid' => $cityid),$list_typeid,'typeid');
			}else{
				$config['total_rows'] = $this->query_sql->total_where_in('dev_news',array('publish' => 0),$list_typeid,'typeid');
			}
			
		}else{
			if(isset($_GET['city']) && $_GET['city']){
				$cityid = $_GET['city'];
				$config['total_rows'] = $this->query_sql->total_where('dev_news',array('typeid' => $typeid, 'publish' => 0,'cityid' => $cityid));
			}else{
				$config['total_rows'] = $this->query_sql->total_where('dev_news',array('typeid' => $typeid, 'publish' => 0));
			}
		}
		
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if(isset($_GET['city']) && $_GET['city']){
			$data['cityid'] = $_GET['city'];
			$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $data['cityid']));
			$data['city_name'] = $city['name'];
		}

		
		if($config['total_rows']>0){
			if($menu != NULL){
				if(isset($_GET['city']) && $_GET['city']){
					$cityid = $_GET['city'];
					$data['news'] = $this->query_sql->view_where_in('id, title, name, typeid, alias, created, image, publish, is_home, is_hot, content, description','dev_news',array('publish' => 0,'cityid' => $cityid),$list_typeid,'typeid',($page * $config['per_page']),$config['per_page']);
				}else{
					$data['news'] = $this->query_sql->view_where_in('id, title, name, typeid, alias, created, image, publish, is_home, is_hot, content, description','dev_news',array('publish' => 0),$list_typeid,'typeid',($page * $config['per_page']),$config['per_page']);
				}
				

			}else{
				if(isset($_GET['city']) && $_GET['city']){
					$cityid = $_GET['city'];
					$data['news'] = $this->query_sql->view_where('id, title,name, typeid, alias, created, image, publish, is_home, is_hot, content, description','dev_news',array('typeid' => $typeid, 'publish' => 0,'cityid' => $cityid),($page * $config['per_page']),$config['per_page']);
				}else{
					$data['news'] = $this->query_sql->view_where('id, title,name, typeid, alias, created, image, publish, is_home, is_hot, content, description','dev_news',array('typeid' => $typeid, 'publish' => 0),($page * $config['per_page']),$config['per_page']);
				}
			}

			if(isset($data['news']) && $data['news'] != NULL){
				foreach ($data['news'] as $key => $val) {
					if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
						$en_lang = $this->query_sql->select_row('dev_lang', 'name,content', array('parentid' => $val['id'],'type' => 'news','lang' => 'en'));
						if($en_lang != NULL){
							$data['news'][$key]['name'] = $en_lang['name'];
						}else{
							$data['news'][$key]['name'] = '';
						}
						
					}
				}
			}
			
		}

		$data['city'] = $this->query_sql->select_array('dev_city', 'id,name', array('publish' => 0));
		$data['type_activity'] = $this->query_sql->select_array('dev_menu','id, name, title,image,alias',array('publish' => 0,'type' => 3,'parentid >' => 0));
		if(isset($data['type_activity']) && $data['type_activity'] != NULL){
			foreach ($data['type_activity'] as $key_type_activity => $val_type_activity) {
				if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
					$en_lang = $this->query_sql->select_row('dev_lang', 'name,content', array('parentid' => $val_type_activity['id'],'type' => 'menu','lang' => 'en'));

					$data['type_activity'][$key_type_activity]['name'] = $en_lang['name'];
					$data['type_activity'][$key_type_activity]['content'] = $en_lang['content'];
				}
			}
		}
			
		$data['template'] = 'frontend/activity/listnews';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function detail($id = 0)
	{
		$data['data_index'] = $this->get_index();
		$data['detail'] = $this->query_sql->select_row('dev_news', 'id,hotline,website,fax,address, title, name, typeid, description,meta_description,meta_keyword, alias, content, image, is_view, created, userid,cityid', array('id' => $id, 'publish' => 0));
		$data['title'] = $data['detail']['title'];
		$data['keyword'] = $data['detail']['meta_keyword'];
		$data['description'] = $data['detail']['meta_description'];
		$data['image'] = base_url().'upload/activity/'.$data['detail']['image'];
		$data['url'] = $data['detail']['alias'].'-l'.$data['detail']['id'].'.html';
		$data['name'] = $data['detail']['name'];

		if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
			$en_lang = $this->query_sql->select_row('dev_lang', 'name,content,description,address', array('parentid' => $data['detail']['id'],'type' => 'news','lang' => 'en'));
			$data['detail']['name'] = $en_lang['name'];
			$data['detail']['description'] = $en_lang['description'];
			$data['detail']['address'] = $en_lang['address'];
			$data['detail']['content'] = $en_lang['content'];
			$data['name'] = $en_lang['name'];

		}

		$type = $this->query_sql->select_row('dev_menu', 'id,name,image,alias', array('id' => $data['detail']['typeid']));
		$data['detail']['type_name'] = $type['name'];
		$data['detail']['type_image'] = $type['image'];
		$data['detail']['type_id'] = $type['id'];
		$data['detail']['type_alias'] = $type['alias'];
		if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
			$en_lang = $this->query_sql->select_row('dev_lang', 'name,content', array('parentid' => $type['id'],'type' => 'menu','lang' => 'en'));

			$data['detail']['type_name'] = $en_lang['name'];
		}


		$city = $this->query_sql->select_row('dev_city', 'id,name', array('id' => $data['detail']['cityid']));
		$data['detail']['city_name'] = $city['name'];

		$data['image_detail'] = $this->query_sql->select_array('dev_news_image', 'id,image,image_thumb', array('newsid' => $id));

		$data['city'] = $this->query_sql->select_array('dev_city', 'id,name', array('publish' => 0));
		$data['type_activity'] = $this->query_sql->select_array('dev_menu','id, name, title,image,alias',array('publish' => 0,'type' => 3,'parentid >' => 0));
		if(isset($data['type_activity']) && $data['type_activity'] != NULL){
			foreach ($data['type_activity'] as $key_type_activity => $val_type_activity) {
				if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
					$en_lang = $this->query_sql->select_row('dev_lang', 'name,content', array('parentid' => $val_type_activity['id'],'type' => 'menu','lang' => 'en'));

					$data['type_activity'][$key_type_activity]['name'] = $en_lang['name'];
					$data['type_activity'][$key_type_activity]['content'] = $en_lang['content'];
				}
			}
		}
		
		$activity_prev = $this->query_sql->select_row('dev_news', 'id,name,alias', array('publish' => 0,'id <' => $id,'typeid' => $data['detail']['typeid']));
		if($activity_prev != NULL){
			$data['detail']['link_prev'] = base_url().$activity_prev['alias'].'-l'.$activity_prev['id'].'.html';
		}else{
			$data['detail']['link_prev'] = '';
		}

		$activity_next = $this->query_sql->select_row('dev_news', 'id,name,alias', array('publish' => 0,'id >' => $id ,'typeid' => $data['detail']['typeid']));
		if($activity_next != NULL){
			$data['detail']['link_next'] = base_url().$activity_next['alias'].'-l'.$activity_next['id'].'.html';
		}else{
			$data['detail']['link_next'] = '';
		}

		//Update view
		$data_update = array(
			'is_view' => $data['detail']['is_view'] + 1
		);
		$flag = $this->query_sql->edit('dev_news', $data_update, array('id' => $id));

		$user = $this->query_sql->select_row('ci_user', 'username', array('id' => $data['detail']['userid']));
		$data['detail']['username'] = $user['username'];


		//$data['news'] = $this->query_sql->select_array('dev_news','id, title, name, typeid, alias,description, image, publish',array('id !=' => $id, 'publish' => 0,'typeid' => $data['detail']['typeid']),NULL,NULL);

		
		$data['template'] = 'frontend/activity/detail';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
}