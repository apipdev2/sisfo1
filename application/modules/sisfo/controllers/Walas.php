<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Walas_model','walas');
		is_login();
		cek_admin();
		
	}

	public function index()
	{
		$data= [
			'title' => 'Data Walas',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'walas' => $this->walas->getWalas()->result(),
			'kelas'	=> $this->db->get_where('tbl_kelas',['id_tahunajaran'=> $this->session->userdata('id_tahun')])->result(),
			'pegawai'=> $this->db->get('pegawai')->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/walas/index',$data);
		$this->load->view('template/footer');
	}

	public function store()
	{
		$data = [
			'id_tahun' => $this->session->userdata('id_tahun'),
			'id_guru'  => $this->input->post('id_guru'),
			'id_kelas'  => $this->input->post('id_kelas'),
		];

		$id_guru  = $this->input->post('id_guru');
		$id_kelas  = $this->input->post('id_kelas');

		$q ="SELECT * FROM walikelas WHERE id_guru = ".$id_guru." OR id_kelas = ".$id_kelas;
		$cek = $this->db->query($q)->num_rows();

		var_dump($cek);
		if ($cek > 0) {
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Kelas/Guru sudah terisi!', 'error');</script>");
        	redirect('sisfo/Walas');
		}else{

			$query = $this->walas->addWalas($data);

			if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
	        	redirect('sisfo/Walas');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('sisfo/Walas');
			}

		}

		
	}

	public function edit($id)
	{
		$id = decrypt_url($id);
		$data = [
			'id_guru'  => $this->input->post('id_guru'),
			'id_kelas'  => $this->input->post('id_kelas'),
		];

		$query = $this->walas->editWalas($data,$id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terupdate!', 'success');</script>");
        	redirect('sisfo/Walas');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terupdate!', 'error');</script>");
        	redirect('sisfo/Walas');
		}
	}

	public function hapus($id)
	{
		$id = decrypt_url($id);
		
		$query = $this->walas->hapusWalas($id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terhapus!', 'success');</script>");
        	redirect('sisfo/Walas');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terhapus!', 'error');</script>");
        	redirect('sisfo/Walas');
		}
	}

	//ceta walas
	public function cetak()
	{
		$data= [
			'title' => 'Data Walas',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'walas' => $this->walas->getWalas()->result(),
		];

		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Data Walas.pdf";
	    $this->pdf->setPaper('A4', 'Portrait');
	    $this->pdf->loadView('sisfo/walas/cetak_walas', $data);
		// $this->load->view('sisfo/Walas/cetak_walas',$data);
		// echo json_encode($data);
	}

}

/* End of file Walas.php */
/* Location: ./application/modules/sisfo/controllers/Walas.php */