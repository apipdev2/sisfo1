<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{	
		if ($this->session->userdata('infosiswa')) {
            redirect(base_url('infosiswa/Dashboard'));
        }

        

		$this->form_validation->set_rules('nis', 'NIS', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('id_tahun', 'Tahun Ajaran', 'required');

        if ($this->form_validation->run() == false) {
            

            	$data = [
                    'title'     => 'Login Siswa',
                    'tahun_ajaran'=> $this->db->get('tahunajaran')->result(),
                    'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
                    'semester' => ['Ganjil','Genap'],
                ];

			$this->load->view('infosiswa/auth/index', $data);

		} else {
            // validasinya success

                $this->_login();
           
        }
	}

	private function _login()
    {
        $nis      = $this->input->post('nis');
        $password   = $this->input->post('password');
        $tahunajaran= $this->input->post('id_tahun');
        $user = $this->db->get_where('siswa', ['nis' => $nis])->row();

       
        // jika usernya ada
            if ($user) {
                // jika usernya aktif
                if ($user->flag == 1) {
                    // cek password
                    if (password_verify($password, $user->password)) {

                             $data = [    
                                'id_siswa'     => $user->id_siswa,
                                'nis'     => $user->nis,                        
                                'email'       => $user->email,
                                'nama_peserta'    => ucfirst($user->nama_peserta),
                                'image'       => $user->image,
                                'id_tahun'    => $tahunajaran,
                                'infosiswa'   => TRUE
                            ];

                            $this->session->set_userdata($data);
                            
                            redirect('infosiswa/Dashboard');
                            
                   
                   
                    } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIS Atau Password Salah!</div>');
                            redirect('infosiswa/Auth');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda tidak aktif!</div>');
                        redirect('infosiswa/Auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Anda tidak terdaftar!</div>');
                    redirect('infosiswa/Auth');
            }
         
    }


    

    public function logout()
    {   
        $data = ['id_siswa','nis','email','nama_peserta','image','infosiswa'];

         $this->session->unset_userdata($data);
        $this->session->sess_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil log out!</div>');
        redirect('infosiswa/Auth');
    }

  

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */