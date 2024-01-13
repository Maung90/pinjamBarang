<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MUser extends CI_Model {

	// fungsi untuk melakukan search berdasarkan nama kategori
	public function searching($key = null)
	{
		if ($key === null) { 
			$this->db->select('tbkategori.nama_kategori,tbbarang.id_kategori,COUNT(tbbarang.id_kategori) AS jumlah_max, tbbarang.image');
			$this->db->from('tbbarang'); 
			$this->db->join('tbkategori', 'tbbarang.id_kategori = tbkategori.id_kategori', 'inner');
			$this->db->where('status_barang', 'tersedia');  
			$this->db->order_by('RAND()');
			$this->db->group_by('tbbarang.id_kategori'); 
			$query = $this->db->get()->result();
		}else{
			$this->db->select('tbkategori.nama_kategori,tbbarang.id_kategori,COUNT(tbbarang.id_kategori) AS jumlah_max, tbbarang.image');
			$this->db->from('tbbarang'); 
			$this->db->join('tbkategori', 'tbbarang.id_kategori = tbkategori.id_kategori', 'inner');
			$this->db->where('status_barang', 'tersedia');
			$this->db->like('nama_kategori',$key);
			$this->db->order_by('RAND()'); 
			$this->db->group_by('tbbarang.id_kategori'); 
			$query = $this->db->get()->result();
		}

		return $query;
	}   

	// fungsi untuk melakukan cekout barang yang telah di order
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

		// $id_Peminjaman = '2';

		// inisialisasi untuk input peminjaman 
		$no_identitas = $this->session->userdata('no_identitas');
		$waktu_pengembalian = $this->input->post('Waktu-Pengembalian');  

		$data = array(
			'id_peminjaman' => $idPeminjaman,
			'no_identitas' => $no_identitas,
			'waktu_pengembalian' => $waktu_pengembalian,
			'status_peminjaman' => 'pending',
		);

		$response = $this->db->insert('tb_peminjaman',$data);

		// inisialisasi untuk input history
		// 1. query ke tb order ambil id_kategori berdasarkan id_peminjam
		$query = $this->db->select('id_kategori,jumlah')->where('id_peminjam',$no_identitas)->get('tb_order')->result(); 
		
		// 2. query ke tb barang ambil kode_barang yang tersedia berdasarkan id_kategori dari tb order
		if ($response > 0) {  
			foreach ($query as $q) { 
				$q2 = $this->db->select('kode_barang,id_kategori')->where(['id_kategori' => $q->id_kategori, 
					'status_barang' => 'tersedia'])->get('tbbarang')->result(); 

				// di loop sebanyak jumlah yang di order
				for ($i=0; $i <$q->jumlah ; $i++) {  
					$history = array(
						'id_peminjaman' => $idPeminjaman,
						'kode_barang' => $q2[$i]->kode_barang);
					$this->db->insert('tb_history',$history);  
				} 

			}

			$this->session->set_flashdata('crud','<div class="alert alert-success" role="alert">
				Data sudah disimpan!
				</div>');


			// delete data berdasarkan id_peminjam
			$this->db->where('id_peminjam',$no_identitas);
			$response2 = $this->db->delete('tb_order');
			if ($response2) {
				$this->session->set_flashdata('checkout',$this->sweetalert->alert('success','Success!','Barang Berhasil Diproses!','',2000)); 
			}else{
				$this->session->set_flashdata('checkout',$this->sweetalert->alert('error','Oopss !!','Data Gagal Disimpan',"Jika gagal terus harap hubungi admin!",4500)); 
			}
			redirect('User/Checkout/', 'refresh'); 

		}else{
			$this->session->set_flashdata('checkout',$this->sweetalert->alert('error','Oopss !!','Data Gagal Disimpan',"Jika gagal terus harap hubungi admin!",4500)); 
		}
	}

// fungsi untuk membuat orderan atau barang yang akan dipinjam oleh user 
	public function prosesOrder()
	{

		$no_identitas = $this->session->userdata('no_identitas');
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'id_peminjam' => $no_identitas,
			'jumlah'      => $this->input->post('jumlah')
		);
		$response = $this->db->insert('tb_order',$data);
		if ($response > 0) {
			$jumlahOrder = $this->jumlahOrder($no_identitas);
			echo $jumlahOrder;
		}
	}


// fungsi untuk menghapus orderan atau barang yang telah diorder oleh user 
	public function deleteOrder()
	{

		$no_identitas = $this->session->userdata('no_identitas');
		$conditions = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'id_peminjam' => $no_identitas, 
		);
		$this->db->where($conditions);
		$response = $this->db->delete('tb_order'); 
		if ($response > 0) {
			$jumlahOrder = $this->jumlahOrder($no_identitas);
			echo $jumlahOrder;
		}
	}

// fungsi untuk menghitung jumlah berapa banyak jenis kategori yang telah user order
	public function jumlahOrder($id)
	{
		$jumlahOrder = intval($this->db->select('COUNT("id_peminjam") AS totalOrder')->where('id_peminjam',$id)->get('tb_order')->row()->totalOrder);
		return $jumlahOrder;
	}

// fungsi untuk menghitung total jumlah berapa banyak barang yang telah user order
	public function sumOrder($id)
	{	
		$this->db->select('SUM(tb_order.jumlah) as jumlah_total');
		$this->db->from('tb_order');
		$this->db->where('id_peminjam', $id);
		$query = $this->db->get()->result();
		return $query[0]->jumlah_total;
	}

// fungsi untuk mengambil dan men joinkan tb_order, tb_kategori dan tbbarang
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

// fungsi untuk mengurangi jumlah barang yang di order
	public function order_minus($id)
	{  
		$no_identitas = $this->session->userdata('no_identitas');
		$jumlah = intval($this->db->select('jumlah,id_kategori')->where('id_order',$id)->get('tb_order')->row()->jumlah);

		if ($jumlah > 0) {
			$response = $this->db->update('tb_order', ['jumlah' => $jumlah-1], ['id_order' => $id]);
		}else{
			$response = false;
		}
		$data = array(
			'jumlah_order' => intval($this->db->select('jumlah')->where(['id_order'=>$id,'id_peminjam'=>$no_identitas])->get('tb_order')->row()->jumlah), 
			'jumlah_total' => $this->sumOrder($no_identitas) );
		if ($response) {
			echo json_encode($data);
		}else{
			echo json_encode(['status' => false]);
		}
	}


// fungsi untuk menambahkan jumlah barang yang di order
	public function order_plus($id)
	{  
		$no_identitas = $this->session->userdata('no_identitas');
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
			'jumlah_order' => intval($this->db->select('jumlah')->where(['id_order'=>$id,'id_peminjam'=>$no_identitas])->get('tb_order')->row()->jumlah), 
			'jumlah_total' => $this->sumOrder($no_identitas) );
		
		if ($response) {
			echo json_encode($data);
		}else{
			echo json_encode(['status' => false]);
		}
	}

// fungsi untuk mengambil dan men joinkan tb_peminjaman dan tb_history
	public function infoStatus($no_identitas){
		$this->db->select("*");
		$this->db->from('tb_peminjaman'); 
		$this->db->join('tb_history', 'tb_history.id_peminjaman = tb_peminjaman.id_peminjaman', 'inner');
		$this->db->where('tb_peminjaman.no_identitas', $no_identitas);
		$query = $this->db->get()->result();
		return $query;
	}

	public function getPeminjaman()
	{
		 $data = $this->db->query('SELECT * FROM tb_peminjaman WHERE no_identitas = '.$this->session->userdata('no_identitas'). ' ORDER BY status_peminjaman DESC')->result();
		 return $data;
	}

// fungsi untuk menginsert data ke tbnote
	public function note($data){
		$response = $this->db->insert('tbnote',$data);
		if ($response) {
			$this->session->set_flashdata('notif',$this->sweetalert->alert('success','Success!','Barang Berhasil Diproses!','',3000)); 
		}else{
			$this->session->set_flashdata('notif',$this->sweetalert->alert('error','Oopss !!','Data Gagal Dikirim',"Jika gagal terus harap tunggu admin!",4500)); 
		}
	}

}

/* End of file MUser.php */
/* Location: ./application/models/MUser.php */