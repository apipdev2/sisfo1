<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni_model extends CI_Model {

	public function get_alumni($id_tahun, $jurusan)
	{
		return $this->db->select('*')
						->from('alumni al')
						->join('siswa s','s.nis = al.nis')
						->join('tbl_kelas k','k.id_kelas = al.id_kelas')
						->where('al.id_tahun',$id_tahun)
						->where('k.jurusan',$jurusan)
						->get();
		
	}	

}

/* End of file Alumni_model.php */
/* Location: ./application/modules/sisfo/models/Alumni_model.php */