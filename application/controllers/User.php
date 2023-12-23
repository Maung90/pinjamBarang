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
		$no_identitas = 1;

		$data['data'] = $this->MKategori->joinBarang();
		$data['jumlahOrder'] = $this->MUser->jumlahOrder($no_identitas);
		$data['title'] = 'Home';

		$this->load->view('partials/head',$data);
		$this->load->view('partials/navbarUser');
		$this->load->view('user/index',$data); 
		$this->load->view('partials/copyrightUser');
		$this->load->view('partials/footer');
	} 

	public function status(){
		$no_identitas = 1;

		$data['title'] = 'Status Pinjam';
		$data['jumlahOrder'] = $this->MUser->jumlahOrder($no_identitas);
		
		$this->load->view('partials/head',$data);
		$this->load->view('partials/navbarUser');
		$this->load->view('user/status',$data);
		$this->load->view('partials/copyrightUser');
		$this->load->view('partials/footer');
	}

	public function checkout()
	{ 

		$no_identitas = 1;

		$data['data'] = $this->MUser->joinOrderBarang();
		$data['total'] = $this->MUser->sumOrder($no_identitas);
		$data['jumlahOrder'] = $this->MUser->jumlahOrder($no_identitas);
		$data['title'] = 'Home';
		
		$this->load->view('partials/head',$data);
		$this->load->view('partials/navbarUser');
		$this->load->view('user/checkout',$data); 
		$this->load->view('partials/footer');
	}
	

	public function searching($keyword)
	{ 
		$data['data'] = $this->MUser->searching($keyword);
		echo $this->load->view('user/search',$data,true);
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


	// public function status(){
	// 	$this->load->view('partials/side');
	// 	$this->load->view('partials/nav');
	// 	$this->load->view('user/status');
	// 	$this->load->view('partials/head');
	// 	$this->load->view('partials/footer');
	// 	$this->load->view('partials/copyright');
	// }

		public function proses_session()
		{
			$this->MUser->ProsesSession(); 
	
		}

		

	public function ProsesCheckout()
	{
		$this->MUser->ProsesCheckout();
	}
}