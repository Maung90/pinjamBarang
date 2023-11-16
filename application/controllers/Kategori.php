<?php 


/**
 * 
 */
class Kategori extends CI_Controller
{ 
	function __construct()
	{ 
		parent::__construct();
		$this->load->model('MKategori');
	}
// =======
// 	public function __construct()
//     {
//         parent::__construct();
// 		$this->load->model('M_Datatables');
//     }

// >>>>>>> f984095bffdba630e69c2ac1d4dde606e6dda58c
	public function index()
	{
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/kategori/index');
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');
	}
 
	public function insertData()
	{
		$this->MKategori->insert();
	}

	public function deleteData($id)
	{
		$this->MKategori->delete($id);
	}



	public function proses_session()
	{

		if (!$this->session->userdata('session')) {
			$temp[] = $this->input->post();
			$this->session->set_userdata('session',$temp);
		}else{
			$tempLama =  $this->session->userdata('session');
			$tempLama[] = $this->input->post(); 

			$this->session->set_userdata('session',$tempLama);
		}

		echo count($this->session->userdata('session'));

	}

// =======
// 	function get_data_user()
//         {
//                 $list = $this->User_model->get_datatables();
//                 $data = array();
//                 $no = $_POST['start'];
//                 foreach ($list as $field) {
//                         $no++;
//                         $row = array();
//                         $row[] = $no;
//                         $row[] = $field->user_nama;
//                         $row[] = $field->user_email;
//                         $row[] = $field->user_alamat;
 
//                         $data[] = $row;
//                 }
 
//                 $output = array(
//                         "draw" => $_POST['draw'],
//                         "recordsTotal" => $this->User_model->count_all(),
//                         "recordsFiltered" => $this->User_model->count_filtered(),
//                         "data" => $data,
//                 );
//                 //output dalam format JSON
//                 echo json_encode($output);
//         }
// >>>>>>> f984095bffdba630e69c2ac1d4dde606e6dda58c
}
