<?php
	class User_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		//Detailed view for user
		public function get_user_with_articles($id) {
			$this->db->select('users.*, IFNULL(articles.title, "No Articles Submitted") AS title');
			$this->db->from('users');
			$this->db->join('articles', 'articles.authorid = users.userid', 'left');
			$this->db->where('users.userid', $id);
			$query = $this->db->get();
			return $query->row_array();
		}
		//for editing image and deleting
		public function get_user_by_id($userid) {
			$this->db->where('userid', $userid);
			$query = $this->db->get('users');
			return $query->row_array(); 
		}
		

		//Viewing User
		public function get_users($id = null) {

			if ($id !== null) {
				$query = $this->db->get_where('users', array('userid' => $id));
				return $query->row_array();
			} else {

				$query = $this->db->get('users');
				return $query->result_array();
			}
		}

		//Detailed View for Researcher
		public function get_user_view(){    
			$this->db->select('users.*, articles.articleid, articles.title AS article_title, articles.keywords AS articles_keywords');
			$this->db->from('users');
			$this->db->join('articles', 'users.userid = articles.authorid', 'inner');
			
			$query = $this->db->get();
			
			return $query->result_array();
		}
		

		//Status Filtering
		public function filter_users_by_status($status) {

			$statusIds = [
				'Active' => 1,
				'Inactive' => 2
			];
	

			$statusId = isset($statusIds[$status]) ? $statusIds[$status] : null;
	
			if ($statusId) {
				$this->db->where('status', $statusId);
			}
	
			$query = $this->db->get('users');
			return $query->result_array();
		}

		//Role Filtering
		public function filter_users_by_role($role) {

			$roleIds = [
				'Evaluator' => 3,
				'Researcher/Contributor' => 2,
				'User' => 4
			];
	

			$roleId = isset($roleIds[$role]) ? $roleIds[$role] : null;
	
			if ($roleId) {
				$this->db->where('role', $roleId);
			}
	
			$query = $this->db->get('users');
			return $query->result_array();
		}

		//For Searching
		public function search_users_by_name($searchQuery) {
			$this->db->like('complete_name', $searchQuery);
			$query = $this->db->get('users');
			return $query->result_array();
		}

		
		//Adding User
		public function add_user($data) {
			$role = $this->input->post('role');
			if ($role == 'Evaluator') {
				$role_id = 3;
			} elseif ($role == 'Researcher') {
				$role_id = 2;
			} else {
				$role_id = 0; 
			}
		
			// Add role to the data array
			$data['role'] = $role_id;
		
			// Insert data into the database
			return $this->db->insert('users', $data);
		}
		
		

		//Function to Update User
		public function update_user($userid, $data) {
			$this->db->where('userid', $userid);
			return $this->db->update('users', $data);
		}
		


		//Function to Delete a User
		public function delete_user($userid) {
			$this->db->where('userid', $userid);
			$this->db->delete('users');
	
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
}