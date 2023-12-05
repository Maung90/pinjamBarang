<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class MPeminjam extends CI_Model 
{
    public function get_peminjam($id)
    {
        $this->db->where('no_identitas', $id);
        $data = $this->db->get('tbpeminjam')->result();
        echo json_encode($data);
    }

    public function insert_peminjam()
    {
        $data = $_POST;
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $data = $this->db->insert('tbpeminjam',$data);
        if($data){
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                Data berhasil ditambahkan!
            </div>');
        } else {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                Data gagal ditambahkan!
            </div>');
        }
        redirect('Peminjam');
    }

    public function update_peminjam($id)
    {
        $data = $_POST;
        $this->db->where('no_identitas',$id);
		$data = $this->db->update('tbpeminjam', $data);
        if($data){
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                Data berhasil diupdate!
            </div>');
        } else {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                Data gagal diupdate!
            </div>');
        }
        redirect('Peminjam');
    }

    public function delete_peminjam($id)
    {
        $this->db->where('no_identitas', $id);
        $data = $this->db->delete('tbpeminjam');
        if($data){
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert">
                Data berhasil didelete!
            </div>');
        } else {
            $this->session->set_flashdata('error','<div class="alert alert-danger" role="alert">
                Data gagal didelete!
            </div>');
        }
        redirect('Peminjam');
    }
}


/* End of file Model_peminjam_model.php and path \application\models\Model_peminjam_model.php */
