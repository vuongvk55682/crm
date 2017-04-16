<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends My_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	
	public function __destruct(){
	}
	
	public function index($page = 1)
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Khoảnh khắc đẹp';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'video-clips.html/page/';
		$config['first_url'] = base_url().'video-clips.html';
		
		$config['total_rows'] = $this->query_sql->total('dev_video',array('publish' => 0));

		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		
		if($config['total_rows']>0){
			
			$data['video'] = $this->query_sql->view('*','dev_video',($page * $config['per_page']),$config['per_page']);

			if(isset($data['video']) && $data['video'] != NULL){
				foreach ($data['video'] as $key => $val) {
					if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
						$en_lang = $this->query_sql->select_row('dev_lang', 'name', array('parentid' => $val['id'],'type' => 'video','lang' => 'en'));
						if($en_lang != NULL){
							$data['video'][$key]['name'] = $en_lang['name'];
						}else{
							$data['video'][$key]['name'] = '';
						}
					}
				}
			}
		}
			
		$data['template'] = 'frontend/video/index';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
}