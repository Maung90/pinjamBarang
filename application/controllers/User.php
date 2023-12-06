<?php 
/**
 * 
 */
class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MKategori');
		$this->load->model('MUser');
		
	}

	public function index()
	{
		
		$data['data'] = $this->MKategori->joinBarang();

		$data['title'] = 'Home';
		$this->load->view('partials/head',$data);
		$this->load->view('user/index',$data); 
		$this->load->view('partials/footer');
	} 

	public function checkout()
	{


		$data['title'] = 'Home';
		$this->load->view('partials/head',$data);
		$this->load->view('user/checkout'); 
		$this->load->view('partials/footer');
	}

	public function status(){
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('user/status');
		$this->load->view('partials/head');
		$this->load->view('partials/footer');
		$this->load->view('partials/copyright');
	}

		

	public function proses_session()
	{
		$this->MUser->ProsesSession(); 
	}

	public function ProsesCheckout()
	{
		$this->MUser->ProsesCheckout();  
	}
}