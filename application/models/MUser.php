<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MUser extends CI_Model {

	public function searching($key)
	{
		$this->db->select('tbkategori.nama_kategori,tbbarang.id_kategori,COUNT(tbbarang.id_kategori) AS jumlah_max');
		$this->db->from('tbbarang'); 
		$this->db->join('tbkategori', 'tbbarang.id_kategori = tbkategori.id_kategori', 'inner');
		$this->db->where('status_barang', 'tersedia');
		$this->db->like('nama_kategori',$key);
		$this->db->group_by('tbbarang.id_kategori'); 
		$query = $this->db->get()->result();
		return $query;
	}  

	public function ProsesCheckout()
	{
		//Membuat kode peminjaman 
		$queryKodePeminjam = $this->db->query('SELECT id_peminjaman FROM tb_peminjaman ORDER BY id_peminjaman DESC LIMIT 1');  

		if ($queryKodePeminjam->num_rows() > 0) { 
			// mengambil nilai terakhir
			$row = $queryKodePeminjam->row();
			$lastCode = $row->id_peminjaman;

			 // mengubah angka dari nilai terakhir
			$lastNumber = intval(substr($lastCode, 4));
			// echo $lastNumber.'<br>=====<br>';
			$newNumber = $lastNumber+1;

			$newCodeNumber = str_pad($newNumber, 4, '0', STR_PAD_LEFT);
			// echo $newCodeNumber.'<br>=====<br>';

			$idPeminjaman = 'PNJ'.$newCodeNumber;
			// echo $newCode.'<br>=====<br>'; 
		}else{
			$idPeminjaman = 'PNJ0001';
		}  
		//tutup 

		// inisialisasi untuk input peminjaman 
		$no_Identitas = '1';
		$waktu_pengembalian = $this->input->post('Waktu_Pengembalian');  

		$data = array(
			'id_peminjaman' => $idPeminjaman,
			'no_identitas' => $no_Identitas,
			'waktu_pengembalian' => $waktu_pengembalian,
			'status_peminjaman' => 'pending',
		);

		$response = $this->db->insert('tb_peminjaman',$data);

		// inisialisasi untuk input history
		// 1. query ke tb order ambil id_kategori berdasarkan id_peminjam
		$query = $this->db->select('id_kategori')->where('id_peminjam',$no_Identitas)->get('tb_order')->result();

		// 2. query ke tb barang ambil kode_barang yang tersedia berdasarkan id_kategori dari tb order
		if ($response > 0) :
			foreach ($query as $q) { 
				$query2 = $this->db->select('kode_barang,id_kategori')->where(['id_kategori' => $q->id_kategori, 
					'status_barang' => 'tersedia'])->get('tbbarang')->result(); 

				foreach ($query2 as $q2) :
					$history = array(
						'id_peminjaman' => $idPeminjaman,
						'kode_barang' => $q2->kode_barang);
					$this->db->insert('tb_history',$history); 

				endforeach;
			}

			// mambuat trigger manual delete setelah insert

			$this->db->where('id_peminjam',$no_Identitas);
			$response2 = $this->db->delete('tb_order');
			if ($response2) {
				
				$this->session->set_flashdata('checkout',$this->sweetalert->alert('success','Success!','Barang Berhasil Diproses!','',3000)); 
			}
			redirect('User/Checkout/', 'refresh'); 


		else:
			$this->session->set_flashdata('checkout',$this->sweetalert->alert('error','Oopss !!','Data Berhasil Disimpan',"Jika gagal terus harap hubungi admin!",4500)); 
		endif;
	}

	public function prosesOrder()
	{

		$no_Identitas = 1;
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'id_peminjam' => $no_Identitas,
			'jumlah'      => $this->input->post('jumlah')
		);
		$response = $this->db->insert('tb_order',$data);
		if ($response > 0) {
			$jumlahOrder = $this->jumlahOrder($no_Identitas);
			echo $jumlahOrder;
		}
	}

	public function deleteOrder()
	{

		$no_Identitas = 1;
		$conditions = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'id_peminjam' => $no_Identitas, 
		);
		$this->db->where($conditions);
		$response = $this->db->delete('tb_order'); 
		if ($response > 0) {
			$jumlahOrder = $this->jumlahOrder($no_Identitas);
			echo $jumlahOrder;
		}
	}

	public function jumlahOrder($id)
	{
		$jumlahOrder = intval($this->db->select('COUNT("id_peminjam") AS totalOrder')->where('id_peminjam',$id)->get('tb_order')->row()->totalOrder);
		return $jumlahOrder;
	}

	public function sumOrder($id)
	{	
		$this->db->select('SUM(tb_order.jumlah) as jumlah_total');
		$this->db->from('tb_order');
		$this->db->where('id_peminjam', $id);
		$query = $this->db->get()->result();
		return $query[0]->jumlah_total;
	}

	public function joinOrderBarang()
	{
		$this->db->select('tbkategori.id_kategori,tb_order.jumlah,tb_order.id_order,tbkategori.nama_kategori,COUNT(tbbarang.id_kategori) AS jumlah_max');
		$this->db->from('tb_order'); 
		$this->db->join('tbkategori', 'tb_order.id_kategori = tbkategori.id_kategori', 'inner');
		$this->db->join('tbbarang', 'tb_order.id_kategori = tbbarang.id_kategori', 'inner');
		$this->db->where('tbbarang.status_barang', 'tersedia');
		$this->db->group_by('tbbarang.id_kategori');
		$this->db->group_by('tb_order.id_kategori');
		$query = $this->db->get();

		return $query->result();

	}
	public function order_minus($id)
	{  

		$jumlah = intval($this->db->select('jumlah,id_kategori')->where('id_order',$id)->get('tb_order')->row()->jumlah);

		if ($jumlah > 0) {
			$response = $this->db->update('tb_order', ['jumlah' => $jumlah-1], ['id_order' => $id]);
		}else{
			$response = false;
		}
		$data = array(
			'jumlah_order' => intval($this->db->select('jumlah')->where('id_order',$id)->get('tb_order')->row()->jumlah), 
			'jumlah_total' => $this->sumOrder(1) );
		if ($response) {
			echo json_encode($data);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function order_plus($id)
	{  

		$query = $this->db->select('jumlah,id_kategori')->where('id_order',$id)->get('tb_order')->row();
		$jumlah = intval($query->jumlah);

		$query2 = $this->db->select('COUNT(id_kategori) AS jumlah_max')->where(['id_kategori' => $query->id_kategori, 
			'status_barang' => 'tersedia'])->get('tbbarang')->row();
		$jumlah_max = intval($query2->jumlah_max);


		if ($jumlah >= 0 && $jumlah < $jumlah_max) {
			$response = $this->db->update('tb_order', ['jumlah' => $jumlah+1], ['id_order' => $id]);
		}else{
			$response = false;
		}

		$data = array(
			'jumlah_order' => intval($this->db->select('jumlah')->where('id_order',$id)->get('tb_order')->row()->jumlah), 
			'jumlah_total' => $this->sumOrder(1) );

		if ($response) {
			echo json_encode($data);
		}else{
			echo json_encode(['status' => false]);
		}
	}


}

/* End of file MUser.php */
			/* Location: ./application/models/MUser.php */