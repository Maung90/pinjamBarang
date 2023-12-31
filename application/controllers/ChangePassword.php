<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MChangePass');    
		$this->load->model('MUser');    
	}

	public function index()
	{ 			
		$data['title'] = 'Change Password';
		if ($this->session->userdata('no_identitas') != '' ) {

			$no_identitas = $this->session->userdata('no_identitas');
			$data['jumlahOrder'] = $this->MUser->jumlahOrder($no_identitas); 

			$this->load->view('partials/head',$data);
			$this->load->view('partials/navbarUser');
			$this->load->view('changePass',$data); 
			$this->load->view('partials/copyrightUser');
			$this->load->view('partials/footer');

		}else if ($this->session->userdata('no_user') != '') {
			$this->load->view('partials/head',$data);
			$this->load->view('partials/side');
			$this->load->view('partials/nav');
			$this->load->view('changePass'); 
			$this->load->view('partials/copyright');
			$this->load->view('partials/footer'); 
		}
	}
	public function getAcc()
	{ 
		if ($this->session->userdata('no_identitas') != '' ) {
			$id = $this->session->userdata('no_identitas');  

		}else if ($this->session->userdata('no_user') != '') {
			$id = $this->session->userdata('no_user'); 
		}
		$this->MChangePass->getAcc($id); 
	}
	public function update()
	{ 
		if ($this->session->userdata('no_identitas') != '' ) {
			$id = $this->session->userdata('no_identitas');  

		}else if ($this->session->userdata('no_user') != '') {
			$id = $this->session->userdata('no_user'); 
		}

		$this->MChangePass->updateAcc($id); 
	}

}

/* End of file ChangePassword.php */
/* Location: ./application/controllers/ChangePassword.php */