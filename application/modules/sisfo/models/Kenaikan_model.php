<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kenaikan_model extends CI_Model {

	public function getSiswa()
	{
		return $this->db->select('*')
						->from('riwayatkelas rk')
						->join('siswa s','s.nis = rk.nis')
						->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
						->where('rk.id_tahun',$this->session->userdata('id_tahun'))
						->get();
	}

	public function getSiswaByIdKelas($id_kelas)
	{
		return $this->db->select('*')
						->from('riwayatkelas rk')
						->join('siswa s','s.nis = rk.nis')
						->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
						->where('rk.id_kelas',$id_kelas)
						->where('rk.id_tahun',$this->session->userdata('id_tahun'))
						->where('rk.flag','0')
						->get();
	}

	

}

/* End of file Riwayatkelas_model.php */
/* Location: ./application/modules/sisfo/models/Riwayatkelas_model.php */