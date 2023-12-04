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
		$data['jumlahOrder'] = $this->MUser->jumlahOrder(1);
		$data['title'] = 'Home';

		$this->load->view('partials/head',$data);
		$this->load->view('user/index',$data); 
		$this->load->view('partials/footer');
	} 
	public function checkout()
	{ 
		$data['data'] = $this->MUser->joinOrderBarang();
		$data['total'] = $this->MUser->sumOrder(1);
		$data['title'] = 'Home';
		
		$this->load->view('partials/head',$data);
		$this->load->view('user/checkout',$data); 
		$this->load->view('partials/footer');
	}

<<<<<<< HEAD
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

=======
<<<<<<< HEAD
	public function status(){
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('user/status');
		$this->load->view('partials/head');
		$this->load->view('partials/footer');
		$this->load->view('partials/copyright');

		
=======
>>>>>>> 893e33cfd7df23bd29de8cd95d5cbfcb3dedffb9
	public function proses_session()
	{
		$this->MUser->ProsesSession(); 
	}

	public function ProsesCheckout()
	{
		$this->MUser->ProsesCheckout();  
>>>>>>> bb96cace44561e17de7302901acbe4b7a6b88237
	}
}