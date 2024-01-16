<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MChangePass extends CI_Model {


	public function __construct()
	{
		parent::__construct();

	}
	public function getAcc($id)
	{
		$this->db->select('*'); 
		if ($this->session->userdata('no_identitas') != '' ) {
			$this->db->where('no_identitas',$id);
			$data = $this->db->get('tbpeminjam')->row();  
		}elseif ($this->session->userdata('no_user') != '') {
			$this->db->where('no_user',$id);
			$data = $this->db->get('tbuser')->row();  
		}

		$notelp = $this->input->post('notelp');
		$email = $this->input->post('email');

		if ($notelp != $data->no_telp || $email != $email) {
			echo 'false';
		}else{
			echo 'true';
		}
	}

	public function updateAcc($id)
	{
		$pass = password_hash($this->input->post('pass'), PASSWORD_BCRYPT); 
		$data = array(
			'password' => $pass,
		);


		if ($this->session->userdata('no_identitas') != '' ) {
			$this->db->where('no_identitas',$id);
			$response = $this->db->update('tbpeminjam', $data);
		}elseif ($this->session->userdata('no_user') != '') {
			$this->db->where('no_user',$id);
			$response = $this->db->update('tbuser', $data);
		}
		// var_dump($response);
		
		if($response){
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
				Data berhasil diupdate!
				</div>');
		} else {
			$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert">
				Data gagal diupdate!
				</div>');
		}
		redirect('ChangePassword/');
	}

	public function UbahPassword()
	{
		$pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT); 
		$data = array(
			'password' => $pass,
		);
		
		$peminjam = $this->db->select('no_identitas,email')->from('tbpeminjam')
		->where(['email' => $this->session->userdata('email'), 'no_identitas' =>$this->session->userdata('id')])->get(); 

		$user = $this->db->select('no_user,email')->from('tbuser')
		->where(['email' => $this->session->userdata('email'), 'no_user' =>$this->session->userdata('id')])->get(); 

		if ($peminjam->num_rows() >= 1) {
			$this->db->where('no_identitas',$this->session->userdata('id'));
			$response = $this->db->update('tbpeminjam', $data);

		}else if ($user->num_rows() >= 1) { 
			$this->db->where('no_user',$this->session->userdata('id'));
			$response = $this->db->update('tbuser', $data);
		}else{
			redirect('Login/','refresh');
		} 
		
		if($response){
			$this->session->set_flashdata('loginNotif','<div class="alert alert-success" role="alert">
				Data berhasil diupdate!
				</div>');
		} else {
			$this->session->set_flashdata('loginNotif','<div class="alert alert-danger" role="alert">
				Data gagal diupdate!
				</div>');
		}
		
		$this->session->sess_destroy();
		redirect('Login/','refresh');	
	}


}

/* End of file MChangePass.php */
/* Location: ./application/models/MChangePass.php */