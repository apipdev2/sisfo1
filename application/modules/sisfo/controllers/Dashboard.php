<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		
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

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/index',$data);
		$this->load->view('template/footer');
	}

	public function chart()
	{
		$kelas = $this->db->get('tbl_kelas')->result();
		$no = 1;
          foreach ($kelas as $kls){

            $l = $this->db->select('*')
                          ->from('riwayatkelas rk')
                          ->join('siswa s','s.nis=rk.nis')
                          ->where('rk.id_kelas',$kls->id_kelas)
                          ->where('s.jenis_kelamin','L')
                          ->get()->num_rows();

             $p = $this->db->select('*')
                          ->from('riwayatkelas rk')
                          ->join('siswa s','s.nis=rk.nis')
                          ->where('rk.id_kelas',$kls->id_kelas)
                          ->where('s.jenis_kelamin','P')
                          ->get()->num_rows();
           
           $data[]= [
           	'no' => $no++,
            'kelas' => $kls->kelas,
            'j_laki' => $l,
            'J_perempuan' => $p
           ];
            
          }

          echo json_encode($data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/sisfo/controllers/Dashboard.php */