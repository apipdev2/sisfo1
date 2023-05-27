<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pelanggaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_bpbk();
		
	}

	public function index()
	{
		$data= [
			'title' => 'Jenis Pelanggaran',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'kategori' => $this->db->get('kategori_pelanggaran')->result(),
			'jenis' => $this->db->select('*')
								->from('jenis_pelanggaran jp')
								->join('kategori_pelanggaran kp','kp.id_kat = jp.id_kategori')
								->get()->result()
		];

		$this->load->view('bpbk/template/header',$data);
		$this->load->view('bpbk/template/navbar',$data);
		$this->load->view('bpbk/jenis/index',$data);
		$this->load->view('bpbk/template/footer');
	}

	public function add()
	{
		$data = [
			'id_kategori' => $this->input->post('id_kategori'),
			'jenis_pelanggaran' => $this->input->post('jenis_pelanggaran'),
			'point' => $this->input->post('point'),
		];

		$query = $this->db->insert('jenis_pelanggaran',$data);

		if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
	        	redirect('bpbk/Jenis_pelanggaran');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('bpbk/Jenis_pelanggaran');
			}
	}

	public function edit($id)
	{
		$id_jenis = decrypt_url($id);
		$data = [
			'id_kategori' => $this->input->post('id_kategori'),
			'jenis_pelanggaran' => $this->input->post('jenis_pelanggaran'),
			'point' => $this->input->post('point'),
		];

		$this->db->where('id_jenis',$id_jenis);
		$query = $this->db->update('jenis_pelanggaran',$data);

		if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
	        	redirect('bpbk/Jenis_pelanggaran');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('bpbk/Jenis_pelanggaran');
			}
	}

	public function delete($id)
	{
		$id_jenis = decrypt_url($id);
		$query = $this->db->where('id_jenis',$id_jenis)->delete('jenis_pelanggaran');
		if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
	        	redirect('bpbk/Jenis_pelanggaran');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal dihapus!', 'error');</script>");
	        	redirect('bpbk/Jenis_pelanggaran');
			}
	}

}

/* End of file Jenis_pelanggaran.php */
/* Location: ./application/modules/bpbk/controllers/Jenis_pelanggaran.php */