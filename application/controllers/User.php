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
}