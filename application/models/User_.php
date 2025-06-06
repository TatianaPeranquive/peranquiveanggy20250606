<?php
class User_ extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database('db_peranquive_anggy_20250606');
	}

	function guardarDatos($user) {
			$this->db->insert('user_', $user);
		}
}
?>