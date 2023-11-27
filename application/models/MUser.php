<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MUser extends CI_Model {

	public function ProsesSession()
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

	public function ProsesCheckout()
	{
		$id_Peminjaman = '1';
		$no_Identitas = '1';
		$waktu_pengembalian = $this->input->post('Waktu-Pengembalian');
		$waktu_pinjam = $this->input->post('Waktu-Pengembalian');
		$jumlah = $this->input->post('jumlah');
		$status = 'pending';

		$data = array(
			'id_peminjaman' => '1',
			'no_identitas' => '1',
			'waktu_pengembalian' => $waktu_pengembalian,
			'waktu_pinjam' => $waktu_pinjam,
			'status_peminjaman' => 'Pending',
		);

		$history = array(
			'id_peminjaman' => '1' );


		$response = $this->db->insert('tb_peminjaman',$data);
		if ($response > 0) {
			$this->session->set_flashdata('crud','<div class="alert alert-success" role="alert">
				Data sudah disimpan!
				</div>'); 		
			for ($i=0; $i < $jumlah ; $i++) {  
				$this->db->insert('tb_history',$history);
			}
		}else{ 
			$this->session->set_flashdata('crud','<div class="alert alert-danger" role="alert">
				Data gagal disimpan!
				</div>'); 	
		} 

	}


}

/* End of file MUser.php */
/* Location: ./application/models/MUser.php */