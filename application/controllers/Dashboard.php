<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */ 
	
	 function __construct()
	 { 
		 parent::__construct();
		 if ($this->session->userdata('id_role') == null) { 
			redirect('Login/','refresh');
		 }
		 
		 if ($this->session->userdata('id_role') != '2') { 
			redirect('Master/','refresh');
		 }
	 } 
	function index()
	{
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$grafik = [];
		for ($i = 0; $i < 30; $i++) {
			$date = date('Y-m-d', strtotime("-$i days"));

			$this->db->where('DATE(waktu_pinjam)', $date);

			$peminjaman = $this->db->count_all_results('tb_peminjaman');

			$grafik[] = [
				'tanggal' => $date,
				'peminjaman' => $peminjaman,
			];
		}

		$data['grafik'] = $grafik;
		$data['url'] = "Dashboard";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side',$data);
		$this->load->view('partials/nav');
		$this->load->view('admin_master/dashboard',$data); //Contoh
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}
}
