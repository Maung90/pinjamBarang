<?php 
/**
 * 
 */
class User extends CI_Controller
{
	
	public function index()
	{
		
		$data['title'] = 'Home';
		$this->load->view('partials/head',$data);
		$this->load->view('user/index'); 
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
}