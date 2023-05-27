<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensiguru_model extends CI_Model {

	public function get_phguru($tgl1,$tgl2)
	{
		return $this->db->select('*')
						->from('phguru pg')
						->join('pegawai p','p.nip = pg.nip')
						->where('pg.tanggal >=',$tgl1)
						->where('pg.tanggal <=',$tgl2)
						->where('id_tahun',$this->session->userdata('id_tahun'))
						->group_by('pg.nip','ASC')
						->get();
	}

	


}

/* End of file Presensiguru_model.php */
/* Location: ./application/modules/sisfo/models/Presensiguru_model.php */