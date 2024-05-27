<?php
	class ArticlesSubmitted_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_articlesSubmitted(){	


			$query = $this->db->get('article_submission');
			return $query->result_array();

			$query = $this->db->get_where(' articlesSubmitted', array('articlesSubmittedid' => $id));
			return $query->row_array();
    }
}	