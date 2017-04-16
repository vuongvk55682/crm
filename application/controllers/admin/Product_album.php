<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_album extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');

	}
	public function __destruct(){
	}
	public function index($id = 0,$page = 1)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Quản lý album sản phẩm';
		$data['id'] = $id;
		
		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/product_album/index/';
		$config['total_rows'] = $this->query_sql->total_where('dev_product_album',array('productid' => $id));
		$config['uri_segment'] = 4;  
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;
		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['product_album'] = $this->query_sql->view_where('id, created, publish,image','dev_product_album',array('productid' => $id),($page * $config['per_page']),$config['per_page']);
		}
		
		$data['template'] = 'backend/product_album/index';
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add($id)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Thêm album sản phẩm';
		$data['template'] = 'backend/product_album/add';
		$data['id'] = $id;
		if($this->input->post()){
			if($_FILES["image"]["name"]){
				$album_dir = 'upload/product/album/';
				if(!is_dir($album_dir)){ create_dir($album_dir); } 
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$config['max_size'] = 5120;

				
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				$image = $this->upload->do_upload("image");
				$image_data = $this->upload->data();


				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/product_album/'.$image_data['file_name'];
				$config['new_image'] = 'upload/product/album/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 250;
				$config['height'] = 250;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
				
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_images = $image_data['file_name'];

			}else{
				$name_images = '';
				$name_img_thumb = '';
			}
			$data_insert = array(
				'image'			=>	$name_images,
				'image_thumb'	=>	$name_img_thumb,
				'productid'		=>	$this->input->post('productid'),
				'publish'		=>	$this->input->post('publish'),
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			
			$flag = $this->query_sql->add('dev_product_album', $data_insert);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/product_album/index/'.$id.'',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/product_album/index/'.$id.'',$data);
			}
		}
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function edit($id=0)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['product_album'] = $this->query_sql->select_row('dev_product_album', 'id,image,productid, created, publish', array('id' => $id));
		if($this->input->post()){
			if($_FILES["image"]["name"]){

				$data = $this->query_sql->select_row('dev_product_album', 'image,image_thumb', array('id' => $id));
				$file = "upload/product/album/".$data['image'];
				
				unlink($file);
				

				$album_dir = 'upload/product/album/';
				if(!is_dir($album_dir)){ create_dir($album_dir); } 
				$config['upload_path']	= $album_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$config['max_size'] = 5120;
				
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				$image = $this->upload->do_upload("image");
				$image_data = $this->upload->data();

				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/product_album/'.$image_data['file_name'];
				$config['new_image'] = 'upload/product/album/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 250;
				$config['height'] = 250;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];

				$this->image_lib->initialize($config);
			    $this->image_lib->resize();

				$name_images = $image_data['file_name'];

			}else{
				$name_images = $data['image'];
				$name_img_thumb = $data['image_thumb'];
			}
			$data_update = array(
				'image'			=>	$name_images,
				'image_thumb'	=>	$name_img_thumb,
				'productid'		=>	$this->input->post('productid'),
				'publish'		=>	$this->input->post('publish'),
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600),
			);
			$flag = $this->query_sql->edit('dev_product_album', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/product_album/index/'.$data['product_album']['productid'].'',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/product_album/index',$data);
			}	
		}
		
		$data['title'] = 'Cập nhật album sản phẩm';
		$data['template'] = 'backend/product_album/edit';
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$data = $this->query_sql->select_row('dev_product_album', 'image,image_thumb', array('id' => $id));
		$file = "upload/product/album/".$data['image'];
		unlink($file);
		$this->query_sql->del('dev_product_album',array('id' => $id));
	}
	public function show()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$sql = $this->query_sql->select_row('dev_product_album','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_product_album', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_product_album','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/product_album/show', $data_publish);
	}
	public function showall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$listid = $_POST['listid'];
		$sql = $this->query_sql->select_row('dev_product_album','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_product_album', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_product_album','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/product_album/showall', $data_publish);
	}
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $value) {
			$data = $this->query_sql->select_row('dev_product_album', 'image,image_thumb', array('id' => $value));
			$file = "upload/product/album/".$data['image'];
			unlink($file);
        	$this->query_sql->del('dev_product_album',array('id' => $value));
        }
	}
	
}
