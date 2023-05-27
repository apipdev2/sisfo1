<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	public function getKelas()
	{
		return $this->db->get_where('tbl_kelas',['id_tahunajaran'=>$this->session->userdata('id_tahun')]);
	}

	public function getKelasByTahun($id_tahun)
	{
		return $this->db->get_where('tbl_kelas',['id_tahunajaran'=>$id_tahun]);
	}

	public function addKelas($data)
	{
		return $this->db->insert('tbl_kelas',$data);
	}

	public function editKelas($data,$id)
	{	
		$this->db->where('id_kelas',$id);
		return $this->db->update('tbl_kelas',$data);
	}

	public function hapusKelas($id)
	{	
		$this->db->where('id_kelas',$id);
		return $this->db->delete('tbl_kelas');
	}

	public function getJurusan()
	{
		return $this->db->get('jurusan');
	}

	public function getKurikulum()
	{
		return $this->db->get('kurikulum');
	}		

}

/* End of file Jurusan_model.php */
/* Location: ./application/modules/sisfo/models/Jurusan_model.php */