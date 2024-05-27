<?php
	class Volume_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}


		//
		public function get_articles_by_volume($volumeid) {
			$this->db->where('volumeid', $volumeid);
			$query = $this->db->get('articles');
			return $query->result_array();
		}

		//Viewing Volumes
		public function get_volumes($volumeid = null) {

			if ($volumeid !== null) {
				$query = $this->db->get_where('volumes', array('volumeid' => $volumeid));
				return $query->row_array();
			} else {

				$query = $this->db->get('volumes');
				return $query->result_array();
			}
		}
		//Detailed View
		public function view($volumeid = NULL){
            $data['volume'] = $this->volume_model->get_volumes($volumeid);

            if(empty($data['volume'])){
                show_404();
            }

            // $this->load->view('templates/header2', $data);
            $data['vol_name'] = $data['volume']['vol_name'];
            // $this->load->view('templates/footer2', $data);
            
			$this->load->view('volumes/view', $data);

        }
		
		//Function to Update Volume
		public function update_volume($volumeid) {
			$data = array(
				'vol_name' => $this->input->post('vol_name'),
				'description' => $this->input->post('description')
			);
		
			$this->db->where('volumeid', $volumeid);
			return $this->db->update('volumes', $data);
		}


		//Function to Delete a Volume
		public function delete_volume($volumeid) {
			$this->db->where('volumeid', $volumeid);
			$this->db->delete('volumes');
	
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		//Function to Add a Volume
		public function add_volume(){
			$id = url_title($this->input->post('newvolume'));

			$data = array(
				'vol_name' => $this->input->post('volume_name'),
				'description' => $this->input->post('description'),
			);

			return $this->db->insert('volumes', $data);
		}
		


		
}