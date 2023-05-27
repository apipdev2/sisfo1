<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensiguru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Pegawai_model','pegawai');
		$this->load->model('sisfo/Presensiguru_model','phguru');
		is_login();
		// cek_admin();
	}

	public function index()
	{	

		$data = [
			'title' => 'Data Presensi Guru',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/phguru/index',$data);
		$this->load->view('template/footer');
	}

	public function addPhguru()
	{	
		
		$data = [
			'title' => 'Tambah Presensi Guru',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'pegawai' => $this->pegawai->getPegawai()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/phguru/add_phguru',$data);
		$this->load->view('template/footer');
	}

	public function storephguru()
	{
		$nip = $this->input->post('nip');
		$ket = $this->input->post('ket');

		
		
		for ($i=0; $i < count($ket) ; $i++) { 
			
			$data = [
				'id_tahun' => $this->session->userdata('id_tahun'),
				'tanggal' => $this->input->post('tanggal'),
				'nip' => $nip[$i],
				'ket' => $ket[$i],
				'type' => 'M',
			];



		$cek = $this->db->get_where('phguru',[
				'tanggal' => $this->input->post('tanggal'),
				'nip' => $nip[$i],])->num_rows();

			if ($cek < 1) {
				$query = $this->db->insert('phguru',$data);
			}
		}
		
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil disimpan!', 'success');</script>");
        	redirect('sisfo/Presensiguru');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal disimpan!', 'error');</script>");
        	redirect('sisfo/Presensiguru');
		}
	}

	public function detail($nip,$tgl1,$tgl2)
	{	

		$data = [
			'title' => 'Detail',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' =>$this->db->get_where('tahunajaran',['id_tahun'=>$this->session->userdata('id_tahun')])->row(),
			'pegawai' => $this->db->get_where('pegawai',['nip'=>$nip])->row(),
			'detail' => $this->db->select('*')
						->from('phguru pg')
						->join('pegawai p','p.nip = pg.nip')
						->where('pg.tanggal >=',$tgl1)
						->where('pg.tanggal <=',$tgl2)
						->where('pg.nip',$nip)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/phguru/detail',$data);
		$this->load->view('template/footer');
		
		
	}

	public function cetak_detail($tanggal1,$tanggal2)
	{	

		
		$pegawai = $this->phguru->get_phguru($tanggal1,$tanggal2)->result();
		
		$data = [];

		foreach ($pegawai as $row) {
			$datas = [
				'nip' => $row->nip,
				'nama_lengkap' => $row->nama_lengkap,
				'hadir' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','H')
						->where('pg.tanggal >=',$tanggal1)
						->where('pg.tanggal <=',$tanggal2)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
				'izin' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','I')
						->where('pg.tanggal >=',$tanggal1)
						->where('pg.tanggal <=',$tanggal2)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
				'sakit' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','S')
						->where('pg.tanggal >=',$tanggal1)
						->where('pg.tanggal <=',$tanggal2)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
				'alfa' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','A')
						->where('pg.tanggal >=',$tanggal1)
						->where('pg.tanggal <=',$tanggal2)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
			];

			$data[] = $datas;
		}
		
		$result = [
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'phguru'=>$data,
			];
		
		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Data PD.pdf";
	    $this->pdf->setPaper('Legal', 'Portrait');
	    $this->pdf->loadView('sisfo/phguru/cetak', $result);
	    // $this->load->view('sisfo/phguru/cetak', $result);

		
		
	}

	public function edit()
	{
		$id_presensi = $this->input->post('id_presensi');
		$nip = $this->input->post('nip');


		$data = [
			'ket' => $this->input->post('ket'),
		];

		$query = $this->db->where('id_presensi',$id_presensi)->update('phguru',$data);
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil disimpan!', 'success');</script>");
        	redirect('sisfo/Presensiguru/detail/'.$nip);
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal disimpan!', 'error');</script>");
        	redirect('sisfo/Presensiguru/detail/'.$nip);
		}
	}

	public function hapus($id)
	{
		$id_presensi = decrypt_url($id);		
		$pegawai= $this->db->get_where('phguru',['id_presensi'=>$id_presensi])->row();

		$query = $this->db->where('id_presensi',$id_presensi)->delete('phguru');
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
        	redirect('sisfo/Presensiguru/detail/'.$pegawai->nip);
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal dihapus!', 'error');</script>");
        	redirect('sisfo/Presensiguru/detail/'.$pegawai->nip);
		}
	}

	public function ajax_getphguru()
	{
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');


		$pegawai = $this->phguru->get_phguru($tanggal1,$tanggal2)->result();
		
		$data = [];

		foreach ($pegawai as $row) {
			$datas = [
				'nip' => $row->nip,
				'nama_lengkap' => $row->nama_lengkap,
				'hadir' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','H')
						->where('pg.tanggal >=',$tanggal1)
						->where('pg.tanggal <=',$tanggal2)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
				'izin' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','I')
						->where('pg.tanggal >=',$tanggal1)
						->where('pg.tanggal <=',$tanggal2)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
				'sakit' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','S')
						->where('pg.tanggal >=',$tanggal1)
						->where('pg.tanggal <=',$tanggal2)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
				'alfa' => $this->db->select('*')
						->from('phguru pg')
						->where('pg.nip',$row->nip)
						->where('pg.ket','A')
						->where('pg.tanggal >=',$tanggal1)
						->where('pg.tanggal <=',$tanggal2)
						->where('id_tahun',$this->session->userdata('id_tahun'))->get()->num_rows(),
			];

			$data[] = $datas;
		}
		
		
		echo json_encode($data);
	}

}

/* End of file Presensi.php */
/* Location: ./application/modules/sisfo/controllers/Presensiguru.php */