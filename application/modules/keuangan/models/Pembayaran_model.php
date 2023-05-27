<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

	public function get_kategori()
	{
		return $this->db->get_where('kategori_pembayaran',['id_tahun'=>$this->session->userdata('id_tahun'),'status'=>'Y']);
	}

	public function get_jenis()
	{
		return $this->db->select('*')
				->from('jenis_pembayaran jp')
				->join('kategori_pembayaran kp', 'kp.id_kategori = jp.id_kategori')
				->where('jp.status','Y')
				->where('kp.status','Y')
				->where('jp.id_tahun',$this->session->userdata('id_tahun'))
				->get();
	}

	public function get_jenisByid($id)
	{
		return $this->db->select('*')
				->from('jenis_pembayaran jp')
				->join('kategori_pembayaran kp', 'kp.id_kategori = jp.id_kategori')
				->where('jp.status','Y')
				->where('kp.status','Y')
				->where('id_jenis',$id)
				->where('jp.id_tahun',$this->session->userdata('id_tahun'))
				->get();
	}

	public function get_tagihan($nis,$id_jenis,$id_kelas)
	{
		return $this->db->select('*')
				->from('tbl_tagihan tt')				
				->where('tt.nis',$nis)
				->where('tt.id_kelas',$id_kelas)
				->where('tt.id_jenis',$id_jenis)
				->where('tt.ket','BL')
				->where('tt.id_tahun',$this->session->userdata('id_tahun'))
				->get();
	}

}

/* End of file Pembayaran_model.php */
/* Location: ./application/models/Pembayaran_model.php */