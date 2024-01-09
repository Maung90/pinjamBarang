<?php 

class Kategori extends CI_Controller
{ 
	function __construct()
	{ 
		parent::__construct();
		$this->load->model('MKategori');

		if ($this->session->userdata('id_role') == null) { 
			redirect('Error/','refresh');
		} else if ($this->session->userdata('id_role') != '2') { 
			redirect('Master/','refresh');
		}
	} 

	public function insert()
	{
		// $this->form_validation->set_rules('nama_kategori', 'Name', 'required|trim|is_unique[tbkategori.nama_kategori]');
		// if ($this->form_validation->run() == false) {  
		// 	$this->index();
		// }else{
		$this->MKategori->insert();
		// }
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

	public function deleteData($id)
	{
		$this->MKategori->delete($id);
	}

	public function update($id)
	{
		// $this->form_validation->set_rules('nama_kategori', 'Name', 'required|trim|alpha|is_unique[tbkategori.nama_kategori]');
		// if ($this->form_validation->run() == false) {  
		// 	$this->index();
		// }else{
		$this->MKategori->update($id);
		// }
	}

	public function get_data($id)
	{ 
		$this->MKategori->get_data($id);
	}


}
