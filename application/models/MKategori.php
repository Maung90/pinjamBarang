<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class	MKategori extends CI_Model {

	public function insert()
	{

		$data = $_POST;

		$response = $this->db->insert('tbkategori',$data);
		if ($response > 0) {
			$this->session->set_flashdata('crud','<div class="alert alert-success" role="alert">
				Data sudah disimpan!
				</div>'); 		
		}else{ 
			$this->session->set_flashdata('crud','<div class="alert alert-danger" role="alert">
				Data gagal disimpan!
				</div>'); 	
		}
		redirect('Kategori/', 'refresh');
		
	}
	public function delete($id)
	{
		$this->db->where('id_kategori',$id);
		$response = $this->db->delete('tbkategori');
		if ($response > 0) {
			$this->session->set_flashdata('crud','<div class="alert alert-success" role="alert">
				Data sudah dihapus!
				</div>'); 		
		}else{ 
			$this->session->set_flashdata('crud','<div class="alert alert-danger" role="alert">
				Data gagal dihapus!
				</div>'); 	
		}
		redirect('Kategori/', 'refresh');
	}

}

/* End of file Kategori.php */
/* Location: ./application/models/Kategori.php */