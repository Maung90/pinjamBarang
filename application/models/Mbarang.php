<?php
    class Mbarang extends CI_Model{
        function simpanBarang(){
            $kode_barang = $this->input->post('kode_barang');
            $nama_barang = $this->input->post('nama_barang');
            $merk_barang = $this->input->post('merk_barang');
            $status_barang = $this->input->post('status_barang');
            $image = $this->input->post('image');
            $id_kategori = 1;

            $data = array(
                'kode_barang' =>$kode_barang,
                'nama_barang' =>$nama_barang,
                'merk_barang' =>$merk_barang,
                'status_barang' =>$status_barang,
                'image' =>$image,
                'id_kategori' =>$id_kategori
        );
        $this->db->insert('tbbarang',$data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert"> Data Barang Disimpan </div>');
        redirect('Barang/index', 'refresh');
        }
        function hapusBarang($kode_barang)
		{
			$sql="delete from tbbarang where kode_barang='".$kode_barang."'";
			$this->db->query($sql);
			redirect('Barang/index','refresh');	
		}
    }
?>