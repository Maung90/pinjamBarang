<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class	MKategori extends CI_Model {

	public function insert()
	{

		$data = $_POST;

		$response = $this->db->insert('tbkategori',$data);
		if ($response > 0) {
			$this->session->set_flashdata('crud','<div class="alert alert-success" role="alert">
				Data berhasil disimpan!
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
		$countBarang = count($this->db->get('tbbarang')->result()); 

		if ($countBarang > 0) {
			$this->session->set_flashdata('crud','<div class="alert alert-danger" role="alert">
				Data gagal dihapus! Data masih terkoneksi dengan barang!
				</div>'); 		
		}else{ 
			$this->db->where('id_kategori',$id);
			$response = $this->db->delete('tbkategori');
			if ($response > 0) {
				$this->session->set_flashdata('crud','<div class="alert alert-success" role="alert">
					Data berhasil dihapus!
					</div>'); 		
			}else{ 
				$this->session->set_flashdata('crud','<div class="alert alert-danger" role="alert">
					Data gagal dihapus!
					</div>'); 	
			}
		}
		redirect('Kategori/', 'refresh');
	}

	public function update($id)
	{
		// $id = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		

		$condition = array('id_kategori' => $id );

		$this->db->where('id_kategori',$id);
		$response = $this->db->update('tbkategori', ['nama_kategori' => $nama_kategori], $condition);


		if ($response > 0) {
			$this->session->set_flashdata('crud','<div class="alert alert-success" role="alert">
				Data berhasil diedit!
				</div>'); 		
		}else{ 
			$this->session->set_flashdata('crud','<div class="alert alert-danger" role="alert">
				Data gagal diedit!
				</div>'); 	
		}
		redirect('Kategori/', 'refresh');
	}

	public function get_data($id){  
		$this->db->where('id_kategori',$id);
		$data = $this->db->get('tbkategori')->result();
		echo json_encode($data);
	}
	public function joinBarang()
	{
		
		$this->db->select('tbkategori.nama_kategori,tbbarang.id_kategori,COUNT(tbbarang.id_kategori) AS jumlah_max');
		$this->db->from('tbbarang'); 
		$this->db->join('tbkategori', 'tbbarang.id_kategori = tbkategori.id_kategori', 'inner');
		$this->db->where('status_barang', 'tersedia');
		$this->db->group_by('tbbarang.id_kategori');
		$query = $this->db->get();

		return $query->result();
	}

}





/* End of file Kategori.php */
/* Location: ./application/models/Kategori.php */