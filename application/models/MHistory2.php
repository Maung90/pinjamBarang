<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MHistory2 extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	public function Pinjam()
	{
		$this->db->select("DATE_FORMAT(tb_peminjaman.waktu_pinjam, '%d %b %Y %H:%i:%s') as waktu_pinjam2, DATE_FORMAT(tb_peminjaman.waktu_pengembalian, '%d %b %Y %H:%i:%s') as waktu_pengembalian2, tb_peminjaman.id_peminjaman,tb_peminjaman.no_identitas, tb_peminjaman.approved_by, tbuser.nama_user");
		$this->db->from('tb_peminjaman');
		$this->db->join('tbuser', 'tb_peminjaman.approved_by = tbuser.no_user', 'inner');
		$this->db->where('tb_peminjaman.status_peminjaman', 'dipinjam');
		$this->db->order_by('tb_peminjaman.waktu_pengembalian', 'ASC');
		$data = $this->db->get()->result();

		return $data;
	}

	public function Kembali()
	{
		$this->db->select("DATE_FORMAT(tb_peminjaman.waktu_pinjam, '%d %b %Y %H:%i:%s') as waktu_pinjam2, DATE_FORMAT(tb_peminjaman.waktu_pengembalian, '%d %b %Y %H:%i:%s') as waktu_pengembalian2, tb_peminjaman.id_peminjaman,tb_peminjaman.no_identitas, tb_peminjaman.approved_by, tbuser.nama_user");
		$this->db->from('tb_peminjaman');
		$this->db->join('tbuser', 'tb_peminjaman.approved_by = tbuser.no_user', 'inner'); 
		$this->db->where('tb_peminjaman.status_peminjaman', 'dikembalikan');
		$this->db->order_by('tb_peminjaman.waktu_pinjam', 'DESC'); 
		$data = $this->db->get()->result();

		return $data;
	}
	public function Report()
	{
		$data =	$this->db->query("SELECT DATE_FORMAT(tb_peminjaman.waktu_pinjam, '%d %b %Y') as waktu,COUNT(tb_history.id_peminjaman) AS jumlah, 						COUNT(tb_peminjaman.no_identitas) as peminjam
						FROM tb_peminjaman 
						INNER JOIN tb_history ON tb_history.id_peminjaman = tb_peminjaman.id_peminjaman
						WHERE status_peminjaman = 'dikembalikan' GROUP BY waktu ")->result();
		// $data = $this->db->;

		return $data;
	}
	public function Report2()
	{ 
		$data = $this->db->query("  
		SELECT tb_history.kode_barang,COUNT(tb_history.kode_barang) AS jumlah 
		FROM tb_history INNER JOIN tbbarang ON tbbarang.kode_barang = tb_history.kode_barang 
		INNER JOIN tb_peminjaman ON tb_peminjaman.id_peminjaman = tb_history.id_peminjaman 
		WHERE tb_peminjaman.waktu_pinjam >= CONCAT(YEAR(CURDATE()), '-', LPAD(MONTH(CURDATE()), 2, '0'), '-01') 
		AND tb_peminjaman.waktu_pinjam <= LAST_DAY(CURDATE()) 
		AND tb_peminjaman.status_peminjaman = 'dikembalikan' GROUP by tb_history.kode_barang")->result();

		return $data;
	}

	public function update($id, $status)
	{
		if ($status == "pending") {
			$data = $this->db->query('SELECT * FROM tb_history WHERE id_peminjaman = "' . $id . '"')->result();
			$kode_barang = $this->input->post('kode_barang');
			foreach ($data as $row => $value) {
				$this->db->where('id_history', $value->id_history)->update('tb_history', ['kode_barang' => $kode_barang[$row]]);
				$this->db->where('id_peminjaman', $id)->update('tb_peminjaman', ['status_peminjaman' => 'dipinjam', 'approved_by' => $this->session->userdata('no_user')]);
				$this->db->where('kode_barang', $kode_barang[$row])->update('tbbarang', ['status_barang' => 'dipinjam']);
			}
			redirect('History/Pending');
		} else if ($status == "dipinjam") {
			$condition = array('id_peminjaman' => $id);
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
			} else {
				$this->session->set_flashdata('notif', '<script>
				$(document).ready(function(){  
					toastr.Error("Gagal dikembalikan!", "Ooppss!", {
						closeButton: true,
						tapToDismiss: false,
						progressBar: true
						});
						});
						</script>');
			}
			redirect('History/Pinjam');
		} else {
			echo "Status tidak ditemukan";
		}
	}

	public function delete($id){
		$this->db->where('id_peminjaman', $id);
        $data = $this->db->delete('tb_peminjaman');
        if($data){
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                Data berhasil didelete!
            </div>');
        } else {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                Data gagal didelete!
            </div>');
        }
        redirect('History/pending');
	}
}

/* End of file MHistory2.php */
/* Location: ./application/models/MHistory2.php */