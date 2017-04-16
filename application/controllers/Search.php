<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends My_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	
	public function __destruct(){
	}
	public function auto()
	{
		$keyword = $_POST['keyword'];
		if(isset($keyword) && $keyword!= ''){
			$data['result_product'] = $this->query_sql->view_like('id, name, alias, image_thumb, price','dev_product',array('publish' => 0),0,10,'name',$keyword);
			$data['result_type'] = $this->query_sql->view_like('id, name, alias','dev_menu',array('publish' => 0, 'type' => 2),0,5,'name',$keyword);
			$this->load->view('frontend/search/auto', isset($data)?$data:NULL);
		}
		
	}
}