<?php
    class Madmin extends CI_Model{
        function simpanData(){
            $no_user = $this->input->post('no_user');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama_user = $this->input->post('nama_user');
            $no_telp = $this->input->post('no_telp');
            $alamat = $this->input->post('alamat');
            $unit_kerja = $this->input->post('unit_kerja');
            $id_role = 2;

            $data = array(
                'no_user' =>$no_user,
                'username' =>$username,
                'password' =>$password,
                'nama_user' =>$nama_user,
                'no_telp' =>$no_telp,
                'alamat' =>$alamat,
                'unit_kerja' =>$unit_kerja,
                'id_role' =>$id_role
        );
        $this->db->insert('tbuser',$data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert"> Data Disimpan </div>');
        redirect('Master/index', 'refresh');
        }
        
    }
?>