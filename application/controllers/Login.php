<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
	}

	public function index(){
		$this->load->view('login');
	}

	public function proseslogin(){
		$this->Mlogin->cekLogin();
	}
	public function Logout(){
		$this->Mlogin->Logout(); 
	}

}
