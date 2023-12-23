<?php 
/**
 * 
 */
class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mbarang');

		if ($this->session->userdata('id_role') == null) { 
			redirect('Login/','refresh');
		 }
		 
		 if ($this->session->userdata('id_role') != '2') { 
			redirect('Master/','refresh');
		 }
	}
    public function index()
	{
		$data['dataBarang'] = $this->mbarang->getBarang();
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/barang/index',$data); //Contoh
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}

	
	public function simpan() {
		// Konfigurasi upload
		$config['upload_path'] = './assets/img/imgBarang/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 5024; // 1 MB
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());
			// var_dump($config['upload_path']);
			// var_dump($error);
			// $this->load->view('admin/barang/index', $error);
			redirect('barang/');
		} else {
			$upload_data = $this->upload->data();

			$kode_barang = $this->input->post('kode_barang');
			$nama_barang = $this->input->post('nama_barang');
			$merk_barang = $this->input->post('merk_barang');
			$status_barang = $this->input->post('status_barang');
			$id_kategori = $this->input->post('id_kategori');

			// Data gambar untuk disimpan ke database
			// $data = array(
			//     'file_path' => $upload_data['full_path']
			// );
			$data = array(
				'kode_barang' =>$kode_barang,
				'nama_barang' =>$nama_barang,
				'merk_barang' =>$merk_barang,
				'status_barang' =>$status_barang,
				'image' =>  $upload_data['file_name'],
				'id_kategori' =>$id_kategori
			);

			// Simpan data ke database
			$this->mbarang->simpanBarang($data);

			// Redirect atau tampilkan pesan sukses
			redirect('barang/');
		}
	}

    // function simpan()
	// {
	// 	$this->mbarang->simpanBarang();
	// }
	public function getBarang()
	{
		
	}
	public function get($id)
    {
        $this->mbarang->get_barang($id);
    }
	public function update($id)
    {
        $this->mbarang->updateBarang($id);
    }

	function hapus($kode_barang)
	{
		$this->mbarang->hapusBarang($kode_barang);	
	}
}