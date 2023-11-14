<?php 


/**
 * 
 */
class Kategori extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		$this->load->model('M_Datatables');
    }

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

	function get_data_user()
        {
                $list = $this->User_model->get_datatables();
                $data = array();
                $no = $_POST['start'];
                foreach ($list as $field) {
                        $no++;
                        $row = array();
                        $row[] = $no;
                        $row[] = $field->user_nama;
                        $row[] = $field->user_email;
                        $row[] = $field->user_alamat;
 
                        $data[] = $row;
                }
 
                $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->User_model->count_all(),
                        "recordsFiltered" => $this->User_model->count_filtered(),
                        "data" => $data,
                );
                //output dalam format JSON
                echo json_encode($output);
        }
}
