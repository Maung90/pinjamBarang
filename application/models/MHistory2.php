<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MHistory2 extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function Pinjam()
	{
		$this->db->select("DATE_FORMAT(tb_peminjaman.waktu_pinjam, '%d %b %Y %H:%i:%s') as waktu_pinjam2, DATE_FORMAT(tb_peminjaman.waktu_pengembalian, '%d %b %Y %H:%i:%s') as waktu_pengembalian2, tb_peminjaman.id_peminjaman,tb_peminjaman.no_identitas, tb_peminjaman.approved_by, tbuser.nama_user");
		$this->db->from('tb_peminjaman'); 
		$this->db->join('tbuser', 'tb_peminjaman.approved_by = tbuser.no_user', 'inner');
		$this->db->where('tb_peminjaman.status_peminjaman','dipinjam');
		$this->db->order_by('tb_peminjaman.waktu_pengembalian', 'ASC'); 
		$data = $this->db->get()->result(); 

		return $data;
	}

	public function Kembali()
	{
		$this->db->select("DATE_FORMAT(tb_peminjaman.waktu_pinjam, '%d %b %Y %H:%i:%s') as waktu_pinjam2, DATE_FORMAT(tb_peminjaman.waktu_pengembalian, '%d %b %Y %H:%i:%s') as waktu_pengembalian2, tb_peminjaman.id_peminjaman,tb_peminjaman.no_identitas, tb_peminjaman.approved_by, tbuser.nama_user");
		$this->db->from('tb_peminjaman'); 
		$this->db->join('tbuser', 'tb_peminjaman.approved_by = tbuser.no_user', 'inner');
		$this->db->where('tb_peminjaman.status_peminjaman','dikembalikan');
		$this->db->order_by('tb_peminjaman.waktu_pinjam', 'DESC'); 
		$data = $this->db->get()->result(); 

		return $data;
	}

	public function update($id)
	{   
		$condition = array('id_peminjaman' => $id ); 
		$response = $this->db->update('tb_peminjaman', ['status_peminjaman' => 'dikembalikan'], $condition);

		if ($response) {
				// pertama ngambil data di tbhistory sesuai id_peminjaman
			$data = $this->db->query("SELECT * FROM tb_history WHERE id_peminjaman = '$id'")->result(); 
			// kedua kode_barang yang di tb_history tdi status_barang yang di tbbarang update jadi tersedia
			foreach ($data as $barang) {  
				$response2 = $this->db->update('tbbarang', ['status_barang' => 'tersedia'], ['kode_barang' => $barang->kode_barang]);
			}
		}

		if ($response2) {
			$this->session->set_flashdata('notif', '<script>
				$(document).ready(function(){ 
					toastr.success("Berhasil dikembalikan!", "Success", {
						closeButton: true,
						tapToDismiss: false,
						progressBar: true
						});
						});
						</script>');
		}else{
			$this->session->set_flashdata('notif', '<script>
				$(document).ready(function(){  
					toastr.Error("Berhasil dikembalikan!", "Ooppss!", {
						closeButton: true,
						tapToDismiss: false,
						progressBar: true
						});
						});
						</script>'); 
		}
		
			redirect('History/dipinjam/');
	}
}

/* End of file MHistory2.php */
/* Location: ./application/models/MHistory2.php */