<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAjaran_model extends CI_Model {

	public function getTahunAjaran()
	{
		return $this->db->get('tahun_ajaran');
	}

	public function addTahunAjaran($data)
	{
		return $this->db->insert('tahun_ajaran',$data);
	}

	public function editTahunAjaran($data,$id)
	{	
		$this->db->where('id_tahun',$id);
		return $this->db->update('tahun_ajaran',$data);
	}

	public function hapusTahunAjaran($id)
	{	
		$this->db->where('id_tahun',$id);
		return $this->db->delete('tahun_ajaran');
	}

}

/* End of file TA_model.php */
/* Location: ./application/modules/sisfo/models/TA_model.php */