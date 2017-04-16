<?php
class CI_auth extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	//Login admin
	function process_login($login_array_input = NULL){
		if(!isset($login_array_input) OR count($login_array_input) != 2)
			return false;
			$username = $login_array_input[0];
			$password = $login_array_input[1];
			$query = $this->mongo_db->where(array('username' => $username))->where(array('active' => 0))->find_one('ci_user');
			if ($query != NULL)
			{
				$user_id 	= $query['_id'];
				$user_pass 	= $query['password'];
				$user_salt 	= $query['salt'];
				
				if($this->CI_encrypts->encryptUserPwd($password,$user_salt) === $user_pass){
					$this->session->set_userdata('logged_user', $user_id);
					return true;
			}
			return false;
		}
		return false;
	}
	
	function check_logged(){
		return ($this->session->userdata('logged_user'))?TRUE:FALSE;
	}
	function logged_id(){
		return ($this->check_logged())?$this->session->userdata('logged_user'):'';
	}
	//End login admin


	//Login user
	function process_login_email($login_array_input = NULL){
		if(!isset($login_array_input) OR count($login_array_input) != 2)
			return false;
			$email = $login_array_input[0];
			$password = $login_array_input[1];
			$query = $this->db->query("SELECT * FROM ci_user WHERE email= '".$email."' and active = 0 LIMIT 1");
			if ($query->num_rows() > 0)
			{
				$row = $query->row();
				$user_id = $row->id;
				$user_pass = $row->password;
				$user_salt = $row->salt;
				if($this->CI_encrypts->encryptUserPwd($password,$user_salt) === $user_pass){
					$this->session->set_userdata('logged_user_email', $user_id);
					return true;
				}
				return false;
			}
		return false;
	}
	function check_logged_user(){
		return ($this->session->userdata('logged_user_email'))?TRUE:FALSE;
	}
	function logged_id_user(){
		return ($this->check_logged_user())?$this->session->userdata('logged_user_email'):'';
	}

	//End login user
}
