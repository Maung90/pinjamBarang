<?php

class History extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MHistory2');
		$this->load->model('Mlogin');

		if ($this->session->userdata('id_role') == null) { 
			redirect('Login/','refresh');
		 }
		 
		 if ($this->session->userdata('id_role') != '2') { 
			redirect('Master/','refresh');
		 }
	}

	public function pending(){
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/history/pending');
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');   
	}
	public function Pinjam(){
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$data['pinjam'] = $this->MHistory2->Pinjam();

		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/history/dipinjam',$data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');   
	} 

	public function Modal($id){
		$data['id_peminjaman'] = $id;
		$this->load->view('admin/history/modal', $data);   
	}

	public function update($id){
		$data = $this->db->query('SELECT * FROM tb_history WHERE id_peminjaman = "' . $id . '"')->result();
		$kode_barang = $this->input->post('kode_barang');
		$status_peminjaman = $this->input->post('status_peminjaman');

		foreach ($data as $row => $value) {
			$barang = array(
				'kode_barang' => $kode_barang[$row],
			);
			$this->db->where('id_history', $value->id_history)->update('tb_history', $barang);
			$peminjaman = [
				'status_peminjaman' => 'dipinjam',
			];
			$this->db->where('id_peminjaman', $id)->update('tb_peminjaman', $peminjaman);
		}
		redirect('History/Pending');
	}
}
