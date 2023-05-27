<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel_model extends CI_Model {

	public function getRombel()
	{
		return $this->db->get_where('tbl_kelas',['id_tahunajaran'=>$this->session->userdata('id_tahun')]);
	}

	public function getRombelById($id_kelas)
	{
		return $this->db->get_where('tbl_kelas',['id_kelas'=>$id_kelas, 'id_tahunajaran'=>$this->session->userdata('id_tahun')]);
	}

	public function getSiswa()
	{
		return $this->db->get_where('siswa',['id_tahun' => $this->session->userdata('id_tahun'),'flag'=>'0']);
	}

	public function getSiswaByIdKelas($id_kelas)
	{
		return $this->db->select('*')
						->from('riwayatkelas rk')
						->join('siswa s','s.nis = rk.nis')
						->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
						->where('rk.id_kelas',$id_kelas)
						// ->where('rk.status_siswa','Y')
						->where('rk.id_tahun',$this->session->userdata('id_tahun'))
						->get();
	}

}

/* End of file Rombel_model.php */
/* Location: ./application/modules/sisfo/models/Rombel_model.php */