<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends My_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	
	public function __destruct(){
	}
	public function index()
	{
		$type_alias = 'lien-he';
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Contact';
		$data['keyword'] = $this->CI_function->get_keyword_by_alias($type_alias,'dev_menu','meta_keyword');
		$data['description'] = $this->CI_function->get_description_by_alias($type_alias,'dev_menu','meta_description');

		if($this->input->post()){
			$data_insert = array(
				'fullname' 		=> 	$this->input->post('c_fullname'),
				'email' 		=> 	$this->input->post('c_email'),
				'phone' 		=> 	$this->input->post('c_phone'),
				'content' 		=> 	$this->input->post('c_content'),
				'status' 		=> 	0,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$this->query_sql->add('dev_contact', $data_insert);
		}
		
		$data['name'] = $this->CI_function->get_name_by_alias($type_alias,'dev_menu','name');
		
		$data['template'] = 'frontend/contact/index';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function sitemap()
	{
		$type_alias = 'site-map';
		$data['data_index'] = $this->get_index();
		$data['title'] = $this->CI_function->get_title_by_alias($type_alias,'dev_menu','title');
		$data['keyword'] = $this->CI_function->get_keyword_by_alias($type_alias,'dev_menu','meta_keyword');
		$data['description'] = $this->CI_function->get_description_by_alias($type_alias,'dev_menu','meta_description');
		$data['name'] = 'Sitemap';
		
		$data['template'] = 'frontend/contact/sitemap';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
}