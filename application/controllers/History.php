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

	public function pending(){
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
		$this->load->view('partials/nav');
		$this->load->view('admin/history/pending');
		$this->load->view('partials/copyright');
		$this->load->view('partials/footer');   
	}
	public function Pinjam(){
		$data['title'] = "POLITEKNIK NEGERI BALI";
		$data['pinjam'] = $this->MHistory2->Pinjam();

		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
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
		$data['kembali'] = $this->MHistory2->Kembali();

		$this->load->view('partials/head',$data);
		$this->load->view('partials/side');
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

		$this->load->library('pdf');

		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetTopMargin(20);
		$pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor('Author');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->AddPage();
		// $html = 'aa';
		$html = $this->load->view('admin/history/report','',true);
		$pdf->writeHTML($html,true,false,true,false);
		$pdf->Output('laporanpeminjaman.pdf', 'I');
 
	}

}
