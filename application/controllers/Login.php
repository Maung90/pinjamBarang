<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MChangePass');
		$this->load->model('Mlogin');
		if ($this->session->userdata('no_identitas') != null) { 
			redirect('/','refresh');
		}
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
		$data['title'] = 'Login | Pinjam Barang ';
		$this->load->view('partials/head',$data);
		$this->load->view('login');
		$this->load->view('partials/footer');
	}

	public function proseslogin(){
		$this->Mlogin->cekLogin();
	}

	public function Forgot_Password($url = null)
	{
		if ($url != null) {
			$data['url'] = $url;
		}else{ 
			$data['url'] = 'Forgot_Password';
			$this->session->sess_destroy();
		}
		
		$data['title'] = "Forgot Password";
		$this->load->view('partials/head',$data); 
		$this->load->view('ForgotPass',$data); 
		$this->load->view('partials/footer');
	}
	public function getEmail()
	{ 
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if ($this->form_validation->run() == false) {  
			$this->Forgot_Password();
		}else{
			$this->Mlogin->getEmail(); 
		}
	}

	public function Cek_kode()
	{  
		$this->Mlogin->Cek_kode();
	}

	public function UbahPassword()
	{  
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('confirm-password', 'Password', 'required|trim|matches[password]');
		if ($this->form_validation->run() == false) {  
			$this->Forgot_Password('Password');
		}else{
			$this->MChangePass->UbahPassword();
		}
	}




}
