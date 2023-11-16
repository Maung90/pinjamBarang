<?php 
/**
 * 
 */
class Master extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('madmin');
	}
	public function index()
	{
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin_master/index'); //Contoh
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}

	function simpanAdmin()
	{
		$this->madmin->simpanData();
	}
}