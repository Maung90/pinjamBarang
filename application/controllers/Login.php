<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
		if ($this->session->userdata('id_role') != null) { 
			if ($this->session->userdata('id_role') == '1') {
				redirect('Master/','refresh');
			 }
			else if ($this->session->userdata('id_role') == '2') {
				redirect('Dashboard/','refresh');
			 }
			 else{
				redirect('User/','refresh');
			 }
		 }
	}

	public function index(){
		$this->load->view('login');
	}

	public function proseslogin(){
		$this->Mlogin->cekLogin();
	}

}
