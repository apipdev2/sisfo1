<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		is_tu();
	}

	public function index()
	{	
		$id = $this->session->userdata('id_user');
		$data = [
			'title' => 'Ganti Password',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'user' => $this->db->get_where('tbl_user',['id_user'=>$id])->row(),
		];

		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('password_old', 'Password Lama', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header',$data);
			$this->load->view('template/navbar');
			$this->load->view('infoguru/changepassword/index',$data);
			$this->load->view('template/footer');
		}else{

			$this->change();
		}
		
	}

	public function change()
	{	
		$id_user = $this->session->userdata('id_user');
		$user = $this->db->get_where('tbl_user',['id_user'=>$id_user])->row();

		$password_old 	= $this->input->post('password_old');
		$password 		= password_hash($this->input->post('password'), PASSWORD_DEFAULT);		

		if (password_verify($password_old, $user->password)) {
			
			$this->db->where('id_user',$id_user);
			$this->db->update('tbl_user',['password'=> $password]);

			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Disimpan!', 'success');</script>");
        	redirect('infoguru/ChangePassword/index');
			

		}else{

			$this->session->set_flashdata('message', "<script>swal('Failed!', 'Password Lama Salah! ', 'error');</script>");
        	redirect('infoguru/ChangePassword/index');
		}
	}

}

/* End of file ChangePassword.php */
/* Location: ./application/modules/infoguru/controllers/ChangePassword.php */