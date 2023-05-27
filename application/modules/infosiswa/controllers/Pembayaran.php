<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			is_siswa();
			
		}
	public function index()
	{
		$data = [
			'title' => 'Data Pembayaran Siswa',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'siswa' => $this->db->select('*')
							->from('siswa s')
						   	->join('riwayatkelas rs','rs.nis = s.nis')
						   	->join('tbl_kelas kls','kls.id_kelas = rs.id_kelas')
						   	->where('rs.nis',$this->session->userdata('nis'))
						   	->where('rs.id_tahun', $this->session->userdata('id_tahun'))
						   	->get()->row(),

			'pembayaran' => $this->db->select('tp.id_pembayaran, tp.nis, tp.id_kelas, tp.id_jenis,tp.tgl_bayar,tp.nominal,tp.bulan,tp.status_bayar,tp.id_tahun, s.nis,s.nama_peserta,rs.nis, rs.id_kelas, kls.id_kelas, kls.kelas, jp.id_jenis,jp.jenis_pembayaran')
						   ->from('transaksi_pembayaran tp')
						   ->join('siswa s','s.nis = tp.nis')
						   ->join('riwayatkelas rs','rs.nis = s.nis')
						   ->join('tbl_kelas kls','kls.id_kelas = tp.id_kelas')
						   ->join('jenis_pembayaran jp','jp.id_jenis = tp.id_jenis')
						   ->where('tp.nis',$this->session->userdata('nis'))
						   ->where('tp.id_tahun', $this->session->userdata('id_tahun'))
						   ->get()->result(),
						   
			'tagihan' =>  $this->db->select('*')
						 ->from('tbl_tagihan tgh')
						 ->join('jenis_pembayaran jp','jp.id_jenis = tgh.id_jenis')
						 ->join('siswa s', 's.nis = tgh.nis')
						 ->join('riwayatkelas rs','rs.nis = s.nis')
						 ->join('tbl_kelas kls','kls.id_kelas = tgh.id_kelas')
						 ->where('tgh.nis',$this->session->userdata('nis'))
						 ->where('tgh.id_tahun',$this->session->userdata('id_tahun'))
						 ->get()->result(),

		];
		$this->load->view('infosiswa/template/header',$data);
		$this->load->view('infosiswa/template/navbar',$data);
		$this->load->view('infosiswa/pembayaran/index',$data);
		$this->load->view('infosiswa/template/footer',$data);
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/modules/infosiswa/controllers/Pembayaran.php */