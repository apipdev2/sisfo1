<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Peserta_didik extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		is_login();
		
	}

	public function index()
	{
		$data= [
			'title' => 'Data Peserta Didik',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'tingkat' => $this->riwayatkelas->getTingkat()->result(),
			'siswa' => $this->riwayatkelas->getSiswa()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/peserta_didik/index',$data);
		$this->load->view('template/footer');
	}

	public function cari()
	{
		$data= [
			'title' => 'Data Peserta Didik',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'tingkat' => $this->riwayatkelas->getTingkat()->result(),
			'siswa' => $this->riwayatkelas->getSiswa()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/peserta_didik/cari_pd',$data);
		$this->load->view('template/footer');
	}

	public function ajax_getKelas($tingkat){

		$kelas = $this->riwayatkelas->getKelas($tingkat)->result();
		echo json_encode($kelas);
	}

	public function ajax_getSiswa(){

		$siswa = $this->riwayatkelas->getSiswa()->result();
		echo json_encode($siswa);
	}

	public function ajax_getSiswaByKelas($id_kelas){

		$siswa = $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result();
		echo json_encode($siswa);
	}

	public function ajax_getSiswaByNama(){

		$nama_peserta = $this->input->post('nama_peserta');

		$siswa = $this->riwayatkelas->getSiswaByNama($nama_peserta);
		echo json_encode($siswa);
	}

	public function view($nis)
	{
		$data= [
			'siswa' => $this->riwayatkelas->getSiswaById($nis)->row(),
		];

		$this->load->view('sisfo/peserta_didik/view',$data);
	}

	public function cetak_perkelas($id_kelas)
	{
		$data = [
			'title' => 'Data Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'peserta'=>  $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result(),
			'kelas' => $this->db->select('*')
						->from('tbl_kelas')
						->where('id_kelas',$id_kelas)
						->where('id_tahunajaran', $this->session->userdata('id_tahun'))
						->get()->row(),			
		];

		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Data Kelas.pdf";
	    $this->pdf->setPaper('A4', 'Portrait');
	    $this->pdf->loadView('sisfo/peserta_didik/cetak_perkelas', $data);
		// $this->load->view('sisfo/peserta_didik/cetak_perkelas', $data);
	}
	
	public function export_perkelas($id_kelas)
	{
		$data = [
			'title' => 'Data Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'peserta'=>  $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result(),
			'kelas' => $this->db->select('*')
						->from('tbl_kelas')
						->where('id_kelas',$id_kelas)
						->where('id_tahunajaran', $this->session->userdata('id_tahun'))
						->get()->row(),			
		];

		
		$this->load->view('sisfo/peserta_didik/export_all', $data);
	}

	public function cetak_pd($nis)
	{
		$data = [
			'title' => 'Data Siswa',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'peserta'=>  $this->riwayatkelas->getSiswaById($nis)->row(),				
		];

		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Data PD.pdf";
	    $this->pdf->setPaper('Legal', 'Portrait');
	    $this->pdf->loadView('sisfo/peserta_didik/cetak_persiswa', $data);
		// $this->load->view('sisfo/peserta_didik/cetak_persiswa', $data);
	}

	public function cetak_pd_all()
	{
		$data = [
			'title' => 'Data Siswa',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'peserta'=>  $this->riwayatkelas->getSiswa()->result(),
			
		];

		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Data Siswa.pdf";
	    $this->pdf->setPaper('A4', 'Portrait');
	    $this->pdf->loadView('sisfo/peserta_didik/cetak_all', $data);
		// $this->load->view('sisfo/peserta_didik/cetak_perkelas', $data);
	   }

	   public function export_pd_all()
	{
		$data = [
			'title' => 'Data Siswa',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'peserta'=>  $this->riwayatkelas->getSiswa()->result(),
			
		];

		
		$this->load->view('sisfo/peserta_didik/export_all', $data);

	   }
	

}

/* End of file Riwayatkelas.php */
/* Location: ./application/modules/sisfo/controllers/Riwataykelas.php */