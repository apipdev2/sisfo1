<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{	
		if ($this->session->userdata('logged_in')) {
            redirect(base_url('presensi/Presensi'));
        }

        

		$this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            

            	$data = [
                    'title'     => 'Login Page',
                    'sekolah' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
                ];

			$this->load->view('presensi/auth',$data);

		} else {
            // validasinya success

                $this->_login();
           
        }
		
	}

	private function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $user = $this->db->get_where('tbl_user', ['email' => $email])->row();

       
        // jika usernya ada
            if ($user) {
                // jika usernya aktif
                if ($user->is_active == "Y") {
                    // cek password
                    if (password_verify($password, $user->password)) {

                             $data = [    
                            'id_user'     => $user->id_user,                        
                            'email'       => $user->email,
                            'username'    => ucfirst($user->username),
                            'id_level'    => $user->id_level,
                            'image'       => $user->image,
                            'logged_in'   => TRUE
                            ];

                            $this->session->set_userdata($data);
                            
                            redirect('presensi/Presensi');
                            
                   
                   
                    } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Atau Password Salah!</div>');
                            redirect('presensi/Auth');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda tidak aktif!</div>');
                        redirect('presensi/Auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Anda tidak terdaftar!</div>');
                    redirect('presensi/Auth');
            }
         
    }


    

    public function logout()
    {   
        $data = ['id_user','email','username','id_level','image','logged_in'];

        $this->session->unset_userdata($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil log out!</div>');
        redirect('presensi/Auth');
    }

}

/* End of file Auth.php */
/* Location: ./application/modules/presensi/controllers/Auth.php */