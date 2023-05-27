<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_guru();
		
	}

	public function index()
	{
		$data= [
			'title' => 'Dokumen',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'dokumen' => $this->db->get_where('dokpegawai',[
				'id_tahun'=> $this->session->userdata('id_tahun'),
				'nip' => $this->session->userdata('nip')])->result(),

		];

		$this->load->view('infoguru/template/header',$data);
		$this->load->view('infoguru/template/navbar',$data);
		$this->load->view('infoguru/dokumen/index',$data);
		$this->load->view('template/footer');
	}

	public function add()
	{	
		// $user = $this->db->get_where('tbl_user',['id_user'=> $this->session->userdata('id_user')])->row();
		$upload_image = $_FILES['dokumen']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|csv|doc|docx|ppt|pptx|pdf|xls|xlxs';
                $config['max_size']      = '10048';
                $config['upload_path'] = './assets/img/dokumen/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('dokumen')) {
                    
                   	$data = [
						'id_tahun' => $this->session->userdata('id_tahun'),
						'nip' => $this->session->userdata('nip'),
						'filename' => $this->upload->data('file_name'),
						'type' => $this->upload->data('file_type'),
						'size' => $this->upload->data('file_size'),
						'keterangan' => $this->input->post('keterangan'),
					];

					$this->db->insert('dokpegawai',$data);
					$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Disimpan!', 'success');</script>");
        			redirect('infoguru/Dokumen');
                    
                } else {
                    // $res =  $this->upload->dispay_errors();
                    $this->session->set_flashdata('message', "<script>swal('Galat!', 'File Max 2 Mb Type :jpg|png!', 'error');</script>");
                    redirect('infoguru/Dokumen');
                }
            }


	}

	
	public function del()
	{

		$id_dokumen = $this->input->post('id_dokumen');
		for ($i=0; $i < count($id_dokumen); $i++) { 
				

					$file = $this->db->get_where('dokpegawai',['id_dokumen' => $id_dokumen[$i]])->row();
					unlink(FCPATH . 'assets/img/dokumen/'.$file->filename);

					$this->db->where('id_dokumen',$id_dokumen[$i])->delete('dokpegawai');


			}	

			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
			redirect('infoguru/Dokumen');
		
	}

}

/* End of file Dokumen.php */
/* Location: ./application/modules/infoguru/controllers/Dokumen.php */