<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_pelanggaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_bpbk();
		
	}

	public function index()
	{
		$data= [
			'title' => 'Kategori Pelanggaran',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'kategori' => $this->db->get('kategori_pelanggaran')->result(),
		];

		$this->load->view('bpbk/template/header',$data);
		$this->load->view('bpbk/template/navbar',$data);
		$this->load->view('bpbk/kategori/index',$data);
		$this->load->view('bpbk/template/footer');
	}

	public function add()
	{
		$data = [
			'kategori_pelanggaran' => $this->input->post('kategori_pelanggaran'),
		];

		$query = $this->db->insert('kategori_pelanggaran',$data);

		if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
	        	redirect('bpbk/Kategori_pelanggaran');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('bpbk/Kategori_pelanggaran');
			}
	}

	public function edit($id)
	{
		$id_kat = decrypt_url($id);
		$data = [
			'kategori_pelanggaran' => $this->input->post('kategori_pelanggaran'),
		];

		$this->db->where('id_kat',$id_kat);
		$query = $this->db->update('kategori_pelanggaran',$data);

		if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
	        	redirect('bpbk/Kategori_pelanggaran');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('bpbk/Kategori_pelanggaran');
			}
	}

	public function delete($id)
	{
		$id_kat = decrypt_url($id);
		$query = $this->db->where('id_kat',$id_kat)->delete('kategori_pelanggaran');
		if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
	        	redirect('bpbk/Kategori_pelanggaran');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal dihapus!', 'error');</script>");
	        	redirect('bpbk/Kategori_pelanggaran');
			}
	}

}

/* End of file Kategori_pelanggaran.php */
/* Location: ./application/modules/bpbk/controllers/Kategori_pelanggaran.php */