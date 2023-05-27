<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Alumni_model','alumni');
		is_login();
		
	}

	public function index()
	{
		$data= [
			'title' => 'Data Alumni',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahun' => $this->db->get('tahunajaran')->result(),
			'jurusan' => $this->db->get('jurusan')->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/alumni/index',$data);
		$this->load->view('template/footer');
	}

	public function ajax_getAlumni(){

		$id_tahun = $this->input->post('id_tahun');
		$jurusan = $this->input->post('jurusan');

		$alumni = $this->alumni->get_alumni($id_tahun, $jurusan)->result();
		echo json_encode($alumni);
	}

	public function export_alumni($id_tahun, $jurusan)
	{
		$data = 
		[
			'peserta' =>$this->alumni->get_alumni($id_tahun, $jurusan)->result()
		];
		$this->load->view('sisfo/alumni/export',$data);
	}

	public function cetak_alumni($id_tahun, $jurusan)
	{	
		$id_tahun = base64_decode($id_tahun);
		$jurusan = base64_decode($jurusan);
		$tahun = $this->db->get_where('tahunajaran',['id_tahun'=>$id_tahun])->row();
		// $jur = $this->db->get_where('jurusan',['nama_jurusan'=>$jurusan])->row();
		$data = 
		[	
			'title' => 'Data Alumni',
			'tahun_ajaran' => $tahun->tahun_ajaran,
			'jurusan' => $jurusan,
			'peserta' =>$this->alumni->get_alumni($id_tahun, $jurusan)->result()
		];

		// $this->load->library('Pdf');
	 //    $this->pdf->setFileName = "Data Siswa.pdf";
	 //    $this->pdf->setPaper('legal', 'Landscape');
	 //    $this->pdf->loadView('sisfo/alumni/cetak', $data);
		$this->load->view('sisfo/alumni/cetak',$data);
	}

}

/* End of file Alumni.php */
/* Location: ./application/modules/sisfo/controllers/Alumni.php */