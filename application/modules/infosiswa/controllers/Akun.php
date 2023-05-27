<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_siswa();
	}

	public function index()
	{
		$data = [
			'title' => 'Pengaturan Akun',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		$this->load->view('infosiswa/template/header',$data);
		$this->load->view('infosiswa/template/navbar',$data);
		$this->load->view('infosiswa/akun/index',$data);
		$this->load->view('infosiswa/template/footer',$data);
	}

	public function change()
	{	
		$id_siswa = $this->session->userdata('id_siswa');
		$user = $this->db->get_where('siswa',['id_siswa'=>$id_siswa])->row();

		$password_old 	= $this->input->post('password_old');
		$password 		= password_hash($this->input->post('password'), PASSWORD_DEFAULT);		

		if (password_verify($password_old, $user->password)) {
			
			$this->db->where('id_siswa',$id_siswa);
			$this->db->update('siswa',['password'=> $password]);

			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Disimpan!', 'success');</script>");
        	redirect('infosiswa/Akun');
			

		}else{

			$this->session->set_flashdata('message', "<script>swal('Failed!', 'Password Lama Salah! ', 'error');</script>");
        	redirect('infosiswa/Akun');
		}
	}

}

/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */