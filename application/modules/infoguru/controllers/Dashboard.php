<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_guru();
		
	}
	public function index()
	{	
		$data= [
			'title' => 'Dashboard',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'j_guru' => $this->db->get_where('pegawai',['status_pegawai'=>'guru'])->num_rows(),
			'j_tendik' => $this->db->get_where('pegawai',['status_pegawai'=>'tendik'])->num_rows(),
			'j_pd' => $this->db->get_where('riwayatkelas',['status_siswa'=>'Y'])->num_rows(),
			'j_kls' => $this->db->get('tbl_kelas')->num_rows(),
			'kelas' => $this->db->get('tbl_kelas')->result(),
		];

		$this->load->view('infoguru/template/header',$data);
		$this->load->view('infoguru/template/navbar',$data);
		$this->load->view('infoguru/index',$data);
		$this->load->view('infoguru/template/footer',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/infoguru/controllers/Dashboard.php */