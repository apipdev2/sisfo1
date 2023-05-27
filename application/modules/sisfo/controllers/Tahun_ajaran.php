<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('TahunAjaran_model','ta');
		is_login();
		cek_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'Tahun Ajaran',
			'tahun' => $this->ta->getTahunAjaran()->result(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/tahun_ajaran/index',$data);
		$this->load->view('template/footer');
		
	}

	public function tambah()
	{
		$data = [
			'tahun' => $this->input->post('tahun'),
			'tahun_ajaran' 	=> $this->input->post('tahun_ajaran'),
			//'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		
		$query = $this->ta->addTahunAjaran($data);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Tahun_ajaran');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Tahun_ajaran');
		}
	}

	public function edit($id)
	{
		$id = decrypt_url($id);
		$data = [
			'tahun' => $this->input->post('tahun'),
			'tahun_ajaran' 	=> $this->input->post('tahun_ajaran'),
		];

				
		$query = $this->ta->editTahunAjaran($data,$id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil diubah!', 'success');</script>");
        	redirect('sisfo/Tahun_ajaran');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal diubah!', 'error');</script>");
        	redirect('sisfo/Tahun_ajaran');
		}
	}

	public function hapus($id)
	{
		$id = decrypt_url($id);
		
		$query = $this->ta->hapusTahunAjaran($id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
        	redirect('sisfo/Tahun_ajaran');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal dihapus!', 'error');</script>");
        	redirect('sisfo/Tahun_ajaran');
		}
	}

}

/* End of file Tahun_ajaran.php */
/* Location: ./application/modules/kesiswaan/controllers/Tahun_ajaran.php */