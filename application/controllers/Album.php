<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album extends My_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	
	public function __destruct(){
	}
	
	public function listalbum($type_alias = '',$page = 1)
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

		$config['base_url'] = base_url().$type_alias.'-ta'.$typeid.'.html/page/';
		$config['first_url'] = base_url().$type_alias.'-ta'.$typeid.'.html';
		

		
		if($menu != NULL){
			$config['total_rows'] = $this->query_sql->total_where_in('dev_album',array('publish' => 0),$list_typeid,'typeid');
		}else{
			$config['total_rows'] = $this->query_sql->total_where('dev_album',array('typeid' => $typeid, 'publish' => 0));
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
				$data['album'] = $this->query_sql->view_where_in('*','dev_album',array('publish' => 0),$list_typeid,'typeid',($page * $config['per_page']),$config['per_page']);

			}else{
				$data['album'] = $this->query_sql->view_where('*','dev_album',array('typeid' => $typeid, 'publish' => 0),($page * $config['per_page']),$config['per_page']);
				
			}

			if(isset($data['album']) && $data['album'] != NULL){
				foreach ($data['album'] as $key => $val) {
					if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
						$en_lang = $this->query_sql->select_row('dev_lang', 'name', array('parentid' => $val['id'],'type' => 'album','lang' => 'en'));
						if($en_lang != NULL){
							$data['album'][$key]['name'] = $en_lang['name'];
						}else{
							$data['album'][$key]['name'] = '';
						}
					}
				}
			}
		}
			
		$data['template'] = 'frontend/album/listalbum';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function detail($id = 0)
	{
		$data['data_index'] = $this->get_index();
		$data['detail'] = $this->query_sql->select_row('dev_album', '*', array('id' => $id));
		$data['title'] = $data['detail']['title'];
		$data['keyword'] = $data['detail']['meta_keyword'];
		$data['description'] = $data['detail']['meta_description'];
		$data['image'] = base_url().'upload/album/'.$data['detail']['image'];
		$data['url'] = $data['detail']['alias'].'-a'.$data['detail']['id'].'.html';
		$data['name'] = $data['detail']['name'];

		$data['album_image'] = $this->query_sql->select_array('dev_album_image','id,image',array('albumid' => $id));

		$data['menu_album'] = $this->query_sql->select_row('dev_menu','id,name,alias',array('type' => 3,'parentid' => 0));
		if($data['menu_album'] != NULL){
			$child = $this->query_sql->select_array('dev_menu','id,name,alias',array('parentid' => $data['menu_album']['id']));
			$data['menu_album']['child'] = $child;
		}
		
		$data['template'] = 'frontend/album/detail';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
}