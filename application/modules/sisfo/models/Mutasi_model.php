<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_model extends CI_Model {

	public function getMutasi()
	{
		return $this->db->select('*')
				 ->from('mutasi m')
				 ->join('siswa s','s.nis = m.nis')
				 ->join('riwayatkelas rk','rk.nis = s.nis')
				 ->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
				 ->where('rk.id_tahun',$this->session->userdata('id_tahun'))
				 ->get();
	}	

	public function get_mutasi_masuk()
	{
		return $this->db->select('*')
				 ->from('mutasi m')
				 ->join('siswa s','s.nis = m.nis')
				 ->join('riwayatkelas rk','rk.nis = s.nis')
				 ->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
				 ->where('jenis_mutasi','masuk')
				 ->where('rk.id_tahun',$this->session->userdata('id_tahun'))
				 ->get();
	}

	public function get_mutasi_keluar()
	{
		return $this->db->select('*')
				 ->from('mutasi m')
				 ->join('siswa s','s.nis = m.nis')
				 ->join('riwayatkelas rk','rk.nis = s.nis')
				 ->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
				 ->where('jenis_mutasi','keluar')
				 ->where('rk.id_tahun',$this->session->userdata('id_tahun'))
				 ->get();
	}

}

/* End of file Mutasi_model.php */
/* Location: ./application/modules/sisfo/models/Mutasi_model.php */