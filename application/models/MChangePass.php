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
		var_dump($response);
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


}

/* End of file MChangePass.php */
/* Location: ./application/models/MChangePass.php */