<?php
	class Query_sql extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
		function add($table = '', $data = NULL){
			$this->db->insert($table, $data);
			$flag = $this->db->affected_rows();
			$insert_id = $this->db->insert_id();
			if($flag > 0){
				return array(
					'id_insert'	=> $insert_id,
					'type'		=> 'successful',
					'message'	=> 'Thêm dữ liệu thành công!',
				);
			}
			else
			{
				return array(
					'type'		=> 'error',
					'message'	=> 'Thêm dữ liệu không thành công!',
				);
			}
		}
		function adds($table = '', $data = NULL){
			$this->db->insert_batch($table, $data);
			$flag = $this->db->affected_rows();
			$insert_id = $this->db->insert_id();
			if($flag > 0){
				return array(
					'id_insert'	=> $insert_id,
					'type'		=> 'successful',
					'message'	=> 'Thêm dữ liệu thành công!',
				);
			}
			else
			{
				return array(
					'type'		=> 'error',
					'message'	=> 'Thêm dữ liệu không thành công!',
				);
			}
		}
		function edit($table = '', $data = NULL, $where = NULL){
			$this->db->where($where)->update($table, $data);
			$flag = $this->db->affected_rows();
			if($flag > 0){
				return array(
					'type'		=> 'successful',
					'message'	=> 'Cập nhật dữ liệu thành công!',
				);
			}
			else
			{
				return array(
					'type'		=> 'error',
					'message'	=> 'Cập nhật dữ liệu không thành công!',
				);
			}
		}
		function del($table = '', $where = NULL){
			$this->db->delete($table, $where); 
		}
		function select_like($table = '', $data = NULL, $like = NULL, $order = ''){
			$result = $this->db->select($data)->from($table);
			if($like!=''){
				$result = $this->db->like($like);
			}
			if($order!=''){
				$result = $this->db->order_by($order);
			}
			$result = $this->db->get()->result_array();
			return $result;
		}
		function select_row_like_position($table = '', $data = NULL, $like_field = '', $like_value = '', $like_pos = '', $order = ''){
			$result = $this->db->select($data)->from($table);
			if($like_field!=''){
				$result = $this->db->like($like_field,$like_value,$like_pos);
			}
			if($order!=''){
				$result = $this->db->order_by($order);
			}
			$result = $this->db->get()->row_array();
			return $result;
		}
		function select_like_where($table = '', $data = NULL,$where = NULL, $like = NULL, $order = ''){
			$result = $this->db->select($data)->from($table);
			if($like!=NULL){
				$result = $this->db->where($where);
			}
			if($like!=''){
				$result = $this->db->like($like);
			}
			if($order!=''){
				$result = $this->db->order_by($order);
			}
			$result = $this->db->get()->result_array();
			return $result;
		}
		function select_array($table = '', $data = NULL, $where = NULL, $order = '', $like = NULL){
			$result = $this->db->select($data)->from($table);
			if($where!=''){
				$result = $this->db->where($where);
			}
			if($like!=''){
				$result = $this->db->like($like);
			}
			if($order!=''){
				$result = $this->db->order_by($order);
			}
			$result = $this->db->get()->result_array();
			return $result;
		}
		function select_array_before($table = '', $data = NULL, $where = NULL, $field_like = '', $like = ''){
			$result = $this->db->select($data)->from($table);
			if($where!=''){
				$result = $this->db->where($where);
			}
			if($field_like != '' && $like != ''){
				$result = $this->db->like($field_like, $like, 'after');
			}
			$result = $this->db->get()->result_array();
			return $result;
		}

		function select_array_wherein($table = '', $data = NULL, $where = NULL,$wherein_field, $wherein_value, $order = '', $like = NULL){
			$result = $this->db->select($data)->from($table);
			if($where!=NULL){
				$result = $this->db->where($where);
			}
			if($wherein_field !='' && $wherein_value != NULL){
				$result = $this->db->where_in($wherein_field,$wherein_value);
			}
			if($like!=''){
				$result = $this->db->like($like);
			}
			if($order!=''){
				$result = $this->db->order_by($order);
			}
			$result = $this->db->get()->result_array();
			return $result;
		}
		function select_array_distinct($data = NULL, $table = '', $where = NULL){
			$result = $this->db->distinct();
			$result = $this->db->select($data)->from($table);
			if($where!=''){
				$result = $this->db->where($where);
			}
			$result = $this->db->get()->result_array();
			return $result;
		}
		function select_array_wherein_distinct($data = NULL, $table = '', $where = NULL,$field_where_in = '',$where_in = NULL){
			$result = $this->db->distinct();
			$result = $this->db->select($data)->from($table);
			if($where != NULL){
				$result = $this->db->where($where);
			}
			if($where_in != NULL){
				$result = $this->db->where_in($field_where_in,$where_in);
			}
			$result = $this->db->get()->result_array();
			return $result;
		}
		function select_array_wherein_distinct_limit($data = NULL, $table = '', $where = NULL,$field_where_in = '',$where_in = NULL,$limit = 0){
			$result = $this->db->distinct();
			$result = $this->db->select($data)->from($table);
			if($where != NULL){
				$result = $this->db->where($where);
			}
			if($where_in != NULL){
				$result = $this->db->where_in($field_where_in,$where_in);
			}
			if($limit > 0){
				$result = $this->db->limit($limit);
			}
			$result = $this->db->get()->result_array();
			return $result;
		}
		function select_row($table = '', $data = NULL, $where = NULL, $order = ''){
			$result = $this->db->select($data)->from($table);
			if($where!=''){
				$result = $this->db->where($where);
			}
			if($order!=''){
				$result = $this->db->order_by($order);
			}
			$result = $this->db->get()->row_array();
			return $result;
		}
		function total($table){
			return $this->db->from($table)->count_all_results();
		}
		function total_where($table,$where){
			return $this->db->from($table)->where($where)->count_all_results();
		}
		function total_where_in($table,$where,$where_in,$field_where_in){
			return $this->db->from($table)->where($where)->where_in($field_where_in,$where_in)->count_all_results();
		}
		function total_like($table, $where, $like_field, $like_value){
			return $this->db->from($table)->where($where)->like($like_field,$like_value)->count_all_results();
		}
		function total_like_wherein($table, $where, $like_field, $like_value,$wherein_field, $wherein_value){
			return $this->db->from($table)->where($where)->like($like_field,$like_value)->where_in($wherein_field,$wherein_value)->count_all_results();
		}
		function view($select, $table, $start, $limit){
			return $this->db->select($select)->from($table)->order_by('id desc')->limit($limit, $start)->get()->result_array();
		}
		function view_where($select, $table, $where, $start, $limit, $orderby = 'id desc'){
			return $this->db->select($select)->from($table)->where($where)->order_by($orderby)->limit($limit, $start)->get()->result_array();
		}
		function view_like($select, $table, $where, $start, $limit, $like_field, $like_value){
			return $this->db->select($select)->from($table)->order_by('id desc')->where($where)->like($like_field,$like_value)->limit($limit, $start)->get()->result_array();
		}
		function view_like_wherein($select, $table, $where, $start, $limit, $like_field, $like_value,$wherein_field, $wherein_value){
			return $this->db->select($select)->from($table)->order_by('id desc')->where($where)->like($like_field,$like_value)->where_in($wherein_field,$wherein_value)->limit($limit, $start)->get()->result_array();
		}
		
		function view_where_in($select, $table, $where, $where_in,$field_where_in, $start, $limit,$orderby = 'id desc'){
			return $this->db->select($select)->from($table)->order_by($orderby)->where($where)->where_in($field_where_in,$where_in)->limit($limit, $start)->get()->result_array();
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
		function check_code($code = '', $table = ''){
			$results = $this->db->select('id')->from($table)->where('code',$code)->get()->row_array();
			if($results!=NULL){
				return true;
			}else{
				return false;
			}
		}
		function check_parent($id = '', $table = ''){
			$results = $this->db->select('id_parent')->from($table)->where('id',$id)->get()->row_array();
			if($results!=NULL){
				$data = $results['id_parent'];
			}else{
				$data = '';
			}
			return $data;
		}
		function check_maxid($table = ''){
			$results = $this->db->select_max('id')->from($table)->get()->row_array();
			$data = $results['id'] + 1;
			return $data;
		}
	}
?>