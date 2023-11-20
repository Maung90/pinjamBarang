<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mpeminjam');
    }

    public function index()
    {
        $data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/peminjam/index');
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');   
    }

    public function insert()
    {
        $this->mpeminjam->insert_peminjam();
    }
}