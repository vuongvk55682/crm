<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');

	}
	public function __destruct(){
	}
	public function index()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		if($this->input->post()){
			$this->form_validation->set_rules('title','Tiêu đề','trim|required');
			if($this->form_validation->run()){
				$status = $this->input->post('status');
				$content = $this->input->post('content');
				$close_site = array(
					'status' 	=> $status,
					'content'	=> $content
				);
				$close_site = json_encode($close_site);
				$company = $this->input->post('company');
				$phone = $this->input->post('phone');
				$coordinates = $this->input->post('coordinates');
				$zoom = $this->input->post('zoom');
				$address = $this->input->post('address');
				$contact = array(
			    	'company' 		=> $company,
			    	'phone' 		=> $phone,
			    	'coordinates' 	=> $coordinates,
			    	'zoom' 			=> $zoom,
			    	'address' 		=> $address,
			    );
			    $contact = json_encode($contact);
				
				if($_FILES["favicon"]["name"]){

					$data = $this->query_sql->select_row('dev_system', 'favicon', array('id' => 1));
					if($data['favicon'] != ''){
						$file = "upload/system/".$data['favicon'];
						unlink($file);
					}

					$album_dir = 'upload/system/';
					if(!is_dir($album_dir)){ create_dir($album_dir); } 
					$config['upload_path']	= $album_dir;
					$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
					$config['max_size'] = 5120;
					
					$this->load->library('upload', $config); 
					$this->upload->initialize($config); 
					$image = $this->upload->do_upload("favicon");
					$image_data = $this->upload->data();

					$this->load->library('image_lib');
					$config['image_library'] = 'gd2';
					$config['source_image'] = 'upload/system/'.$image_data['file_name'];
					$config['create_thumb'] = TRUE;
    				$config['maintain_ratio'] = TRUE;
					$config['width'] = 30;
					$config['height'] = 30;

					$name_img = explode('.',$image_data['file_name']);
					$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];

					$this->image_lib->initialize($config);
				    $this->image_lib->resize();
				    
				}else{
					$name_img_thumb = '';
				}  	

				$data_update = array(
					'title' 		=> 	$this->input->post('title'),
					'close_site' 	=> 	$close_site,
					'contact' 		=> 	$contact,
					'meta_keyword' 	=> 	$this->input->post('meta_keyword'),
					'meta_description' 	=> 	$this->input->post('meta_description'),
					'fullname' 		=> 	$this->input->post('fullname'),
					'email_to' 		=> 	$this->input->post('email_to'),
					'hostmail' 		=> 	$this->input->post('hostmail'),
					'favicon'		=>	$name_img_thumb,
					'usermail'		=>	$this->input->post('usermail'),
					'passmail'		=>	$this->input->post('passmail'),
					'analytics'		=>	$this->input->post('analytics'),
					'webmaster'		=>	$this->input->post('webmaster'),
					'fancyfacebook'	=>	$this->input->post('fancyfacebook'),
					'color_menutop'		=>	$this->input->post('color_menutop'),
					'color_menubottom'		=>	$this->input->post('color_menubottom'),
					'color_title'		=>	$this->input->post('color_title'),
					'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600),
				);
				$flag = $this->query_sql->edit('dev_system', $data_update, array('id' => 1));
				if($flag>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Thành công!',
					));
					redirect('admin/system/index',$data);
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thất bại!',
					));
					redirect('admin/system/index',$data);
				}	
			}
		}
		$data['system'] = $this->query_sql->select_row('dev_system', '*', array('id' => 1));
		$data['contact'] = json_decode($data['system']['contact'],true); 
		$close_site = json_decode($data['system']['close_site'], true);
		$data['system']['status'] = $close_site['status'];
		$data['system']['content'] = $close_site['content'];
		$data['title'] = 'Cấu hình chung';
		$data['template'] = 'backend/system/index';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function sitemap()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		if($this->input->post()){
			
			if($_FILES["sitemap"]["name"]){
				
				$file_sitemap = "/sitemap.xml";
				unlink($file_sitemap);
				$dir = './';
				$file_tmp = $_FILES['sitemap']['tmp_name'];
			    $file_name = 'sitemap.xml';
			    if ( is_uploaded_file( $file_tmp ) ) {
			        move_uploaded_file( $file_tmp, $dir.$file_name );
			    } 

				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/system/sitemap',$data);
				
			}
		}
		$data['title'] = 'Tạo sitemap';
		$data['template'] = 'backend/system/sitemap';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function create_sitemap()
	{
		$this->load->helper('download');
		$menu = $this->query_sql->select_array('dev_menu', 'id, name, alias, type, link', array('publish' => 0), 'sort asc,id asc');
		$product = $this->query_sql->select_array('dev_product', 'id, name, alias', array('publish' => 0), 'sort asc,id asc');
		$news = $this->query_sql->select_array('dev_news', 'id, name, alias', array('publish' => 0), 'sort asc,id asc');
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
		<urlset
		      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
		      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
		      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
		            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
		<!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->';
		if($menu != NULL){
			foreach ($menu as $key_menu => $val_menu) {
				if($val_menu['link'] != ''){
					$url = $val_menu['link'];
				}else{
					if($val_menu['type'] == 1){
						$url = base_url().$val_menu['alias'].'-tn'.$val_menu['id'].'.html';
					}else if($val_menu['type'] == 2){
						$url = base_url().$val_menu['alias'].'-t'.$val_menu['id'].'.html';
					}else{
						$url = base_url();
					}
				}
				$xml .= '<url>
				  <loc>'.$url.'</loc>
				  <changefreq>always</changefreq>
				  <priority>0.80</priority>
				</url>';
			}
		}
		if($product != NULL){
			foreach ($product as $key_product => $val_product) {
				$url_product = base_url().$val_product['alias'].'-p'.$val_product['id'].'.html';
				$xml .= '<url>
				  <loc>'.$url_product.'</loc>
				  <changefreq>always</changefreq>
				  <priority>0.80</priority>
				</url>';
			}
		}
		if($news != NULL){
			foreach ($news as $key_news => $val_news) {
				$url_news = base_url().$val_news['alias'].'-p'.$val_news['id'].'.html';
				$xml .= '<url>
				  <loc>'.$url_news.'</loc>
				  <changefreq>always</changefreq>
				  <priority>0.80</priority>
				</url>';
			}
		}
		$xml .= '</urlset>';
		force_download('sitemap.xml', $xml);
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
			$data_update = array(
				'is_login' 			=> 	$this->input->post('is_login'),
				'is_cart' 			=> 	$this->input->post('is_cart'),
				'is_check_cart' 	=> 	$this->input->post('is_check_cart'),
				'is_menu_thuongmai' 	=> 	$this->input->post('is_menu_thuongmai'),
				'choose_width_slide' 	=> 	$this->input->post('choose_width_slide'),
				'col_slide' 	=> 	$this->input->post('col_slide'),
				'width_slide_img' 	=> 	$this->input->post('width_slide_img'),
				'is_search_auto' 	=> 	$this->input->post('is_search_auto'),
				'choose_width_menu' 	=> 	$this->input->post('choose_width_menu'),
				'is_type_footer' 	=> 	$this->input->post('is_type_footer'),
				'is_key_footer' 	=> 	$this->input->post('is_key_footer'),
				'is_type_home' 	=> 	$this->input->post('is_type_home'),
				'is_partner' 	=> 	$this->input->post('is_partner'),
			);
			$flag = $this->query_sql->edit('dev_config', $data_update, array('id' => 1));
		}
		$data['config'] = $this->query_sql->select_row('dev_config', '*', array('id' => 1));
		$data['title'] = 'Cấu hình hiển thị';
		$data['template'] = 'backend/system/config';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
}
