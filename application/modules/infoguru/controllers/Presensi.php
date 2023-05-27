<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Pegawai_model','pegawai');
		$this->load->model('sisfo/Presensiguru_model','phguru');
		is_guru();
	}

	public function index()
	{	
		$id = '158';
		$data = [
			'title' => 'Data Presensi',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'pegawai' => $this->pegawai->getPegawaiById($id)->row(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('infoguru/presensi/index',$data);
		$this->load->view('template/footer');
	}

	public function detail($nip, $bln, $thn)
	{	

		$data = [
			'title' => 'Detail',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' =>$this->db->get_where('tahunajaran',['id_tahun'=>$this->session->userdata('id_tahun')])->row(),
			'pegawai' => $this->db->get_where('pegawai',['nip'=>$nip])->row(),
			'detail' => $this->db->select('*')
						->from('phguru pg')
						->join('pegawai p','p.nip = pg.nip')
						->where('pg.nip >=',$nip)
						->where('MONTH(tanggal)',$bln)
						->where('YEAR(tanggal)',$thn)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('infoguru/presensi/detail',$data);
		$this->load->view('template/footer');
		
		
	}

	public function ajax_getphguru()
	{
		$bln = $this->input->post('bln');
		$thn = $this->input->post('thn');

		$row = $this->db->get_where('pegawai',['nip'=>$this->session->userdata('nip')])->row();
		
			$data = [
				'nip' => $row->nip,
				'nama_lengkap' => $row->nama_lengkap,
				'hadir' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','H')
						->where('MONTH(tanggal)',$bln)
						->where('YEAR(tanggal)',$thn)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
				'izin' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','I')
						->where('MONTH(tanggal)',$bln)
						->where('YEAR(tanggal)',$thn)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
				'sakit' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','S')
						->where('MONTH(tanggal)',$bln)
						->where('YEAR(tanggal)',$thn)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
				'alfa' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','A')
						->where('MONTH(tanggal)',$bln)
						->where('YEAR(tanggal)',$thn)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
			];

		
		
		
		echo json_encode($data);
	}

}

/* End of file Presensi.php */
/* Location: ./application/modules/infoguru/controllers/Presensi.php */