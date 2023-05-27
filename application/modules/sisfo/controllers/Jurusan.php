<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Jurusan_model','jm');
		is_login();
		cek_admin();
		
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Jurusan',
			'jurusan' => $this->jm->getJurusan()->result(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/jurusan/index',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data = [
			'bidang_keahlian' 		=> $this->input->post('bidang_keahlian'),
			'nama_jurusan' 			=> $this->input->post('nama_jurusan'),
		];

		$query = $this->jm->addJurusan($data);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Jurusan');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Jurusan');
		}
	}

	public function edit($id)
	{
		$id = decrypt_url($id);
		$data = [
			'bidang_keahlian' 		=> $this->input->post('bidang_keahlian'),
			'nama_jurusan' 			=> $this->input->post('nama_jurusan'),
		];

		$query = $this->jm->editJurusan($data,$id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil diubah!', 'success');</script>");
        	redirect('sisfo/Jurusan');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal diubah!', 'error');</script>");
        	redirect('sisfo/Jurusan');
		}
	}

	public function hapus($id)
	{
		$id = decrypt_url($id);
		
		$query = $this->jm->hapusJurusan($id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
        	redirect('sisfo/Jurusan');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal dihapus!', 'error');</script>");
        	redirect('sisfo/Jurusan');
		}
	}

}

/* End of file Jurusan.php */
/* Location: ./application/modules/sisfo/controllers/Jurusan.php */