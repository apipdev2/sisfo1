<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		cek_admin();
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Instansi',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/instansi/index',$data);
		$this->load->view('template/footer');
	}

	public function update()
	{
		$data = [
			'npsn' => $this->input->post('npsn'),
			'nama_sekolah' => $this->input->post('nama_sekolah'),
			'jenjang' => $this->input->post('jenjang'),
			'status' => $this->input->post('status'),
			'alamat' => $this->input->post('alamat'),
			'kepala_sekolah' => $this->input->post('kepala_sekolah'),
			'no_telepon' => $this->input->post('no_telepon'),
			'email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
		];
		
        $this->db->where('id_identitas',1);
		$query = $this->db->update('identitas',$data);
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data berhasil diubah!', 'success');</script>");
            redirect('sisfo/Instansi');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data gagal diubah!', 'error');</script>");
            redirect('sisfo/Instansi');
		}
	}

	public function updateLogo()
	{
		$upload_image = $_FILES['logo']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/instansi/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {
                    $old_image = $peserta->image;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/instansi/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('logo', $new_image);
                   
                    
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

        $this->db->where('id_identitas',1);
		$this->db->update('identitas');
		$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Disimpan!', 'success');</script>");
        	redirect('sisfo/Instansi');
	}

	public function updateHeader()
	{
		$upload_image = $_FILES['header']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/instansi/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('header')) {
                    $old_image = $peserta->image;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/instansi/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('header', $new_image);
                   
                    
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

        $this->db->where('id_identitas',1);
		$this->db->update('identitas');
		$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Disimpan!', 'success');</script>");
        	redirect('sisfo/Instansi');
	}

	public function updateTtd()
	{
		$upload_image = $_FILES['ttd']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/instansi/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('ttd')) {
                    $old_image = $peserta->image;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/instansi/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('ttd', $new_image);
                   
                    
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

       
	}

	

}

/* End of file Instansi.php */
/* Location: ./application/modules/sisfo/controllers/Instansi.php */