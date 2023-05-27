<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Kelas_model','kelas');
		is_login();
		cek_admin();
		
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Kelas',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'kelas' => $this->kelas->getKelas()->result(),
			'kurikulum' => $this->kelas->getKurikulum()->result(),
			'jurusan' => $this->kelas->getjurusan()->result(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/kelas/index',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data = [
			'id_tahunajaran'=> $this->session->userdata('id_tahun'),
			'kurikulum' 	=> $this->input->post('kurikulum'),
			'jurusan' 		=> $this->input->post('jurusan'),
			'tingkat' 		=> $this->input->post('tingkat'),
			'kelas' 		=> $this->input->post('kelas'),
			'kapasitas' 	=> $this->input->post('kapasitas'),
		];

		$query = $this->kelas->addKelas($data);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Kelas');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Kelas');
		}
	}

	public function edit($id)
	{
		$id = decrypt_url($id);
		$data = [
			'kurikulum' 	=> $this->input->post('kurikulum'),
			'jurusan' 		=> $this->input->post('jurusan'),
			'tingkat' 		=> $this->input->post('tingkat'),
			'kelas' 		=> $this->input->post('kelas'),
			'kapasitas' 	=> $this->input->post('kapasitas'),
		];

		$query = $this->kelas->editKelas($data,$id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil diubah!', 'success');</script>");
        	redirect('sisfo/Kelas');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal diubah!', 'error');</script>");
        	redirect('sisfo/Kelas');
		}
	}

	public function hapus($id)
	{
		$id = decrypt_url($id);
		
		$query = $this->kelas->hapusKelas($id);

		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
        	redirect('sisfo/Kelas');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal dihapus!', 'error');</script>");
        	redirect('sisfo/Kelas');
		}
	}

	//import kelas
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
        	$datas['id_tahunajaran'] = $this->session->userdata('id_tahun');
        	$datas['tingkat'] = $row[1];
        	$datas['jurusan'] = $row[2];
        	$datas['kelas'] = $row[3];
        	$datas['kapasitas'] = $row[4];
        	$data[] = $datas;
        }

        $query = $this->db->insert_batch('tbl_kelas',$data);
        if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Kelas');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Kelas');
		}
        
      }else{
      	$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
        	redirect('sisfo/Kelas');
      }
	}

}

/* End of file Kelas.php */
/* Location: ./application/modules/sisfo/controllers/Kelas.php */