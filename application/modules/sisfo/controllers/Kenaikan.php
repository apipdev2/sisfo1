<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kenaikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Kelas_model','kelas');
		$this->load->model('sisfo/Kenaikan_model','kenaikan');
		is_login();
		// cek_admin();
		
	}

	public function index()
	{	
		if ($this->input->post('id_kelas')) {

			$siswa = $this->kenaikan->getSiswaByIdKelas($this->input->post('id_kelas'))->result();

		}else{
			$siswa = [];
		}

		$data = [
			'title' => 'Kenaikan Kelas',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'ta' => $this->db->get('tahunajaran')->result(),
			'kelas' => $this->kelas->getKelas()->result(),
			'kelas_baru' => $this->kelas->getKelas()->result(),
			'siswa' => $siswa,

		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/kenaikan/index',$data);
		$this->load->view('template/footer');
	}

	public function tinggal_kelas()
	{	
		if ($this->input->post('id_kelas')) {

			$siswa = $this->kenaikan->getSiswaByIdKelas($this->input->post('id_kelas'))->result();

		}else{
			$siswa = [];
		}

		$data = [
			'title' => 'Tinggal Kelas',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'ta' => $this->db->get('tahunajaran')->result(),
			'kelas' => $this->kelas->getKelas()->result(),
			'kelas_baru' => $this->kelas->getKelas()->result(),
			'siswa' => $siswa,
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/kenaikan/tinggal_kelas',$data);
		$this->load->view('template/footer');
	}

	public function kelulusan()
	{	
		if ($this->input->post('id_kelas')) {

			$siswa = $this->kenaikan->getSiswaByIdKelas($this->input->post('id_kelas'))->result();

		}else{
			$siswa = [];
		}

		$data = [
			'title' => 'Kelulusan',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'ta' => $this->db->get('tahunajaran')->result(),
			'kelas' => $this->kelas->getKelas()->result(),
			'kelas_baru' => $this->kelas->getKelas()->result(),
			'siswa' => $siswa,
			'ses_kelas'=> $this->input->post('id_kelas'),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/kenaikan/kelulusan',$data);
		$this->load->view('template/footer');
	}

	public function ajax_getKelas($id_tahun)
	{
		$kelas = $this->kelas->getKelasByTahun($id_tahun)->result();
		echo json_encode($kelas);
	}

	public function naik()
	{			
		$nis = $this->input->post('nis');
		$id_tahun = $this->input->post('id_tahun');
		$id_kelas = $this->input->post('id_kelas');

		for ($i=0; $i < count($nis) ; $i++) { 
			
			$data[$i] = [
				'id_tahun' => $id_tahun,
				'nis' => $nis[$i],
				'id_kelas' => $id_kelas,
				'status_siswa' => 'Y',
			];

			$cek = $this->db->get_where('riwayatkelas',['id_tahun' => $id_tahun,'nis' => $nis[$i]])->num_rows();

			if ($cek > 0) {

				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Sudah ada!', 'info');</script>");

			}else{

				$query = $this->db->insert('riwayatkelas',$data[$i]);
				
				//update flag
				$this->db->where([
					'id_tahun' => $this->session->userdata('id_tahun'),
					'nis' 	 => $nis[$i],
					'id_kelas' => $id_kelas,
				])->update('riwayatkelas',['flag' => '1']);
			}

		}

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Kenaikan');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Kenaikan');
		}
	}

	public function tinggal()
	{	
		$nis = $this->input->post('nis');
		$id_tahun = $this->input->post('id_tahun');
		$id_kelas = $this->input->post('id_kelas');

		for ($i=0; $i < count($nis) ; $i++) { 
			
			$data[$i] = [
				'id_tahun' => $id_tahun,
				'nis' => $nis[$i],
				'id_kelas' => $id_kelas,
				'status_siswa' => 'Y',
			];

			$cek = $this->db->get_where('riwayatkelas',['id_tahun' => $id_tahun,'nis' => $nis[$i]])->num_rows();

			if ($cek > 0) {

				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Sudah ada!', 'info');</script>");

			}else{

				$query = $this->db->insert('riwayatkelas',$data[$i]);
				
				//update flag
				$this->db->where([
					'id_tahun' => $this->session->userdata('id_tahun'),
					'nis' => $nis[$i],
					'id_kelas' => $id_kelas,
				])->update('riwayatkelas',['flag' => '2']);
			}

		}

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Kenaikan');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Kenaikan');
		}
	}

	public function luluskan()
	{	
		$nis = $this->input->post('nis');
		$id_tahun = $this->session->userdata('id_tahun');
		$id_kelas = $this->input->post('id_kelas');

		for ($i=0; $i < count($nis) ; $i++) { 
			
			$data = [
				'id_tahun' => $id_tahun,
				'nis' => $nis[$i],
				'id_kelas' => $id_kelas,
				'tanggal_lulus' => date('Y-m-d'),
			];

			$cek = $this->db->get_where('alumni',['id_tahun' => $id_tahun,'nis' => $nis[$i]])->num_rows();

			if ($cek > 0) {

				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Siswa Sudah ada!', 'info');</script>");

			}else{

				$query = $this->db->insert('alumni',$data);
				
				//update flag
				$this->db->where([
					'id_tahun' => $this->session->userdata('id_tahun'),
					'nis' => $nis[$i],
					'id_kelas' => $id_kelas,
				])->update('riwayatkelas',['flag' => '3']);
			}

		}

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Kenaikan/kelulusan');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Kenaikan/kelulusan');
		}
	}

}

/* End of file Kenaikan.php */
/* Location: ./application/modules/sisfo/controllers/Kenaikan.php */