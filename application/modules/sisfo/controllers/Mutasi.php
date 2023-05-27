<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mutasi_model','mutasi');
		is_login();
		
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Mutasi',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'mutasi' => $this->mutasi->getMutasi()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/mutasi/index',$data);
		$this->load->view('template/footer');
	}

	public function restore($nis)
	{
		$this->db->where('nis',$nis)->delete('mutasi');
		$this->db->where('nis',$nis)->update('riwayatkelas',['status_siswa' => 'Y']);
		$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil direstore!', 'success');</script>");
        redirect('sisfo/Mutasi');

	}

	public function ajax_getMutasiMasuk()
	{
		$mutasi_masuk = $this->mutasi->get_mutasi_masuk()->result();
		echo json_encode($mutasi_masuk);
	}

	public function ajax_getMutasiKeluar()
	{
		$mutasi_keluar = $this->mutasi->get_mutasi_keluar()->result();
		echo json_encode($mutasi_keluar);
	}

}

/* End of file Mutasi.php */
/* Location: ./application/modules/sisfo/controllers/Mutasi.php */