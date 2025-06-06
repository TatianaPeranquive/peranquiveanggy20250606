<?php
class User_ extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database('db_peranquive_anggy_20250606');
	}

	function guardar($user) {
		
			$this->db->insert('user_', $user);
		}

	function actualizar($user) {
		$this->db->where('id', $user['id']);
			$this->db->update('user_', $user);
	}

	function selectAll() {
			$this->db->select('*');
			$this->db->from('user_');
			return 	$this->db->get()->result();
		}


	function eliminar($id) {
		$this->db->where('id', $id);
		$this->db->delete('user_'); 
	}

}
?>