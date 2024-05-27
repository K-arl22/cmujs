<?php
	class Author_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_author(){	


			$query = $this->db->get('authors');
			return $query->result_array();

			$query = $this->db->get_where('author', array('authorid' => $id));
			return $query->row_array();
    }
}