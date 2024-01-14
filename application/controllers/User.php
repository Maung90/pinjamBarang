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
		$no_identitas = $this->session->userdata('no_identitas');

		$data['data'] = $this->MKategori->joinBarang();
		$data['jumlahOrder'] = $this->MUser->jumlahOrder($no_identitas);
		$data['title'] = 'Home';
		$data['url'] = "Home";

		$this->load->view('partials/head',$data);
		$this->load->view('partials/navbarUser',$data);
		$this->load->view('user/index',$data); 
		$this->load->view('partials/copyrightUser');
		$this->load->view('partials/footer');
	} 

	public function status(){
		if ($this->session->userdata('no_identitas') == '') { 
			redirect('Login/','refresh');
		}
		$no_identitas = $this->session->userdata('no_identitas');

		$data['title'] = 'Status Pinjam';
		$data['data'] = $this->MUser->getPeminjaman();

		$data['jumlahOrder'] = $this->MUser->jumlahOrder($no_identitas);
		$data["datastatus"] = $this->MUser->infoStatus($no_identitas); 

		$data['jumlahOrder'] = $this->MUser->jumlahOrder($no_identitas);
		
		$data['url'] = "Status";

		$this->load->view('partials/head',$data);
		$this->load->view('partials/navbarUser',$data);
		$this->load->view('user/status',$data);
		// $this->load->view('partials/copyrightUser');
		$this->load->view('partials/footer');
	}

	public function checkout()
	{ 
		if ($this->session->userdata('no_identitas') == '') { 
			redirect('Login/','refresh');
		}

		$no_identitas = $this->session->userdata('no_identitas');

		$data['data'] = $this->MUser->joinOrderBarang();
		$data['total'] = $this->MUser->sumOrder($no_identitas);
		$data['jumlahOrder'] = $this->MUser->jumlahOrder($no_identitas);
		$data['title'] = 'Checkout';
		$data['url'] = "Checkout";
		
		$this->load->view('partials/head',$data);
		$this->load->view('partials/navbarUser',$data);
		$this->load->view('user/checkout',$data); 
		$this->load->view('partials/footer');
	}
	

	public function searching($keyword = null)
	{ 
		$data['data'] = $this->MUser->searching($keyword);
		echo $this->load->view('user/search',$data,true);
	}

	public function note()
	{
		// Konfigurasi upload
		$config['upload_path'] = './assets/img/bukti/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 5024; // 5 MB
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors()); 
			redirect('User/status/');
		} else {
			$upload_data = $this->upload->data();

			$id_peminjaman = $this->input->post('id_peminjaman'); 

			// Data gambar untuk disimpan ke database 
			$data = array(
				'id_peminjaman' =>$id_peminjaman, 
				'keterangan' =>$upload_data['file_name'] 
			);

			$this->MUser->note($data); 
			redirect('User/status/');
		} 
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

	public function ProsesCheckout()
	{
		$this->MUser->ProsesCheckout();
	}
}