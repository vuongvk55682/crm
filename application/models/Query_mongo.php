<?php
	class Query_mongo extends CI_Model{
		function __construct()
		{
			parent::__construct();
			
		}
		function _pagination()
		{
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = '&laquo; First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			
			$config['last_link'] = 'Last &raquo;';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			
			$config['next_link'] = 'Next &raquo;';
			$config['next_tag_open'] = '<li class="paginate_button next">';
			$config['next_tag_close'] = '</li>';
			
			$config['prev_link'] = '&laquo; Previous';
			$config['prev_tag_open'] = '<li class="paginate_button previous">';
			$config['prev_tag_close'] = '</li>';
			
			$config['cur_tag_open'] = '<li class="paginate_button active"><a class="number current">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			
			$config['use_page_numbers'] = TRUE;
			$config['per_page'] = 10;
			return $config;
		}   
	}
?>