<?php 
class Master extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('madmin');

		if ($this->session->userdata('id_role') == null) { 
			redirect('Login/','refresh');
		}

		if ($this->session->userdata('id_role') != '1') { 
			redirect('Dashboard/','refresh');
		}
	}
	public function index()
	{
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin_master/index'); //Contoh
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}

	function simpanAdmin()
	{

		$this->form_validation->set_message('is_unique', '%s tersebut telah terdaftar.');
		$this->form_validation->set_message('numeric', '%s hanya boleh berisi angka.');
		$this->form_validation->set_message('min_length', '%s minimal harus berisi 10 karakter.');
		$this->form_validation->set_message('max_length', '%s yang di masukan melebihi batas.');
		$this->form_validation->set_message('valid_email', '%s yang dimasukan tidak valid.');


		$this->form_validation->set_rules('no_user', 'No User', 'required|trim|numeric|is_unique[tbuser.no_user]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbuser.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[50]|is_unique[tbuser.email]');
		$this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|numeric|min_length[10]|max_length[13]|is_unique[tbuser.no_telp]'); 


		if ($this->form_validation->run() == false) { 
			$this->session->set_flashdata('error_validation', validation_errors());
			redirect('Master/','refresh');
		}else{
			$this->madmin->simpanData();
		}
	}

	public function get($id)
	{
		$this->madmin->get_admin($id);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|numeric|min_length[10]|max_length[13]'); 
		
		if ($this->form_validation->run() == false) { 
			$this->session->set_flashdata('error_validation', validation_errors());
			redirect('Master/','refresh');
		}else{
			$this->madmin->update_admin($id);
		}
	}

	public function delete($id)
	{
		$this->madmin->delete_admin($id);
	}
}