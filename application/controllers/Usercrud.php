<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercrud extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User_');
		$this->load->helper('url'); 
	}

	public function index()
	{
		$data['users'] = $this->User_->selectAll();
		$this->load->view('userview', $data);
	}

	public function guardar(){
		 $id = $this->input->post('id');
		$user['first_name'] = $this->input->post('first_name');
		$user['last_name'] = $this->input->post('last_name');
		$user['email']     = $this->input->post('email');
		$user['telephone'] = $this->input->post('telephone');
		$user['gender']    = $this->input->post('gender');
		    if ($id) {
        // Actualizar usuario
        $user['id'] = $id;
        $this->User_->actualizar($user);
		} else {
		// Guardar nuevo usuario
			$this->User_->guardar($user);
		}
		
		redirect('Usercrud');
	}
	public function editar(){
		$user['id'] 		= $this->input->post('id');
		$user['first_name'] = $this->input->post('first_name');
		$user['last_name']  = $this->input->post('last_name');
		$user['email']      = $this->input->post('email');
		$user['telephone']  = $this->input->post('telephone');
		$user['gender']     = $this->input->post('gender');
		$this->User_->actualizar($user);
		redirect('Usercrud');
	}

	public function eliminar($id = null) {
		if (!$id || !is_numeric($id)) {
			show_error('ID inválido');
		}
		$this->User_->eliminar(intval($id));
		redirect('Usercrud');
	}

}
