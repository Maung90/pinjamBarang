<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{
		$data['title'] = "Page Not Found";
		$this->load->view('partials/head',$data);
		$this->load->view('404');
		$this->load->view('partials/footer');
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */