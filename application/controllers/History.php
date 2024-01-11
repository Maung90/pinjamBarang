<?php

class History extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MHistory2');
		$this->load->model('Mlogin');

		if ($this->session->userdata('id_role') == null) { 
			redirect('Login/','refresh');
		}

		if ($this->session->userdata('id_role') != '2') { 
			redirect('Master/','refresh');
		}
	}

	public function Pending(){
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$data['url'] = "Pending";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side',$data);
		$this->load->view('partials/nav');
		$this->load->view('admin/history/pending');
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');   
	}
	public function Pinjam(){
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$data['url'] = "Pinjam";
		$data['pinjam'] = $this->MHistory2->Pinjam();

		$this->load->view('partials/head',$data);
		$this->load->view('partials/side',$data);
		$this->load->view('partials/nav');
		$this->load->view('admin/history/dipinjam',$data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');   
	} 


	public function Modal($id){
		$data['id_peminjaman'] = $id;
		$this->load->view('admin/history/modal', $data);   
	}

	public function Kembali(){
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$data['url'] = "Kembali";
		$data['kembali'] = $this->MHistory2->Kembali();

		$this->load->view('partials/head',$data);
		$this->load->view('partials/side',$data);
		$this->load->view('partials/nav');
		$this->load->view('admin/history/kembali',$data);
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');   
	} 

	public function update($id,$status)
	{
		$this->MHistory2->update($id,$status);
	}

	public function report(){ 
		require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
		$pdf = new Dompdf\Dompdf();

		$data['barang']= $this->MHistory2->Report();
		$data['kesimpulan']= $this->MHistory2->Report2();
		$pdf->setPaper('A4', 'potrait');
		$pdf->set_option('isRemoteEnabled', TRUE);
		$pdf->set_option('isHtml5ParserEnabled', true);
		$pdf->set_option('isPhpEnabled', true);
		$pdf->set_option('isFontSubsettingEnabled', true);
		
		$pdf->loadHtml($this->load->view('admin/history/report',$data,true));
		$pdf->render();
		$pdf->stream('namafile', ['Attachment' => false]); 
 
	}

}
