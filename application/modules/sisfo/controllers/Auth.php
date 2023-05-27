<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{	
		if ($this->session->userdata('logged_in')) {
            redirect(base_url('sisfo/Dashboard'));
        }

        

		$this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('id_tahun', 'Tahun Ajaran', 'required');


        if ($this->form_validation->run() == false) {
            

            	$data = [
                    'title'     => 'Login Page Akademik',
                    'tahun_ajaran'=> $this->db->get('tahunajaran')->result(),
                    'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
                    'semester' => ['Ganjil','Genap'],
                ];

			$this->load->view('sisfo/auth/index', $data);

		} else {
            // validasinya success

                $this->_login();
           
        }
	}

	private function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $tahunajaran= $this->input->post('id_tahun');
        $semester = $this->input->post('semester');
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
                            'id_tahun'    => $tahunajaran,
                            'semester'    => $semester,
                            'logged_in'   => TRUE
                            ];

                            if($user->id_level === '3'||$user->id_level === '1'){
                                
                                $this->session->set_userdata($data);                            
                                redirect('sisfo/Dashboard');

                            }else{
                                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hak akses ditolak!</div>');
                                redirect('sisfo/Auth');
                            }                           
                            
                   
                   
                    } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Atau Password Salah!</div>');
                            redirect('sisfo/Auth');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda tidak aktif!</div>');
                        redirect('sisfo/Auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Anda tidak terdaftar!</div>');
                    redirect('sisfo/Auth');
            }
         
    }


    

    public function logout()
    {   
        $data = ['id_user','email','username','id_level','image','logged_in','id_tahun'];

        // $this->session->unset_userdata($data);
        $this->session->sess_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil log out!</div>');
        redirect('sisfo/Auth');
    }

  

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */