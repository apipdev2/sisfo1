<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_siswa();
		
	}
	public function index()
	{	
		$riwayat_kelas = $this->db->select('*')
						->from('riwayatkelas rk')
						->join('siswa s','s.nis = rk.nis')
						->join('tbl_kelas k','k.id_kelas = rk.id_kelas')
						->where('s.nis',$this->session->userdata('nis'))
						->where('rk.id_tahun',$this->session->userdata('id_tahun'))
						->get()->row();

		$data= [
			'title' => 'Dashboard',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'siswa' => $riwayat_kelas,
			'walas' => $this->db->select('*')
						->from('walikelas w')
						->join('pegawai p','p.id_pegawai = w.id_guru')
						->join('tbl_kelas k','k.id_kelas = w.id_kelas')
						->where('w.id_kelas', $riwayat_kelas->id_kelas)
						->where('w.id_tahun', $this->session->userdata('id_tahun'))
						->get()->row(),
			
		];

		$this->load->view('infosiswa/template/header',$data);
		$this->load->view('infosiswa/template/navbar',$data);
		$this->load->view('infosiswa/index',$data);
		$this->load->view('infosiswa/template/footer',$data);
	}

	public function upload()
	{
		$siswa = $this->db->get_where('siswa',['id_siswa'=>$this->session->userdata('id_siswa')])->row();
		$upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/siswa/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $siswa->image;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/siswa/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->where('id_siswa', $this->session->userdata('id_siswa'))->update('siswa',['image'=>$new_image]);
                    $this->session->set_flashdata('message', "<script>swal('Sukses!', 'Foto Berhasil Upload!', 'success');</script>");
        			redirect('infosiswa/Dashboard');
                    
                } else {

                	echo "<script>swal('Galat!', 'File Max 2MB, Format File harus jpg|png|Jpeg');</script>";
                    // echo $this->upload->dispay_errors();
                    redirect('infosiswa/Dashboard');
                }
            }
				

			
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/infoguru/controllers/Dashboard.php */