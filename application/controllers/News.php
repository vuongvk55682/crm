<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends My_controller {
	
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
		$data['content'] = $this->CI_function->get_content_by_alias($type_alias,'dev_menu','content');
		$typeid = $this->CI_function->get_id_by_alias($type_alias,'dev_menu','id');
		$data['typeid'] = $typeid;
		$data['url'] = $type_alias.'-tn'.$typeid.'.html';
		$list_typeid = $this->CI_function->getListMenuId($typeid);
		$menu = $this->query_sql->select_row('dev_menu','id,is_full,shows',array('id' => $typeid));
		$data['_type'] = $menu;
		
		
		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().$type_alias.'-tn'.$typeid.'.html/page/';
		$config['first_url'] = base_url().$type_alias.'-tn'.$typeid.'.html';
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
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function detail($alias = 0)
	{
		$data['data_index'] = $this->get_index();
		$data['detail'] = $this->query_sql->select_row('dev_news', 'id,hotline,website,fax,address, title, name, typeid, description,meta_description,meta_keyword, alias, content, image, is_view, created, userid,cityid', array('alias' => $alias, 'publish' => 0));
		$data['title'] = $data['detail']['title'];
		$data['keyword'] = $data['detail']['meta_keyword'];
		$data['description'] = $data['detail']['meta_description'];
		$data['image'] = base_url().'upload/news/'.$data['detail']['image'];
		$data['url'] = $data['detail']['alias'].'-n'.$data['detail']['id'].'.html';
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
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
}