<?php 


/**
 * 
 */
class Kategori extends CI_Controller
{ 
	function __construct()
	{ 
		parent::__construct();
		$this->load->model('MKategori');
	} 

	public function index()
	{
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav'); 
		$this->load->view('admin/kategori/index',$data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	} 

	public function get_data($id)
	{ 
		$this->MKategori->get_data($id);
	}
	public function insertData()
	{
		$this->MKategori->insert();
	}

	public function deleteData($id)
	{
		$this->MKategori->delete($id);
	}

	public function updateData()
	{
		$this->MKategori->update();
	}




	public function proses_session()
	{

		if (!$this->session->userdata('session')) {
			$temp[] = $this->input->post();
			$this->session->set_userdata('session',$temp);
		}else{
			$tempLama =  $this->session->userdata('session');
			$tempLama[] = $this->input->post(); 

			$this->session->set_userdata('session',$tempLama);
		}

		echo count($this->session->userdata('session'));

	}

}
