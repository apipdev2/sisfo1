<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getUser()
	{
		return $this->db->select('*')
						->from('tbl_user tu')
						->join('tbl_userlevel ul','ul.id_level = tu.id_level ')
						->where('tu.id_level <>','4')
						->get();
	}

	public function getLevel()
	{
		return $this->db->get('tbl_userlevel');
	}

	public function addUser($data)
	{
		return $this->db->insert('tbl_user',$data);
	}

	public function editUser($data,$id)
	{	

		return $this->db->where('id_user',$id)->update('tbl_user',$data);
	}

	public function changePassword($id, $data)
	{
		$this->db->where('id_user',$id);
		return $this->db->update('tbl_user',$data);
	}

	public function hapusUser($id)
	{
		$user = $this->db->get_where('tbl_user',['id_user'=>$id])->row();
		unlink(FCPATH . 'assets/img/user/'.$user->image);
		return $this->db->where('id_user',$id)->delete('tbl_user');
	}

}

/* End of file User_model.php */
/* Location: ./application/modules/sisfo/models/User_model.php */