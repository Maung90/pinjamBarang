<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class MPeminjam extends CI_Model 
{
    public function insert_peminjam()
    {
        $data = $_POST;
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $this->db->insert('tbpeminjam',$data);
        $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
            Data berhasil ditambahkan!
        </div>');
        redirect('Peminjam');
    }
}


/* End of file Model_peminjam_model.php and path \application\models\Model_peminjam_model.php */
