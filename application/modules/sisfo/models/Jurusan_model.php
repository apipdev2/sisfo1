<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {

	public function getJurusan()
	{
		return $this->db->get('jurusan');
	}

	public function addJurusan($data)
	{
		return $this->db->insert('jurusan',$data);
	}

	public function editJurusan($data,$id)
	{	
		$this->db->where('id_jurusan',$id);
		return $this->db->update('jurusan',$data);
	}

	public function hapusJurusan($id)
	{	
		$this->db->where('id_jurusan',$id);
		return $this->db->delete('jurusan');
	}	

}

/* End of file Jurusan_model.php */
/* Location: ./application/modules/sisfo/models/Jurusan_model.php */