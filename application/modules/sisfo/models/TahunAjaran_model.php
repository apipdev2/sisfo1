<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAjaran_model extends CI_Model {

	public function getTahunAjaran()
	{
		return $this->db->get('tahunajaran');
	}

	public function addTahunAjaran($data)
	{
		return $this->db->insert('tahunajaran',$data);
	}

	public function editTahunAjaran($data,$id)
	{	
		$this->db->where('id_tahun',$id);
		return $this->db->update('tahunajaran',$data);
	}

	public function hapusTahunAjaran($id)
	{	
		$this->db->where('id_tahun',$id);
		return $this->db->delete('tahunajaran');
	}

}

/* End of file TA_model.php */
/* Location: ./application/modules/sisfo/models/TA_model.php */