<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		$this->load->model('sisfo/Siswa_model','siswa');
		$this->load->model('sisfo/Jurusan_model','jurusan');
		$this->load->model('keuangan/Pembayaran_model','pembayaran');

		is_tu();
	}

	public function index()
	{
		$data= [
			'title' => 'Jenis Pembayaran',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'tingkat' => $this->riwayatkelas->getTingkat()->result(),
			'kategori' => $this->pembayaran->get_kategori()->result(),
			'jenis' => $this->pembayaran->get_jenis()->result(),
		];

		$this->load->view('keuangan/template/header',$data);
		$this->load->view('keuangan/template/navbar',$data);
		$this->load->view('keuangan/pembayaran/jenis_pembayaran',$data);
		$this->load->view('keuangan/template/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('jenis_pembayaran','Jenis Pembayaran','required');
		if ($this->form_validation->run()==false) {
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Tidak boleh Kosong!', 'error');</script>");
	        redirect('keuangan/Jenis_pembayaran');
		}else{
			$data = [
				'id_tahun' => $this->session->userdata('id_tahun'),
				'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
				'nominal' => $this->input->post('nominal'),
				'id_kategori' => $this->input->post('id_kategori'),
				'status' => 'Y',
			];

			$query = $this->db->insert('jenis_pembayaran',$data);
			if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
	        	redirect('keuangan/Jenis_pembayaran');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('keuangan/Jenis_pembayaran');
			}
		}


	}

	public function edit($id)
	{	
		$this->form_validation->set_rules('jenis_pembayaran','Jenis Pembayaran','required');
		if ($this->form_validation->run()==false) {
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Tidak boleh Kosong!', 'error');</script>");
	        redirect('keuangan/Jenis_pembayaran');
		}else{

			$id = decrypt_url($id);
			$data = [
				'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
				'nominal' => $this->input->post('nominal'),
				'id_kategori' => $this->input->post('id_kategori'),
			];

			$this->db->where('id_jenis', $id);
			$query = $this->db->update('jenis_pembayaran',$data);
			if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Ubah data!', 'success');</script>");
	        	redirect('keuangan/Jenis_pembayaran');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Ubah data!', 'error');</script>");
	        	redirect('keuangan/Jenis_pembayaran');
			}

		}	


	}


	public function hapus($id)
	{
		$id = decrypt_url($id);

		$this->db->where('id_jenis', $id);
		$query = $this->db->delete('jenis_pembayaran');
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Hapus Data!', 'success');</script>");
        	redirect('keuangan/Jenis_pembayaran');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Hapus Data!', 'error');</script>");
        	redirect('keuangan/Jenis_pembayaran');
		}


	}
	

	

	



}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/jenis Pembayaran.php */