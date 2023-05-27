<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function getSiswa()
	{
		return $this->db->get_where('siswa',['id_tahun' => $this->session->userdata('id_tahun')]);
	}

	public function getSiswaById($id)
	{
		return $this->db->get_where('siswa',['id_tahun' => $this->session->userdata('id_tahun'),'id_siswa' => $id]);
	}

	public function insertSiswa($data)
	{
		return $this->db->insert('siswa',$data);
	}

	public function updateSiswa($data,$id)
	{	
		$this->db->where('id_siswa',$id);
		return $this->db->update('siswa',$data);
	}

	public function hapusSiswa($id)
	{
		return $this->db->where('id_siswa',$id)->delete('siswa');
	}

}

/* End of file Siswa_model.php */
/* Location: ./application/modules/sisfo/models/Siswa_model.php */