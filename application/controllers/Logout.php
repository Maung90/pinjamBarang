<?php

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
	}

	public function index(){
		$this->Mlogin->logout();
	}

}
