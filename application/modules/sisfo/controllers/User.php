<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('LogActivities_model','logs');
		is_login();
		cek_admin();
	}

	public function index()
	{	
		$data = [
			'title' => 'Data User',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'user' => $this->user->getUser()->result(),
			'level' => $this->user->getLevel()->result(),
			
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/user/index',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data = [
			'nip'			=> $this->input->post('nip'),
			'full_name' 	=> $this->input->post('full_name'),
			'email' 		=> $this->input->post('email'),
			'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'id_level' 		=> $this->input->post('id_level'),
			'image' => 'default.jpg',
		];

		$query = $this->user->addUser($data);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
			$this->logs->insert('tbl_user', json_encode($data), 'add user', '', date("Y-m-d H:i:s"), $this->session->userdata('id_user')); 
        	redirect('sisfo/User');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/User');
		}
	}

	public function edit($id)
	{
		$id = decrypt_url($id);
		$user = $this->db->get_where('tbl_user',['id_user'=>$id])->row();
		$upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $user->image;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/user/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                   $data = [
                   	'nip'			=> $this->input->post('nip'),
					'full_name' 	=> $this->input->post('full_name'),
					'email' 		=> $this->input->post('email'),
					'id_level' 		=> $this->input->post('id_level'),
					'image'			=> $new_image,
				];
                    
                } else {
                    echo $this->upload->dispay_errors();
                }
            }else{
            	$data = [
            		'nip'			=> $this->input->post('nip'),
					'full_name' 	=> $this->input->post('full_name'),
					'email' 		=> $this->input->post('email'),
					'id_level' 		=> $this->input->post('id_level'),
				];
            }

			$query = $this->user->editUser($data,$id);

			if ($query) {
				$this->logs->insert('tbl_user', json_encode($data), 'edit user id :'.$id, '', date("Y-m-d H:i:s"), $this->session->userdata('id_user')); 
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil diubah!', 'success');</script>");
	        	redirect('sisfo/User');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal diubah!', 'error');</script>");
	        	redirect('sisfo/User');
			}
	}

	public function change_password($id)
	{
		$id = decrypt_url($id);

		$data = [
			'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];
		
		$query = $this->user->changePassword($id,$data);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil diupdate!', 'success');</script>");
        	redirect('sisfo/User');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal diupdate!', 'error');</script>");
        	redirect('sisfo/User');
		}
	}

	public function hapus($id)
	{
		$id = decrypt_url($id);
		$query = $this->user->hapusUser($id);

		if ($query) {
			$this->logs->insert('tbl_user', 'delete data '.$id, 'delete user id :'.$id, '', date("Y-m-d H:i:s"), $this->session->userdata('id_user')); 
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
        	redirect('sisfo/User');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal dihapus!', 'error');</script>");
        	redirect('sisfo/User');
		}
	}

}

/* End of file User.php */
/* Location: ./application/modules/sisfo/controllers/User.php */