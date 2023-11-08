<?php 


/**
 * 
 */
class Kategori extends CI_Controller
{
	
	public function index()
	{
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/kategori/index');
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}

}

?>