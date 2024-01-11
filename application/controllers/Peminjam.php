<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mpeminjam');
        
        if ($this->session->userdata('id_role') == null) { 
           redirect('Login/','refresh');
       }

       if ($this->session->userdata('id_role') != '2') { 
           redirect('Master/','refresh');
       }
   }

   public function index()
   {
    $data['title'] = "POLITEKNIK NEGERI BALI";
    $data['url'] = "Peminjam";
    $this->load->view('partials/head',$data);
    $this->load->view('partials/side',$data);
    $this->load->view('partials/nav');
    $this->load->view('admin/peminjam/index');
    $this->load->view('partials/copyright');
    $this->load->view('partials/footer');   
}

public function insert()
{
    $this->form_validation->set_message('is_unique', '%s tersebut telah terdaftar.');
    $this->form_validation->set_message('numeric', '%s hanya boleh berisi angka.');
    $this->form_validation->set_message('min_length', '%s minimal harus berisi 10 karakter.');
    $this->form_validation->set_message('max_length', '%s yang di masukan melebihi batas.');
    $this->form_validation->set_message('valid_email', '%s yang dimasukan tidak valid.');


    $this->form_validation->set_rules('no_identitas', 'No Identitas', 'required|trim|numeric|is_unique[tbpeminjam.no_identitas]');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[50]|is_unique[tbpeminjam.email]');
    $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|numeric|min_length[10]|max_length[13]|is_unique[tbpeminjam.no_telp]'); 


    if ($this->form_validation->run() == false) { 
        $this->session->set_flashdata('error_validation', validation_errors());
        redirect('Peminjam/','refresh');
    }else{
        $this->mpeminjam->insert_peminjam();
    }
}

public function get($id)
{
    $this->mpeminjam->get_peminjam($id);
}

public function update($id)
{ 
    $this->form_validation->set_message('numeric', '%s hanya boleh berisi angka.');
    $this->form_validation->set_message('min_length', '%s minimal harus berisi 10 karakter.');
    $this->form_validation->set_message('max_length', '%s yang di masukan melebihi batas.');
    $this->form_validation->set_message('valid_email', '%s yang dimasukan tidak valid.');


    $this->form_validation->set_rules('no_identitas', 'No Identitas', 'required|trim|numeric');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[50]');
    $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|numeric|min_length[10]|max_length[13]'); 

    if ($this->form_validation->run() == false) { 
        $this->session->set_flashdata('error_validation', validation_errors());
        redirect('Peminjam/','refresh');
    }else{
        $this->mpeminjam->update_peminjam($id);
    }
}

public function delete($id)
{
    $this->mpeminjam->delete_peminjam($id);
}
}