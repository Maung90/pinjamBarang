<?php
    class Mbarang extends CI_Model{
        function simpanBarang($data){
            
        $this->db->insert('tbbarang',$data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert"> Data Barang Disimpan </div>');
        redirect('Barang/', 'refresh');
        }

        public function get_barang($id)
        {
            $this->db->where('kode_barang', $id);
            $data = $this->db->get('tbbarang')->result();
            echo json_encode($data);
        }

        public function getBarang()
        {
            $this->db->select('*');
            $this->db->from('tbbarang'); 
            $this->db->join('tbkategori', 'tbbarang.id_kategori = tbkategori.id_kategori', 'inner');  
            $query = $this->db->get();

            return $query->result();
        }
        public function updateBarang($id)
        {
            $data = $_POST;
            $this->db->where('kode_barang',$id);
            $data = $this->db->update('tbbarang', $data);
            if($data){
                $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                    Data berhasil diupdate!
                </div>');
            } else {
                $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                    Data gagal diupdate!
                </div>');
            }
            redirect('Barang/', 'refresh');
        }

        function hapusBarang($kode_barang)
		{
			$sql="delete from tbbarang where kode_barang='".$kode_barang."'";
			$this->db->query($sql);
			redirect('Barang/','refresh');	
		}

    }
?>