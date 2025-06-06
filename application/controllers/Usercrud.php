<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercrud extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User_');
	}

	public function index()
	{
		$data['users'] = $this->User_->selectAll();
		var_dump($data);
		//$this->load->view('userview');
	}

	public function guardar(){
			$user['first_name'] = $this->input->post('first_name');
			$user['last_name'] = $this->input->post('last_name');
			$user['email']     = $this->input->post('email');
			$user['telephone'] = $this->input->post('telephone');
			$user['gender']    = $this->input->post('gender');	
			$this->User_->guardar($user);
	}
}
