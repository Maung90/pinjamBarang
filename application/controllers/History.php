<?php

class History extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MHistory2');
		$this->load->model('Mlogin');

		if ($this->session->userdata('id_role') == null) { 
			redirect('Login/','refresh');
		 }
		 
		 if ($this->session->userdata('id_role') != '2') { 
			redirect('Master/','refresh');
		 }
	}

	public function index(){
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/history/index');
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');   
	}
	public function Pinjam(){
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$data['pinjam'] = $this->MHistory2->Pinjam();

		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/history/dipinjam',$data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');   
	} 

}
