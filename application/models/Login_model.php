<?php
	class Login_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

        function validate($email,$password){
            $this->db->where('email',$email);
            $this->db->where('pword',$password);
            $result = $this->db->get('users',1);
            return $result;
          }


}