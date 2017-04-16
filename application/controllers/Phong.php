<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phong extends My_controller {
	
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
		$data['title'] = 'Danh sách phòng';
		$data['keyword'] = $this->CI_function->get_keyword_by_alias($type_alias,'dev_menu','meta_keyword');
		$data['description'] = $this->CI_function->get_description_by_alias($type_alias,'dev_menu','meta_description');

		$data['daynow'] =  date("d/m/Y");
		$data['daynext'] = date('d/m/Y', strtotime(' +1 day'));

		if($this->input->post()){
			$data['ngaynhan'] = $this->input->post('ngaynhan');
			$data['ngaytra'] = $this->input->post('ngaytra');
			$data['nguoilon'] = $this->input->post('nguoilon'); 
			$data['treem'] = $this->input->post('treem');
			$data['dem'] = $this->input->post('dem');
		}

		$data['phong'] = $this->query_sql->select_array('dev_phong','id, name,image,songuoi,tiennghiid,gia',array('publish' => 0));
		if($data['phong'] != NULL){	
			foreach ($data['phong'] as $key => $val) {
				$ar_tiennghi = json_decode($val['tiennghiid'],true);
				if($ar_tiennghi != NULL){
					$ar_img = NULL;
					foreach ($ar_tiennghi as $key_tiennghi => $val_tiennghi) {
						$tiennghi = $this->query_sql->select_row('ci_image', 'image', array('id' => $val_tiennghi));
						$ar_img[] = $tiennghi['image'];
					}
					$data['phong'][$key]['tiennghi'] = $ar_img;
				}

				if($this->session->userdata('lang') != '' && $this->session->userdata('lang') == 'en'){
					$en_lang = $this->query_sql->select_row('dev_lang', 'name', array('parentid' => $val['id'],'type' => 'phong','lang' => 'en'));
					if($en_lang != NULL){
						$data['phong'][$key]['name'] = $en_lang['name'];
					}else{
						$data['phong'][$key]['name'] = '';
					}
					
				}
				
			}
		}

		
		
		$data['template'] = 'frontend/phong/index';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function booking()
	{
		$data_insert = array(
			'ngaynhan' 		=> 	$this->input->post('ngaynhan'),
			'ngaytra' 			=> 	$this->input->post('ngaytra'),
			'publish' 		=> 	1,
			'nguoilon' 		=> 	$this->input->post('nguoilon'),
			'treem' 		=> 	$this->input->post('treem'),
			'dem' 	=> 	$this->input->post('dem'),
			'fullname'		=>	$this->input->post('fullname'),
			'phone' 		=> 	$this->input->post('phone'),
			'email' 		=> 	$this->input->post('email'),
			'address' 		=> 	$this->input->post('address'),
			'request' 		=> 	$this->input->post('request'),
			'status' 		=> 	0,
			'loaiphongid' 	=> 	$this->input->post('loaiphongid'),
			'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
		);

		$flag = $this->query_sql->add('dev_booking', $data_insert);
		$insert_id = $flag['id_insert'];
		redirect('dat-phong-thanh-cong.html?id='.$insert_id.'');
	}
	public function success()
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Đặt phòng thành công';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];

		$id = $_GET['id'];
		$booking = $this->query_sql->select_row('dev_booking', 'ngaynhan,ngaytra,loaiphongid,nguoilon,treem,dem,fullname,email,phone,address,request', array('id' => $id));
		$ar_loaiphong = explode(',',$booking['loaiphongid']);
		if($ar_loaiphong != NULL){
			//$ar_loaiphong['info_phong'] = NULL;
			foreach ($ar_loaiphong as $key => $val) {
				$ar = explode('_',$val);

				$phong = $this->query_sql->select_row('dev_phong', 'name,image,tiennghiid,gia,songuoi', array('id' => $ar[1]));
				$phong['soluong'] = $ar[0];
				if($phong != NULL){
					$ar_tiennghi = json_decode($phong['tiennghiid'],true);
					if($ar_tiennghi != NULL){
						$ar_img = NULL;
						foreach ($ar_tiennghi as $key_tiennghi => $val_tiennghi) {
							$tiennghi = $this->query_sql->select_row('ci_image', 'image', array('id' => $val_tiennghi));
							$ar_img[] = $tiennghi['image'];
						}
						$phong['tiennghi'] = $ar_img;
					}
				}
				$loaiphong[] = $phong;
				
			}
		}
		$data['phong'] = $loaiphong;
		
		
		$data['booking'] = $booking;
		$data['template'] = 'frontend/phong/success';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
}