<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login_presensi();
	}

	public function index()
	{
		$this->load->view('presensi/index',[
			'title' => 'Presensi',
			'sekolah' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahun' => $this->db->get('tahunajaran')->result(),
			'setting' => $this->db->get_where('setting_presensi',['id_setting'=>1])->row(),
			'status' => ['masuk','pulang'],
		]);
	}

	public function view()
	{
		$query = $this->db->select('*')
				 ->from('phsiswa ps')
				 ->join('siswa s','s.nis = ps.nis')
				 ->join('riwayatkelas rk','rk.nis = s.nis')
				 ->join('tbl_kelas kls','kls.id_kelas = rk.id_kelas')
				 ->where('ps.id_tahun','5')
				 ->where('ps.tanggal',date('Y-m-d'))
				 ->limit(10)
				 ->order_by('ps.time_in','DESC')
				 ->order_by('ps.time_out','DESC')
				 ->get()->result();
		echo json_encode($query);
	}

	public function cari($nis,$status){

		if ($status == 'masuk') {
			$qr = $this->db->select('rk.nis,rk.id_kelas,s.nis,s.nama_peserta')
				 ->from('riwayatkelas rk')
				 ->join('siswa s','s.nis = rk.nis')
				 
				 ->where('rk.nis',$nis)
				 ->get();
			if ($qr->num_rows() > 0) {
				$result = $qr->row();

				$query = [
					'id_tahun' => '5',
					'nis' => $result->nis,
					'tanggal' => date('Y-m-d'),
					'time_in' => date('H:i:s'),
					
				];

				$cek = $this->db->get_where('phsiswa',['tanggal'=>date('Y-m-d'),'nis'=>$result->nis])->num_rows();
				if ($cek > 0) {
					$data = ['message'=> 'Data presensi sudah ada.'];
				}else{
					$this->db->insert('phsiswa',$query);
					$data = ['message'=> 'success'];
				}
				

			}else{
				$data = ['message'=>'NIS tidak terdaftar'];
			}

		   echo json_encode($data);

		}else{

			$qr = $this->db->select('rk.nis,rk.id_kelas,s.nis,s.nama_peserta')
				 ->from('riwayatkelas rk')
				 ->join('siswa s','s.nis = rk.nis')
				 
				 ->where('rk.nis',$nis)
				 ->get();
			if ($qr->num_rows() > 0) {
				$result = $qr->row();

				$query = [
					'id_tahun' => '5',
					'nis' => $result->nis,
					'tanggal' => date('Y-m-d'),
					'time_out' => date('H:i:s'),
					'ket' => 'H',
					'type' => 'qr',
				];

				$cek = $this->db->get_where('phsiswa',['tanggal'=>date('Y-m-d'),'nis'=>$result->nis])->num_rows();
				if ($cek > 0) {
					$this->db->where(['tanggal'=>date('Y-m-d'),'nis'=>$result->nis]);
					$this->db->update('phsiswa',$query);
					$data = ['message'=> 'Sampai Jumpa Besok.'];
				}else{
					
					$data = ['message'=> 'Tidak ditemukan presensi masuk'];
				}
				

			}else{
				$data = ['message'=>'NIS tidak terdaftar'];
			}

		   echo json_encode($data);

		}
	}

	public function set()
	{
		$data = [
			'id_tahun' => $this->input->post('id_tahun'),
			'status' => $this->input->post('status'),
		];

		$this->db->where('id_setting','1');
		$query = $this->db->update('setting_presensi',$data);
		if ($query) {

			$res = ['message'=>'Berhasil'];
		}else{
			$res = ['message'=>'gagal'];
		}

		echo json_encode($res);
	}

}

/* End of file Presensi.php */
/* Location: ./application/modules/presensi/controllers/Presensi.php */