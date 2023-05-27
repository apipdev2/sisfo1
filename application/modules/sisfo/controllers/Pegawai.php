<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Pegawai_model','pegawai');
		is_login();
		cek_admin();
		
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Pegawai',
			'pegawai' => $this->pegawai->getPegawai()->result(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/pegawai/index',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{	
		$data = [
			'title' => 'Tambah Pegawai',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[1]|max_length[16]');
		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required');
		if ($this->form_validation->run()== FALSE) {

			$this->load->view('template/header',$data);
			$this->load->view('template/navbar');
			$this->load->view('sisfo/pegawai/tambah_pegawai',$data);
			$this->load->view('template/footer');
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
				'foto'				=> 'default.jpg',
			];

			$query = $this->pegawai->insertPegawai($data);
			if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Pegawai');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('sisfo/Pegawai');
			}
		}

		
	}

	public function edit($id)
	{	
		$id = decrypt_url($id);
		$data = [
			'title' => 'Edit Pegawai',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'pegawai' => $this->pegawai->getPegawaiById($id)->row(),
			'jenis_kelamin' => ['Laki-laki','Perempuan'],
			'status_pegawai' => ['guru','tendik','KEPSEK'],
		];
		
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/pegawai/edit_pegawai',$data);
		$this->load->view('template/footer');		

	}

	public function update($id)
	{
		$id = decrypt_url($id);

		$pegawai = $this->db->get_where('pegawai',['id_pegawai'=>$id])->row();
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
				

			$query = $this->pegawai->editPegawai($data,$id);
			if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terupdate!', 'success');</script>");
        		redirect('sisfo/Pegawai');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terupdate!', 'error');</script>");
	        	redirect('sisfo/Pegawai');
			}
	}

	public function hapus($id)
	{	
		$id = decrypt_url($id);
		$query = $this->pegawai->hapusPegawai($id);
			if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terhapus!', 'success');</script>");
        		redirect('sisfo/Pegawai');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terhapus!', 'error');</script>");
	        	redirect('sisfo/Pegawai');
			}
	}

	public function import(){
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    
    if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['upload_file']['name']);
        $extension = end($arr_file);
        if('csv' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }elseif('xls' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetData = $spreadsheet->getSheet(0)->toArray();
        unset($sheetData[0]);
        $data = array();

        foreach ($sheetData as $row) {
        	
        	$datas['nip'] = $row[1];
        	$datas['nik'] = $row[2];
        	$datas['no_kk'] = $row[3];
        	$datas['nama_lengkap'] = $row[4];
        	$datas['jenis_kelamin'] = $row[5];
        	$datas['tempat_lahir'] = $row[6];
        	$datas['tanggal_lahir'] = date('Y-m-d',strtotime($row[7]));
        	$datas['alamat'] = $row[8];
        	$datas['gelar_depan'] = $row[9];
        	$datas['gelar_belakang'] = $row[10];
        	$datas['pendidikan_terakhir'] = $row[11];
        	$datas['email'] = $row[12];
        	$datas['telp'] = $row[13];
        	$datas['foto'] = 'default.jpg';
        	$data[] = $datas;
        }

        // echo json_encode($data);

        $query = $this->db->insert_batch('pegawai',$data);
        if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Pegawai');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('sisfo/Pegawai');
			}
      }
	}

	public function cetak_pegawai()
	{	
		$data = [
			'title' => 'Data Pegawai',
			'pegawai' => $this->pegawai->getPegawai()->result(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Data Pegawai.pdf";
	    $this->pdf->setPaper('A4', 'Portrait');
		$this->pdf->loadView('sisfo/pegawai/cetak_pegawai',$data);

		// $this->load->view('sisfo/pegawai/cetak_pegawai',$data);
	}

}

/* End of file Pegawai.php */
/* Location: ./application/modules/sisfo/controllers/Pegawai.php */