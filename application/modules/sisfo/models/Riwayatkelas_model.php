<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatkelas_model extends CI_Model {

	public function getSiswa()
	{
		return $this->db->select('*')
						->from('riwayatkelas rk')
						->join('siswa s','s.nis = rk.nis')
						->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
						->where('rk.status_siswa','Y')
						->where('rk.id_tahun',$this->session->userdata('id_tahun'))
						->get();
	}

	public function getSiswaById($nis)
	{
		return $this->db->select('*')
						->from('riwayatkelas rk')
						->join('siswa s','s.nis = rk.nis')
						->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
						->where('s.nis',$nis)
						->where('rk.id_tahun',$this->session->userdata('id_tahun'))
						->get();
	}

	public function getSiswaByNama($nama_peserta)
	{
		

		return $this->db->select('*')
						->from('riwayatkelas rk')
						->join('siswa s','s.nis = rk.nis')
						->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
						->like('s.nama_peserta',$nama_peserta)
						->where('rk.status_siswa','Y')
						->where('rk.id_tahun',$this->session->userdata('id_tahun'))
						->get()->result();
		
	}

	public function getSiswaByIdKelas($id_kelas)
	{
		return $this->db->select('*')
						->from('riwayatkelas rk')
						->join('siswa s','s.nis = rk.nis')
						->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
						->where('rk.id_kelas',$id_kelas)
						->where('rk.status_siswa','Y')
						->where('rk.id_tahun',$this->session->userdata('id_tahun'))
						->get();
	}

	public function getTingkat()
	{
		return $this->db->select('*')
						->from('tbl_kelas')
						->where('id_tahunajaran', $this->session->userdata('id_tahun'))
						->group_by('tingkat')
						->get();
	}

	public function getKelas($tingkat)
	{
		return $this->db->select('*')
						->from('tbl_kelas')
						->where('tingkat',$tingkat)
						->where('id_tahunajaran', $this->session->userdata('id_tahun'))
						->get();
	}

	public function insertSiswa($data)
	{
		return $this->db->insert('riwayatkelas',$data);
	}

	public function hapusSiswa($id)
	{
		return $this->db->where('id_riwayat',$id)->delete('riwayatkelas');
	}

}

/* End of file Riwayatkelas_model.php */
/* Location: ./application/modules/sisfo/models/Riwayatkelas_model.php */