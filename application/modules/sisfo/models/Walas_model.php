<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walas_model extends CI_Model {

	public function getWalas()
	{
		return $this->db->select('*')
						->from('walikelas w')
						->join('pegawai p','p.id_pegawai = w.id_guru')
						->join('tbl_kelas k','k.id_kelas = w.id_kelas')
						->where('w.id_tahun', $this->session->userdata('id_tahun'))
						->get();
	}

	public function addWalas($data)
	{
		return $this->db->insert('walikelas',$data);
	}

	public function editWalas($data, $id)
	{
		return $this->db->where('id_walas',$id)->update('walikelas',$data);
	}

	public function hapusWalas($id)
	{
		return $this->db->where('id_walas',$id)->delete('walikelas');
	}

}

/* End of file Walas_model.php */
/* Location: ./application/modules/sisfo/models/Walas_model.php */