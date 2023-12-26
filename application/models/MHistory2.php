<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MHistory2 extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function Pinjam()
	{
		$this->db->select('*');
		$this->db->from('tb_peminjaman'); 
		$this->db->join('tbuser', 'tb_peminjaman.approved_by = tbuser.no_user', 'inner');
		$this->db->where('tb_peminjaman.status_peminjaman','dipinjam');
		$this->db->order_by('tb_peminjaman.waktu_pengembalian', 'ASC'); 
		$data = $this->db->get()->result(); 

		return $data;
	}

}

/* End of file MHistory2.php */
/* Location: ./application/models/MHistory2.php */