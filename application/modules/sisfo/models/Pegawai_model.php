<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

	public function getPegawai()
	{
		return $this->db->get('pegawai');
	}

	public function getPegawaiById($id)
	{
		return $this->db->get_where('pegawai',['id_pegawai' => $id]);
	}
	
	public function insertPegawai($data)
	{
		return $this->db->insert('pegawai',$data);
	}

	public function editPegawai($data, $id)
	{
		$this->db->where('id_pegawai',$id);
		return $this->db->update('pegawai',$data);
	}

	public function hapusPegawai($id)
	{
		$this->db->where('id_pegawai',$id);
		return $this->db->delete('pegawai');
	}

}

/* End of file Pegawai_model.php */
/* Location: ./application/modules/sisfo/models/Pegawai_model.php */