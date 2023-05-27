<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Pegawai_model','pegawai');
		is_guru();
		
	}

	public function index()
	{	
		$nip = $this->session->userdata('nip');
		$data = [
			'title' => 'Profile',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'pegawai' => $this->db->get_where('pegawai',['nip'=>$nip])->row(),
			'jenis_kelamin' => ['Laki-laki','Perempuan'],
			'status_pegawai' => ['guru','tendik'],
		];

		$this->load->view('infoguru/template/header',$data);
		$this->load->view('infoguru/template/navbar',$data);
		$this->load->view('infoguru/profile/index',$data);
		$this->load->view('infoguru/template/footer',$data);
	}

	public function update()
	{
		$nip = $this->session->userdata('nip');

		$pegawai = $this->db->get_where('pegawai',['nip'=>$nip])->row();
		$upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/pegawai/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $pegawai->image;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/pegawai/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $data = [
						'nip'				=> $this->input->post('nip'),
						'nik'				=> $this->input->post('nik'),
						'no_kk'				=> $this->input->post('no_kk'),
						'nama_lengkap'		=> $this->input->post('nama_lengkap'),
						'gelar_depan'		=> $this->input->post('gelar_depan'),
						'gelar_belakang'	=> $this->input->post('gelar_belakang'),
						'pendidikan_terakhir'=> $this->input->post('pendidikan_terakhir'),
						'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
						'tempat_lahir'		=> $this->input->post('tempat_lahir'),
						'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
						'alamat'			=> $this->input->post('alamat'),
						'telp'				=> $this->input->post('telp'),
						'email'				=> $this->input->post('email'),
						'status_pegawai'	=> $this->input->post('status_pegawai'),
						'foto'				=> $new_image,
						];
                   
                    
                } else {

                	echo "<script>swal('Galat!', 'File Max 2MB, Format File harus jpg|png');</script>";
                    // echo $this->upload->dispay_errors();
                }
            }else{

            	$data = [
						'nip'				=> $this->input->post('nip'),
						'nik'				=> $this->input->post('nik'),
						'no_kk'				=> $this->input->post('no_kk'),
						'nama_lengkap'		=> $this->input->post('nama_lengkap'),
						'gelar_depan'		=> $this->input->post('gelar_depan'),
						'gelar_belakang'	=> $this->input->post('gelar_belakang'),
						'pendidikan_terakhir'=> $this->input->post('pendidikan_terakhir'),
						'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
						'tempat_lahir'		=> $this->input->post('tempat_lahir'),
						'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
						'alamat'			=> $this->input->post('alamat'),
						'telp'				=> $this->input->post('telp'),
						'email'				=> $this->input->post('email'),
						'status_pegawai'	=> $this->input->post('status_pegawai'),
				];
            }
				
            $this->db->where('nip',$nip);
			$query = $this->db->update('pegawai',$data);
			if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terupdate!', 'success');</script>");
        		redirect('infoguru/Profile');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terupdate!', 'error');</script>");
	        	redirect('infoguru/Profile');
			}
	}

}

/* End of file Profile.php */
/* Location: ./application/modules/infoguru/controllers/Profile.php */