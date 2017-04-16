<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	public function __destruct(){
	}
	public function index($page = 1)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Quản lý album ảnh';
		$data['template'] = 'backend/album/index';

		$config = $this->query_sql->_pagination();
		$config['base_url'] = base_url().'admin/album/index/';
		$config['total_rows'] = $this->query_sql->total('dev_album');
		$config['uri_segment'] = 4;
		$config['per_page'] = 20;  
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$page = $page - 1;


		
		$this->pagination->initialize($config);
		$data['list_pagination'] = $this->pagination->create_links();

		if($config['total_rows']>0){
			$data['album'] = $this->query_sql->view('*','dev_album',($page * $config['per_page']),$config['per_page']);
			
			if(isset($data['album']) && $data['album']!=NULL){
				foreach ($data['album'] as $key => $val) {
					$type = $this->query_sql->select_row('dev_menu', 'name', array('id' => $val['typeid']));
					$data['album'][$key]['type_name'] = $type['name'];
				}
			}
		}
		
		$count_item = array(
			'sum' => $config['total_rows'],
			'sum_first'	=>	($page * $config['per_page']) + 1,
			'sum_end'	=>	($config['total_rows'] - ($config['per_page'] * $page))>=($page * $config['per_page'])?(($config['per_page'])*($page + 1)):($config['total_rows'] - ($config['per_page'] * $page))+($config['per_page'] * $page)
		);
		$data['count_item'] = $count_item;
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$data['title'] = 'Thêm album ảnh';
		$data['template'] = 'backend/album/add';
		if($this->input->post()){
			
			if($_FILES["image"]["name"]){
				$album_dir = 'upload/album/';
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
				$config['source_image'] = 'upload/album/'.$image_data['file_name'];
				$config['new_image'] = 'upload/album/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 200;
				$config['height'] = 300;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
				
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];
			}else{
				$name_img = '';
				$name_img_thumb = '';
			}
			$title = $this->input->post('title');
			$description = $this->input->post('meta_description');
			$keyword = $this->input->post('meta_keyword');
			if($title == ''){
				$title = $this->input->post('name');
			}
			if($description == ''){
				$description = $this->input->post('name').', '.$data['data_index']['title']['meta_description'];
			}
			if($keyword == ''){
				$keyword = $this->input->post('name').', '.$data['data_index']['title']['meta_keyword'];
			}
			
			$data_insert = array(
				'typeid' 			=> 	$this->input->post('typeid'),
				'name' 			=> 	$this->input->post('name'),
				'alias' 			=> 	$this->input->post('alias'),
				'publish' 		=> 	$this->input->post('publish'),
				'image'			=>	$name_img,
				'image_thumb'	=>	$name_img_thumb,
				'meta_keyword' 	=> 	$keyword,
				'title' 		=> 	$title,
				'meta_description' 	=> 	$description,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);

			
			//$flag = $this->query_sql->add('dev_album', $data_insert);
			$this->mongo_db->insert('dev_album',$data_insert);
			
			$id_insert = $flag['id_insert'];
			$data_insert_lang = array(
				'name' 			=> 	$this->input->post('en_name'),
				'parentid' 		=> 	$id_insert,
				'type' 			=> 	'album',
				'lang' 			=> 	'en',
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$this->query_sql->add('dev_lang', $data_insert_lang);
			//Update album image
			$arr_idalbumimg = $this->input->post('id_img');
			foreach ($arr_idalbumimg as $key_idalbumimg => $val_idalbumimg) {
				$data_update_album_image['albumid'] = $id_insert;
				$this->query_sql->edit('dev_album_image', $data_update_album_image, array('id' => $val_idalbumimg));
			}
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/album/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/album/index',$data);
			}	
		}
		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 3));
		if(isset($data['type']) && $data['type'] != NULL){
			foreach ($data['type'] as $key => $val) {
				$data['type'][$key]['type_child'] = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if($data['type'][$key]['type_child'] != NULL){
					foreach ($data['type'][$key]['type_child'] as $key_child2 => $val_child2) {
						$data['type'][$key]['type_child'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
						if($data['type'][$key]['type_child'][$key_child2]['child_3'] != NULL){
							foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
								$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
								if($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
									foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
										$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, sort');
									}
								}
							}
						}
					}
				}
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
		$data['album_img'] = $this->query_sql->select_array('dev_album_image', 'id,image', array('albumid' => $id));
		if($this->input->post()){
			$data = $this->query_sql->select_row('dev_album', 'image,image_thumb', array('id' => $id));
			
			
			//Update album image
			$arr_idalbumimg = $this->input->post('id_img');
			foreach ($arr_idalbumimg as $key_idalbumimg => $val_idalbumimg) {
				$data_update_album_image['albumid'] = $id;
				$this->query_sql->edit('dev_album_image', $data_update_album_image, array('id' => $val_idalbumimg));
			}
			if($_FILES["image"]["name"]){
				$file = "upload/album/".$data['image'];
				$file_thumb = "upload/album/thumb/".$data['image_thumb'];
				unlink($file);
				unlink($file_thumb);

				$album_dir = 'upload/album/';
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
				$config['source_image'] = 'upload/album/'.$image_data['file_name'];
				$config['new_image'] = 'upload/album/thumb/'.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 300;
				$config['height'] = 300;

				$name_img = explode('.',$image_data['file_name']);
				$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];

				$this->image_lib->initialize($config);
			    $this->image_lib->resize();

			    $name_img = $image_data['file_name'];

			}else{
				$name_img = $data['image'];
				$name_img_thumb = $data['image_thumb'];
			}
			$title = $this->input->post('title');
			$description = $this->input->post('meta_description');
			$keyword = $this->input->post('meta_keyword');
			if($title == ''){
				$title = $this->input->post('name');
			}
			if($description == ''){
				$description = $this->input->post('name').', '.$data['data_index']['title']['meta_description'];
			}
			if($keyword == ''){
				$keyword = $this->input->post('name').', '.$data['data_index']['title']['meta_keyword'];
			}

			$en_lang= $this->query_sql->select_row('dev_lang', 'id', array('parentid' => $id,'type' => 'album','lang' => 'en'));
			if(isset($en_lang) && $en_lang!=NULL){
				$data_update_lang = array(
					'name' 			=> 	$this->input->post('en_name'),
				);
				$this->query_sql->edit('dev_lang', $data_update_lang, array('parentid' => $id,'type' => 'album','lang' => 'en'));
			}else{
				$data_insert_lang = array(
					'name' 			=> 	$this->input->post('en_name'),
					'parentid' 		=> 	$id,
					'type' 			=> 	'album',
					'lang' 			=> 	'en',
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$this->query_sql->add('dev_lang', $data_insert_lang);
			}

			$data_update = array(
				'typeid' 			=> 	$this->input->post('typeid'),
				'name' 			=> 	$this->input->post('name'),
				'alias' 			=> 	$this->input->post('alias'),
				'publish' 		=> 	$this->input->post('publish'),
				'image'			=>	$name_img,
				'image_thumb'	=>	$name_img_thumb,
				'meta_keyword' 	=> 	$keyword,
				'title' 		=> 	$title,
				'meta_description' 	=> 	$description,
				'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->edit('dev_album', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thành công!',
				));
				redirect('admin/album/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thất bại!',
				));
				redirect('admin/album/index',$data);
			}	
		}
		$data['album'] = $this->query_sql->select_row('dev_album', '*', array('id' => $id));
		
		$data['en_lang'] = $this->query_sql->select_row('dev_lang', 'name', array('parentid' => $id,'type' => 'album','lang' => 'en'));
		$data['title'] = 'Cập nhật album ảnh';
		$data['template'] = 'backend/album/edit';
		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 3));
		if(isset($data['type']) && $data['type'] != NULL){
			foreach ($data['type'] as $key => $val) {
				$data['type'][$key]['type_child'] = $this->get_menu_child($val['id'],'id, name, created, publish, sort');
				if($data['type'][$key]['type_child'] != NULL){
					foreach ($data['type'][$key]['type_child'] as $key_child2 => $val_child2) {
						$data['type'][$key]['type_child'][$key_child2]['child_3'] = $this->get_menu_child($val_child2['id'],'id, name, created, publish, sort');
						if($data['type'][$key]['type_child'][$key_child2]['child_3'] != NULL){
							foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'] as $key_child3 => $val_child3) {
								$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] = $this->get_menu_child($val_child3['id'],'id, name, created, publish, sort');
								if($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] != NULL){
									foreach ($data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'] as $key_child4 => $val_child4) {
										$data['type'][$key]['type_child'][$key_child2]['child_3'][$key_child3]['child_4'][$key_child4]['child_5'] = $this->get_menu_child($val_child4['id'],'id, name, created, publish, sort');
									}
								}
							}
						}
					}
				}
			}
		}
		$this->load->view('backend/index', isset($data)?$data:'');
	}
	public function get_menu_child($parentid = 0,$field = ''){
		$data = $this->query_sql->select_array('dev_menu',$field,array('parentid' => $parentid));
		return $data;
	}
	public function alias()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$_title = $_POST['_title'];
		$id = isset($_POST['id'])?$_POST['id']:0;
		$alias = $this->CI_function->check_alias($id,$this->CI_function->create_alias($_title),'','dev_album');
		$arr_alias = array(
			'alias' => $alias
		);
		echo json_encode($arr_alias);
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
		$album_image = $this->query_sql->select_array('dev_album_image', 'id,image', array('albumid' => $id));
		if(isset($album_image) && $album_image!= NULL){
			foreach ($album_image as $key_album_image => $val_album_image) {
				$file = "upload/album/detail/".$val_album_image['image'];
				unlink($file);
				$this->query_sql->del('dev_album_image',array('id' => $val_album_image['id']));
			}
		}
		$data = $this->query_sql->select_row('dev_album', 'image,image_thumb', array('id' => $id));
		$file = "upload/album/".$data['image'];
		$file_thumb = "upload/album/thumb/".$data['image_thumb'];
		unlink($file);
		unlink($file_thumb);
		$this->query_sql->del('dev_album',array('id' => $id));
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
		$sql = $this->query_sql->select_row('dev_album','publish',array('id' => $id));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_album', $data_update, array('id' => $id));
		$data_sql = $this->query_sql->select_row('dev_album','publish',array('id' => $id));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/album/show', $data_publish);
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
		$sql = $this->query_sql->select_row('dev_album','publish',array('id' => $listid));
		if($sql['publish']==1){
			$publish = 0;
		}else{
			$publish = 1;
		}
		$data_update['publish'] = $publish;
		$this->query_sql->edit('dev_album', $data_update, array('id' => $listid));
		$data_sql = $this->query_sql->select_row('dev_album','publish',array('id' => $listid));
		$data_publish['publish'] = $data_sql['publish'];
		$this->load->view('backend/album/showall', $data_publish);
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
        	$album_image = $this->query_sql->select_array('dev_album_image', 'id,image', array('albumid' => $value));
			if(isset($album_image) && $album_image!= NULL){
				foreach ($album_image as $key_album_image => $val_album_image) {
					$file = "upload/album/detail/".$val_album_image['image'];
					unlink($file);
					$this->query_sql->del('dev_album_image',array('id' => $val_album_image['id']));
				}
			}
        	$data = $this->query_sql->select_row('dev_album', 'image,image_thumb', array('id' => $value));
			$file = "upload/album/".$data['image'];
			$file_thumb = "upload/album/thumb/".$data['image_thumb'];
			unlink($file);
			unlink($file_thumb);
        	$this->query_sql->del('dev_album',array('id' => $value));
        }
	}
	public function sort()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
    	$id = $_POST['id'];
    	$sort = $_POST['sort'];
		$data_update['sort'] = $sort;
		$this->query_sql->edit('dev_album', $data_update, array('id' => $id));
    }
    public function search()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
    	$keyword = $_POST['keyword'];
    	if($keyword != ''){
    		$data_like['name'] = $keyword;
    		$data['album'] = $this->query_sql->select_like('dev_album','id, created, name,publish,image_thumb,typeid,price,price_sale, is_hot, is_new, is_view,is_slider, is_sale, is_left,is_banchay,is_choose,banchay',$data_like,'');
    		if($data['album'] != NULL){
				foreach ($data['album'] as $key => $val) {
					$data['album'][$key]['number_cmmt'] = $this->query_sql->total_where('dev_album_comment',array('albumid' => $val['id']));
					$data['album'][$key]['count_album_album'] = $this->query_sql->total_where('dev_album_album',array('albumid' => $val['id']));
				}
			}
    		$data['type'] = $this->query_sql->select_array('dev_menu','id, name',array('parentid' => 0,'type' => 2));
			if($data['type'] != NULL){
				foreach ($data['type'] as $key_type => $val_type) {
					$data['type'][$key_type]['cate'] = $this->get_menu_child($val_type['id'],'id, name');
					if($data['type'][$key_type]['cate']){
						foreach ($data['type'][$key_type]['cate'] as $key_cate => $val_cate) {
							$data['type'][$key_type]['cate'][$key_cate]['item'] = $this->get_menu_child($val_cate['id'],'id, name');
						}
					}
				}
			}
		}
		$this->load->view('backend/album/search', isset($data)?$data:NULL);
    }
    
    public function dropzone(){
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$random = rand(10,1000);
		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			$new_fileName = explode('.',$fileName);
			$new_fileName = $new_fileName[0].'-'.$random.'.'.$new_fileName[1];
			$targetPath = getcwd() . '/upload/album/detail/';
			$targetFile = $targetPath . $new_fileName;
			move_uploaded_file($tempFile, $targetFile);


			$this->load->library('image_lib');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'upload/album/detail/'.$new_fileName;
			$config['new_image'] = 'upload/album/detail/thumb/'.$new_fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 300;
			$config['height'] = 300;

			$name_img = explode('.',$new_fileName);
			$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
			
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();

			$data_insert = array(
				'image' 		=> 	$new_fileName,
				'image_thumb' 	=> 	$name_img_thumb,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('dev_album_image', $data_insert);
			$arr_id = array(
				'id' => $flag['id_insert']
			);
			echo json_encode($arr_id);
		}
    }
    public function deldropzone(){
    	$image = $_POST['image'];
    	$image = substr($image,0,-4);
    	$album_image = $this->query_sql->select_row_like_position('dev_album_image', 'id,image', 'image',$image,'after','id desc');
    	$file = "upload/album/detail/".$album_image['image'];
		unlink($file);
    	$this->query_sql->del('dev_album_image',array('image' => $album_image['image']));
    }
    public function delimgdetail()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'admin/dang-nhap.html');
		}
		$data['data_index'] = $this->get_index();
		if($data['data_index']['permission'] == 0){
			redirect(base_url().'admin/');
		}
		$id = $_POST['id'];
		$album_image = $this->query_sql->select_row('dev_album_image', 'image', array('id' => $id));
		$file = "upload/album/detail/".$album_image['image'];
		unlink($file);
		$this->query_sql->del('dev_album_image',array('id' => $id));
	}
	
}
