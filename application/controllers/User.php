<?php 
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
		$data['jumlahOrder'] = $this->MUser->jumlahOrder(1);
		$data['title'] = 'Home';

		$this->load->view('partials/head',$data);
		$this->load->view('partials/navbarUser');
		$this->load->view('user/index',$data); 
		$this->load->view('partials/copyrightUser');
		$this->load->view('partials/footer');
	} 

	public function status(){
		$data['title'] = 'Status Pinjam';
		$data['jumlahOrder'] = $this->MUser->jumlahOrder(1);
		
		$this->load->view('partials/head',$data);
		$this->load->view('partials/navbarUser');
		$this->load->view('user/status',$data);
		$this->load->view('partials/copyrightUser');
		$this->load->view('partials/footer');
	}

	public function checkout()
	{ 
		$data['data'] = $this->MUser->joinOrderBarang();
		$data['total'] = $this->MUser->sumOrder(1);
		$data['jumlahOrder'] = $this->MUser->jumlahOrder(1);
		$data['title'] = 'Home';
		
		$this->load->view('partials/head',$data);
		$this->load->view('partials/navbarUser');
		$this->load->view('user/checkout',$data); 
		$this->load->view('partials/footer');
	}
	


	public function proses_order()
	{
		$this->MUser->prosesOrder(); 
	}

	public function delete_order()
	{
		$this->MUser->deleteOrder(); 
	}

	public function update_order_minus($id)
	{
		$this->MUser->order_minus($id); 
	}

	public function update_order_plus($id)
	{
		$this->MUser->order_plus($id); 
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