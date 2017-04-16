<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends My_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	
	public function __destruct(){
	}
	public function index()
	{
		$_lang = $_GET['lang'];
		$this->CI_function->get_lang($_lang);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}