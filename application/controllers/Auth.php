<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends My_controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
		$this->load->library('encrypt');
		$this->load->library('facebook');
		$this->config->load('google');
		$this->config->load('facebook');
	}
	
	public function __destruct(){
	}
	public function login()
	{
		if($this->CI_auth->check_logged_user() != ''){
			redirect(base_url());
		}
		
		//Login Google
		require APPPATH .'third_party/Google/Google_Client.php';
		require APPPATH .'third_party/Google/contrib/Google_Oauth2Service.php';
		######### edit details ##########
		$clientId = $this->config->item('client_id', 'google');
		$clientSecret = $this->config->item('client_secret', 'google');
		$redirectUrl = $this->config->item('redirect_uri', 'google');
		$homeUrl = $this->config->item('home_uri', 'google');

		##################################

		$gClient = new Google_Client();
		$gClient->setApplicationName('Login to codexworld.com');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectUrl);

		$google_oauthV2 = new Google_Oauth2Service($gClient);
		$authUrl = $gClient->createAuthUrl();
		$data['authUrl'] = $authUrl;
		

		$data['data_index'] = $this->get_index();
		$data['title'] = 'Đăng nhập';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];


		//Login user
		if($this->input->post()){
			$email = $this->input->post('lg_email');
			$password = $this->input->post('lg_password');
			$login_array = array($email, $password);
			if($this->CI_auth->process_login_email($login_array))
			{
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				redirect(base_url().'dang-nhap.html');
			}
		}
		$data['template'] = 'frontend/auth/login';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function logingoogle(){
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Đăng ký thành viên';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];


		require APPPATH .'third_party/Google/Google_Client.php';
		require APPPATH .'third_party/Google/contrib/Google_Oauth2Service.php';

		######### edit details ##########
		$clientId = $this->config->item('client_id', 'google');
		$clientSecret = $this->config->item('client_secret', 'google');
		$redirectUrl = $this->config->item('redirect_uri', 'google');
		$homeUrl = $this->config->item('home_uri', 'google');
		$simple_api_key = $this->config->item('api_key', 'google');


		##################################

		$gClient = new Google_Client();
		$gClient->setApplicationName('story.dev');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectUrl);
		$gClient->setDeveloperKey($simple_api_key);

		//$gClient->addScope("https://www.googleapis.com/auth/userinfo.email");


		$google_oauthV2 = new Google_Oauth2Service($gClient);


		if(isset($_GET['code'])){
			$gClient->authenticate();
			//$_SESSION['token'] = $gClient->getAccessToken();
			$this->session->set_userdata('token', $gClient->getAccessToken());
			header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
		}

		if ($this->session->userdata('token') != NULL) {
			$gClient->setAccessToken($this->session->userdata('token'));
		}

		if ($gClient->getAccessToken()) {
			$userProfile = $google_oauthV2->userinfo->get();

			//Info user
			$email = $userProfile['email'];
			$fullname = $userProfile['name'];

			//Check email
			$user = $this->query_sql->select_row('ci_user', 'id,email,password', array('email' => $email));
			if($user != NULL){
				$this->session->set_userdata('logged_user_email', $user['id']);
			}else{
				$data_insert = array(
					'email' 		=> 	$email,
					'id_role' 		=> 	5,
					'fullname' 		=> 	$fullname,
					'active'		=>	0,
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$result = $this->query_sql->add('ci_user', $data_insert);
				$this->session->set_userdata('logged_user_email', $result['id_insert']);
			}
			if($this->CI_auth->check_logged_user() == '')
			{
				redirect(base_url());
			}else{
				redirect(base_url().'dang-nhap.html');
			}
		}

		$data['template'] = 'frontend/auth/logingoogle';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function loginfacebook(){
		$user = $this->facebook->getUser();
        if($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
                if($data['user_profile'] != NULL){
					$fullname = $data['user_profile']['name'];
					$facebookid = $data['user_profile']['id'];
					$user = $this->query_sql->select_row('ci_user', 'id', array('facebookid' => $facebookid));
					if($user != NULL){
						$this->session->set_userdata('logged_user_email', $user['id']);
					}else{
						$data_insert = array(
							'facebookid' 	=> 	$facebookid,
							'id_role' 		=> 	5,
							'fullname' 		=> 	$fullname,
							'active'		=>	0,
							'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
						);
						$result = $this->query_sql->add('ci_user', $data_insert);
						$this->session->set_userdata('logged_user_email', $result['id_insert']);
					}
					if($this->CI_auth->check_logged_user() == '')
					{
						redirect(base_url());
					}else{
						redirect(base_url().'dang-nhap.html');
					}
				}
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }
	}
	public function register()
	{
		if($this->CI_auth->check_logged_user() != ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Đăng ký thành viên';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];

		if($this->input->post()){
			$rand_salt = $this->CI_encrypts->genRndSalt();
			$encrypt_pass = $this->CI_encrypts->encryptUserPwd( $this->input->post('regis_password'),$rand_salt);

			//ReCaptcha
			// if(isset($_POST['g-recaptcha-response'])){
   //          	$captcha = $_POST['g-recaptcha-response'];
	  //       }
	  //       if(!$captcha){
	  //           $this->session->set_flashdata('message_flashdata', array(
			// 		'type'		=> 'error',
			// 		'message'	=> 'Bạn chưa xác nhận mã Captcha!',
			// 	));
	  //       }else{
            	$email = $this->input->post('regis_email');
            	$fullname = $this->input->post('fullname');
               	
				$data_insert = array(
					'password' 		=> 	$encrypt_pass,
					'sex' 			=> 	$this->input->post('sex'),
					'birthday' 		=> 	$this->input->post('birthday'),
					'email' 		=> 	$email,
					'id_role' 		=> 	5,
					'salt' 			=>  $rand_salt,
					'fullname' 		=> 	$fullname,
					'active'		=>	1,
					'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				
				$result = $this->query_sql->add('ci_user', $data_insert);
				$flag = $this->db->affected_rows();
				$id_insert = $result['id_insert'];
				redirect('auth/sucess');
				
				//Encrypt active
				// $chars = "abcdefghijkmnpqrstuvwxyz23456789";
				// $act_msg = $id_insert.'21'.'-'.$chars;
				// $encrypted_str = base64_encode(base64_encode($act_msg));


				//Sent mail
				// $mail_from = 'sendmail@webso.vn';
				// $mail_to = $email;
				// $mail_from_name = 'Mangahasu.com';
				// $subject = 'Kích hoạt tài khoản Hamtruyen';
				// $messages = 'Xin chào bạn '.$fullname.'.Xin hãy kích vào link bên dưới để kích hoạt tài khoản của bạn: <br />';
				// $messages .= base_url().'auth/active?w='.$encrypted_str.'&c='.$rand_salt;
				// $redirect = 'auth/sucess';
				// $this->CI_function->send_mail($mail_from,$mail_to,$mail_from_name,$subject,$messages,$redirect);
	        //}
		}

		$data['template'] = 'frontend/auth/register';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function checkemail(){
		$email = $_POST['email'];
		$user = $this->query_sql->select_row('ci_user', 'id', array('email' => $email));
		if($user != NULL){
			$result = array(
				'date_result' => 0
			);
		}else{
			$result = array(
				'date_result' => 1
			);
		}
		echo json_encode($result);
	}
	public function logout(){
  		//$this->facebook->destroySession();
		$this->session->unset_userdata('logged_user_email');
		redirect(base_url());
	}
	public function sucess(){
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Đăng ký thành công';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$data['template'] = 'frontend/auth/sucess';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function sucessactive(){
		if($this->CI_auth->check_logged_user() != ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Kích hoạt tài khoản thành công';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$data['template'] = 'frontend/auth/sucessactive';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function infouser()
	{
		if($this->CI_auth->check_logged_user() == ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thông tin tài khoản';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		
		//Load user
		$data['user'] = $this->query_sql->select_row('ci_user', 'email,sex,avatar,birthday,phone,fullname,avatar_thumb', array('id' => $userid));


		if($this->input->post()){
			$rand_salt = $this->CI_encrypts->genRndSalt();
			$encrypt_pass = $this->CI_encrypts->encryptUserPwd($this->input->post('password'),$rand_salt);


			//Recaptcha
			if(isset($_POST['g-recaptcha-response'])){
            	$captcha = $_POST['g-recaptcha-response'];
	        }
	        if(!$captcha){
	            $this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Bạn chưa xác nhận mã Captcha!',
				));
	        }else{
	            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfR2x0TAAAAAHP_5Gw9A0vEjZn2LbEdp0W8JD1l&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	            
	               	if($_FILES["avatar"]["name"]){
						$data = $this->query_sql->select_row('ci_user', 'avatar,avatar_thumb', array('id' => $id));
						$file = "upload/user/".$data['avatar'];
						$file_thumb = "upload/user/thumb/".$data['avatar_thumb'];
						unlink($file);
						unlink($file_thumb);

						$album_dir = 'upload/user/';
						if(!is_dir($album_dir)){ create_dir($album_dir); } 
						$config['upload_path']	= $album_dir;
						$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
						$config['max_size'] = 5120;
						
						$this->load->library('upload', $config); 
						$this->upload->initialize($config); 
						$image = $this->upload->do_upload("avatar");
						$image_data = $this->upload->data();

						$this->load->library('image_lib');
						$config['image_library'] = 'gd2';
						$config['source_image'] = 'upload/user/'.$image_data['file_name'];
						$config['new_image'] = 'upload/user/thumb/'.$image_data['file_name'];
						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width'] = 120;
						$config['height'] = 120;

						$name_img = explode('.',$image_data['file_name']);
						$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];

						$this->image_lib->initialize($config);
					    $this->image_lib->resize();

					    if($this->input->post('password') != ''){
					    	$data_edit = array(
					    		'email' 			=> 	$this->input->post('email'),
					    		'password' 		=> 	$encrypt_pass,
					    		'salt' 			=>  $rand_salt,
								'sex' 			=> 	$this->input->post('sex'),
								'birthday' 		=> 	$this->input->post('birthday'),
								'phone' 		=> 	$this->input->post('phone'),
								'fullname' 		=> 	$this->input->post('fullname'),
								'avatar'		=>	$image_data['file_name'],
								'avatar_thumb'	=>	$name_img_thumb,
								'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
							);
					    }else{
					    	$data_edit = array(
					    		'email' 		=> 	$this->input->post('email'),
								'sex' 			=> 	$this->input->post('sex'),
								'birthday' 		=> 	$this->input->post('birthday'),
								'phone' 		=> 	$this->input->post('phone'),
								'fullname' 		=> 	$this->input->post('fullname'),
								'avatar'		=>	$image_data['file_name'],
								'avatar_thumb'	=>	$name_img_thumb,
								'active'		=>	$this->input->post('active'),
								'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
							);
					    }
					}else{
						if($this->input->post('password') != ''){
							$encrypt_pass = $this->CI_encrypts->encryptUserPwd( $this->input->post('password'),$rand_salt);
							$data_edit = array(
								'email' 		=> 	$this->input->post('email'),
								'password' 		=> 	$encrypt_pass,
								'salt' 			=>  $rand_salt,
								'sex' 			=> 	$this->input->post('sex'),
								'birthday' 		=> 	$this->input->post('birthday'),
								'phone' 		=> 	$this->input->post('phone'),
								'fullname' 		=> 	$this->input->post('fullname'),
								'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
							);
						}else{
							$data_edit = array(
								'email' 		=> 	$this->input->post('email'),
								'sex' 			=> 	$this->input->post('sex'),
								'birthday' 		=> 	$this->input->post('birthday'),
								'phone' 		=> 	$this->input->post('phone'),
								'fullname' 		=> 	$this->input->post('fullname'),
								'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
							);
						}
					}
					$flag = $this->query_sql->edit('ci_user', $data_edit, array('id' => $userid));
					if($flag>0){
						$this->session->set_flashdata('message_flashdata', array(
							'type'		=> 'sucess',
							'message'	=> 'Cập nhật thành công!',
						));
						redirect('auth/infouser',isset($data)?$data:'');
					}
	        }
		}
		$data['template'] = 'frontend/auth/infouser';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function forgetpass(){
		if($this->CI_auth->check_logged_user() != ''){
			redirect(base_url());
		}
		if($this->input->post()){
			$email = $this->input->post('lg_email');
			$user = $this->query_sql->select_row('ci_user', 'id,fullname', array('email' => $email));
			$passnew = $email.'@321'; 
			$rand_salt = $this->CI_encrypts->genRndSalt();
			$encrypt_pass = $this->CI_encrypts->encryptUserPwd($passnew,$rand_salt);

			$data_edit = array(
	    		'password' 		=> 	$encrypt_pass,
	    		'salt' 			=>  $rand_salt
	    	);
	    	$flag = $this->query_sql->edit('ci_user', $data_edit, array('email' => $email));
			//Sent mail
			$mail_from = 'admin@mangahasu.com';
			$mail_to = $email;
			$mail_from_name = 'Hamtruyen';
			$subject = 'Thông tin mật khẩu';
			$messages = 'Xin chào bạn '.$user['fullname'].'.Thông tin mật khẩu của bạn là: <br />';
			$messages .= 'Mật khẩu: '.$passnew;
			$this->CI_function->send_mail($mail_from,$mail_to,$mail_from_name,$subject,$messages);

			redirect(base_url().'dang-nhap.html');

		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Quên mật khẩu';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$data['template'] = 'frontend/auth/forgetpass';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function active(){
		$id = $_GET['w'];
		$encrypted_str  = base64_decode(base64_decode($id));
		$arr_userid = explode('-',$encrypted_str);
		$userid =substr($arr_userid[0],0,-2);
		$data_edit['active'] = 0;
		$flag = $this->query_sql->edit('ci_user', $data_edit, array('id' => $userid));
		if($flag>0){
			$user = $this->query_sql->select_row('ci_user', 'email,password,active', array('id' => $userid));
			$email = $user['email'];
			$password = $user['password'];
			$login_array = array($email, $password);
			if($this->CI_auth->process_login_email($login_array))
			{
				redirect(base_url());
			}else{
				redirect('auth/sucessactive',isset($data)?$data:'');
			}
		}
	}
	public function updateuser()
	{
		if($this->CI_auth->check_logged_user() == ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thông tin tài khoản';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		
		//Load user
		$data['user'] = $this->query_sql->select_row('ci_user', 'email,sex,avatar,birthday,phone,fullname,avatar_thumb', array('id' => $userid));


		if($this->input->post()){
			$rand_salt = $this->CI_encrypts->genRndSalt();
			$encrypt_pass = $this->CI_encrypts->encryptUserPwd($this->input->post('password'),$rand_salt);
			//Recaptcha     	
			if($this->input->post('password') != ''){
				$encrypt_pass = $this->CI_encrypts->encryptUserPwd( $this->input->post('password'),$rand_salt);
				$data_edit = array(
					'password' 		=> 	$encrypt_pass,
					'salt' 			=>  $rand_salt,
					'sex' 			=> 	$this->input->post('sex'),
					'birthday' 		=> 	$this->input->post('birthday'),
					'fullname' 		=> 	$this->input->post('fullname'),
					'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
			}else{
				$data_edit = array(
					'sex' 			=> 	$this->input->post('sex'),
					'birthday' 		=> 	$this->input->post('birthday'),
					'phone' 		=> 	$this->input->post('phone'),
					'fullname' 		=> 	$this->input->post('fullname'),
					'updated'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
			}
			
			$flag = $this->query_sql->edit('ci_user', $data_edit, array('id' => $userid));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Cập nhật thành công!',
				));
				redirect('auth/updateuser',isset($data)?$data:'');
			}
		}
		$data['template'] = 'frontend/auth/updateuser';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function listaddress()
	{
		if($this->CI_auth->check_logged_user() == ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Số địa chỉ';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		
		$data['address'] = $this->query_sql->select_array('dev_user_address','*',array('userid' => $userid));
		if($data['address'] != NULL){
			foreach ($data['address'] as $key => $val) {
				$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $val['cityid']));
				$data['address'][$key]['city_name'] = $city['name'];

				$district = $this->query_sql->select_row('dev_district', 'name', array('id' => $val['districtid']));
				$data['address'][$key]['district_name'] = $district['name'];

				$ward = $this->query_sql->select_row('dev_ward', 'name', array('id' => $val['wardid']));
				$data['address'][$key]['ward_name'] = $ward['name'];
			}
		}


		$data['template'] = 'frontend/auth/listaddress';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function addaddress()
	{
		if($this->CI_auth->check_logged_user() == ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Tạo sổ địa chỉ';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();

		

		if($this->input->post()){
			$active = $this->input->post('active');
			if($active == 1){
				$data_update_active = array(
					'active' => 0
				);
				$result = $this->query_sql->edit('dev_user_address', $data_update_active,array('userid' => $userid));
			}else{
				$active = 0;
			}
			$data_insert = array(
				'fullname' 		=> 	$this->input->post('fullname'),
				'company' 		=> 	$this->input->post('company'),
				'phone' 		=> 	$this->input->post('phone'),
				'cityid' 		=> 	$this->input->post('cityid'),
				'districtid' 	=> 	$this->input->post('districtid'),
				'wardid' 		=> 	$this->input->post('wardid'),
				'address' 		=> 	$this->input->post('address'),
				'active'		=>	$active,
				'userid'		=>	$userid,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			
			$result = $this->query_sql->add('dev_user_address', $data_insert);
			redirect('auth/listaddress',isset($data)?$data:'');
		}

		
		//Load user
		$data['user'] = $this->query_sql->select_row('ci_user', 'email,sex,avatar,birthday,phone,fullname,avatar_thumb', array('id' => $userid));
		$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));
		$data['template'] = 'frontend/auth/addaddress';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function editaddress()
	{
		if($this->CI_auth->check_logged_user() == ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Cập nhật sổ địa chỉ';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();

		$id = $_GET['id'];
		

		if($this->input->post()){
			$active = $this->input->post('active');
			if($active == 1){
				$data_update_active = array(
					'active' => 0
				);
				$result = $this->query_sql->edit('dev_user_address', $data_update_active,array('active' => 1));
			}
			$data_update = array(
				'fullname' 		=> 	$this->input->post('fullname'),
				'company' 		=> 	$this->input->post('company'),
				'phone' 		=> 	$this->input->post('phone'),
				'cityid' 		=> 	$this->input->post('cityid'),
				'districtid' 	=> 	$this->input->post('districtid'),
				'wardid' 		=> 	$this->input->post('wardid'),
				'address' 		=> 	$this->input->post('address'),
				'active'		=>	$active,
				'userid'		=>	$userid,
				'created'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			
			$result = $this->query_sql->edit('dev_user_address', $data_update,array('id' => $id));
			redirect('auth/listaddress',isset($data)?$data:'');
		}

		
		//Load user
		$data['address'] = $this->query_sql->select_row('dev_user_address', '*', array('id' => $id));
		$data['city'] = $this->query_sql->select_array('dev_city','id, name',array('publish' => 0));
		$data['district'] = $this->query_sql->select_array('dev_district','id, name',array('publish' => 0));
		$data['ward'] = $this->query_sql->select_array('dev_ward','id, name',array('publish' => 0));
		$data['template'] = 'frontend/auth/editaddress';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function order()
	{
		if($this->CI_auth->check_logged_user() == ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thông tin đơn hàng';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();

		$order = $this->query_sql->select_array('dev_order','code,id,created',array('userid' => $userid));
		if($order != NULL){
			foreach ($order as $key => $val) {
				$cart = $this->query_sql->select_array('dev_cart','*',array('orderid' => $val['id']));
				if($cart != NULL){
					foreach ($cart as $key_cart => $val_cart) {
						$product = $this->query_sql->select_row('dev_product', 'name', array('id' => $val_cart['productid']));
						$cart[$key_cart]['product_name'] = $product['name'];
					}
				}
				$order[$key]['cart'] = $cart;
			}
		}
		$data['order'] = $order;
		
		$data['template'] = 'frontend/auth/order';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function orderdetail()
	{
		if($this->CI_auth->check_logged_user() == ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Chi tiết đơn hàng đơn hàng';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		$code = $_GET['code'];

		$order = $this->query_sql->select_row('dev_order', 'id,code,created,method', array('id' => $code));
		if($order != NULL){
			$info_address = $this->query_sql->select_row('dev_user_address', 'id,fullname,cityid,districtid,wardid,phone,address',array('userid' => $userid,'active' => 1));
			if($info_address != NULL){
				$city = $this->query_sql->select_row('dev_city', 'name', array('id' => $info_address['cityid']));
				$info_address['city_name'] = $city['name'];

				$district = $this->query_sql->select_row('dev_district', 'name', array('id' => $info_address['districtid']));
				$info_address['district_name'] = $district['name'];

				$ward = $this->query_sql->select_row('dev_ward', 'name', array('id' => $info_address['wardid']));
				$info_address['ward_name'] = $ward['name'];

				$data['ship'] = $this->CI_function->PriceShip($info_address['cityid'],$info_address['districtid']);

			}
			$order['address'] = $info_address;

			$cart = $this->query_sql->select_array('dev_cart','*',array('orderid' => $order['id']));
			if($cart != NULL){
				foreach ($cart as $key_cart => $val_cart) {
					$product = $this->query_sql->select_row('dev_product', 'id,alias,name', array('id' => $val_cart['productid']));
					$cart[$key_cart]['product_name'] = $product['name'];
					$cart[$key_cart]['product_id'] = $product['id'];
					$cart[$key_cart]['product_alias'] = $product['alias'];
				}
			}
			$order['cart'] = $cart;

			if($order['method'] == 1){
				$method = "Thanh toán tiền mặt khi nhận hàng";
			}else if($order['method'] == 2){
				$method = "Thanh toán bằng hình thức chuyển khoản";
			}else{
				$method = "Thanh toán Paypal";
			}
			$order['method'] = $method;

		}
		$data['order'] = $order;
		
		$data['template'] = 'frontend/auth/orderdetail';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
	public function account()
	{
		if($this->CI_auth->check_logged_user() == ''){
			redirect(base_url());
		}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Bảng Thông tin của tôi';
		$data['keyword'] = $data['data_index']['title']['meta_keyword'];
		$data['description'] = $data['data_index']['title']['meta_description'];
		$userid = $this->CI_auth->logged_id_user();
		
		$account = $this->query_sql->select_row('ci_user', 'fullname,email', array('id' => $userid));
		if($account != NULL){
			$order = $this->query_sql->select_row('dev_order','code,id,created',array('userid' => $userid));
			if($order != NULL){
				$cart = $this->query_sql->select_array('dev_cart','*',array('orderid' => $order['id']));
				if($cart != NULL){
					foreach ($cart as $key_cart => $val_cart) {
						$product = $this->query_sql->select_row('dev_product', 'name', array('id' => $val_cart['productid']));
						$cart[$key_cart]['product_name'] = $product['name'];
					}
				}
				$order['cart'] = $cart;
			}
			$account['order'] = $order;

			$account['address'] = $cart = $this->query_sql->view_where('*','dev_user_address',array('userid' => $userid),0,2);
		}
		$data['account'] = $account;
		
		$data['template'] = 'frontend/auth/account';
		$this->load->view('frontend/index', isset($data)?$data:NULL);
	}
}