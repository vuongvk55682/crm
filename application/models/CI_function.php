<?php
	class CI_function extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
		function create_alias($bien)
		{
			if($bien != '')
			{
				$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
				"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
				,"ế","ệ","ể","ễ",
				"ì","í","ị","ỉ","ĩ",
				"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
				,"ờ","ớ","ợ","ở","ỡ",
				"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
				"ỳ","ý","ỵ","ỷ","ỹ",
				"đ",
				"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
				,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
				"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
				"Ì","Í","Ị","Ỉ","Ĩ",
				"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
				,"Ờ","Ớ","Ợ","Ở","Ỡ",
				"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
				"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
				"Đ",
				"!","@","#","$","%","^","&","*","(",")");
				
				$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
				,"a","a","a","a","a","a",
				"e","e","e","e","e","e","e","e","e","e","e",
				"i","i","i","i","i",
				"o","o","o","o","o","o","o","o","o","o","o","o"
				,"o","o","o","o","o",
				"u","u","u","u","u","u","u","u","u","u","u",
				"y","y","y","y","y",
				"d",
				"A","A","A","A","A","A","A","A","A","A","A","A"
				,"A","A","A","A","A",
				"E","E","E","E","E","E","E","E","E","E","E",
				"I","I","I","I","I",
				"O","O","O","O","O","O","O","O","O","O","O","O"
				,"O","O","O","O","O",
				"U","U","U","U","U","U","U","U","U","U","U",
				"Y","Y","Y","Y","Y",
				"D",
				"","","","","","","","","","");
				$bien = trim($bien);
				$bien = str_replace("/","",$bien);
				$bien = str_replace(":","",$bien);
				$bien = str_replace("!","",$bien);
				$bien = str_replace("(","",$bien);
				$bien = str_replace(")","",$bien);
				$bien = str_replace($marTViet,$marKoDau,$bien);
				$bien = str_replace("-","",$bien);
				$bien = str_replace("  "," ",$bien);
				$bien = str_replace(" ","-",$bien);
				$bien = str_replace("%","-",$bien);
				$bien = str_replace("+","-",$bien);
				$bien = str_replace("'","",$bien);
				$bien = str_replace("“","",$bien);
				$bien = str_replace("”","",$bien);
				$bien = str_replace(",","",$bien);
				$bien = str_replace(".","",$bien);
				$bien = str_replace('"',"",$bien);
				$bien = str_replace('\\','',$bien);
				$bien = str_replace('//','',$bien);
				$bien = str_replace('?','',$bien);
				$bien = str_replace('&','',$bien);
				$bien = strtolower($bien);
				return $bien;
			}
		}
		function del_string_special($bien)
		{
			if($bien != ''){
				$bien = trim($bien);
				$bien = str_replace("/","",$bien);
				$bien = str_replace(":","",$bien);
				$bien = str_replace("!","",$bien);
				$bien = str_replace("(","",$bien);
				$bien = str_replace(")","",$bien);
				$bien = str_replace("-","",$bien);
				$bien = str_replace("  "," ",$bien);
				$bien = str_replace("%","",$bien);
				$bien = str_replace("+","",$bien);
				$bien = str_replace("'","",$bien);
				$bien = str_replace("“","",$bien);
				$bien = str_replace("”","",$bien);
				$bien = str_replace(",","",$bien);
				$bien = str_replace('//','',$bien);
				$bien = str_replace('?','',$bien);
				$bien = str_replace('&','',$bien);
				$bien = str_replace('–','',$bien);
				return $bien;
			}
		}
		function stripUnicode($str){ 
			if(!$str) return false; 
				$unicode = array( 
				'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ', 
				'd'=>'đ', 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ', 
				'i'=>'í|ì|ỉ|ĩ|ị', 
				'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ', 
				'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 
				'y'=>'ý|ỳ|ỷ|ỹ|ỵ', ); 
				foreach($unicode as $nonUnicode=>$uni) 
				$str = preg_replace("/($uni)/i",$nonUnicode,$str); 
			return $str; 
		}
		function _substr($str, $length, $minword = 3)
		{
			$sub = '';
			$len = 0;
			foreach(explode(' ', $str) as $word)
			{
			    $part = (($sub != '')?' ':'').$word;
			    $sub .= $part;
			    $len += strlen($part);
			    if(strlen($word) > $minword && strlen($sub) >= $length)
			    {
			      	break;
			    }
			}
		    return $sub . (($len < strlen($str)) ? '...' : '');
		}
		function check_alias($id = 0, $alias = '', $name = '', $table = ''){
			$random = random_string('nozero', 3);
			if($id>0){
				$results = $this->db->select('id, name, alias')->from($table)->where('id',$id)->get()->row_array();
				if($results['name'] == $name){
					$alias = $results['alias'];
				}else{
					$result = $this->db->select('id')->from($table)->where('alias',$alias)->get()->result_array();
					if($result!=NULL){
						$alias = $alias.'-'.$random;
					}else{
						$alias = $alias;
					}
				}
			}else{
				$result = $this->db->select('id')->from($table)->where('alias',$alias)->get()->result_array();
				if($result!=NULL){
					$alias = $alias.'-'.$random;
				}else{
					$alias = $alias;
				}
			}
			return $alias;
		}
		function check_alias2($id = 0,$field = 0, $alias = '', $name = '', $table = ''){
			$random = random_string('nozero', 3);
			if($id>0){
				$results = $this->db->select('id, name, alias')->from($table)->where($field,$id)->get()->row_array();
				if($results['name'] == $name){
					$alias = $results['alias'];
				}else{
					$result = $this->db->select('id')->from($table)->where('alias',$alias)->get()->result_array();
					if($result!=NULL){
						$alias = $alias.'-'.$random;
					}else{
						$alias = $alias;
					}
				}
			}else{
				$result = $this->db->select('id')->from($table)->where('alias',$alias)->get()->result_array();
				if($result!=NULL){
					$alias = $alias.'-'.$random;
				}else{
					$alias = $alias;
				}
			}
			return $alias;
		}
		function get_title_by_alias($alias = '',$table = '', $data = NULL){
			$result = $this->db->select($data)->from($table)->where(array('alias' => $alias))->get()->row_array();
			return $result['title'];
		}
		function get_name_by_alias($alias = '',$table = '', $data = NULL){
			$result = $this->db->select($data)->from($table)->where(array('alias' => $alias))->get()->row_array();
			return $result['name'];
		}
		function get_keyword_by_alias($alias = '',$table = '', $data = NULL){
			$result = $this->db->select($data)->from($table)->where(array('alias' => $alias))->get()->row_array();
			return $result['meta_keyword'];
		}
		function get_description_by_alias($alias = '',$table = '', $data = NULL){
			$result = $this->db->select($data)->from($table)->where(array('alias' => $alias))->get()->row_array();
			return $result['meta_description'];
		}
		function get_content_by_alias($alias = '',$table = '', $data = NULL){
			$result = $this->db->select($data)->from($table)->where(array('alias' => $alias))->get()->row_array();
			return $result['content'];
		}
		function get_id_by_alias($alias = '',$table = '', $data = NULL){
			$result = $this->db->select($data)->from($table)->where(array('alias' => $alias))->get()->row_array();
			return $result['id'];
		}

		function get_row_by_id($id = '',$table = '', $data = NULL){
			$result = $this->db->select($data)->from($table)->where(array('id' => $id))->get()->row_array();
			return $result[$data];
		}
		function get_row_by_alias($alias = '',$table = '', $data = NULL){
			$result = $this->db->select($data)->from($table)->where(array('alias' => $alias))->get()->row_array();
			return $result[$data];
		}
		
		function send_mail($from = '',$to = '',$name_from = '',$subject = '',$message = '',$redirect = ''){
			
	        $this->load->library('email');
			// Cấu hình
			$config['protocol']     = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.webso.vn'; //neu sử dụng gmail
			$config['smtp_user']    = 'sendmail@webso.vn';
			$config['smtp_pass']    = 'sendmail@123';
			$config['smtp_port']    = '465';
			$config['charset']  	= 'utf-8';
			$config['mailtype'] 	= 'html';
			$config['wordwrap'] 	= TRUE;

			$this->email->initialize($config);
			 
			//cau hinh email va ten nguoi gui
			$this->email->from($from, $name_from);
			//cau hinh nguoi nhan
			$this->email->to($to);
			 
			$this->email->subject($subject);
			$this->email->message($message);
			
			//dinh kem file
			//$this->email->attach('/path/to/photo1.jpg');
			//thuc hien gui
			if ( ! $this->email->send())
			{
			    echo $this->email->print_debugger();die('hhh');
			}else{
			    redirect($redirect);
			}
	    }
	    function RandomString($length = 10) {
		    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
		function change_money($number , $type ='VND')
		{
			if($type == 'VND')
			{
				$billion = floor($number / 1000000000);


				$millions = $number % 1000000000;
				
				$million = floor($millions / 1000000);

				$thousands = $millions % 1000000;
				$thousand = floor($thousands / 1000);

				$str = '';
				if ($billion != 0)
				{
					$str .= $billion." tỉ ";
				}
				if ($million != 0)
				{
					$str .= $million." triệu ";
				}
				if ($thousand != 0)
				{
					$str .= $thousand." ngàn ";
				}

				return $str;
			}

			if ($type != 'VND')
				return $number.' '.$type;

		}
		function getListMenuId($parentid){
			$result[] = $parentid;
			$menu_child = $this->query_sql->select_array('dev_menu','id',array('publish' => 0, 'parentid' => $parentid));
			if($menu_child != NULL){
				foreach ($menu_child as $key => $val) {
					$result[] = $val['id'];
					$menu_child_2 = $this->query_sql->select_array('dev_menu','id',array('publish' => 0, 'parentid' => $val['id']));
					if($menu_child_2 != NULL){
						foreach ($menu_child_2 as $key2 => $val2) {
							$result[] = $val2['id'];
						}
					}
				}
			}
			return $result;
		}
		function getParentId($id,$parentid,$table){
			$data = $this->query_sql->select_row('dev_menu','parentid',array('publish' => 0, $parentid => $id));
			$result = $data['parentid'];
			return $result;
		}
		function ChangeToWeek($day){
			switch($day)
			{
				case 1:
					$thu='Monday';
					break;
				case 2:
					$thu='Tuesday';
					break;
				case 3:
					$thu='Wednesday';
					break;
				case 4:
					$thu='Thursday';
					break;
				case 5:
					$thu='Friday';
					break;
				case 6:
					$thu='Saturday';
					break;
				case 7:
					$thu='Sunday';
					break;
				return $result;
			}
			return $thu;
		}
		function CountMonthFromDate($date){
			$ar_date = explode('-',$date);
			$month = $ar_date[1];
			$month_now = date("m");
			$year_now = date("y");
			$year = $ar_date[0];
			$day_now = date("d");
			$day = $ar_date[2];
			$number_year = $year_now - $year;
			if($number_year > 0){
				$number_month = (($number_year * 12) - $month) + $month_now;
			}else{
				$number_month = $month_now - $month;
			}
			if($number_month > 0){
				$result = $number_month.' tháng trước';
			}else{
				$number_day = $day_now - $day;
				$result = $number_day.' ngày trước';
			}
			return $result;
		}
		function GetCityFromUser($userid){
			$address = $this->query_sql->select_row('dev_user_address','cityid',array('active' => 1,'userid' => $userid));
			$city = $this->query_sql->select_row('dev_city','name',array('id' => $address['cityid']));
			return $city['name'];
		}
		function GetBrandFromProductId($list_typeid){
			$ar_brandid = NULL;
			$product = $this->query_sql->select_array_wherein_distinct('brandid','dev_product',array('publish' => 0),'typeid',$list_typeid);
			if($product != NULL){
				foreach ($product as $key => $val) {
					$ar_brandid[] = $val['brandid'];
 				}
			}
			$brand = $this->query_sql->select_array_wherein_distinct_limit('id,name,alias,image','ci_image',array('publish' => 0,'type' => 'brand'),'id',$ar_brandid,7);
			return $brand;
		}
		function PriceShip($cityid,$districtid){
			$ship = $this->query_sql->select_row('dev_ship','id, number,price',array('publish' => 0,'cityid' => $cityid,'districtid' => $districtid));
			if($ship != NULL){
				$t=date('d-m-Y');
				$day = date("d");
				$month = date("m");
				$year = date("y");
				$week = date("w");
				$day_now = 0;
				if(($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) && ($day + $ship['number']) > 31){
					$day_now = ($day + $ship['number']) - 31;
					if($month == 12){
						$month_now = 1;
						$year = $year + 1;
					}else{
						$month_now = $month + 1;
					}
					
				}else{
					$day_now = $day + $ship['number'];
					$month_now = $month; 
				}
				if(($month == 4 || $month == 6 || $month == 9 || $month == 11) && ($day + $ship['number']) > 30){
					$day_now = ($day + $ship['number']) - 30;
					if($month == 12){
						$month_now = 1;
						$year = $year + 1;
					}else{
						$month_now = $month + 1;
					}
				}else{
					$day_now = $day + $ship['number'];
					$month_now = $month;
				}

				//Week
				if(($week + $ship['number']) > 7){
					$week = ($week + $ship['number']) - 7;
				}else{
					$week = $week + $ship['number'];
				}
				if(($week + 1) > 7){
					$week_next = 1;
				}else{
					$week_next = $week + 1;
				}
				$week_txt = $this->ChangeToWeek($week);
				$weeknext_txt = $this->ChangeToWeek($week_next);


				$day_next = $day_now + 1;
				$date = $day_now.'/'.$month_now.'/20'.$year;
				$date_next = $day_next.'/'.$month_now.'/20'.$year;

				$result = array(
					'date' => $date,
					'date_next' => $date_next,
					'week' => $week_txt,
					'week_next' => $weeknext_txt,
					'price' => $ship['price'],
				);
				return $result;
			}
		}
		function get_lang($lang){
			if(isset($lang) && $lang != ''){
				$this->session->set_userdata('lang', $lang);
			}else{
				$this->session->set_userdata('lang', 'vn');
			}
		}
	}
?>