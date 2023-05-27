<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phsiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		is_login();
		// cek_admin();
	}

	public function index()
	{	

		$data = [
			'title' => 'Data Presensi Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'tingkat' => $this->riwayatkelas->getTingkat()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/phsiswa/index',$data);
		$this->load->view('template/footer');
	}

	public function ajax_getPh()
	{
		$id_kelas =  $this->input->post('id_kelas');
		$bln = $this->input->post('bln');
		$thn = $this->input->post('thn');
		$siswa = $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result();
		
		foreach ($siswa as $row) {
			$data[] = [
				'nis' => $row->nis,
				'nama_peserta' => $row->nama_peserta,
				'jenis_kelamin' => $row->jenis_kelamin,
				'H'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','H')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),

				'I'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','I')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),

				'S'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','S')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),

				'A'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','A')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),
			];
		}

		
		echo json_encode($data);

	}

	public function cetak_ph($id_kelas, $bln, $thn)
	{
		$siswa = $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result();
		
		foreach ($siswa as $row) {
			$data[] = [
				'nis' => $row->nis,
				'nama_peserta' => $row->nama_peserta,
				'jenis_kelamin' => $row->jenis_kelamin,
				'H'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','H')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),

				'I'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','I')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),

				'S'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','S')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),

				'A'	=> $this->db->select('*')
								->from('phsiswa')
								->where('nis',$row->nis)
								->where('ket','A')
								->where('MONTH(tanggal)',$bln)
								->where('YEAR(tanggal)',$thn)
								->get()->num_rows(),
			];
		}

		
		$result = [
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'phsiswa'=>$data,
			];
		
		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Data Presensi Siswa.pdf";
	    $this->pdf->setPaper('Legal', 'Portrait');
	    $this->pdf->loadView('sisfo/phsiswa/cetak', $result);
	    // $this->load->view('sisfo/phsiswa/cetak', $result);

	}

	public function addPh($id_kelas)
	{
		$data = [
			'title' => 'Tambah Presensi Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'siswa' => $this->riwayatkelas->getSiswaByIdKelas($id_kelas)->result(),
		];

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		if ($this->form_validation->run()==false) {
			
			$this->load->view('template/header',$data);
			$this->load->view('template/navbar');
			$this->load->view('sisfo/phsiswa/add_phsiswa',$data);
			$this->load->view('template/footer');

		}else{

			$this->storephsiswa();
		}

		
	}

	public function storephsiswa()
	{

		$nis = $this->input->post('nis');
		$ket = $this->input->post('ket');
		
		for ($i=0; $i < count($ket) ; $i++) { 
			
			$data = [
				// 'id_tahun' => $this->session->userdata('id_tahun'),
				// 'tanggal' => $this->input->post('tanggal'),
				'nis' => $nis[$i],
				'ket' => $ket[$i],
				// 'type' => 'M',
			];

var_dump($data);
		// $cek = $this->db->get_where('phsiswa',[
		// 		'tanggal' => $this->input->post('tanggal'),
		// 		'nis' => $nis[$i],])->num_rows();

		// 	if ($cek < 1) {
		// 		$query = $this->db->insert('phsiswa',$data);
		// 	}
		// }
		
		// if ($query) {
		// 	$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil disimpan!', 'success');</script>");
  //       	redirect('sisfo/Phsiswa');
		// }else{
		// 	$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal disimpan!', 'error');</script>");
  //       	redirect('sisfo/Phsiswa');
		}
	}

	public function detailPH($nis, $bln, $thn)
	{
		$data = [
			'title' => 'Detail',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' =>$this->db->get_where('tahunajaran',['id_tahun'=>$this->session->userdata('id_tahun')])->row(),
			'siswa' => $this->db->get_where('siswa',['nis'=>$nis])->row(),
			'detail' => $this->db->select('*')
						->from('phsiswa ps')
						->join('siswa s','s.nis = ps.nis')
						->where('ps.nis',$nis)
						->where('MONTH(tanggal)',$bln)
						->where('YEAR(tanggal)',$thn)
						->get()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/phsiswa/detail',$data);
		$this->load->view('template/footer');
	}

	public function edit()
	{
		$id_presensi = $this->input->post('id_presensi');
		$nis = $this->input->post('nis');
		$bln = $this->input->post('bln');
		$thn = $this->input->post('thn');


		$data = [
			'ket' => $this->input->post('ket'),
		];

		$query = $this->db->where('id_presensi',$id_presensi)->update('phsiswa',$data);
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil disimpan!', 'success');</script>");
        	redirect('sisfo/Phsiswa/detailPH/'.$nis.'/'.$bln.'/'.$thn);
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal disimpan!', 'error');</script>");
        	redirect('sisfo/Phsiswa/detailPH/'.$nis.'/'.$bln.'/'.$thn);
		}
	}

	public function hapus($id)
	{
		$id_presensi = decrypt_url($id);		
		$siswa = $this->db->get_where('phsiswa',['id_presensi'=>$id_presensi])->row();

		$query = $this->db->where('id_presensi',$id_presensi)->delete('phsiswa');
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil dihapus!', 'success');</script>");
        	redirect('sisfo/Phsiswa/detailPH/'.$siswa->nis);
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal dihapus!', 'error');</script>");
        	redirect('sisfo/Phsiswa/detailPH/'.$siswa->nis);
		}
	}

}

/* End of file Phsiswa.php */
/* Location: ./application/modules/sisfo/controllers/Phsiswa.php */