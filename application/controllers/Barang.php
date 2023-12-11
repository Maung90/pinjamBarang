<?php 
/**
 * 
 */
class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mbarang');
	}
    public function index()
	{
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/barang/index'); //Contoh
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}
    function simpanB()
	{
		$this->mbarang->simpanBarang();
	}
	function hapusBarang($kode_barang)
	{
		$this->mbarang->hapusBarang($kode_barang);	
	}
}